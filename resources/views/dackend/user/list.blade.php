@extends('dackend\layout\app')
  @section('content')
  <div class="pagetitle">
      <h1>Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div> 

    <section class="section">
      <div class="row">


        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
              User List
                <a href="" class="btn btn-primary pull-right" style="float: right;">Add New</a>
            </h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Email Verified</th>
                    <th scope="col">Status</th>
                    <th scope="col">created data</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($record as $data)
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{ !empty($value->email_verified_at) ? 'Yes': 'No'}}</td>
                            <td>{{ !empty($value->status) ? 'Verified': 'Not Verified'}}</td>
                            <td>{{date('d-m-Y H:i:A', strtotime($data->created_at)) }}</td>
                            <td><a href="panel/user/list/delete/{{$data->id}}" class="btn btn-danger btn-sm">Delete</a> | <a href="user/list/edit/{{$data->id}}" class="btn btn-primary btn-sm">Edit</a></td>
                        </tr>                        
                        
                    @empty
                        <tr>
                            <th colspan="100%">2</th>
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
  @endsection

  