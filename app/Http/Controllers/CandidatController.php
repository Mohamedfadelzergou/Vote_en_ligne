<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CandidatController extends Controller
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
        $Candidats=Candidat::all()->sortByDesc('id');
        return response()->view('Candidat.index',['Candidats' => $Candidats]);
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
        $candidat = new Candidat();
        $user->candidat()->save($candidat);
        toastr()->success(trans('message_trans.success'));
        return back()->withInput();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function show(Candidat $candidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidat $candidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $candidat=Candidat::find($id);
        $user=User::find($candidat->user()->id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->save();
        $profile=Profile::find($candidat->user()->profile()->id);
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
     * @param  \App\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidat=Candidat::find($id);
        $candidat->delete();
        toastr()->error(trans('message_trans.Delete'));
        return redirect()->back();
    }
}
