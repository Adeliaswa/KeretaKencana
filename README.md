
# 🚗 **KeretaKencana — Aplikasi Ojek Online Khusus Wanita** (Laravel Web App)

**KeretaKencana** adalah aplikasi web berbasis Laravel yang menyediakan layanan ojek online khusus untuk wanita. Aplikasi ini dirancang untuk memberikan rasa aman dan nyaman bagi pengguna wanita yang membutuhkan transportasi pribadi dengan pengemudi wanita. Pengguna dapat memesan ojek, melacak perjalanan, dan mengelola trip mereka secara mudah.

## **Fitur Utama ( ˃` ⩌ ´˂ )**

### 1. **Autentikasi Pengguna**

* Fitur **login** dan **registrasi** untuk pengguna dengan validasi form sebagai **admin** atau **penumpang**.
* Notifikasi sukses atau gagal untuk setiap operasi autentikasi.

### 2. **Profile**

* **Admin** dan **penumpang** dapat mengedit profil mereka melalui menu **Profile**.

### 3. **Logout**

* Admin dan penumpang dapat **logout** dari akun mereka melalui menu logout di aplikasi.

---

## **Untuk Penumpang**

### 1. **Dashboard Utama**

* Dashboard utama untuk penumpang berisi menu **Pesan Trip** dan **Riwayat Trip**.

  * **Pesan Trip**: Penumpang dapat memesan ojek untuk perjalanan mereka dengan memilih pengemudi wanita yang tersedia.
  * **Riwayat Trip**: Menampilkan riwayat pemesanan trip sebelumnya dan status dari setiap trip.

---

## **Untuk Admin**

### 1. **Dashboard Admin**

* Dashboard untuk admin berisi dua menu utama:

  * **Kelola Driver**: Menampilkan daftar pengemudi dan memungkinkan admin untuk mengedit, menghapus, atau menambah data driver baru.

    * **Edit Driver**: Fitur untuk mengedit data driver yang sudah ada, seperti informasi pribadi dan status driver.
    * **Tambah Driver**: Menyediakan form untuk menambah driver baru ke dalam daftar driver.

  * **Kelola Trip**: Admin dapat melihat daftar trip yang dipesan oleh penumpang melalui menu pesan trip, dan dapat mengelola status trip tersebut.

    * Admin dapat memperbarui status trip, menghapus trip, atau mengubah informasi terkait trip sesuai kebutuhan.

---

## **Teknologi & Arsitektur (ᵕ—ᴗ—)**

* **Laravel Framework** (MVC Architecture)
* **MySQL/MariaDB** (Relational Database)
* **Blade Template Engine** untuk tampilan antarmuka pengguna.
* **Tailwind CSS** untuk styling.
* **Vite** untuk build tools dan pengolahan aset frontend.

---

## **Instalasi & Setup ( ꩜ ᯅ ꩜;)⁭ ⁭**

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan aplikasi:

### 1. **Membuat Database di DBeaver**

Untuk membuat database di **DBeaver** (MySQL), ikuti langkah-langkah berikut:

1. **Install DBeaver**:

   * Jika Anda belum menginstal **DBeaver**, unduh dan install dari [situs resmi DBeaver](https://dbeaver.io/download/).

2. **Buat Koneksi ke MySQL**:

   * Buka DBeaver dan klik pada ikon **New Database Connection** di toolbar.
   * Pilih **MySQL** (atau **MariaDB**, tergantung pada jenis database yang digunakan) dan klik **Next**.
   * Masukkan detail koneksi database Anda (hostname, port, username, password, dll.). Untuk lokal, biasanya pengaturan seperti berikut:

     * **Host**: `127.0.0.1`
     * **Port**: `3306` (default untuk MySQL)
     * **Username**: `root` (atau username lainnya)
     * **Password**: (password MySQL Anda)

3. **Buat Database**:

   * Setelah berhasil terkoneksi, klik kanan pada koneksi MySQL Anda di panel kiri dan pilih **SQL Editor**.
   * Jalankan query berikut untuk membuat database **KeretaKencana**:

     ```sql
     CREATE DATABASE KeretaKencana;
     ```

4. **Verifikasi Database**:

   * Pastikan database **KeretaKencana** sudah muncul di panel kiri, di bawah koneksi yang telah dibuat.

### 2. **Konfigurasi Environment Laravel**

Setelah database siap, konfigurasikan aplikasi Laravel agar dapat terhubung ke database **KeretaKencana**:

1. **Duplikat File `.env.example` menjadi `.env`**:

   ```bash
   cp .env.example .env
   ```

2. **Edit File `.env`**:

   * Buka file `.env` dan sesuaikan pengaturan database sebagai berikut:

     ```env
     DB_CONNECTION=mysql
     DB_HOST=
     DB_PORT=
     DB_DATABASE=keretakencana
     DB_USERNAME=
     DB_PASSWORD=
     ```

3. **Generate Application Key**:

   ```bash
   php artisan key:generate
   ```

4. **Migrasi Database**:

   * Jalankan migrasi untuk membuat struktur tabel yang diperlukan di database:

     ```bash
     php artisan migrate:fresh
     ```

### 3. **Instalasi Dependencies**

1. **Install Dependensi PHP**:

   ```bash
   composer install
   ```

2. **Install Dependensi JavaScript**:

   ```bash
   npm install && npm run build
   ```

### 4. **Jalankan Aplikasi**

Setelah semua pengaturan selesai, jalankan aplikasi Laravel di server lokal Anda:

```bash
php artisan serve
```

Aplikasi dapat diakses melalui [http://127.0.0.1:8000/](http://127.0.0.1:8000/).

---

## **Fitur Pengembangan ᕙ(  •̀ ᗜ •́  )ᕗ**

* Penggunaan **pola MVC** untuk struktur kode yang rapi dan terorganisir.
* **Blade templating** untuk antarmuka pengguna yang modular.
* **Tailwind CSS** untuk desain responsif dan modern.
* Penggunaan **Vite** untuk pengelolaan aset frontend yang efisien.

## **Kontribusi ٩(ˊᗜˋ*)و**

Kontribusi sangat terbuka! Silakan ikuti langkah-langkah berikut untuk berkontribusi dalam proyek ini:

1. **Fork repository**: Fork repositori ini ke akun GitHub Anda.
2. **Buat branch baru**:

   ```bash
   git checkout -b fitur-pemesanan-ojek
   ```
3. **Buat perubahan**: Lakukan perubahan sesuai dengan fitur atau bug yang ingin Anda selesaikan.
4. **Commit perubahan**: Gunakan pesan commit yang sesuai dengan format **Conventional Commit**:

   ```bash
   git commit -m "feat(booking): tambah fitur pemesanan ojek"
   ```
5. **Push ke repository**:

   ```bash
   git push origin fitur-pemesanan-ojek
   ```
6. **Buat Pull Request**: Buat pull request di GitHub untuk menggabungkan perubahan ke branch utama.

### **Branching untuk Collaborative Work**

* Gunakan branch terpisah untuk setiap fitur atau perbaikan bug. Nama branch harus mengikuti konvensi:

  * `fitur/<nama-fitur>`
  * `bugfix/<nama-bug>`

### **Conventional Commit Message**

* Format pesan commit menggunakan format berikut:

  * `feat`: untuk penambahan fitur baru.
  * `fix`: untuk perbaikan bug.
  * `docs`: untuk perubahan dokumentasi.
  * `style`: untuk perubahan yang hanya mengubah styling (misal: format kode).
  * `refactor`: untuk perubahan kode yang tidak mempengaruhi fitur atau perbaikan bug.
  * `test`: untuk penambahan atau perubahan pengujian.

### **Pull Request & Merge**

* Setelah selesai membuat pull request, pastikan untuk memeriksa dan memastikan bahwa pull request memenuhi standar kualitas kode yang telah ditetapkan.
* Review pull request sebelum melakukan merge ke branch utama (`main`).

📩 **Kontak Developer**:

**ADELIA SWASTIKA DEWI**
* Instagram: [@d_do0lphin](instagram.com/d_do0lphin)
* Email: [adeliaswastikadewi@gmail.com](mailto:adeliaswastikadewi@gmail.com)
* LinkedIn: [linkedin.com/in/adeliaswastika](https://www.linkedin.com/in/adeliaswastika)
* GitHub: [github.com/Adeliaswa](https://github.com/Adeliaswa)

**DEVI ATIKA PUTRI**
* Instagram: [@de_phia02](instagram.com/de_phia02)
* Email: [viatika265@gmail.com](mailto:viatika265@gmail.com)
* LinkedIn: [linkedin.com/in/deviatika265](www.linkedin.com/in/deviatika265)
* GitHub: [github.com/viatika265](https://github.com/viatika265)

**NADHIFA FITRIYAH**
* Instagram: [@naadhfy](instagram.com/naadhfy)
* Email: [nadhifafitriyaah@gmail.com](mailto:nadhifafitriyaah@gmail.com)
* LinkedIn: [linkedin.com/in/nadhi-fa](www.linkedin.com/in/nadhi-fa)
* GiHub: [github.com/nadh-ifa](https://github.com/nadh-ifa)

📄 **Lisensi**:
Proyek ini dirilis dengan lisensi **Copyright © 2025 by Kelompok 5 PAW TI-A. (๑>؂•̀๑)**

---


