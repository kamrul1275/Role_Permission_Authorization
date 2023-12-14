@extends('layouts.app')


@section('content')


<div class="contain">
<div class="row">
<div class="col-md-12">


  <a href="{{ route('role.create')}}">Create Role</a>



  @can('admin', auth()->user())
<h2>hello Admin</h2>
@endcan


@can('maneger', auth()->user())
<h2>edit.........</h2>
@endcan



  <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Permission</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>mdo</td>
            <td>

<a href="{{ url('edit/test')}}" class="btn btn-success">Edit</a>

<a href="" class="btn btn-danger">Delete</a>

            </td>
          </tr>
       
        </tbody>
      </table> 

</div>

</div>

</div>

@endsection