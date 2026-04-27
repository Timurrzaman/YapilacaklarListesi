# ✅ Akıllı Yapılacaklar Listesi (Smart To-Do List)

Bu uygulama, günlük görevlerinizi hızlıca planlamanız, takip etmeniz ve yönetmeniz için **Flutter** ve **Dart** kullanılarak geliştirilmiş, minimalist ve kullanıcı dostu bir mobil uygulamadır. "Temiz Kod" prensipleriyle geliştirilen bu proje, hem performans hem de şık bir arayüz (UI) sunar.

## ✨ Temel Özellikler

* **Görev Ekleme & Düzenleme:** Yeni yapılacaklar ekleme, başlık ve açıklama kısımlarını anlık güncelleme.
* **Tamamlama Durumu:** Görevleri "Tamamlandı" olarak işaretleme ve listenizi düzenli tutma.
* **Silme & Arşivleme:** Artık gerekmeyen görevleri kolayca listeden çıkarma.
* **Kalıcı Veri Saklama:** Uygulama kapansa bile görevlerinizin silinmemesi için cihaz hafızasına kayıt (SharedPreferences).
* **Karanlık Tema Desteği:** Göz yormayan modern "Dark Mode" arayüz seçeneği.

## 🛠️ Teknolojik Altyapı

* **Framework:** Flutter (Google'ın cross-platform SDK'sı).
* **Programlama Dili:** Dart.
* **State Management:** Provider (Veri yönetimi ve ekran güncellemeleri için).
* **Veri Depolama:** SharedPreferences (Hafif ve hızlı cihaz içi depolama).

## 📂 Proje Yapısı

```text
├── assets/             # Uygulama ikonları ve fontlar
├── lib/                # Ana kod dizini
│   ├── models/         # Görev (Task) veri modelleri
│   ├── screens/        # Liste ve ekleme ekranları
│   ├── providers/      # Veri yönetim katmanı
│   └── main.dart       # Uygulamanın giriş noktası
