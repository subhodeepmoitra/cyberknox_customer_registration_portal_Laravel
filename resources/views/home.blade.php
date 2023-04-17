@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Product Help') }}</div>

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


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card border-success">
                                    <div class="card-body">
                                        <h5 class="card-title">Register a product</h5>
                                        <p class="card-text">Register a product to claim warranty.</p>
                                        <a href="{{ url('/product_registration') }}" class="btn btn-primary">Register</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border-danger">
                                    <div class="card-body">
                                        <h5 class="card-title">Raise a product issue</h5>
                                        <p class="card-text">Raise a issue with a registered product.</p>
                                        <a href="{{ url('/issue_ticket') }}" class="btn btn-primary">Raise issue</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table for product registration details -->
                        <table class="table table-bordered">
                            <div class="card-header">{{ __('Product Registration Details') }}</div>
                            <tr>
                                <th>Accession Number</th>
                                <th>Invoice</th>
                                {{--  <th>First Name</th>
                                <th>Last Name</th> --}}
                                <th style="text-align: center; vertical-align: middle;">Email</th>
                                <th style="text-align: center; vertical-align: middle;">Phone</th>
                                {{--   <th>Type</th> --}}
                                <th style="text-align: center; vertical-align: middle;">Time</th>
                                <th style="text-align: center; vertical-align: middle;">Status</th>
                                <th style="text-align: center; vertical-align: middle;">View</th>
                                {{--                                 <th></th>
 --}}
                            </tr>

                            @foreach ($users as $user)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;"> {{ $user->id }} </td>
                                    <div id="content">
                                        <td style="text-align: center; vertical-align: middle;">
                                            <a href="{{ url('storage/' . $user->invoice) }}" class="btn btn-light">
                                                <img src="{{ url('storage/' . $user->invoice) }}" width="100px"
                                                    id="img1" alt="image">
                                            </a>
                                        </td>
                                    </div>

                                    {{-- <td>{{ $user->fname }}</td>
                                    <td>{{ $user->lname }}</td> --}}
                                    <td style="text-align: center; vertical-align: middle;">{{ $user->email }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $user->phone }}</td>
                                    {{-- <td>
                                        @foreach ($Registrationtype as $type)
                                            @if ($type->type == '1')
                                                Product Registration
                                            @elseif ($type->type == '2')
                                                Product Issue Ticket
                                            @else
                                                Cannot Fetch Details
                                            @endif
                                        @endforeach
                                    </td> --}}
                                    <td style="text-align: center; vertical-align: middle;">{{ $user->created_at }}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        @if ($user->registrationStatus == '1')
                                            Waiting for approval
                                        @elseif ($user->registrationStatus == '0')
                                            Approved
                                        @else
                                            Problem in condition
                                        @endif
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="{{ url('/view_registration_details', ['id' => $user->id])}}" class="btn btn-primary">View Accn No {{ $user->id }}</a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>




                        <!-- Table for product issue details -->
                        <table class="table table-bordered">
                            <div class="card-header">{{ __('Product Issue Details') }}</div>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">Invoice</th>
                                {{-- <th>First Name</th>
                                <th>Last Name</th> --}}
                                <th style="text-align: center; vertical-align: middle;">Email</th>
                                <th style="text-align: center; vertical-align: middle;">Phone</th>
                                {{-- <th>Type</th> --}}
                                <th style="text-align: center; vertical-align: middle;">Time</th>
                                <th style="text-align: center; vertical-align: middle;">Status</th>
                                <th style="text-align: center; vertical-align: middle;">View</th>
                            </tr>

                            @foreach ($issues as $issue)
                                <tr>
                                    <div id="content">
                                        <td style="text-align: center; vertical-align: middle;"><img
                                                src="{{ url('storage/' . $user->invoice) }}" width="100px" id="img1"
                                                alt="image"></td>
                                    </div>

                                    {{--  <td>{{ $issue->fname }}</td>
                                    <td>{{ $issue->lname }}</td> --}}
                                    <td style="text-align: center; vertical-align: middle;">{{ $issue->email }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $issue->phone }}</td>
                                    {{-- <td>
                                        @foreach ($Registrationtype as $type)
                                            @if ($type->type == '1')
                                                Product Registration
                                            @elseif ($type->type == '2')
                                                Product Issue Ticket
                                            @else
                                                Cannot Fetch Details
                                            @endif
                                        @endforeach
                                    </td> --}}
                                    <td style="text-align: center; vertical-align: middle;">{{ $issue->created_at }}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        @if ($issue->Ticket_Status == '1')
                                            Issue Under Review
                                        @elseif ($issue->Ticket_Status == '0')
                                            Issue fixing in progress
                                        @else
                                            Issue Fixed
                                        @endif
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="{{ url('#') }}" class="btn btn-primary">View Issue</a>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="{{ url('#') }}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
