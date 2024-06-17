<div class="container">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile's information.") }}
        </p>
    </header>

    @include('partials.validation-message')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

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
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                id="photo" aria-describedby="photoHelpId" placeholder="Your Photo" value="" />
            <small id="photoHelpId" class="form-text text-muted">Choose your photo</small>
            @error('photo')
                <div class="text-danger py-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                id="address" aria-describedby="addressHelpId" placeholder="Your Address"
                value="{{ old('address', $doctorProfile->address) }}" />
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
        @if ($errors->any())
            <div class="mb-3">
                <div class="mb-2">Select your specializations</div>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($specializations as $specialization)
                        <input name="specializations[]" type="checkbox" class="btn-check"
                            id="specialization-{{ $specialization->id }}" autocomplete="off"
                            value="{{ $specialization->id }}"
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
            <div class="mb-3 py-3">
                <div class="mb-2">Select your specializations</div>

                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($specializations as $specialization)
                        <input name="specializations[]" type="checkbox" class="btn-check"
                            id="specialization-{{ $specialization->id }}" autocomplete="off"
                            value="{{ $specialization->id }}"
                            {{ $doctorProfile->specializations->contains($specialization->id) ? 'checked' : '' }} />
                        <label class="btn btn-outline-warning text-dark my_overflow"
                            for="specialization-{{ $specialization->id }}">{{ $specialization->name }}</label>
                    @endforeach
                </div>
            </div>
        @endif
        <button type="submit" class="btn text-warning btn-dark fw-bold">
            Save
        </button>
    </form>
</div>
