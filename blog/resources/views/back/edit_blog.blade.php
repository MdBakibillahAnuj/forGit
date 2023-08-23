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
                <div class="card-header" style="background-color: #48dbfb">
                    <i class="fas fa-table me-1"></i>
                    Add Blog Table
                </div>
                <div class="card-body">

                    <form action="{{ route('store.blog') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-6">
                                @php
                                    $user=DB::table('users')->get();
                                @endphp

                                <label for="" class="form-label">User Name</label>
                                <select class="form-select" name="user_id" id="">
                                    <option type="hidden" >Select blog creator</option>
                                    @foreach ($user as $user )
                                        <option value="{{ $user->id }}">{{ $user->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Title Name</label>
                                <input type="text" class="form-control" name="title" value="{{ $blog->title }}">

                            </div>

                        </div>
                        {{-- end row --}}


                        <div class="row mt-1">
                            <div class="col-md-6">
                                <label for="" class="form-label">Details</label>
                                <textarea class="form-control" name="blog_content"  id="floatingTextarea2" style="height: 100px">{!! $blog->blog_content !!}</textarea>

                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Blog Image</label>
                                <input type="file" class="form-control" name="image">
                                <img src="{{ asset($blog->image) }}" alt="" class="rounded" style="height: 100px; width: 100px; margin-left: 150px; margin-top: 10px;">
                                @error('image')
                                <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- end row --}}

                        <div class="mt-2">
                            <label for="" class="form-label"></label>
                            <button  type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>


