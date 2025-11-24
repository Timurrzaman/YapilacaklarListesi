<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yapılacaklar Listesi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10 p-5">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl mx-auto">

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Yapılacaklar Listen</h1>
                    <p class="text-gray-600">Hoş geldin, {{ Auth::user()->kullanici_adi }}!</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition">
                        Çıkış Yap
                    </button>
                </form>
            </div>

            <form action="{{ route('todolist.store') }}" method="POST" class="mb-6">
                @csrf
                <div class="flex flex-col sm:flex-row gap-3">
                    <input type="text" name="task_title" placeholder="Yeni bir görev ekle..." required class="flex-grow shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <input type="datetime-local" name="due_at" title="Alarm kurmak için bir zaman seçin" class="shadow appearance-none border rounded w-full sm:w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">Ekle</button>
                </div>
            </form>

            <div>
                <h2 class="text-xl font-semibold text-gray-700 mb-3">Görevlerin</h2>
                <ul class="space-y-3">
                    @forelse ($tasks as $task)
                        <li class="flex justify-between items-center bg-gray-50 p-3 rounded-lg shadow-sm">
                            <div class="flex flex-col">
                                <span class="text-gray-800">{{ $task->title }}</span>
                                @if($task->due_at)
                                    <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($task->due_at)->format('d/m/Y H:i') }}</span>
                                @endif
                            </div>
                            <!-- YENİ: Silme Formu -->
                            <form action="{{ route('todolist.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-semibold transition">Sil</button>
                            </form>
                        </li>
                    @empty
                        <li class="text-gray-500">Henüz hiç görevin yok.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Bildirim ve alarm kodları burada yer alıyor, bu kısımda bir değişiklik yok.
        document.addEventListener('DOMContentLoaded', function () {
            function requestNotificationPermission() {
                if (!('Notification' in window)) { return; }
                if (Notification.permission !== 'denied') {
                    Notification.requestPermission();
                }
            }
            requestNotificationPermission();

            const alarmSound = new Audio('https://www.soundjay.com/buttons/sounds/beep-07a.mp3');
            let tasksWithAlarms = @json($tasks->whereNotNull('due_at')->values()).map(task => ({ ...task, notification_sent: false }));

            function checkAlarms() {
                const now = new Date();
                tasksWithAlarms.forEach(task => {
                    if (task.notification_sent) return;
                    const dueTime = new Date(task.due_at);
                    if (now >= dueTime) {
                        showNotification(task.title);
                        task.notification_sent = true;
                    }
                });
            }

            function showNotification(taskTitle) {
                if (Notification.permission !== 'granted') return;
                const notification = new Notification('Yapılacaklar Listesi Hatırlatıcısı', {
                    body: `'${taskTitle}' görevinin zamanı geldi!`,
                    icon: 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png'
                });
                alarmSound.play().catch(e => console.error("Alarm sesi çalınamadı:", e));
            }
            setInterval(checkAlarms, 5000);
        });
    </script>
</body>
</html>

