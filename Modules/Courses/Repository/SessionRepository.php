<?php

namespace Modules\Courses\Repository;

use Modules\Courses\Entities\Session;


class SessionRepository /*implements the interface*/
{
  # Show
  public function find($id)
  {
    $session = Session::where('id', $id)->first();

    return $session;
  }

  # Index
  public function findAll()
  {
    $sessions = Session::all();

    return $sessions;
  }

  # Insert
  public function save($sessionData)
  {
    $session = Session::create($sessionData);

    return $session;
  }

  # Edit
  public function update($id,$sessionData)
  {
    $session = Session::where('id', $id)->first();
    $session->update($sessionData);

    return $session;
  }

  # Destroy
  public function delete($id)
  {
    $session = Session::where('id', $id)->first();
    $session->delete();
  }
}
