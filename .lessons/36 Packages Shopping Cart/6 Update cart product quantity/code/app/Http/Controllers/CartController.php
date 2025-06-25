<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function shop() {
        $products = Product::all();
        return view('cart.shop', compact('products'));
    }

    public function cart() {

        return view('cart.cart');
        
    }

    public function addToCart($productId) {

        $product = Product::findOrFail($productId);

        Cart::add([
            'id'        => $product->id, 
            'name'      => $product->name, 
            'qty'       => 1, 
            'price'     => $product->price, 
            'weight'    => 0, 
            'options'   => [
                'image' => $product->image
            ]
        ]);

        return redirect()
        ->back()
        ->with('success', 'Product is added into the cart');

    }


    public function qtyIncrement($id) {
        // Hər məhsulu identifikatoru ilə əldə edirik. 
        $product = Cart::get($id);
        // QTY açarı ilə hər məhsulun miqdarını əldə edirik və artırırıq.
        $updateQty = $product->qty + 1;

        // M'hsulu yenil'yirik
        Cart::update($id, $updateQty);

        // Və `success` açarı ilə ana səhifəyə geri qayıdırıq.
        return redirect()
        ->back()
        ->with('success', 'Product quantity is updated');

    }


    public function qtyDecrement($id) {
        // Hər məhsulu identifikatoru ilə əldə edirik. 
        $product = Cart::get($id);
        // QTY açarı ilə hər məhsulun miqdarını əldə edirik və artırırıq.
        $updateQty = $product->qty - 1;

        
        if ($updateQty > 0) {
            // Məhsulu yenil'yirik
            Cart::update($id, $updateQty);
        }

        // Və `success` açarı ilə ana səhifəyə geri qayıdırıq.
        return redirect()
        ->back()
        ->with('success', 'Product quantity is updated');

    }
}
