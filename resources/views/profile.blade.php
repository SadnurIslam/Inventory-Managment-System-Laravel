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
                        <img src="{{asset('img/sadnur.jpg')}}" alt="">
                    </div>
                    <h2>Sadnur Islam</h2>
                    <p>Email: sadnurislam2000@gmail.com</p>
                    <p>Phone: 01700000000</p>
                    <p>Role: Admin</p>
                    <button class="btn btn-secondary">Logout</button>
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