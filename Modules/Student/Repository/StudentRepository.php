<?php

namespace Modules\Student\Repository;



use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Courses\Entities\Group;
use Modules\Courses\Entities\Course;
use Modules\Courses\Entities\CourseStudent;
use Modules\Student\Entities\Guardian;
use Modules\Student\Entities\Student;
use Modules\Courses\Entities\Level;
use Modules\Student\Entities\studentLevels;

class StudentRepository /*implements the interface*/
{
    # Show
    public function find($id)
    {
        // $student = Student::where('id', $id)->first();
        $student = Student::where('id', $id)->with(['courses','levels'])->first();
        // dd($student);
        return $student;
    }
 
    # Index
    public function findAll()
    {
        $students = Student::orderBy('created_at','desc')->get();
        // $students = Student::with('courses')->get();
        // dd($students);
        return $students;
    }

    # Insert
    public function save($data,$course_id,$LevelData)
    {
         
        $data['created_by'] = auth()->user()->id;
        $student = Student::create($data);
        // dd($student);
        
        #Student_Level    
        $LevelData['student_id'] = $student->id;
        $studentLevels = studentLevels::create($LevelData);
        // dd($studentLevels);

        #Course_Student
        // $studentCourse = CourseStudent::create( $course_id);
        $studentCourse = new CourseStudent();
        $studentCourse->student_id = $student->id;
        $studentCourse->course_id = $course_id;
        $studentCourse->save();

       
        
    }
    public function addcourse(){
        
    }
    public function getlevelsofcourse($courses)
    {
       
       
    
        foreach($courses as $course){
            $levels[] = Level::where('course_id',$course)->get();
        }
        // dd($title);
        // dd($levels);
        return $levels;
    }

    # Edit
    public function update($data,$id)
    {
        $student = Student::findorfail($id);
       
        $data['created_by'] = auth()->user()->id;
        // $studentData['guardian_id'] = $guardian->id;
        $student->update($data );
       


    }

    # Destroy
    public function delete($id)
    {
        // dd("sd");
        Student::destroy($id);
    }

//    public function saveParent($request)
//    {
//        $guardianData = $request->except('_token','name','nationality','phone','birthDate','age','gender','type','group_id','NID'
//            ,'schoolName','schoolAdd','schoolType','grade');
//        $guardianData['created_by'] = auth()->user()->id;
//        $guardian = Guardian::create($guardianData);
//        return $guardian;
//
//
//    }
}
