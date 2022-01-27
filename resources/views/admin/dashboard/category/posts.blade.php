@extends('admin.dashboard.master')
@section('content')
<h2>posts</h2>
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">{{Session::get('error')}}</div>
@endif
<form method="post" action="{{url('/sendposts')}}" enctype="multipart/form-data">
    @csrf()
  <div class="form-group">
    <label for="t">title</label>
    <input type="text" name="title" class="form-control" id="t" >
    @if($errors->has('title'))
    <label class="alert alert-danger">{{$errors->first('title')}}</label>
    @endif
   
  </div>
  <div class="form-group">
    <label for="b">body</label>
    <textarea name="body" class="form-control" id="b"></textarea>
    @if($errors->has('body'))
    <label class="alert alert-danger">{{$errors->first('body')}}</label>
    @endif
  </div>
  <div class="form-group">
    <label >image</label>
    <input type="file" name="file" class="form-control" >
    @if($errors->has('file'))
    <label class="alert alert-danger">{{$errors->first('file')}}</label>
    @endif
</div>
  <input type="submit" name="sub" value="submit" class="btn btn-primary">
</form>
@stop