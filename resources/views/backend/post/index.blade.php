@extends('backend.layout.master')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            

            <div class="card">
            <h5 class="card-header">
                Posts
                <a href="{{route('post.create')}}" class="btn btn-success float-right">Add Post</a>
                <br>
                <br>
                <a href="{{route('post.trash')}}" class="btn btn-danger float-right">Tresh</a>
            </h5>


            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>SubTitle</th>
                            <th>Auther</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $index=>$post)
                            <tr>
                                <!-- <td>{{ ($posts->currentPage()*10)-10 + $index+1}}</td> -->
                                <td>{{($posts->currentPage()*10)-10 + $index+1}}</td>
                                <td>
                                    {{$post->title}}
                                </td>
                                <td>
                                    {{$post->sub_title}}
                                </td>
                                <td>
                                    {{$post->profile->user->name}}
                                </td>
                                <td>
                                    <a href="#" class="delete" id="{{$post->id}}"><i class="fa fa-trash"></i></a>|
                                    <a href="{{route('post.edit',['post'=>$post->id])}}"><i class="fa fa-edit"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <tfoot>
                    {{$posts->links()}}
                </tfoot>
            </div>
            </div>

        </div>
        <!-- /.container-fluid -->
@endsection

@section('script')

<script>
    $('.delete').click(function(){
         Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {

            var id = $(this).attr('id');
            var url = 'post/'+id;

            $.ajax
            ({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:url,
                type:'DELETE',
                datatype:'json',
                data: {"_method": 'DELETE',},
                success:function(data)
                {
                    location.reload();
                }
            }) 
        }
        }) 
           
    });


</script>

@endsection




















<!-- var id = $(this).attr('id');
var url = 'post'+'/'+id;
$.ajax
({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url:url,
    type:'DELETE',
    datatype:'json',
    data: {"_method": 'DELETE',},
    success:function(data)
    {
        location.reload();
    }
}) -->












