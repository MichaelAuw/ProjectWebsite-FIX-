@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="text-light mt-4">Your education</h1>
        <ol class="bg-gray-2 breadcrumb mb-4">
            <li class="text-light breadcrumb-item active">In this page your can add and view the education you have</li>
        </ol>
        <div class="bg-gray-2 text-light card">
            <div class="card-body">
                <h5 class="card-title mb-3">List education</h5>

                <a href="{{ route('Education.create') }}" class="btn btn-outline-light bi bi-plus-circle mb-2"> Add</a>

                <table class="table bg-gray-2 text-light table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Education</th>
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
                                <td>{{ $item->Education }}</td>
                                <td>{{ $item->Description }}</td>
                                <td>{{ $item->DateFrom }}</td>
                                <td>{{ $item->DateTo }}</td>
                                <td>
                                    <center>
                                        <a href="{{ route('Education.edit',$item->id) }}" class="text-light btn bi bi-pen">Edit</a>
                                        <form action="{{ route('Education.destroy',$item->id) }}" method="post" classs="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
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

