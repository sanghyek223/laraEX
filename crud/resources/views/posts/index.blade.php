<!DOCTYPE html><html>
<head>
    <title></title>
</head>
<body>
    <h1>게시판 목록</h1>

    <ul>
 
 @foreach($posts as $post)
     <li>{{ $post->title }}</li>
 @endforeach

</ul>
</body>
</html>