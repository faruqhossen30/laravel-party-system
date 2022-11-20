@php
    $keyword = null;
    if (isset($_GET['keyword'])) {
        $keyword = trim($_GET['keyword']);
    }
@endphp

@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h6>User List</h6>
                            <form action="#" method="GET">
                                <h6>
                                    <input class="form-control"
                                        @if ($keyword) value="{{ $keyword }}" @endif name="keyword"
                                        type="search" placeholder="Search...">
                                </h6> <br>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="division"></label>
                                            <select name="division_id" id="division"
                                                class="form-control js-example-basic-single form-select">
                                                <option value="" selected>Division</option>
                                                @foreach ($divisions as $divission)
                                                    <option value="{{ $divission->id }}">
                                                        {{ $divission->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="district"></label>
                                            <select name="district_id" id="district"
                                                class="form-control js-example-basic-single form-select">
                                                <option value="" selected>District</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">
                                                        {{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="upazila"></label>
                                            <select name="upazila_id" id="upazila"
                                                class="form-control js-example-basic-single form-select">
                                                <option value="" selected>Upazila</option>
                                                @foreach ($upazilas as $upazila)
                                                    <option value="{{ $upazila->id }}">
                                                        {{ $upazila->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="unions"></label>
                                            <select name="union_id" id="unions"
                                                class="form-control js-example-basic-single form-select">
                                                <option value="" selected>unions</option>
                                                @foreach ($unions as $union)
                                                    <option value="{{ $union->id }}">
                                                        {{ $union->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid col-xl-12 ">
                                    <button type="submit" class="form-control mt-2">search</button>
                                </div>

                            </form>
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
                                    @foreach ($userlist as $key => $user)
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
                            {{ $userlist->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('plugin-styles')
    <link href="{{ asset('admin/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush
@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/select2.js') }}"></script>
@endpush
