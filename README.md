# Kalkulator Bil Elektrik (PHP Vanilla)

Projek ini adalah aplikasi web ringkas untuk mengira penggunaan kuasa, tenaga, dan jumlah kos elektrik berdasarkan input pengguna (Voltan, Arus, dan Kadar Tarif).

## Ciri-ciri Utama
* Mengira **Kuasa (Power)** dalam unit Watt-hour (Wh).
* Mengira **Tenaga (Energy)** dalam unit Kilowatt-hour (kWh).
* Mengira **Jumlah Bayaran** dalam Ringgit Malaysia (RM).
* Paparan keputusan untuk kadar **Sejam** dan **Sehari (24 Jam)**.
* Antaramuka responsif menggunakan **Bootstrap 4**.

## Formula Yang Digunakan
Aplikasi ini menggunakan logik pengiraan berikut:
1.  **Kuasa (Wh)** = $Voltan (V) \times Arus (A)$
2.  **Tenaga (kWh)** = $(Kuasa \times Jam) / 1000$
3.  **Jumlah (RM)** = $Tenaga (kWh) \times (Kadar / 100)$

## Cara Penggunaan
1.  Pastikan anda mempunyai persekitaran pelayan tempatan seperti **XAMPP** atau **Laragon**.
2.  Letakkan folder projek ini ke dalam direktori `htdocs` (untuk XAMPP).
3.  Buka pelayar web dan layari `localhost/nama-folder-anda`.
4.  Masukkan nilai Voltan, Arus, dan Kadar Tarif untuk melihat hasil pengiraan.

## Dibina Dengan
* [PHP](https://www.php.net/) - Bahasa pengaturcaraan utama.
* [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction/) - Kerangka CSS untuk reka bentuk.
* [Visual Studio Code](https://code.visualstudio.com/) - Editor kod.