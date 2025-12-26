<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('public/assets/vendors') }}/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('public/assets/vendors') }}/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('public/assets/vendors') }}/images/favicon-16x16.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors') }}/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors') }}/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/src') }}/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/src') }}/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors') }}/styles/style.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
