@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="mt-4">Your Message</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">In this page your can add and view the Message you have</li>
        </ol>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">List Message</h5>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th style="width:17%">Action</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->Name }}</td>
                                <td>{{ $item->Email }}</td>
                                <td>{{ $item->Subject }}</td>
                                <td>{{ $item->Message }}</td>
                                <td>
                                    <center>
                                        <form action="{{ route('Message.destroy',$item->id) }}" method="post" classs="d-inline" onsubmit="return confirm('Are you sure want to delete?')">
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

