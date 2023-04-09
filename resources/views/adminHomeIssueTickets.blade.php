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
                                    <a class="nav-link active" href="{{url('/admin/home')}}">
                                        <button type="button" class="btn btn-primary"> New Registration Tickets</button>
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                                        <button type="button" class="btn btn-outline-primary disabled"> New Issue Tickets</button>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </nav>
                        </div>


                        <table class="table table-bordered">
                            <tr>
                                <th>Invoice</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Issue Description</th>
                                <th>Expected Date of notice</th>
                                <th>Date and time</th>
                                <th>View</th>
                            </tr>

                            @foreach ($issues as $issue)
                                <tr>
                                    <div id="content">
                                        <td>
                                            <a href="{{ url('storage/' . $issue->invoice) }}">
                                                <img src="{{ url('storage/' . $issue->invoice) }}" width="100px" id="img1"
                                                alt="image">
                                            </a>
                                        </td>
                                    </div>

                                    <td>{{ $issue->fname }}</td>
                                    <td>{{ $issue->lname }}</td>
                                    <td>{{ $issue->email }}</td>
                                    <td>{{ $issue->phone }}</td>
                                    <td>
                                        @if ($issue->Ticket_Status == '1')
                                            Waiting for approval
                                        @elseif ($issue->Ticket_Status == '0')
                                            Approved
                                        @else
                                            Problem in condition
                                        @endif
                                    </td>
                                    <td></td>
                                    <td>{{ $issue->created_at }}</td>
                                    <td>
                                            <a href="" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                {{ $issues->links() }}
                            </div>

                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
