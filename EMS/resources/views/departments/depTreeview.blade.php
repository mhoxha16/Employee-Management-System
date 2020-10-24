@extends('layouts.app')
@section('content')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="application/javascript"></script>
<link href="http://www.expertphp.in/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="http://demo.expertphp.in/css/jquery.treeview.css" />
<script src="http://demo.expertphp.in/js/jquery.js" type="application/javascript"></script>
<script src="http://demo.expertphp.in/js/jquery-treeview.js" type="application/javascript"></script>
<script type="application/javascript" src="http://demo.expertphp.in/js/demo.js"></script>


<div class="container" style="width:900px; padding-top:10px;">

  <div class="row">
    <div class="col-md-6">
      <div class="row justify-content-center">
        <h3>Add New Department</h3>
      </div>
      <br />
      <form method="post" action="/departments/add_tree" id="treeview_form">
        {{ csrf_field() }}
        {{ method_field('post') }}
        <div class="form-group">
          <label>Select Parent Department</label>
          <select name="parent_department" class="form-control">
            @foreach($departments as $key=>$department)
            <option id="{{$department->id}}" value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Enter Department Name</label>
          <input type="text" name="child_department" id="child_department" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
        </div>
      </form>
      <div class="row justify-content-center">
        <h3>Delete Department</h3>
      </div>
      <br>
      <form method="post" action="/departments/show/delete" id="treeview_form">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="form-group">
          <label>Select Department</label>
          <select name="department" class="form-control">
            @foreach($departments as $key=>$department)
            <option id="{{$department->id}}" value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <input type="submit" name="action" id="action" value="Delete" class="btn btn-danger" />
          @method('DELETE')
          @csrf
        </div>
      </form>
      <br>

    </div>
    <div class="col-md-6">
      <div class="row justify-content-center">
        <h3>Department Tree</h3>
      </div>
      <br />
      <div class="container">
        {!! $tree !!}
      </div>
    </div>
  </div>
</div>

@endsection