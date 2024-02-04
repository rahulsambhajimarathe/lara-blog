@extends('dackend\layout\app')
  @section('style')

  @endsection
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
              <h5 class="card-title">Edit User</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="" method="post">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Name</label>
                  <input type="text" class="form-control" id="inputNanme4" name="name" required value="{{$record['name']}}">
                  <div style="color:red">{{ $errors->first('name') }} </div>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" name="email" required value="{{$record['email']}}">
                  <div style="color:red">{{ $errors->first('email') }}</div>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="text" class="form-control" id="inputPassword4" name="password">
                  <div style="color:red">{{ $errors->first('password') }}</div>
                  <p>Due you want change password so please fill password input box</p>
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Staus</label>
                    <select class="form-control" name="status">
                        <option {{ ($record->status == 1)? 'selected' : '' }} value="1">Active</option>
                        <option {{ ($record->status == 0)? 'selected' :  '' }} value="0">Inactive</option>
                    </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>


        </div>
      </div>
    </section>

@section('script')

@endsection
@endsection

  