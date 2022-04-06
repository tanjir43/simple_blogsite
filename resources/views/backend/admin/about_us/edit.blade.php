@extends('backend.admin.master')
@section('title')
    Admin-edit-banner
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">About</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">edit</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Edit about</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('about.update',$about_us->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Page name </label>
                            <input class="form-control" type="text" name="page_name"  placeholder="Title" value="{{$about_us->page_name}}">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Page title </label>
                            <input class="form-control" type="text" name="page_title"  placeholder=" Page Title"value="{{$about_us->page_title}}">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Page subtitle </label>
                            <input class="form-control" type="text" name="page_subtitle"  placeholder=" Page subtitle" value="{{$about_us->page_subtitle}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Page content</label>
                        <textarea name="page_content" id="summernote" >{{$about_us->page_subtitle}}</textarea>
                    </div>
             
                    
                    <div class="form-group">
                        <label>Image 1</label>
                        <input type="hidden" name="current_image1" value="{{$about_us->image_1}}">

                        <input class="form-control-file" type="file" name="image_1" placeholder="Image" accept="image/*" onchange="readURL(this)">
                        
                            <img id="one" src="{{asset('uploads/about/'.$about_us->image_1)}}" height="100" alt="">
                    </div>

                   
                    
                    <div class="form-group">
                        <label>Image 2</label>
                        <input type="hidden" name="current_image2" value="{{$about_us->image_2}}">

                        <input class="form-control-file" type="file" name="image_2" placeholder="Image" accept="image/*" onchange="readURL2(this)">
                        
                            <img id="two" src="{{asset('uploads/about/'.$about_us->image_2)}}" height="100" alt="">
                    </div>

                    
                    <div class="form-group">
                        <label>Image 3</label>

                        <input class="form-control-file" type="file" name="image_3" placeholder="Image" accept="image/*" onchange="readURL3(this)">
                        
                            <img id="three" src="{{asset('uploads/about/'.$about_us->image_3)}}" height="100" alt="">
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Image 4</label>
                        <input type="hidden" name="current_image4" value="{{$about_us->image_4}}">

                        <input class="form-control-file" type="file" name="image_4" placeholder="Image" accept="image/*" onchange="readURL4(this)">
                        
                            <img id="four" src="{{asset('uploads/about/'.$about_us->image_4)}}" height="100" alt="">
                    </div>
                    

                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update About</button>
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


<script type="text/javascript">
    function readURL2(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#two").attr('src',e.target.result).width(150);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script type="text/javascript">
    function readURL3(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#three").attr('src',e.target.result).width(150);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script type="text/javascript">
    function readURL4(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#four").attr('src',e.target.result).width(150);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



@endsection