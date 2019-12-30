<?php

namespace Modules\DegreeModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ClassModule\Entities\Classe;
use Modules\ClassModule\Entities\SubClasse;
use Modules\ClassModule\Entities\ClasseStudent;
use Modules\DegreeModule\Entities\Degree;
use Modules\DegreeModule\Entities\DegreeDetail;
use Modules\DegreeModule\Entities\Month;

use Illuminate\Support\Facades\DB;




class DegreeModuleController extends Controller
{
   
    public function index($id)
    {
        $subclasse =SubClasse::find($id);
        $degree =  DB::table('degree_details')->where('subclasse_id',$id)->get();
        if($degree->first() == null){
            return view('degreemodule::degree.index',compact('subclasse'));
        }
       
     
        
        $degreedetail =  DB::table('degree_details')->where('subclasse_id',$id)->get();
        

       return view('degreemodule::degree.show',compact('subclasse','degree','degreedetail'));
    }

    
    public function create()
    {
        return view('degreemodule::create');
    }

  
    public function store(Request $request)
    {
        $subclasse =SubClasse::find($request->subclasse_id);
        // $degree = Degree::create([
        //     'subclasse_id' => $request->subclasse_id,
        //     'class_id' =>$request->class_id,
        // ]);
 
       foreach($request->item as $item){

            $degreedetail = new DegreeDetail();

            $degreedetail->subclasse_id = $request->subclasse_id;
            $degreedetail->class_id = $request->class_id;

            $degreedetail->student_id = $item['student_id'];
            $degreedetail->attendance = $item['attendance'];
            $degreedetail->homework = $item['homework'];
            $degreedetail->action = $item['action'];
            $degreedetail->total = $item['total'];

            $degreedetail->save();
       }
      
       return redirect()->route('classindex')->with('success','تم الاضافه بنجاح');

    //    return view('degreemodule::degree.show',compact('subclasse'));


    }

  
    public function show($id)
    {
        $subclasse =SubClasse::find($id);
        $degree =  DB::table('degrees')->where('subclasse_id',$id)->get();
        
       

        $degreedetail =  DB::table('degree_details')->where('degree_id',$degree->first()->id)->get();
        
        dd($degreedetail);
       return view('degreemodule::degree.show',compact('subclasse','degree','degreedetail'));

        

    }

    
  

  

      //////month///
      public function month($id)
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
        return redirect()->route('month',$request->classe_id)->with('success','تم الاضافه بنجاح');
    
    }


    public function addMonthDegree($id , $monthid)
    {
        $subclasse =SubClasse::find($id);
        $month =Month::find($monthid);

        // $degree =  DB::table('degree_details')->where('subclasse_id',$id)->get();
        // if($degree->first() == null){
        //     return view('degreemodule::degree.index',compact('subclasse'));
        // }
       
     
        
        $degreedetail =  DB::table('degree_details')->where('subclasse_id',$id)->get();
        

       return view('degreemodule::month.addMonthDegree',compact('subclasse','month'));
    }
}
