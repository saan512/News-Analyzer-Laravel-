@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','User_Update')

@section('content')

    <h2 style="border: 1px solid black; background-color:DodgerBlue; text-align:center;">
        Update User
    </h2>

    {{-- <form action="{{ route ('admin.updateUser', $User->id) }}" method="post">
        @csrf
        <label class="col-sm-2 col-form-label" for="id">ID: &nbsp;</label>
        <input type="text" id="id" name="id" value="{{$User->id}}"><br><br>
        <label class="col-sm-2 col-form-label" for="name">Name: &nbsp;</label>
        <input type="text" id="name" name="name" value="{{$User->name}}"><br><br>
        
        <label class="col-sm-2 col-form-label" for="age">Mail: &nbsp;</label>
        <input type="text" id="email" name="email" value="{{$User->email}}"><br><br>
        <input type="submit" value="Update">
    </form> --}}

    <section class="content">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">Personal Information</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <form class="form-horizontal" method="POST" action="{{ route('admin.updateUser', $User->id) }}">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="form-group row">
                          <label for="id" class="col-sm-2 col-form-label">ID</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" placeholder="ID" value="{{ $User->id }}" name="id">
    
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="id" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            {{-- <input type="text" class="form-control" id="inputName" placeholder="Name" value="" name="name"> --}}
                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ $User->name }}" name="name">
    
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            {{-- <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="" name="email"> --}}
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ $User->email }}" name="email">
                            
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Save Changes</button>
                          </div>
                        </div>
                      </form>
                    </div>
                </section>




@endsection