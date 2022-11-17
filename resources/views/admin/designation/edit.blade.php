@extends('admin.layout.master')


@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center card-title">
                        <h6>Designation Form</h6>
                    </div>
                    <form class="forms-sample" method="POST" action="{{ route('designations.update',$designation->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $designation->title }}"  autocomplete="off" placeholder="Ttile">
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
