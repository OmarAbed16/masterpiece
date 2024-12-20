<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="subscription"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Subscription Managment"></x-navbars.navs.auth>
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
                                                Email</th>

                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date Creation
                                            </th>

                                           

                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reply</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Messages as $Message)
                                        <tr>
                                            <td>
                                                <div class="text-center px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $Message->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $Message->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $Message->created_at }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                          

                                            <td class="align-middle text-center">
                                                <a target="_blank" href="mailto:{{ $Message->email }}" class="btn btn-info btn-link" title="Reply to Message">
                                                    <i class="material-icons">reply</i> Reply
                                                </a>
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

document.querySelectorAll('.delete-Message').forEach(button => {
    button.addEventListener('click', function () {
        const MessageId = this.getAttribute('data-id'); 

        // Show confirmation popup with SweetAlert2
        Swal.fire({
            title: 'Are you sure?',
            text: "This Message will be deleted and cannot be restored!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result => {
            if (result.isConfirmed) {
                // Proceed with the DELETE request if confirmed

                // Send DELETE request using fetch
                fetch(`/admin/Messages/delete/${MessageId}`, {
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
                        Swal.fire('Deleted!', 'The Message has been deleted.', 'success');
                        // Optionally reload the page to reflect the deletion
                        setTimeout(function() {
    location.reload(); 
}, 1000); 

                    } else {
                        // Show error SweetAlert if deletion fails
                        Swal.fire('Error!', 'There was an issue deleting the Message.', 'error');
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








document.querySelectorAll('.show-Message').forEach(button => {
        button.addEventListener('click', function () {
            const comment = this.getAttribute('data-comment');

            // Show the comment using SweetAlert2
            Swal.fire({
                title: 'Message Comment',
                html: `<strong>Comment:</strong> ${comment}`,
                icon: 'info',
                confirmButtonText: 'Close'
            });
        });
    });

</script>
</x-layout>
