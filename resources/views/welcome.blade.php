<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif
<form action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <div style="margin-bottom: 1em;">
        <input type="file" name="photo" id="photo">
        @error('photo')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
