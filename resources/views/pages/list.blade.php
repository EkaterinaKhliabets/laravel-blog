@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <article class="post post-grid">
                                    <div class="post-thumb">
                                        <a href="{{route('post.show', $post->slug)}}"> <img
                                                src="{{asset("storage/". $post->image)}}"
                                                alt=""></a>

                                        <a href="{{route('post.show', $post->slug)}}"
                                           class="post-thumb-overlay text-center">
                                            <div class="text-uppercase text-center">View Post</div>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <header class="entry-header text-center text-uppercase">
                                            @if ($post->category)
                                            <h6>
                                                <a href="{{route('category.show', $post->category->slug)}}">{{$post->category->title}}</a>
                                            </h6>
                                            @endif

                                            <h1 class="entry-title"><a
                                                    href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h1>


                                        </header>
                                        <div class="entry-content">
                                            <p>{!! $post->description !!}
                                            </p>

                                            <div class="social-share">
                                                <span class="social-share-title pull-left text-capitalize">By Rubel On {{$post->getDate()}}</span>
                                            </div>
                                        </div>
                                    </div>

                                </article>
                            </div>
                        @endforeach
                    </div>
                    {{ $posts->links('vendor.pagination.default') }}
                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection
