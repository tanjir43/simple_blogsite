@extends('backend.admin.master')
@section('title')
    Admin-Social
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Settings</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">social settings</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Edit social settings</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('social.update',$social->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Facebook</label>
                            <input class="form-control" type="text" name="facebook" value="{{$social->facebook}}" placeholder="Facebook">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Youtube</label>
                            <input class="form-control" type="text" name="youtube" value="{{$social->youtube}}" placeholder="Youtube">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Linekedin</label>
                            <input class="form-control" type="text" name="linkedin" value="{{$social->linkedin}}" placeholder="Linekedin">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Twitter</label>
                            <input class="form-control" type="text" name="twitter" value="{{$social->twitter}}" placeholder="Twitter">
                        </div>
                    </div>

                     
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Instagram</label>
                            <input class="form-control" type="text" name="instagram" value="{{$social->instagram}}" placeholder="Instagram">
                        </div>
                    </div>
                 

                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update Social settings</button>
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


@endsection