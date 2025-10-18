<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PDFMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data; // Pass the contact form data
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('razibdeveloper634@gmail.com', 'Tairot')
        ->to($this->data['email'])
            ->subject($this->data['subject'])
            ->view('frontend.emails.pdfAttachment')
            ->with('data', $this->data);
    }
}
