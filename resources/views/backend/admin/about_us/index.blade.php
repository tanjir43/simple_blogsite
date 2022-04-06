@extends('backend.admin.master')
@section('title')
    Admin-manage-about
@endsection

@section('body')

  <div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All about goes here <span class="text-success">({{App\Models\AboutUs::count()}})</span></div>   
            @include('backend.admin.includes._message')
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL no</th>
                        <th>Page name</th>
                        <th>Page title</th>
                        <th>Page subtitle</th>
                        <th>Image 1</th>
                       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($about_us  as $about )
                    <tr>
                       
                        <td>{{$loop->iteration}}</td>
                        <td>{{$about->page_name}}</td>
                        <td>{{$about->page_title}}</td>
                        <td>{{$about->page_subtitle}}</td>
                        <td><img src="{{asset('uploads/about/'.$about->image_1)}}" height="70" alt=""></td>     
                        
                        <td>
                            <a href="{{route('about.edit',$about->id)}}" class="btn-xs"><i class="fa fa-edit   pl-2 "></i></a>
                            
                            <a href="" class="btn btn-danger  btn-xs"><i class="fa fa-trash" onclick="event.preventDefault(); document.getElementById('aboutDeleteForm{{$about->id}}').submit()"></i></a>
                            <form action="{{route('about.delete',['id' => $about->id])}}" method="POST" id="aboutDeleteForm{{$about->id}}">
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