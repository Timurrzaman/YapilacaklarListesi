<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f8fafc; text-align: center; color: #333; }
        .container { padding: 40px; background-color: white; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        h1 { font-size: 2em; margin-bottom: 0.5em; }
        p { color: #666; margin-bottom: 1.5em; }
        a { display: inline-block; margin: 10px; padding: 12px 24px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 8px; font-weight: bold; transition: background-color 0.3s ease; }
        a:hover { background-color: #2779bd; }
        a.register { background-color: #38c172; }
        a.register:hover { background-color: #2f9e5f; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Yapılacaklar Listesi Uygulamasına Hoş Geldiniz!</h1>
        <p>Devam etmek için lütfen giriş yapın veya yeni bir hesap oluşturun.</p>
        <div>
            <a href="{{ route('login') }}">Giriş Yap</a>
            <a href="{{ route('register') }}" class="register">Kayıt Ol</a>
        </div>
    </div>
</body>
</html>

