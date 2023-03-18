@extends('backend.layout.master')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            

            <div class="card">
            <h5 class="card-header">
                Users
                <a href="{{route('users.create')}}" class="btn btn-success float-right">Create User</a>
                <br>
                
            </h5>


            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index=>$user)
                            <tr>
                                
                                <td>{{($users->currentPage()*10)-10 + $index+1}}</td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                   {{$user->profile->profile_pic}}
                                </td>
                                <td>
                                    <a href="#" class="delete" id="{{$user->id}}"><i class="fa fa-trash"></i></a>|
                                    <a href="{{route('users.edit',['user'=>$user->id])}}"><i class="fa fa-edit"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <tfoot>
                    {{$users->links()}}
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
            var url = 'users/'+id;

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












