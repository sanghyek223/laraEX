<script
    src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script
    type="text/javascript"
    src="//dapi.kakao.com/v2/maps/sdk.js?appkey=48b12a75f26c73faa8806b6931ff1c25&libraries=services"></script>
<!-- Scripts -->
<script src="{{ mix('js/mypage/inspector_register.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>

가입
<input type="button" onclick="test()" value="test">
<input type="button" onclick="Postcode()" value="우편번호 찾기">
<div
    id="wrap"
    style="display:none;border:1px solid;width:500px;height:300px;margin:5px 0;position:relative"></div>
<input type="button" value="좌표" onclick="y_x_location()">
