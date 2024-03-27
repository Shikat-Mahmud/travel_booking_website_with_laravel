@extends('admin.layouts.master')
@section('title', 'Booking Details')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Booking Details</h4>

                            </div>
                            <div>
                                <a href="{{ route('booking.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Booking List</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>Package Name: </b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $booking->package->name }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>User Name: </b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $booking->user->name }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>Booking Date: </b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $booking->booking_date }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>Total Number of People: </b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $booking->number_of_people }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>Customer First Name:</b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ json_decode($booking->info_data)->firstname }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>Customer Last Name:</b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ json_decode($booking->info_data)->lastname }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>Customer Email:</b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ json_decode($booking->info_data)->email }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>Customer Phone Number:</b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ json_decode($booking->info_data)->phone_number }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>Customer Address:</b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ json_decode($booking->info_data)->address }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span><b>Booking Status: </b></span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3"><b>
                                            @if ($booking->status == 0)
                                                Pending <i class="fas fa-circle text-c-green f-10 m-r-15" aria-hidden="true" style="color: orange; mergin-left: 2px;"></i>
                                            @elseif ($booking->status == 1)
                                                Accepted <i class="fas fa-circle text-c-green f-10 m-r-15" aria-hidden="true" style="color: green; mergin-left: 2px;"></i>
                                            @elseif ($booking->status == 2)
                                                Rejected <i class="fas fa-circle text-c-red f-10 m-r-15" aria-hidden="true" style="color: red; mergin-left: 2px;"></i>
                                            @endif
                                        </b></p>
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
