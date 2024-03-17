@extends("frontEnd\layout\app")
    @section("content")
   <!-- Header Start -->
   <div class="container-fluid bg-primary mb-5">
      <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Our Blog</h3>
      </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
      <div class="container">

      <div class="row pb-3">
          @foreach($getRecord as $value)
            
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top" src="{{ url('upload/blog/') }}/{{$value->img_file }}" alt="" style="height: 233px !important;width: 100%; object-fit: contain;" />
              <div class="card-body bg-light text-center p-4">
              <a href="{{$value->slug }}">

                <h4 class="">
                  {!! strip_tags(Str::substr($value->title,0,40)) !!}...
                </h4>
              </a>  

                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3">
                    <i class="fa fa-user text-primary"></i>
                    {{$value->user_name }}
                  </small>
                  <small class="mr-3">
                    <i class="fa fa-folder text-primary"></i>
                    {{$value->category_name }}
                    </small>
                  <small class="mr-3">
                    <i class="fa fa-comments text-primary"></i> 0</small>
                </div>
                <p>
                  {!! strip_tags(Str::substr($value->discripttion,0,165)) !!}...
                </p>
                <a href="{{$value->slug }}" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
              </div>
            </div>
          </div>
          @endforeach

          <div class="col-md-12 mb-4">
            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

          </div>
        </div>
      </div>
    </div>

    <!-- Blog End -->

@endsection
