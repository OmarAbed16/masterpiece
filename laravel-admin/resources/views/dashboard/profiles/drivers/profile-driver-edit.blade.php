<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="driver-profile"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Driver Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets') }}/img/images/{{ $driver->profile_image }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $driver->name }} - <span class="mb-0 font-weight-normal text-sm">
                            {{ $driver->role }}
                            </span>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                            {{ $driver->email }}
                            </p>
                        </div>
                    </div>
                   
                </div>
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                    <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <p class="mb-3">{{ $driver->about }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Profile Information</h6>
                            </div>
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
                        <form method="POST" action="{{ route('drivers.update', $driver->driver_id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
                            <div class="row">
                                
                              
                                
                            <div class="mb-3 col-md-6">
    <label class="form-label">Name</label>
    <input 
        type="text" 
        name="name" 
        class="form-control border border-2 p-2" 
        value="{{ old('name', $driver->name) }}">
    @error('name')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>

                               
<div class="mb-3 col-md-6">
    <label class="form-label">Phone</label>
    <input 
        type="tel" 
        name="phone" 
        class="form-control border border-2 p-2" 
        value="{{ old('phone', $driver->phone) }}">
    @error('phone')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>

        

<div class="mb-3 col-md-6">
    <label class="form-label">Truck License Plate</label>
    <input 
        type="text" 
        name="truck_license_plate" 
        class="form-control border border-2 p-2" 
        value="{{ old('truck_license_plate', $driver->truck_license_plate) }}">
    @error('truck_license_plate')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>


<div class="mb-3 col-md-6">
    <label class="form-label">Location</label>
    <select name="governorate" class="form-control border border-2 p-2">
        <option value="" disabled selected>Select your governorate</option>
        <option value="Amman" {{ old('governorate', $driver->governorate) == 'Amman' ? 'selected' : '' }}>Amman</option>
        <option value="Zarqa" {{ old('governorate', $driver->governorate) == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
        <option value="Irbid" {{ old('governorate', $driver->governorate) == 'Irbid' ? 'selected' : '' }}>Irbid</option>
        <option value="Aqaba" {{ old('governorate', $driver->governorate) == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
        <option value="Mafraq" {{ old('governorate', $driver->governorate) == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
        <option value="Karak" {{ old('governorate', $driver->governorate) == 'Karak' ? 'selected' : '' }}>Karak</option>
        <option value="Maan" {{ old('governorate', $driver->governorate) == 'Maan' ? 'selected' : '' }}>Maan</option>
        <option value="Ajloun" {{ old('governorate', $driver->governorate) == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
        <option value="Balqa" {{ old('governorate', $driver->governorate) == 'Balqa' ? 'selected' : '' }}>Balqa</option>
        <option value="Jerash" {{ old('governorate', $driver->governorate) == 'Jerash' ? 'selected' : '' }}>Jerash</option>
        <option value="Tafilah" {{ old('governorate', $driver->governorate) == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
        <option value="Madaba" {{ old('governorate', $driver->governorate) == 'Madaba' ? 'selected' : '' }}>Madaba</option>
    </select>

    @error('governorate')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>



<div class="mb-3 col-md-6">
    <label class="form-label">National Number</label>
    <input 
        type="text" 
        name="national_number" 
        class="form-control border border-2 p-2" 
        value="{{ old('national_number', $driver->national_number) }}">
    @error('national_number')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>




<div class="mb-3 col-md-6">
    <label class="form-label">National Number Image</label>
    <input type="file" name="national_number_image" class="form-control border border-2 p-2" 
           accept="image/*">
    @error('national_number_image')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>


<div class="mb-3 col-md-6">
    <label class="form-label">Driver License Image</label>
    <input type="file" name="driver_license_image" class="form-control border border-2 p-2" 
           accept="image/*">
    @error('driver_license_image')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>


<div class="mb-3 col-md-6">
    <label class="form-label">Gas License Image</label>
    <input type="file" name="gas_license_image" class="form-control border border-2 p-2" 
           accept="image/*">
    @error('gas_license_image')
        <p class="text-danger inputerror">{{ $message }}</p>
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
