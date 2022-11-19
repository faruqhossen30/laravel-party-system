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
                                        <th>Body</th>
                                        <th>Like</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $key => $post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            {{--  <td>{{ $post->body }}</td>  --}}
                                            <td>{{ $post->like }}</td>
                                            <td>{{ $post->like }}</td>
                                            <td>{{ $post->type }}</td>
                                            <td>
                                                @if ($post->status == 1)
                                                    <a href="{{ route('post.active', $post->id) }}">Active</a>
                                                @elseif ($post->status == 0)
                                                    <a href="{{ route('post.inactive', $post->id) }}">Inactive</a>
                                                @endif
                                            </td>
                                            <td>{{ $post->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <br>
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
