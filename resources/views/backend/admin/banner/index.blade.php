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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Link title</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners  as $banner )
                    <tr>
                       
                        <td>{{$loop->iteration}}</td>
                        <td>{{$banner->title}}</td>
                        <td><img src="{{asset('uploads/'.$banner->image)}}" height="70" alt=""></td>
                        <td>{{$banner->link_title}}</td>
                        <td>{{$banner->priority}}</td>
                        <td>
                            @if ($banner->status == 'active')
                                <span class="badge badge-success">active</span>
                            @else
                            <span class="badge badge-danger">inactive</span>                               
                            @endif
                            </td>
                        <td>
                            <a href="{{route('banner.edit',$banner->id)}}" class="btn-xs"><i class="fa fa-edit   pl-2 "></i></a>
                            {{-- <a href="javascript:" rel="{{$banner->id}}" rel1="delete-banner"><i class=" pl-2 text-danger fa fa-trash fa-2x"></i></a> --}}
                            
                            <a href="" class="btn btn-danger  btn-xs"><i class="fa fa-trash" onclick="event.preventDefault(); document.getElementById('bannerDeleteForm{{$banner->id}}').submit()"></i></a>
                            <form action="{{route('banner.delete',['id' => $banner->id])}}" method="POST" id="bannerDeleteForm{{$banner->id}}">
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

        
        
{{-- <script>
    $('body').on('click', '.btn-delete', function (event) {
        event.preventDefault();

        var SITEURL = '{{ URL::to('') }}';

        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
                title: "Are You Sure? ",
                text: "You will not be able to recover this record again",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, Delete it!"
            },
            function () {
                window.location.href =  SITEURL + "/admin/" + deleteFunction + "/" + id;
            });
    });
</script> --}}

@endsection