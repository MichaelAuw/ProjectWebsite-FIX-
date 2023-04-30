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
                <form action="{{ route('portfolios.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter title" name='title' value="{{ $data->title }}">
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" name="description">{{ $data->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input class="form-control" type="file" name="image_file">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('portfolios.index') }}" class="btn btn-warning">Return</a>
                </form>
                
            </div>
        </div>
    </div>
@endsection

