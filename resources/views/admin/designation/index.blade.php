@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center card-title">
                            <h6>Designation List</h6>
                            <a href="{{ route('designations.create') }}" class="btn btn-sm btn-primary">Add Desgination</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.L</th>
                                        <th> Title  </th>
                                        <th> Status </th>
                                        <th> User ID </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($designations as $designations)
                                    <tr>
                                        <td>{{ $designations->id }}</td>
                                        <td>{{ $designations->title }}</td>
                                        <td>{{ $designations->status }}</td>
                                        <td>{{ $designations->user_id }}</td>
                                        <td>
                                            <a href="{{ route('designations.edit', $designations->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('designations.destroy', $designations->id) }}" method="POST"
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
