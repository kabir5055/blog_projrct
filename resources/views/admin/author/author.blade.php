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
                        <form action="{{ route('new.author') }}" method="post" >
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEnterAuthorName" class="col-sm-3 col-form-label">Enter Authors</label>
                                <div class="col-sm-9">
                                    <input type="text" name="author_name" class="form-control" id="inputEnterAuthorName" placeholder="Enter Author Name">
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

    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Add Author</h5>
                        </div>
                        <hr/>
                        <table class="table table-striped table-hover table-bordered text-center">
                            <tr>
                                <th>SL NO</th>
                                <th>Author Name</th>
                                <th>Action</th>
                            </tr>
                            @php $i=1 @endphp
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $author->author_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.author',['id'=>$author->id]) }}" class="btn btn-primary">Edit</a>
                                        <form  action="{{ route('delete.author') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="author_id" value="{{ $author->id }}">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure For Delete This Author !!')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

