<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="Addproperties"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Edit property'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">

                <span class=""></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ auth()->user()->profile_image }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>

                    
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->name  }} - <span class="mb-0 font-weight-normal text-sm">
                            {{auth()->user()->role  }} (you)
                            </span>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                            {{ auth()->user()->email  }}
                            </p>
                            <p>{{auth()->user()->created_at}}</p>
                        </div>
                    </div>
                   
                </div>
                
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                    <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <p class="mb-3">{{ auth()->user()->about  }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Add Property</h6>
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
                      <form method='POST' action="{{ route('properties.store', auth()->user()->id) }}" enctype="multipart/form-data">
                        
    @csrf
    <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control border border-2 p-2" value="{{ old('title') }}" placeholder="Enter property title">
            @error('title')
            <p class="text-danger inputerror">{{ $message }}</p>
            @enderror
        </div>
        

        <div class="mb-3 col-md-6">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control border border-2 p-2" value="{{ old('description') }}" placeholder="Enter property description">
            @error('description')
            <p class="text-danger inputerror">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
    <label class="form-label">Property Image</label>
    <input type="file" name="property_images[]" class="form-control border border-2 p-2" 
           accept="image/*" multiple>
    @error('property_image')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>


        <div class="mb-3 col-md-6">
            <label class="form-label">Price</label>
            <input type="tel" name="price" class="form-control border border-2 p-2" value="{{ old('price') }}" placeholder="Enter price">
            @error('price')
            <p class="text-danger inputerror">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control border border-2 p-2" value="{{ old('location') }}" placeholder="Enter location">
            @error('location')
            <p class="text-danger inputerror">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Governorate</label>
            <select name="governorate" class="form-control border border-2 p-2">
    <option value="" disabled selected>Select your governorate</option>
    <option value="Amman" {{ old('governorate') == 'Amman' ? 'selected' : '' }}>Amman</option>
    <option value="Zarqa" {{ old('governorate') == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
    <option value="Irbid" {{ old('governorate') == 'Irbid' ? 'selected' : '' }}>Irbid</option>
    <option value="Aqaba" {{ old('governorate') == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
    <option value="Mafraq" {{ old('governorate') == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
    <option value="Karak" {{ old('governorate') == 'Karak' ? 'selected' : '' }}>Karak</option>
    <option value="Maan" {{ old('governorate') == 'Maan' ? 'selected' : '' }}>Maan</option>
    <option value="Ajloun" {{ old('governorate') == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
    <option value="Balqa" {{ old('governorate') == 'Balqa' ? 'selected' : '' }}>Balqa</option>
    <option value="Jerash" {{ old('governorate') == 'Jerash' ? 'selected' : '' }}>Jerash</option>
    <option value="Tafilah" {{ old('governorate') == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
    <option value="Madaba" {{ old('governorate') == 'Madaba' ? 'selected' : '' }}>Madaba</option>
</select>

            @error('governorate')
            <p class="text-danger inputerror">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Number of Beds</label>
            <input type="tel" name="bed" class="form-control border border-2 p-2" value="{{ old('bed') }}" placeholder="Enter number of beds">
            @error('bed')
            <p class="text-danger inputerror">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Number of Baths</label>
            <input type="tel" name="bath" class="form-control border border-2 p-2" value="{{ old('bath') }}" placeholder="Enter number of baths">
            @error('bath')
            <p class="text-danger inputerror">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Sqft</label>
            <input type="tel" name="sqft" class="form-control border border-2 p-2" value="{{ old('sqft') }}" placeholder="Enter property size">
            @error('sqft')
            <p class="text-danger inputerror">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-control border border-2 p-2">
                <option value="" disabled selected>Select your status</option>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
            @error('status')
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
