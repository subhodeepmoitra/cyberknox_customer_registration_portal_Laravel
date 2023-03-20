@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Registration') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="row">
                        <div class="col-sm-6">
                          <div class="card border-success">
                            <div class="card-body">
                              <h5 class="card-title">Register a product</h5>
                              <p class="card-text">Register a product to claim warranty.</p>
                              <a href="#" class="btn btn-primary">Register</a>
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
