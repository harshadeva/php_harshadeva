@extends('layouts.master')
@section('content')
    <div class="album text-muted">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1>View Member</h1>
                </div>
            </div>
            <br />
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            First name : {{ $member['first_name'] }}
                        </div>
                    </div>
                    <br />
                    <div class="row">

                        <div class="col-12">
                            Last name : {{ $member['last_name'] }}
                        </div>
                    </div>
                    <br />
                    <div class="row">

                        <div class="col-12">
                            Email : {{ $member['email'] }}
                        </div>
                    </div>
                    <br />
                    <div class="row">

                        <div class="col-12">
                            Phone : {{ $member['phone'] }}
                        </div>
                    </div>
                    <br />
                    <div class="row">

                        <div class="col-12">
                            Comment : {{ $member['comment'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection
<b></b>
