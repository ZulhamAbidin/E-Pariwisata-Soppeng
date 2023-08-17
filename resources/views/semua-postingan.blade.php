<!DOCTYPE html>
<html>

<head>
    <title>Semua Postingan</title>
</head>

<body>
    <h1>Semua Postingan</h1>

    <ul>
        @foreach($posts as $post)
        <li>{{ $post->judul }}</li>
        @endforeach
    </ul>
</body>

</html>