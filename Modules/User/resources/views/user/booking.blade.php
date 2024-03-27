@extends('frontend.master')
@section('title', 'Booking Details')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/user-dashboard.css')}}">
@endpush
@section('content')
        <div class="container">
            <div class="row pt-20">
			@include('user::user.partial.side-nav')
			
			<div class="col-md-8">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center" style="background: #fff; margin-bottom: 20px;">
						<div>
							<h4>Booking Details</h4>
						</div>
						
					</div>
					<div class="card-body text-dark table-responsive">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Package Name</th>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">People</th>
                                        <th scope="col">Customers Information</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                    @if($booking->user_id == $users->id)
                                    <tr>
                                        <td>{{ $booking->package->name }}</td>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->number_of_people }}</td>
                                        <td>
                                        @php
                                            $infoData = json_decode($booking->info_data, true);
                                        @endphp
                                        <p class="ml-3">
                                            @isset($infoData['firstname'])
                                                <b>First Name:</b> {{ $infoData['firstname'] }}<br>
                                            @endisset
                                            @isset($infoData['lastname'])
                                                <b>Last Name:</b> {{ $infoData['lastname'] }}<br>
                                            @endisset
                                            @isset($infoData['email'])
                                                <b>Email:</b> {{ $infoData['email'] }}<br>
                                            @endisset
                                            @isset($infoData['phone_number'])
                                                <b>Phone Number:</b> {{ $infoData['phone_number'] }}<br>
                                            @endisset
                                            @isset($infoData['address'])
                                                <b>Address:</b> {{ $infoData['address'] }}<br>
                                            @endisset
                                        </p>
                                        </td>
                                        <td>
                                            @if($booking->status == '0')
                                            <span class="badge bg-warning">Pending</span>
                                            @elseif($booking->status == '1')
                                            <span class="badge bg-success">Accepted</span>
                                            @elseif($booking->status == '2')
                                            <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="travel_pagination">
                                <ul class="travel_pagination">
                                    @if ($bookings->onFirstPage())
                                        <li class="disabled"><a href="#"><i
                                                    class="fa fa-angle-double-left"></i></a></li>
                                    @else
                                        <li><a href="{{ $bookings->previousPageUrl() }}"><i
                                                    class="fa fa-angle-double-left"></i></a>
                                        </li>
                                    @endif

                                    @for ($page = max(1, $bookings->currentPage() - 2); $page <= min($bookings->lastPage(), $bookings->currentPage() + 2); $page++)
                                        <li class="{{ $bookings->currentPage() == $page ? 'active' : '' }}"><a
                                                href="{{ $bookings->url($page) }}">{{ $page }}</a></li>
                                    @endfor

                                    @if ($bookings->hasMorePages())
                                        <li><a href="{{ $bookings->nextPageUrl() }}"><i
                                                    class="fa fa-angle-double-right"></i></a>
                                        </li>
                                    @else
                                        <li class="disabled"><a href="#"><i
                                                    class="fa fa-angle-double-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>
					    </div>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
