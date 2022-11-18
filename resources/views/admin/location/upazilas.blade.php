@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upazila List</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.L</th>
                                        <th> Upazila Name  </th>
                                        <th> District Bangla Name </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($upazilas as $upazila)
                                    <tr>
                                        <td>{{ $upazila->id }}</td>
                                        <td>{{ $upazila->name }}</td>
                                        <td>{{ $upazila->district->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $upazilas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
