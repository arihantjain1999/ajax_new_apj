@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">Datatable Task</h5>
      <p class="card-text">Datatable With mass update funtionality</p>
      <a href=" {{route('students.index')}} " class="btn btn-primary">student Data</a>
    </div>
  </div>
  <div class="card my-3">
    <div class="card-header ">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">Dynamic Form  Task</h5>
      <p class="card-text">Dynamic fom using ajax Jquery</p>
      <a href=" {{route('family.index')}} " class="btn btn-primary">Dynamic Form</a>
    </div>
@endsection
