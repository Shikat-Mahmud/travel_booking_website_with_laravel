@extends('admin.layouts.master')
@section('title', 'Edit Stats')
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
                                <h4>Edit Stats</h4>

                            </div>
                            <div>
                                <a href="{{ route('state.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Stats List</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('state.update', ['state' => $state->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Stats Title <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" value="{{ $state->title }}"
                                            class="form-control" required />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Stats Value <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="number" name="value" value="{{ $state->value }}"
                                            class="form-control" required />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="icon" class="col-md-4">Icon <span class="text-danger">*</span></label>
                                    <div class="col-md-8 d-flex">
                                        <button class="btn btn-primary" data-icon="fas fa-map-marker-alt" role="iconpicker" data-rows="3" data-cols="10" data-arrow-class="btn-success" data-unselected-class="btn-primary"
                                            id="iconPickerButton">
                                        </button>
                                        <input type="text" name="icon" id="icon" class="form-control" placeholder="Selected Icon" value="{{ $state->icon }}" required/>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label class="col-md-4 required">Color <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        @foreach($colorOptions as $colorOption)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input color-radio" type="radio" name="color" id="colorOption{{$loop->index + 1}}" value="{{$colorOption}}" required {{ old('color', $state->color) == $colorOption ? 'checked' : '' }}>
                                                <div class="state-color" style="background-color: {{$colorOption}};"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-4 ">
                                        <input type="submit" value="update" class="btn btn-success">
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
    document.addEventListener("DOMContentLoaded", function () {
        var iconPickerButton = document.getElementById('iconPickerButton');
        var iconInput = document.getElementById('icon');

        iconPickerButton.querySelectorAll('i').forEach(function(iconElement) {
            iconElement.addEventListener('click', function () {
                var selectedIcon = iconElement.classList[1];
                
                iconInput.value = selectedIcon;
            });
        });
    });
</script>

@endpush
