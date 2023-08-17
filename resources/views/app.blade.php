<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/owl.carousel.min.css">

    <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/owl.theme.default.min.css">

    <link href="{{ asset('frontEnd') }}/css/templatemo-pod-talk.css" rel="stylesheet">
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    <!-- As you can see, we will use vite with jsx syntax for React-->
    @inertiaHead
</head>

<body>
    @inertia
    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('frontEnd') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontEnd') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontEnd') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontEnd') }}/js/custom.js"></script>
</body>

</html>
