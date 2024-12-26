<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="properties"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="properties"></x-navbars.navs.auth>
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
                                                NAME</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Description</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Price</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                State</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                CREATION DATE
                                            </th>
                                            
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listings as $listing)
                                        <tr>
                                            <td>
                                                <div class="text-center px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $listing->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center px-2 py-1">
                                                    <div>
                                                        <img src="{{ $listing->image_url }}"
                                                            class="avatar  me-3 border-radius-lg" alt="{{ $listing->title }}">
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ Str::limit($listing->title, 20, '...') }}</h6>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"> {{ Str::limit($listing->description, 20, '...') }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $listing->price }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $listing->status }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $listing->created_at }}</span>
                                            </td>
                                            
                                             <!-- Edit Button -->
<td class="text-center">
    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('properties.edit', $listing->id) }}" title="Edit">
        <i class="material-icons">edit</i>
    </a>
</td>

   <!-- Delete Button -->
    <td class="text-center">
    <button type="button" class="btn btn-danger btn-link delete-user"
        data-id="{{ $listing->id }}" title="Delete">
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

document.querySelectorAll('.delete-user').forEach(button => {
    button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id'); 

        // Show confirmation popup with SweetAlert2
        Swal.fire({
            title: 'Are you sure?',
            text: "This Property will be deleted and cannot be restored!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result => {
            if (result.isConfirmed) {
                // Proceed with the DELETE request if confirmed

                // Send DELETE request using fetch
                fetch(`/admin/properties/delete/${userId}`, {
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
                        Swal.fire('Deleted!', 'The Property has been deleted.', 'success');
                        // Optionally reload the page to reflect the deletion
                        setTimeout(function() {
    location.reload(); 
}, 1000); 

                    } else {
                        // Show error SweetAlert if deletion fails
                        Swal.fire('Error!', 'There was an issue deleting the Property.', 'error');
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
