@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-end card-title">
                         <h6>Poll access user  List</h6>
                        <a href="{{ route('polls.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.L</th>
                                        <th > Title </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key=> $user)
                                        <tr>
                                            <th>{{$key+1}}</th>
                                            <td>{{ $user->name }}</td>

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
