<?php

namespace App\Http\Controllers;

use App\Models\CompanyDelivery;
use Illuminate\Http\Request;

class CompanyDeliveryController extends Controller
{
    public function index(){
        $companies = CompanyDelivery::paginate(5);

        return view('companiesDeliveries', ['companies' => $companies]);
    }
}
