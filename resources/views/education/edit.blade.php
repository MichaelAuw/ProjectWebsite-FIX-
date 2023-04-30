@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="mt-4">Education</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Education</li>
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
            <div class="card-header bg-success text-white">Edit Education</div>
            <div class="card-body">
                <form action="{{ route('Education.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                            <label class="mb-2">Education</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="Education" value="{{ $data->Education }}">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Description</label>
                            <textarea class="form-control" rows="5" name="Description">{{ $data->Description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">From</label>
                            <input type="date" class="form-control" placeholder="Enter Job" name="DateFrom" value="{{ $data->DateFrom }}">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">End</label>
                            <input type="date" class="form-control" placeholder="Enter Email" name="DateTo" value="{{ $data->DateFrom}}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('Education.index') }}" class="btn btn-warning">Return</a>
                </form>
                
            </div>
        </div>
    </div>
@endsection

