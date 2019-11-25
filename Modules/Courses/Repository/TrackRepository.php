<?php

namespace Modules\Courses\Repository;

use Modules\Courses\Entities\Track;


class TrackRepository /*implements the interface*/
{
  # Show
  public function find($id)
  {
    $track = Track::where('id', $id)->first();

    return $track;
  }

  # Index
  public function findAll()
  {
    $tracks = Track::all();

    return $tracks;
  }

  # Insert
  public function save($trackData)
  {
    $track = Track::create($trackData);

    return $track;
  }

  # Edit
  public function update($id,$trackData)
  {
    $track = Track::where('id', $id)->first();
    $track->update($trackData);
    return $track;
  }

  # Destroy
  public function delete($id)
  {
    $track = Track::where('id', $id)->first();
    $track->levels()->delete();
    $track->delete();
  }
}
