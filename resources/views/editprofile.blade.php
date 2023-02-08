<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-center">{{ __('Edit Profile') }}</h3>
                </div>
                <div class="container py-5">
                    <form action="{{route('profile_update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ url('/') . '/' . $data['user']->display_picture_link }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-5">
                                {{-- first name --}}
                                <div class="form-group row d-flex align-items-center">
                                    <label class="col-4" for="first_name">{{ __('First Name') }}</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="first_name"
                                            name="first_name" value="{{ $data['user']->first_name }}">
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="form-group row d-flex align-items-center mt-2">
                                    <label class="col-4" for="email">{{ __('Email') }}</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $data['user']->email }}">
                                    </div>
                                </div>

                                {{-- gender --}}
                                <div class="form-group row mt-2">
                                    <label class="col-4" for="gender">{{ __('Gender') }}</label>
                                    <div class="col-8">
                                        @foreach ($data['gender'] as $gender)
                                            <input type="radio" name="gender_id" value="{{ $gender->gender_id }}" {{($gender->gender_id == $data['user']->gender_id)? 'checked' : ''}}>
                                            <label for="gender_id" class="mr-3">{{ $gender->gender_desc }}</label>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- password --}}
                                <div class="form-group row d-flex align-items-center mt-2">
                                    <label class="col-4" for="password">{{ __('Password') }}</label>
                                    <div class="col-8">
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>

                            </div>
                            <div class="col-5">
                                <div class="form-group row d-flex align-items-center">
                                    <label class="col-4" for="last_name">{{ __('Last Name') }}</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            value="{{ $data['user']->last_name }}">
                                    </div>
                                </div>

                                @if (strtolower(Auth::user()->role->role_name) == 'admin')
                                    {{-- role --}}
                                    <div class="form-group row d-flex align-items-center mt-2">
                                        <label class="col-4" for="role">{{ __('Role') }}</label>
                                        <div class="col-8">
                                            <select name="role_id" class="custom-select" id="">
                                                @foreach ($data['roles'] as $role)
                                                    <option value="{{ $role->role_id }}"
                                                        {{ $role->role_id == $data['user']->role_id ? 'selected' : '' }}>
                                                        {{ $role->role_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                {{-- display picture --}}
                                <div class="form-group row d-flex align-items-center mt-2">
                                    <label class="col-4" for="display_picture">{{ __('Display Picture') }}</label>
                                    <div class="col-8">
                                        <input type="file" class="form-control" id="display_picture"
                                            name="display_picture">
                                    </div>
                                </div>

                                {{-- password_confirmation --}}
                                <div class="form-group row d-flex align-items-center mt-2">
                                    <label class="col-4"
                                        for="password_confirmation">{{ __('Password Confirmation') }}</label>
                                    <div class="col-8">
                                        <input type="password_confirmation" class="form-control"
                                            id="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary px-5">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
