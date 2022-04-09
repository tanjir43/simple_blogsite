@extends('backend.admin.master')
@section('title')
    Admin-manage-packages
@endsection

@section('body')

  <div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All packages goes here <span class="text-success">({{App\Models\Package::count()}})</span></div>   
            @include('backend.admin.includes._message')
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL no</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>price</th>
                        <th>features</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages  as $package )
                    <tr>
                       
                        <td>{{$loop->iteration}}</td>
                        <td>{{$package->title}}</td>
                        <td><img src="{{asset('uploads/'.$package->image)}}" height="70" alt=""></td>
                        <td>{{$package->price}}</td>
                       
                          @php
                              $resp = json_decode($package->features)
                          @endphp
                        <td>
                            @for ($i=0; $i<sizeOf($resp[0]); $i++)
                                <li>{{ $resp[0][$i]}}</li>
                            @endfor
                        <td>
                            <a href="{{route('pricing.edit',$package->id)}}" class="btn-xs"><i class="fa fa-edit   pl-2 "></i></a>
                            
                            <a href="" class="btn btn-danger  btn-xs"><i class="fa fa-trash" onclick="event.preventDefault(); document.getElementById('packageDeleteForm{{$package->id}}').submit()"></i></a>
                            <form action="{{route('pricing.delete',['id' => $package->id])}}" method="POST" id="packageDeleteForm{{$package->id}}">
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