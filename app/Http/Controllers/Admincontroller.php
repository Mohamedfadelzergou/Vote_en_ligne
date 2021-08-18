<?php

namespace App\Http\Controllers;

use App\Vote;
use App\Voter;
use App\Candidat;
use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    public function index(){
        $votes=Vote::all();
        $voters=Voter::all();
        $candidats=Candidat::all();
        return view('admin.index',['votes'=>$votes,'voters'=>$voters,'candidats'=>$candidats]);
    }
}
