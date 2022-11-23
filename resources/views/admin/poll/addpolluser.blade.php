@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="mb-3">
                        <label for="forName" class="form-label">Title</label>
                        <input type="text" value="" name="title" class="form-control" id="forName" disabled>
                    </div> --}}

                    <form action="{{ route('add.user.option.store', $poll->id) }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        Add New user Access
                                    </div>
                                    <div class="card-body">

                                        <input type="hidden" name="poll_id" value="{{ $poll->id }}">

                                        <div class="row mb-3">
                                            <div class="form-group">
                                                <label for="users"></label>
                                                <select name="user_id[]" id="users" multiple="multiple"
                                                    class="form-control js-example-basic-single form-select">
                                                    <option value="">Add new user</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

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
