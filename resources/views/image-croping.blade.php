@extends('admin.layouts.app')
@section('content')
  {{-- <div class="container offset-4">
      <input type="file" id="select-image">
      <img id="image">
      <button id="1" onclick="window.cropImage(this.id);">Crop Image</button>
      <button id="2" onclick="window.cropImage(this.id);">Secoend Image</button>
  </div> --}}


    {{--
       
    <div class="container offset-4">
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <img id="cropped-image-1" src="@if(session('image_data_1')){{ session('image_data_1') }}@endif">
            <img id="cropped-image-2" src="@if(session('image_data_2')){{ session('image_data_2') }}@endif">
            <input name="cropped_image_1" 
                id="img-data-1"
                value="@if(session('image_data_1')){{ session('image_data_1') }}@endif"
                type="hidden">
            <input name="cropped_image_2" 
                id="img-data-1"
                value="@if(session('image_data_2')){{ session('image_data_2') }}@endif"
                type="hidden">

            <input type="submit">
        </form>
    </div> --}}

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content border p-3">
            <div class="container">
                <div>
                    <h3>Images</h3>
                    <div class="mb-2 offset-3">
                        <div class="timeline-item">
                            <div class="image-container">
                                <img src="https://placehold.it/150x100" alt="...">
                                <div class="hover-overlay">
                                    <label for="file-input" class="custom-file-button">
                                        <span class="btn btn-primary">select file</span>
                                        <input type="file" id="file-input" hidden>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="timeline-body">
                            <div class="image-container">
                                <img id="cropped-image-1" 
                                    src="@if(session('image_data_1')){{ session('image_data_1') }}
                                    @else
                                    https://placehold.it/150x100
                                    @endif">

                                <input name="cropped_image_1" 
                                    id="img-data-1" 
                                    value="@if(session('image_data_1')){{ session('image_data_1') }}@endif" 
                                    type="hidden">
                                <div class="hover-overlay">
                                    <label for="file-input" class="custom-file-button">
                                        <span class="btn btn-primary">select file</span>
                                        <input type="file" id="select-image" hidden>

                                    </label>
                                </div>
                            </div>
                            <div class="image-container">
                                <img id="cropped-image-2" src="@if(session('image_data_2')){{ session('image_data_2') }}
                                    @else
                                    https://placehold.it/150x100
                                    @endif">
                                <input name="cropped_image_2" id="img-data-2" value="@if(session('image_data_2')){{ session('image_data_2') }}@endif" type="hidden">

                                <div class="hover-overlay">
                                    <label for="file-input" class="custom-file-button">
                                        <span class="btn btn-primary">select file</span>
                                        <input type="file" id="file-input" hidden>
                                    </label>
                                </div>
                            </div>
                            <div class="image-container">
                                <img src="https://placehold.it/150x100" alt="...">
                                <div class="hover-overlay">
                                    <label for="file-input" class="custom-file-button">
                                        <span class="btn btn-primary">select file</span>
                                        <input type="file" id="file-input" hidden>
                                    </label>
                                </div>
                            </div>
                            <div class="image-container">
                                <img src="https://placehold.it/150x100" alt="...">
                                <div class="hover-overlay">
                                    <label for="file-input" class="custom-file-button">
                                        <span class="btn btn-primary">select file</span>
                                        <input type="file" id="file-input" hidden>
                                    </label>
                                </div>
                            </div>
                            <div class="image-container">
                                <img src="https://placehold.it/150x100" alt="...">
                                <div class="hover-overlay">
                                    <label for="file-input" class="custom-file-button">
                                        <span class="btn btn-primary">select file</span>
                                        <input type="file" id="file-input" hidden>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="upload-images" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
