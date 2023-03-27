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
                        <div class="alert alert-success">{{session('success')}}</div>
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
                                        <a href="#" class="btn btn-primary">Raise issue</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
