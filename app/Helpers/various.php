<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use App\Models\Author;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Review;

use DB;

class Various
{
    public static function getProductByCustomer($productId)
    {
        $customerId = Auth::guard('customer')->id();

        if (!$customerId) {
            return false;
        }
        return Purchase::where('customer_id', $customerId)
            ->where('product_id', $productId)
            ->exists();
    }
    public static function reviewCheck($productId)
    {
        $customerId = Auth::guard('customer')->id();

        if (!$customerId) {
            return false;
        }
        return Review::where('customer_id', $customerId)
            ->where('product_id', $productId)
            ->exists();
    }
    public static function reviewCount($productId)
    {
        return Review::where('product_id', $productId)
            ->where('status', 1)
            ->count();
    }
    public static function isPurchased($productId)
    {
        $customerId = Auth::guard('customer')->id();

        if (!$customerId) {
            return false;
        }

        return \App\Models\Purchase::where('customer_id', $customerId)
            ->where('product_id', $productId)
            ->whereHas('payment', function ($query) {
                $query->where('status', 1);
            })
            ->exists();
    }
    public static function getDashboardCounts()
    {
        return [
            'products' => Product::count(),
            'customers' => Customer::count(),
            'categories' => Category::count(),
            'authors' => Author::count(),
        ];
    }
    public static function generateUniquePhone()
    {
        do {
            $phone = '01' . mt_rand(100000000, 999999999);
        } while (Author::where('phone', $phone)->exists());

        return $phone;
    }
}
