@extends('backend.admin.master')
@section('title')
    Admin-Setting
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Settings</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">site settings</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Edit Site settings</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="{{$setting->email}}" placeholder="E-mail">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" value="{{$setting->address}}" placeholder="address">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" type="number" name="phone" value="{{$setting->phone}}" placeholder="Phone">
                    </div>
                    
                    <div class="form-group">
                        <label>Alt_Phone</label>
                        <input class="form-control" type="number" name="alt_phone" value="{{$setting->alt_phone}}" placeholder="alt_Phone">
                    </div>
                    
                    <div class="form-group">
                        <label>Office hours</label>
                        <input class="form-control" type="text" name="office_hour" value="{{$setting->office_hour}}" placeholder="office hour">
                    </div>
                    
        
                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update Site settings</button>
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