<x-layout>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <section class="diagonal-bg bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <x-forms.form-heading>Login</x-forms.form-heading>
                    <x-forms.form method="POST" action="{{ route('login.store') }}" enctype="multipart/form-data">
                        <div class="grid grid-cols-1">
                            <div>
                                <x-forms.input label="Email" type="email" name="email"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 mb-10">
                            <div class="relative">
                                <x-forms.input label="Password" name="password" id="password-input" type="password" />
                                <span class="password-icon material-symbols-outlined cursor-pointer text-sm absolute top-11 right-2">
                                    visibility
                                </span>
                            </div>
                        </div>
                        <a href="{{route('register.index')}}" class="text-sm text-blue-600 mt-10">Create an account</a>
                        <x-forms.button>Login</x-forms.button>
                    </x-forms.form>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('.password-icon').click(()=>{
            let passwordInput = $('#password-input');
            if(passwordInput.attr('type') === 'password'){
                passwordInput.attr('type', 'text');
                $('.password-icon').text('visibility_off');
            }else{
                passwordInput.attr('type', 'password');
                $('.password-icon').text('visibility');
            }
        });
    </script>
</x-layout>