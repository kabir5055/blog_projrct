@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Add Category</h5>
                        </div>
                        <hr/>
                        <form action="{{ route('new.category') }}" method="post" >
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEnterCategoryName" class="col-sm-3 col-form-label">Enter Categories</label>
                                <div class="col-sm-9">
                                    <input type="text" name="category_name" class="form-control" id="inputEnterCategoryName" placeholder="Enter Category Name">
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
                            <h5 class="mb-0">Add Category</h5>
                        </div>
                        <hr/>
                        <table class="table table-striped table-hover table-bordered text-center">
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @php $i=1 @endphp
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->status == 1 ? 'Published' :'Unpublished' }}</td>
                                <td>
                                    <a href="{{ route('edit.category',['id'=> $category->id]) }}" class="btn btn-primary">Edit</a>
                                    <form  action="{{ route('delete.category') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure For Delete This Category !!')">Delete</button>
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
