@extends('backend.layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ url('assets/tagsinput/bootstrap-tagsinput.css') }}">
@endsection
@section('content')

<section class="section">
    <div class="row">
      

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            
            <h5 class="card-title">Edit Page</h5>
            <form class="row g-3" action="" method="POST">
                {{ csrf_field() }}       
                <div class="col-12">
                    <label  class="form-label ">Slug *</label>
                    <input type="text" name="slug"value="{{ $getRecord->slug }}"  class="form-control" id="inputNanme4" required>
                  </div>
              <div class="col-12">
                <label  class="form-label ">Title *</label>
                <input type="text" name="title"value="{{ $getRecord->title }}"  class="form-control" id="inputNanme4" required>
              </div>

              <div class="col-12">
                <label  class="form-label ">Description *</label>
                <textarea class="form-control tinymce-edito"  name="description" id="" >{{ $getRecord->description }}</textarea>
              </div>

              <div class="col-12">
                <label  class="form-label ">Meta Title</label>
                <textarea class="form-control"name="meta_title" id="meta_title">{{ $getRecord->meta_title }}</textarea>
              </div>

              <hr>

              <div class="col-12">
                <label  class="form-label ">Meta Description</label>
                <textarea class="form-control" name="meta_description" id="meta_description">{{ $getRecord->meta_description }}</textarea>
                <div style="color: red">{{ $errors->first('meta_description') }}</div>
              </div>
            
              <div class="col-12">
                <label  class="form-label ">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="{{ $getRecord->meta_keywords }}" class="form-control" id="inputNanme4" >
                <div style="color: red">{{ $errors->first('meta_keywords') }}</div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

  @endsection
  @section('script')
  <script src="{{ url('assets/tagsinput/bootstrap-tagsinput.js') }}"></script>
  <script type="text/javascript">
    $("#tags").tagsinput();
  </script>
    @endsection()




