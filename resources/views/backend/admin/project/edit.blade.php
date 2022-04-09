@extends('backend.admin.master')
@section('title')
    Admin-edit-project
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Project</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">edit {{$project->title}}</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Edit Project</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('project.update',$project->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Project name </label>
                            <input class="form-control" type="text" name="name"  placeholder="Name" value="{{$project->name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Project details</label>
                        <textarea name="details" id="summernote"  value="{!!$project->details!!}" ></textarea>
                    </div>


                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control-file" type="file" name="image" placeholder="Image" accept="image/*" onchange="readURL(this)">
                        
                            <img id="one" src="{{asset('uploads/'.$project->image)}}" height="100" alt="">
                    </div>

                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update Project</button>
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