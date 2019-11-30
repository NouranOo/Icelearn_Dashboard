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
        $student = Student::where('id', $id)->first();

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
    public function save($data,$course_id,$suggestedLevel,$finallyLevel)
    {
         
        $data['created_by'] = auth()->user()->id;
        $student = Student::create($data);
        // $studentCourse = CourseStudent::create( $course_id);
        $studentCourse = new CourseStudent();
        $studentCourse->student_id = $student->id;
        $studentCourse->course_id = $course_id;
        $studentCourse->save();
        // $studentLevels = studentLevels::create(['student_id'=>$student->id,
        //                                         'level_id' =>$levelId
        //                                         ]);
        $studentLevels = new studentLevels();
        $studentLevels->student_id = $student->id;
        $studentLevels->suggestedLevel = $suggestedLevel;
        $studentLevels->finallyLevel = $finallyLevel;

        if(!empty($data->suggestedCoach)){

            $studentLevels->suggestedCoach = $data->suggestedCoach;
        }
        if(!empty($data->suggestedDay)){
            $studentLevels->suggestedDay = $data->suggestedDay;
        }
        if(!empty($data->suggestedFromHour)){
            $studentLevels->suggestedFromHour = $data->suggestedFromHour;
        }
        if(!empty($data->suggestedToHour)){
            $studentLevels->suggestedToHour = $data->suggestedToHour;
        }
        if(!empty($data->suggestedDate)){
            $studentLevels->suggestedDate = $data->suggestedDate;
        }
        if(!empty($data->finallyCoach)){
            $studentLevels->finallyCoach = $data->finallyCoach;
        }
        if(!empty($data->finallyDay)){
            $studentLevels->finallyDay = $data->finallyDay;
        }
        if(!empty($data->finallyFromHour)){
            $studentLevels->finallyFromHour = $data->finallyFromHour;
        }
        if(!empty($data->finallyToHour)){
            $studentLevels->finallyToHour = $data->finallyToHour;
        }
        if(!empty($data->finallyDate)){
            $studentLevels->finallyDate = $data->finallyDate;
        }
        $studentLevels->save();

        // $cousrsIds= $course;
        // dd($cousrsIds);
        # Save Guardian
        // $guardianData = $request->except('_token','name','nationality','phone','birthDate','age','gender','type','group_id','NID'
        //     ,'schoolName','schoolAdd','schoolType','grade','downPayment','mail');
        // $guardianData['created_by'] = auth()->user()->id;
        // $guardian = Guardian::create($guardianData);

        # Save Student
        // $age = \Carbon\Carbon::parse($request->birthDate)->diff(\Carbon\Carbon::now())->format('%y');
        // $studentData['age']=$age;
        // $studentData['guardian_id'] = $guardian->id;
        // dd($student);
        # courses save 
        // foreach($cousrsIds as $id){
        //     $studentCourse = new CourseStudent();
        //     $studentCourse->student_id = $student->id;
        //     $studentCourse->course_id = $id;
        //     $studentCourse->save();

        // }
        
        # Save Student -> Group
        // $group = Group::find($request['group_id']);
        // $studentGroup['student_id']= $student->id;
        // $group->students()->attach($studentGroup);

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
        # Update Guardian
        // $guardianData = $request->except('_token','_method','name','nationality','phone','birthDate','age','gender','type','group_id','NID'
        //     ,'schoolName','schoolAdd','schoolType','grade');
        // $guardianData['created_by'] = auth()->user()->id;
        // $guardian = Guardian::find($student->guardian_id);
        // $guardian->update($guardianData);

        # Update Student
        // $age = \Carbon\Carbon::parse($request->birthDate)->diff(\Carbon\Carbon::now())->format('%y');
 
        // $studentData['age']=$age;
        $data['created_by'] = auth()->user()->id;
        // $studentData['guardian_id'] = $guardian->id;
        $student->update($data );
        // dd($student);

        # Update Student -> Group

//        $group = Group::find($request['group_id']);
//        $studentGroup['group_id']=$group->id;
//        $studentGroup['student_id']= $student->id;
//        $group->students()->sync($studentGroup);

        // $group = Group::find($request['group_id']);
        // $studentGroup['student_id']= $student->id;
        // $group->students()->sync($studentGroup);


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
