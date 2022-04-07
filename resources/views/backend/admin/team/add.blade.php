@extends('backend.admin.master')
@section('title')
    Admin-add-Team
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Team</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">new team</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Create new Team</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Name </label>
                            <input class="form-control" type="text" name="name"  placeholder="Title" value="{{old('name')}}">
                        </div>
                    </div>

                   

                    <div class="form-group">
                        <label>Designation </label>
                        <select name="designation_id" class="form-control">
                            @foreach ($designations as $designation )
                            <option value="{{$designation->id}}">{{$designation->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Facebook Url</label>
                        <input class="form-control" type="text" name="facebook"  placeholder="Facebook url" value="{{old('facebook')}}">
                    </div>

                    <div class="form-group">
                        <label>Twitter Url</label>
                        <input class="form-control" type="text" name="twitter"  placeholder="Twitter url" value="{{old('twitter')}}">
                    </div>

                    <div class="form-group">
                        <label>Linkedin Url</label>
                        <input class="form-control" type="text" name="linkedin"  placeholder="Linkedin url" value="{{old('linkedin')}}">
                    </div>

                    <div class="form-group">
                        <label>Instagram Url</label>
                        <input class="form-control" type="text" name="instagram"  placeholder="instagram url" value="{{old('instagram')}}">
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control-file" type="file" name="image" placeholder="Image" accept="image/*" onchange="readURL(this)">
                        
                            <img id="one" src="" height="100" alt="">
                    </div>

                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Add new Profile</button>
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