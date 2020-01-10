<?php

namespace Modules\DegreeModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ClassModule\Entities\Classe;
use Modules\ClassModule\Entities\SubClasse;
use Modules\ClassModule\Entities\ClasseStudent;
use Modules\DegreeModule\Entities\DegreeDetail;
use Modules\DegreeModule\Entities\DegreeSubView;

use Modules\DegreeModule\Entities\MonthDegree;


use Modules\DegreeModule\Entities\Month;

use Illuminate\Support\Facades\DB;




class DegreeModuleController extends Controller
{
   
    


    public function index($id,$monthid){
       
        $subclasse =SubClasse::find($id);
        $flag = 0;
        $arr =[];
        $degree =  DegreeDetail::where('subclasse_id',$id)->get();

        foreach ($degree as $degre){
            if($degre->total != null){
                $arr [] = $degre->student_id;
            }
    }
        if($degree->first() == null){
            return view('degreemodule::degree.index',compact('subclasse','monthid'));
        }
       
     
        
        $degreedetail =  DB::table('degree_details')->where('subclasse_id',$id)->get();
        

       return view('degreemodule::degree.show',compact('subclasse','degree','degreedetail','monthid','arr','flag'));
    }

    
    public function create()
    {
        return view('degreemodule::create');
    }

  
    public function store(Request $request)
    {
     
        $subclasse =SubClasse::find($request->subclasse_id);
       
 
       foreach($request->item as $item){

            $degreedetail = new DegreeDetail();

            $degreedetail->subclasse_id = $request->subclasse_id;
            $degreedetail->class_id = $request->class_id;
            $degreedetail->month_id = $request->month_id;


            $degreedetail->student_id = $item['student_id'];
            $degreedetail->attendance = $item['attendance'];
            $degreedetail->homework = $item['homework'];
            $degreedetail->action = $item['action'];
            $degreedetail->total = $item['total'];

            $degreedetail->save();
       }
      
       return redirect()->route('classindex')->with('success','تم الاضافه بنجاح');

    


    }

  
    public function updateSubDegrees(Request $request){

  $getdegree = DegreeDetail::where([
    ['subclasse_id', '=', $request->subclasse_id],
    ['student_id', '=', $request->student_id],])->first();

    


    if($getdegree == null){

        
        

        $degreedetail = new DegreeDetail();


        $degreedetail->student_id = intval($request->student_id);
        $degreedetail->subclasse_id = intval($request->subclasse_id);
        $degreedetail->class_id = intval($request->classe_id);
        $degreedetail->month_id = intval($request->month_id);
        
        $degreedetail->attendance = $request->attendance;
        $degreedetail->homework = $request->homework;
        $degreedetail->action = $request->action;
        $degreedetail->total = $request->total;


        $degreedetail->save();

        
      
    }else{
       
      
        

      $getdegree->update([
          'attendance'=> $request->attendance,
          'homework'=> $request->homework,
          'action'=> $request->action,
          'total'=> $request->total,
      ]);
    }


      return response()->json(['success'=>'تم التحديث بنجاح!']);

 }

    
  
      //////month///
      public function monthNew($id)
      {
          
          
          $classe = Classe::find($id);
    
          return view('degreemodule::month.index',compact('classe'));
      }

     


      public function createmonth($id)
    {
        $classe = Classe::find($id);

        return view('degreemodule::month.create',compact('classe'));
    }

    public function storemonth(Request $request)
    {
       
         Month::create($request->all());
        return redirect()->route('month.all',$request->classe_id)->with('success','تم الاضافه بنجاح');
    
    }
    public function deleteMonth($id)
    {
        $month = Month::find($id);
        $month->delete();
        return back()->with('deleted','تم الحذف بنجاح');
        
    }

    public function addMonthDegree($id , $monthid)
    {
        $classe = Classe::find($id);
        $month =Month::find($monthid);
       $totSubDegs =  DegreeSubView::where('month_id',$monthid)->get();
      
       $monthDegs = MonthDegree::where('month_id',$monthid)->get();
       if($monthDegs->first() == null){

        return view('degreemodule::month.addMonthDegree',compact('classe','month','totSubDegs'));
       }else{
        return view('degreemodule::month.showMonthDegree',compact('classe','month','monthDegs'));
       }
      
        

       return view('degreemodule::month.addMonthDegree',compact('classe','month','totSubDegs'));
    }

    public function storeMonthDegree(Request $request){
        

        
         foreach($request->item as $item){

            $monthDegree = new  MonthDegree();

           
            $monthDegree->class_id = $request->class_id;
            $monthDegree->month_id = $request->month_id;

            $monthDegree->student_id = $item['student_id'];
            
            $monthDegree->lasttoteldeg = $item['lasttoteldeg'];
            $monthDegree->projectdegree = $item['projectdegree'];
            $monthDegree->total = $item['total'];
            $monthDegree->status = $item['status'];

            $monthDegree->save();
       }
       
      
       return redirect()->route('classindex')->with('success','تم الاضافه بنجاح');

    }

    

      
    public function updateMonthDegrees(Request $request){
       
        $getdegree = MonthDegree::where([
          ['month_id', '=', $request->month_id],
          ['student_id', '=', $request->student_id],])->first();
      
          
      
      
          if($getdegree == null){

            $monthDegree = new  MonthDegree();
            $monthDegree->month_id = $request->month_id;
            $monthDegree->student_id = $request->student_id;
            $monthDegree->lasttoteldeg = $request->lasttoteldeg;
            $monthDegree->projectdegree = $request->projectdegree;
            $monthDegree->total = $request->total;
            $monthDegree->status = $request->status;
            $monthDegree->save();
            
          }else{
            $getdegree->update([
                'lasttoteldeg'=> $request->lasttoteldeg,
                'projectdegree'=> $request->projectdegree,
                'total'=> $request->total,
                'status'=> $request->status,
            ]);
          }
      
      
            return response()->json(['success'=>'تم التحديث بنجاح!']);
      
       }
}
