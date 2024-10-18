# Sistem Informasi Manajemen Siswa

Proyek ini adalah sebuah sistem informasi untuk manajemen data siswa, pembayaran SPP, pembayaran alat, dan pelaporan siswa di sebuah institusi pendidikan. Sistem ini dibangun untuk membantu pengelolaan data secara efisien dengan fitur login, dashboard, dan berbagai laporan terkait siswa.

## Fitur Utama

- **Manajemen Siswa:** Mengelola data siswa berdasarkan kelas (A1, A2, B1, B2, B3).
- **Pembayaran:** Pengelolaan pembayaran SPP, alat, dan tahunan dengan pembagian per kelas.
- **Laporan Pembayaran:** Melihat dan mencetak laporan pembayaran yang dilakukan siswa.
- **Dashboard Admin:** Tampilan ringkasan yang memudahkan untuk mengelola sistem.
- **Dokumentasi dan Bantuan:** File bantuan dan tutorial terkait penggunaan sistem.

## Struktur Direktori

- **assets/**: Berkas aset statis seperti gambar, CSS, dan JavaScript.
- **dashboard/**: Halaman dashboard untuk administrator.
- **doc/**: Dokumentasi terkait proyek.
- **helper/**: Kumpulan fungsi dan utilitas untuk memudahkan pengembangan.
- **laporan_bayar/**: Berkas terkait laporan pembayaran siswa.
- **laporan_siswa/**: Berkas terkait laporan data siswa.
- **layout/**: Template layout sistem.
- **makefont/**: Generator font untuk PDF laporan.
- **pembayaran_alat_a1/** - **pembayaran_tahun_b3/**: Direktori untuk mengelola data pembayaran berdasarkan kelas dan jenis pembayaran.
- **siswa/** - **siswa_b3/**: Berkas terkait data siswa berdasarkan kelas.
- **vendor/**: Dependensi eksternal proyek.
- **login.php**: Halaman login untuk sistem.
- **logout.php**: Halaman logout dari sistem.
- **index.php**: Halaman utama dari sistem.

## Instalasi

1. Clone repository ini ke komputer Anda:
   ```bash
   git clone https://github.com/SeptianSamdany/sistem-informasi-manajemen-siswa.git
