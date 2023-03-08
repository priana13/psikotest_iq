<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('myprofile');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',            
            'email' => 'required|email',           
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->hp = $request->hp;
        $user->alamat = $request->alamat;

        if($request->password != 'lama'){

            $user->password = Hash::make($request->password);

        }
      

        if($request->avatar){          

            // $path_avatar =  $request->avatar->store('public/photos');
            // $path_avatar = explode('public/' , $path_avatar);
            $path_avatar = "avatar/" . $request->avatar . '.png';            
            $user->avatar = $path_avatar;

        }

        if($request->custom_avatar){

            $path_custom_avatar =  $request->custom_avatar->store('public/photos');
            $path_custom_avatar = explode('public/' , $path_custom_avatar);
            $path_custom_avatar = $path_custom_avatar[1];	 
            
            $user->avatar = $path_custom_avatar;

        }


        $user->save();

        return back();
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
