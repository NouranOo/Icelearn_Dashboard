<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\Courses\Repository\CourseRepository;
use Modules\Courses\Repository\GroupRepository;
use Modules\Student\Entities\studentLevels;
use Modules\Student\Http\Requests\StudentRequest;
use Modules\Student\Repository\ParentRepository;
use Modules\Student\Repository\StudentRepository;
use Modules\Courses\Entities\Level;
use Modules\ClassModule\Entities\Classe;
use Modules\ClassModule\Entities\ClasseStudent;


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
        $this->groupRepo = $groupRepo;
        $this->courseRepo = $courseRepo;

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $students = $this->studentRepository->findAll();

        return view('student::student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        // $groups = $this->groupRepo->findAll();
        $courses = $this->courseRepo->findAll();
        $levels = Level::all();

        // dd($courses);
        return view('student::student.create', compact(['courses', 'levels']));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'NID' => 'required|digits:14|unique:students',
            'phone' => 'required|digits:11',
            'barCode' => 'required|digits:14|unique:students',
            // 'course'=>'required',
            'photo' => 'mimes:jpeg,jpg,png | max:1000',


        ],[
            'digits'=>'  لابد رقم التلفون يتكون من 11 رقم  ... ولا بد الرقم القومي يتكون من 14 رقم  '
        ]);
        $studentData = $request->except('_token', 'photo', 'course', 'suggestedLevel', 'suggestedDay',
            'suggestedFromHour', 'suggestedToHour', 'suggestedDate', 'finallyLevel', 'finallyDay', 'finallyFromHour',
            'finallyToHour', 'finallyDate'

        );
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'student');
            $studentData['photo'] = $imageName;
        }
        // dd($request,$studentData);
        $course_id = $request->course;
        $LevelData = $request->except('_token', 'photo', 'course', 'name', 'gender',
            'NID', 'birthDate', 'age', 'phone', 'currentJob', 'mail', 'address', 'telephoneFix', 'barCode'
        );

        $student = $this->studentRepository->save($studentData, $course_id, $LevelData);

        return redirect('/admin-panel/student')->with('success', 'success');

    }

    public function getlevelsofcoursess(Request $request)
    {

        $ar = $request->courses;

        // dd($ar);

        $student = $this->studentRepository->getlevelsofcourse($ar);

    }


    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $student = $this->studentRepository->find($id);
        $studentlevels = studentLevels::where('student_id', $student->id)->get();
//        dd($studentlevels);
//        $arr = [];

        foreach ($studentlevels as $studentlevel) {
            $levels[] = Level::where('id', $studentlevel->finallyLevel)->with('course')->get();
//            array_push($arr,$levels);
        }
//        dd($levels);


        return view('student::student.show', compact('student', 'levels'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $student = $this->studentRepository->find($id);

        $studentlevel = studentLevels::where('student_id', $student->id)->orderBy('id', 'desc')->first();

        $level = Level::where('id', $studentlevel->finallyLevel)->with('course')->first();

        $allcourses = $this->courseRepo->findAll();
        $alllevels = Level::all();

        return view('student::student.Edit', compact('student', 'level', 'allcourses', 'alllevels'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
//dd($request->all());
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'NID' => 'required|digits:14', 'unique::students->ignore($id)',
            'phone' => 'required|digits:11',
            'barCode' => 'required|digits:14', 'unique::students->ignore($id)',
            'photo' => 'mimes:jpeg,jpg,png | max:1000',


        ]);

        $studentData = $request->except('_token', 'photo');
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'student');
            $studentData['photo'] = $imageName;
        }

        $student = $this->studentRepository->update($studentData, $id);


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

    public function getaddcourse($id)
    {
        $student = $this->studentRepository->find($id);

        $courses = $this->courseRepo->findAll();

        return view('student::student.addcourse', compact('student', 'courses'));

    }

    public function addcourse(Request $request)
    {
//        dd($request);
        $student = $this->studentRepository->addcourse($request->all());


        return redirect('/admin-panel/student');
    }

    public function searchBarCode(Request $request)
    {
        $student = $this->studentRepository->searchBarCode($request->all());
//        return view('student::student.index');
        return $student;
    }

    public function getstudentpayments($id)
    {
        $student = $this->studentRepository->find($id);
        return view('student::student.studentpayments',compact('student'));


    }



    /////anas////
    ////////addclasses/////

    public function addclasses($id){

        $student = $this->studentRepository->find($id);

        $classes = Classe::all();
        return view('student::student.addclasses',compact('classes','student'));

    }

    ////////storeaddclasses/////

    public function storeaddclasses(Request $request){

      
        ClasseStudent::create( $request->all());
      

       return redirect()->route('student.index')->with('success','تم الاضافه بنجاح!');
    }


}
