<?php

namespace Modules\Courses\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Courses\Repository\TrackRepository;

class TrackController extends Controller
{

  private $trackRepo;

  public function __construct(TrackRepository $trackRepo)
  {
      $this->trackRepo = $trackRepo;
  }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $tracks = $this->trackRepo->findAll();
        return view('courses::track.index')->with('tracks',$tracks);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('courses::track.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
      $trackData = $request->except('_token','_wysihtml5_mode');
      $trackData['created_by'] = auth()->user()->id;

      $track = $this->trackRepo->save($trackData);

      return redirect('admin-panel/tracks')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
      $track = $this->trackRepo->find($id);
        return view('courses::track.show')->with('track',$track);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $track = $this->trackRepo->find($id);
      // return $track;
        return view('courses::track.Edit')->with('track',$track);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
      $trackData = $request->except('_token','_method','_wysihtml5_mode');
      $track = $this->trackRepo->update($id,$trackData);
      return redirect('admin-panel/tracks')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
      $this->trackRepo->delete($id);
      return redirect('admin-panel/tracks')->with('deleted', 'deleted');
    }
}
