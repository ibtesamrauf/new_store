@extends('layouts.app_admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Create</h1>
  <p class="mb-4">Create a new Categorie Here.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Create Categorie</h6>
    </div>
    <div class="card-body">
      <form action="{{route('categorie.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="John doe">
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
        </div>
        <div class="form-group">
          <label for="desc">Description</label>
          <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="enable" name="status" value="1">
          <label class="form-check-label" for="enable">
            Enable
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="disabled" name="status" value="0">
          <label class="form-check-label" for="disabled">
            Disabled
          </label>
        </div>
        <br>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Create</button>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

 
@endsection
