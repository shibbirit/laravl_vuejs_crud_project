<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              $teacher = new Teacher();
              $teacher=$teacher->orderBy('id','DESC')->get();

              return response()->json([
                  "success" => "OK",
                  "data" => $teacher ,
              ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
         $teacher = new Teacher() ;
         $teacher->name=$request->name;
         $teacher->designation=$request->designation;
         $teacher->email=$request->email;
         $teacher->institute=$request->institute ;

         if($teacher->save()){

             return response()->json([

                   "success" => "OK",
                   "message"  => "Data inserted successfully"
              ]);
         }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           return $request->all() ;

           
        $teacher = new Teacher() ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = new Teacher();
        $teacher=$teacher->findOrFail($id);
        if ($teacher->delete()) {
            
             return response()->json([
                 "succcess" => "OK",
                 "message"  => "successfully deleted one user"
             ]);
        }
    }
}
