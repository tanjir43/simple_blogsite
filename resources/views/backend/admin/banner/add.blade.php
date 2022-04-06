@extends('backend.admin.master')
@section('title')
    Admin-add-banner
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Banner</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">new banner</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Create new Banner</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Title </label>
                            <input class="form-control" type="text" name="title"  placeholder="Title" value="{{old('title')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Banner content</label>
                        <textarea name="banner_content" id="summernote"  value="{{old('banner_content')}}" ></textarea>
                    </div>

                    <div class="form-group">
                        <label>Link title</label>
                        <input class="form-control" type="text" name="link_title"  placeholder="Link title" value="{{old('link_title')}}">
                    </div>
                    
                    <div class="form-group">
                        <label>Link Url</label>
                        <input class="form-control" type="text" name="link_url"  placeholder="Link url" value="{{old('link_url')}}">
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control-file" type="file" name="image" placeholder="Image" accept="image/*" onchange="readURL(this)">
                        
                            <img id="one" src="" height="100" alt="">
                    </div>

                    <div class="form-group">
                        <label>Priority</label>
                        <input type="number"  name="priority" class="form-control" value="{{old('priority')}}">
                    </div>
                    
                    <div class="form-group">
                        <label>Mark as active(status)</label>
                        <input type="checkbox"  name="status" value="1" checked>
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
{{-- 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('body').on('click','.btn-delete', function(event){
       event.preventDefault();

       var SITEURL = '{{URL::to('')}}';
       var id  = $(this).attr('rel');
       var deleteFunction = $(this).attr('rel1');
       swal({
            title: "Are you Sure?",
            text: "You will not able to recover this record again",
            type: "warning",
            showCancelButton:true,
            confirmButtonClass: "btn-danger",
            confirmButtonText:"yes, Delete it!"
             },
         function (){
           window.location.href = SITEURL + "/admin/" + deleteFunction + "/" id;
       });
    });
</script> --}}

{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

@endsection