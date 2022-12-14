@extends('admin.layout.master')

@section('content')
    <div class="divistion-area">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center card-title">
                            {{--  <h6>Designation List</h6>
                            <a href="{{ route('designations.create') }}" class="btn btn-sm btn-primary">Add Desgination</a>  --}}
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.L</th>
                                        <th style="width: 15%;"> Title </th>
                                        <th> Type </th>
                                        <th> Total Option </th>
                                        <th> User ID </th>
                                        <th> Add User</th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($polls as $poll)
                                        <tr>
                                            <td>{{ $poll->id }}</td>
                                            <td>{{ $poll->title }}</td>
                                            {{--  <td>{{ $poll->status }}</td>  --}}
                                            <td>
                                                @if ($poll->type == 1)
                                                    <a href="{{ route('poll.public', $poll->id) }}">Public</a>
                                                @elseif ($poll->type == 2)
                                                    <a href="{{ route('poll.protected', $poll->id) }}">Protected</a>
                                                @elseif ($poll->type == 3)
                                                    <a href="{{ route('poll.private', $poll->id) }}">Private</a>
                                                @endif
                                            </td>
                                            <td>{{ $poll->options_count }}</td>
                                            <td>{{ $poll->user_id }}</td>
                                            <td>

                                                @if ($poll->type == 3)
                                                <a href="{{ route('permissionforpoll.create', $poll->id) }}"
                                                    class="btn btn-sm btn-info text-white"><i data-feather="user-plus"></i></a>

                                                    <a href="{{ route('access.user.list', $poll->id) }}"
                                                        class="btn btn-sm btn-primary text-white"><i data-feather="eye"></i></a>
                                                    <a href="{{ route('edit.access.user', $poll->id) }}"
                                                        class="btn btn-sm btn-warning text-white"> <i data-feather="edit"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('addmore.option', $poll->id) }}"
                                                    class="btn btn-sm btn-info text-white"> <i data-feather="plus"></i></a>
                                                <a href="{{ route('polls.edit', $poll->id) }}"
                                                    class="btn btn-sm btn-primary"> <i data-feather="edit"></i></a>

                                                <form action="{{ route('polls.destroy', $poll->id) }}" method="POST"
                                                    style="display:inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are You Sure to Delete?')"
                                                        class="btn btn-sm btn-danger"> <i data-feather="trash"></i></button>
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
