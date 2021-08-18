<?php

namespace App\Http\Controllers;

use App\User;
use App\Voter;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters=Voter::all()->sortByDesc('id');
        return response()->view('voter.index',['voters' => $voters]);
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
        $user= User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->attachRole('user');
        $profile=new Profile();
        $path = $request->file('picture')->store('images/users');
        $profile->picture=$path;
        $profile->poste=$request->input('poste');
        $profile->bio=$request->input('Bio');
        $profile->experience=$request->input('Experiance');
        $user->profile()->save($profile);
        $voter = new Voter();
        $user->voter()->save($voter);
        toastr()->success(trans('message_trans.success'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(Voter $voter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $voter=Voter::find($id);
        return $voter->user()->id ;
        return $voter->user()->profile()->id;
        $user=User::find($voter->user()->id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->save();
        $profile=Profile::find($voter->user()->profile()->id);
        $path = $request->file('picture')->store('images/users');
        $profile->picture=$path;
        $profile->poste=$request->input('poste');
        $profile->bio=$request->input('Bio');
        $profile->experience=$request->input('Experiance');
        $profile->save();
        toastr()->success(trans('message_trans.Update'));
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voter=Voter::find($id);
        $voter->delete();
        toastr()->error(trans('message_trans.Delete'));
        return redirect()->back();
    }
}
