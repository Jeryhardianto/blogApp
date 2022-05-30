<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;

use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    protected $userService;
    public function __construct(userService $userService) 
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {

        return view('dashboard.user.change-password',[
            'title' => 'Change Password',
            'username' => $username
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
           // validasi
           $request->validate( [
            'currentpassword' => 'required',
            'password' => 'required','min:6','confirmed'
        ]);

        if(Hash::check($request->currentpassword, auth()->user()->password)){
            if($this->userService->updatePass($request, auth()->user())){
                return redirect()->route('changepassword.show', auth()->user()->username)->with('success', 'Password has been updated');
            }
        }

        throw ValidationException::withMessages([
            'currentpassword' => 'The current password does not match',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
