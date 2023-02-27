@extends('frontend.layout.master')

@section('content')

<header class="masthead" style="background-image: url({{asset('frontend/assets/img/contact-bg.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contact Me</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                @if($setting->email)
                <h4><span> Email : </span> {{$setting->email}}</h4>
                @endif
                @if($setting->phone)
                <h4><span> Phone : </span> {{$setting->phone}}</h4>
                @endif
                @if($setting->address)
                <h4><span> Address : </span> {{$setting->address}}</h4>
                @endif
                <div class="my-5">

                    <form id="contactForm" action="{{route('send')}}" method="post">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Name</label>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                            <label for="phone">Phone Number</label>
                            @error('phone')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            @error('message')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <br />
                        

                        <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">{{__('nav.send')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection