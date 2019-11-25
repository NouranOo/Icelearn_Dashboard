<?php

namespace Modules\Courses\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Courses\Entities\Day;
use Modules\Courses\Entities\Session;
use Modules\Courses\Repository\CourseRepository;
use Modules\Courses\Repository\GroupRepository;
use Modules\Courses\Repository\TrackRepository;
use Modules\Courses\Repository\LevelRepository;
use Modules\Courses\Repository\CategoryRepository;
use Modules\Instructors\Repository\InstructorRepository;
use Modules\Courses\Http\Requests\CreateCourseRequest;
use Modules\Student\Repository\StudentRepository;
use Modules\WidgetsModule\Repository\SliderRepository;

class GroupController extends Controller
{

    private $courseRepo;
    private $trackRepo;
    private $levelRepo;
    private $catRepo;
    private $instructRepo;
    private $groupRepo;
    private $studentRepo;

  public function __construct(
      CourseRepository $courseRepo,
      TrackRepository $trackRepo,
      LevelRepository $levelRepo,
      CategoryRepository $catRepo,
      InstructorRepository $instructRepo,
      GroupRepository $groupRepo,
      StudentRepository $studentRepo
  )
  {
      $this->courseRepo = $courseRepo;
      $this->trackRepo = $trackRepo;
      $this->levelRepo = $levelRepo;
      $this->catRepo = $catRepo;
      $this->instructRepo = $instructRepo;
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
        return view('courses::group.index')->with('groups',$groups);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $courses = $this->courseRepo->findAll();
        $instructors = $this->instructRepo->findAll();
        $students = $this->studentRepo->findAll();
        return view('courses::group.create',compact('courses','instructors','students'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $groupData = $request->except('_token','student_id','day_id');
        $groupData['created_by'] = auth()->user()->id;
        $group = $this->groupRepo->save($groupData);
        $group = $this->groupRepo->saveSession($group,$request);



        return redirect('admin-panel/groups')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $group = $this->groupRepo->find($id);
        return view('courses::group.show')->with('group',$group);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $group = $this->groupRepo->find($id);
        $courses = $this->courseRepo->findAll();



        return view('courses::group.Edit',compact('group', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $groupData = $request->except('_token','_method','day_id');
        $group = $this->groupRepo->update($id,$groupData);
        $group = $this->groupRepo->saveSession($group,$request);
        return redirect('admin-panel/groups')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $this->groupRepo->delete($id);

        return redirect('admin-panel/groups')->with('deleted', 'deleted');
    }
}
