<?php

namespace Modules\AttendanceModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ClassModule\Entities\Classe;
use Modules\ClassModule\Entities\SubClasse;
use Modules\Student\Entities\Student;
use Illuminate\Support\Facades\DB;
use Modules\AttendanceModule\Entities\Attendance;


class AttendanceModuleController extends Controller
{
   
    public function index($id)
    {
        $subclasse =SubClasse::find($id);
        $flag = 0;

        $attendance =  DB::table('attendances')->where('sub_classe_id',$id)->get();

        foreach ($attendance as $attend){
                if($attend->attendance == 'true'){
                    $arr [] = $attend->student_id;
                }
        }
        
        
      
    if($attendance->first() == null){
        return view('attendancemodule::attendance',compact('subclasse'));
    }else{

        return view('attendancemodule::show',compact('subclasse','attendance','arr','flag'));
     }
    }

    public function search(Request $request)
    {
    

     $search = $request->input('search');
     

     
            if($search != null){
                $students = Student::where('barcode',$search)->first();
           
                
               
                if ($students != null):
                   
                   return response()->json(['data' => $students, 'messages' => null, 'status' => 1]);
           
                 
               else:
                   return response()->json(['data' => null, 'messages' =>'لا يوجد طلاب  بهذا الباركود', 'status' => 0]);
               endif;
              
            
    

        }else{
            return response()->json(['data' => null, 'messages' =>'لا يوجد طلاب  بهذا الباركود', 'status' => 0]);
        }
    }
   
    public function create()
    {
        return view('attendancemodule::create');
    }

   
    public function store(Request $request)
    {
    
        for ($i=1;$i <= count($request['item']);$i++):
            $attendance = new Attendance();

            $attendance->classe_id = $request->classe_id;
            $attendance->sub_classe_id =$request->subclasse_id;
            $attendance->student_id = $request['item'][$i]['id'];
            $attendance->attendance = $request['item'][$i]['attandance'];


            $attendance->save();


     
        endfor;
        return redirect()->route('attendance.index',$request->subclasse_id)->with('success','تم الاضافه بنجاح');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('attendancemodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('attendancemodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
