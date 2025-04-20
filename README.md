halo teman teman saya obed danny. Pada kesempatan kali ini saya akan membuat projek inventaris yang berkaitan dengan pemasok barang dan juga kategori barang menggunakan framework laravel dan di projek ini saya menggunakan docker untuk konfigurasi backend laravel seperti image php dan image composer dan konfigurasi image database MySQL. 

Saya mengerjakan soal : 1,2,3,4,5,7,9

PEMBERITAHUAN PENTING :
DI SINI SAYA MENGGUNAKAN AKUN GITHUB LAIN KHUSUS UJIAN AGAR TERHINDAR DARI ORANG/TEMAN YANG INGIN MELAKUKAN CLONE TERHADAP REPO INI

Saya akan menjelaskan langkah2 dari awal : 
1. Pertama saya membuat dulu projek laravel versi 12 dengan command : "composer create-project laravel/laravel:^12.0 uts-inventori"

2. Setelah itu pada root folder projek laravel saya tambahkan file Dockerfile dan docker-compose.yml. Dockerfile berisi konfigurasi untuk image php dan image composer yang nanti akan dibuild dan dipanggil di docker-compose.yml. Docker-compose.yml sendiri berisi 2 container 1 untuk container konfigurasi laravel app  dan 1 container lagi untuk konfigurasi database MySQL

3. Saya menyesuaikan enviroment projek laravel saya dengan enviroment 2 container yang ada docker-compose.yml supaya sinkron dan nantinya tidak terjadi masalah. Setelah setting semuanya selesai, saya menjalankan command docker-compose up -d --build (untuk build dockerfile) dan docker-compose up -d (untuk menjalankan docker-compose.yml) 

4. Langkah berikutnya saya membuat migrasi untuk 3 tabel supplier, item dan kategori dengan command : 
- php artisan make:migration create_categories_table
- php artisan make:migration create_suppliers_table
- php artisan make:migration create_items_table
Untuk migrasi admin nya saya menggunakan migrasi users bawaan laravel

5. Setelah membuat migrasi dan mengisinya dengan skema yang sesuai. Saya menjalankan command : "docker exec -it laravel_app bash"
Untuk masuk ke dalam container aplikasi laravel saya di docker. Setelah masuk jalan perintah "php artisan migrate" untuk menjalan migrasi yang sudah dibuat. 

6. Setelah migrasi jadi saya membuat model untuk admin(user) , supplier, kategori, dan item dan mengisi logika yang sesuai kebutuhan. Model ini berfungsi sebagai jembatan aplikas laraveli ke  database MySQL untuk menghubungkan tabel/skema yang ada di database. 

7. Setelah pembuatan model selesai saya membuat tampilan ui untuk halaman supplier, kategori dan item di folder uts-inventori > resources > views. Laravel sendiri menggunakan folder views untuk menyimpan tampilan front end dibuat. 

8. Saya melanjutkan dengan melakukan setting route untuk dengan tujuan menampilkan halaman/logika back end sesuai dengan url yang dituju. Pembuatan route ini dilakukan di folder uts-inventori > routes > web.php

9. Saya lanjut dengan membuat UserSeeder.php untuk membuat data dummy untuk admin/users

9. Lanjut saya melakukan pembuatan controller untuk menangani logika2 database yang dibutuhkan seperti CRUD kategori, item, dan supplier. 

10. Setelah semuanya jadi tinggal akses web laravel di 
http://localhost:8080 dan lakukan pengujian

11. Untuk jawaban soal 4,7,9 ada di halaman dashboard aplikasi laravel dengan http://localhost:8080/inventori