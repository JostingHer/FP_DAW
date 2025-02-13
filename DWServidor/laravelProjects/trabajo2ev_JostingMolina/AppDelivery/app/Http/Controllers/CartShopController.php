<?php
namespace App\Http\Controllers;

use App\Models\CompanyDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartShopController extends Controller
{
    public function index()
    {
        $deliveryCompanies = CompanyDelivery::all();
        return view('formCustomer', compact('deliveryCompanies'));
    }

    public function add(Request $request)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        
        $productId = $request->input('product_id');
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $image = $request->input('image');

        if (isset($cart[$productId])) {
            // Si el producto existe, incrementar la cantidad
            $cart[$productId]['quantity']++;
        } else {
            // Si el producto no existe, agregarlo al carrito
            $cart[$productId] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'image' => $image,
                'quantity' => 1,
            ];
        }
        Cookie::queue('cart', json_encode($cart), 60 * 24 * 7); // 7 días de duración

        session()->flash('success', 'Producto añadido correctamente.');

        return back();
    }

    public function remove($productId)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
    
        // Check if the product exists in the cart BEFORE trying to access it.
        if (isset($cart[$productId])) {
            unset($cart[$productId]); // Directly unset by key
    
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);
    
            session()->flash('success', 'Producto eliminado del carrito.');
    
        } 
    
        return back();
    }

    public function clear()
    {
        Cookie::queue(Cookie::forget('cart'));
        session()->flash('success', 'Carrito vaciado.');


        return back();
    }

    public function increase($productId)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        }

        Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);



        session()->flash('success', 'Cantidad aumentada.');

        return back();
    }

    public function decrease($productId)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);

        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
        }else{
            CartShopController::remove($productId);
               return back();
        }

        Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);


        session()->flash('success', 'Cantidad reducida.');

        return back();
    }
}
