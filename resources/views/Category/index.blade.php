@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="mt-4">Your Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">In this page your can add and view the category you have</li>
        </ol>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">List Category</h5>

                <a href="{{ route('Category.create') }}" class="btn btn-outline-dark bi bi-plus-circle mb-2">Add</a>

                <table class="table table-hover table-bordered datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th style="width:17%">Action</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <center>
                                        <a href="{{ route('Category.edit',$item->id) }}" class="btn bi bi-pen">Edit</a>
                                        <form action="{{ route('Category.destroy',$item->id) }}" method="post" classs="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
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

