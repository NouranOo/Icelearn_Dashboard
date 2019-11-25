<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\Student\Http\Requests\ParentRequest;
use Modules\Student\Repository\ParentRepository;

class ParentController extends Controller
{

    use UploaderHelper;

    private $parentRepository;

    public function __construct(ParentRepository $parentRepository)
    {
        $this->parentRepository = $parentRepository;
    }
    /**
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $parents = $this->parentRepository->findAll();

        return view('student::student.index',compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('student::student.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $parentData = $request->except('_token');
        $parentData['created_by'] = auth()->user()->id;

        $parent = $this->parentRepository->save($parentData);

        return redirect('/admin-panel/student')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $parent = $this->parentRepository->find($id);

        return view('student::student.show',compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $parent = $this->parentRepository->find($id);

        return view('student::student.Edit',compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $parentData = $request->except('_token');
        $parent = $this->parentRepository->update($parentData, $id);

        return redirect('/admin-panel/student')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $parent = $this->parentRepository->delete($id);

        return redirect()->back();
    }
}
