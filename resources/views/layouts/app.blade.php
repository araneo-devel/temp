<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Shopify Orders')</title>

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://nexaris3.prettifyweb.com/releases/3.4/nexaris.css">

    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f7fa;
        }
        .nexaris-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .nexaris-header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .nexaris-header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        .nexaris-content {
            margin-top: 20px;
        }
        .nexaris-card {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nexaris-footer {
            margin-top: 40px;
            text-align: center;
            color: #95a5a6;
        }
        .nexaris-card .nexaris-table {
            width: 100%;
        }
    </style>

    @yield('head')
</head>
<body>
<div class="nexaris-container">

    <div class="page-layout-header nexaris-header">
        <h1 class="page-layout-title">List of orders from Shopify</h1>
    </div>

    <main class="nexaris-content">

        <div class="nexaris-card">
            @yield('content')
        </div>
    </main>

    <footer class="nexaris-footer">
        <p>&copy; 2024 Xsaven</p>
    </footer>
</div>

<script src="https://nexaris.com/scripts/nexaris.min.js"></script>
@yield('scripts')
</body>
</html>
