<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    

    public function index(){
        $products = Product::paginate(12);

        return view('products', ['products' => $products]);
    }

    // Caso si hubiera muchas empresas, y hubiese que filtrar productos

    // public function productsFilterByCompany($companyName)
    // {
    //     // Obtener la empresa según el nombre
    //     $company = Company::where('name', $companyName)->firstOrFail();
    
    //     // Obtener todas las empresas para el filtro
    //     $companies = Company::pluck('name', 'name');
    
    //     // Filtrar los productos por la empresa encontrada
    //     $products = Product::where('company_id', $company->id)->paginate(4);
    
    //     return view('productsByCompany', compact('products', 'companies', 'companyName'));
    // }
    
}
