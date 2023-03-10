@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Add Author</h5>
                        </div>
                        <hr/>
                        <form action="{{ route('update.author') }}" method="post" >
                            @csrf
                            <input type="hidden" name="author_id" value="|{{ $author->id }}">
                            <div class="row mb-3">
                                <label for="inputEnterAuthorName" class="col-sm-3 col-form-label">Enter Authors</label>
                                <div class="col-sm-9">
                                    <input type="text" name="author_name" class="form-control" id="inputEnterAuthorName" value="{{ $author->author_name }}">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
