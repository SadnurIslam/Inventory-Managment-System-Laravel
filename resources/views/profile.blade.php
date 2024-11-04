@extends('base')
@section('title')
    Ztech | User Profile
@endsection
@section('content')
    <main class="p-3 supplier">
        <div class="row bg-white table-box">
            <div class="col-12 ">
                <div class="profile-box text-center">
                    <h2>User Profile</h2>
                    <br>
                    <div class="user-img">
                        <img src="{{asset('img/user.png')}}" alt="">
                    </div>
                    <br>
                    <p>Name: {{$user->name}} </p>
                    <p>Email: {{$user->email}}</p>
                    <p>Phone: {{$user->phone}}</p>
                    <p>Role: {{$user->role}}</p>
                    <a class="btn btn-secondary" href="{{'/logout'}}">Logout</a>
                </div>
            </div>
        </div>
    </main>
@endsection

<style>
            
    .p-3.supplier {
        height: 100%;
    }
    .row.bg-white.table-box {
        height: 100%;
        width: 50%;
        margin: auto;
        box-shadow: 5px 6px 9px rgba(0, 0, 0, 0.5),-5px -5px 9px rgba(0, 0, 0, 0.5);
    }
    img{
        border-radius: 50%;
        width: 130px;
        height: 130px;
        border: 2px solid #f03b77;
    }
</style>