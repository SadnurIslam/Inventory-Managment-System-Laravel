<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/letter-z1.png')}}">
    <!-- Add your CSS files here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
<body>
    <div class="container-box vh-100">
        <div class="row h-100">
            <div class="col-3 col-lg-2 bg-dark">
                <div class="row py-2">
                    <div class="col-12">
                        <div class="logo text-white text-center">
                            <h2 class="mb-0"><a href="{{url('/')}}"><span class="text-danger">Z</span>tech</a></h2>
                        </div>
                    </div>
                </div>
                <div class="row sidebar-row">
                    <div class="col-12 px-4 py-3">
                        <div class="side-bar">
                            <ul>
                                <li><a href="{{url('dashboard')}}"><i class="fa-solid fa-house"></i>&nbsp&nbsp&nbspDashboard</a></li>
                                <li><a href="{{url('inventory')}}"><i class="fa-solid fa-cart-flatbed"></i>&nbsp&nbsp&nbspInventory</a></li>
                                <li><a href="{{url('report')}}"><i class="fa-solid fa-chart-simple"></i> &nbsp&nbsp&nbspReports</a></li>
                                <li><a href="{{url('purchase')}}"><i class="fa-solid fa-boxes-packing"></i>&nbsp&nbspPurchases</a></li>
                                <li><a href="{{url('order')}}"><i class="fa-solid fa-cart-shopping"></i>&nbsp&nbsp&nbspOrders</a></li>
                                <li><a href="{{url('supplier')}}"><i class="fa-solid fa-boxes-packing"></i>&nbsp&nbspSuppliers</a></li>
                                @if(session('role') == 'admin')
                                <li><a href="{{url('user')}}"><i class="fa-solid fa-user"></i>&nbsp&nbsp&nbspManage User </a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 col-lg-10 content-box-bg">
                <div class="row py-2 header-box bg-white">
                    <div class="col-12">
                        <header>
                            <div class="row">
                                <div class="col-9 d-flex align-items-center px-4">
                                <!-- <form action="inventory/search" method="get" class="w-100 mb-0"  class="search-form">
                                    <div class="input-group">
                                        <input type="search" class=" header-search" placeholder="Search inventory here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <button class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form> -->
                                </div>
                                <div class="col-3">
                                    <div class="profile text-end">
                                        <i class="fa-solid fa-user-tie sz-30"></i>
                                        <div class="btn-group">
                                            <button type="button" class="btn  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            @php
                                                $name = session('name');
                                                $firstName = explode(' ', $name)[0];
                                                echo ucfirst($firstName);
                                            @endphp
                                            
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{'profile/'.session('name')}}">Profile</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="{{'/logout'}}">Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
                <div class="row content-box">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add your JavaScript files here -->
    <script src="https://kit.fontawesome.com/dc8740f113.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

