@extends('layouts.web')

@section('title','home')

@section('js')
     <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="text-light mt-4">Category</h1>
        <ol class="bg-gray-2 breadcrumb mb-4">
            <li class="text-light breadcrumb-item active">Add Category</li>
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
        <div class="bg-gray-2 card mb-3">
            <div class="card-header bg-gray-3 text-light">Featured</div>
            <div class="card-body">
                <form id="product_form" action="{{ route('Category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table bg-gray-2 text-light" id="table">
                        <tr>
                            <th>Link</th>
                            <th style="width:5%">Action</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="inputs[0][Name]" placeholder="Enter Category Name" class="bg-gray-2 text-light form-control">
                            </td>
                        </tr>
                    </table>
                 <button type="submit" class="btn btn-outline-light bi bi-save col-1"> Save</button>
                 <button type="button" name="add" id="add" class="btn btn-outline-light bi bi-plus-circle"> Add More</button>
                 <a href="{{ route('Category.index') }}" class="btn btn-outline-light bi bi-box-arrow-left"> Return</a>
            </form>
        </div>

        <script>
            var i = 0;
            $('#add').click(function(){
                i++;
                $('#table').append(
                    '<tr>\
                        <td>\
                            <input type="text" name="inputs['+i+'][Name]" placeholder="Enter Category Name" class="bg-gray-2 text-light form-control">\
                        </td>\
                        <td>\
                            <button type="button" class="text-light px-3 btn bi bi-trash remove-table-row"></button>\
                        </td>\
                    </tr>'
                );
            });


            $(document).on('click','.remove-table-row',function(){
                $(this).parents('tr').remove();
            });
        </script>
@endsection

