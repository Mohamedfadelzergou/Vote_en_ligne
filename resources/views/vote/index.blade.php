@extends('layouts.app')
@section('title')
{{trans('votes_trans.Vote_List')}}
@stop
@section('content')
<div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{trans('votes_trans.Vote_List')}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{trans('votes_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('votes_trans.Vote_List')}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title mb-0 flex-grow-1">{{trans('votes_trans.Vote_List')}}</h4>
                <div class="flex-shrink-0 align-self-end">
                    <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded monthly active" id="monthly" data-bs-toggle="pill" href="#month" role="tab" aria-controls="month" aria-selected="true"><i class="bx bx-list-ul"></i></a>                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded yearly" id="yearly" data-bs-toggle="pill" href="#year" role="tab" aria-controls="year" aria-selected="false"><i class="bx bx-grid-alt"></i></a>
                        </li>
                        @if (auth()->user()->hasRole('superadministrator'))
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">{{trans('votes_trans.Add_New')}}</button>
                        </li>
                        <div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title h4" id="exampleModalFullscreenLabel">{{trans('votes_trans.Add_Vote')}} </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <form method="post" action="{{'vote'}}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
            
                                                    <div id="progrss-wizard" class="twitter-bs-wizard">
                                                        <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
                                                            <li class="nav-item">
                                                                <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
                                                                        <i class="bx bx-list-ul"></i>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            
                                                            <li class="nav-item">
                                                                <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Bank Details">
                                                                        <i data-feather="users"></i>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <!-- wizard-nav -->
            
                                                        <div id="bar" class="progress mt-4">
                                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                                        </div>
                                                        <div class="tab-content twitter-bs-wizard-tab-content">
                                                            <div class="tab-pane" id="progress-seller-details">
                                                                <div class="text-center mb-4">
                                                                    <h5>{{trans('votes_trans.Votes_Details')}}</h5>
                                                                </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="progresspill-firstname-input">{{trans('votes_trans.Title')}}</label>
                                                                                <input type="text" name="title" class="form-control" id="progresspill-firstname-input">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label for="example-datetime-local-input" class="form-label">Fin Date and time</label>
                                                                                <input class="form-control" name="date" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <label for="progresspill-address-input">{{trans('votes_trans.Description')}}</label>
                                                                                <textarea id="progresspill-address-input" name="description" class="form-control" rows="3"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                                    <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">{{trans('votes_trans.Next')}} <i
                                                                                class="bx bx-chevron-right ms-1"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane" id="progress-bank-detail">
                                                                <div>
                                                                    <div class="text-center mb-4">
                                                                        <h5>{{trans('votes_trans.Candidats_Details')}}</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="tab-content" id="pills-tabContent">
                                                                            <div class="tab-pane fade active show" id="mon" role="tabpanel" aria-labelledby="monthly">
                                                                                <div class="table-responsive mb-4" id="list-voters">
                                                                                    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                                                                        <thead>
                                                                                          <tr>
                                                                                            <th scope="col" style="width: 50px;">
                                                                                                <div class="form-check font-size-16">
                                                                                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                                                                                    <label class="form-check-label" for="checkAll"></label>
                                                                                                </div>
                                                                                            </th>
                                                                                            <th scope="col">{{trans('votes_trans.Name')}}</th>
                                                                                            <th scope="col">{{trans('votes_trans.Position')}}</th>
                                                                                            <th scope="col">{{trans('votes_trans.Email')}}</th>
                                                                                          </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($voteCandidat as $candidat)
                                                                                            <tr>
                                                                                                <th scope="row">
                                                                                                    <div class="form-check font-size-16">
                                                                                                        <input type="checkbox" class="form-check-input" id="contacusercheck{{$candidat->id}}" name="candidat[]" value="{{$candidat->id}}">
                                                                                                        <label class="form-check-label" for="contacusercheck{{$candidat->id}}"></label>
                                                                                                    </div>
                                                                                                </th>
                                                                                                <br>
                                                                                                <td>
                                                                                                    <img src="{{$candidat->user->profile->picture}}" alt="" class="avatar-sm rounded-circle me-2">
                                                                                                    <a href="#" class="text-body">{{$candidat->user->name}}</a>
                                                                                                </td>
                                                                                                <td>{{$candidat->user->profile->poste}}</td>
                                                                                                <td>{{$candidat->user->email}}</td>
                                                                                            </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <!-- end table -->
                                                                                </div>
                                                                                <!-- end row -->
                                                                            </div>
                                                                            <!-- end tab pane -->
                                                                        </div>
                                                                        <!-- end tab content -->
                                                                    </div>
                                                                  <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                                    <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i
                                                                                class="bx bx-chevron-left me-1"></i>{{trans('votes_trans.Previous')}} </a></li>
                                                                    <li class="float-end"><button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                                            data-bs-target=".confirmModal">{{trans('votes_trans.Save_Changes')}}</button></li>
                                                                </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        </form>
                                        <!-- end col -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('votes_trans.Close')}}</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endif
                        
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="month" role="tabpanel" aria-labelledby="monthly">
                        <div class="table-responsive mb-4" id="list-voters">
                            <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                <thead>
                                  <tr>
                                    <th scope="col">{{trans('votes_trans.Title')}}</th>
                                    <th scope="col">{{trans('votes_trans.Description')}}</th>
                                    <th scope="col">{{trans('votes_trans.Candidates')}}</th>
                                    <th scope="col">{{trans('votes_trans.Voters')}}</th>
                                    <th style="width: 80px; min-width: 80px;">{{trans('votes_trans.Action')}}</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($votes as $vote)
                                    <tr>
                                        <td>
                                            <a href="#" class="text-body">{{$vote->titre}}</a>
                                        </td>
                                        <td>{{$vote->description}}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                @if ($vote->candidats->isEmpty())
                                                <span class="badge badge-soft-primary">0</span>
                                                @else
                                                @foreach ($vote->candidats as $candidat)
                                                <a href="#" class="badge badge-soft-primary">{{$candidat->user->name}}</a>
                                                @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                @if ($vote->voters->isEmpty())
                                                <span class="badge badge-soft-primary">0</span>
                                                @else
                                                @foreach ($vote->voters as $voter)
                                                <a href="#" class="badge badge-soft-primary">{{$voter->user->name}}</a>
                                                @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                @if (auth()->user()->hasRole('superadministrator'))
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{ url('/vote/'.$vote->id)}}">{{trans('votes_trans.Update')}}</a></li>
                                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modaldelete{{$vote->id}}">{{trans('votes_trans.Delete')}}</a></li>          
                                                </ul>
                                                <div class="modal fade" id="Modaldelete{{$vote->id}}" tabindex="-1" aria-labelledby="Modaldelete1Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <from method="poste" action="{{'vote/'.$vote->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">{{trans('votes_trans.Attention')}}</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{trans('votes_trans.Message_delete')}}
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('votes_trans.Close')}}</button>
                                                          <button type="submit" class="btn btn-primary">{{trans('votes_trans.Delete')}}</button>
                                                        </div>
                                                      </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                @else 
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalVoter{{$vote->id}}">{{trans('votes_trans.Voter')}}</button></li>          
                                                </ul>
                                                <div class="modal fade" id="ModalVoter{{$vote->id}}" tabindex="-1" aria-labelledby="Modaldelete1Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @foreach ($vote->candidats as $candidat)
                                                                    <div class="col-xl-6 col-sm-6">
                                                                        <div class="card text-center">
                                                                            <div class="card-body">
                                                                                <div class="dropdown text-end">
                                                                                    <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                                                    </a>
                                                                                    @if (auth()->user()->hasRole('user'))
                                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                                        <li><a class="dropdown-item" href="{{url('/vote/'.$vote->id.'/'.$candidat->id)}}" >{{trans('votes_trans.vote')}}</a></li>
                                                                                    </div>
                                                                                    @endif
                                                                                </div>
                                                                                
                                                                                <div class="mx-auto mb-4">
                                                                                    <img src="{{$candidat->user->profile->picture}}" alt="" class="avatar-xl rounded-circle img-thumbnail">
                                                                                </div>
                                                                                <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">{{$candidat->user->name}}</a></h5>
                                                                                <p class="text-muted mb-2">{{$candidat->user->profile->poste}}</p>
                                                                                
                                                                            </div>
                                                        
                                                                            <div class="btn-group" role="group">
                                                                                <a href="{{ url('/candidat/'.$candidat->id.'/profile' )}}" class="btn btn-outline-light text-truncate"><i class="uil uil-user me-1"></i>{{trans('votes_trans.Profile')}}</a>
                                                                                <a class="btn btn-outline-light text-truncate">@php $votescandidat=DB::table('votes')->join('vote_voter', 'vote_voter.vote_id', '=', 'votes.id')->where('vote_voter.vote_id',$vote->id)->where('bultin_vote',$candidat->id)->count(); echo $votescandidat; @endphp</a>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end card -->
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('votes_trans.Close')}}</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="yearly">
                        <div class="row">
                            @foreach ($votes as $vote)
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{$vote->titre}}</h4>
                                        <p class="card-title-desc">{{$vote->description}}</p>
                                    </div><!-- end card header -->
                                    
                                    <div class="card-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home-{{$vote->id}}" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">{{trans('votes_trans.Description')}}</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#profile-{{$vote->id}}" role="tab">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">{{trans('votes_trans.Candidates')}}</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages-{{$vote->id}}" role="tab">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block">{{trans('votes_trans.Voters')}}</span>   
                                                </a>
                                            </li>
                                        </ul>
        
                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="home-{{$vote->id}}" role="tabpanel">
                                                <p class="mb-0">
                                                    {{$vote->description}}
                                                </p>
                                            </div>
                                            <div class="tab-pane" id="profile-{{$vote->id}}" role="tabpanel">
                                                <div class="row">
                                                @foreach ($vote->candidats as $candidat)
                                                    <div class="col-xl-6 col-sm-6">
                                                        <div class="card text-center">
                                                            <div class="card-body">
                                                                <div class="dropdown text-end">
                                                                    <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalUpdate1">{{trans('votes_trans.Update')}}</a></li>
                                                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modaldelete1">{{trans('votes_trans.Delete')}}</a></li>
                                                                        <div class="modal fade" id="ModalUpdate1" tabindex="-1" aria-labelledby="ModalUpdate1Label" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  ...
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal fade" id="Modaldelete1" tabindex="-1" aria-labelledby="Modaldelete1Label" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  ...
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="mx-auto mb-4">
                                                                    <img src="{{$candidat->user->profile->picture}}" alt="" class="avatar-xl rounded-circle img-thumbnail">
                                                                </div>
                                                                <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">{{$candidat->user->name}}</a></h5>
                                                                <p class="text-muted mb-2">{{$candidat->user->profile->poste}}</p>
                                                                
                                                            </div>
                                        
                                                            <div class="btn-group" role="group">
                                                                <a href="{{ url('/candidat/'.$candidat->id.'/profile' )}}" class="btn btn-outline-light text-truncate"><i class="uil uil-user me-1"></i>{{trans('votes_trans.Profile')}}</a>
                                                                <a class="btn btn-outline-light text-truncate">@php $votescandidat=DB::table('votes')->join('vote_voter', 'vote_voter.vote_id', '=', 'votes.id')->where('vote_voter.vote_id',$vote->id)->where('bultin_vote',$candidat->id)->count(); echo $votescandidat; @endphp</a>
                                                            </div>
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                @endforeach
                                            </div>
                                            </div>
                                            <div class="tab-pane" id="messages-{{$vote->id}}" role="tabpanel">
                                                <div class="row">
                                                    <div class="card-body">
                                                        <div class="tab-content" id="pills-tabContent">
                                                            <div class="tab-pane fade active show" id="mon" role="tabpanel" aria-labelledby="monthly">
                                                                <div class="table-responsive mb-4" id="list-voters">
                                                                    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                                                        <thead>
                                                                          <tr>
                                                                            <th scope="col">{{trans('votes_trans.Name')}}</th>
                                                                            <th scope="col">{{trans('votes_trans.Position')}}</th>
                                                                            <th scope="col">{{trans('votes_trans.Poll_vote')}}</th>
                                                                            @if (auth()->user()->hasrole('superadministrator'))
                                                                                <th scope="col">{{trans('votes_trans.Email')}}</th>
                                                                                <th style="width: 80px; min-width: 80px;">{{trans('votes_trans.Action')}}</th>
                                                                            @endif

                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($vote->voters as $voter)
                                                                            <tr>
                                                                                <td>
                                                                                    <img src="{{$voter->user->profile->picture}}" alt="" class="avatar-sm rounded-circle me-2">
                                                                                    <a href="#" class="text-body">{{$voter->user->name}}</a>
                                                                                </td>
                                                                                <td>{{$voter->user->profile->poste}}</td>
                                                                                <?php 
                                                                                    $bulin_vote=DB::table('vote_voter')->where('vote_id',$vote->id)->where('voter_id',$voter->id)->get();
                                                                                    foreach ($bulin_vote as $value) {
                                                                                        $id = $value->bultin_vote;
                                                                                    }
                                                                                    $id=Crypt::encryptString($id);
                                                                                ?>
                                                                                @if (auth()->user()->hasrole('superadministrator'))
                                                                                <td>@php $candidat=DB::table('users') ->join('candidats', 'candidats.user_id', '=', 'users.id')->where('candidats.id',Crypt::decryptString($id))->get() ;
                                                                                    foreach ($candidat as $candidat) {
                                                                                        $name = $candidat->name;
                                                                                    }
                                                                                    echo $name;
                                                                                    @endphp</td>
                                                                                @else
                                                                                <td>@php echo $id @endphp</td>
                                                                                @endif
                                                                                
                                                                                @if (auth()->user()->hasrole('superadministrator'))
                                                                                <td>{{$voter->user->email}}</td>
                                                                                
                                                                                <td>
                                                                                    <div class="dropdown">
                                                                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                                                        </button>
                                                                                        @if (auth()->user()->hasRole('User'))
                                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                                            <li><a class="dropdown-item" href="{{url('/vote/'.$vote->id.'/'.$candidat->id)}}" >{{trans('votes_trans.vote')}}</a></li>
                                                                                        </div>
                                                                                        @else
                                                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                                                            <li><a class="dropdown-item" href="{{ url('/voter/'.$vote->id)}}">{{trans('votes_trans.Update')}}</a></li>
                                                                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modaldelete">{{trans('votes_trans.Delete')}}</a></li>
                                                                                        </ul>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="modal fade" id="Modaldelete" tabindex="-1" aria-labelledby="ModaldeleteLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                          <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                              ...
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                              <button type="button" class="btn btn-primary">Save changes</button>
                                                                                            </div>
                                                                                          </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                @endif
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- end table -->
                                                                </div>
                                                                <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <!-- end tab content -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>
                            @endforeach
                            <!-- end col -->
                        </div>
                    </div>
                    <!-- end tab pane -->
                </div>
                <!-- end tab content -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

</div> <!-- container-fluid -->
@endsection
