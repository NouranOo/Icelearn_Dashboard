<?php

namespace Modules\ClassModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Courses\Entities\Course;
use Modules\Courses\Entities\Level;
use Modules\Instructors\Entities\Instructor;
use Modules\ClassModule\Entities\Classe;
use Modules\ClassModule\Entities\SubClasse;
use Modules\ClassModule\Entities\ClasseStudent;
use Modules\DegreeModule\Entities\Month;
use Modules\ClassModule\Entities\ClassDegree;








class ClassModuleController extends Controller
{
  
    public function index()
    {
        $classes = Classe::all();
        return view('classmodule::layouts.index',compact('classes'));
    }

   
    public function create()
    {

        $courses = Course::all();
        $levels = Level::all();
        $instructores = Instructor::all();
        return view('classmodule::layouts.create',compact('courses','levels','instructores'));
    }

   
    public function store(Request $request)
    {
        Classe::create($request->all());
        return redirect()->route('classindex')->with('success','تم الاضافه بنجاح');
    
    }

   

    
    public function studentclass($id)
    {
        $classe = Classe::find($id);
        return view('classmodule::studentClass.index',compact('classe'));
    }

    public function edit($id)
    {
        return view('classmodule::edit');
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $classe = Classe::find($id);
        $classe->delete();
        return back()->with('deleted','تم الحذف بنجاح');
        
    }

    public function deletestudentclass($id)
    {
        $classestudent = ClasseStudent::find($id);
        $classestudent->delete();
        return back()->with('deleted','تم الحذف بنجاح');
        
    }

////DegreeClass////
     public function DegreeClass($id){
                  $degrees = ClassDegree::where('class_id',$id)->get();
                 if($degrees->first() == null){
                    return back()->with('null','  لا يوجد درجات');

                 }
               return view('classmodule::layouts.classdegree',compact('degrees'));

      }
   
    //////subclass///
    public function subclass($id,$monthid)
    {

        $classe = Classe::find($id);
        $month = Month::find($monthid);


        return view('classmodule::subClass.index',compact('classe','month'));
    }

    

   
    public function createsubclass($id,$monthid)
    {
        $classe = Classe::find($id);
        $month = Month::find($monthid);


        return view('classmodule::subclass.create',compact('classe','month'));
    }

    public function storesubclass(Request $request)
    {
        
      SubClasse::create($request->all());

   

return redirect()->route('subclass',['id'=>$request->classe_id,'monthid'=>$request->month_id])->with('success','تم الاضافه بنجاح');
    
    }
    

    public function deletesubclass($id)
    {
        $subclasse = SubClasse::find($id);
        $subclasse->delete();
        return back()->with('deleted','تم الحذف بنجاح');
        
    }



  

}
