# Diana Tiara Putri (121140172)

## 1. Client Side Programming

1.1 telah dibuat sebuah form dengan 4 element input, yaitu Nama dan Isi catatan dengan input element, prority dengan select option element, dan tags dengan checkbox element. Dibawah form terdapat tabel yang akan menampilkan dari isian 4 input diatas.

1.2 Pada form terdapat 3 event yaitu: click, keyup, dan change yang mana event event itu digunakan untuk mentrigger handler validasi dari masing masing inputan pada client side.

## 2. Server Side Programming

2.1 Dengan menggunakan method POST pada form yang telah ada, terdapat validasi ulang dari sisi server untuk mengecek validitas inputan. Lalu pada method dari class DataModel digunakan global param $\_SERVER['REMOTE_ADDR'] untuk mendapatkan IP client dan $\_SERVER['HTTP_USER_AGENT'] untuk mendapatkan jenis browser dari client.

2.2 Pada file CatatanModel terdapat class yang iheritence dari class Modek tersebut. terdapat beberapa method yg ada seperte GetAll() untuk mendapatkan semua data dari Database, lalu ada Create($data) untuk menyimpan record ke database.

## 3. Database Management

3.1 pada file uas_web.sql terdapat DDL umtuk membuat table dataBio.

3.2 pada file DB.sql terdapat singleton untuk pembuatan koneksi database dengan driver mysqli

3.3 seperti yang diterangkan pada point 2.2, terdapat query untuk menambahkan row pada tabel dataBio.

## 4. State Management

4.1 session digunakan untuk menyimpan old/prev value dari client, sehingga jika terjadi error user tidak perlu mengetik dari awal lagi.
session juga digunakan untuk menyimpan pesan error maupun success dari server side

4.2 Browser Storage atau juga LocalStorage digunakan untuk menyimpan input nama dari user, sehingga tidak perlu input ulang
