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

        fetch("{{ route('redirect-person') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                latitude: position.coords.latitude,
                longitude: position.coords.longitude
            })
        }).then(() => {
            console.log("Successful")
            window.location.href = '{{ route('redi') }}';
        });
    }, function (error) {
        window.location.href = '{{ route('redi') }}';
    });
</script>
</body>
</html>
