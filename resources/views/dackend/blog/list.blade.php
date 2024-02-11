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
              Blog List
                <a href="{{ route('add_blog') }}" class="btn btn-primary pull-right" style="float: right;">Add New</a>
            </h5>

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

  