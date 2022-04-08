@extends('front.master')

@section('body')

  <!-- start page title area-->
  <div class="page-title-area bg-thin">
    <div class="container">
        <div class="page-title-content">
            <h1>Blogs</h1>
            <ul>
                <li class="item"><a href="{{route('index')}}">Home</a></li>
                <li class="item"><a href="{{route('blog')}}">Blogs</a></li>
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

<!--start blog section-->
<section class="blog-grid ptb-100 bg-thin">
    <div class="container">
        <div class="row justify-content-center">

            @foreach ($blogs as $blog )
            <div class="col-lg-4">
                <div class="blog-item-single">
                    <div class="blog-item-img">
                        <a href="{{route('blog.details',$blog->slug)}}">
                            <img src="{{asset('uploads/'.$blog->image)}}" alt="blog-bg-image" />
                        </a>
                        <p class="tag">{{$blog->categories->category_name}}</p>
                    </div>
                    <div class="blog-item-content">
                        <span> <i class="envy envy-calendar"></i>{{$blog->created_at->diffForHumans()}}</span>
                        <a href="{{route('blog.details',$blog->slug)}}">
                            <h3>{{$blog->blog_title}}</h3>
                        </a>
                        <p>
                            {{Str::limit(strip_tags($blog->blog_content),100 ,'....')}}
                        </p>
                        <a href="{{route('blog.details',$blog->slug)}}" target="_self" class="btn btn-text-only">
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
        <!-- row -->
       
        <div class="text-center">
            {{-- <a href="blog-grid.html" class="btn btn-solid">Load more <i class="envy envy-right-arrow"></i> </a> --}}
            {{$blogs->links('pagination')}}
        </div>
  
    </div>
</section>
<!--end blog section-->
@endsection