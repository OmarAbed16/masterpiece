<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="reviews"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Reviews"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Reviews</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                <table>
    <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating ID</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Name</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Phone</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Feedback</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating Date</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Driver Info</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order ID</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Time</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ratings as $rating)
            <tr>
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $rating->rating_id }}</p>
                </td>
                <td class="align-middle text-center">
                    <a href="{{ route('users.edit', $rating->id) }}" class="text-xs font-weight-bold mb-0">{{ $rating->customer_name }}</a>
                </td>
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $rating->customer_phone }}</p>
                </td>
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">
                        @php
                            $stars = str_repeat('⭐', $rating->rating);
                            $emptyStars = str_repeat('☆', 5 - $rating->rating);
                            echo $stars . $emptyStars;
                        @endphp
                    </p>
                </td>
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">
                        <span>{{ Str::limit($rating->feedback, 50) }} </span>
                        <a href="javascript:void(0);" onclick="showFullFeedback('{{ $rating->rating_id }}', '{{ $rating->feedback }}')" style="color: #007bff;">Show More</a>
                    </p>
                </td>
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $rating->rating_date }}</p>
                </td>
                <td class="align-middle text-center">
                    <a href="{{ route('drivers.edit', $rating->driver_id) }}" class="text-xs font-weight-bold mb-0">{{ $rating->driver_name }} ({{ $rating->driver_phone }})</a>
                </td>
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $rating->order_id }}</p>
                </td>
                <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $rating->order_time }}</p>
                </td>

                <td class="text-center">
            <button type="button" class="btn btn-danger btn-link delete-rating" data-id="{{ $rating->rating_id }}" title="Delete">
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
  function showFullFeedback(ratingId, feedback) {
        Swal.fire({
            title: 'Full Feedback',
            html: `
                <strong>Feedback for Rating ID: ${ratingId}</strong><br><br>
                <p>${feedback}</p>
            `,
            icon: 'info',
            confirmButtonText: 'Close'
        });
    }


    
    document.querySelectorAll('.delete-rating').forEach(button => {
    button.addEventListener('click', function () {
        const ratingsId = this.getAttribute('data-id'); 

        // Show confirmation popup with SweetAlert2
        Swal.fire({
            title: 'Are you sure?',
            text: "This Review will be deleted and cannot be restored!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result => {
            if (result.isConfirmed) {
                // Proceed with the DELETE request if confirmed

                // Send DELETE request using fetch
                fetch(`/admin/reviews/delete/${ratingsId}`, {
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
                        Swal.fire('Deleted!', 'The review has been deleted.', 'success');
                        // Optionally reload the page to reflect the deletion
                        setTimeout(function() {
                            location.reload(); 
                        }, 1000); 

                    } else {
                        // Show error SweetAlert if deletion fails
                        Swal.fire('Error!', 'There was an issue deleting the review.', 'error');
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
