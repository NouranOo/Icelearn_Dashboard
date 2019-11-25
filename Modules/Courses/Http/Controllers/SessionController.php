<?php

namespace Modules\Courses\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Courses\Entities\Attendance;
use Modules\Courses\Repository\GroupRepository;
use Modules\Courses\Repository\SessionRepository;

class SessionController extends Controller
{

    private $sessionRepo;
    private $groupRepo;


    public function __construct(
        SessionRepository $sessionRepo,
    GroupRepository $groupRepo

    )
    {
        $this->sessionRepo = $sessionRepo;
        $this->groupRepo = $groupRepo;

    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    { $sessions = $this->sessionRepo->findAll();

        return view('courses::session.index')->with('sessions',$sessions);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('courses::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store($id,Request $request)
    {
//       dd($request['attendance']);

        Attendance::where('session_id',$id)->delete();
        $arrA=[];

        foreach ($request['attendance'] as $key => $value) {
//            if ($value==1){continue;}

            $dataA['session_id'] = $id;
            $dataA['student_id'] = $key;
            $dataA['group_id']= $request['group_id'];
            $dataA['attendance']= $value;
            $dataA['created_at']= Carbon::now();
            $dataA['updated_at']= Carbon::now();
            array_push($arrA,$dataA);
        }

        Attendance::insert($arrA);

        return redirect()->back()->with('success', 'success');

    }


    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {

        $group = $this->groupRepo->find($id);
        return view('courses::session.show' , compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $session = $this->sessionRepo->find($id);
        $group = $this->groupRepo->find($session->group_id);
        $attendances = Attendance::where('session_id',$id)->get();
        return view('courses::session.edit' , compact('attendances','session','group'));
//        $session = $this->sessionRepo->find($id);
//
//        $attendances = Attendance::where('session_id',$id)->get();
//        return view('courses::session.edit' , compact('group','session','attendances'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
