@extends('backend.master')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Category Table</h5>
                        <span><a href="{{ route('category.create') }}" class=" btn btn-primary btn-sm">New Category</a></span>
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sel No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm">Show</a>
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>



        </div>
    </div>
@endsection
