@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="mt-4">Contact</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Contact</li>
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
        <div class="card mb-3">
            <div class="card-header bg-success text-white">Edit Contact</div>
            <div class="card-body">
                <form action="{{ route('Contact.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" placeholder="Enter link" name='Link' value="{{ $data->Link}}">
                            <h6 class="px-2 small text-secondary">Note: Don't Include "https://"</h6>
                        </div>
                        <div class="mb-3">
                            <label>Social Media</label>
                            <select class="form-select" aria-label="Default select example" name="SocialMedia">
                                <option selected>Select the social media...</option>
                                <option value="bi bi-instagram">Instagram</option>
                                <option value="bi bi-whatsapp">WhatsApp</option>
                                <option value="bi bi-twitter">Twitter</option>
                                <option value="bi bi-facebook">Facebook</option>
                                <option value="bi bi-tiktok">Tik Tok</option>
                                </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('Contact.index') }}" class="btn btn-warning">Return</a>
                </form>
                
            </div>
        </div>
    </div>
@endsection

