<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\Courses\Repository\CourseRepository;
use Modules\Courses\Repository\GroupRepository;
use Modules\Student\Http\Requests\StudentRequest;
use Modules\Student\Repository\ParentRepository;
use Modules\Student\Repository\StudentRepository;

class StudentController extends Controller
{

    use UploaderHelper;

    private $studentRepository;
    private $parentRepository;
    private $groupRepo;
    private $courseRepo;

    public function __construct
    (
        StudentRepository $studentRepository,
        ParentRepository $parentRepository,
        GroupRepository $groupRepo,
        CourseRepository $courseRepo)

    {

        $this->parentRepository = $parentRepository;
        $this->studentRepository = $studentRepository;
        $this->groupRepo=$groupRepo;
        $this->courseRepo=$courseRepo;

    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $students = $this->studentRepository->findAll();

        return view('student::student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $groups = $this->groupRepo->findAll();
        $courses = $this->courseRepo->findAll();
        // dd($courses);
        return view('student::student.create',compact(['groups','courses']));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $student = $this->studentRepository->save($request);

        return redirect('/admin-panel/student')->with('success', 'success');

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $student = $this->studentRepository->find($id);

        return view('student::student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $student = $this->studentRepository->find($id);
        $groups = $this->groupRepo->findAll();

        return view('student::student.Edit',compact('student','groups'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {

        $student = $this->studentRepository->update($request,$id);

        return redirect('/admin-panel/student')->with('updated', 'updated');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        
        $student = $this->studentRepository->delete($id);
        return redirect()->back();
    }


}
