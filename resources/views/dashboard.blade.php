@extends('layouts.web')

@section('title','home')

@section('content')
    @php
        $name = "Binus"
    @endphp
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb btn-light mb-4">
            <li>Welcome {{ Auth::user()->name }} </li>
        </ol>
          <div class="row mb-4">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header">
                    Biodata
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Add or Edit Existing Biodata</h5>
                        <p class="card-text">Click the button below to add or edit your biodata</p>
                        <a href="{{ route('MyPortfolio.index') }}" class="btn btn-primary">Click Here!</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Skills
                    </div>
                        <div class="card-body">
                             <h5 class="card-title">Add or Edit Existing Skill</h5>
                            <p class="card-text">Click the button below to add or edit your skills</p>
                            <a href="{{ route('Skill.index') }}" class="btn btn-primary">Click Here!</a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row mb-4">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                      Education
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Add or Edit Existing Education</h5>
                        <p class="card-text">Click the button below to add or edit your education</p>
                        <a href="{{ route('Education.index') }}" class="btn btn-primary">Click Here!</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Subjects
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Add or Edit Existing Subject</h5>
                        <p class="card-text">Click the button below to add or edit your Subject</p>
                        <a href="{{ route('Subject.index') }}" class="btn btn-primary">Click Here!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Interests
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Add or Edit Existing Interests</h5>
                        <p class="card-text">Click the button below to add or edit your interests</p>
                        <a href="{{ route('Interest.index') }}" class="btn btn-primary">Click Here!</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                      Contact
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Add or Edit Existing Contact</h5>
                        <p class="card-text">Click the button below to add or edit your contact</p>
                        <a href="{{ route('Contact.index') }}" class="btn btn-primary">Click Here!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Message
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">View Message</h5>
                        <p class="card-text">Click the button below to view received message</p>
                        <a href="{{ route('Message.index') }}" class="btn btn-primary">Click Here!</a>
                    </div>
                </div>
            </div>
        </div>
@endsection

