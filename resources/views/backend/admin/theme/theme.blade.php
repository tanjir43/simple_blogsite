@extends('backend.admin.master')
@section('title')
theme-settings
@endsection
@section('body')

<div class="page-heading">
    <h1 class="page-title">Settings</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Theme settings</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Theme Settings</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('theme.update',$theme->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Website name</label>
                            <input class="form-control" type="text" name="website_name" value="{{$theme->website_name}}" placeholder="Website name">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Website tagline</label>
                            <input class="form-control" type="text" name="website_tagline" value="{{$theme->website_tagline}}" placeholder="Website tagline">
                        </div>
                    </div>

                    
                


                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control-file" type="file" name="logo" placeholder="Logo" accept="image/*" onchange="readURL(this)">
                   
                            <img id="one" src="{{asset('uploads/'.$theme->logo)}}" height="100" alt="">
                       
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Favicon</label>
                            <input class="form-control-file" type="file" name="favicon"  placeholder="Favicon" accept="image/*" onchange="readUrl(this)">
                            <img id="two" class="pt-2" src="{{asset('uploads/'.$theme->favicon)}}" height="100" alt="">
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <button class="btn btn-info" type="submit">Update settings</button>
                    </div>
                </form>
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
    function readUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#two").attr('src',e.target.result).width(150);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection