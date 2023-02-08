<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1>Register</h1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <!-- First Name -->
                    <div>
                        <x-label for="first_name" :value="__('First Name')" />

                        <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                            :value="old('first_name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required />
                    </div>

                    <!-- Gender -->
                    <div class="mt-4">
                        <x-label for="gender" :value="__('Gender')" />

                        {{-- radio button --}}
                        @foreach ($data['gender'] as $gender)
                            <input type="radio" name="gender_id" value="{{ $gender->gender_id }}">
                            <label for="gender_id" class="form-cehck-label m-1">{{ $gender->gender_desc }}</label>
                        @endforeach
                    </div>


                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>



                </div>
                <div class="col-6">
                    <!-- last Name -->
                    <div>
                        <x-label for="last_name" :value="__('Last Name')" />

                        <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                            :value="old('last_name')" required />
                    </div>

                    <!-- Role -->
                    <div class="mt-4">
                        <x-label for="role" :value="__('Role')" />

                        <select name="role_id" id="role" class="block mt-1 w-full">
                            @foreach ($data['roles'] as $role)
                                <option value="{{ $role->role_id }}" class="form-control">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Display Picture -->
                    <div class="mt-4">
                        <x-label for="display_picture" :value="__('Display Picture')" />

                        <x-input id="display_picture" class="block mt-1 w-full" type="file" name="display_picture" class="form-control"
                            :value="old('display_picture')" required />
                    </div>
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" 
                            name="password_confirmation" required />
                    </div>


                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
