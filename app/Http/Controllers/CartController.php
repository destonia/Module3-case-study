<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('front-end/shop', compact('products'));
    }

    public function cart()
    {
        return view('front-end/cart');
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];

            session()->put('cart', $cart);
            toastr()->success('Product added to cart successfully!', 'Success');
/*            return redirect()->back();*/
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
            toastr()->success('Product added to cart successfully!', 'Success');

/*            return redirect()->back();*/

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);
        toastr()->success('Product added to cart successfully!', 'Success');

/*        return redirect()->back()->with('success', 'Product added to cart successfully!');*/
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            toastr()->success('Product updated successfully!', 'Update');

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }
            toastr()->warning('Product removed successfully!', 'Delete');

            session()->flash('success', 'Product removed successfully');
        }
    }
}
