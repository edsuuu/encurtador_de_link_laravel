<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
</head>
<body>
<script>
    navigator.geolocation.getCurrentPosition(function (position) {

        console.info(position.coords.latitude,);
        console.info(position.coords.longitude);

    });
</script>
</body>
</html>
