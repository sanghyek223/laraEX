<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>SMS 인증</h1>
        <form action="">
            <input type="submit" value="전송">
        </form>
        <input type="text" id="phone" name="phone">
        <input type="text" id="confirm_num" name="confirm_num">
        <div id="clockdiv"></div>
        <button onclick="evnent();">count</button>
        <style>
            #confirm_num {
                display: none;
            }
        </style>

        <script>

            function evnent() {
                ajax_call();
                count();
            }
            function ajax_call() {

                $.ajax({
                    //아래 headers에 반드시 token을 추가해줘야 한다.!!!!!
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: "{{ route('confirm') }}",
                    dataType: 'json',
                    data: {

                        phone: $('#phone').val()

                    },
                    success: function (data) {
                        console.log(data);
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
                            $('#confirm_num').css("display", "none");
                            $('#clockdiv').html("");
                        }
                    }
                    update_clock();
                    var timeinterval = setInterval(update_clock, 1000);
                }
                $('#confirm_num').css("display", "block");
                run_clock('clockdiv', deadline);
            }
        </script>
    </body>
</html>
