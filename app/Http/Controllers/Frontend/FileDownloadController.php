<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Mail\PDFMail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Product;
use DB;

class FileDownloadController extends Controller
{
    public function download(Product $product, $format)
    {
        // Determine file path
        switch ($format) {
            case 'pdf':
                $file = $product->pdf_file;
                break;
            case 'epub':
                $file = $product->epub_file;
                break;
            case 'mobi':
                $file = $product->mobi_file;
                break;
            default:
                abort(404, 'File format not found');
        }

        if (!$file || !file_exists(public_path($file))) {
            abort(404, 'File not found');
        }

        // Increment download count
        $product->increment('download_count');

        $safeTitle = str_replace(' ', '_', $product->title);
        $filename = $safeTitle . '.' . $format;

        // Return the file as a download
        return response()->download(public_path($file), $filename);
    }
}
