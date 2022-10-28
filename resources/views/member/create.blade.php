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
                <div class="col-10">
                    <h1>Register Member</h1>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-12">
                    <form action="{{ route('members.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ old('first_name') }}" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ old('last_name') }}" placeholder="Enter last name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ old('phone') }}" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea type="text" class="form-control" id="comment" name="comment" placeholder="Enter some comment">{{ old('comment') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('members.index') }}" class="btn btn-danger">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
