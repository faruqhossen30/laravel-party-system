@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center card-title">
                            <h6>Organization List</h6>
                            <a href="{{ route('organizations.create') }}" class="btn btn-sm btn-primary">Add Organization</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.L</th>
                                        <th> Name  </th>
                                        <th> Bangla NAme </th>
                                        <th> Description</th>
                                        <th> User Id </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organizations as $organization)
                                    <tr>
                                        <td>{{ $organization->id }}</td>
                                        <td>{{ $organization->name }}</td>
                                        <td>{{ $organization->bn_name }}</td>
                                        <td>{{ $organization->description }}</td>
                                        <td>{{ $organization->user_id }}</td>
                                        <td>
                                            <a href="{{ route('organizations.edit', $organization->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST"
                                                style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are You Sure to Delete?')"
                                                    class="btn btn-sm btn-danger">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{--  {{ $designations->links() }}  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
