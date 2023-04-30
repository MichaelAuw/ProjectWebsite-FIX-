@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="mt-4">Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Portfolio</li>
        </ol>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List Portfolio</h5>
                <p class="card-text">
                  Show List of Portfolio
                </p>

                <a href="{{ route('portfolios.create') }}" class="btn btn-primary mb-2">Add</a>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><img src="{{ asset($item->image_file_url) }}" alt="" width="200"></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a href="{{ route('portfolios.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-portfolio-{{ $item->id }}').submit()">Delete</a>
                                    <form id="delete-portfolio-{{ $item->id }}" action="{{ route('portfolios.destroy',$item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

