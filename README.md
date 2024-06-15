# Proyek Baca Berita dengan Laravel

Ini adalah aplikasi baca berita yang dibangun dengan Laravel. Proyek ini mendukung tiga peran utama: User, Admin, dan Pengelola.

## Deskripsi Proyek

### Peran dan Hak Akses

1. *User*: 
    - Dapat melihat dan membaca berita.

2. *Admin*: 
    - Dapat melihat dashboard dengan statistik termasuk total postingan, total kategori, total pengguna, dan total klik.
    - Dapat menambahkan postingan baru.
    - Dapat menambahkan kategori baru.
    - Dapat menambahkan pengguna baru.

3. *Pengelola*: 
    - Dapat melihat dashboard dengan statistik termasuk total postingan, total kategori, total pengguna, dan total klik.
    - Dapat melihat statistik lebih rinci tetapi tidak bisa menambahkan postingan, kategori, atau pengguna.

## Instalasi

Ikuti langkah-langkah berikut untuk menyiapkan proyek:

1. *Clone repository*:
    bash
    git clone https://github.com/yourusername/your-repo.git
    cd your-repo
    

2. *Install dependencies*:
    bash
    composer install
    

3. *Copy file .env contoh dan atur variabel lingkungan*:
    bash
    cp .env.example .env
    

4. *Generate application key*:
    bash
    php artisan key:generate
    

5. *Atur database*:
    - Buka .env dan perbarui baris-baris berikut dengan informasi database Anda:
      env
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=nama_database
      DB_USERNAME=nama_pengguna
      DB_PASSWORD=katasandi
      

6. *Jalankan migrasi*:
    bash
    php artisan migrate
    

7. *Jalankan seeder*:
    bash
    php artisan db:seed --class=PostsTableSeeder
    

## Penggunaan

Setelah menyelesaikan langkah-langkah instalasi, Anda dapat memulai server pengembangan lokal:

```bash
php artisan serve
 ini masukin di readme md