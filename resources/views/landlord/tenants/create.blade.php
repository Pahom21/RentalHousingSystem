@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Add Tenant') }}
</h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="text-2xl font-bold mb-4">Add Tenant</h3>
                <form action="{{ route('landlord.tenants.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" required :value="old('name')" required autofocus />
                            <x-input-error for="name" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="id_number" :value="__('Id Number/Passport')" />
                            <x-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" :value="old('id_number')" required autofocus />
                            <x-input-error for="id_number" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            <x-input-error for="email" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" autofocus />
                            <x-input-error for="password" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" autofocus />
                            <x-input-error for="password_confirmation" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="phone_number" :value="__('Phone Number')" />
                            <x-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required autofocus />
                            <x-input-error for="phone_number" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="property_id" :value="__('Property')" />
                            <x-select name="property_id" id="property_id" :options="$properties" fieldName="name" idField="id" class="block mt-1 w-full">
                            </x-select>
                            <x-input-error for="property_id" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="room_id" :value="__('Room')" />
                            <x-select name="room_id" id="room_id" class="block mt-1 w-full" :options="$rooms" fieldName="room_number" idField="id" />
                            <x-input-error for="room_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="lease_start" :value="__('Start of Lease')" />
                            <x-input id="lease_start" class="block mt-1 w-full" type="date" name="lease_start" :value="old('lease_start')" required autofocus />
                            <x-input-error for="lease_start" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="lease_end" :value="__('End Of Lease')" />
                            <x-input id="lease_end" class="block mt-1 w-full" type="date" name="lease_end" :value="old('lease_end')" required autofocus />
                            <x-input-error for="lease_end" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Add Tenant') }}
                            </x-button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection