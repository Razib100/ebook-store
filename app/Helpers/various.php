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
    public static function isAuthorProduct($productId)
    {
        $customerId = Auth::guard('customer')->id();

        if (!$customerId) {
            return false;
        }

        $author = Author::where('customer_id', $customerId)->first();

        if (!$author) {
            return false;
        }

        return \App\Models\Product::where('author_id', $author->id)
            ->where('id', $productId)
            ->exists();
    }

    public static function getProductCreationName($created_by, $author_id = null)
    {
        if ($created_by == 'customer' && $author_id) {
            $customer_id = Author::where('id', $author_id)->value('customer_id');

            if ($customer_id) {
                $customer = Customer::select('first_name', 'last_name')
                    ->find($customer_id);

                return $customer
                    ? trim($customer->first_name . ' ' . $customer->last_name)
                    : 'Unknown Customer';
            }

            return 'Unknown Customer';
        }

        return Auth::check() ? Auth::user()->name : 'Admin';
    }
}
