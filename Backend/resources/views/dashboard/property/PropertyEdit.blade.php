<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="properties"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Edit property'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('{{ $property->main_image ?? 'https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80' }}');">

                <span class=""></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ $property->owner[0]->profile_image }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>

                    
                    <div class="col-auto my-auto">
                        <div class="h-100">
                        <a href="{{ route('admins.edit', $property->owner[0]->id) }}">
                            <h5 class="mb-1">
                                {{ $property->owner[0]->name }} - <span class="mb-0 font-weight-normal text-sm">
                            {{ $property->owner[0]->role }}
                            </span>
                            </h5>
                            </a>
                            <p class="mb-0 font-weight-normal text-sm">
                            {{ $property->owner[0]->email }}
                            </p>
                            <p class="mb-0 font-weight-normal text-sm">
                            {{ $property->owner[0]->phone_number }}
                            </p>
                        </div>
                    </div>
                   
                </div>
                
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                    <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <p class="mb-3">{{ $property->owner[0]->about }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Property Details</h6>
                            </div>
                            <p>{{$property->created_at}}</p>
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
                        <form method='POST' action="{{ route('properties.update', $property->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                
                              
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control border border-2 p-2" value='{{ old('title', $property->title) }}'>
                                    @error('title')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">description</label>
                                    <input type="tel" name="description" class="form-control border border-2 p-2" value='{{ old('description', $property->description) }}'>
                                    @error('description')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Price</label>
                                    <input type="tel" name="price" class="form-control border border-2 p-2" value='{{ old('price', $property->price) }}'>
                                    @error('price')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                



                                <div class="mb-3 col-md-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-control border border-2 p-2">
        <option value="" disabled selected>Select your status</option>
        <option value="active" {{ old('status', $property->status) == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $property->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
        <option value="archived" {{ old('status', $property->status) == 'archived' ? 'selected' : '' }}>Archived</option>
    </select>

    @error('gender')
        <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Location</label>
                                    <input type="tel" name="location" class="form-control border border-2 p-2" value='{{ old('location', $property->location) }}'>
                                    @error('location')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Governorate</label>
                                    <select name="governorate" class="form-control border border-2 p-2">
    <option value="" disabled selected>Select your governorate</option>
    <option value="Amman" {{ old('governorate', $property->governorate) == 'Amman' ? 'selected' : '' }}>Amman</option>
    <option value="Zarqa" {{ old('governorate', $property->governorate) == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
    <option value="Irbid" {{ old('governorate', $property->governorate) == 'Irbid' ? 'selected' : '' }}>Irbid</option>
    <option value="Aqaba" {{ old('governorate', $property->governorate) == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
    <option value="Mafraq" {{ old('governorate', $property->governorate) == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
    <option value="Karak" {{ old('governorate', $property->governorate) == 'Karak' ? 'selected' : '' }}>Karak</option>
    <option value="Maan" {{ old('governorate', $property->governorate) == 'Maan' ? 'selected' : '' }}>Maan</option>
    <option value="Ajloun" {{ old('governorate', $property->governorate) == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
    <option value="Balqa" {{ old('governorate', $property->governorate) == 'Balqa' ? 'selected' : '' }}>Balqa</option>
    <option value="Jerash" {{ old('governorate', $property->governorate) == 'Jerash' ? 'selected' : '' }}>Jerash</option>
    <option value="Tafilah" {{ old('governorate', $property->governorate) == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
    <option value="Madaba" {{ old('governorate', $property->governorate) == 'Madaba' ? 'selected' : '' }}>Madaba</option>
</select>

                                    @error('location')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                              



                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Number of Beds</label>
                                    <input type="tel" name="bed" class="form-control border border-2 p-2" value='{{ old('bed', $property->bed) }}'>
                                    @error('bed')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>



                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Number of Baths</label>
                                    <input type="tel" name="bath" class="form-control border border-2 p-2" value='{{ old('bath', $property->bath) }}'>
                                    @error('bath')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                                
                                
                                <div class="mb-3 col-md-3">
    <label class="form-label">Features</label>
    <div class="dropdown border-2 p-2">
        <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="featuresDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Select Features
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="featuresDropdown">
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="features[]" value="0" id="0_living_room" {{ in_array('0', old('features', $property->features->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="0_living_room">
                        <i class="fa-solid fa-couch"></i> Living Room
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="features[]" value="1" id="1_kitchens" {{ in_array('1', old('features', $property->features->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="1_kitchens">
                        <i class="fa-solid fa-utensils"></i> Kitchen
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="features[]" value="2" id="2_free_medical" {{ in_array('2', old('features', $property->features->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="2_free_medical">
                        <i class="fa-solid fa-heartbeat"></i> Free Medical
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="features[]" value="3" id="3_fireplace" {{ in_array('3', old('features', $property->features->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="3_fireplace">
                        <i class="fa-solid fa-fire"></i> Fireplace
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="features[]" value="4" id="4_residential" {{ in_array('4', old('features', $property->features->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="4_residential">
                        <i class="fa-solid fa-house"></i> Residential
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="features[]" value="5" id="5_tv_cable" {{ in_array('5', old('features', $property->features->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="5_tv_cable">
                        <i class="fa-solid fa-tv"></i> TV Cable
                    </label>
                </div>
            </li>
        </ul>
    </div>
    @error('features')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3 col-md-3">
    <label class="form-label">Amenities</label>
    <div class="dropdown border-2 p-2">
        <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="amenitiesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Select Amenities
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="amenitiesDropdown">
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="amenities[]" value="0" id="0_internet" {{ in_array('0', old('amenities', $property->amenities->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="0_internet">
                        <i class="fas fa-wifi me-1"></i> Internet
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="amenities[]" value="1" id="1_pets_allow" {{ in_array('1', old('amenities', $property->amenities->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="1_pets_allow">
                        <i class="fas fa-paw me-1"></i> Pets Allow
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="amenities[]" value="2" id="2_spa_massage" {{ in_array('2', old('amenities', $property->amenities->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="2_spa_massage">
                        <i class="fas fa-spa me-1"></i> Spa & Massage
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="amenities[]" value="3" id="3_laundry_room" {{ in_array('3', old('amenities', $property->amenities->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="3_laundry_room">
                        <i class="fas fa-tshirt me-1"></i> Laundry Room
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="amenities[]" value="4" id="4_gym" {{ in_array('4', old('amenities', $property->amenities->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="4_gym">
                        <i class="fas fa-dumbbell me-1"></i> Gym
                    </label>
                </div>
            </li>
            <li>
                <div class="form-check ms-2">
                    <input class="form-check-input" type="checkbox" name="amenities[]" value="5" id="5_alarm" {{ in_array('5', old('amenities', $property->amenities->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="5_alarm">
                        <i class="fas fa-bell me-1"></i> Alarm
                    </label>
                </div>
            </li>
        </ul>
    </div>
    @error('amenities')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>


                               
                                <div class="mb-3 col-md-6">
    <label class="form-label">Property Image</label>
    <input type="file" name="property_images[]" class="form-control border border-2 p-2" 
           accept="image/*" multiple>
    @error('property_images')
        <p class="text-danger inputerror">{{ $message }}</p>
    @enderror
</div>


<div class="mb-3 col-md-6">
                                    <label class="form-label">Sqft</label>
                                    <input type="tel" name="sqft" class="form-control border border-2 p-2" value='{{ old('sqft', $property->sqft) }}'>
                                    @error('sqft')
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
