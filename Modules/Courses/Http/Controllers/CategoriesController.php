<?php

namespace Modules\Courses\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\Courses\Repository\CategoryRepository;

class CategoriesController extends Controller
{

    use UploaderHelper;

    private $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categs = $this->categoryRepo->findAll();
        return view('courses::category.index')->withCategs($categs);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories=$this->categoryRepo->findAll();
        return view('courses::category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $categoryData = $request->except('_token', '_wysihtml5_mode','photo');
        $categoryData['created_by'] = auth()->user()->id;


        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'category');
            $categoryData['photo'] = $imageName;
        }
        $categ = $this->categoryRepo->save($categoryData);

        return redirect('admin-panel/categories')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepo->find($id);

        return view('courses::category.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepo->find($id);
        $categories = $this->categoryRepo->findAll();

        return view('courses::category.Edit', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $category = $request->except('_token', 'parent_id');


        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'category');
            $category['photo'] = $imageName;
        }

        $category = $this->categoryRepo->update($id, $category);

        return redirect('admin-panel/categories')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepo->delete($id);

        return redirect()->back();
    }

    /**
     * AJAX data source for Datatables.
     *
     * @return void
     */
    public function ajaxDataSrc()
    {
        $datasrc = $this->categoryRepo->findAll();

        return \Response::json($datasrc);
    }
}
