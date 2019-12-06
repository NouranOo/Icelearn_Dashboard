<?php

namespace Modules\Courses\Repository;

use Modules\Courses\Entities\Course;


class CourseRepository /*implements the interface*/
{
  # Show
  public function find($id)
  {
    $course = Course::where('id', $id)->first();

    return $course;
  }

  # Index
  public function findAll()
  {
    // $courses = Course::all();
    $courses = Course::with('levels')->get();
    // dd($courses);
    return $courses;
  }

  # Insert
  public function save($courseData)
  {
    $course = Course::create($courseData);

    return $course;
  }

  # Edit
  public function update($id,$courseData)
  {
    $course = Course::where('id', $id)->first();
    $course->update($courseData);

    return $course;
  }

  # Destroy
  public function delete($id)
  {
    $course = Course::where('id', $id)->first();
    $course->delete();
  }
}
