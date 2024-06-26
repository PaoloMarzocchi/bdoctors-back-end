@extends('layouts.admin')

@section('content')
  <section>

    <div class="edit_image_right positon-relative z-n1">
      <img src="/img/informations-right.png" alt="">
    </div>
    <div class="edit_image_left positon-relative z-n1">
      <img src="/img/informations-left.png" alt="">
    </div>

    <div class="my_container py-5">
      <div class="wrapper p-4 mb-4  shadow rounded-lg">
        <header class="d-flex justify-content-between align-items-center pb-4">
          <h2 class="text-lg font-medium text-gray-900 my_primary">
            {{ __("Doctor's Information") }}
          </h2>
        </header>

        <form id="editForm" action="{{ route('admin.doctorProfile.update', $doctorProfile) }}" method="post"
          enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="">
            <div class="mb-3">
              <label for="cv" class="form-label">Curriculum Vitae</label>
              <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" id="cv"
                aria-describedby="cvHelpId" placeholder="Your cv" value="" />
              <small id="cvHelpId" class="form-text text-muted">Choose your CV</small>
              @error('cv')
                <div class="text-danger py-2">{{ $message }}</div>
              @enderror
            </div>
            {{-- <iframe width="100px" height="100px" src="{{ '/storage/' . $doctorProfile->cv }}" frameborder="0"></iframe> --}}
            <object height="150" data="{{ 'http://127.0.0.1:8000/storage/' . $doctorProfile->cv }}"
              type=""></object>
          </div>

          <div class="">
            <div class="mb-3 flex-fill">
              <label for="photo" class="form-label">Photo</label>
              <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                id="photo" aria-describedby="photoHelpId" placeholder="Your Photo" value="" />
              <small id="photoHelpId" class="form-text text-muted">Choose your photo</small>
              @error('photo')
                <div class="text-danger py-2">{{ $message }}</div>
              @enderror
            </div>
            @if ($doctorProfile->photo)
              <div class="overflow-auto" style="height: 150px; width:300px">
                <object height="" width="300"
                  data="{{ 'http://127.0.0.1:8000/storage/' . $doctorProfile->photo }}" type=""></object>
              </div>
            @endif
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Address *</label>
            <div class="inputWrapper">
              <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                id="address" aria-describedby="addressHelpId" placeholder="Your Address"
                value="{{ old('address', $doctorProfile->address) }}" />
              <i class="fa-solid fa-circle-check d-none"></i>
              <i class="fa-solid fa-circle-exclamation d-none"></i>
              @error('address')
                <div class="text-danger py-2">{{ $message }}</div>
              @enderror
            </div>
            <small id="addressHelpId" class="form-text text-muted">Insert your business adress</small>
            <br>
            <small class="errorMessage text-danger"></small>
          </div>

          <div class="mb-3">
            <label for="telephone" class="form-label">Telephone</label>
            <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone"
              id="telephone" aria-describedby="telephoneHelpId" placeholder="Your Telephone"
              value="{{ old('telephone', $doctorProfile->telephone) }}" />
            <small id="telephoneHelpId" class="form-text text-muted">Insert telephone number</small>
            @error('telephone')
              <div class="text-danger py-2">{{ $message }}</div>
            @enderror
          </div>


          <div class="mb-3">
            <label for="services" class="form-label">Services</label>
            <textarea class="form-control rounded-end-0 h-100 @error('services') is-invalid @enderror" name="services"
              id="services" aria-describedby="servicesHelpId" placeholder="Your Services" value="" rows="6">{{ old('services', $doctorProfile->services) }}</textarea>
            <small id="servicesHelpId" class="form-text text-muted">
              Insert the service you provide
            </small>
            @error('services')
              <div class="text-danger py-2">{{ $message }}

              </div>
            @enderror
          </div>


          @if ($errors->any())
            <div class="col-md-12">
              <label for="specializations[]" class="col-form-label mb-2">
                {{ __('Choose your specializations *') }}
              </label>


              <div class="specialization_wrapper d-flex rounded flex-wrap gap-2"
                @error('technologies') is-invalid @enderror">

                @foreach ($specializations as $specialization)
                  <input name="specializations[]" type="checkbox" class="btn-check"
                    id="specialization-{{ $specialization->id }}" autocomplete="off"
                    value="{{ $specialization->id }}"
                    {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }} />

                  <label class="specialization_label" for="specialization-{{ $specialization->id }}">
                    <i class=" me-2 fa-solid text-warning {{ $specialization->icon }}"></i>
                    <span>{{ $specialization->name }}</span>
                  </label>
                @endforeach
              </div>
              <small class="specialization_error_message text-danger "></small>


              @error('specializations')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror


            </div>
          @else
            <div class="col-md-12">
              <label for="specializations[]" class="col-form-label mb-2">
                {{ __('Choose your specializations *') }}
              </label>


              <div class="specialization_wrapper d-flex rounded flex-wrap gap-2"
                @error('technologies') is-invalid @enderror">

                @foreach ($specializations as $specialization)
                  <input name="specializations[]" type="checkbox" class="btn-check"
                    id="specialization-{{ $specialization->id }}" autocomplete="off"
                    value="{{ $specialization->id }}"
                    {{ $doctorProfile->specializations->contains($specialization->id) ? 'checked' : '' }} />

                  <label class="specialization_label" for="specialization-{{ $specialization->id }}">
                    <i class=" me-2 fa-solid text-warning {{ $specialization->icon }}"></i>
                    <span>{{ $specialization->name }}</span>
                  </label>
                @endforeach
              </div>
              <small class="specialization_error_message text-danger "></small>

            </div>
          @endif

          <div class="col-md-12 my-5 row text-danger">
            <p>
              ( <span class="text-dark">*</span> ) Required fields.
            </p>
          </div>

          <div class="d-flex">
            <button type="submit" class="btn my_primary btn-secondary fw-bold shadow">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
  @vite(['resources/js/validationEdit.js'])
@endsection
