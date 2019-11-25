<?php

namespace Modules\Courses\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Courses\Repository\LevelRepository;
use Modules\Courses\Repository\TrackRepository;

class LevelController extends Controller
{

  private $levelRepo;

  public function __construct(LevelRepository $levelRepo,trackRepository $trackRepo)
  {
      $this->levelRepo = $levelRepo;
      $this->trackRepo = $trackRepo;
  }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
      $levels = $this->levelRepo->findAll();
        return view('courses::level.index')->with('levels',$levels);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
      $tracks=$this->trackRepo->findAll();
        return view('courses::level.create')->with('tracks',$tracks);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
      $levelData = $request->except('_token','_wysihtml5_mode');
      $levelData['created_by'] = auth()->user()->id;


      $level = $this->levelRepo->save($levelData);

      return redirect('admin-panel/levels')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
      $level = $this->levelRepo->find($id);
        return view('courses::level.show')->with('level',$level);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $level = $this->levelRepo->find($id);
      $tracks=$this->trackRepo->findAll();
        return view('courses::level.Edit',compact('level','tracks'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
      $levelData = $request->except('_token','_method','_wysihtml5_mode');
      $level = $this->levelRepo->update($id,$levelData);
      return redirect('admin-panel/levels')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
      $this->levelRepo->delete($id);

      return redirect('admin-panel/levels')->with('deleted', 'deleted');
    }
}
