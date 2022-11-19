@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h6>User List</h6>
                            <h6>
                                <form action="" method="get">
                                    <input type="search" name="search" class="form-control" placeholder="Search">
                                </form>
                            </h6> <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="division">Division</label>
                                            <select name="division" id="division" class="form-control">
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="district">Distruct</label>
                                            <select name="district" id="district" class="form-control">
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="upazila">Upazila</label>
                                            <select name="upazila" id="upazila" class="form-control">
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="unions">Union</label>
                                            <select name="unions" id="unions" class="form-control">
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Dhaka</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
