@extends('layouts.app', ['title' => 'Habari', 'header' =>'Habari'])


@section('content')

    <div class="main-content">
        <!-- Section: inner-header -->
        {{--<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/bg/bg3.jpg">--}}
            {{--<div class="container pt-70 pb-20">--}}
                {{--<!-- Section Content -->--}}
                {{--<div class="section-content">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<h2 class="title text-white">Blog Details</h2>--}}
                            {{--<ol class="breadcrumb text-left text-black mt-10">--}}
                                {{--<li><a href="#">Home</a></li>--}}
                                {{--<li><a href="#">Pages</a></li>--}}
                                {{--<li class="active text-gray-silver">Page Title</li>--}}
                            {{--</ol>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}

        <!-- Section: Blog -->
        <section>
            <div class="container mt-30 mb-30 pt-30 pb-30">
                <div class="row">
                    <div class="col-md-9">
                        <div class="blog-posts single-post">
                            <article class="post clearfix mb-0">
                                <div class="entry-header">
                                    <div class="post-thumb thumb"> <img src="{!! url('http://admin.smartelimu.ac.tz/img/news/'.$news->image.'') !!}" alt="" class="img-responsive img-fullwidth"> </div>
                                </div>
                                <div class="entry-content">
                                    <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                        <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">{!! $news->created_at->format('d') !!}</li>
                                                <li class="font-12 text-white text-uppercase">{!! $news->created_at->format('M') !!}</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a href="blog-single-right-sidebar.html">{!! $news->title !!}</a></h3>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="mb-15">{!! $news->content !!}</p>

                                    <div class="mt-30 mb-0">
                                        <h5 class="pull-left flip mt-10 mr-20 text-theme-colored">Share:</h5>
                                        <ul class="styled-icons icon-circled m-0">
                                            <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
                                            <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
                                            <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            {{--<div class="tagline p-0 pt-20 mt-5">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-8">--}}
                                        {{--<div class="tags">--}}
                                            {{--<p class="mb-0"><i class="fa fa-tags text-theme-colored"></i> <span>Tags:</span> Law, Juggement, lawyer, Cases</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="share text-right flip">--}}
                                            {{--<p><i class="fa fa-share-alt text-theme-colored"></i> Share</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="author-details media-post">--}}
                                {{--<a href="#" class="post-thumb mb-0 pull-left flip pr-20"><img class="img-thumbnail" alt="" src="images/blog/author.jpg"></a>--}}
                                {{--<div class="post-right">--}}
                                    {{--<h5 class="post-title mt-0 mb-0"><a href="#" class="font-18">John Doe</a></h5>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
                                    {{--<ul class="styled-icons square-sm m-0">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            <div id="comments" class="comments-area pt-50">

                                <!-- Facebook Comments plugin -->
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = "http://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=409125935834772";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>

                                <h3 id="comments-title"><span><fb:comments-count href="http://pc1/themeforest/thememascot/godown-latest/demo/blog-single-facebook-comments.html"></fb:comments-count></span> Comments</h3>

                                <div class="fb-comments" data-href="http://pc1/themeforest/thememascot/godown-latest/demo/blog-single-facebook-comments.html" data-numposts="5"></div>
                                <!-- Facebook Comments end -->

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar sidebar-right mt-sm-30">
                            <div class="widget">
                                <h5 class="widget-title line-bottom">{!! trans('label.search') !!}</h5>
                                <div class="search-form">
                                    <form action="{!! route('news.search') !!}" method="post">
                                        {{ csrf_field() }}

                                        <div class="input-group">
                                            <input type="text" name="keyword" placeholder="{!! trans('label.search') !!}....." class="form-control search-input">
                                            <span class="input-group-btn">
                      <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                      </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget">
                                <h5 class="widget-title line-bottom">{!! trans('label.news_categories') !!}</h5>
                                <div class="categories">
                                    <ul class="list list-border angle-double-right">
                                        <li><a href="#">Ubunifu<span>(0)</span></a></li>
                                        <li><a href="#">Tehama<span>(0)</span></a></li>
                                        <li><a href="#">Ugunduzi<span>(0)</span></a></li>
                                        <li><a href="#">Maonyesho<span>(0)</span></a></li>
                                        <li><a href="#">Michezo<span>(0)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget">
                                <h5 class="widget-title line-bottom">Latest News</h5>
                                <div class="latest-posts">
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="#">Sustainable Construction</a></h5>
                                            <p>Lorem ipsum dolor sit amet adipisicing elit...</p>
                                        </div>
                                    </article>
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="#">Industrial Coatings</a></h5>
                                            <p>Lorem ipsum dolor sit amet adipisicing elit...</p>
                                        </div>
                                    </article>
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="#">Storefront Installations</a></h5>
                                            <p>Lorem ipsum dolor sit amet adipisicing elit...</p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            {{--<div class="widget">--}}
                                {{--<h5 class="widget-title line-bottom">Photos from Flickr</h5>--}}
                                {{--<div id="flickr-feed" class="clearfix">--}}
                                    {{--<!-- Flickr Link -->--}}
                                    {{--<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=52617155@N08">--}}
                                    {{--</script>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




@endsection
