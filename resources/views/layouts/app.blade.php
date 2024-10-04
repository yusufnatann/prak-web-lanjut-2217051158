<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<title>@yield('title', 'Default Title')</title>
<link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.m
in.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Header and Footer */
header, footer {
    background-color: #28a745;
    color: white;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}

header h1 {
    font-size: 3rem;
    font-weight: bold;
}

footer {
    box-shadow: 0px -4px 12px rgba(0, 0, 0, 0.1);
}

/* Table Styling */
table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #28a745;
    border-radius: 10px;
    overflow: hidden;
}

thead {
    background-color: #28a745;
    color: white;
}

tbody tr {
    border-bottom: 2px solid #28a745;
    transition: background-color 0.3s ease;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

/* Buttons */
.btn-outline-success {
    color: #28a745;
    border-color: #28a745;
    transition: all 0.3s ease;
}

.btn-outline-success:hover {
    background-color: #28a745;
    color: white;
}

.btn-outline-danger {
    color: #dc3545;
    border-color: #dc3545;
    transition: all 0.3s ease;
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: white;
}

    </style>
</head>
<body>
    @yield('content')
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstr
ap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"><script>
</body>
</html>