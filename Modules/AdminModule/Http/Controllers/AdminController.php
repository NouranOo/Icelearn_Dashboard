<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Repository\AdminRepository;
use Modules\AdminModule\Helper\arabicdate;

class AdminController extends Controller
{
    use arabicdate;

    public $adminRepo;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->middleware('auth:admin');
        $this->adminRepo = $adminRepository;
    }

    function dashboard()
    {
        return view('adminmodule::admins.dashboard');
    }

    function index()
    {
        $admins=$this->adminRepo->findAll();
        $date = $this->ArabicDate();

        return view('adminmodule::admins.index', [
            'admins' => $admins,
            'date' => $date
        ]);
    }



    function create()
    {
        return view('adminmodule::admins.create');
    }

    function store(Request $request)
    {
        $data = $request->except('_token', 'role');
        $data['role'] = $request->role;
        $role = $data['role'];
        $this->adminRepo->save($data, $role);

        return redirect('admin-panel/admins')->with('success','Successfully add');
    }

    function edit($id){

        $admin=$this->adminRepo->findById($id);
        $roles = [1 => 'superadmin', 2 => 'admin', 3 => 'writer'];

        return view('adminmodule::admins.edit',compact('admin', 'roles'));
    }

    function update(Request $request,$id){
        $data = $request->except('_token', 'role');
        $role = $request->role;
        $this->adminRepo->update($data,$id, $role);

        return redirect('admin-panel/admins')->with('success','Successfully Edit');
    }

    public function destroy($id)
    {
        $admin = $this->adminRepo->findById($id);
        $this->adminRepo->delete($admin);

        return redirect()->back();
    }
}
