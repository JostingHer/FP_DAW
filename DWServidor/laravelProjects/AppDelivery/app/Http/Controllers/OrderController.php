<?php
namespace App\Http\Controllers;

use App\Models\CompanyDelivery;
use App\Models\Customer;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function create()
    {
        $deliveryCompanies = CompanyDelivery::all();
        return view('formCustomer', compact('deliveryCompanies'));
    }
    public function store(Request $request)
    {

        $cart = json_decode(Cookie::get('cart', '[]'), true);

        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);


        $customer = null;
        if (auth()->check()){
            // cliente habitual
            $customer = auth()->user();
        }else{
           // Cliente ocasional -> Creamos un usuario anónimo
            $customer = new User();
            $customer->name = $request->name;
            $customer->email = 'anonimo+' . time() . '@tuweb.com'; 
            $customer->password = '1234'; 
            $customer->phone = $request->phone;
            $customer->creditCard = $request->credit_card;
            $customer->save();
        }

        $order = new Order();
        $order->customer_id = $customer->id;
        $order->company_delivery_id = $request->delivery_company;
        $order->total = $total;
        $order->save();


        foreach ($cart as $key => $item) {
            $productOrder = new ProductOrder();
            $productOrder->order_id = $order->id;
            $productOrder->product_id = $item['id'];
            $productOrder->quantity = $item['quantity'];
            $productOrder->price = $item['price'] * $item['quantity'];
            $productOrder->save();
        }
        Cookie::queue(Cookie::forget('cart'));

        //return back();
        return redirect()->route('order.success')->with('success', 'Pedido realizado correctamente.');
    }

    public function success()
    {
        return view('endOrder');
    }
}
