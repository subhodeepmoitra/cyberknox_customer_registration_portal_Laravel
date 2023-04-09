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
                                <th>Invoice</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Type</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>

                            @foreach ($users as $user)
                                <tr>
                                    <div id="content">
                                        <td><img src="{{ url('storage/' . $user->invoice) }}" width="100px" id="img1"
                                                alt="image"></td>
                                    </div>

                                    <td>{{ $user->fname }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @foreach ($Registrationtype as $type)
                                            @if ($type->type == '1')
                                                Product Registration
                                            @elseif ($type->type == '2')
                                                Product Issue Ticket
                                            @else
                                                Cannot Fetch Details
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        @if ($user->registrationStatus == '1')
                                            Waiting for approval
                                        @elseif ($user->registrationStatus == '0')
                                            Approved
                                        @else
                                            Problem in condition
                                        @endif
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
                                <th>Invoice</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Type</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>

                            @foreach ($issues as $issue)
                                <tr>
                                    <div id="content">
                                        <td><img src="{{ url('storage/' . $user->invoice) }}" width="100px" id="img1"
                                                alt="image"></td>
                                    </div>

                                    <td>{{ $issue->fname }}</td>
                                    <td>{{ $issue->lname }}</td>
                                    <td>{{ $issue->email }}</td>
                                    <td>{{ $issue->phone }}</td>
                                    <td>
                                        @foreach ($Registrationtype as $type)
                                            @if ($type->type == '1')
                                                Product Registration
                                            @elseif ($type->type == '2')
                                                Product Issue Ticket
                                            @else
                                                Cannot Fetch Details
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $issue->created_at }}</td>
                                    <td>
                                        @if ($issue->Ticket_Status == '1')
                                            Issue Under Review
                                        @elseif ($issue->Ticket_Status == '0')
                                            Issue fixing in progress
                                        @else
                                            Issue Fixed
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </table>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
