@extends('admin.layout')
@section('title' ,'Blog')

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Blog</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Blog <code>title</code> , <code>status</code> , <code class="highlighter-rouge">image</code>and  <code>Actions</code>.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Blog title</th>

                                <th>Status</th>
                                <th>Blog image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($blogs))
                                @foreach($blogs as $blog)

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            @foreach($blog->blogDescription as $description)
                                                <div><a href="{{route('blog.edit',['id' => $blog->id])}}">{{$description->title}}</a></div>
                                            @endforeach
                                        </td>

                                        <td>
                                            {!!  $blog->status == '1' ? '<button type="button" class="btn btn-success btn-block">Active</button>' : '<button type="button" class="btn btn-danger btn-block">Inactive</button>' !!}

                                        </td>

                                        <td><img src="{{asset('uploads/blog/cover/'.$blog->image_url)}}"  width="50"/></td>
                                        <td>
                                            <button type="button" class="btn mr-1 mb-1 btn-cyan btn-square btn-sm" onclick="Javascript:window.location.href ='{{route('blog.edit',['id'=> $blog->id])}}';">Edit</button>
                                            {!! Form::open(['route'=>['blog.destroy',$blog->id],'method'=>'DELETE','style'=>'display:inline-block','role'=>'form']) !!}
                                            <button type="submit" class="btn mr-1 mb-1 btn-danger btn-square btn-sm">Delete</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @else

                                <tr>

                                    <td colspan="8" style="text-align: center">
                                        No Blog Added
                                    </td>

                                </tr>

                            @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bordered striped end -->

@endsection