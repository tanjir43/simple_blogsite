@extends('backend.admin.master')
@section('title')
    Admin-manage-blogs
@endsection

@section('body')

  <div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Blogs goes here <span class="text-success">({{App\Models\Blog::count()}})</span></div>   
            <a href="{{route('blog.add')}}" class="btn btn-primary"><i class="fa fa-plus">Add  new blog</i></a>

            @include('backend.admin.includes._message')
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL no</th>
                        <th>Blog Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>View count</th>
                        <th>Status</th>
                        <th>Created date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog )
                    <tr>
                    <td>{{$loop->iteration}}</td>
                        <td>{{$blog->blog_title}}</td>
                        <td><img src="{{asset('uploads/'.$blog->image)}}"  height="70" alt=""></td>

                        <td>{{$blog->categories->category_name}}</td>

                        <td>Tags</td>
                        <td>{{$blog->view_count}}</td>
                        <td>
                            @if ($blog->status == 'published')
                                <span class="bage badge-success">Published</span>
                                @else
                                <span class="badge badge-danger">Draft</span>
                            @endif
                        </td>
                        <td>{{$blog->created_at->diffForHumans()}}</td>
                        <td>
                           <a href="{{route('blog.edit',$blog->id)}}" class="btn-xs"><i class="fa fa-edit   pl-2 "></i></a>
                            
                            <a href="" class="btn btn-danger  btn-xs"><i class="fa fa-trash" onclick="event.preventDefault(); document.getElementById('blogDeleteForm{{$blog->id}}').submit()"></i></a>
                            <form action="{{route('blog.delete',['id' => $blog->id])}}" method="POST" id="blogDeleteForm{{$blog->id}}">
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