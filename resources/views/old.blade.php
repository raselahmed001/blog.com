
@extends('layouts.app')
@section('style')
@endsection
@section('content')

  <!-- Detail Start -->
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-8">
        <div class="d-flex flex-column text-left mb-3">
          <h1 class="mb-3">{{ $getRecord->title }}</h1>
          <div class="d-flex">
            <p class="mr-3"><i class="fa fa-user text-primary"></i> {{ $getRecord->user_name }}</p>
            <p class="mr-3">
              <i class="fa fa-folder text-primary"></i> {{ $getRecord->category_name }}
            </p>
            <p class="mr-3"><i class="fa fa-comments text-primary"></i> 0</p>
          </div>
        </div>
        <div class="mb-5">
            @if(!empty($getRecord->getImage()))
   
          <img style="max-height: fit-content; object-fit: cover;" 
            class="img-fluid rounded w-100 mb-4"
            src="{{ $getRecord->getImage() }}"
            alt="Image"
          />
          @endif

          {!! $getRecord->description !!}
        
        </div>

        <!-- Related Post -->
        @if(!empty($getRelatedPost->count()))
      
        <div class="mb-5 mx-n3">
          <h2 class="mb-4 ml-3">Related Post</h2>
          <div class="owl-carousel post-carousel position-relative">
            @foreach($getRelatedPost as $relatedPost)

            <div
              class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
              <img
                class="img-fluid"
                src="{{ $relatedPost->getImage() }}"
                style="width: 80px; height: 80px; object-fit: cover;"/>
              <div class="pl-3">
                <a href="{{ url($relatedPost->slug) }}">
                  <h5 class="">{!! strip_tags(Str::substr($getRelatedPost->title,0,23)) !!}</h5>
                </a>
                <div class="d-flex">
                  <small class="mr-3"><i class="fa fa-user text-primary"></i> {{ $getRelatedPost->user_name}}</small>
                  <small class="mr-3"><i class="fa fa-folder text-primary"></i>{{ $getRelatedPost->category_name}}</small>
                  <small class="mr-3"><i class="fa fa-comments text-primary"></i> 0</small>
                </div>
              </div>
            </div>
            @endforeach
              
          </div>
        </div>

        @endif

        <!-- Comment List -->
        <div class="mb-5">
          <h2 class="mb-4">3 Comments</h2>
          <div class="media mb-4">
            <img
              src="front/img/user.jpg"
              alt="Image"
              class="img-fluid rounded-circle mr-3 mt-1"
              style="width: 45px"
            />
            <div class="media-body">
              <h6>
                John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
              </h6>
              <p>
                Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                sadipscing, at tempor amet ipsum diam tempor consetetur at
                sit.
              </p>
              <button class="btn btn-sm btn-light">Reply</button>
            </div>
          </div>
          <div class="media mb-4">
            <img
              src="front/img/user.jpg"
              alt="Image"
              class="img-fluid rounded-circle mr-3 mt-1"
              style="width: 45px"
            />
            <div class="media-body">
              <h6>
                John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
              </h6>
              <p>
                Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                sadipscing, at tempor amet ipsum diam tempor consetetur at
                sit.
              </p>
              <button class="btn btn-sm btn-light">Reply</button>
              <div class="media mt-4">
                <img
                  src="front/img/user.jpg"
                  alt="Image"
                  class="img-fluid rounded-circle mr-3 mt-1"
                  style="width: 45px"
                />
                <div class="media-body">
                  <h6>
                    John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                  </h6>
                  <p>
                    Diam amet duo labore stet elitr ea clita ipsum, tempor
                    labore accusam ipsum et no at. Kasd diam tempor rebum
                    magna dolores sed sed eirmod ipsum. Gubergren clita
                    aliquyam consetetur, at tempor amet ipsum diam tempor at
                    sit.
                  </p>
                  <button class="btn btn-sm btn-light">Reply</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Comment Form -->
        <div class="bg-light p-5">
          <h2 class="mb-4">Leave a comment</h2>
          <form>
            <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" class="form-control" id="name" />
            </div>
            <div class="form-group">
              <label for="email">Email *</label>
              <input type="email" class="form-control" id="email" />
            </div>
            <div class="form-group">
              <label for="website">Website</label>
              <input type="url" class="form-control" id="website" />
            </div>

            <div class="form-group">
              <label for="message">Message *</label>
              <textarea
                id="message"
                cols="30"
                rows="5"
                class="form-control"
              ></textarea>
            </div>
            <div class="form-group mb-0">
              <input
                type="submit"
                value="Leave Comment"
                class="btn btn-primary px-3"
              />
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-4 mt-5 mt-lg-0">
        <!-- Author Bio -->
        {{-- <div
          class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4"
        >
          <img
            src="front/img/user.jpg"
            class="img-fluid rounded-circle mx-auto mb-3"
            style="width: 100px"
          />
          <h3 class="text-secondary mb-3">John Doe</h3>
          <p class="text-white m-0">
            Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
            ipsum ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr
            ea sit.
          </p>
        </div> --}}

        <!-- Search Form -->
        <div class="mb-5">
          <form action="">
            <div class="input-group">
              <input
                type="text"
                class="form-control form-control-lg"
                placeholder="Keyword"
              />
              <div class="input-group-append">
                <span class="input-group-text bg-transparent text-primary"
                  ><i class="fa fa-search"></i
                ></span>
              </div>
            </div>
          </form>
        </div>

        <!-- Category List -->
        <div class="mb-5">
          <h2 class="mb-4">Categories</h2>
          <ul class="list-group list-group-flush">
            @foreach($getCategory as $category)
   
            <li
              class="list-group-item d-flex justify-content-between align-items-center px-0"
            >
              <a href="">{{ $category->name }}</a>
              <span class="badge badge-primary badge-pill">{{ $category->totalBlog() }}</span>
            </li>
            @endforeach
          </ul>
        </div>

        <!-- Recent Post -->
        <div class="mb-5">
          <h2 class="mb-4">Recent Post</h2>
          @foreach($getRecentPost as $recentPOst)

          <div
            class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3"
          >
          @if(!@empty($recentPOst->getImage()))
            <img
              class="img-fluid"
              src="{{ $recentPOst->getImage() }}"
              style="width: 80px; height: 80px;object-fit: cover;"
            />

            @endif

            <div class="pl-3">
              <a href="{{ url($recentPOst->slug) }}">
                <h5 class="">{!! strip_tags(Str::substr($recentPOst->title,0,20)) !!}</h5>
              </a>
              <div class="d-flex">
                <small class="mr-3"
                  ><i class="fa fa-user text-primary"></i> {{ $recentPOst->user_name}}</small
                >
                <small class="mr-3"
                  ><i class="fa fa-folder text-primary"></i>{{ $recentPOst->category_name}}</small
                >
                <small class="mr-3"
                  ><i class="fa fa-comments text-primary"></i> 0</small
                >
              </div>
            </div>
          </div>
            
          @endforeach

        <!-- Tag Cloud -->
        <div class="mb-5">
          <h2 class="mb-4">Tag Cloud</h2>
          <div class="d-flex flex-wrap m-n1">
            <a href="" class="btn btn-outline-primary m-1">Design</a>
            <a href="" class="btn btn-outline-primary m-1">Development</a>
            <a href="" class="btn btn-outline-primary m-1">Marketing</a>
            <a href="" class="btn btn-outline-primary m-1">SEO</a>
            <a href="" class="btn btn-outline-primary m-1">Writing</a>
            <a href="" class="btn btn-outline-primary m-1">Consulting</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Detail End -->

@endsection
@section('script')
@endsection