<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        $categories = Category::where('status', 1)->get();
        return view('frontend.customer.login',compact('categories'));
    }

    public function showRegisterForm()
    {
        $categories = Category::where('status', 1)->get();
        return view('frontend.customer.register',compact('categories'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'status' => 1,
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            session(['customer_id' => Auth::guard('customer')->id()]);
            return redirect()->route('home');
        }

        return back()->with('error', 'Invalid email or password');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->forget('customer_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
