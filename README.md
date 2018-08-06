# Tentang kode
Kode ini dibuat dengan PHP dan html dasar meliputi 'Create' dan 'Read' data dari database MySqli. Secara garis besar, cara kerja dari kode ini adalah mengirim data ke database dan menampilkannya.

# Tujuan
Situs ini bertujuan untuk membagikan pesan anonym kepada semua orang sehingga terlihat secara publik. Selain itu tujuan lainnya adalah untuk berbagi cerita atau pesan menghibur satu sama lain tanpa diketahui siapa pengirim aslinya.

# Penggunaan
Masuk ke config.php dan setting database yang digunakan.
Untuk database di sini menggunakan nama table 'pesan' dengan kolom 'id', 'dari', 'untuk', 'isi', 'time'

# Database
CREATE TABLE pesan ('id INT NOT NULL AUTO_INCREMENT' , 'dari VARCHAR(30) NOT NULL' , 'untuk VARCHAR(30) NOT NULL', 'isi TEXT NOT NULL', 'time TEXT NOT NULL', PRIMARY KEY(id));  

# Saran dan kritik
Silahkan kirimkan saran dan kritik melalui akun saya atau Instagram @ccnkss 
