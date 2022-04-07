@extends('backend.admin.master')
@section('title')
    Admin-manage-banner
@endsection

@section('body')

  <div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Banners goes here <span class="text-success">({{App\Models\Banner::count()}})</span></div>   
            @include('backend.admin.includes._message')
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL no</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials  as $testimonial )
                    <tr>
                       
                        <td>{{$loop->iteration}}</td>
                        <td>{{$testimonial->name}}</td>
                        <td><img src="{{asset('uploads/'.$testimonial->image)}}" height="70" alt=""></td>
                        <td>{{$testimonial->position}}</td>
                       
                        <td>
                            <a href="{{route('testimonial.edit',$testimonial->id)}}" class="btn-xs"><i class="fa fa-edit   pl-2 "></i></a>
                            
                            <a href="" class="btn btn-danger  btn-xs"><i class="fa fa-trash" onclick="event.preventDefault(); document.getElementById('testimonialDeleteForm{{$testimonial->id}}').submit()"></i></a>
                            <form action="{{route('testimonial.delete',['id' => $testimonial->id])}}" method="POST" id="testimonialDeleteForm{{$testimonial->id}}">
                                @csrf
                            </form>
                        
                        </td>
                        
                    </tr>
                    @endforeach

                  
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });
    })
</script>


@endsection