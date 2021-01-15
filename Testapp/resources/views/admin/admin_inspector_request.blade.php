@extends('layouts.admin_layout')

@section('content')

<table class="responstable">

  <tr>
    <th>회원번호</th>
    <th>휴대폰번호</th>
    <th>이름</th>
    <th>신청일</th>
    <th>승인/반려</th>
  </tr>

  <tr>
    <td>123</td>
    <td>Steve</td>
    <td>Foo</td>
    <td>01/01/1978</td>
    <td>
        <input type="button" value="승인" onclick="confirm_suc();">
        <input type="button" value="반려" onclick="confirm_fail();">
    </td>
  </tr>

</table>
<script>
    function confirm_suc() {
        alert('suc');
    }
    function confirm_fail() {
        alert('fail');
    }
</script>
@endsection
