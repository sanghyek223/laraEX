<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="">
            @csrf

            <!-- Phone -->
            <div>
                <x-label for="u_phone" :value="__('Phone')"/>

                <x-input
                    id="u_phone"
                    class="block mt-1 w-full"
                    type="text"
                    name="u_phone"
                    :value="old('u_phone')"
                    required="required"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                    autofocus="autofocus"/>

            </div>

            <!-- sms_confirm -->
            <div class="mt-4" id="confirm_sms_cord">
                <x-label for="sms_cord" :value="__('인증번호')"/>

                <x-input
                    id="sms_cord"
                    class="block mt-1 w-full"
                    type="text"
                    name="sms_cord"
                    required="required"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                    autocomplete="current-password"/>
            </div>

            <!-- Password -->
            <div class="mt-4" id="none_div">
                <x-label for="password" :value="__('Password')"/>

                <x-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required="required"
                    autocomplete="current-password"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <x-button class="ml-3">
                        {{ __('Login') }}
                    </x-button>
                </div>
            </form>
            <div id="clockdiv"></div>
            <button onclick="evnent_call();">count</button>
            <style>
                #confirm_sms_cord,#none_div {
                    display: none;
                }
            </style>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script type="text/javascript">

                $(document).ready(function () {

                    $("#sms_cord").keyup(function () {

                        $("#password").val($("#sms_cord").val());

                    });

                });

                function evnent_call() {

                    $.ajax({
                        //아래 headers에 반드시 token을 추가해줘야 한다.!!!!!
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        url: "{{ route('confirm') }}",
                        dataType: 'json',
                        data: {

                            u_phone: $('#u_phone').val()

                        },
                        success: function (data) {
                            if (Object.values(data) == 500) {
                                alert("가입된 회원이 아닙니다.");
                            } else {
                                count();
                                console.log(data);
                            }
                        },
                        error: function (data) {
                            console.log("error" + data);
                        }
                    });

                }

                function count() {

                    // 3 minutes from now
                    var time_in_minutes = 3;
                    var current_time = Date.parse(new Date());
                    var deadline = new Date(current_time + time_in_minutes * 60 * 1000);

                    function time_remaining(endtime) {
                        var t = Date.parse(endtime) - Date.parse(new Date());
                        var seconds = Math.floor((t / 1000) % 60);
                        var minutes = Math.floor((t / 1000 / 60) % 60);
                        if (seconds < 10) {
                            seconds = "0" + seconds;
                        }
                        return {'total': t, 'minutes': minutes, 'seconds': seconds};
                    }
                    function run_clock(id, endtime) {
                        var clock = document.getElementById(id);
                        function update_clock() {
                            var t = time_remaining(endtime);
                            clock.innerHTML = "[ " + t.minutes + ':' + t.seconds + " ]";
                            if (t.total <= 0) {
                                clearInterval(timeinterval);
                                $('#confirm_sms_cord').css("display", "none");
                                $('#clockdiv').html("");
                            }
                        }
                        update_clock();
                        var timeinterval = setInterval(update_clock, 1000);
                    }
                    $('#confirm_sms_cord').css("display", "block");
                    run_clock('clockdiv', deadline);
                }
            </script>
        </script>
    </x-auth-card>
</x-guest-layout>
