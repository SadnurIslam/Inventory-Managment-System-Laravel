@extends('base')
@section('title')
    Ztech | User Profile
@endsection
@section('content')
    <main class="p-3 supplier">
        <div class="profile-container">
            <div class="profile-card">
                <div class="profile-header">
                    <h2>User Profile</h2>
                </div>
                <div class="user-img">
                    <img src="{{ asset('img/user.png') }}" alt="User Image">
                </div>
                <div class="profile-info">
                    <table class="profile-table table">
                        <tr>
                            <td width="40%">Name</td>
                            <td  width="10%">:</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>:</td>
                            <td>{{$user->role}}</td>
                        </tr>
                    </table>
                </div>
                <div class="profile-actions">
                    <a class="btn btn-edit" href="{{ route('profile.edit') }}">Edit Info</a>
                    <a class="btn btn-logout" href="{{ '/logout' }}">Logout</a>
                </div>
            </div>
        </div>
    </main>
@endsection

<style>
    body {
        background: linear-gradient(135deg, #f3f4f6, #e3e8ee);
        font-family: 'Arial', sans-serif;
    }

    .profile-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding-top: 10px;
        height: auto;
        margin: 0 auto;
    }

    .profile-card {
        background: #fff;
        width: 100%;
        max-width: 600px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        padding: 30px;
        text-align: center;
        margin: 20px 0;
    }

    .profile-header h2 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .user-img img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        transition: transform 0.3s ease;
    }

    .user-img img:hover {
        transform: scale(1.1);
    }

    .profile-info {
        margin-top: 20px;
        text-align: center;
    }

    .profile-table {
        margin: auto;
        font-size: 1.2rem;
        color: #555;
        line-height: 2;
        text-align: left;
    }

    .profile-table td {
        padding: 5px 10px;
    }

    .profile-table td:first-child {
        font-weight: bold;
        color: #333;
    }

    .profile-table td:nth-child(2) {
        width: 10px;
    }

    .profile-actions {
        margin-top: 30px;
    }

    .btn {
        display: inline-block;
        margin: 5px 10px;
        padding: 10px 25px;
        font-size: 1rem;
        color: #fff;
        border: none;
        border-radius: 25px;
        text-decoration: none;
        transition: background 0.3s ease, transform 0.3s ease;
    }

    .btn-edit {
        background: linear-gradient(to right, #4caf50, #8bc34a);
    }

    .btn-edit:hover {
        background: linear-gradient(to right, #45a049, #7cb342);
        transform: translateY(-3px);
    }

    .btn-logout {
        background: linear-gradient(to right, #f03b77, #f56c94);
    }

    .btn-logout:hover {
        background: linear-gradient(to right, #d02b63, #e35f80);
        transform: translateY(-3px);
    }

    @media (max-width: 768px) {
        .profile-card {
            padding: 20px;
            width: 90%;
        }

        .profile-table {
            font-size: 1rem;
        }

        .btn {
            padding: 8px 20px;
        }
    }
</style>
