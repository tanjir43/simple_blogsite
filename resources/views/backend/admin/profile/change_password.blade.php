@extends('backend.admin.master')
@section('title')
    Admin-Profile
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Profile</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Change password</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    {{-- <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Change Password</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Current Password <span class="text-danger">*</span></label>
                            <input class="form-control" type="password" name="current_password" id="current_password">
                        </div>
                    </div>
                   
                    <p id="correct_password"></p>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>New Password <span class="text-danger">*</span></label>
                            <input class="form-control" type="password" name="New_password">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Confirm Password <span class="text-danger">*</span></label>
                            <input class="form-control" type="password" name="confrm_password">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">Update Password</h5>
                    <hr>
                    <div class="card shadow-none border">

                        <div class="card-body">
                            <form class=" g-3" method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="current_password" id="current_password">
                                    </div>
                                    <p id="correct_password"></p>
                                </div>

                               <div class="row">
                                   <div class="col-6">
                                       <label for="password" class="form-label">New Password <span class="text-danger">*</span></label>
                                       <input type="password" class="form-control" name="password" id="password">
                                   </div>
                               </div>


                               <div class="row">
                                   <div class="col-6">
                                       <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                       <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                   </div>
                               </div>
                                <br>

                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary px-4">Update Password</button>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div><!--end row-->

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


<script>
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: 'check-password',
            data: {current_password:current_password},
            success: function (res) {
                if(res == "true"){
                    $("#correct_password").text("Current Password Matches").css("color", "green");
                }else if(res == "false"){
                    $("#correct_password").text("Password Does Not Match").css("color", "red");

                }
            }, error: function (res) {
                alert("Something Went Wrong");
            }
        });
    });
</script>


@endsection