<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }
    public function index(){
        $data=DB::table('vote_voter')->select('vote_id')->where('voter_id', '=', auth()->user()->id)->get()->toArray();
            foreach ($data as $voter) {
                $data=(array)$voter->vote_id;
                }
            $votes=Vote::whereNotIn('id', $data)
            ->get();
            $NombreVotes=Vote::whereIn('id', $data)
            ->get();
        return view('user.index',['votes'=>$votes,'NombreVotes'=>$NombreVotes]);
    }
}
