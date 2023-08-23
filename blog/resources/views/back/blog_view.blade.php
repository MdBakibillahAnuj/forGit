<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Blog Dashboard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand fw-bolder text-primary" href="#">MyBlogs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('view.blog') }}">Manage Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('add.blog') }}">Add Blog</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(Auth::check())
                            {{ Auth::user()->name }}
                        @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="py-3">
    <div class="container">
        <div id="layoutSidenav_content">
            <div class="card">
                <div class="card-header" style="background-color: #08eab3">
                    <i class="fas fa-table me-1"></i>
                    Blog Table
                </div>
                <div class="card-body">
                    <a class="btn btn-primary" style="float:right; margin-left:5px !important" href="{{ route('add.blog') }}">Add  Blog</a>
                    <table id="datatablesSimple" class="table">
                        <thead class="">
                        <tr>
                            <th class="text-center">SN</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Creator Name</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Content</th>
                            <th class="text-center">Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($blog as $blogs )
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $blogs->title }}</td>
                                <td class="text-center">{{ $blogs->user->name }}</td>

                                <td class="text-center">
                                    <img src="{{ asset($blogs->image) }}" alt="" style="width:50px;height:50px">
                                </td>
                                <td class="text-center">{{ $blogs->blog_content }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="{{ route('edit.blog',['id'=>$blogs->id]) }}">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('delete.blog',['id'=>$blogs->id]) }}" id="delete">Del</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>


