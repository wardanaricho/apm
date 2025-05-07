<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'APM')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Fira Mono', monospace;
            background-color: #f8f9fa;
            color: #343a40;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
        }

        button.btn {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button.btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        h2,
        h4 {
            color: #212529;
        }

        .menu-card {
            padding: 2rem;
            border-radius: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            height: 100%;
            transition: transform 0.2s, background-color 0.2s;
            color: white;
        }

        .menu-card:hover {
            transform: scale(1.03);
            filter: brightness(1.05);
        }

        .menu-label {
            margin-top: 1rem;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .bright-blue {
            background-color: #1e88e5;
        }

        .bright-red {
            background-color: #e53935;
        }

        .bright-orange {
            background-color: #fb8c00;
        }

        .bright-green {
            background-color: #43a047;
        }

        .bright-purple {
            background-color: #8e24aa;
        }

        .bright-yellow {
            background-color: #fdd835;
            color: #000;
        }

        .bright-cyan {
            background-color: #00acc1;
        }
    </style>

    @livewireStyles
</head>

<body>
    <main class="container py-5 flex-grow-1">
        @yield('content') <!-- Konten halaman akan di-render di sini -->
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>

</html>
