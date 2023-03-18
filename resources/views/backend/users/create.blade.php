@extends('backend.layout.master')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Create User
            </div>
            <div class="card-body">
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter the user name">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter the user email">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter the user password">
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confrim">Confrim password</label>
                        <input type="password" name="confrim_password" class="form-control" placeholder="Enter the user password">
                        @error('confrim_password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="title">Profile pic</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="profile_pic">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                    @error('profile_pic')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                    
                    <button type="submit" class="btn btn-success">Save</button>
                    
                </form>
            </div>
        </div>
            
        </div>
        <!-- /.container-fluid -->
@endsection

@section('script')

<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
     $('#lfm').filemanager('image');
</script>

@endsection