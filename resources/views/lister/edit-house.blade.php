@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="pt-6">
        <nav aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('houses.index') }}" class="mr-2 text-sm font-medium text-gray-900">Houses</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>
                <li class="text-sm">
                    <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{ $house->location }}</a>
                </li>
            </ol>
        </nav>

        <!-- Image gallery -->
        <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
            @foreach ($house->images as $image)
                <div class="aspect-h-4 aspect-w-3 overflow-hidden rounded-lg relative">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="House image" class="h-full w-full object-cover object-center">
                    <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-700 focus:outline-none" onclick="deleteImage({{ $image->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>

        <!-- House info -->
        <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $house->location }}</h1>
                <p class="mt-2 text-lg text-gray-900">${{ $house->price }}</p>
            </div>

            <!-- Edit form -->
            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <h2 class="sr-only">House information</h2>

                <form action="{{ route('houses.update', $house->id) }}" method="POST" enctype="multipart/form-data" class="mt-10">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Category -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="category" :value="__('Category')" />
                            <x-select id="category" name="category" class="mt-1 block w-full" :value="$house->category_id" :options="$categories" fieldName="name" idField="id" />
                            <x-input-error for="category" class="mt-2" />
                        </div>

                        <!-- Location -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="location" :value="__('Location')" />
                            <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="$house->location" required autofocus />
                            <x-input-error for="location" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="price" :value="__('Price')" />
                            <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="$house->price" required autofocus />
                            <x-input-error for="price" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-textarea id="description" class="block mt-1 w-full" name="description" rows="4" :value="$house->description" required autofocus></x-textarea>
                            <x-input-error for="description" class="mt-2" />
                        </div>

                        <!-- Amenities -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="amenities" :value="__('Amenities')" />
                            <x-textarea id="amenities" class="block mt-1 w-full" name="amenities" rows="4" :value="$house->amenities" required autofocus></x-textarea>
                            <x-input-error for="amenities" class="mt-2" />
                        </div>

                        <!-- Contact -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="contact" :value="__('Contact')" />
                            <x-input id="contact" class="block mt-1 w-full" type="tel" name="contact" :value="$house->phone_number" required autofocus />
                            <x-input-error for="contact" class="mt-2" />
                        </div>

                        <!-- Rules and Regulations -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="rules_and_regulations" :value="__('Rules And Regulations')" />
                            <x-textarea id="rules_and_regulations" class="block mt-1 w-full" name="rules_and_regulations" rows="4" :value="$house->rules_and_regulations" required autofocus></x-textarea>
                            <x-input-error for="rules_and_regulations" class="mt-2" />
                        </div>

                        <!-- Main Image -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="main_image" :value="__('Main Image')" />
                            <x-input id="main_image" class="block mt-1 w-full" type="file" name="main_image" required autofocus />
                            <x-input-error for="main_image" class="mt-2" />
                        </div>

                        <!-- Additional Images -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="images" :value="__('Upload Additional House Images')" />
                            <small class="form-text text-muted">Please select and upload other images of the house to provide a comprehensive view.</small>
                            <x-input id="images" class="block mt-1 w-full" type="file" name="images[]" multiple autofocus />
                            <x-input-error for="images" class="mt-2" />
                        </div>

                        <!-- Availability -->
                        <div class="col-span-6 sm:col-span-4 mt-6">
                            <x-label for="availability" :value="__('Availability')" />
                            <x-radio-button-group name="availability" :options="['available' => 'Available', 'unavailable' => 'Unavailable', 'booked' => 'Booked']" selected="{{ old('availability') ?? $house->availability ?? '' }}" /> 
                            <x-input-error for="availability" class="mt-2" />
                        </div>

                    </div>

                    <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update House</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteImage(imageId) {
        // Implement the AJAX request to delete the image
        fetch(`/images/${imageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove the image element from the DOM
                document.querySelector(`button[onclick="deleteImage(${imageId})"]`).parentElement.remove();
            }
        })
        .catch(error => {
            console.error('Error deleting image:', error);
        });
    }
</script>
@endsection