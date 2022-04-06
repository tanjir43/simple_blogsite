@extends('backend.admin.master')
@section('title')
    Admin-add-about
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">About</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">new About</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Create new About</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Page name </label>
                            <input class="form-control" type="text" name="page_name"  placeholder="Title" value="{{old('page_name')}}">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Page title </label>
                            <input class="form-control" type="text" name="page_title"  placeholder=" Page Title" value="{{old('page_title')}}">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Page subtitle </label>
                            <input class="form-control" type="text" name="page_subtitle"  placeholder=" Page subtitle" value="{{old('page_subtitle')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Page content</label>
                        <textarea name="page_content" id="summernote"  value="{{old('page_content')}}" ></textarea>
                    </div>
             
                    
                    <div class="form-group">
                        <label>Image 1</label>
                        <input class="form-control-file" type="file" name="image_1" placeholder="Image" accept="image/*" onchange="readURL(this)">
                        
                            <img id="one" src="" height="100" alt="">
                    </div>

                   
                    
                    <div class="form-group">
                        <label>Image 2</label>
                        <input class="form-control-file" type="file" name="image_2" placeholder="Image" accept="image/*" onchange="readURL2(this)">
                        
                            <img id="two" src="" height="100" alt="">
                    </div>

                    
                    <div class="form-group">
                        <label>Image 3</label>
                        <input class="form-control-file" type="file" name="image_3" placeholder="Image" accept="image/*" onchange="readURL3(this)">
                        
                            <img id="three" src="" height="100" alt="">
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Image 4</label>
                        <input class="form-control-file" type="file" name="image_4" placeholder="Image" accept="image/*" onchange="readURL4(this)">
                        
                            <img id="four" src="" height="100" alt="">
                    </div>
                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .profile-social a {
            font-size: 16px;
            margin: 0 10px;
            color: #999;
        }

        .profile-social a:hover {
            color: #485b6f;
        }

        .profile-stat-count {
            font-size: 22px
        }
    </style>
  
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