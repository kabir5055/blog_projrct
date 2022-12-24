@extends('frontEnd.master')
@section('title')
    Sign_Up
@endsection
@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Sign_Up</h1>
                </div>
            </div>


            <div class="form mt-2 m-auto col-md-6">
                <form action="{{ route('blog.signUp') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row col-md-12">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Your Phone" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required>                        </div>
                    </div>

                    <div class="text-center"><button type="submit">Sign-Up</button></div>

                </form>
            </div><!-- End Contact Form -->

        </div>
    </section>

@endsection

