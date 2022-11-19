@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>{{ $user->name }} </h4>
                            <a href="{{ route('user.name') }}" class="btn btn-sm btn-primary">User List</a>
                        </div><br>
                        <table class="table  table-striped">
                            <tbody>
                                <tr>
                                    <td><strong>Name : </strong></td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email : </td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Mobile : </strong></td>
                                    <td>{{ $user->mobile }}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth : </td>
                                    <td>{{ $user->dob }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Gender : </strong></td>
                                    <td>{{ $user->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Division : </td>
                                    <td>{{ $user->division }}</td>
                                </tr>
                                <tr>
                                    <td><strong>District : </strong></td>
                                    <td>{{ $user->district }}</td>
                                </tr>
                                <tr>
                                    <td>Upazila : </td>
                                    <td>{{ $user->upazila }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Union : </strong></td>
                                    <td>{{ $user->unions }}</td>
                                </tr>
                                <tr>
                                    <td>Occupation : </td>
                                    <td>{{ $user->occupation }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Relation Status : </strong></td>
                                    <td>{{ $user->relation_status }}</td>
                                </tr>
                                <tr>
                                    <td>Blood : </td>
                                    <td>{{ $user->blood }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Website : </strong></td>
                                    <td>{{ $user->website }}</td>
                                </tr>
                                <tr>
                                    <td>Facebook : </td>
                                    <td>{{ $user->facebook }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Youtube : </strong></td>
                                    <td>{{ $user->youtube }}</td>
                                </tr>
                                <tr>
                                    <td>Twitter : </td>
                                    <td>{{ $user->twitter }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
