@extends('layouts.appfolder')
@section('title')
{{trans('profile_trans.Voter')}}
@stop
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{trans('profile_trans.Voter')}}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{trans('profile_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('profile_trans.Voter')}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm order-2 order-sm-1">
                                <div class="d-flex align-items-start mt-3 mt-sm-0">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xl me-3">
                                            <img src="../../{{$voter->user->profile->picture}}" alt="" class="img-fluid rounded-circle d-block">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-16 mb-1">{{$voter->user->name}}</h5>
                                            <p class="text-muted font-size-13">{{$voter->user->profile->poste}}</p>

                                            <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{$voter->user->email}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-auto order-1 order-sm-2">
                                <div class="d-flex align-items-start justify-content-end gap-2">
                                    <div>
                                        <button type="button" class="btn btn-soft-light" data-bs-toggle="modal" data-bs-target="#exampleModalLg"><i class="me-1"></i>{{trans('profile_trans.Update')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title h4" id="exampleModalLgLabel">{{trans('profile_trans.Update_Voter')}}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <form class="needs-validation" novalidate="" method="post" action="{{'profile/'.$voter->user->profile->id}}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom01">{{trans('profile_trans.Name')}}</label>
                                                        <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="Name" required="">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom02">{{trans('profile_trans.Email')}}</label>
                                                        <input type="email" class="form-control" id="validationCustom02" name="email" placeholder="Email" required="">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom03">{{trans('profile_trans.Password')}}</label>
                                                        <input type="password" class="form-control" name="password" id="validationCustom03" placeholder="Password" required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom04">{{trans('profile_trans.Picture')}}</label>
                                                        <input type="file" class="form-control" id="validationCustom04" name="picture" placeholder="Image" required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid state.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom05">{{trans('profile_trans.Position')}}</label>
                                                        <input type="text" class="form-control" id="validationCustom05" name="poste" placeholder="Poste" required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid zip.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="progresspill-address-input">{{trans('profile_trans.Bio')}}</label>
                                                            <textarea id="progresspill-address-input" name="Bio" class="form-control" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="progresspill-address-input">{{trans('profile_trans.Experiance')}}</label>
                                                            <textarea id="progresspill-address-input" name="Experiance" class="form-control" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="invalidCheck" required="">
                                                            <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                                                            <div class="invalid-feedback">
                                                                You must agree before submitting.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit">{{trans('profile_trans.Add')}}</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">{{trans('profile_trans.Bio')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">{{trans('profile_trans.Experiance')}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{trans('profile_trans.About')}}</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="pb-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <div>
                                                    <h5 class="font-size-15">{{trans('profile_trans.Bio')}} :</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <p class="mb-2">{{$voter->user->profile->bio}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <!-- end card -->
                    </div>
                    <!-- end tab pane -->

                    <div class="tab-pane" id="about" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{trans('profile_trans.About')}}</h5>
                            </div>
                            <div class="card-body">
                                <div>

                                    <div class="pt-3">
                                        <h5 class="font-size-15">{{trans('profile_trans.Experiance')}} :</h5>
                                        <div class="text-muted">
                                            <p>{{$voter->user->profile->experience}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end tab pane -->
                    <!-- end tab pane -->
                </div>
                <!-- end tab content -->
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{trans('profile_trans.Skills')}}</h5>

                        <div class="d-flex flex-wrap gap-2 font-size-16">
                            <a href="#" class="badge badge-soft-primary">Photoshop</a>
                            <a href="#" class="badge badge-soft-primary">illustrator</a>
                            <a href="#" class="badge badge-soft-primary">HTML</a>
                            <a href="#" class="badge badge-soft-primary">CSS</a>
                            <a href="#" class="badge badge-soft-primary">Javascript</a>
                            <a href="#" class="badge badge-soft-primary">Php</a>
                            <a href="#" class="badge badge-soft-primary">Python</a>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <!-- end card -->
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container-fluid -->
@endsection