@extends('layouts.web')

@section('title','home')

@section('js')
     <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="text-light mt-4">Interests</h1>
        <ol class="bg-gray-2 breadcrumb mb-4">
            <li class="text-light breadcrumb-item active">Add Interests</li>
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
            <div class="bg-gray-2 text-light card-body">
                <form id="product_form" action="{{ route('Interest.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table text-light bg-gray-2" id="table">
                        <tr>
                            <th>Interests</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="inputs[0][Interests]" placeholder="Enter Interests" class="bg-gray-2 text-light form-control"></td>
                            <td><input type="text" name="inputs[0][Icon]" placeholder="Enter Icon Class" min="1" max="100" class="bg-gray-2 text-light form-control" ><h6 class="text-light small text-secondary">Note: Search on the internet for icon class and paste it here e.g.: bootstrap controller icon</h6></td>

                        </tr>
                    </table>
                 <button type="submit" class="btn btn-outline-light bi bi-save col-1"> Save</button>
                 <button type="button" name="add" id="add" class="btn btn-outline-light bi bi-plus-circle"> Add More</button>
                 <a href="{{ route('Interest.index') }}" class="btn btn-outline-light bi bi-box-arrow-left"> Return</a>
            </form>
        </div>

        <script>
            var i = 0;
            $('#add').click(function(){
                i++;
                $('#table').append(
                    '<tr>\
                        <td>\
                            <input type="text" name="inputs['+i+'][Interests]" placeholder="Enter Interests" class="bg-gray-2 text-light form-control">\
                        </td>\
                        <td>\
                            <input type="text" name="inputs['+i+'][Icon]" placeholder="Enter Icon Class" min="1" max="100" class="bg-gray-2 text-light form-control">\
                            <h6 class="text-light small text-secondary">Note: Search on the internet for icon class and paste it here e.g.: bootstrap controller icon</h6>\
                        </td>\
                        <td>\
                            <button type="button" class="text-light btn bi bi-trash remove-table-row">remove</button>\
                        </td>\
                    </tr>'
                );
            });


            $(document).on('click','.remove-table-row',function(){
                $(this).parents('tr').remove();
            });
        </script>
@endsection

