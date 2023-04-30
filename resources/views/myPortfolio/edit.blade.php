@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="mt-4">Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Portfolio</li>
        </ol>
        @if($errors->any())
        <div class="alert alert-danger">
            Please fill all the required field:
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card mb-3">
            <div class="card-header bg-success text-white">Edit Portfolio</div>
            <div class="card-body">
                <form action="{{ route('MyPortfolio.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="mb-2">Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name='name' value="{{ $data->Name }}">
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">About</label>
                        <textarea class="form-control" rows="5" name="about">{{ $data->About }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Profile</label>
                        <input type="text" class="form-control" placeholder="Enter Job" name='profile' value="{{ $data->Profile }}">
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name='email' value="{{ $data->Email }}">
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Phone</label>
                        <input type="text" class="form-control" placeholder="Enter Phone Number" name='phone' value="{{ $data->Phone }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Profile Image</label>
                        <input class="form-control" type="file" name="image_file">
                        <h6 class="px-2 small text-secondary">Note: Do Not upload 16:9 photo</h6>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Background Home Image</label>
                        <input class="form-control" type="file" name="image_home">
                        <h6 class="px-2 small text-secondary">Note: Upload 16:9 photo</h6>
                    </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('MyPortfolio.index') }}" class="btn btn-warning">Return</a>
                </form>
                
            </div>
        </div>
    </div>
@endsection

