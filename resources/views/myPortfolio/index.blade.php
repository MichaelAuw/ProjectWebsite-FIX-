@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="mt-4">Your Biodata</h1>
        <ol class="breadcrumb btn-light mb-4">
            <li class="breadcrumb-item active">In this page your can add your Biodata</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title mb-3">List Portfolio</h5>

                <a href="{{ route('MyPortfolio.create') }}" class="btn btn-primary mb-2">Add</a>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Background Image</th>
                            <th>Name</th>
                            <th>About</th>
                            <th>Profile</th>
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
                                <td>{{ $item->Name }}</td>
                                <td>{{ $item->About }}</td>
                                <td>{{ $item->Profile }}</td>
                                <td>{{ $item->Email }}</td>
                                <td>{{ $item->Phone }}</td>
                                <td>
                                    <center>
                                        <a href="{{ route('MyPortfolio.edit',$item->id) }}" class="btn bi bi-pen">Edit</a>
                                        <form action="{{ route('MyPortfolio.destroy',$item->id) }}" method="post" classs="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn bi bi-trash">Delete</button>
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

