<?php
namespace App\Http\Controllers;

use App\Models\CompanyDelivery;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        


        



        
        
        return redirect()->route('order.success')->with('success', 'Pedido realizado correctamente.');
    }

    public function success()
    {
        return view('end_order');
    }
}
