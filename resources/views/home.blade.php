@extends('layouts.workvu')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-3 item" id="tApp">
        </div>
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div  href="/str" class="card text-center my-4 c-blogs">
                        <a href="/str" class="btn">
                    <div class="card-body">
                        <notes-action></notes-action>
                        <h4 class="card-title">Mange Blogs</h4>
                    </div>
                </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
