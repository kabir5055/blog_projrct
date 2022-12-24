@extends('frontEnd.master')
@section('title')
    Details
@endsection
@section('content')
<main id="main">

    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta"><span class="date">{{ $blogs->category_name }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("M jS 'y"),strtotime( $blogs->date ) }}</span></div>
                        <h1 class="mb-5">{{ $blogs->title }}</h1>
                        <p><span class="firstcharacter"></span>{{ substr($blogs->description,0,300) }}</p>

                        <img src="{{ asset( $blogs->image) }}" alt="" class="w-75 img-fluid">

                        <p class="mt-3">{{ substr($blogs->description,300) }}</p>

                    </div><!-- End Single Post Content -->

                    <!-- ======= Comments ======= -->
                    <div class="comments">
                        <h5 class="comment-title py-4">{{ count($comments) }} Comments</h5>
                        @foreach($comments as $comment)
                            <div class="comment d-flex mb-4">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm rounded-circle">
                                        <img class="avatar-img" src="{{ asset('frontEndAsset') }}/assets/img/person-5.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                    <div class="comment-meta d-flex align-items-baseline">
                                        <h6 class="me-2">{{ $comment->name }}</h6>
                                        <span class="text-muted">{{ date("M js 'y g:i a"),strtotime($comment->created_at) }}</span>
                                    </div>
                                    <div class="comment-body">
                                        {{ $comment->comment }}
                                    </div>

                                    <div class="comment-replies bg-light p-3 mt-3 rounded">
                                        <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                                        <div class="reply d-flex mb-4">
                                            <div class="flex-shrink-0">
                                                <div class="avatar avatar-sm rounded-circle">
                                                    <img class="avatar-img" src="{{ asset('frontEndAsset') }}/assets/img/person-4.jpg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-2 ms-sm-3">
                                                <div class="reply-meta d-flex align-items-baseline">
                                                    <h6 class="mb-0 me-2">Brandon Smith</h6>
                                                    <span class="text-muted">2D</span>
                                                </div>
                                                <div class="reply-body">
                                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reply d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar avatar-sm rounded-circle">
                                                    <img class="avatar-img" src="{{ asset('frontEndAsset') }}/assets/img/person-3.jpg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-2 ms-sm-3">
                                                <div class="reply-meta d-flex align-items-baseline">
                                                    <h6 class="mb-0 me-2">James Parsons</h6>
                                                    <span class="text-muted">1d</span>
                                                </div>
                                                <div class="reply-body">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente, praesentium.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- End Comments -->

                    <!-- ======= Comments Form ======= -->
                    <div class="row justify-content-center mt-5">

                        <div class="col-lg-12">
                            <h5 class="comment-title">Leave a Comment</h5>
                            @if(Session::get('userId'))
                                <div class="row">
                                    <form action="{{ route('new.comment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{ $blogs->id }}">
                                        <input type="hidden" name="user_id" value="{{ Session::get('userId') }}">
                                        <div class="col-12 mb-3">
                                            <label for="comment-message" class="mb-2">Comment</label>
                                            <textarea class="form-control" name="comment" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary" value="Post comment">
                                        </div>
                                    </form>
                                </div>
                            @else
                                <h3 class="text-success mt-5">Please
                                    <a href="{{ route('blog.signIn') }}" class="text-danger mx-1">Login</a>
                                    For Comment.
                                </h3>
                            @endif
                        </div>
                    </div><!-- End Comments Form -->

                </div>
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Related Content</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <!-- Popular -->
                            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                                @foreach($categoryWiseBlogs as $categoryWiseBlog)
                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">{{ $categoryWiseBlog->category_name }}</span> <span class="mx-1">&bullet;</span> <span>{{ date("M jS 'y"),strtotime($categoryWiseBlog->date) }}</span></div>
                                    <h2 class="mb-2"><a href="{{ route('details',['slug'=>$categoryWiseBlog->slug]) }}">{{ $categoryWiseBlog->title }}</a></h2>
                                    <span class="author mb-3 d-block">{{ $categoryWiseBlog->author_name }}</span>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="aside-block">
                        <h3 class="aside-title">Video</h3>
                        <div class="video-post">
                            <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                                <span class="bi-play-fill"></span>
                                <img src="{{ asset('frontEndAsset') }}/assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    {{-- End Video--}}

                    <div class="aside-block">
                        <h3 class="aside-title">Categories</h3>
                        <ul class="aside-links list-unstyled">
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Business</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Culture</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Sport</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Food</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Politics</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Startups</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Travel</a></li>
                        </ul>
                    </div>
{{--                        <!-- End Categories -->--}}

                    <div class="aside-block">
                        <h3 class="aside-title">Tags</h3>
                        <ul class="aside-tags list-unstyled">
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Culture</a></li>
                            <li><a href="#">Sport</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Politics</a></li>
                            <li><a href="#">Celebrity</a></li>
                            <li><a href="#">Startups</a></li>
                            <li><a href="#">Travel</a></li>
                        </ul>
                    </div>
{{--                        <!-- End Tags -->--}}
                </div>
            </div>
        </div>
    </section>

@endsection
