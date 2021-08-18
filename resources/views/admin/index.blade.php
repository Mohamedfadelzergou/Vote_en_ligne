@extends('layouts.app')
@section('title')
{{ trans('Grades_trans.title_page') }}
@stop
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{trans('main_trans.Dashboard')}}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{trans('main_trans.Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('main_trans.Dashboard')}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-4 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">{{trans('main_trans.Votes')}}</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{$votes->count()}}">0</span> {{trans('main_trans.Vote')}}
                            </h4>
                        </div>

                        <div class="col-6">
                            <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-4 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">{{trans('main_trans.Voters')}}</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{$voters->count()}}">0</span> {{trans('main_trans.Voters')}}
                            </h4>
                        </div>
                        <div class="col-6">
                            <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-4 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">{{trans('main_trans.Candidats')}}</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{$candidats->count()}}">0</span> {{trans('main_trans.Candidat')}}
                            </h4>
                        </div>
                        <div class="col-6">
                            <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->    
    </div><!-- end row-->

    <div class="row">
        
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{trans('main_trans.Votes')}}</h4>
                </div><!-- end card header -->

                <div class="card-body px-0">
                    <div class="tab-content">
                            <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                <table class="table align-middle table-nowrap table-borderless">
                                    <tbody>
                                        @foreach ($votes as $vote)
                                        <tr>
                                            <td>{{$vote->titre}}</td>
                                            <td>{{$vote->candidats->count()}}</td>
                                            <td>{{$vote->voters->count()}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{trans('main_trans.Voters')}}</h4>
                </div><!-- end card header -->

                <div class="card-body px-0">
                    <div class="tab-content">
                            <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                <table class="table align-middle table-nowrap table-borderless">
                                    <tbody>
                                        @foreach ($voters as $voter)
                                        <tr>
                                            <td>
                                                <img src="/storage/{{$voter->user->profile->picture}}" alt="" class="avatar-sm rounded-circle me-2">
                                                <a href="#" class="text-body">{{$voter->user->name}}</a>
                                            </td>
                                            <td>{{$voter->user->profile->poste}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end card body -->
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{trans('main_trans.Candidats')}}</h4>
                </div><!-- end card header -->

                <div class="card-body px-0">
                    <div class="tab-content">
                            <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                <table class="table align-middle table-nowrap table-borderless">
                                    <tbody>
                                        @foreach ($candidats as $candidat)
                                        <tr>
                                            <td>
                                                <img src="/storage/{{$candidat->user->profile->picture}}" alt="" class="avatar-sm rounded-circle me-2">
                                                <a href="#" class="text-body">{{$candidat->user->name}}</a>
                                            </td>
                                            <td>{{$candidat->user->profile->poste}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    </div><!-- end row -->
</div>
<!-- container-fluid -->
@endsection
