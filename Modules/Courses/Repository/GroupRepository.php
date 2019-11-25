<?php

namespace Modules\Courses\Repository;

use Carbon\Carbon;
use Modules\Courses\Entities\Course;
use Modules\Courses\Entities\Day;
use Modules\Courses\Entities\Group;
use Modules\Courses\Entities\Session;


class GroupRepository /*implements the interface*/
{
  # Show
  public function find($id)
  {
    $group = Group::where('id', $id)->first();

    return $group;
  }

  # Index
  public function findAll()
  {
    $groups = Group::all();

    return $groups;
  }

  # Insert
  public function save($groupData)
  {
    $group = Group::create($groupData);
    return $group;
  }

  # Edit
  public function update($id,$groupData)
  {
    $group = Group::where('id', $id)->first();
    $group->update($groupData);
    return $group;
  }

  # Destroy
  public function delete($id)
  {
    $group = Group::where('id', $id)->first();
    $group->delete();
  }

  public function saveSession($group,$request){

      $group = Group::where('id', $group->id)->first();

      if (is_array($request['day_id'])){

          Day::where('group_id',$group->id)->delete();

          $arrD=[];

          foreach ($request['day_id'] as $key => $value) {

              $dataD['day_id'] = $value;
              $dataD['group_id'] = $group->id;
              $dataD['created_at']= Carbon::now();
              $dataD['updated_at']= Carbon::now();
              array_push($arrD,$dataD);
          }
      Day::insert($arrD);

      }


      $avg=$request['allSessions']/$request['sessionsPerWeek'];
      $date = strtotime($request['groupStartDate']);
      $DateFday = date("D",strtotime($request['groupStartDate']));
      $orignalDate = date("Y-m-d",strtotime($request['groupStartDate']));
      $firstDay=$request['day_id'][0];


      for ($i = 0; $i < $avg; $i++) {
          foreach ($request['day_id'] as $day) {
              $sessionDate[] = date("Y-m-d", strtotime('next ' . $day, $date));
          }
          $date = strtotime(end($sessionDate));

      }

//dd($sessionDate);
      if ($firstDay == $DateFday){
          array_shift($sessionDate);
          array_unshift($sessionDate,$orignalDate);
      }

      if (count($sessionDate) != $request['allSessions']){
          $sessionDate = array_slice($sessionDate, 0, $request['allSessions']);

      }

      //dd($sessionDate);
      Session::where('group_id',$group->id)->delete();

      $arrS=[];

      foreach ($sessionDate as $key => $value) {

              $dataS['sessionDate'] = $value;
              $dataS['group_id'] = $group->id;
          $dataS['created_at']= Carbon::now();
          $dataS['updated_at']= Carbon::now();
          array_push($arrS,$dataS);


      }

      Session::insert($arrS);

  }
}
