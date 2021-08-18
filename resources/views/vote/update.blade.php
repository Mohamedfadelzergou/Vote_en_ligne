@extends('layouts.app')
@section('title')
{{trans('votes_trans.Vote_List')}}
@stop
@section('content')
<div class="row">
    <form method="post" action="{{'/vote/'.$vote->id}}" enctype="multipart/form-data">
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
                                            <input type="text" name="title" value="{{old('title', $vote->titre)}}" class="form-control" id="progresspill-firstname-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="example-datetime-local-input" class="form-label">Fin Date and time</label>
                                            <input class="form-control" name="date" type="datetime-local" value="{{old('date', $vote->datefin)}}" id="example-datetime-local-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="progresspill-address-input">{{trans('votes_trans.Description')}}</label>
                                            <textarea id="progresspill-address-input" name="description" class="form-control" rows="3">{{old('description', $vote->description)}}</textarea>
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
                                            class="bx bx-chevron-left me-1"></i>{{trans('votes_trans.Previous')}}</a></li>
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
@endsection