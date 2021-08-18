<?php

namespace App\Http\Controllers;

use toastr;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }
    public function profile_voter_id($id){
        $profile=Profile::find($id);
        return response()->view('voter.profile',['voter' => $profile]);
    }
    public function profile_candidat_id($id){
        $profile=Profile::find($id);
        return response()->view('candidat.profile',['candidat' => $profile]);
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
        $user=auth()->user();
        $profile=new Profile();
        $path = $request->file('picture')->store('images/users');
        $profile->picture=$path;
        $profile->poste=$request->input('poste');
        $profile->bio=$request->input('Bio');
        $profile->experience=$request->input('Experiance');
        $user->profile()->save($profile);
        toastr()->success(trans('message_trans.success'));
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
