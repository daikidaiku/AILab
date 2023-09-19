<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        @foreach($data as $eachdata)
        <p>{{$eachdata["title"]}}</p>
        @endforeach
    </body>
</html>
