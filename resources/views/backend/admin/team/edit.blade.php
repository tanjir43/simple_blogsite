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
        <li class="breadcrumb-item">edit </li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Edit Banner</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('team.update',$team->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                   <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Name </label>
                            <input class="form-control" type="text" name="name"  placeholder="Title" value="{{$team->name}}">
                        </div>
                    </div>

                   

                    <div class="form-group">
                        <label>Designation </label>
                        <select name="designation_id" class="form-control">
                            @foreach ($designations as $designation )
                            <option value="{{$designation->id}}" {{$designation->id == $team->designation->id ? 'selected' : ''}}>{{$designation->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Facebook Url</label>
                        <input class="form-control" type="text" name="facebook"  placeholder="Facebook url" value="{{$team->facebook}}">
                    </div>

                    <div class="form-group">
                        <label>Twitter Url</label>
                        <input class="form-control" type="text" name="twitter"  placeholder="Twitter url" value="{{$team->twitter}}">
                    </div>

                    <div class="form-group">
                        <label>Linkedin Url</label>
                        <input class="form-control" type="text" name="linkedin"  placeholder="Linkedin url" value="{{$team->linkedin}}">
                    </div>

                    <div class="form-group">
                        <label>Instagram Url</label>
                        <input class="form-control" type="text" name="instagram"  placeholder="instagram url" value="{{$team->instagram}}">
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control-file" type="file" name="image" placeholder="Image" accept="image/*" onchange="readURL(this)">
                        
                            <img id="one" src={{asset('uploads/'.$team->image)}} height="100" alt="">
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