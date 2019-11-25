<?php

namespace Modules\Student\Repository;



use Modules\Student\Entities\Guardian;

class ParentRepository /*implements the interface*/
{
    # Show
    public function find($id)
    {
        $ParentStudent = Guardian::where('id', $id)->first();

        return $ParentStudent;
    }

    # Index
    public function findAll()
    {
        $ParentStudents = Guardian::all();

        return $ParentStudents;
    }

    # Insert
    public function save($ParentStudentData)
    {
        $ParentStudent = Guardian::create($ParentStudentData);
        return $ParentStudent;
    }

    # Edit
    public function update($ParentStudentData,$id)
    {
        // CODE HERE.

        $ParentStudent = Guardian::find($id)->update($ParentStudentData);
        return $ParentStudent;

    }

    # Destroy
    public function delete($id)
    {
        Guardian::destroy($id);
    }
}
