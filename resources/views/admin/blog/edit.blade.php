@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Add Blog</h5>
                        </div>
                        <hr/>
                        <form action="{{ route('update.blog') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEnterCategoryName" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="" class="form-control">
                                        @foreach( $categories as $category)
                                                <option value="{{ $category->id }} ">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterAuthorName" class="col-sm-3 col-form-label">Author Name</label>
                                <div class="col-sm-9">
                                    <select name="author_id" id="" class="form-control">
                                        @foreach( $authors as $author)
                                            <?php $selected = ''?>
                                            @if($blog->author_id = $author->id)
                                                <?php $selected = 'selected'?>
                                            <option value="{{ $author->id }}" {{ $selected }}>{{ $author->author_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterTitleName" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" value="{{$blog->title}}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterSlugName" class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" name="slug" value="{{$blog->slug}}" class="form-control" placeholder="Slug">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterDescription" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control" placeholder="Description">{{$blog->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input name="image" type="file" class="form-control">
                                    <img width="80" height="80" src="{{asset($blog->image)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterDate" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input name="date" type="date" value="{{$blog->date}}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterBlogType" class="col-sm-3 col-form-label">Blog Type</label>
                                <div class="col-sm-9">
                                    <select name="blog_type" id="" class="form-control">
                                        <?php $selected = '';?>
                                            @if($blog->blog_type == 'popular')
                                                <?php $selected = 'selected';?>
                                                <option value="popular" {{$selected}}>popular</option>
                                                <option value="trending">trending</option>
                                                <option value="latest">latest</option>
                                            @elseif($blog->blog_type == 'trending')
                                                <?php $selected = 'selected';?>
                                                <option value="popular">popular</option>
                                                <option value="trending" {{$selected}}>trending</option>
                                                <option value="latest">latest</option>
                                            @elseif($blog->blog_type == 'latest')
                                                <?php $selected = 'selected';?>
                                                <option value="popular">popular</option>
                                                <option value="trending">trending</option>
                                                <option value="latest" {{$selected}}>latest</option>
                                            @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterStatus" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input name="status" type="radio" value="1"> Publish &nbsp;
                                    <input name="status" type="radio" value="2" > Unpublished &nbsp;
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

