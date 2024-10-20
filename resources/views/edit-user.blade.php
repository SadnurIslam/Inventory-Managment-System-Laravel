@extends('base')
@section('title')
    Ztech | Edit User
@endsection
@section('content')
<div class="container mt-2">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <div class="row">
            <div class="col-3 mt-2">
                <a class="btn" href="{{ URL::previous() }}">Back</a>
            </div>
            <div class="col-6"><h4 class="text-center mt-2">Update User Info</h4></div>
            <div class="col-3">
                
            </div>
        </div>
    </div>
    <div class="card-body px-5">
    <form action="/edit-user/{{$user->id}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="put">
    <!-- Name -->
    <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="editName" value="{{$user->name}}" required>
    </div>

    <!-- Username -->
    <div class="mb-2">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="editUsername" value="{{$user->username}}" required>
    </div>

    <!-- Email -->
    <div class="mb-2">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="editEmail" value="{{$user->email}}" required>
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" name="phone" class="form-control" id="editPhone" value="{{$user->phone}}" required>
    </div>

    <!-- Role -->
    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select name="role" class="form-select" id="editRole"  required>
            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
            <option value="staff" @if($user->role == 'staff') selected @endif>Staff</option>
        </select>
    </div>

    <!-- Submit Button -->
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Save Changes</button>
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
        color: white;
        background-color: #779bb0;
        border-radius: 5px;
        padding: 4px 9px;
    }
</style>