@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="mt-4">Your Subject</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">In this page your can add and view the Subject you have</li>
        </ol>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">List Subject</h5>

                
                <form action="" method="get">
                    @csrf
                    <div class="dropdown mb-2">
                      <a href="{{ route('Subject.create') }}" class="btn btn-outline-dark bi bi-plus-circle">Add</a>
                      <a href="{{ route('Subject.index') }}" class="btn btn-secondary" style="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ALL</a>
                      @foreach ($data2 as $index =>$item)
                      <a href="{{ route('Subject.index',['category' => $item->id]) }}" class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item->name }}</a>
                      @endforeach
                    </div>
                </form>

                <table class="table table-hover table-bordered datatables">
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
                                        <a href="{{ route('Subject.edit',$item->id) }}" class="btn bi bi-pen">Edit</a>
                                        <form action="{{ route('Subject.destroy',$item->id) }}" method="post" classs="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
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

