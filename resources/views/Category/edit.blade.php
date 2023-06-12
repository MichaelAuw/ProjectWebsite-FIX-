@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="text-light mt-4">Category</h1>
        <ol class="bg-gray-2 breadcrumb mb-4">
            <li class="text-light breadcrumb-item active">Edit Category</li>
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
        <div class="bg-gray-2 text-light card mb-3">
            <div class="card-header bg-gray-3 text-white">Edit Category</div>
            <div class="card-body">
                <form action="{{ route('Category.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                            <label>Category</label>
                            <input type="text" class="bg-gray-2 text-light form-control" placeholder="Enter Category Name" name='Name' value="{{ $data->name}}">
                        </div>
                        <button type="submit" class="btn btn-outline-light bi bi-save"> Update</button>
                        <a href="{{ route('Category.index') }}" class="btn btn-outline-light bi bi-box-arrow-left"> Return</a>
                </form>
                
            </div>
        </div>
    </div>
@endsection

