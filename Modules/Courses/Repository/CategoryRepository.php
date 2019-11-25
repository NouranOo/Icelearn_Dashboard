<?php

namespace Modules\Courses\Repository;

use Modules\Courses\Entities\CourseCategory;


class CategoryRepository /*implements the interface*/
{
  # Show
  public function find($id)
  {
    $category = CourseCategory::where('id', $id)->first();

    return $category;
  }

  # Find all parents
  public function findParents()
  {
      $categories = CourseCategory::with(['parent', 'child'])->where('parent_id', 0)->get();

      return $categories;
  }

  # Index
  public function findAll()
  {
    $categs = CourseCategory::with(['parent','child'])->get();

    return $categs;
  }

  # Insert
  public function save($categoryData)
  {
    $categ = CourseCategory::create($categoryData);

    return $categ;
  }

  # Edit
  public function update($id, $data, $data_trans)
  {
    $category = CourseCategory::find($id);
    $category->update($data);

    return $category;
  }

  # Destroy
  public function delete($id)
  {
      CourseCategory::destroy($id);
  }
}
