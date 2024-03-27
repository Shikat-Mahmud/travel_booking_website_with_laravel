@extends('admin.layouts.master')
@section('title', 'Add Stats')
@push('styles')
    <style>
        .state-color {
            height: 20px; 
            width: 30px; 
            border-radius: 4px;
        }
    </style>
@endpush
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Add Stats</h4>
                        </div>
                        <div>
                            <a href="{{ route('state.index') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> Stats List</a>
                        </div>
                    </div>
                    <div class="card-body">

                    <form action="{{ route('state.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <label for="title" class="col-md-4 required">Stats Title <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control" placeholder="Stats Title" value="{{ old('title') }}" required/>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="value" class="col-md-4 required">Stats Value <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="number" name="value" class="form-control" placeholder="Stats Value" value="{{ old('value') }}" required/>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="icon" class="col-md-4">Icon <span class="text-danger">*</span></label>
                            <div class="col-md-8 d-flex">
                                <button class="btn btn-primary" data-icon="fas fa-map-marker-alt" role="iconpicker" data-rows="3" data-cols="10" data-arrow-class="btn-success" data-unselected-class="btn-primary"
                                    id="iconPickerButton">
                                </button>
                                <input type="text" name="icon" id="icon" class="form-control" placeholder="Selected Icon" value="{{ old('icon') }}" required/>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label class="col-md-4 required">Color <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                @foreach($colorOptions as $colorOption)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input color-radio" type="radio" name="color" id="colorOption{{$loop->index + 1}}" value="{{$colorOption}}" required>
                                        <div class="state-color" style="background-color: {{$colorOption}};"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-4 ">
                                <input type="submit" value="create" class="btn btn-success">
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-icon', function() {
            var closestIcon = $(this).find('i').attr('class');
            $('#icon').val(closestIcon);
        });
    });
  </script>
@endpush
