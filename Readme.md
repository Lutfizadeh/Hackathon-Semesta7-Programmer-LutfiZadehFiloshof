Deskripsi singkat aplikasi & Teknologi yang digunakan:
- Aplikasi manajemen keluhan penghuni apartemen pintar
- Dilengkapi dengan grafik, setting user dan role
- Tech stack
  - Filament v3.3
  - Shield
  - Spatie

Cara instalasi & menjalankan aplikasi secara lokal
- Jalankan:
- ```composer install```
- ```php artisan migrate --seed```
- ```php artisan shield:install admin```
- ```php artisan shield:super-admin```
- Pilih user yang mau dijadikan admin (saya sarankan pilih 0)

Sample data / kredensial login (jika ada)
Masukkan email (pilih salah satu)
- admin@gmail.com
- electrician@gmail.com
- janitor@gmail.com
- plumber@gmail.com
- security@gmail.com
- supervisor@gmail.com
- visitor@gmail.com
- Semua user memiliki password: password

Dokumentasi fitur frontend
- Bisa mengolah data report, user dan roles (untuk admin)


Cara menjalankan testing + coverage (unit/service test)
- Login ke http://127.0.0.1:8000/admin dan masukkan kredensial di atas
- Buat report (bisa upload image)


Mohon maaf hasilnya kurang baik.
Fitur data analyzing, PDF reporting, dan blasting chat ke Telegram belum ada.
Tetapi, saya sudah pernah membuat sistem AI serupa (sistem rekomendasi prodi di kampus) dengan Vanilla JavaScript, barangkali bisa menjadi pertimbangan.
Berikut saya lampirkan link repository GitHub sistem rekomendasi prodi yang pernah kami buat: https://github.com/Lutfizadeh/vanillajs-major-recommendation.
