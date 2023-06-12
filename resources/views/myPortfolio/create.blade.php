@extends('layouts.web')

@section('title','home')

@section('js')
     <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="text-light mt-4">Portfolio</h1>
        <ol class="bg-gray-2 breadcrumb mb-4">
            <li class="text-light breadcrumb-item active">Add Portfolio</li>
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
            <div class="bg-gray-3 card-header">Featured</div>
            <div class="card-body">
                <form action="{{ route('MyPortfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label class="mb-2">Name</label>
                            <input type="text" class="bg-gray-2 text-light form-control" placeholder="Enter Name" name='name'>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">About</label>
                            <textarea class="bg-gray-2 text-light form-control" rows="5" name="about"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Profile</label>
                            <input type="text" class="bg-gray-2 text-light form-control" placeholder="Enter Job" name='profile'>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Email</label>
                            <input type="text" class="bg-gray-2 text-light form-control" placeholder="Enter Email" name='email'>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Phone</label>
                            <input type="text" class="bg-gray-2 text-light form-control" placeholder="Enter Phone Number" name='phone'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload Profile Image</label>
                            <input class="bg-gray-2 text-light form-control" type="file" name="image_file">
                            <h6 class="px-2 small text-secondary">Note: Do Not upload 16:9 photo</h6>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload Home Background Image</label>
                            <input class="bg-gray-2 text-light form-control" type="file" name="image_home">
                            <h6 class="px-2 small text-secondary">Note: Upload 16:9 photo</h6>
                        </div>
                        <button type="submit" class="btn btn-outline-light bi bi-save"> Submit</button>
                        <a href="{{ route('MyPortfolio.index') }}" class="btn btn-outline-light bi bi-box-arrow-left"> Return</a>
                </form>
            </div>
        </div>
    </div>
@endsection

