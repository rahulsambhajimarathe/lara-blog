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
              <h5 class="card-title">Add category</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="" method="post">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Name *</label>
                  <input type="text" class="form-control" id="inputNanme4" name="name" required value="{{$data['name']}}">
                  <div style="color:red">{{ $errors->first('name') }}</div>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title *</label>
                  <input type="text" class="form-control" id="inputNanme4" name="title" required value="{{$data['slug']}}">
                  <div style="color:red">{{ $errors->first('tiltle') }}</div>
                </div>

                <hr>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label"> Meta Title *</label>
                        <input type="text" class="form-control" id="inputNanme4" name="meta_title" required value="{{$data['meta_title']}}">
                        <div style="color:red">{{ $errors->first('meta_title') }}</div>
                    </div>

                    <div class="col-12">
                        <label for="inputNanme4" class="form-label"> Meta keywords</label>
                        <input type="text" class="form-control" id="inputNanme4" name="meta_keyword" value="{{$data['meta_keywords']}}">
                        <div style="color:red">{{ $errors->first('meta_keyword') }}</div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Meat Description</label>
                        <textarea class="form-control" name="meta_description">{{$data['meta_description']}}</textarea>
                        <div style="color:red">{{ $errors->first('meta_description') }}</div>
                    </div>

                <hr>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Staus *</label>
                    <select class="form-control" name="status">
                    <option {{ ($data['status'] == 1)? 'selected' :  '' }} value="1">Active</option>
                    <option {{ ($data['status'] == 0)? 'selected' :  ''}} value="0">Inactive</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Menu *</label>
                    <select class="form-control" name="menu">
                    <option {{ ($data['is_menu'] == 1)? 'selected' :  '' }} value="1">Yes</option>
                    <option {{ ($data['is_menu'] == 0)? 'selected' :  '' }} value="0">Not</option>
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
