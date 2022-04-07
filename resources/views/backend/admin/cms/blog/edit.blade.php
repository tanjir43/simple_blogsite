@extends('backend.admin.master')
@section('title')
    Admin-edit-blog
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Blog</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">edit blog</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Edit Blog</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Blog Title </label>
                            <input class="form-control" type="text" name="blog_title"  placeholder="Blog Title" value="{{$blog->blog_title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Category </label>
                        <select name="category_id" class="form-control" >
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mark as active(status)</label>
                        <input type="checkbox"  name="status" value="1" {{$blog->status == 'published' ? 'checked' : ''}}>
                    </div>

                    {{-- <div class="form-group">
                        <label>Tags </label>
                        <select name="category_id" class="form-control" >
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        </select>
                    </div> --}}


                    <div class="form-group">
                        <label>BLog content</label>
                        <textarea name="blog_content" id="summernote">{{$blog->blog_content}}</textarea>
                    </div>
                  
     
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control-file" type="file" name="image" placeholder="Image" accept="image/*" onchange="readURL(this)">
                        
                            <img id="one" src="{{asset('uploads/'.$blog->image)}}" height="100" alt="">
                    </div>


                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit"> Update blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
  
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#one").attr('src',e.target.result).width(150);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection