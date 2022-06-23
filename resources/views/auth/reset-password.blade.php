<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form id="formResetPasword">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="sec_pass" :value="__('Secret Password')" />

                <x-input id="sec_pass" class="block mt-1 w-full" type="text" name="sec_pass" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="new_password" :value="__('New Password')" />

                <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                // alert("ready");
            });

            $('#formResetPasword').on('submit', function(e){
                e.preventDefault();

                let param = {
                    _url : '{{ route("password.reset") }}',
                    _type : 'POST',
                    _data : new FormData(this),
                    _success : function(data, textStatus, jQxhr){
                        if(data.status){
                            alert("Success" , data);
                            //trigger logout
                            $('#logoutBtn').click();
                        }else{
                            alert("Failed");
                        }
                    },
                    _error : function(jqXhr, textStatus, errorThrown){
                        console.log( errorThrown );
                        console.log( textStatus );
                        console.log( jqXhr );
            
                        // $('#error').html(jqXhr.responseJSON.error);
                    }
                };
                Ajax.sendAjax(param);
            });
        </script>
    </x-slot>
</x-app-layout>

