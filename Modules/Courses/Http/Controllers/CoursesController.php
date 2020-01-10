<?php

namespace Modules\Courses\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Courses\Repository\CourseRepository;
use Modules\Courses\Repository\TrackRepository;
use Modules\Courses\Repository\LevelRepository;
use Modules\Courses\Repository\CategoryRepository;
use Modules\Instructors\Repository\InstructorRepository;
use Modules\Courses\Http\Requests\CreateCourseRequest;

class CoursesController extends Controller
{

    private $courseRepo;
    private $trackRepo;
    private $levelRepo;
    private $catRepo;
    private $instructRepo;

  public function __construct(
      CourseRepository $courseRepo,
      TrackRepository $trackRepo,
      LevelRepository $levelRepo,
      CategoryRepository $catRepo,
      InstructorRepository $instructRepo
  )
  {
      $this->courseRepo = $courseRepo;
      $this->trackRepo = $trackRepo;
      $this->levelRepo = $levelRepo;
      $this->catRepo = $catRepo;
      $this->instructRepo = $instructRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $courses = $this->courseRepo->findAll();
        return view('courses::course.index')->with('courses',$courses);
    }

    
    public function create()
    {
        $tracks = $this->trackRepo->findAll();
        $levels = $this->levelRepo->findAll();
        $categories = $this->catRepo->findParents();
        $instructors = $this->instructRepo->findAll();
        return view('courses::course.create',compact('tracks','levels','categories','instructors'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'

        ]);
        $courseData = $request->except('_token','instructor_id');

        // $courseData['created_by'] = auth()->user()->id;
        $course = $this->courseRepo->save($courseData);
        // $course->categories()->sync($request['category_id']);
        $course->instructors()->sync($request['instructor_id']);

        return redirect('admin-panel/courses')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $course = $this->courseRepo->find($id);
        return view('courses::course.show')->with('course',$course);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $course = $this->courseRepo->find($id);
        // $tracks = $this->trackRepo->findAll();
        // $levels = $this->levelRepo->findAll();
        // $categories = $this->catRepo->findParents();
        $instructors = $this->instructRepo->findAll();



        // foreach ($course->categories as $value) {
        //     $selected_categ_ids[] = $value->id;
        // }

        return view('courses::course.Edit',compact('course','instructors'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
        
        
        $courseData = $request->except('_token','_method','category_id','instructor_id');
        $course = $this->courseRepo->update($id,$courseData);
        
        $course->instructors()->sync($request['instructor_id']);

        return redirect('admin-panel/courses')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $this->courseRepo->delete($id);

        return redirect('admin-panel/courses')->with('deleted', 'deleted');
    }

//////anas/////
    public function viewlevels($id)
    {
        $course = $this->courseRepo->find($id);
        return view('courses::course.course_levels',compact('course'));

    }


    public function coursepayments($id){
        $course = $this->courseRepo->find($id);
        return view('courses::course.coursepayments',compact('course'));


    }
    public function viewstudents($id)
    {
        $course = $this->courseRepo->find($id);

//dd($course);
        return view('courses::course.course_students',compact('course'));


    }
}
