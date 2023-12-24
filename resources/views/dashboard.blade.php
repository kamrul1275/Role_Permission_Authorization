@extends('layouts.app')


@section('content')
    <div class="contain">
        <div class="row">
            <div class="col-md-12">


                


                <a href="{{ route('create.post') }}" class="btn btn-success">Create Post</a>


                @can('view')
                    <ul>

                        <div class="container">
                            View part
                            <div class="row">
                                <div class="col-md-7">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Np</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($posts as $post)
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->description }}</td>
                                                    <td>{{ $post->user->name }}</td>
                                                    <td>
                                                        {{-- @can('view', $post)
                                                            <a href="{{ route('show.post', $post) }}" class="btn btn-info">Edit</a>
                                                        @endcan --}}
                                                        {{-- <a href="{{ route('edit.post', $post) }}" class="btn btn-success">Edit</a> --}}



                                                        <a href="{{ route('delete.post', $post->id) }}"
                                                            class="btn btn-danger">Delete</a>




                                                        {{-- @dd(dd(auth()->user()->roles)) --}}

                                                        {{-- //@dd($user->roles->pluck('name'));  --}}

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-5">
                                </div>

                            </div>
                        </div>
                        {{-- //<li><a href="" class="btn btn-success">view</a></li>
 --}}
                    @endcan




                    @can('edit')
                        <li><a href="" class="btn btn-info">Edit</a></li>
                    @endcan




                    @can('delete')
                        <li><a href="" class="btn btn-danger">Delete</a></li>
                    @endcan

                </ul>




                @can('isAdmin')
                    <h4 class="text-center py-2">Admin can access this portion (admin)</h4>
                @endcan




                @can('isManager')
                    <h4>Manager can access this portion (Manager)</h4>
                @endcan




                @can('isCreator')
                    <h4 class="text-center py-2">Creator can access this portion (Creator)</h4>
                @endcan


                <a href="{{ route('index.gate') }}" class="btn btn-sm btn-info">Authorize.</a>

                <a href="{{ route('index.post') }}" class="btn btn-sm btn-warning">Post</a>



            </div>

        </div>

    </div>
@endsection
