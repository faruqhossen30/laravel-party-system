@extends('admin.layout.master')


@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center card-title">
                        <h6>Designation Form</h6>
                        <a href="{{ route('designations.index') }}" class="btn btn-sm btn-primary">Desgination List</a>
                    </div>
                    <form class="forms-sample" method="POST" action="{{ route('designations.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}" autocomplete="off" placeholder="Ttile">
                            @error('title')
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
