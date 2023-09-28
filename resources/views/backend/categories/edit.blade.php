@extends('backend.master')

@section('content')
    <div class="container">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Category Edit</h5>

                    <!-- Vertical Form -->
                    <form action="{{ route('category.update', $category->id) }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                                id="inputNanme4">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea id="editor" type="text" name="description" class="form-control">
                                {!! $category->description !!}
                            </textarea>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
