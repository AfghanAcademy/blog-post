@extends('backend.layout.master')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            

            <div class="card">
            <h5 class="card-header">
                Roles
                <a href="{{route('role.create')}}" class="btn btn-success float-right">Add role</a>
                
                
            </h5>


            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $index=>$role)
                            <tr>
                                <!-- <td>{{ ($roles->currentPage()*10)-10 + $index+1}}</td> -->
                                <td>{{($roles->currentPage()*10)-10 + $index+1}}</td>
                                <td>
                                    {{$role->name}}
                                </td>
                                
                                <td>
                                    <a href="#" class="delete" id="{{$role->id}}"><i class="fa fa-trash"></i></a>|
                                    <a href="{{route('role.edit',['role'=>$role->id])}}"><i class="fa fa-edit"></i>|
                                    <a href="{{route('role.show',['role'=>$role->id])}}"><i class="fa fa-lock"></i></a>
                                </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <tfoot>
                    {{$roles->links()}}
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
            var url = 'role/'+id;

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
var url = 'role'+'/'+id;
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












