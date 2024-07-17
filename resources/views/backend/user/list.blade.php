@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        @include('layouts._message')
        <div class="card">

          <div class="card-body">

            <h5 class="card-title">Users List

                <a href="{{ url('panel/user/add') }}" class="btn btn-primary float-sm-end">Add New</a>
            </h5>


            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Email Verified</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ( $getRecord as $value )
                  <tr>
                      <th scope="row">{{ $value->id }}</th>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      {{-- <td>{{ !empty($value->email_verified_at) ? 'Yes' : 'No'}}</td> --}}
                      <td class="{{ !empty($value->email_verified_at) ? 'text-success' : 'text-danger' }}">
                          {{ !empty($value->email_verified_at) ? 'Yes' : 'No' }}
                      </td>
                      
                      {{-- <td>{{ !empty($value->status) ? 'Active' : 'Inactive'}}</td> --}}
                      <td class="{{ !empty($value->status) ? 'text-success' : 'text-danger' }}">
                          {{ !empty($value->status) ? 'Active' : 'Inactive'}}
                      </td>
                      
                      <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td>
                          {{-- <a class="btn btn-sm btn-info" href="">
                              <i class="fas fa-eye">View</i>
                          </a> --}}
  
                          <a class="btn btn-sm btn-warning mb-1" href="{{ url('panel/user/edit/'.$value->id) }}">
                              <i class="fas fa-edit ">Edit</i>
                          </a>
  
                          <a class="btn btn-sm btn-danger" href="{{ url('panel/user/delete/'.$value->id) }}"
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




