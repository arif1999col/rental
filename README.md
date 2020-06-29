# Sistem Rentcar Sederhana
Aplikasi ini adalah tugas dari DSC (Developer student club) yang saya ikuti, ini adalah project pertama saya menggunakan laravel, mohon maaf apabila penulisan kode yang masih kurang efektif dan berantakan.

Fitur :
1. CRUD data master (mobil, brand, client)
2. Transaction (Peminjaman, pengembalian, denda)
3. Simple report


Requirement : 
1. Minimal PHP v 7.0.0
2. Laravel 5.5

# How to install :
Kurang lebih cara installnya sama seperti install project laravel pada umumnya, bagi yg belum tahu bisa ikuti cara2 seperti dibawah

1. Clone or download project di repository ini 
2. Ekstrak dan buka folder project tersbut
3. Pastikan anda sudah menginstall composer laku ketik perintah cmd "composer install" di folder tersebut
4. buat database, nama bebas terserah anda
5. Copy env.example, lalu ubah menjadi .env saja
6. Sesuaikan konfigurasi anda, untuk DB_DATABASE gunakan db yg anda buat tadi
7. Jalankan perintah cmd "php artisan key:generate" 
8. Lalu jalankan perintah cmd "php artisan migrate", untuk membuat table2 pada db tersebut
9. Setelah itu "php artisan serve"
10. untuk user demo saya buatkan form untuk register dengan cara menambahkan /register di url
11. setelah register silahkan login menggunakan akun anda dan menjalankan sistemnya
