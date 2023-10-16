@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Edit Customer</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('customers.update',$data->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlName">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                id="exampleFormControlName" placeholder="Enter Name" value="{{$data ? $data->name : ''}}">
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
                                            <input type="email" class="form-control" name="email"
                                                id="exampleFormControlInput2" placeholder="Enter Email" value="{{$data ? $data->email : ''}}" readonly>
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
                                            <label for="exampleFormControlSelect12">Customer Type</label>
                                            <select class="form-control" name="client_type" id="exampleFormControlSelect12">
                                                <option value="" selected disabled>Select Cutomer Type</option>
                                                <option {{$data->client_type == 'alcon' ? "selected" : "" }} value="alcon">Alcon</option>
                                                <option {{ $data->client_type  == 'other' ? "selected" : "" }} value="other">Other</option>
                                            </select>
                                            @if ($errors->has('client_type'))
                                                <div class="text-danger small mt-1">
                                                    {{ $errors->first('client_type') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                            <label for="exampleFormControlSelect12">Contact No.</label>
                                            <input type="text" class="form-control" name="contact_no"
                                                id="exampleFormControlSelect12" placeholder="Contact No" value="{{$data ? $data->contact_no : ''}}">
                                            @if ($errors->has('contact_no'))
                                                <div class="text-danger small mt-1">
                                                    {{ $errors->first('contact_no') }}
                                                </div>
                                            @endif
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Address</label>
                                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3">{{$data ? $data->address : ''}}</textarea>
                                            @if ($errors->has('address'))
                                                <div class="text-danger small mt-1">
                                                    {{ $errors->first('address') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Image</label>
                                            <input type="file" class="form-control-file" name="image"
                                                id="exampleFormControlFile1">
                                            @if ($errors->has('image'))
                                                <div class="text-danger small mt-1">
                                                    {{ $errors->first('image') }}
                                                </div>
                                            @endif
                                        </div>
                                        <img src="{{url('upload/profile-img').'/'.$data->image}}" height="60" width="60"> 
                                    </div>
                                </div>
                                <input type="hidden" name="user_type" value="user">
                                <div class="form-footer mt-6">
                                    <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                                    <a href="{{ route('customers.index') }}"><button type="button"
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
