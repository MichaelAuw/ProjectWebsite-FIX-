@extends('layouts.web')

@section('title','home')

@section('js')
     <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="text-light mt-4">Contact</h1>
        <ol class="bg-gray-2 breadcrumb mb-4">
            <li class="text-light breadcrumb-item active">Add Contact</li>
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
                <form id="product_form" action="{{ route('Contact.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table text-light" id="table">
                        <tr>
                            <th>Link</th>
                            <th>Social Media</th>
                            <th style="width:5%">Action</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="inputs[0][Link]" placeholder="Enter Link" class="bg-gray-2 text-light form-control">
                                <h6 class="text-white px-2 small text-secondary">Note: Don't Include "https://"</h6>
                            </td>
                            <td><select class="bg-gray-2 text-light form-select" aria-label="Default select example" name="inputs[0][SocialMedia]">
                                <option selected>Select the social media...</option>
                                <option value="bi bi-instagram">Instagram</option>
                                <option value="bi bi-whatsapp">WhatsApp</option>
                                <option value="bi bi-twitter">Twitter</option>
                                <option value="bi bi-facebook">Facebook</option>
                                <option value="bi bi-tiktok">Tik Tok</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                 <button type="submit" class="btn btn-outline-light bi bi-save col-1"> Save</button>
                 <button type="button" name="add" id="add" class="btn btn-outline-light bi bi-plus-circle"> Add More</button>
                 <a href="{{ route('Contact.index') }}" class="btn btn-outline-light bi bi-box-arrow-left"> Return</a>
            </form>
        </div>

        <script>
            var i = 0;
            $('#add').click(function(){
                i++;
                $('#table').append(
                    '<tr>\
                        <td>\
                            <input type="text" name="inputs['+i+'][Link]" placeholder="Enter Lin" class="bg-gray-2 text-light form-control">\
                            <h6 class="text-white px-2 small text-secondary">Note: Don\'t Include "https://"</h6>\
                        </td>\
                        <td>\
                            <select class="bg-gray-2 text-light form-select" aria-label="Default select example" name="inputs['+i+'][SocialMedia]">\
                                <option selected>Select the social media...</option>\
                                <option value="bi bi-instagram">Instagram</option>\
                                <option value="bi bi-whatsapp">WhatsApp</option>\
                                <option value="bi bi-twitter">Twitter</option>\
                                <option value="bi bi-facebook">Facebook</option>\
                                <option value="bi bi-tiktok">Tik Tok</option>\
                                </select>\
                            </td>\
                        <td>\
                            <button type="button" class="text-white px-3 btn bi bi-trash remove-table-row"></button>\
                        </td>\
                    </tr>'
                );
            });


            $(document).on('click','.remove-table-row',function(){
                $(this).parents('tr').remove();
            });
        </script>
@endsection

