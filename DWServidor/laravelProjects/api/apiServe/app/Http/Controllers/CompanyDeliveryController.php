<?php

namespace App\Http\Controllers;

use App\Models\CompanyDelivery;
use Illuminate\Http\Request;

class CompanyDeliveryController extends Controller
{
    //
    public function random($num1, $num2)
    {
        $data= rand($num1, $num2);
        return response()->json($data, 200);
    }
    public function index(){
        $companies = CompanyDelivery::all();

        $data = ['status' => 'success', 'data' => $companies];

        return response()->json($data, 200);

    }

    public function show($id){


        $company = CompanyDelivery::find($id);
        $data = ['status' => 'success', 'data' => $company];

        return response()->json($data, 200);

    }

    public function store(Request $request){

        $company = new CompanyDelivery;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->save();

        $data = ['status' => 'success', 'data' => $company];

        
        return response()->json($data, 200);

    }
}
