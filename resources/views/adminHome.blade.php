@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Section') }}</div>

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

                        <div class="header">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">

                              <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">

                                  <li class="nav-item">
                                    <a class="nav-link disabled" href="#">
                                        <button type="button" class="btn btn-outline-primary disabled"> New Registration Tickets</button>
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link active" href="{{url('/admin/home/issue_tickets')}}" tabindex="-1" aria-disabled="true">
                                        <button type="button" class="btn btn-primary"> New Issue Tickets</button>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </nav>
                        </div>


                        <table class="table table-bordered">
                            <tr>
                                <th>Accession Number</th>
                                <th>Invoice</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>

                            @foreach ($users as $user)
                                <tr>
                                    <div id="content">
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <a href="{{ url('storage/' . $user->invoice) }}">
                                                <img src="{{ url('storage/' . $user->invoice) }}" width="100px" id="img1"
                                                alt="image">
                                            </a>
                                        </td>
                                    </div>

                                    <td>{{ $user->fname }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->registrationStatus == '1')
                                            Waiting for approval
                                        @elseif ($user->registrationStatus == '0')
                                            Approved
                                        @else
                                            Problem in condition
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/home/view_registration', ['id' => $user->id])}}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
