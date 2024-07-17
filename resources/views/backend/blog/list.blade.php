@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')

  <section class="section text-nowrap">
    <div class="row">
      <div class="col-lg-12">
        @include('layouts._message')
        <div class="card ">

          <div class="card-body">

            <h5 class="card-title  ">Blog List (Total : {{ $getRecord->total() }})

                <a href="{{ url('panel/blog/add/') }}" class="btn btn-primary float-sm-end">Add New</a>
            </h5>

            <form class="row " accept="get">
              <div class="col-md-1">
                <label  class="form-label">ID</label>
                <input type="text" class="form-control" name="id" value="{{ Request::get('id') }}" >
              </div>

              @if(Auth::user()->is_admin == 1)

              <div class="col-md-2">
                <label  class="form-label">UserName</label>
                <input type="text" class="form-control" name="username" value="{{ Request::get('username') }}" >
              </div>

              @endif

              <div class="col-md-3">
                <label  class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ Request::get('title') }}" >
              </div>
              <div class="col-md-2">
                <label  class="form-label">Category</label>
                <input type="text" class="form-control" name="category"value="{{ Request::get('category') }}" >
              </div>
              <div class="col-md-2">
                <label  class="form-label">Publish</label>
                <select class="form-control" id="status" name="is_publish">
                  <option value="">Select</option>
                  <option {{ (Request::get('is_publish') == '1' ) ? 'selected' : '' }} value="1">Yes</option>
                  <option {{ (Request::get('is_publish') == '100' ) ? 'selected' : '' }}  value="100">No</option>
              </select>
              </div>
              <div class="col-md-2">
                <label  class="form-label">Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="">Select</option>
                  <option {{ (Request::get('status') == '1' ) ? 'selected' : '' }}  value="1">Active</option>
                  <option {{ (Request::get('status') == '100' ) ? 'selected' : '' }}   value="100">Inactive</option>
              </select>
              </div>
              <div class="col-md-2">
                <label  class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date"value="{{ Request::get('start_date') }}" >
              </div>
              <div class="col-md-2">
                <label  class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date"value="{{ Request::get('end_date') }}" >
              </div>
              <div class="col-md-2" style=" margin-top: 33px;">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ url('panel/blog/list') }}" type="reset" class="btn btn-secondary">Reset</a>
              </div>
            </form>
            <hr>

            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr class="text-nowrap">
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    @if(Auth::user()->is_admin == 1)
                     <th scope="col">User Name</th>
                    @endif
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Publish</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ( $getRecord as $value )
                  <tr class="text-nowrap">
                      <th scope="row">{{ $value->id }}</th>
                      <td>

                        @if(!empty($value->getImage()))
                        <img src="{{ $value->getImage() }}" alt="" style="height: 50px; width:50px;">
                              
                        @endif
                      
                      </td>
                      @if(Auth::user()->is_admin == 1)
                      <td>{{ $value->user_name }}</td>
                      @endif
                      <td>{{ $value->title }}</td>
                      <td>{{ $value->category_name }}</td>

                      <td class="{{ empty($value->status) ? 'text-danger' : 'text-success' }}">
                          {{ !empty($value->status) ? 'Active' : 'Inactive'}}
                      </td>
                      <td class="{{ empty($value->is_publish) ? 'text-danger' : 'text-success' }}">
                        {{ !empty($value->is_publish) ? 'Yes' : 'No'}}
                    </td>
                      
                      <td class="text-nowrap">{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td class="text-nowrap">
                          {{-- <a class="btn btn-sm btn-info" href="">
                              <i class="fas fa-eye">View</i>
                          </a> --}}
  
                          <a class="btn btn-sm btn-warning mb-1" href="{{ url('panel/blog/edit/'.$value->id) }}">
                              <i class="fas fa-edit ">Edit</i>
                          </a>
  
                          <a class="btn btn-sm btn-danger" href="{{ url('panel/blog/delete/'.$value->id) }}"
                              onClick="return confirm('Are you sure to Delete?')">
                              <i class="fas fa-trash"></i>
                              Delete</a>
  
                      </td>
                    </tr>
  
                  @empty
                  <tr>
                      <td colspan="100%">Record not found.</td>
                  </tr>
  
                  @endforelse
                  
                </tbody>
              </table>
            </div>
            
            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
  @section('script')
  @endsection()




