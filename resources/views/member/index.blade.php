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
                    <h1>Team Members</h1>
                </div>
                <div class="col-2">
                    <a class="btn btn-success" href="{{ route('members.create') }}">New</a>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td>
                                            <a href="{{ route('members.edit', ['id' => $member->id]) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ route('members.show', ['id' => $member->id]) }}"
                                                class="btn btn-primary">View</a>
                                            <button class="btn btn-danger" onclick="confimation({{$member->id}})">Delete</button>
                                        </td>
                                    </tr>

                                    <form id="deleteForm{{ $member->id }}"
                                        action="{{ route('members.destroy', ['id' => $member->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-12">
                    <form class="form-inline" id="form2" action="{{ route('members.import') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" id="file" type="file" name="file">
                        </div>
                        <button type="submit" form="form2" class="btn btn-success  ml-2">Import from Excel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confimation(id) {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this record",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        const form = document.getElementById('deleteForm'+id);
                        form.submit();
                    } else {}
                });
        }
    </script>
@endsection
