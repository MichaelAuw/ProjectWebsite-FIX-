@extends('layouts.web')

@section('title','home')

@section('js')
     <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Education</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add Educations</li>
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
            <div class="card-header bg-primary text-white">Featured</div>
            <div class="card-body">
                <form id="product_form" action="{{ route('Education.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table" id="table">
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <label class="mb-2 font-weight-bold">Education</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="inputs[0][education]">
                                </div>
                            </td>
                            <td>
                                <div class="mb-3 font-weight-bold">
                                    <label class="mb-2">Description</label>
                                    <textarea class="form-control" rows="5" name="inputs[0][description]"></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3 font-weight-bold">
                                    <label class="mb-2">From</label>
                                    <input type="date" class="form-control" placeholder="Enter Job" name="inputs[0][DateFrom]">
                                </div>
                            </td>
                            <td>
                                <div class="mb-3 font-weight-bold">
                                    <label class="mb-2">End</label>
                                    <input type="date" class="form-control" placeholder="Enter Email" name="inputs[0][DateTo]">
                                </div>
                            </td>
                        <tr>
                    </table>
                 <button type="submit" class="btn btn-primary col-md-2">Save</button>
                 <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                 <a href="{{ route('Education.index') }}" class="btn btn-warning">Return</a>
            </form>
        </div>

        <script>
            var i = 0;
            $('#add').click(function(){
                i++;
                $('#table').append(
                    '<tr>\
                        <td>\
                            <div class="mb-3 font-weight-bold">\
                                <label class="mb-2">Education</label>\
                                <input type="text" class="form-control" placeholder="Enter Name" name="inputs['+i+'][education]">\
                            </div>\
                        </td>\
                        <td>\
                            <div class="mb-3 font-weight-bold">\
                                <label class="mb-2">Description</label>\
                                <textarea class="form-control" rows="5" name="inputs['+i+'][description]"></textarea>\
                            </div>\
                        </td>\
                        <td>\
                            <div class="mb-3 font-weight-bold">\
                                <label class="mb-2">From</label>\
                                <input type="date" class="form-control" placeholder="Enter Job" name="inputs['+i+'][DateFrom]">\
                            </div>\
                        </td>\
                        <td>\
                            <div class="mb-3 font-weight-bold">\
                                <label class="mb-2">End</label>\
                                <input type="date" class="form-control" placeholder="Enter Email" name="inputs['+i+'][DateTo]">\
                            </div>\
                        </td>\
                        <td>\
                            <div class="mb-md-0 font-weight-bold">\
                                <label class="mb-2">Action</label>\
                            </div>\
                            <a class="btn px-3 remove-table-row"><i class="bi bi-trash"></i></a>\
                        </td>\
                    <tr>'
                );
            });


            $(document).on('click','.remove-table-row',function(){
                $(this).parents('tr').remove();
            });
        </script>
@endsection

