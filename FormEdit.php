<!-- Mengambil data yang akan diedit, berdasarkan nim yang dipilih dan
dikirim melalui link (get) -->
<?php
    $nip=$_GET['nip'];
    //membuat sql tampil data
    $sqldata="SELECT * FROM tbldosen WHERE nip='$nip'";
    //ambil koneksi data
    require_once "KoneksiDB.php";
    //proses sql
    $query=mysqli_query($koneksi,$sqldata);
    //mengubah data ke array asosiatif, tidak menggunakan perulangan karena datanya hanya 1.
    $data=mysqli_fetch_assoc($query);
    //selanjutnya tampilkan pada field dibawah.
?>
 <h2>Update Data Dosen</h2>
 <!-- tag form -->
 <form action="Update.php" method="POST">
    <label>Nomor Induk Dosen :</label>
    <input type="text" nama="nip" value="<?=$data['nip']?>" 
    placeholder="Nomor Induk Dosen" required>
    <br>
    <label>Nama Dosen :</label>
    <input type="text" nama="nama" id="nama" value="<?=$data['nama']?>" 
    placeholder="Nama Lengkap" required>
    <br>
    <label for="">Alamat :</label>
    <input type="text" nama="alamat" id="alamat" value="<?=$data['alamat']?>" 
    placeholder="Alamat Lengkap" required>
    <br>
    <label for="">Email</label>
    <input type="text" nama="email" id="email" value="<?=$data['email']?>"
    placeholder="email" required>
    <br>
    <label for="">NoHp</label>
    <input type="number" nama="nohp" id="nohp" value="<?=$data['nohp']?>"
    placeholder="Nohp" required>
    <br>
    <button type="submit" nama="kirim" value="kirim">Update Data</button>
 </form>