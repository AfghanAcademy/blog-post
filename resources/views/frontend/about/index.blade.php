@extends('frontend.layout.master')

@section('content')

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{asset('frontend/assets/img/about-bg.jpg')}}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>{{$about->title}}</h1>
                            <span class="subheading">{{$about->sub_title}}</span>
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
                        @php
                            echo $about->description
                        @endphp
                        
                    </div>
                </div>
            </div>
        </main>



@endsection