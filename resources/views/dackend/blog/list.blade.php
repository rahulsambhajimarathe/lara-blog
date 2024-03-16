@extends('dackend\layout\app')
@section('style')

@endsection
  @section('content')
  <div class="pagetitle">
      <h1>Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">category</li>
        </ol>
      </nav>
    </div> 

    <section class="section">
      <div class="row">
      @include("fronEnd.layout._message")

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
              Blog List ( Total : {{ $getRecord->total() }})
                <a href="{{ route('add_blog') }}" class="btn btn-primary pull-right" style="float: right;">Add New</a>
            </h5>

            <div class="card">
              <div class="card-body">
                <!-- <h5 class="card-title">Vertical Form</h5> -->

                <!-- Vertical Form -->
                <form class="row g-3" method="get">
                  <div class="col-md-1">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" value="{{ Request::get('id')}}" name="id">
                  </div>
                  <div class="col-md-2">
                    <label for="username" class="form-label">UserName</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ Request::get('username')}}">
                  </div>
                  <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ Request::get('title')}}">
                  </div>
                  <div class="col-md-2">
                    <label for="category" class="form-label">category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ Request::get('category')}}">
                  </div>
                  <div class="col-md-2">
                    <label for="inputPassword4" class="form-label">Status *</label>
                      <select class="form-control" name="status">

                      <option value="">Status</option>
                      <option value="1" {{ ( Request::get('status') == 1) ? 'selected' : '' }}>Active</option>
                      <option value="100" {{ ( Request::get('status') == 100) ? 'selected' : '' }}>Inactive</option>
                      </select>
                  </div>
                  <div class="col-md-1">
                    <label for="inputPassword4" class="form-label">Publish *</label>
                      <select class="form-control" name="is_publish">
                      <option value="">Publish</option>
                        <option value="1" {{ ( Request::get('is_publish') == 1) ? 'selected' : '' }}>Yes</option>
                        <option value="100" {{ ( Request::get('is_publish') == 100) ? 'selected' : '' }}>No</option>
                      </select>
                  </div>
                  <div class="col-md-2">
                    <label for="category" class="form-label">Stared Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ Request::get('start_date')}}">
                  </div>
                  <div class="col-md-2">
                    <label for="category" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ Request::get('end_date')}}">
                  </div>

                  <div class="text-center col-md-2">
                    <label class="form-label d-block">&nbsp;</label>
                    <button type="submit" class="btn btn-primary ">Submit</button>
                    <a type="reset" class="btn btn-secondary" href="{{ url('panel/blog/list') }}">Reset</a>
                  </div>
                </form><!-- Vertical Form -->

              </div>
            </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th scope="col">Id</th>
                    <th scope="col">UserName</th>
                    <th scope="col">title</th>
                    <th scope="col">Category</th>
                    <th scope="col">status</th>
                    <th scope="col">Publish</th>
                    <th scope="col">created at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                        @forelse($getRecord as $data)
                            <tr>
                                <th scope="row">{{$data->id}}</th>
                                <td>{{$data->user_name}}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->category_name }}</td>
                                <td>
                                    @if($data->status == 0)
                                      <span class="text-danger">Inactive</span>
                                    @else
                                      <span class="text-success">Active</span>
                                    @endif  
                                </td>
                                <td>
                                    @if($data->is_publish == 0)
                                          <span class="text-danger">No</span>
                                        @else
                                          <span class="text-success">Yes</span>
                                        @endif  
                                </td>
                                <td>{{ date('d-m-Y H:i A', strtotime($data->created_at)) }}</td>
                                <td>
                                  <a href="{{ route('delete_post', ['id' => $data->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm(' Are your sure you want to delete record?');" >Delete</a> 
                                  | 
                                  <a href="{{ route('edit_post', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            </tr>                        
                            
                        @empty
                            <tr>
                                <th colspan="100%">record Not Found</th>
                            </tr>
                        @endforelse    


                </tbody>
              </table>
              <!-- End Table with stripped rows -->
                <div>

                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
            </div>
          </div>


        </div>
      </div>
    </section>
    @section('script')

@endsection
  @endsection

  