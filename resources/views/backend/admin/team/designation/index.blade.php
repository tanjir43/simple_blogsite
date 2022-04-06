@extends('backend.admin.master')
@section('title')
    Admin-manage-designation
@endsection

@section('body')

  <div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All designation goes here <span class="text-success">({{App\Models\Designation::count()}})</span></div>   
            @include('backend.admin.includes._message')
            <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus">Add  designation</i></a>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL no</th>
                        <th>Designation Title</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
               @foreach ($designations as $designation )
               <tr>                      
                <td>{{$loop->iteration}}</td>
                <td>{{$designation->title}}</td> 
                <td class="text-center">
                    <a href="{{route('designation.edit',$designation->id)}}" class="btn-xs pr-2"><i class="fa fa-edit   pl-2 "></i></a>

                    <a href="" class="btn btn-danger  btn-xs pl-2"><i class="fa fa-trash" onclick="event.preventDefault(); document.getElementById('designationDeleteForm{{$designation->id}}').submit()"></i></a>
                    <form action="{{route('designation.delete',['id' => $designation->id])}}" method="POST" id="designationDeleteForm{{$designation->id}}">
                        @csrf
                    </form>
                </td>                              
            </tr> 
               @endforeach
                </tbody>
            </table>


            <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add  new designation </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('designation.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label>Designation Title <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="title"  placeholder="Title" value="{{old('title')}}" required>
                    </div>
                </div>
               
                <div class="form-group">
                    <button class="btn btn-default" type="submit">Save information </button>
                </div>
            </form>
            
        </div>
        
      </div>
    </div>
  </div>
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