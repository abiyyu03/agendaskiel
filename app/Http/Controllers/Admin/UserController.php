<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables; 

class UserController extends Controller
{
    public function index ()
    {
        if(request()->ajax())
        {
            $data_user = User::get();   
            return DataTables::of($data_user)
                ->addIndexColumn()
                ->addColumn('action', function ($data_user) {
                    $aksi = '<a class="btn btn-xs btn-danger hapus" href="akun/' . $data_user->id . '/destroy"><i class="fa fa-trash-alt"></i></a>'; 
                    return $aksi;
                })->make();  
        }
        return view('pages.admin.akun.index'); 
    }
    public function create()
    {
        return view('pages.admin.akun.create');
    }

    // public function edit($id)
    // {
    // 	$user = User::findOrfail($id); 
    //     return view('pages.admin.akun.edit',compact('user'));
    // }

    // public function update($id, Request $request)
    // {
    // 	$user = User::findOrfail($id);
    // 	$user->name = $request->get('name');
    // 	$user->email = $request->get('email');
    // 	$user->email_verified_at = $request->get('email_verified_at');
    // 	$user->roles = $request->get('roles');
    //     $user->save(); 
    // }

    public function store(Request $request)
    {
        //$register = User::create($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        return redirect()->route('akun.index')->with(['success' => 'Registrasi akun berhasil !']);;;  
    }

    public function show()
    {
        $file = request()->input('import_akun'); 
        $row = Excel::import(new AkunImport, $file);
        return redirect()->route('akun.index')->with(['success' => 'Data Akun berhasil diimport !']);;
    }

    public function destroy($id)
    {
        $data_user = User::find($id);
        $data_user->delete();
        return redirect()->route('akun.index')->with(['success' => 'Data Akun berhasil dihapus !']);
    }
        
}
