<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartShopController extends Controller
{
    // Mostrar la vista del carrito con los productos almacenados en cookies
    public function index()
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        return view('cart.index', compact('cart'));
    }

    // Agregar producto al carrito sin redirección
    public function add(Request $request)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);
        
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $productId,
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'quantity' => $quantity,
            ];
        }

        Cookie::queue('cart', json_encode($cart), 60 * 24 * 7); // 7 días de duración

        session()->flash('success', 'Producto añadido correctamente.');

        return back();
    }

    // Eliminar un producto del carrito sin redirección
    public function remove($productId)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);
        }

        session()->flash('success', 'Producto eliminado del carrito.');

        return back();
    }

    // Vaciar el carrito completamente sin redirección
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

    // Decrementar la cantidad del producto en el carrito
    public function decrease($productId)
    {
        $cart = json_decode(Cookie::get('cart', '[]'), true);

        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
        }

        Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);

        session()->flash('success', 'Cantidad reducida.');

        return back();
    }
}
