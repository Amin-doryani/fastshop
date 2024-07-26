<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.dashboard");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'username' => 'required|unique:admins',
            'password' => 'required',
            'name'=>'nullable',

        ]);
        $admin = New Admin();
        $username = $request->input("username");
        $password = $request->input("password");
        $admin ->username = $username;
        $admin ->password = Hash::make($password) ;
        $admin->name = $request->input("name");
        $admin->save();
        return view("admin.login");
        

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function login(Request $request){
        $request->validate([
            
            'username' => 'required',
            'password' => 'required',

        ]);
        $username = $request->input("username");
        $password = $request->input("password");

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $request->session()->regenerate();
            

            return redirect()->route('dashboard');
        }
        else{
             return redirect()->back()->withErrors("problem in the login");
        }

    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
     }
}
