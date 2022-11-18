@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Divisions List</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.L</th>
                                        <th> Division Name  </th>
                                        <th> Division Bangla Name </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisions as $division)
                                    <tr class="">
                                        <td>{{ $division->id }}</td>
                                        <td>{{ $division->name }}</td>
                                        <td>{{ $division->bn_name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $divisions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
