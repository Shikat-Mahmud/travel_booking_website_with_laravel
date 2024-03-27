@extends('admin.layouts.master')
@section('title', 'Booking List')
@push('styles')
    <style>
        .desc-box {
            max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
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
                            <i class="fas fa-table me-1"></i>
                            Booking List
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example"  style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>User Name</th>
                                        <th>Booking Date</th>
                                        <th>No. of People</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->package ? $booking->package->name : '' }}</td>
                                        <td>{{ $booking->user ? $booking->user->name : '' }}</td>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td class="text-center">{{ $booking->number_of_people }}</td>
                                        <td>
                                            @if ($booking->status == '0')
                                            <span>Pending</span> <i class="fas fa-circle f-10 m-r-15"
                                                aria-hidden="true" style="color: orange; mergin-left: 2px;"></i>
                                            @elseif($booking->status == '1')
                                            <span>Accepted</span> <i class="fas fa-circle f-10 m-r-15"
                                                aria-hidden="true" style="color: green; mergin-left: 2px;"></i>
                                            @elseif($booking->status == '2')
                                            <span>Rejected</span> <i class="fas fa-circle f-10 m-r-15"
                                                aria-hidden="true" style="color: red; mergin-left: 2px;"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-secondary btn-sm me-2"
                                                    href="{{ route('booking.show', $booking->id) }}">View</a>

                                                    <form id="statusForm_{{ $booking->id }}" action="{{ route('booking.update.status', $booking->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" id="statusInput_{{ $booking->id }}">
                                                    </form>

                                                    <div class="dropdown">
                                                        <button class="btn btn-info btn-sm me-2 dropdown-toggle" type="button" id="editDropdown_{{ $booking->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Edit Status
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="editDropdown_{{ $booking->id }}">
                                                            <a class="dropdown-item" href="#" onclick="updateStatus({{ $booking->id }}, 0)">Pending</a>
                                                            <a class="dropdown-item" href="#" onclick="updateStatus({{ $booking->id }}, 1)">Accepted</a>
                                                            <a class="dropdown-item" href="#" onclick="updateStatus({{ $booking->id }}, 2)">Rejected</a>
                                                        </div>
                                                    </div>


                                                <form class="deleteForm"
                                                    action="{{ route('booking.destroy', $booking->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btnDelete">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
function updateStatus(bookingId, status) {
    document.getElementById("statusInput_" + bookingId).value = status;
    document.getElementById("statusForm_" + bookingId).submit();
}

</script>
@endpush