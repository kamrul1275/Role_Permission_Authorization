
@extends('layouts.app')

@section('content')


<div class="col-md-7">


    <form>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="title">
        </div>
    
        <div class="mb-3">
            <label for="des" class="form-label">Description</label>
            <input type="tezt" class="form-control" id="des">
        </div>
    
        <button type="submit" class="btn btn-danger text-dark">Submit</button>
    </form>
    

</div>

@endsection