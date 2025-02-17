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
    public function destroy($id){


        $company = CompanyDelivery::find($id);

        if($company != null){


            $company->delete();
       
            $company->forceDestroy($id);


            $newCompanies = CompanyDelivery::all();

            $data = ['status' => 'success', 'data' => $newCompanies];

            return response()->json($data, 200);


        } else{
            $data = ['status' => 'error', 'data' => 'No se ha encontrado la empresa'];
            
            return response()->json($data, 404);
        }



    }


    public function store(Request $request){


        /*
        OJO VALIDACIONES
        EJEMPLO
        https://www.edureka.co/community/89692/how-to-use-patch-request-in-laravel

        */

        $company = new CompanyDelivery;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->save();

        $data = ['status' => 'success', 'data' => $company];
        
        return response()->json($data, 200);

    }
    public function update(Request $request, $id){

        $company = CompanyDelivery::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->save();

        $data = ['status' => 'success', 'data' => $company];

        
        return response()->json($data, 200);

    }
    public function updatePATCH(Request $request, $id){

        $company = CompanyDelivery::find($id);

        /* PUEDES HACERLO CON MUCHOS IF CONDICIONALES VALORESAN
            SI LOS ATRIBUTOS SON NULL O NO EXISTEN
            O PUEDES HACER CON GETfillable() y GETguarded()

        */

        if($company != null){


            $company->fill($request->only($company->getFillable()));
            $company->save();

            $newCompanies = CompanyDelivery::all();

            $data = ['status' => 'success', 'data' => $newCompanies];

            return response()->json($data, 200);


        } else{
            $data = ['status' => 'error', 'data' => 'No se ha encontrado la empresa'];
            
            return response()->json($data, 404);
        }




        




        $data = ['status' => 'success', 'data' => $company];

        
        return response()->json($data, 200);

    }

    
}
