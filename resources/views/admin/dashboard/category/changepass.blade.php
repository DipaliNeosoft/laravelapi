@extends('admin.dashboard.master')
@section('content')
<h2 class="container text-center">change password</h2>
<form>
<div class="form-group">
    <label for="op">old Password</label>
    <input type="password" class="form-control" id="op" placeholder="old Password">
  </div>
  <div class="form-group">
    <label for="np">New Password</label>
    <input type="password" class="form-control" id="np" placeholder="New Password">
  </div>
  <div class="form-group">
    <label for="cp">Confirm Password</label>
    <input type="password" class="form-control" id="cp" placeholder="Confirm Password">
  </div>
  <button type="submit" class="btn btn-primary">change password</button>
</form>
@stop