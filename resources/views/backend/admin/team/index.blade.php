@extends('backend.admin.master')
@section('title')
    Admin-manage-team
@endsection

@section('body')

  <div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Team goes here <span class="text-success">({{App\Models\Team::count()}})</span></div>   
            @include('backend.admin.includes._message')
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL no</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Facebook </th>         
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams  as $team )
                    <tr>
                       
                        <td>{{$loop->iteration}}</td>
                        <td>{{$team->name}}</td>
                        <td>{{$team->designation->title}}</td>
                        <td><img src="{{asset('uploads/'.$team->image)}}" height="70" alt=""></td>
                        <td>{{$team->facebook}}</td>
                            
                        <td>
                           <a href="{{route('team.edit',$team->id)}}" class="btn-xs"><i class="fa fa-edit   pl-2 "></i></a> 
                            
                            <a href="" class="btn btn-danger  btn-xs"><i class="fa fa-trash" onclick="event.preventDefault(); document.getElementById('teamDeleteForm{{$team->id}}').submit()"></i></a>
                            <form action="{{route('team.delete',['id' => $team->id])}}" method="POST" id="teamDeleteForm{{$team->id}}">
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