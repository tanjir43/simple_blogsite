@extends('backend.admin.master')
@section('title')
    Admin-edit-package
@endsection

@section('body')

<div class="page-heading">
    <h1 class="page-title">Package</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">edit {{$package->title}}</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <h4 class="text-center">Edit Banner</h4>
            @include('backend.admin.includes._message')
            <div>
                <form action="{{route('pricing.update',$package->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Title </label>
                            <input class="form-control" type="text" name="title"  placeholder="Title" value="{{$package->title}}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="number" name="price"  placeholder="price" value="{{$package->price}}">
                    </div>        
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control-file" type="file" name="image" placeholder="Image" accept="image/*" onchange="readURL(this)">
                        
                            <img id="one" src="{{asset('uploads/'.$package->image)}}" height="100" alt="">
                    </div>

                 
                    <div class="form-group">
                        <label>Features</label>

                        @php $resp = json_decode($package->features) @endphp

                        <div class="field_wrapper">
                            @for($i=0; $i < sizeof($resp[0]); $i++)
                            <div class="col-md-7">
                                <input type="text" name="features[]" value="{{$resp[0][$i]}}" class="form-control">
                                <a href="javascript:void(0);" class="remove_button" title="Add field"><img src="{{ asset('assets/img/minus.png') }}" style="position: relative; top: -30px; left: 580px; height:20px"></a>
                            </div>
                            @endfor
                            <a href="javascript:void(0);" class="add_button" title="Add field"><img src="{{ asset('assets/img/add.webp')  }}" style="position: relative;height:20px; top: -52px; left: 620px;"></a>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Update Package</button>
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


<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="field_wrapper">\n' +
            '                                        <div class="col-md-7">\n' +
            '                                            <input type="text" name="features[]" class="form-control">\n' +
            '                                            <a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="{{ asset('assets/img/minus.png') }}" style="position: relative; top: -30px; left: 580px; height:20px;"></a>\n' +
            '                                        </div>\n' +
            '                                    </div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>


@endsection