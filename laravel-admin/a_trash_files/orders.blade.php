<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="orders"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Orders"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Orders</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                <thead>
    <tr>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order ID</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Name</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Phone</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Status</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Driver Info</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">View Order Details</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
    </tr>
</thead>
<tbody>
    @foreach($orders as $order)
    <tr>
        <td class="align-middle text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $order->order_id }}</p>
        </td>
        <td class="align-middle text-center">
            <a href="{{ route('users.edit', $order->user_id) }}" class="text-xs font-weight-bold mb-0">{{ $order->customer_name }}</a>
        </td>
        <td class="align-middle text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $order->customer_phone }}</p>
        </td>
        <td class="align-middle text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $order->quantity }}</p>
        </td>
        <td class="align-middle text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $order->payment_amount }}</p>
        </td>
        <td class="align-middle text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $order->payment_status }}</p>
        </td>
      <td class="text-center">
    <button type="button" class="btn btn-info btn-link view-driver" 
            data-name="{{ $order->driver_name }}" 
            data-phone="{{ $order->driver_phone }}" 
            data-vehicle="{{ $order->driver_vehicle }}" 
            data-license="{{ $order->driver_license }}">
        <i class="material-icons">visibility</i> View Driver
    </button>
</td>

<td class="text-center">
    <button type="button" class="btn btn-warning btn-link view-order" 
            data-order-id="{{ $order->order_id }}" 
            data-quantity="{{ $order->quantity }}" 
            data-status="{{ $order->status }}" 
            data-payment-status="{{ $order->payment_status }}" 
            data-payment-amount="{{ $order->payment_amount }}" 
            data-payment-method="{{ $order->payment_method }}"
            data-order-time="{{ $order->order_time }}"
            data-delivery-time="{{ $order->delivery_time }}">
        <i class="material-icons">visibility</i> View Order
    </button>
</td>


       
        <td class="text-center">
            <button type="button" class="btn btn-danger btn-link delete-order" data-id="{{ $order->order_id }}" title="Delete">
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
 <!-- Include jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   // View Driver Click Event
   $('.view-driver').on('click', function() {
        // Get data from button
        const driverName = $(this).data('name');
        const driverPhone = $(this).data('phone');


        // Show SweetAlert
        Swal.fire({
            title: 'Driver Details',
            html: `
                <p><strong>Name:</strong> ${driverName}</p>
                <p><strong>Phone:</strong> ${driverPhone}</p>
            `,
            icon: 'info',
            confirmButtonText: 'Close'
        });
    });

    // View Order Click Event
    $('.view-order').on('click', function() {
        // Get data from button
        const orderId = $(this).data('order-id');
        const quantity = $(this).data('quantity');
        const status = $(this).data('status');
        const paymentStatus = $(this).data('payment-status');
        const paymentAmount = $(this).data('payment-amount');
        const paymentMethod = $(this).data('payment-method');
        const order_time = $(this).data('order-time');
        const delivery_time = $(this).data('delivery-time');
        
        // Show SweetAlert
        Swal.fire({
            title: 'Order Details',
            html: `
                <p><strong>Order ID:</strong> ${orderId}</p>
                <p><strong>Quantity:</strong> ${quantity}</p>
                <p><strong>Status:</strong> ${status}</p>
                <p><strong>Payment Status:</strong> ${paymentStatus}</p>
                <p><strong>Payment Amount:</strong> ${paymentAmount}</p>
                <p><strong>Payment Method:</strong> ${paymentMethod}</p>
                <p><strong>Order time:</strong> ${order_time}</p>
                <p><strong>Delivery time:</strong> ${delivery_time}</p>
            `,
            icon: 'info',
            confirmButtonText: 'Close'
        });
    });


    document.querySelectorAll('.delete-order').forEach(button => {
    button.addEventListener('click', function () {
        const orderId = this.getAttribute('data-id'); // Get order ID

        // Show confirmation popup with SweetAlert2
        Swal.fire({
            title: 'Are you sure?',
            text: "This order will be deleted and cannot be restored!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result => {
            if (result.isConfirmed) {
                // Proceed with the DELETE request if confirmed

                // Send DELETE request using fetch
                fetch(`/admin/orders/delete/${orderId}`, {
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
                        Swal.fire('Deleted!', 'The order has been deleted.', 'success');
                        // Optionally reload the page to reflect the deletion
                        setTimeout(function() {
                            location.reload(); 
                        }, 1000); 

                    } else {
                        // Show error SweetAlert if deletion fails
                        Swal.fire('Error!', 'There was an issue deleting the order.', 'error');
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



</script>


</x-layout>
