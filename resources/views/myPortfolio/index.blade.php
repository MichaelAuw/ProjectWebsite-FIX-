@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="text-light mt-4">Your Biodata</h1>
        <ol class="breadcrumb bg-gray-2  btn-dark mb-4">
            <li class="text-light breadcrumb-item active">In this page your can add your Biodata</li>
        </ol>
        <div class="bg-gray-2 text-light card mb-4">
            <div class="card-body">
                <h5 class="card-title mb-3">List Portfolio</h5>

                <a href="{{ route('MyPortfolio.create') }}" class="btn btn-outline-light bi bi-plus-circle mb-2"> Add</a>

                <table class="table bg-gray-2 text-light table-bordered table-responsive">
                    <thead >
                        <tr class="bg-gray-2 text-light">
                            <th>No</th>
                            <th>Image</th>
                            <th>Background Image</th>
                            {{-- <th>Category</th> --}}
                            <th>Name</th>
                            <th>About</th>
                            <th style="width:10%">Profile</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th style="width:20%">Action</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><center><img src="{{ asset($item->image_file_url) }}" alt="" width="200"></center></td>
                                <td><center><img src="{{ asset($item->home_image) }}" alt="" width="200"></center></td>
                                {{-- <td>{{ $item->category->name }}</td> --}}
                                {{-- <td>{{ $item->user_id->id }}</td> --}}
                                <td>{{ $item->Name }}</td>
                                <td>{{ $item->About }}</td>
                                <td>{{ $item->Profile }}</td>
                                <td>{{ $item->Email }}</td>
                                <td>{{ $item->Phone }}</td>
                                <td>
                                    <center>
                                        <a href="{{ route('MyPortfolio.edit',$item->id) }}" class="text-light btn bi bi-pen">Edit</a>
                                        <form action="{{ route('MyPortfolio.destroy',$item->id) }}" method="post" classs="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
                                            @method('delete')
                                            @csrf
                                            <button class="text-light btn btn bi bi-trash">Delete</button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

