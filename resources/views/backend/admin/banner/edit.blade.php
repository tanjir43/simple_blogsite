@extends('backend.admin.master')
@section('title')
    Admin-edit-banner
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Banner</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">edit {{$banner->title}}</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Edit Banner</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Title </label>
                            <input class="form-control" type="text" name="title"  placeholder="Title" value="{{$banner->title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Banner content</label>
                        <textarea name="banner_content" id="summernote"  >{!!$banner->banner_content!!}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Link title</label>
                        <input class="form-control" type="text" name="link_title"  placeholder="Link title" value="{{$banner->link_title}}">
                    </div>
                    
                    <div class="form-group">
                        <label>Link Url</label>
                        <input class="form-control" type="text" name="link_url"  placeholder="Link url" value="{{$banner->link_url}}">
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <input type="hidden" name="current_image" value="{{$banner->image}}">
                        <label>Image</label>
                        <input class="form-control-file" type="file" name="image" placeholder="Image" accept="image/*" onchange="readURL(this)">
                        
                            <img id="one" src="{{asset('uploads/'.$banner->image)}}" height="100" alt="">
                    </div>

                    <div class="form-group">
                        <label>Priority</label>
                        <input type="number"  name="priority" class="form-control" value="{{$banner->priority}}">
                    </div>
                    
                    <div class="form-group">
                        <label>Mark as active(status)</label>
                    
                        <input type="checkbox"  name="status" value="1"  {{$banner->status =='active'? 'checked' : ''}}>
                 
                    </div>
                    

                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update Banner</button>
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