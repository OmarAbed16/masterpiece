<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="orders"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Edit Order'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('{{ $Booking->main_image ?? 'https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80' }}');">

                <span class=""></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ $Booking->user->profile_image }}" alt="{{ $Booking->listing->title }}"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>

                    
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $Booking->user->name }} - <span class="mb-0 font-weight-normal text-sm">
                            {{ $Booking->user->role }} (customer)
                            </span>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                            {{ $Booking->user->email }}
                            </p>
                            <p class="mb-0 font-weight-normal text-sm">
                            {{ $Booking->user->phone_number }}
                            </p>
                        </div>
                    </div>
                   
                </div>
                
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                    <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <p class="mb-3">{{ $Booking->user->about }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Booking Details</h6>
                            </div>
                            <p>{{$Booking->created_at}}</p>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        <form method='POST' action="{{ route('orders.update', $Booking->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
    <div class="mb-3 col-md-6">
    <label class="form-label">Title</label>
    <div 
        class="form-control border border-2 p-2" 
        style="cursor: no-drop; background-color: #f8f9fa;">
        {{ old('title', $Booking->listing->title) }}
        <a target="_blank" href="{{ route('properties.edit', $Booking->listing->id) }}" 
        class="text-primary text-decoration-underline" 
        style="font-size: 0.875rem;">
        See Property details
    </a>
    
</div>
<a target="_blank" href="{{ route('admins.edit', $Booking->listing->owner_id) }}" 
        class="text-primary text-decoration-underline" 
        style="font-size: 0.875rem;">
        See Owner
    </a>
    @error('title')
        <p class='text-danger inputerror'>{{ $message }}</p>
    @enderror
</div>


        <div class="mb-3 col-md-6">
            <label class="form-label">Payment Value</label>
            <input type="tel" name="payment_value" class="form-control border border-2 p-2" value='{{ old('payment_value', $Booking->payment_value) }}'>
            @error('payment_value')
                <p class='text-danger inputerror'>{{ $message }} </p>
            @enderror
        </div>

       


        <div class="mb-3 col-md-6">
            <label class="form-label">Check-in</label>
            <input type="date" name="checkin" class="form-control border border-2 p-2" value='{{ old('checkin', \Carbon\Carbon::parse($Booking->checkin)->format('Y-m-d')) }}' min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">
            @error('checkin')
                <p class='text-danger inputerror'>{{ $message }} </p>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Check-out</label>
            <input type="date" name="checkout" class="form-control border border-2 p-2" value='{{ old('checkout', \Carbon\Carbon::parse($Booking->checkout)->format('Y-m-d')) }}' min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">
            @error('checkout')
                <p class='text-danger inputerror'>{{ $message }} </p>
            @enderror
        </div>


        <div class="mb-3 col-md-6">
    <label class="form-label">Payment Status</label>
    <select name="payment_status" class="form-control border border-2 p-2">
        <option value="" disabled selected>Select payment status</option>
        <option value="pending" {{ old('payment_status', $Booking->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="completed" {{ old('payment_status', $Booking->payment_status) == 'completed' ? 'selected' : '' }}>Completed</option>
        <option value="failed" {{ old('payment_status', $Booking->payment_status) == 'failed' ? 'selected' : '' }}>Failed</option>
    </select>
    @error('payment_status')
        <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-control border border-2 p-2">
                <option value="" disabled selected>Select status</option>
                <option value="pending" {{ old('status', $Booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ old('status', $Booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="canceled" {{ old('status', $Booking->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            @error('status')
                <p class='text-danger inputerror'>{{ $message }} </p>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn bg-gradient-dark">Submit</button>
</form>




                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    

</x-layout>
