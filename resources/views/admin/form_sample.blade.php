@extends('layouts.app_admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Example</h6>
    </div>
    <div class="card-body">
      <form action="" method="">
        <div class="form-group">
          <label for="exampleFormControlInput1">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Example select</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Example multiple select</label>
          <select multiple class="form-control" id="exampleFormControlSelect2">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Example textarea</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
          <label class="form-check-label" for="defaultCheck1">
            Default checkbox
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
          <label class="form-check-label" for="defaultCheck2">
            Disabled checkbox
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
          <label class="form-check-label" for="exampleRadios3">
            Default radio
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
          <label class="form-check-label" for="exampleRadios3">
            Disabled radio
          </label>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

 
@endsection
