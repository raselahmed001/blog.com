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

            <h5 class="card-title  ">Category List

                <a href="{{ url('panel/category/add/') }}" class="btn btn-primary float-sm-end">Add New</a>
            </h5>


            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr class="text-nowrap">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Title</th>
                    <th scope="col">Meta Title</th>
                    <th scope="col">Meta Description</th>
                    <th scope="col">Meta Keywords</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ( $getRecord as $value )
                  <tr class="text-nowrap">
                      <th scope="row">{{ $value->id }}</th>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->slug }}</td>
                      <td>{{ $value->title }}</td>
                      <td>{{ $value->meta_title }}</td>
                      <td>{{ $value->meta_description }}</td>
                      <td>{{ $value->meta_keywords }}</td>
                    
                      
                      
                      <td class="{{ empty($value->is_menu) ? 'text-danger' : 'text-success' }}">
                          {{ !empty($value->is_menu) ? 'Yes' : 'No'}}
                      </td>
                      <td class="{{ empty($value->status) ? 'text-danger' : 'text-success' }}">
                        {{ !empty($value->status) ? 'Active' : 'Inactive'}}
                    </td>
                      
                      <td class="text-nowrap">{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td class="text-nowrap">
                          {{-- <a class="btn btn-sm btn-info" href="">
                              <i class="fas fa-eye">View</i>
                          </a> --}}
  
                          <a class="btn btn-sm btn-warning mb-1" href="{{ url('panel/category/edit/'.$value->id) }}">
                              <i class="fas fa-edit ">Edit</i>
                          </a>
  
                          <a class="btn btn-sm btn-danger" href="{{ url('panel/category/delete/'.$value->id) }}"
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




