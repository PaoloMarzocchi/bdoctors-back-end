<div class="container">
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __("Update your profile's information.") }}
    </p>
  </header>

  <form action="{{ route('admin.doctorProfile.update', $doctorProfile) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="mb-3">
      <label for="cv" class="form-label">Curriculum Vitae</label>
      <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" id="cv"
        aria-describedby="cvHelpId" placeholder="Your cv" value="" />
      <small id="cvHelpId" class="form-text text-muted">Choose your CV</small>
      @error('cv')
        <div class="text-danger py-2">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      {{-- @dd($doctorProfile->photo) --}}
      {{-- @if ($doctorProfile->photo)
                @if (Str::startsWith($doctorProfile->photo, 'https://'))
                    <img width="200" loading="lazy" src="{{ $doctorProfile->photo }}" alt="">
                @else
                    <img width="200" loading="lazy" src="{{ asset("storage/$doctorProfile->photo") }}"
                        alt="">
                @endif
            @endif

            <div> --}}
      <label for="photo" class="form-label">Photo</label>
      <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo"
        aria-describedby="photoHelpId" placeholder="Your Photo" value="" />
      <small id="photoHelpId" class="form-text text-muted">Choose your photo</small>
      @error('photo')
        <div class="text-danger py-2">{{ $message }}</div>
      @enderror

    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
        aria-describedby="addressHelpId" placeholder="Your Address"
        value="{{ old('address', $doctorProfile->address) }}" required />
      <small id="addressHelpId" class="form-text text-muted">Insert your business adress</small>
      @error('address')
        <div class="text-danger py-2">{{ $message }}</div>
      @enderror
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

    {{-- <div class="mb-3">
    <label for="services" class="form-label">Services</label>
    <input type="text" class="form-control @error('services') is-invalid @enderror" name="services" id="services"
        aria-describedby="servicesHelpId" placeholder="Your Services"
        value="{{ old('services', $doctorProfile->services) }}" />
    <small id="servicesHelpId" class="form-text text-muted">Choose a service</small>
    @error('services')
        <div class="text-danger py-2">{{ $message }}</div>
    @enderror
</div> --}}

    @if ($errors->any())
      <div class="mb-3">
        <div class="mb-2">Select your specializations</div>
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
          @foreach ($specializations as $specialization)
            <input name="specializations[]" type="checkbox" class="btn-check"
              id="specialization-{{ $specialization->id }}" autocomplete="off" value="{{ $specialization->id }}"
              {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }} />
            <label class="btn btn-outline-primary"
              for="specialization-{{ $specialization->id }}">{{ $specialization->name }}</label>
          @endforeach
        </div>
        @error('specializzations')
          <div class="text-danger py-2">{{ $message }}</div>
        @enderror
      </div>
    @else
      <div class="mb-3 py-3 border-top">
        <div class="mb-2">Select your specializations</div>

        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
          @foreach ($specializations as $specialization)
            <input name="specializations[]" type="checkbox" class="btn-check"
              id="specialization-{{ $specialization->id }}" autocomplete="off" value="{{ $specialization->id }}"
              {{ $doctorProfile->specializations->contains($specialization->id) ? 'checked' : '' }} />
            <label class="btn btn-outline-primary"
              for="specialization-{{ $specialization->id }}">{{ $specialization->name }}</label>
          @endforeach
        </div>
      </div>
    @endif

    <div class="d-flex">
      <button type="submit" class="btn btn-primary">
        {{-- <i class="fa-solid fa-plus fa-lg fa-fw"></i> --}}
        {{-- <span class="px-1"> --}}
        Save
        {{-- </span> --}}
      </button>
    </div>


  </form>
</div>
