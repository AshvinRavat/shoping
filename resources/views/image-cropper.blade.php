@extends('admin.layouts.app')
@section('content')
  <div class="col-md-9 offset-2">
      <div class="card">
          <div class="card-header p-2">
              <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
              </ul>
          </div>
          <div class="card-body">
              <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                      <div class="container mt-5">
                        <div class="col">
                              <div class="row justify-content-center">
                                  <div class="col-md-12">
                                      <div class="image-container offset-4">
                                          <img src="
                                          @if(session('image_url'))
                                              {{ asset('upload/' . session('image_url') ) }}
                                          @else
                                          {{ asset('img/download.png') }}
                                          @endif"
                                              alt="Image"
                                              name="image"
                                              id="uploaded-image" 
                                              class="image img-fluid">
                                          <input type="file" class="btn btn-primary overlay-button image img-fluid"
                                          name="image">
                                      </div>
                                  </div>
                              </div>
                        </div>
                          <div class="col-md-12">
                            <div class="image-container">
                                <img src="
                                @if(session('image_url'))
                                    {{ asset('upload/' . session('image_url') ) }}
                                @else
                                {{ asset('img/download.png') }}
                                @endif"
                                    alt="Image"
                                    name="image"
                                    id="uploaded-image" 
                                    class="image img-fluid">
                                <input type="file" class="btn btn-primary overlay-button image img-fluid"
                                name="image">
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Laravel 10 Image Croper Upload Example - Laravelia </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="img-container">
                      <div class="row">
                          <div class="col-md-8">
                              <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                          </div>
                          <div class="col-md-4">
                              <div class="preview"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="crop">Crop</button>
              </div>
            </div>
        </div>
    </div>
@endsection
