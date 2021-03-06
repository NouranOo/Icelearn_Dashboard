<?php

namespace Modules\Courses\Repository;

use Modules\Courses\Entities\Level;


class LevelRepository /*implements the interface*/
{
  # Show
  public function find($id)
  {
    $level = Level::with(['course','students'])->where('id', $id)->first();
//dd($level);
    return $level;
  }

  # Index
  public function findAll()
  {
    $levels = Level::with('course')->get();


    return $levels;
  }

  # Insert
  public function save($levelData)
  {
    $level = Level::create($levelData);

    return $level;
  }

  # Edit
  public function update($id,$levelData)
  {
    $level = Level::where('id', $id)->first();
    $level->update($levelData);
    return $level;
  }

  # Destroy
  public function delete($id)
  {
    Level::destroy($id);
  }
}
