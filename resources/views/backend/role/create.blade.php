@extends('backend.layout.master')
@section('content')
    <div class="container mt-4">

        <div class="row">

            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" name="name" class="form-control" id="name">
                </div>

                <div class="mt-4">

                    <select name="permissions[]" id="">
                        <option value="1">view</option>
                        <option value="2">create</option>
                        <option value="3">delete</option>

                    </select>

                </div>


                {{-- <div class="mt-4">

                    <select name="permission_id" id="">
                        <option value="view">view</option>
                        <option value="create">create</option>
                        <option value="delete">delete</option>

                    </select>

                </div> --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@endsection
