<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
class CustomerController extends Controller
{
    
    
    public function index()
    {
              $customer = new Customer();
              $customer=$customer->orderBy('id','DESC')->get();

              return response()->json([
                  "success" => "OK",
                  "customers" => $customer ,
              ]) ;
    }



    public function store(Request $request)
    {

       
         $customer = new Customer() ;
         $customer->name=$request->name;
         $customer->phone=$request->phone;
     

         if($customer->save()){

             return response()->json([

                   "success" => "OK",
                   "message"  => "New customer successfully"
              ]);
         }
        

        
    }

    public  function findEditCustomer($id){

              $customer= Customer::find($id);

              return response()->json([

                       "success" => "OK",
                       'customer' => $customer ,
              ]);


    }

    public function update(Request $request, $id)
    {
          $customer = Customer::find($id);
       
           $customer->name=$request->name;
           $customer->phone=$request->phone;

           if ($customer->save()) {
               
                   return response()->json([

                        "success"  => "OK",
                        "message"  => "Customer data updated successfully ",
                   ]);
           }

    }



    public function destroy($id)
    {
        $customer = new Customer();
        $customer=$customer->findOrFail($id);
        if ($customer->delete()) {
            
             return response()->json([
                 "success" => "OK",
                 "message"  => "successfully deleted this customer",
             ]);
        }
    }


}
