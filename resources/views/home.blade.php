@extends('layouts.master')
@section('content')
    <div class="album text-muted">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! \Session::get('success') !!}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
@endsection
<b></b>
