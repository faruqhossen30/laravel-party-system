@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('polls.update', $poll->id) }}" method="POST" class="forms-sample">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="forName" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="forName"
                                value="{{ $poll->title }}" autocomplete="off" placeholder="Title">
                        </div>

                        <div class="mb-3">
                            <label for="forName" class="form-label">Poll Type</label>
                            <select name="type" id="" class="form-control">
                                <option value="1" @if ($poll->type == '1') selected @endif>Public</option>
                                <option value="2" @if ($poll->type == '2') selected @endif> Protected</option>
                                <option value="3" @if ($poll->type == '3') selected @endif>Private</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Update</button>
                    </form>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    Poll Options
                                </div>
                                <div class="card-body">
                                    @foreach ($poll->options as $option)
                                        <form action="{{ route('optionupdate.update', $option->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $option->id }}">
                                            <input type="hidden" name="poll_id" value="{{ $option->poll_id }}">

                                            <div class="d-flex mb-2" style="width: 50%">
                                                <input type="text" class="form-control" name="option"
                                                    value="{{ $option->option }}" width="80%">
                                                <button type="submit" class="btn btn-success"
                                                    style="width: 20%">Save</button>
                                            </div>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
@push('custom-scripts')
    <!-- Custom js here -->
    <script type="text/javascript">
        $(document).ready(function() {
            let num = 0;
            $(document).on('click', '#addButton', function() {
                num++;
                let option = $('input[name="pollinput"]').val();
                $('#simple-list').append(`
            <li class="list-group-item d-flex justify-content-between">${num} - ${option}
                <input type="hidden" name="options[]" value="${option}">
                <span class="badge bg-danger rounded-pill close-icon cursor-pointer">x</span>
                </li>
            `);
                $('input[name="pollinput"]').val('')
            });

            $(document).on('click', '.close-icon', function() {
                $(this).parent().remove();
            });


        });
    </script>
