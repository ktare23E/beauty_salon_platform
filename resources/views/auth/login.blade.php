<x-layout>
    <section class="diagonal-bg bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <x-forms.form-heading>Login</x-forms.form-heading>
                    <x-forms.form method="POST" action="{{ route('login.create') }}" enctype="multipart/form-data">
                        <div class="grid grid-cols-1">
                            <div>
                                <x-forms.input label="Email" type="email" name="email"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-1">
                            <div>
                                <x-forms.input label="Password" name="password" type="password" />
                            </div>
                        </div>
                        <x-forms.button>Login</x-forms.button>
                    </x-forms.form>
                </div>
            </div>
        </div>
      </section>
</x-layout>