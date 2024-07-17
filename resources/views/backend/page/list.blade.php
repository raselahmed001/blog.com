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

            <h5 class="card-title  ">Page List

                <a href="{{ url('panel/page/add/') }}" class="btn btn-primary float-sm-end">Add New</a>
            </h5>

            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr class="text-nowrap">
                    <th scope="col">#</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Title</th>
                    <th scope="col">Meta Title</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ( $getRecord as $value )
                  <tr class="text-nowrap">
                      <th scope="row">{{ $value->id }}</th>
                      <td>{{ $value->slug }}</td>
                      <td>{{ $value->title }}</td>
                      <td>{{ $value->meta_title }}</td>
                      
                      <td class="text-nowrap">{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td class="text-nowrap">
                         
                          <a class="btn btn-sm btn-warning mb-1" href="{{ url('panel/page/edit/'.$value->id) }}">
                              <i class="fas fa-edit ">Edit</i>
                          </a>
  
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
            

          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
  @section('script')
  @endsection()




