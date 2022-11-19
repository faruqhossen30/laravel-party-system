@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center card-title">
                            <h6>User List</h6>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.L</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td>
                                                <a href="{{ route('user.show', $user->id) }}">Show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <br>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
