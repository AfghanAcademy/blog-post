@extends('backend.layout.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            About
        </div>
        <div class="card-body">
            <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Logo</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" value="{{$setting->logo}}" type="text" name="logo">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{$setting->facebook}}" placeholder="Enter the website facebook">
                    @error('facebook')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="{{$setting->twitter}}" placeholder="Enter the website twitter">
                    @error('twitter')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$setting->email}}" placeholder="Enter the your email">
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$setting->phone}}" placeholder="Enter the your phone number">
                    @error('phone')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{$setting->address}}" placeholder="Enter the your address">
                    @error('address')
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