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
              Category List
                <a href="{{ route('add_category') }}" class="btn btn-primary pull-right" style="float: right;">Add New</a>
            </h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">title</th>
                    <th scope="col">Meta title</th>
                    <th scope="col">meta description</th>
                    <th scope="col">meta keywords</th>
                    <th scope="col">status</th>
                    <th scope="col">created at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($record as $data)
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->name}}</td>
                            <td>{{ $data->slug }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->meta_title }}</td>
                            <td>{{ $data->meta_description }}</td>
                            <td>{{ $data->meta_keywords }}</td>
                            <td>{{ empty($data->status)? 'Active': 'Inactive' }}</td>
                            <td>{{ date('d-m-Y H:i A', strtotime($data->created_at)) }}</td>
                            <td><a href="{{ route('delete_category', ['id' => $data->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm(' Are your sure you want to delete record?');" >Delete</a> | <a href="{{ route('edit_category', ['id' => $data->id]) }}" class="btn btn-primary btn-sm">Edit</a></td>
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
                    {!! $record->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
            </div>
          </div>


        </div>
      </div>
    </section>
    @section('script')

@endsection
  @endsection

  