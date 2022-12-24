@extends('frontEnd.master')
@section('title')
    Sign_In
@endsection
@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Sign_In</h1>
                    <h1 class="page-title">{{ session('massage') }}</h1>
                </div>
            </div>


            <div class="form mt-2 m-auto col-md-6">
                <form action="{{ route('blog.signIn') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Your Email or Phone" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required>
                        </div>
                    </div>

                    <div class="text-center"><button type="submit">Sign-Up</button></div>

                </form>
            </div><!-- End Contact Form -->

        </div>
    </section>

@endsection


