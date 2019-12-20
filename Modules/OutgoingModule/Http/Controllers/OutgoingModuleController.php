<?php

namespace Modules\OutgoingModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\OutgoingModule\Entities\Outgoing;

use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class OutgoingModuleController extends Controller
{
    
    public function index()
    {

      $outgoings = Outgoing::all();

      return view('outgoingmodule::index',compact('outgoings'));
    }

  
    public function create()
    {
        return view('outgoingmodule::create');
    }

   
    public function store(Request $request)
    {
       
        Outgoing::create($request->all());

        return redirect()->route('outgoing.index')->with('success','تم الاضافه بنجاح');
    }

 
    public function show($id)
    {
        return view('outgoingmodule::show');
    }

   
    public function edit($id)
    {
        $outgoing = Outgoing::find($id);
        return view('outgoingmodule::edit',compact('outgoing'));
    }

   
    public function update(Request $request, $id)
    {
        $outgoing = Outgoing::where('id', $id)->first();
        $outgoing->update($request->all());
        return redirect()->route('outgoing.index')->with('updated','تم hg بنجاح');

    }

    
    public function destroy($id)
    {
        $outgoing = Outgoing::where('id', $id)->first();
        $outgoing->delete();
        return redirect()->route('outgoing.index')->with('deleted','تم hg بنجاح');

    }





    //////storestatistical//////

public function storestatistical(){

    $from  =  Carbon::createFromDate(2016, 12, 01, 'Africa/Cairo');
    $to    =  Carbon::now(); 



    $totalpayments = DB::table('payments')
    ->select(DB::raw('SUM(money) as total_value'))
    ->whereBetween('payments.date',[$from,$to]);
    $totalpayments = $totalpayments->first()->total_value;

    
  
    
  
    $totaloutgoing = DB::table('outgoings')
    ->select(DB::raw('SUM(money) as total_value'))
    ->whereBetween('outgoings.date',[$from,$to]);
    $totaloutgoing = $totaloutgoing->first()->total_value;

   


    $safy = $totalpayments - $totaloutgoing;

   

  
  

    return view('outgoingmodule::storestatistic',compact('totalpayments','totaloutgoing','safy'));

}


public function dostorestatistical(Request $request){


  $from = $request->from;
  $to = $request->to;
//   $from = date("Y-m-d H:i:s",strtotime($from));
//   $to   = date("Y-m-d H:i:s",strtotime($to." "."23:59:59" ));



  
  $totalpayments = DB::table('payments')
  ->select(DB::raw('SUM(money) as total_value'))
  ->whereBetween('payments.date',[$from,$to]);
 

  $totalpayments = $totalpayments->first()->total_value;
  


  
  $totaloutgoing = DB::table('outgoings')
    ->select(DB::raw('SUM(money) as total_value'))
    ->whereBetween('outgoings.date',[$from,$to]);

    $totaloutgoing = $totaloutgoing->first()->total_value;

   


 $safy = $totalpayments - $totaloutgoing;




 return view('outgoingmodule::storestatistic',compact('totalpayments','totaloutgoing','safy'));

}


















}
