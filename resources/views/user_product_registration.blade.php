<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
    <form action="{{url('/productRegistration')}}" method="post">
        @csrf
        <section class="h-100 h-custom gradient-custom-2">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                  <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                      <div class="row g-0">
                        <div class="col-lg-6">
                          <div class="p-5">
                            <h3 class="fw-normal mb-5" style="color: #4835d4;">General Infomation</h3>


                            <div class="row">
                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <input type="text" name="fname" id="fname" class="form-control form-control-lg" />
                                  <label class="form-label" for="form3Examplev2">First name</label>
                                </div>
                              </div>
                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <input type="text" name="lname" id="lname" class="form-control form-control-lg" />
                                  <label class="form-label" for="form3Examplev3">Last name</label>
                                </div>
                              </div>
                            </div>


                            <div class="mb-4 pb-2">
                              <div class="form-outline">
                                <input type="text" name="productId" id="productId" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplev4">Product ID</label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                                <div class="form-outline">
                                    <input class="form-control form-control-lg" type="file" name="invoice" id="invoice">
                                    <label for="formFile" class="form-label">Upload invoice</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-lg-6 bg-indigo text-white">
                          <div class="p-5">
                            <h3 class="fw-normal mb-5" style="color: #4835d4;">Contact Details</h3>

                            <div class="mb-4 pb-2">
                              <div class="form-outline form-white">
                                <input type="text" name="address" id="address" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplea2">Address</label>
                              </div>
                            </div>

                            <div class="mb-4 pb-2">
                              <div class="form-outline form-white">
                                <input type="text" name="additionalInfo" id="additionalInfo" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplea3">Additional Information</label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5 mb-4 pb-2">

                                <div class="form-outline form-white">
                                  <input type="text" name="zipCode" id="zipCode" class="form-control form-control-lg" />
                                  <label class="form-label" for="form3Examplea4">Zip Code</label>
                                </div>

                              </div>
                              <div class="col-md-7 mb-4 pb-2">

                                <div class="form-outline form-white">
                                  <input type="text" name="place" id="place" class="form-control form-control-lg" />
                                  <label class="form-label" for="form3Examplea5">Place</label>
                                </div>

                              </div>
                            </div>

                            <div class="mb-4 pb-2">
                              <div class="form-outline form-white">
                                <input type="text" name="country" id="country" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplea6">Country</label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-5 mb-4 pb-2">

                                <div class="form-outline form-white">
                                  <input type="text" name="code" id="code" class="form-control form-control-lg" />
                                  <label class="form-label" for="form3Examplea7">Code +</label>
                                </div>

                              </div>
                              <div class="col-md-7 mb-4 pb-2">

                                <div class="form-outline form-white">
                                  <input type="text" name="phone" id="phone" class="form-control form-control-lg" />
                                  <label class="form-label" for="form3Examplea8">Phone Number</label>
                                </div>

                              </div>
                            </div>

                            <div class="mb-4">
                              <div class="form-outline form-white">
                                <input type="text" name="email" id="email" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Examplea9">Your Email</label>
                              </div>
                            </div>

                            <div class="form-check d-flex justify-content-start mb-4 pb-3">
                              <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" />
                              <label class="form-check-label text-white" for="form2Example3">
                                I do accept the <a href="#!" class="text-white"><u>Terms and Conditions</u></a> of your
                                site.
                              </label>
                            </div>

                            <button type="submit" class="btn btn-light btn-lg"
                              data-mdb-ripple-color="dark">Register</button>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </form>
</body>
</html>
