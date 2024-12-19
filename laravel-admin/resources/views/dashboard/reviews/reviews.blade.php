<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="reviews"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Reviews Managment"></x-navbars.navs.auth>
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
                                                Date Creation
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Review</th>
                                               
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Comment</th>

                                                
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Order Details
                                            </th>
                                           
                                          
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Reviews as $Review)
                                        <tr>
                                            <td>
                                                <div class="text-center px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $Review->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center px-2 py-1">
                                                    <div>
                                                        <img src="{{ $Review->main_image }}"
                                                            class="avatar avatar-lg me-3 border-radius-lg" alt="Review1">
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $Review->listing->title }}</h6>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $Review->user->name }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $Review->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center">
    <span class="text-secondary text-xs font-weight-bold">
        @for ($i = 1; $i <= 5; $i++)
            <i class="fa fa-star {{ $i <= $Review->rating ? 'filled' : 'empty' }}"
               style="color: {{ $i <= $Review->rating ? 'gold' : 'grey' }};"></i>
        @endfor
    </span>
</td>



                                            

<td class="align-middle text-center">
    <!-- Button with Material Icon to show Review Comment -->
    <button class="btn btn-info show-Review" 
            data-id="{{ $Review->id }}" 
            data-comment="{{ $Review->comment }}">
        <i class="material-icons">comment</i> Show
    </button>
</td>
                                          
<td class="align-middle text-center">
    <a target="_blank" href="{{ route('orders.edit', $Review->order->id) }}" class="btn btn-success btn-link" title="Show Order">
        <i class="material-icons">visibility</i>Show Order
    </a>
</td>

   <!-- Delete Button -->
    <td class="text-center">
    <button type="button" class="btn btn-danger btn-link delete-Review"
        data-id="{{ $Review->id }}" title="Delete">
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

document.querySelectorAll('.delete-Review').forEach(button => {
    button.addEventListener('click', function () {
        const ReviewId = this.getAttribute('data-id'); 

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
                fetch(`/admin/reviews/delete/${ReviewId}`, {
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
                        Swal.fire('Deleted!', 'The Review has been deleted.', 'success');
                        // Optionally reload the page to reflect the deletion
                        setTimeout(function() {
    location.reload(); 
}, 1000); 

                    } else {
                        // Show error SweetAlert if deletion fails
                        Swal.fire('Error!', 'There was an issue deleting the Review.', 'error');
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








document.querySelectorAll('.show-Review').forEach(button => {
        button.addEventListener('click', function () {
            const comment = this.getAttribute('data-comment');

            // Show the comment using SweetAlert2
            Swal.fire({
                title: 'Review Comment',
                html: `<strong>Comment:</strong> ${comment}`,
                icon: 'info',
                confirmButtonText: 'Close'
            });
        });
    });

</script>
</x-layout>
