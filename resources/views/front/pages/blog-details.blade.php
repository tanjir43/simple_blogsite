@extends('front.master')

@section('body')

    <!-- start page title area-->
    <div class="page-title-area bg-thin">
        <div class="container">
            <div class="page-title-content">
                <h1>Blog Details</h1>
                <ul>
                    <li class="item"><a href="{{route('index')}}">Home</a></li>
                    <li class="item"><a href="#">Blog Details</a></li>
                </ul>
            </div>
        </div>
        <div class="shape">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <span class="shape3"></span>
            <span class="shape4"></span>
        </div>
    </div>
    <!-- end page title area -->

    <!-- Start Blog Details section -->
    <section class="blog-details-section ptb-100 bg-thin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="image">
                            <img src="{{asset('uploads/'.$blogs->image)}}" alt="image" />
                        </div>
                        <ul class="post-meta">
                            <li><i class="envy envy-calendar"></i><a href="#">{{$blogs->created_at->format('l, j F Y ')}}</a></li>
                            <li><i class="envy envy-comment"></i>03 comments</li>
                        </ul>
                        <div class="content">
                            <h2>{{$blogs->blog_title}}</h2>
                            <p>
                               {!!$blogs->blog_content!!}
                            </p>
                            
                        </div>
                       
                        <div class="article-share">
                            <div class="tags pb-3">
                                @php
                                    $blog_tags = $blogs->tags->sortBy('tag_name')->pluck('id');
                                @endphp
                                <span>tags:</span>
                                @foreach ($blog_tags as $blog )
                                <a href="#">{{\App\Models\Tag::find($blog)->tag_name}}</a> 
                                @endforeach
                               
                                
                            </div>
                            <div class="social-link">
                                <a href="#" class="bg-tertiary" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="bg-success" target="_blank"><i class="fab fa-tumblr"></i></a>
                                <a href="#" class="bg-danger" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="bg-info" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="bg-pink" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <hr />
                        <div class="related-post ptb-30">
                            <h2>related post</h2>
                            <div class="row">
                                @foreach ($related_posts as $related_post)
                                    
                              
                                <div class="col-md-6 col-sm-12">
                                    <div class="blog-item-single">
                                        <div class="blog-item-img">
                                            <a href="{{route('blog.details',$related_post->slug)}}">
                                                <img src="{{asset('uploads/'.$related_post->image)}}" alt="blog-bg-image" />
                                            </a>
                                            <p class="tag">{{$related_post->categories->category_name}}</p>
                                        </div>
                                        <div class="blog-item-content">
                                            <span> <i class="envy envy-calendar"></i>{{$related_post->created_at->diffForHumans()}}</span>
                                            <a href="{{route('blog.details',$related_post->slug)}}">
                                                <h3>{{$related_post->blog_title}}</h3>
                                            </a>
                                            <p>
                                                {{Str::limit(strip_tags($related_post->blog_content),100 ,'.....')}}
                                            </p>
                                            <a href="{{route('blog.details',$related_post->slug)}}" target="_self" class="btn btn-text-only">
                                                read more
                                                <i class="envy envy-right-arrow"></i>
                                            </a>
                                        </div>
                                        <!-- blog-item-content -->
                                    </div>
                                    <!-- blog-item-single -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="comments-area">
                            <h2 class="comment-title">comments</h2>
                           
                            <div id="disqus_thread"></div>
                            <script>
                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                /*
                                var disqus_config = function () {
                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://http-127-0-0-1-8000-toqqrorixo.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <section class="widget widget-author">
                            <div class="author-img">
                                @if (!empty($blogs->admin->image))
                                <img src="{{asset('uploads/admin/'.$blogs->admin->image)}}" alt="author" />
                                @else
                                <img src="{{asset('assets/img/default_image.png')}}" alt="">
                                @endif
                            </div>
                            <h5>{{$blogs->admin->name}}</h5>
                            
                            <p>follow me</p>
                        
                            <div class="social-link">
                                <a href="#" class="bg-success" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="bg-info" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="bg-pink" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="bg-danger" target="_blank"><i class="fab fa-youtube"></i></a>

                            </div>
                        </section>
                        <div class="widget widget-search">
                            <form class="search-form search-top">
                                <input type="search" class="search-field" placeholder="Search article" />
                                <button type="submit" class="btn-text-only">
                                    <i class="envy envy-magnify-glass"></i>
                                </button>
                            </form>
                        </div>
                        <section class="widget widget-article">
                            <h5 class="widget-title">Recent articles</h5>

                            @foreach ($recent_articles as $recent_article )
                              
                            <article class="article-item">
                                <a href="#" class="article-img">
                                    <img src="{{asset('uploads/'.$recent_article->image)}}" style="width: 111px !important" alt="blog-image" />
                                </a>
                                <div class="info">
                                    <span class="time"><i class="envy envy-calendar"></i>{{$recent_article->created_at->format('l, j F Y')}}</span>
                                    <h6 class="title">
                                        <a href="#">{{$recent_article->blog_title}}</a>
                                    </h6>
                                </div>
                            </article>
  
                            @endforeach
                                    
                        </section>
                        <section class="widget widget-categories">
                            <h5 class="widget-title">Categories</h5>
                            <ul class="categorie-list">
                                @foreach ($categories as $category )
                                <li>
                                    <a href="{{route('category.blog',$category->slug)}}">{{$category->category_name}}</a>
                                    @php
                                        $post_count = \App\Models\Blog::where('category_id', $category->id)->count();
                                    @endphp
                                    <span class="total">{{$post_count}}</span>
                                </li>                                   
                                @endforeach
                            </ul>
                        </section>

                        <section class="widget widget-tag">
                            <h5 class="widget-title">Tags</h5>
                            <div class="tags">
                                @foreach ($tags as $tag )
                                <a href="#">{{$tag->tag_name}}</a>
                                @endforeach      
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Details Area --> 


@endsection