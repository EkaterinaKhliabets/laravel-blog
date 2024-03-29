<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        @include('weather.index')

        <aside class="widget news-letter">
            <h3 class="widget-title text-uppercase text-center">Get Newsletter</h3>
            @include('admin.errors')
            <form action="{{route('subscribe')}}" method="post">
                @csrf
                <input type="text" placeholder="Your email address" name="email">
                <input type="submit" value="Subscribe Now"
                       class="text-uppercase text-center btn btn-subscribe">
            </form>

        </aside>
        <aside class="widget">



            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
            @foreach($popularPost as $post)
                <div class="popular-post">


                    <a href="{{route('post.show', $post->slug)}}" class="popular-img"><img
                            src="{{asset("storage/". $post->image)}}" alt="">

                        <div class="p-overlay"></div>
                    </a>

                    <div class="p-content">
                        <a href="{{route('post.show', $post->slug)}}" class="text-uppercase">{{$post->title}}</a>
                        <span class="p-date">{{$post->getDate()}}</span>

                    </div>
                </div>
            @endforeach
        </aside>
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>

            <div id="widget-feature" class="owl-carousel">

                @foreach($recommendedPost as $post)
                    <div class="item">
                        <div class="feature-content">
                            <img src="{{asset("storage/". $post->image)}}" alt="">

                            <a href="#" class="overlay-text text-center">
                                <h5 class="text-uppercase">{{$post->title}}</h5>

                                <p>{!! $post->description !!}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
            @foreach($recentPost as $post)
                <div class="thumb-latest-posts">
                    <div class="media">
                        <div class="media-left">
                            <a href="{{route('post.show', $post->slug)}}" class="popular-img"><img
                                    src="{{asset("storage/". $post->image)}}" alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="p-content">
                            <a href="{{route('post.show', $post->slug)}}" class="text-uppercase">{{$post->title}}</a>
                            <span class="p-date">{{$post->getDate()}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </aside>
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                        <span class="post-count pull-right"> ({{$category->posts()->published()->count()}})</span>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</div>
