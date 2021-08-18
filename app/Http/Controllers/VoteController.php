<?php

namespace App\Http\Controllers;

use App\Vote;
use App\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class VoteController extends Controller
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
        if(auth()->user()->hasRole('superadministrator')){
            $votes=Vote::all()->sortByDesc('id');
        }else{
            $data=DB::table('vote_voter')->select('vote_id')->where('voter_id', '=', auth()->user()->id)->get()->toArray();
            foreach ($data as $voter) {
                $data=(array)$voter->vote_id;
                }
            $votes=Vote::whereNotIn('id', $data)
            ->get();            
        }
        $voteCandidat=Candidat::all();
        return response()->view('vote.index',['votes' => $votes,'voteCandidat' => $voteCandidat]);
    }

    /**
     * Show the form for creating a new resource.
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
        $vote=new vote();
        $vote->titre = $request->input('title');
        $vote->datefin = $request->input('date');
        $vote->description = $request->input('description');
        $vote->save();
        foreach ($request->input('candidat') as $candidat) {
            DB::table('vote_candidat')->insert([
                ['vote_id' => $vote->id, 'candidat_id' => $candidat],
            ]);
            }
            toastr()->success(trans('message_trans.success'));
        return back()->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vote=Vote::find($id);
        $voteCandidat=Candidat::all();
        return response()->view('vote.update',['vote' => $vote,'voteCandidat' => $voteCandidat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vote=Vote::find($id);
        $vote->titre = $request->input('title');
        $vote->datefin = $request->input('date');
        $vote->description = $request->input('description');
        $vote->save();
        DB::table('vote_candidat')->where('vote_id', $id)->delete();
        foreach ($request->input('candidat') as $candidat) {
            DB::table('vote_candidat')->insert([
                ['vote_id' => $vote->id, 'candidat_id' => $candidat],
            ]);
            }
        toastr()->success(trans('message_trans.Update'));
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vote=Vote::find($id);
        $vote->delete();
        toastr()->error(trans('message_trans.Delete'));
        return redirect()->back();
    }
    public function voter($id_vote,$id_candidat){
        DB::table('vote_voter')->insert([
            ['vote_id' => $id_vote, 'voter_id' => auth()->user()->id , 'bultin_vote' => $id_candidat ],
        ]);
        toastr()->success(trans('message_trans.success'));
        return redirect()->back();
    }
}
