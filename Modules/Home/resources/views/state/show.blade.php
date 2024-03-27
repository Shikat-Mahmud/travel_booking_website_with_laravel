@extends('admin.layouts.master')
@section('title', 'Stats Details')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Stats Details</h4>

                            </div>
                            <div>
                                <a href="{{ route('state.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Stats List</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Stats Title: </span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $state->title }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Stats Value: </span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $state->value }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Stats Icon: </span>
                                </div>
                                <div class="col-md-8">
                                    <i class="ml-3 mb-4 fas {{ $state->icon }}"></i>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Stats Color: </span>
                                </div>
                                <div class="col-md-8">
                                <div class="ml-3 state-color" style="background-color: {{ $state->color }}; height: 20px; width: 30px; border-radius: 4px;"></div>
                                </div>
                            </div>

                            <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
