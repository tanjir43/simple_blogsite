@extends('backend.admin.master')
@section('title')
    Admin-manage-project
@endsection

@section('body')

  <div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Project goes here <span class="text-success">({{App\Models\Project::count()}})</span></div>   
            @include('backend.admin.includes._message')
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL no</th>
                        <th>Project name</th>
                        <th>Image</th>    
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects  as $project )
                    <tr>
                       
                        <td>{{$loop->iteration}}</td>
                        <td>{{$project->name}}</td>
                        <td><img src="{{asset('uploads/'.$project->image)}}" height="70" alt=""></td>
                        <td>{!!Str::limit($project->details, 500)!!}</td>
                            <td>
                                <a href="{{route('project.edit',$project->id)}}" class="btn-xs"><i class="fa fa-edit   pl-2 "></i></a>
                            
                                <a href="" class="btn btn-danger  btn-xs"><i class="fa fa-trash" onclick="event.preventDefault(); document.getElementById('projectDeleteForm{{$project->id}}').submit()"></i></a>
                                <form action="{{route('project.delete',['id' => $project->id])}}" method="POST" id="projectDeleteForm{{$project->id}}">
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