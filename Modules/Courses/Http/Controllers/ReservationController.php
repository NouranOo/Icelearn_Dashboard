<?php

namespace Modules\Courses\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Courses\Repository\GroupRepository;
use Modules\Student\Repository\StudentRepository;

class ReservationController extends Controller
{
    private $studentRepo;
    private $groupRepo;

    public function __construct(
        GroupRepository $groupRepo,
        StudentRepository $studentRepo
    )
    {
        $this->groupRepo = $groupRepo;
        $this->studentRepo = $studentRepo;
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $groups = $this->groupRepo->findAll();
        $students = $this->studentRepo->findAll();

        return view('courses::reservation.index',compact('groups','students'));
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
    public function store(Request $request)
    {

        DB::table('group_student')->insert(
            ['group_id' => $request['group_id'], 'student_id' => $request['student_id']]
        );
            return redirect()->back()->with('success','success');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('courses::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('courses::edit');
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
