<?php

namespace App\Http\Controllers;

use App\Http\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $checkoutService;
    public function __construct(CheckoutService $checkOutService){
        $this->checkoutService = $checkOutService;
    }
    public function showCheckout(){
        return view('front-end/checkout');
    }

    public function createCheckout(Request $request ){
        $order = session()->get('cart');
        $this->checkoutService->createCheckout($request,$order);
        session()->forget('cart');
        toastr()->success('Thank you, Your oder is on the way!', 'Success');
        return redirect()->route('products.index');
    }
}
