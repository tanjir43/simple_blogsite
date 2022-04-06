@extends('backend.admin.master')
@section('title')
    Admin-edit-designation
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Designation</h1>
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
            <h4 class="text-center">Edit designation</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('designation.update',$designation->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                     <div class="row">
                    <div class="col-sm-12 form-group">
                        <label>Designation Title <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="title"  placeholder="Title" value="{{$designation->title}}" required>
                    </div>
                </div>
               
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update designation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</div>

@endsection

@section('scripts')


@endsection