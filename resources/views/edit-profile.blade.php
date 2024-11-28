@extends('base')
@section('title')
    Ztech | Update Profile
@endsection
@section('content')
<div class="container mt-2">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <div class="row py-2">
            <div class="col-4">
                <a href="{{route('profile',session('username'))}}" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-8">
                <h4 class="text-left">Update Profile</h4>
            </div>
        </div>
    </div>
    <div class="card-body px-5">
    <form action="{{route('profile.update')}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="buyingPrice" class="form-label">Name</label>
                    <input type="text" class="form-control" id="buyingPrice" name="name"  value="{{old('name',$user->name)}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Email</label>
                    <input type="text" class="form-control" id="quantity" name="email"  value="{{old('email',$user->email)}}">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="quantity" name="phone"  value="{{old('phone',session('phone',$user->phone))}}">
                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Password</label>
                    <input type="password" class="form-control" id="quantity" name="password">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="quantity" name="password_confirmation" >
                    @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection

<style>
    a.btn{
        border-radius: 5px;
        padding: 4px 9px;
    }
</style>