@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Edit Service Engineer</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('service-engineers.update',$data->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlName">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                id="exampleFormControlName" value="{{$data ? $data->name : ''}}" placeholder="Enter Name">
                                            @if ($errors->has('name'))
                                                <div class="text-danger small mt-1">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput2">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{$data ? $data->email : ''}}"
                                                id="exampleFormControlInput2" placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                                <div class="text-danger small mt-1">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect12">Contact No.</label>
                                            <input type="text" class="form-control" name="contact_no" value="{{$data ? $data->contact_no : ''}}"
                                                id="exampleFormControlSelect12" placeholder="Contact No">
                                            @if ($errors->has('contact_no'))
                                                <div class="text-danger small mt-1">
                                                    {{ $errors->first('contact_no') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Image</label>
                                            <input type="file" class="form-control-file" name="image" value="{{$data ? $data->image : ''}}"
                                                id="exampleFormControlFile1">
                                            @if ($errors->has('image'))
                                                <div class="text-danger small mt-1">
                                                    {{ $errors->first('image') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" value="edit" name="type">
                                    <div class="col-2">
                                        <img src="{{url('upload/profile-img/'.$data->image)}}" height="100" width="100">
                                    </div>
                                </div>
                                <input type="hidden" name="user_type" value="service_engineer">
                                <div class="form-footer mt-6">
                                    <button type="submit" class="btn btn-primary btn-pill">Update</button>
                                    <a href="{{ route('service-engineers.index') }}"><button type="button"
                                            class="btn btn-light btn-pill">Cancel</button></a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
