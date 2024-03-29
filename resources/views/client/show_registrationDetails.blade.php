<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        @media screen and (max-width: 100px) {
            .invoice-card {
                position: relative;
                top: 40%;
            }

            ;
        }
    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div class="center-container" style="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        @foreach ($invoices as $data)
                            <div class="card-header">Product Registration Details for Accession Number
                                {{ $data->id }}
                            </div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                {{-- {{ __('You are logged in!') }} --}}

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <form class="form-inline">
                                    <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input type="email" class="form-control" id="email"
                                            value="{{ $data->email }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="id">Accession Number:</label>
                                        <input type="text" class="form-control" id="id"
                                            value="{{ $data->id }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="fname">Applicant Name:</label>
                                        <input type="text" name="fname" id="fname" class="form-control"
                                            value="{{ $data->fname . ' ' . $data->lname }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ $data->address }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="zipCode">Zip Code:</label>
                                        <input type="text" name="zip" id="zip" class="form-control"
                                            value="{{ $data->zipCode }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="place">Place:</label>
                                        <input type="text" name="place" id="place" class="form-control"
                                            value="{{ $data->place }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="country">Country:</label>
                                        <input type="text" name="country" id="country" class="form-control"
                                            value="{{ $data->country }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="code">Phone:</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ '+' . $data->code . '-' . $data->phone }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="created-at">Created-at:</label>
                                        <input type="text" name="created-at" id="created-at" class="form-control"
                                            value="{{ $data->created_at }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        {{--  <input type="text" name="status" id="status" class="form-control" value="{{$data->registrationStatus}}" readonly> --}}
                                        <label for="status" class="form-control">
                                            @if ($data->registrationStatus == '1')
                                                Waiting for approval
                                            @elseif ($data->registrationStatus == '0')
                                                Approved
                                            @else
                                                Cannot fetch data...
                                            @endif
                                        </label>
                                    </div>

                                </form>

                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice image card css -->
    <div class="invoice-card" style="position: relative;top: -40rem;left: 40rem; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card" style="width: 18rem;">
                   <a href="{{ url('storage/' . $data->invoice) }}">
                    <button type="button" class="btn btn-light">
                        <img src="{{ url('storage/' . $data->invoice) }}" class="rounded float-right"
                            alt="...">
                    </button>
                   </a>

                    <div class="card-body">
                        <p class="card-text">Invoice of {{ $data->id }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach

    </div>
    </div>
    </div>


</body>

</html>
