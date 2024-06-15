# IENEWS: Website Berita dengan Laravel
IENEWS adalah website berita yang dibangun dengan menggunakan Laravel. Proyek ini mendukung tiga peran utama, yaitu User, Admin, dan Pengelola dengan peran dan hak aksesnya masing-masing.

## Deskripsi Proyek
### Peran dan Hak Akses

1. *User*: 
    - Dapat melihat dan membaca berita.

2. *Admin*: 
    - Dapat melihat dashboard dan mengetahui total publish post, total draft post, total kategori, total post dilihat, total dan user.
    - Dapat menambahkan, mengedit, dan menghapus postingan.
    - Dapat menambahkan, mengedit, dan menghapus kategori.
    - Dapat menambahkan, mengedit, dan menghapus pengguna.

3. *Pengelola*: 
    - Dapat melihat dashboard dan mengetahui total postingan, total publish post, total draft post, total kategori, total post dilihat.
    - Dapat menambahkan, mengedit, dan menghapus kategori.
    - Dapat melihat data post lebih rinci tetapi tidak bisa menambahkan postingan.
    - Tidak dapat melihat, menambahkan, mengubah, dan menghapus data user.

## Instalasi

Ikuti langkah-langkah berikut untuk menyiapkan proyek:

1. *Clone repository*:
    bash
    git clone https://github.com/ilmanurr/uas-pemweb-lanjut.git
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
      DB_DATABASE=web_berita_db
      DB_USERNAME=
      DB_PASSWORD=
      

6. *Jalankan migrasi*:
    bash
    php artisan migrate
    

7. *Jalankan seeder*:
    bash
    php artisan db:seed
    

## Penggunaan

Setelah menyelesaikan langkah-langkah instalasi, Anda dapat memulai server pengembangan lokal:

```bash
php artisan serve
```

## Dokumentasi
# Auth
## Register
![Screenshot 2024-06-16 051353](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/e491edf7-9fd7-4d7b-9d79-1687037f577d)
## Login
![Screenshot 2024-06-16 051324](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/ed1f6af7-e960-45f8-be0b-b80aee641f89)

# Tampilan Depan
## Home
![Screenshot 2024-06-16 052652](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/efb3bdd3-363a-4186-bbc1-25d15b3a0cd9)
![Screenshot 2024-06-16 053747](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/e097af50-57b6-4723-87db-ea0eee4db8a2)
![Screenshot 2024-06-16 053913](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/8acedd7d-fbf9-4cc5-89d1-248d4353b927)
![Screenshot 2024-06-16 053947](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/3c0e74d4-2ea1-4134-8e86-2dae0ea2a039)
![Screenshot 2024-06-16 054015](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/d64ef6e9-cd56-40de-865a-5d9e184d92c3)
## Berita Berdasarkan Kategori
![Screenshot 2024-06-16 054240](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/eac85022-df03-4ed8-a29d-26880e6efdc5)
![Screenshot 2024-06-16 054317](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/effb8012-dbad-438a-9296-aa4f548b8c97)
## Semua Berita
![Screenshot 2024-06-16 054349](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/e03b9161-cc3f-47ec-a8e1-d50dd8947dc6)
![Screenshot 2024-06-16 054426](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/ce6377b3-523e-41ee-9486-df7707291a11)
![Screenshot 2024-06-16 054459](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/35d242a8-395c-451c-a497-08fd630ae00f)
## Search Berita
![Screenshot 2024-06-16 054555](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/e299d316-c31a-47e6-855e-289e63bf0076)
## Detail Berita
![Screenshot 2024-06-16 054712](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/70d9456a-3ff0-4278-bac4-f7d0d130c830)
![Screenshot 2024-06-16 054755](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/3ea30ae4-a625-456e-8837-73398ad57e1a)
## Contact Us
![Screenshot 2024-06-16 054830](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/199a0abf-214c-48ae-8728-6bbfbf5c5ff1)

# Admin
## Dashboard Admin
![Screenshot 2024-06-16 041607](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/aac05e1f-ebc5-46c0-9d4c-472db624914f)
## List Kategori
![Screenshot 2024-06-16 044458](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/536110ce-8301-4f16-9d7d-dd694c0eca6f)
## Create Kategori
![Screenshot 2024-06-16 044542](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/448df7a2-235e-464e-ab74-c721b4861093)
## Update Kategori
![Screenshot 2024-06-16 045913](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/b08c3b93-c866-4427-8cc8-b8d790321dea)
## Delete Kategori
![Screenshot 2024-06-16 050234](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/3db75709-dfc1-403a-bbea-78bcf3441d22)
## List Post
![Screenshot 2024-06-16 050320](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/4fb77107-45e8-4024-91d5-75b8ea5e2246)
## Create Post
![Screenshot 2024-06-16 050417](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/c8250d4a-538f-4e7e-b994-155901434b50)
![Screenshot 2024-06-16 050505](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/d5a8d599-1aa7-4c92-a9bc-20b980f10db1)
## Update Post
![Screenshot 2024-06-16 050652](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/ad65c180-de43-44f5-a7ff-616be95024bc)
![Screenshot 2024-06-16 050732](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/609619d2-0616-4fa9-bbb5-25113bc812b9)
## Delete Post
![Screenshot 2024-06-16 050818](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/ef362d6f-3e77-40d4-8511-d9d67992f845)
## Detail Post
![Screenshot 2024-06-16 050923](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/b278bf5d-f0c3-4e8a-b150-0f1f9343de76)
![Screenshot 2024-06-16 051004](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/306618f8-6092-433d-9827-c4cda5bc58a6)
## List User
![Screenshot 2024-06-16 051040](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/176a05f1-f85a-435a-984a-af4859292a24)
## Create User
![Screenshot 2024-06-16 051127](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/eee21f82-15d5-45f1-980a-a8917090c3c5)
## Update User
![Screenshot 2024-06-16 051203](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/9fec78b6-db3b-45fa-a8eb-e4718dbf2314)
## Delete User
![Screenshot 2024-06-16 051236](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/51bba95b-ac76-45c0-a231-f233a2675bbc)

# Pengelola
## Dashboard Pengelola
![Screenshot 2024-06-16 051444](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/d375a860-d4a1-46ad-9ab6-8b7a177968d5)
## List Kategori
![Screenshot 2024-06-16 051513](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/f6fa7bbd-a059-4d82-a9d8-35c8663c4578)
## Create Kategori
![Screenshot 2024-06-16 051710](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/e87d6e5d-f8dc-4688-beff-d724fc9b5238)

## Update Kategori
![Screenshot 2024-06-16 051743](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/3133e17a-0279-4c85-bfb5-e955e66d14b6)
## Delete Kategori
![Screenshot 2024-06-16 051815](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/b44028f8-8f82-4626-94cc-bb17706f9c9f)
## List Post
![Screenshot 2024-06-16 051855](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/ecce9b8e-57dd-4835-937a-b7be65abe783)
## Detail Post
![Screenshot 2024-06-16 051929](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/4b3dcbb8-c785-4db3-beff-35096b79f430)
![Screenshot 2024-06-16 052004](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/d910659f-1ae2-4c7d-9326-466ab8eaa158)

# Struktur Database
![Screenshot 2024-06-16 054956](https://github.com/ilmanurr/uas-pemweb-lanjut/assets/124539767/c420998f-4f90-495a-be10-9b39b3d4285b)
