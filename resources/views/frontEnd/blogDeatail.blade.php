@extends("frontEnd\layout\app")
    @section("content")

    <!-- Detail Start -->
    <div class="container pt-5">
      <div class="row">
        <div class="col-lg-8">
          <div class="d-flex flex-column text-left mb-3">
            <h1 class="mb-3">{{$getRecord->title}}</h1>
            <div class="d-flex">
              <p class="mr-3"><i class="fa fa-user text-primary"></i> {{$getRecord->user_name}}</p>
              <p class="mr-3">
                <i class="fa fa-folder text-primary"></i> {{$getRecord->category_name}}
              </p>
              <p class="mr-3"><i class="fa fa-comments text-primary"></i> 0</p>
            </div>
          </div>
          <div class="mb-5">
            @if(!empty($getRecord->img_file))
              <img class="img-fluid rounded w-100 mb-4" src="{{ url('upload/blog/') }}/{{$getRecord->img_file }}" alt="Image" style="max-height: 574px !important;object-fit: contain;" />
            @endif
            {!! $getRecord->discripttion !!}

          </div>

          <!-- Related Post -->
          <div class="mb-5 mx-n3">
            <h2 class="mb-4 ml-3">Related Post</h2>
            <div class="owl-carousel post-carousel position-relative">
              @foreach($getRelatedCategory as $value)
                <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
                  <img class="img-fluid" src="{{ url('upload/blog/') }}/{{$value->img_file }}" style="width: 80px; height: 80px" />
                  <div class="pl-3">
                    <a href="{{ $value->slug }}">
                      <h5 class="">{!! strip_tags(Str::substr($value->title,0,26)) !!}...</h5>
                  </a>
                    <div class="d-flex">
                      <small class="mr-3"><i class="fa fa-user text-primary"></i> {{ $value->user_name }}</small>
                      <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{ $value->category_name }}</small>
                      <small class="mr-3"><i class="fa fa-comments text-primary"></i> 0</small>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <!-- Comment List -->
          <div class="mb-5">
            <h2 class="mb-4">3 Comments</h2>
            <div class="media mb-4">
              <img
                src="assets/frontend/img/user.jpg"
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
                src="assets/frontend/img/user.jpg"
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
                    src="assets/frontend/img/user.jpg"
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
          <!-- <div
            class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4"
          >
            <img
              src="assets/frontend/img/user.jpg"
              class="img-fluid rounded-circle mx-auto mb-3"
              style="width: 100px"
            />
            <h3 class="text-secondary mb-3">John Doe</h3>
            <p class="text-white m-0">
              Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
              ipsum ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr
              ea sit.
            </p>
          </div> -->

          <!-- Search Form -->
          <div class="mb-5">
            <form action="{{ url('blog')}}">
              <div class="input-group">
                <input type="text" class="form-control form-control-lg" placeholder="Keyword" name="q" required/>
                <div class="input-group-append">
                  <button class="input-group-text bg-transparent text-primary" ><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>

          <!-- Category List -->
          <div class="mb-5">
            <h2 class="mb-4">Categories</h2>
            <ul class="list-group list-group-flush">
              @foreach($getCategory as $value)
                
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                <a href="{{$value->slug}}">{{$value->name}}</a>
                <span class="badge badge-primary badge-pill">{{ $value->totalBlog() }}</span>
              </li>
              @endforeach
            </ul>
          </div>
          <!-- Recent Post -->

          @if(!empty($getRecordRecent->count()))
            

          <div class="mb-5">
            <h2 class="mb-4">Recent Post</h2>

            @foreach($getRecordRecent as $value)              
              <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3" >
                <img class="img-fluid" src="{{ url('upload/blog/') }}/{{$value->img_file }}" style="width: 80px; height: 80px" />
                <div class="pl-3">
                  <a href="{{$value->slug}}">
                    <h5 class="">{!! strip_tags(Str::substr($value->title,0,26)) !!}...</h5>
                  </a>
                  <div class="d-flex">
                    <small class="mr-3"><i class="fa fa-user text-primary"></i> {{$value->user_name}}</small>
                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{$value->category_name}}</small>
                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> 0</small>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          @endif

          <!-- Tag Cloud -->
            <div class="mb-5">
            <h2 class="mb-4">Tag Cloud</h2>
              <div class="d-flex flex-wrap m-n1">
                @foreach($getRelatedTag as $value)
                  <a href="{{ url('blog?q=').$value->name }}" class="btn btn-outline-primary m-1">{{$value->name}}</a>
                @endforeach
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- Detail End -->

@endsection
