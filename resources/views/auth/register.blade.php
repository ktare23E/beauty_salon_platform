<x-layout>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <section class="diagonal-bg  bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"> 
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <x-forms.form-heading>Create an Account</x-forms.form-heading>
                    <x-forms.form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <x-forms.input label="First Name" name="first_name"/>
                            </div>
                            <div>
                                <x-forms.input label="Last Name" name="last_name"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <x-forms.input class="-mt-[0.20rem]" label="Email" type="email" name="email"/>
                            </div>
                            <div>
                                <x-forms.select label="User Type" name="user_type">
                                    <option value="">Select User Type</option>
                                    <option value="user">Customer</option>
                                    <option value="business_admin">Business Admin</option>
                                </x-forms.select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="relative">
                                <x-forms.input label="Password" name="password" id="password" type="password" />
                                <span id="password_icon" class="password-icon material-symbols-outlined cursor-pointer text-sm absolute top-11 right-2">
                                    visibility
                                </span>
                            </div>
                            <div class="relative">
                                <x-forms.input label="Confirm Password" name="password_confirmation" id="password_confirmation" type="password" />
                                <span id="password_confirmation_icon" class="password-icon material-symbols-outlined cursor-pointer text-sm absolute top-11 right-2">
                                    visibility
                                </span>
                            </div>
                        </div>
                        <a href="{{route('login')}}" class="text-sm text-blue-600 mt-10">Login</a>

                        <x-forms.button>Create Account</x-forms.button>
                    </x-forms.form>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('#password_icon').click(()=>{
            let passwordInput = $('#password');
            if(passwordInput.attr('type') === 'password'){
                passwordInput.attr('type', 'text');
                $('#password_icon').text('visibility_off');
            }else{
                passwordInput.attr('type', 'password');
                $('#password_icon').text('visibility');
            }
        });
    </script>
</x-layout>