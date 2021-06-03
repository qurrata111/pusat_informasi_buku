# Pusat Informasi Daftar Buku dan Penulis

* [Video Demo](https://drive.google.com/file/d/1Lo2SjT6h0jSs6o7eF5kaqTJKdtGKABuF/view?usp=sharing)
* [Api Documentation](API_Documentation.md)

## Tentang Projek
Pusat Informasi Daftar Buku dan Penulis merupakan aplikasi yang dapat digunakan untuk mengelola informasi di sebuah perpustakaan seperti informasi terkait buku dan penulis. Aplikasi ini dapat melakukan login untuk admin dan mengelola informasi terkait buku dan penulis. Pengguna yang berhasil login dapat melakukan pengelolaan informasi seperti melihat, menambahkan, mengedit, menghapus informasi terkait buku dan/atau penulis.

Aplikasi ini dibangun dengan framework Laravel. Informasi mengenai data pengguna, penulis, dan buku disimpan dalam sebuah basis data yang menggunakan PostgreSQL. 

## Rancangan Basis Data
Basis data yang digunakan dalam aplikasi ini adalah PostgreSQL. Terdapat 3 tabel penting di dalam basis data yaitu tabel `books`, `authors`, dan `authored_books`. Berikut ini Entity Relationship Diagram untuk basis data yang digunakan dalam aplikasi


![alt text](screenshots/erd.png "Entity Relationship Diagram") 

## Screenshot Aplikasi
![alt text](screenshots/01_login.png "Login")

![alt text](screenshots/02_login_success.png "Main Menu")

![alt text](screenshots/03_buku_read.png "Daftar Buku")

![alt text](screenshots/04_buku_create.png "Menambahkan Buku")

![alt text](screenshots/05_buku_edit.png "Mengedit Buku")

![alt text](screenshots/06_penulis_read.png "Daftar Penulis")

![alt text](screenshots/07_penulis_create.png "Menambahkan Penulis")

![alt text](screenshots/08_penulis_edit.png "Mengedit Penulis")

## Dependency
* axios 0.21
* laravel-mix 6.0.6
* lodash 4.17.19
* postcss 8.1.14