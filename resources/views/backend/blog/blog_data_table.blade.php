@extends('backend.layouts.app')

@section('style')
@endsection

@section('content')

<main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title  ">Blog List (Total : {{ $getRecord->total() }})

                    <a href="{{ url('panel/blog/add/') }}" class="btn btn-primary float-sm-end">Add New</a>
                </h5>
    


              <!-- Table with stripped rows -->
              <table class="table datatable">
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
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@section('script')
<script type="text/javascript">
    function eventFired(type) {
        if (type !== 'Search') {
            let n = document.querySelector('#demo_info');
            n.innerHTML += '<div>' + type + ' event - ' + new Date().getTime() + '</div>';
            n.scrollTop = n.scrollHeight;
        }
    }

    new DataTable('#example')
        .on('order.dt', () => eventFired('Order'))
        .on('search.dt', () => eventFired('Search'))
        .on('page.dt', () => eventFired('Page'));

    new DataTable('#example', {
    ajax: 'scripts/server_processing.php',
    processing: true,
    serverSide: true
});
</script>
@endsection
