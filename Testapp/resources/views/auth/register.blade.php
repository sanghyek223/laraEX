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

            <!-- Nick Name -->
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

        <div id="clockdiv"></div>
        <input type="button" id="cofirm_num" onclick="evnent_call();" value="인증번호">
            <input type="button" id="sms_check" onclick="sms_check();" value="인증확인">
                <style>
                    #confirm_sms_cord,
                    #none_div,
                    #sms_check {
                        display: none;
                    }
                </style>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>

                    var confirm_sms_cord = '';
                    var u_phone_val = '';

                    function evnent_call() {

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'post',
                            url: "{{ route('register_confirm_num') }}",
                            dataType: 'json',
                            data: {

                                u_phone: $('#u_phone').val()

                            },
                            success: function (data) {
                                if (Object.values(data) == 500) {
                                    alert("가입된 회원입니다.");
                                } else {
                                    count();
                                    confirm_num_val();
                                    $('#sms_check').css("display", "block");
                                    confirm_sms_cord = data.confirm_num;
                                    u_phone_val = $('#u_phone').val();
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
                                    $('#cofirm_num').val('인증번호');
                                    $('#confirm_sms_cord').css("display", "none");
                                    $('#sms_check').css("display", "none");
                                    $('#clockdiv').html("");
                                }
                            }
                            update_clock();
                            var timeinterval = setInterval(update_clock, 1000);
                        }
                        $('#confirm_sms_cord').css("display", "block");
                        run_clock('clockdiv', deadline);
                    }

                    function confirm_num_val() {
                        $('#cofirm_num').val('재전송');
                    }

                    function sms_check() {
                        if (confirm_sms_cord == $('#sms_cord').val()) {
                            if (u_phone_val == $('#u_phone').val()) {
                                $('#confirm_sms_cord').css("display", "none");
                                $('#sms_check').css("display", "none");
                                $('#clockdiv').css("display", "none");
                                $('#u_phone').prop('readonly', true);
                                $('#cofirm_num').css("display", "none");
                                alert('인증되었습니다');
                            } else {
                                alert('휴대폰번호가 일치하지 않습니다');
                            }
                        } else {
                            alert('인증번호가 일치하지 않습니다');
                        }
                    }
                </script>
            </x-auth-card>
        </x-guest-layout>
