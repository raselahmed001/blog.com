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
            
            <h5 class="card-title">Add New Blog</h5>
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}       
              <div class="col-12">
                <label  class="form-label ">Title *</label>
                <input type="text" name="title"  class="form-control" id="inputNanme4" required>
              </div>
              <div class="col-12">
                <label  class="form-label ">Category *</label>
                <select class="form-control" name="category_id" id="" required>
                    <option value="">Select Category </option>
                    @foreach($getCategory as $value)
                    <option value="{{ $value->id }} ">{{ $value->name }} </option>
                    @endforeach
                </select>
              </div>
              <div class="col-12">
                <label  class="form-label ">Image *</label>
                <input type="file" name="image_file"  class="form-control" id="inputNanme4" required>
              </div>

              <div class="col-12">
                <label  class="form-label ">Description *</label>
                <textarea class="form-control tinymce-edito"  name="description" id="" ></textarea>
              </div>
              <div class="col-12">
                <label  class="form-label "> Tags</label>
                <input type="text" class="form-control "  name="tags" id="tags" >
              </div>

              <hr>

              <div class="col-12">
                <label  class="form-label ">Meta Description</label>
                <textarea class="form-control" name="meta_description" id="meta_description"></textarea>
                <div style="color: red">{{ $errors->first('meta_description') }}</div>
              </div>
            
              <div class="col-12">
                <label  class="form-label ">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="form-control" id="inputNanme4" >
                <div style="color: red">{{ $errors->first('meta_keywords') }}</div>
              </div>
            

              <hr>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Publish *</label>
                <select class="form-control" id="status" name="is_publish">
                    <option value="1">Yes</option>
                    <option  value="0">No</option>
                </select>
              </div>
           
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status *</label>
                <select class="form-control" id="status" name="status">
                    <option value="1">Active</option>
                    <option  value="0">Inactive</option>
                </select>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
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




