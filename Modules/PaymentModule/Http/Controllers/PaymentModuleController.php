<?php

namespace Modules\PaymentModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Courses\Entities\Course;
use Modules\Student\Entities\Student;
use Modules\PaymentModule\Entities\Payment;
use Illuminate\Support\Facades\DB;


class PaymentModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $payments= Payment::all();
        return view('paymentmodule::payment.index',compact('payments'));
    }

    public function create()
    {
        $courses =Course::all();
        return view('paymentmodule::payment.create',compact('courses'));
    }

    public function searchpayment(){

        return view('paymentmodule::payment.search');
    }


    public function dosearchpayment(Request $request){
        $courses =Course::all();
        $search = $request->input('search');
        
    
        $students = Student::where([ 
            ['barCode', 'LIKE', '%' . $search . '%'],
           
        ])->get();
 
        return view('paymentmodule::payment.create',compact('students','courses'));
    }
   
    public function store(Request $request)
    {
       
        
        $request->validate([
            'name'=>'required',
            'course_id'=>'required',
            'level_id'=>'required',
            'code'=>'required',
            'money'=>'required',
            'type_payment'=>'required',

        ]);

       

        $payment =Payment::create($request->all());
    
       return redirect()->route('allpayment');
    }


   

    
    public function viewpayment($id){
       $payment = Payment::find($id);
       $course =DB::table('courses')->where('id',$payment->course_id)->get();
       $level =DB::table('levels')->where('id',$payment->level_id)->get();

     

       return view('paymentmodule::payment.viewpayment',compact('payment','course','level'));




    }


    public function deletepayment($id)
    {

        DB::table('payments')->where('id',$id)->delete();

        
      
        return redirect()->route('allpayment');

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
