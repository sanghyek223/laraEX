<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Profile_img -->
            <div>
                <x-label for="profile_img" :value="__('Profile_img')"/>

                <x-input
                    id="profile_img"
                    class="block mt-1 w-full"
                    type="file"
                    name="profile_img"
                    accept="image/*"
                    autofocus="autofocus"/>
            </div>

            <!-- Phone -->
            <div>
                <x-label for="u_phone" :value="__('Phone')"/>

                <x-input
                    id="u_phone"
                    class="block mt-1 w-full"
                    type="text"
                    name="u_phone"
                    required="required"
                    autofocus="autofocus"/>
            </div>
            <!-- Name -->
            <div>
                <x-label for="u_name" :value="__('Name')"/>

                <x-input
                    id="u_name"
                    class="block mt-1 w-full"
                    type="text"
                    name="u_name"
                    required="required"/>
            </div>

            <!-- Name -->
            <div>
                <x-label for="u_nick" :value="__('Nick')"/>

                <x-input
                    id="u_nick"
                    class="block mt-1 w-full"
                    type="text"
                    name="u_nick"
                    required="required"/>
            </div>

            <!-- email -->
            <div>
                <x-label for="email" :value="__('email')"/>

                <x-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    required="required"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
