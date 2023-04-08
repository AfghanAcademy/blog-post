@extends('backend.layout.master')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Assign Permission
            </div>
           
            <div class="card-body">
                <form action="{{route('role.update',['role'=>$role->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @foreach($permissions as $permission)
                    {{$permission->name}}
                    <input type="checkbox" value="{{$permission->id}}"
                    @foreach($role->permissions as $userPermission)
                        @if($userPermission->id == $permission->id)
                            checked
                        @endif
                    @endforeach
                     name="permission[]" class="checkbox"> <br>
                    @endforeach
                    <br>
                    <button type="submit" class="btn btn-success">Save</button>
                    
                </form>
            </div>
        </div>
            
        </div>
        <!-- /.container-fluid -->
@endsection

