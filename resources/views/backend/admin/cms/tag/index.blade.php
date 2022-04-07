@extends('backend.admin.master')
@section('title')
    Admin-manage-tags
@endsection

@section('body')

  <div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All tags  <span class="text-success">({{App\Models\Tag::count()}})</span></div>   
            @include('backend.admin.includes._message')
            <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus">Add  new Tag</i></a>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL no</th>
                        <th>Tag Name</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
               @foreach ($tags as $tag )
               <tr>                      
                <td>{{$loop->iteration}}</td>
                <td>{{$tag->tag_name}}</td> 
                <td class="text-center">
                    
                    <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$tag->id}}"><i class="fa fa-edit"></i></i></a>


                    <a href="" class="btn btn-danger  btn-xs pl-2"><i class="fa fa-trash" onclick="event.preventDefault(); document.getElementById('tagDeleteForm{{$tag->id}}').submit()"></i></a>
                    <form action="{{route('tag.delete',['id' => $tag->id])}}" method="POST" id="tagDeleteForm{{$tag->id}}">
                        @csrf
                    </form>
                </td>                              
            </tr> 
             <!-- Modal -->
         <div class="modal fade" id="exampleModal{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit tag </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('tag.update', $tag->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label> Tag name <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text" name="tag_name"  placeholder="Tag name" value="{{$tag->tag_name}}" required>
                    </div>
                </div>
               
                <div class="form-group">
                    <button class="btn btn-default" type="submit">Update information </button>
                </div>
            </form>            
        </div>  
      </div>
             </div>
  </div>
        
         @endforeach
        </tbody>
    </table>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit tag </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('tag.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label> Tag name <span class="text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="tag_name"  placeholder="Tag name" value="{{old('tag_name')}}" required>
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


@endsection