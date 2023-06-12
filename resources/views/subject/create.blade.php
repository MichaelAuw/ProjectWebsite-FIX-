@extends('layouts.web')

@section('title','home')

@section('js')
     <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="text-light mt-4">Subject</h1>
        <ol class="bg-gray-2 breadcrumb mb-4">
            <li class="text-light breadcrumb-item active">Add Subjects</li>
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
        <div class="bg-gray-2 text-light card mb-3">
            <div class="card-header bg-gray-3 text-white">Featured</div>
            <div class="card-body">
                <form id="product_form" action="{{ route('Subject.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table bg-gray-2 text-light" id="table">
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <label class="mb-2 font-weight-bold">Subject</label>
                                    <input type="text" class="bg-gray-2 text-light form-control" placeholder="Enter Name" name="inputs[0][Subject]">
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <label class="mb-2 font-weight-bold">Semester</label>
                                    <select class="bg-gray-2 text-light form-select" aria-label="Default select example" name="inputs[0][Category]">
                                        <option selected>Select the Category...</option>
                                        @foreach ($data as $index => $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3 font-weight-bold">
                                    <label class="mb-2">Description</label>
                                    <textarea class="bg-gray-2 text-light form-control" rows="5" name="inputs[0][description]"></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3 font-weight-bold">
                                    <label class="mb-2">From</label>
                                    <input type="date" class="bg-gray-2 text-light form-control" placeholder="Enter Job" name="inputs[0][DateFrom]">
                                </div>
                            </td>
                            <td>
                                <div class="mb-3 font-weight-bold">
                                    <label class="mb-2">End</label>
                                    <input type="date" class="bg-gray-2 text-light form-control" placeholder="Enter Email" name="inputs[0][DateTo]">
                                </div>
                            </td>
                        <tr>
                    </table>
                 <button type="submit" class="btn btn-outline-light bi bi-save col-1"> Save</button>
                 <button type="button" name="add" id="add" class="btn btn-outline-light bi bi-plus-circle"> Add More</button>
                 <a href="{{ route('Subject.index') }}" class="btn btn-outline-light bi bi-box-arrow-left"> Return</a>
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
                                <label class="mb-2">Subject</label>\
                                <input type="text" class="bg-gray-2 text-light form-control" placeholder="Enter Name" name="inputs['+i+'][Subject]">\
                            </div>\
                        </td>\
                        <td>\
                            <div class="mb-3">\
                                <label class="mb-2 font-weight-bold">Semester</label>\
                                <select class="bg-gray-2 text-light form-select" aria-label="Default select example" name="inputs['+i+'][Category]">\
                                    <option selected>Select the Category...</option>\
                                    @foreach ($data as $index => $item)\
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>\
                                    @endforeach\
                                </select>\
                            </div>\
                        </td>\
                        <td>\
                            <div class="mb-3 font-weight-bold">\
                                <label class="mb-2">Description</label>\
                                <textarea class="bg-gray-2 text-light form-control" rows="5" name="inputs['+i+'][description]"></textarea>\
                            </div>\
                        </td>\
                        <td>\
                            <div class="mb-3 font-weight-bold">\
                                <label class="mb-2">From</label>\
                                <input type="date" class="bg-gray-2 text-light form-control" placeholder="Enter Job" name="inputs['+i+'][DateFrom]">\
                            </div>\
                        </td>\
                        <td>\
                            <div class="mb-3 font-weight-bold">\
                                <label class="mb-2">End</label>\
                                <input type="date" class="bg-gray-2 text-light form-control" placeholder="Enter Email" name="inputs['+i+'][DateTo]">\
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

