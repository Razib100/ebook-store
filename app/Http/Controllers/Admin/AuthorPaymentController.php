<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Payment;
use App\Models\Review;
use DB;

class AuthorPaymentController extends Controller
{
    public function payment()
    {
        $payments = DB::table('payments')->orderBy('id', 'desc')->paginate(10);
        return view('admin.payment.list', compact('payments'));
    }
    public function getPaymentDetails($id)
    {
        $payment = Payment::find($id);
        return response()->json($payment);
    }
    public function review()
    {
        $reviews = Review::with(['customer', 'product'])
                     ->orderBy('id', 'desc')
                     ->paginate(10);
        return view('admin.review.list', compact('reviews'));
    }
    public function changeStatus($id)
    {
        $review = Review::findOrFail($id);
        $review->status = $review->status == 1 ? 0 : 1;
        $review->save();

        return redirect()->back()->with('success', 'Review status updated successfully!');
    }
}
