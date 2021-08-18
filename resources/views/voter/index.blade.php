@extends('layouts.app')
@section('title')
{{trans('voter_trans.Voter_List')}}
@stop
@section('content')
<div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{trans('voter_trans.Voter_List')}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{trans('voter_trans.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('voter_trans.Voter_List')}}</li>
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
                <h4 class="card-title mb-0 flex-grow-1">{{trans('voter_trans.Voters_List')}}</h4>
                <div class="flex-shrink-0 align-self-end">
                    <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded monthly active" id="monthly" data-bs-toggle="pill" href="#month" role="tab" aria-controls="month" aria-selected="true"><i class="bx bx-list-ul"></i></a>                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded yearly" id="yearly" data-bs-toggle="pill" href="#year" role="tab" aria-controls="year" aria-selected="false"><i class="bx bx-grid-alt"></i></a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalLg">{{trans('voter_trans.Add_New')}}</button>
                        </li>
                        <div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title h4" id="exampleModalLgLabel">{{trans('voter_trans.Add_Voter')}}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate="" method="post" action="{{'voter'}}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom01">{{trans('voter_trans.Name')}}</label>
                                                        <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="name" required="" value="{{old('name')}}">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom02">{{trans('voter_trans.Email')}}</label>
                                                        <input type="email" class="form-control" id="validationCustom02" name="email" placeholder="Email" required="" value="{{old('email')}}">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom03">{{trans('voter_trans.Password')}}</label>
                                                        <input type="password" class="form-control" name="password" id="validationCustom03" placeholder="Password" required="" value="{{old('password')}}">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom04">{{trans('voter_trans.Picture')}}</label>
                                                        <input type="file" class="form-control" id="validationCustom04" name="picture" placeholder="Image" required="" value="{{old('picture')}}">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid state.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom05">{{trans('voter_trans.Position')}}</label>
                                                        <input type="text" class="form-control" id="validationCustom05" name="poste" placeholder="Poste" required="" value="{{old('poste')}}">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid zip.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="progresspill-address-input">{{trans('voter_trans.Bio')}} </label>
                                                            <textarea id="progresspill-address-input" name="Bio" class="form-control" rows="3" >{{old('Bio')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="progresspill-address-input">{{trans('voter_trans.Experiance')}} </label>
                                                            <textarea id="progresspill-address-input" name="Experiance" class="form-control" rows="3" >{{old('Experiance')}}</textarea>
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
                                            <button class="btn btn-primary" type="submit">{{trans('voter_trans.Add')}}</button>
                                        </form>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="month" role="tabpanel" aria-labelledby="monthly">
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
                                    <th scope="col">{{trans('voter_trans.Name')}}</th>
                                    <th scope="col">{{trans('voter_trans.Position')}}</th>
                                    <th scope="col">{{trans('voter_trans.Email')}}</th>
                                    <th scope="col">{{trans('voter_trans.Votes')}}</th>
                                    <th style="width: 80px; min-width: 80px;">{{trans('voter_trans.Action')}}</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($voters as $voter)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                <label class="form-check-label" for="contacusercheck1"></label>
                                            </div>
                                        </th>
                                        
                                        <td>
                                            <img src="/storage/{{$voter->user->profile->picture}}" alt="" class="avatar-sm rounded-circle me-2">
                                            <a href="#" class="text-body">{{$voter->user->name}}</a>
                                        </td>
                                        <td>{{$voter->user->profile->poste}}</td>
                                        <td>{{$voter->user->email}}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                @if ($voter->votes->isEmpty())
                                                <span class="badge badge-soft-primary">0</span>
                                                @else
                                                @foreach ($voter->votes as $vote)
                                                <a href="#" class="badge badge-soft-primary">{{$vote->titre}}</a>
                                                @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{ url('/voter/'.$voter->id.'/profile' )}}">{{trans('voter_trans.Profile')}}</a></li>
                                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalUpdate{{$voter->id}}">{{trans('voter_trans.Update')}}</button></li>
                                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modaldelete{{$voter->id}}">{{trans('voter_trans.Delete')}}</button></li>
                                                </ul>
                                                <div class="modal fade" id="ModalUpdate{{$voter->id}}" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title h4" id="exampleModalLgLabel">{{trans('voter_trans.Update_Voter')}}</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <form class="needs-validation" novalidate="" method="post" action="{{'voter/'.$voter->id}}"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="validationCustom01">{{trans('voter_trans.Name')}}</label>
                                                                                <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="name" required="" value="{{old('name', $voter->user->name)}}">
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="validationCustom02">{{trans('voter_trans.Email')}}</label>
                                                                                <input type="email" class="form-control" id="validationCustom02" name="email" placeholder="Email" required="" value="{{old('email', $voter->user->email)}}">
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="validationCustom03">{{trans('voter_trans.Password')}}</label>
                                                                                <input type="password" class="form-control" name="password" id="validationCustom03" placeholder="Password" required="" value="{{old('password', $voter->user->password)}}">
                                                                                <div class="invalid-feedback">
                                                                                    Please provide a valid city.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="validationCustom04">{{trans('voter_trans.Picture')}}</label>
                                                                                <input type="file" class="form-control" id="validationCustom04" name="picture" placeholder="Image" required="" value="{{old('picture', $voter->user->profile->picture)}}">
                                                                                <div class="invalid-feedback">
                                                                                    Please provide a valid state.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="validationCustom05">{{trans('voter_trans.Position')}}</label>
                                                                                <input type="text" class="form-control" id="validationCustom05" name="poste" placeholder="Poste" required="" value="{{old('poste', $voter->user->profile->poste)}}">
                                                                                <div class="invalid-feedback">
                                                                                    Please provide a valid zip.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="mb-3">
                                                                                    <label for="progresspill-address-input">{{trans('voter_trans.Bio')}}</label>
                                                                                    <textarea id="progresspill-address-input" name="Bio" class="form-control" rows="3">{{old('Bio', $voter->user->profile->bio)}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="mb-3">
                                                                                    <label for="progresspill-address-input">{{trans('voter_trans.Experiance')}}</label>
                                                                                    <textarea id="progresspill-address-input" name="Experiance" class="form-control" rows="3">{{old('Experiance', $voter->user->profile->experience)}}</textarea>
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
                                                                    <button class="btn btn-primary" type="submit">{{trans('voter_trans.Update')}}</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="Modaldelete{{$voter->id}}" tabindex="-1" aria-labelledby="Modaldelete1Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <form method="POST" action="{{'voter/'.$voter->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">{{trans('voter_trans.Attention')}}</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{trans('voter_trans.Message_delete')}} 
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('voter_trans.Close')}}</button>
                                                          <button type="submit" class="btn btn-primary">{{trans('voter_trans.Delete')}}</button>
                                                        </div>
                                                        </form>
                                                      </div>
                                                    </div>
                                                </div>
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
                            @foreach ($voters as $voter)
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="dropdown text-end">
                                            <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                              <i class="bx bx-dots-horizontal-rounded"></i>
                                            </a>
                                          
                                            <div class="dropdown-menu dropdown-menu-end">
                                                
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalUpdatecard{{$voter->id}}">{{trans('voter_trans.Update')}}</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modaldeletecard{{$voter->id}}">{{trans('voter_trans.Delete')}}</a></li>
                                            </div>
                                            
                                        </div>
                                        <div class="modal fade" id="ModalUpdatecard{{$voter->id}}" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title h4" id="exampleModalLgLabel">{{trans('voter_trans.Update_Voter')}}</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form class="needs-validation" novalidate="" method="post" action="{{'voter/'.$voter->id}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom01">{{trans('voter_trans.Name')}}</label>
                                                                        <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="name" required="" value="{{old('name', $voter->user->name)}}">
                                                                        <div class="valid-feedback">
                                                                            Looks good!
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom02">{{trans('voter_trans.Email')}}</label>
                                                                        <input type="email" class="form-control" id="validationCustom02" name="email" placeholder="Email" required="" value="{{old('email', $voter->user->email)}}">
                                                                        <div class="valid-feedback">
                                                                            Looks good!
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom03">{{trans('voter_trans.Password')}}</label>
                                                                        <input type="password" class="form-control" name="password" id="validationCustom03" placeholder="Password" required="" value="{{old('password', $voter->user->password)}}">
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid city.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom04">{{trans('voter_trans.Picture')}}</label>
                                                                        <input type="file" class="form-control" id="validationCustom04" name="picture" placeholder="Image" required="" value="{{old('picture', $voter->user->profile->picture)}}">
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid state.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom05">{{trans('voter_trans.Position')}}</label>
                                                                        <input type="text" class="form-control" id="validationCustom05" name="poste" placeholder="Poste" required="" value="{{old('poste', $voter->user->profile->poste)}}">
                                                                        <div class="invalid-feedback">
                                                                            Please provide a valid zip.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label for="progresspill-address-input">{{trans('voter_trans.Bio')}}</label>
                                                                            <textarea id="progresspill-address-input" name="Bio" class="form-control" rows="3">{{old('Bio', $voter->user->profile->bio)}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label for="progresspill-address-input">{{trans('voter_trans.Experiance')}}</label>
                                                                            <textarea id="progresspill-address-input" name="Experiance" class="form-control" rows="3">{{old('Experiance', $voter->user->profile->experience)}}</textarea>
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
                                                            <button class="btn btn-primary" type="submit">{{trans('voter_trans.Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="Modaldeletecard{{$voter->id}}" tabindex="-1" aria-labelledby="Modaldelete1Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <form method="POST" action="{{'voter/'.$voter->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">{{trans('voter_trans.Attention')}}</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{trans('voter_trans.Message_delete')}}
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('voter_trans.Close')}}</button>
                                                  <button type="submit" class="btn btn-primary">{{trans('voter_trans.Delete')}}</button>
                                                </div>
                                                </form>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="mx-auto mb-4">
                                            <img src="/storage/{{$voter->user->profile->picture}}" alt="" class="avatar-xl rounded-circle img-thumbnail">
                                        </div>
                                        <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">{{$voter->user->name}}</a></h5>
                                        <p class="text-muted mb-2">{{$voter->user->profile->poste}}</p>
                                        
                                    </div>
                
                                    <div class="btn-group" role="group">
                                        <a href="{{ url('/voter/'.$voter->id.'/profile' )}}" class="btn btn-outline-light text-truncate"><i class="uil uil-user me-1"></i>{{trans('voter_trans.Profile')}}</a>
                                        <a href="{{ url('/voter/'.$voter->id.'/profile' )}}" class="btn btn-outline-light text-truncate"><i class="uil uil-envelope-alt me-1"></i>{{trans('voter_trans.Votes')}}</a>
                
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                            @endforeach
                            
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
