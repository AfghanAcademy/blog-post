@extends('frontend.layout.master')

@section('content')
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{asset('frontend/assets/img/home-bg.jpg')}}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="{{route('home.show',['slug'=>$post->slug])}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{{$post->sub_title}}</h3>
                        </a>
                        <p class="post-meta">
                            {{$post->created_at->diffForHumans()}}
                        </p>
                    </div>
                    @endforeach
                    <!-- Divider-->
                    <hr class="my-4" />
                    {{$posts->links()}}
                </div>
            </div>
        </div>
        

@endsection