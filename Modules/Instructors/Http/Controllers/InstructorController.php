<?php

namespace Modules\Instructors\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Instructors\Http\Requests\CreateInstructorRequest;
use Modules\Instructors\Repository\InstructorRepository;
use Modules\CommonModule\Helper\UploaderHelper;

class InstructorController extends Controller
{

    use UploaderHelper;

    private $instructorRepository;

    public function __construct(InstructorRepository $instructorRepository)
    {
        $this->instructorRepository = $instructorRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $instructors = $this->instructorRepository->findAll();
        return view('instructors::instructor.index',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('instructors::instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $instructorData = $request->except('_token', '_wysihtml5_mode','photo','cv');
        $instructorData['created_by'] = auth()->user()->id;


        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'instructor');
            $instructorData['photo'] = $imageName;
        }
        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $fileName = $this->uploadFile($file,'cv');
            $instructorData['cv'] = $fileName;
        }
        $instructor = $this->instructorRepository->save($instructorData);

        return redirect('/instructors/instructors')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $instructor = $this->instructorRepository->find($id);

        return view('instructors::instructor.show',compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $instructor = $this->instructorRepository->find($id);
//        dd($instructor);

        return view('instructors::instructor.Edit',compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
        

        $instructorData = $request->except('_token', '_wysihtml5_mode','photo','cv');
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'instructor');
            $instructorData['photo'] = $imageName;
        }
        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $fileName = $this->uploadFile($file,'cv');
            $instructorData['cv'] = $fileName;
        }

        $this->instructorRepository->update($instructorData,$id);
        return redirect('/instructors/instructors')->with('success', 'success');


    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {

        $instructor = $this->instructorRepository->delete($id);
        return redirect()->back();
    }
}
