<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
<<<<<<< HEAD
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo" x-on:change="
=======
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
>>>>>>> master
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

<<<<<<< HEAD
            <x-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center" x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-secondary-button>
            @endif

            <x-input-error for="photo" class="mt-2" />
        </div>
=======
                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
>>>>>>> master
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
<<<<<<< HEAD
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autofocus autocomplete="name" />
=======
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
>>>>>>> master
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
<<<<<<< HEAD
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autofocus autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
            <p class="text-sm mt-2">
                {{ __('Your email address is unverified.') }}

                <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>

            @if ($this->verificationLinkSent)
            <p class="mt-2 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to your email address.') }}
            </p>
            @endif
=======
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
>>>>>>> master
            @endif
        </div>

        <!-- Phone Number -->
        <div class="col-span-6 sm:col-span-4">
<<<<<<< HEAD
            <x-label for="phone_number" :value="__('Phone Number')" />
            <x-input id="phone_number" type="tel" class="mt-1 block w-full" wire:model="state.phone_number" required autofocus autocomplete="phone_number" />
            <x-input-error for="phone_number" class="mt-2" />
        </div>

        @script
        <script>
            document.addEventListener('livewire:load', function() {
                var input = document.querySelector("#phone_number");
                var iti = window.intlTelInput(input, {
                    utilsScript: "{{ asset('node_modules/intl-tel-input/build/js/utils.js') }}",
                    initialCountry: "auto",
                    geoIpLookup: function(callback) {
                        fetch('https://ipinfo.io/json', {
                            cache: 'reload'
                        }).then(function(response) {
                            if (response.ok) {
                                return response.json();
                            }
                            throw new Error('Failed to load IP info');
                        }).then(function(ipjson) {
                            callback(ipjson.country);
                        }).catch(function() {
                            callback('us');
                        });
                    }
                });

                input.addEventListener('blur', function() {
                    var phoneNumber = iti.getNumber();
                    Livewire.emit('updatePhoneNumber', phoneNumber);
                });
            });

            Livewire.on('resetPhoneNumber', function(phoneNumber) {
                var input = document.querySelector("#phone_number");
                input.value = phoneNumber;
                var iti = window.intlTelInput(input);
                iti.setNumber(phoneNumber);
            });
        </script>
        @endscript
        <!-- Id Number / Passport-->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="id_number" :value=" __('Id Number/Passport')" />
            <x-input id="id_number" type="text" class="mt-1 block w-full" wire:model="state.id_number" required autofocus autocomplete="id_number" />
=======
            <x-label for="phone_number" value="{{ __('Phone Number') }}" />
            <x-input id="phone_number" type="tel" class="mt-1 block w-full" wire:model="state.phone_number" required autocomplete="phone_number" />
            <x-input-error for="phone_number" class="mt-2" />
        </div>

        <!-- Id Number / Passport-->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="id_number" value="{{ __('Id Number/Passport') }}" />
            <x-input id="id_number" type="text" class="mt-1 block w-full" wire:model="state.id_number" required autocomplete="id_number" />
>>>>>>> master
            <x-input-error for="id_number" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
<<<<<<< HEAD
        <x-action-message class="mr-3" on="saved">
=======
        <x-action-message class="me-3" on="saved">
>>>>>>> master
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
<<<<<<< HEAD
</x-form-section>
=======
</x-form-section>
>>>>>>> master
