@extends('dackend\layout\app')
  @section('style')
  <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/assets/tagsinput/bootstrap-tagsinput.css') }}">
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
              <h5 class="card-title">Add new Page</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title *</label>
                  <input type="text" class="form-control" id="inputNanme4" name="title" required>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Slug *</label>
                  <input type="text" class="form-control" id="inputNanme4" name="slug" required>
                </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label"> Description *</label>
                        <textarea class="tinymce-editor" name="content_data">

                        </textarea>
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label"> Meta Title</label>
                        <input type="text" class="form-control" id="inputNanme4" name="meta_title" value="">
                        <div style="color:red"></div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Meta Description</label>
                        <textarea class="form-control" name="meta_description"></textarea>
                        <div style="color:red"></div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Meta Keyword</label>
                        <input type="text" class="form-control" id="inputNanme4" name="meta_keyword" value="">
                    </div>

                <hr>

                <!-- <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status *</label>
                    <select class="form-control" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Publish *</label>
                    <select class="form-control" name="is_publish">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    </select>
                </div> -->
                <div class="text-center" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>


        </div>
      </div>
    </section>

@section('script')
<script src="{{ url('assets/admin/assets/tagsinput/bootstrap-tagsinput.js') }}"></script>
<script>
  $("#tags").tagsinput()
</script>
@endsection
@endsection
