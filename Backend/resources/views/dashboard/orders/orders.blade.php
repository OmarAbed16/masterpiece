<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="orders"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Property Orders"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        
                   
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                PHOTO</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Property Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Client Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Checkin</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Checkout</th>

                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Payment Details
                                            </th>
                                           
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>
                                                <div class="text-center px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $booking->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center px-2 py-1">
                                                    <div>
                                                        <img src="{{ $booking->main_image }}"
                                                            class="avatar avatar-lg me-3 border-radius-lg" alt="booking1">
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $booking->listing->title }}</h6>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $booking->user->name }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $booking->checkin }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $booking->checkout }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $booking->status }}</span>
                                            </td>
                                            
                                            <td class="align-middle text-center">
                                            <button type="button" class="btn btn-primary btn-link show-booking"
                                                data-payment_value="{{ $booking->payment_value }}"
                                                data-payment_method="{{ $booking->payment_method }}"
                                                data-payment_status="{{ $booking->payment_status }}"
                                                data-id="{{ $booking->id }}"
                                                 title="show">
                                                <i class="material-icons">visibility</i>
                                            </button>   
                                            </td>
                                            
                                             <!-- Edit Button -->
<td class="text-center">
    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('orders.edit', $booking->id) }}" title="Edit">
        <i class="material-icons">edit</i>
    </a>
</td>

   <!-- Delete Button -->
    <td class="text-center">
    <button type="button" class="btn btn-danger btn-link delete-booking"
        data-id="{{ $booking->id }}" title="Delete">
        <i class="material-icons">close</i>
    </button>
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
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

document.querySelectorAll('.delete-booking').forEach(button => {
    button.addEventListener('click', function () {
        const bookingId = this.getAttribute('data-id'); 

        // Show confirmation popup with SweetAlert2
        Swal.fire({
            title: 'Are you sure?',
            text: "This booking will be deleted and cannot be restored!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result => {
            if (result.isConfirmed) {
                // Proceed with the DELETE request if confirmed

                // Send DELETE request using fetch
                fetch(`/admin/orders/delete/${bookingId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())  // Handle JSON response
                .then(data => {
                    if (data.success) {
                        // Show success SweetAlert
                        Swal.fire('Deleted!', 'The booking has been deleted.', 'success');
                        // Optionally reload the page to reflect the deletion
                        setTimeout(function() {
    location.reload(); 
}, 1000); 

                    } else {
                        // Show error SweetAlert if deletion fails
                        Swal.fire('Error!', 'There was an issue deleting the booking.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Handle errors if the fetch request fails
                    Swal.fire('Error!', 'Something went wrong. Please try again later.', 'error');
                });
            }
        });
    });
});




document.querySelectorAll('.show-booking').forEach(button => {
    button.addEventListener('click', function () {
        const bookingId = this.getAttribute('data-id');
        const paymentValue = this.getAttribute('data-payment_value');
        const paymentMethod = this.getAttribute('data-payment_method');
        const paymentStatus = this.getAttribute('data-payment_status');

        // Show booking details using SweetAlert2
        Swal.fire({
            title: `Booking ID: ${bookingId}`,
            html: `
                <strong>Payment Value:</strong> ${paymentValue}<br>
                <strong>Payment Method:</strong> ${paymentMethod}<br>
                <strong>Payment Status:</strong> ${paymentStatus}
            `,
            icon: 'info',
            confirmButtonText: 'Close'
        });
    });
});


</script>
</x-layout>
