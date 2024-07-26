#!/bin/bash

# Buat folder cssnich jika belum ada
mkdir -p cssnich

# Membuat file CSS dengan gaya yang sudah ditentukan
echo "/* CSS ini untuk halaman tambah pelanggan, tambah order, tambah menu, dan tambah reservasi */" > cssnich/style.css
echo "" >> cssnich/style.css
echo "body {" >> cssnich/style.css
echo "    font-family: Arial, sans-serif;" >> cssnich/style.css
echo "    margin: 0;" >> cssnich/style.css
echo "    padding: 0;" >> cssnich/style.css
echo "    background-color: #f4f4f4;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo ".container {" >> cssnich/style.css
echo "    width: 80%;" >> cssnich/style.css
echo "    margin: 20px auto;" >> cssnich/style.css
echo "    background: #fff;" >> cssnich/style.css
echo "    padding: 20px;" >> cssnich/style.css
echo "    border-radius: 8px;" >> cssnich/style.css
echo "    box-shadow: 0 0 10px rgba(0,0,0,0.1);" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "h1 {" >> cssnich/style.css
echo "    color: #333;" >> cssnich/style.css
echo "    text-align: center;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "form {" >> cssnich/style.css
echo "    display: flex;" >> cssnich/style.css
echo "    flex-direction: column;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "form label, form input {" >> cssnich/style.css
echo "    margin-bottom: 10px;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "form label {" >> cssnich/style.css
echo "    font-weight: bold;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "form input[type=\"text\"], form input[type=\"password\"], form input[type=\"submit\"] {" >> cssnich/style.css
echo "    width: 100%;" >> cssnich/style.css
echo "    padding: 10px;" >> cssnich/style.css
echo "    border: 1px solid #ccc;" >> cssnich/style.css
echo "    border-radius: 4px;" >> cssnich/style.css
echo "    box-sizing: border-box;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "form input[type=\"submit\"] {" >> cssnich/style.css
echo "    background-color: #5cb85c;" >> cssnich/style.css
echo "    color: white;" >> cssnich/style.css
echo "    border: none;" >> cssnich/style.css
echo "    cursor: pointer;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "form input[type=\"submit\"]:hover {" >> cssnich/style.css
echo "    background-color: #4cae4c;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "/* Gaya untuk navbar */" >> cssnich/style.css
echo "nav {" >> cssnich/style.css
echo "    background-color: #333;" >> cssnich/style.css
echo "    color: white;" >> cssnich/style.css
echo "    padding: 10px 0;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "nav ul {" >> cssnich/style.css
echo "    list-style-type: none;" >> cssnich/style.css
echo "    margin: 0;" >> cssnich/style.css
echo "    padding: 0;" >> cssnich/style.css
echo "    overflow: hidden;" >> cssnich/style.css
echo "    text-align: center;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "nav ul li {" >> cssnich/style.css
echo "    display: inline;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "nav ul li a {" >> cssnich/style.css
echo "    color: white;" >> cssnich/style.css
echo "    padding: 14px 20px;" >> cssnich/style.css
echo "    text-decoration: none;" >> cssnich/style.css
echo "    display: inline-block;" >> cssnich/style.css
echo "}" >> cssnich/style.css
echo "" >> cssnich/style.css
echo "nav ul li a:hover {" >> cssnich/style.css
echo "    background-color: #575757;" >> cssnich/style.css
echo "}" >> cssnich/style.css

# Membuat file PHP untuk tambah pelanggan
echo "<!-- add_pelanggan.php -->" > add_pelanggan.php
echo "<!DOCTYPE html>" >> add_pelanggan.php
echo "<html>" >> add_pelanggan.php
echo "<head>" >> add_pelanggan.php
echo "    <title>Tambah Pelanggan</title>" >> add_pelanggan.php
echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"cssnich/style.css\"> <!-- Tautkan ke file CSS -->" >> add_pelanggan.php
echo "</head>" >> add_pelanggan.php
echo "<body>" >> add_pelanggan.php
echo "    <div class=\"container\"> <!-- Kontainer utama -->" >> add_pelanggan.php
echo "        <h1>Tambah Pelanggan</h1> <!-- Judul halaman -->" >> add_pelanggan.php
echo "        <form action=\"add_pelanggan_action.php\" method=\"POST\"> <!-- Formulir tambah pelanggan -->" >> add_pelanggan.php
echo "            <label for=\"first_name\">Nama Depan:</label>" >> add_pelanggan.php
echo "            <input type=\"text\" id=\"first_name\" name=\"first_name\" required> <!-- Input nama depan -->" >> add_pelanggan.php
echo "" >> add_pelanggan.php
echo "            <label for=\"last_name\">Nama Belakang:</label>" >> add_pelanggan.php
echo "            <input type=\"text\" id=\"last_name\" name=\"last_name\" required> <!-- Input nama belakang -->" >> add_pelanggan.php
echo "" >> add_pelanggan.php
echo "            <label for=\"email\">Email:</label>" >> add_pelanggan.php
echo "            <input type=\"email\" id=\"email\" name=\"email\" required> <!-- Input email -->" >> add_pelanggan.php
echo "" >> add_pelanggan.php
echo "            <label for=\"phone_number\">Nomor Telepon:</label>" >> add_pelanggan.php
echo "            <input type=\"text\" id=\"phone_number\" name=\"phone_number\" required> <!-- Input nomor telepon -->" >> add_pelanggan.php
echo "" >> add_pelanggan.php
echo "            <input type=\"submit\" value=\"Tambah\"> <!-- Tombol kirim -->" >> add_pelanggan.php
echo "        </form>" >> add_pelanggan.php
echo "        <a href=\"list_pelanggan.php\">Kembali ke Daftar Pelanggan</a> <!-- Tautan kembali -->" >> add_pelanggan.php
echo "    </div>" >> add_pelanggan.php
echo "</body>" >> add_pelanggan.php
echo "</html>" >> add_pelanggan.php

# Membuat file PHP untuk tambah order
echo "<!-- add_order.php -->" > add_order.php
echo "<!DOCTYPE html>" >> add_order.php
echo "<html>" >> add_order.php
echo "<head>" >> add_order.php
echo "    <title>Tambah Order</title>" >> add_order.php
echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"cssnich/style.css\"> <!-- Tautkan ke file CSS -->" >> add_order.php
echo "</head>" >> add_order.php
echo "<body>" >> add_order.php
echo "    <div class=\"container\"> <!-- Kontainer utama -->" >> add_order.php
echo "        <h1>Tambah Order</h1> <!-- Judul halaman -->" >> add_order.php
echo "        <form action=\"add_order_action.php\" method=\"POST\"> <!-- Formulir tambah order -->" >> add_order.php
echo "            <label for=\"order_date\">Tanggal Order:</label>" >> add_order.php
echo "            <input type=\"text\" id=\"order_date\" name=\"order_date\" required> <!-- Input tanggal order -->" >> add_order.php
echo "" >> add_order.php
echo "            <label for=\"order_time\">Waktu Order:</label>" >> add_order.php
echo "            <input type=\"text\" id=\"order_time\" name=\"order_time\" required> <!-- Input waktu order -->" >> add_order.php
echo "" >> add_order.php
echo "            <label for=\"total_amount\">Jumlah Total:</label>" >> add_order.php
echo "            <input type=\"text\" id=\"total_amount\" name=\"total_amount\" required> <!-- Input jumlah total -->" >> add_order.php
echo "" >> add_order.php
echo "            <label for=\"status\">Status:</label>" >> add_order.php
echo "            <input type=\"text\" id=\"status\" name=\"status\" required> <!-- Input status -->" >> add_order.php
echo "" >> add_order.php
echo "            <input type=\"submit\" value=\"Tambah\"> <!-- Tombol kirim -->" >> add_order.php
echo "        </form>" >> add_order.php
echo "        <a href=\"list_order.php\">Kembali ke Daftar Order</a> <!-- Tautan kembali -->" >> add_order.php
echo "    </div>" >> add_order.php
echo "</body>" >> add_order.php
echo "</html>" >> add_order.php

# Membuat file PHP untuk tambah menu
echo "<!-- add_menu.php -->" > add_menu.php
echo "<!DOCTYPE html>" >> add_menu.php
echo "<html>" >> add_menu.php
echo "<head>" >> add_menu.php
echo "    <title>Tambah Menu</title>" >> add_menu.php
echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"cssnich/style.css\"> <!-- Tautkan ke file CSS -->" >> add_menu.php
echo "</head>" >> add_menu.php
echo "<body>" >> add_menu.php
echo "    <div class=\"container\"> <!-- Kontainer utama -->" >> add_menu.php
echo "        <h1>Tambah Menu</h1> <!-- Judul halaman -->" >> add_menu.php
echo "        <form action=\"add_menu_action.php\" method=\"POST\"> <!-- Formulir tambah menu -->" >> add_menu.php
echo "            <label for=\"item_name\">Nama Item:</label>" >> add_menu.php
echo "            <input type=\"text\" id=\"item_name\" name=\"item_name\" required> <!-- Input nama item -->" >> add_menu.php
echo "" >> add_menu.php
echo "            <label for=\"description\">Deskripsi:</label>" >> add_menu.php
echo "            <input type=\"text\" id=\"description\" name=\"description\" required> <!-- Input deskripsi -->" >> add_menu.php
echo "" >> add_menu.php
echo "            <label for=\"price\">Harga:</label>" >> add_menu.php
echo "            <input type=\"text\" id=\"price\" name=\"price\" required> <!-- Input harga -->" >> add_menu.php
echo "" >> add_menu.php
echo "            <label for=\"category\">Kategori:</label>" >> add_menu.php
echo "            <input type=\"text\" id=\"category\" name=\"category\" required> <!-- Input kategori -->" >> add_menu.php
echo "" >> add_menu.php
echo "            <label for=\"available\">Tersedia:</label>" >> add_menu.php
echo "            <input type=\"text\" id=\"available\" name=\"available\" required> <!-- Input ketersediaan -->" >> add_menu.php
echo "" >> add_menu.php
echo "            <input type=\"submit\" value=\"Tambah\"> <!-- Tombol kirim -->" >> add_menu.php
echo "        </form>" >> add_menu.php
echo "        <a href=\"list_menu.php\">Kembali ke Daftar Menu</a> <!-- Tautan kembali -->" >> add_menu.php
echo "    </div>" >> add_menu.php
echo "</body>" >> add_menu.php
echo "</html>" >> add_menu.php

# Membuat file PHP untuk tambah reservasi
echo "<!-- add_reservasi.php -->" > add_reservasi.php
echo "<!DOCTYPE html>" >> add_reservasi.php
echo "<html>" >> add_reservasi.php
echo "<head>" >> add_reservasi.php
echo "    <title>Tambah Reservasi</title>" >> add_reservasi.php
echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"cssnich/style.css\"> <!-- Tautkan ke file CSS -->" >> add_reservasi.php
echo "</head>" >> add_reservasi.php
echo "<body>" >> add_reservasi.php
echo "    <div class=\"container\"> <!-- Kontainer utama -->" >> add_reservasi.php
echo "        <h1>Tambah Reservasi</h1> <!-- Judul halaman -->" >> add_reservasi.php
echo "        <form action=\"add_reservasi_action.php\" method=\"POST\"> <!-- Formulir tambah reservasi -->" >> add_reservasi.php
echo "            <label for=\"reservation_date\">Tanggal Reservasi:</label>" >> add_reservasi.php
echo "            <input type=\"text\" id=\"reservation_date\" name=\"reservation_date\" required> <!-- Input tanggal reservasi -->" >> add_reservasi.php
echo "" >> add_reservasi.php
echo "            <label for=\"reservation_time\">Waktu Reservasi:</label>" >> add_reservasi.php
echo "            <input type=\"text\" id=\"reservation_time\" name=\"reservation_time\" required> <!-- Input waktu reservasi -->" >> add_reservasi.php
echo "" >> add_reservasi.php
echo "            <label for=\"number_of_people\">Jumlah Orang:</label>" >> add_reservasi.php
echo "            <input type=\"text\" id=\"number_of_people\" name=\"number_of_people\" required> <!-- Input jumlah orang -->" >> add_reservasi.php
echo "" >> add_reservasi.php
echo "            <label for=\"status\">Status:</label>" >> add_reservasi.php
echo "            <input type=\"text\" id=\"status\" name=\"status\" required> <!-- Input status -->" >> add_reservasi.php
echo "" >> add_reservasi.php
echo "            <input type=\"submit\" value=\"Tambah\"> <!-- Tombol kirim -->" >> add_reservasi.php
echo "        </form>" >> add_reservasi.php
echo "        <a href=\"list_reservasi.php\">Kembali ke Daftar Reservasi</a> <!-- Tautan kembali -->" >> add_reservasi.php
echo "    </div>" >> add_reservasi.php
echo "</body>" >> add_reservasi.php
echo "</html>" >> add_reservasi.php
