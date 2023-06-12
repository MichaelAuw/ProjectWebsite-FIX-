@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="text-light mt-4">Your Subject</h1>
        <ol class="bg-gray-2 breadcrumb mb-4">
            <li class="text-light breadcrumb-item active">In this page your can add and view the Subject you have</li>
        </ol>
        <div class="bg-gray-2 text-light card">
            <div class="card-body">
                <h5 class="card-title mb-3">List Subject</h5>

                
                <form action="" method="get">
                    @csrf
                    <div class="mb-2 justify-content-end" style="display:flex">
                        <a href="{{ route('Subject.create') }}" class="btn btn-outline-light bi bi-plus-circle"> Add</a>
                        <a class="ms-auto btn btn-outline-light dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-bookmark"></i> Category</a>
                        <ul class="dropdown-menu dropdown-menu-end bg-gray-3" aria-labelledby="navbarDropdown">
                            <li><a href="{{ route('Subject.index') }}" class="nav-link text-light" style="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ALL</a></li>
                            @foreach ($data2 as $index =>$item)
                            <li><a href="{{ route('Subject.index',['category' => $item->id]) }}" class="nav-link text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item->name }}</a></li>                    
                            @endforeach
                        </ul>
                    </div>
                </form>

                <table class="table bg-gray-2 text-light table-bordered datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Subject</th>
                            <th>Semester</th>
                            <th>Description</th>
                            <th>From</th>
                            <th>End</th>
                            <th style="width:17%">Action</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->Subject }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->Description }}</td>
                                <td>{{ $item->DateFrom }}</td>
                                <td>{{ $item->DateTo }}</td>
                                <td>
                                    <center>
                                        <a href="{{ route('Subject.edit',$item->id) }}" class="text-light btn bi bi-pen">Edit</a>
                                        <form action="{{ route('Subject.destroy',$item->id) }}" method="post" classs="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
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

