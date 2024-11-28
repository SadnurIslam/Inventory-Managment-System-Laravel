@extends('base')
@section('title')
    Ztech | Users
@endsection
@section('content')
    <main class="p-3 supplier">
        <div class="row bg-white table-box">
            <div class="col-12">
                <div class="row py-3">
                    <div class="col-3">
                        <h2 class="color-lightblue supplier-h2">Manage User</h2>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-9 text-end d-flex">
                            <form action="{{route('users.index')}}" method="get" class="w-100"  class="search-form">
                                <div class="input-group text-end">
                                
                                    <input value="{{request('search')}}" name="search" type="search" class=" header-search" placeholder="Search user/phone/mail.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <button class="btn  input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                
                                </div>
                            </form>
                            </div>
                            <div class="col-3 text-end pr-0 mr-0">
                            <a class="btn btn-success add-supplier" href="{{route('users.add')}}">Add User</a>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Added_By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>#{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td >{{$user->email}}</td>
                            <td>{{$user->phone}} </td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->added_by}}</td>
                            <td class="action">
                                    <a class="btn btn-primary" href="{{route('users.edit',$user->id)}}" ><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form class = "d-inline-block" action="{{route('users.delete',$user->id)}}" method="post" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
    </main>
    
@endsection

<style>
    .action form{
        display: inline-block;
        margin-bottom: 0;
    }
    .badge{
        line-height: 1.4!important;
        border-radius: 5px;
    }
</style>


