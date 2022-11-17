@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                    <div class="mb-3">
                        <label for="forName" class="form-label">Title</label>
                        <input type="text" value="{{ $poll->title }}" name="title" class="form-control" id="forName" disabled>
                    </div>

                    <form action="{{ route('addmore.option.store', $poll->id) }}" method="POST"  class="forms-sample">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        Poll Options
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label for="forName" class="form-label">Optin Name</label>
                                            <div class="col-md-10">
                                                <input type="text" name="pollinput" class="form-control" id="forName" autocomplete="off" placeholder="Option details">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-primary btn-sm btn-sm btn-icon-tex" id="addButton">
                                                    <i class="btn-icon-prepend" data-feather="check-square"></i>
                                                    Add Service</button>
                                            </div>
                                        </div>

                                        <h6 class="card-title mb-3">Searvice List</h6>
                                        <ul class="list-group" id="simple-list">

                                        </ul>
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js" ></script>
@push('custom-scripts')
<!-- Custom js here -->
<script type="text/javascript">
    $(document).ready(function(){
        let num = 0;
        $(document).on('click', '#addButton', function(){
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

        $(document).on('click', '.close-icon', function(){
            $(this).parent().remove();
        });


    });
</script>
