@extends('admin.layout.master')


@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center card-title">
                        <h6>Organization Form</h6>
                        <a href="{{ route('organizations.index') }}" class="btn btn-sm btn-primary">Organization List</a>
                    </div>
                    <form class="forms-sample" method="POST" action="{{ route('organizations.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control"  name="name"
                                value="{{ old('name') }}" autocomplete="off" placeholder="Name">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bn_name" class="form-label">Bangla Name</label>
                            <input type="text" class="form-control" name="bn_name"
                                value="{{ old('bn_name') }}" autocomplete="off" placeholder="Ttile">
                            @error('bn_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description"
                                value="{{ old('description') }}" autocomplete="off" placeholder="Ttile">
                            @error('description')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
