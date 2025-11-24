<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoş Geldiniz!</title>
    <!-- 3 saniye sonra todolist sayfasına yönlendirme -->
    <meta http-equiv="refresh" content="3;url={{ route('todolist.index') }}">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
            color: #1a202c;
            margin: 0;
            overflow: hidden;
        }
        .container {
            text-align: center;
            animation: fadeIn 1s ease-out;
        }
        h1 {
            font-size: 2.5em;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }
        p {
            font-size: 1.5em;
            color: #4a5568;
            animation: slideUp 1s ease-out 0.5s;
            animation-fill-mode: backwards;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hoş geldin, {{ $kullanici_adi }}!</h1>
        <p>GÖREVLER SENİ BEKLER</p>
    </div>
</body>
</html>

