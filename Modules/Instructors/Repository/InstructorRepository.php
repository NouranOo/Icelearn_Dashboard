<?php

namespace Modules\Instructors\Repository;



use Modules\Instructors\Entities\Instructor;

class InstructorRepository /*implements the interface*/
{
    # Show
    public function find($id)
    {
        $instructor = Instructor::where('id', $id)->first();

        return $instructor;
    }

    # Index
    public function findAll()
    {
        $instructors = Instructor::all();

        return $instructors;
    }

    # Insert
    public function save($instructorData)
    {
        $instructor = Instructor::create($instructorData);

        return $instructor;
    }

    # Edit
    public function update($instructorData,$id)
    {
        // CODE HERE.

        $instructor = Instructor::find($id)->update($instructorData);
        return $instructor;

    }

    # Destroy
    public function delete($id)
    {
        Instructor::destroy($id);
    }
}
