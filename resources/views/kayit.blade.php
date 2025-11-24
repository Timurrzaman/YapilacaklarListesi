<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Hesap Oluştur</h2>

        <!-- Hata Mesajları -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="kullanici_adi" class="block text-gray-700 text-sm font-bold mb-2">Kullanıcı Adı:</label>
                <input type="text" id="kullanici_adi" name="kullanici_adi" value="{{ old('kullanici_adi') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-posta:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Şifre:</label>
                <input type="password" id="password" name="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Şifre (Tekrar):</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="cinsiyet" class="block text-gray-700 text-sm font-bold mb-2">Cinsiyet:</label>
                <select id="cinsiyet" name="cinsiyet" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="erkek" {{ old('cinsiyet') == 'erkek' ? 'selected' : '' }}>Erkek</option>
                    <option value="kadin" {{ old('cinsiyet') == 'kadin' ? 'selected' : '' }}>Kadın</option>
                    <option value="diger" {{ old('cinsiyet') == 'diger' ? 'selected' : '' }}>Diğer</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="dogum_tarihi" class="block text-gray-700 text-sm font-bold mb-2">Doğum Tarihi:</label>
                <input type="date" id="dogum_tarihi" name="dogum_tarihi" value="{{ old('dogum_tarihi') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="ulke" class="block text-gray-700 text-sm font-bold mb-2">Ülke:</label>
                <input type="text" id="ulke" name="ulke" value="{{ old('ulke') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                    Kayıt Ol
                </button>
            </div>
        </form>
    </div>
</body>
</html>

