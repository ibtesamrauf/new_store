@extends('layouts.app_admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-md-10">
          <h6 class="m-0 font-weight-bold text-primary">Categories List</h6>
        </div>
        <div class="col-md-2">
          <a href="{{route('categorie.create')}}" class="float-right btn btn-success">
            <i class="fas fa-plus"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Image</th>
              <th>Description</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Image</th>
              <th>Description</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($categories as $categorie)
              <tr>
                <td>{{$categorie->id}}</td>
                <td>{{$categorie->name}}</td>
                <td>
                  <img class="img-thumbnail medium-image" src="{{ Storage::disk(config('filesystems.default'))->url($categorie->image) }}">
                </td>
                <td>{{$categorie->desc}}</td>
                <td>{{$categorie->status ? "Enable" : "Disable"}}</td>
                <td>
                  <a class="btn btn-primary" href="{{route('categorie.edit',$categorie->id)}}">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a class="btn btn-danger" href="{{route('categorie.edit',$categorie->id)}}">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @include('pagination.default', ['paginator' => $categories]) 
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

 
@endsection
