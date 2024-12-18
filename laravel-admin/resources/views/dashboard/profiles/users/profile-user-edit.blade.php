<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="user-management"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='User Profile'></x-navbars.navs.auth>
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
                            <img src="{{ asset('assets') }}/img/images/{{ $user->profile_image }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->name }} - <span class="mb-0 font-weight-normal text-sm">
                            {{ $user->role }}
                            </span>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                            {{ $user->email }}
                            </p>
                        </div>
                    </div>
                   
                </div>
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                    <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <p class="mb-3">{{ $user->about }}</p>
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
                        <form method='POST' action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                
                              
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control border border-2 p-2" value='{{ old('name', $user->name) }}'>
                                    @error('name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" name="phone" class="form-control border border-2 p-2" value='{{ old('phone', $user->phone) }}'>
                                    @error('phone')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                               
                                <div class="mb-3 col-md-6">
    <label class="form-label">Gender</label>
    <select name="gender" class="form-control border border-2 p-2">
        <option value="" disabled selected>Select your gender</option>
        <option value="Male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
    </select>

    @error('gender')
        <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>



                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Location</label>
                                    <select name="governorate" class="form-control border border-2 p-2">
    <option value="" disabled selected>Select your governorate</option>
    <option value="Amman" {{ old('governorate', $user->governorate) == 'Amman' ? 'selected' : '' }}>Amman</option>
    <option value="Zarqa" {{ old('governorate', $user->governorate) == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
    <option value="Irbid" {{ old('governorate', $user->governorate) == 'Irbid' ? 'selected' : '' }}>Irbid</option>
    <option value="Aqaba" {{ old('governorate', $user->governorate) == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
    <option value="Mafraq" {{ old('governorate', $user->governorate) == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
    <option value="Karak" {{ old('governorate', $user->governorate) == 'Karak' ? 'selected' : '' }}>Karak</option>
    <option value="Maan" {{ old('governorate', $user->governorate) == 'Maan' ? 'selected' : '' }}>Maan</option>
    <option value="Ajloun" {{ old('governorate', $user->governorate) == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
    <option value="Balqa" {{ old('governorate', $user->governorate) == 'Balqa' ? 'selected' : '' }}>Balqa</option>
    <option value="Jerash" {{ old('governorate', $user->governorate) == 'Jerash' ? 'selected' : '' }}>Jerash</option>
    <option value="Tafilah" {{ old('governorate', $user->governorate) == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
    <option value="Madaba" {{ old('governorate', $user->governorate) == 'Madaba' ? 'selected' : '' }}>Madaba</option>
</select>

                                    @error('location')
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
