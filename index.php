<!IDOCTYPE html>
<html>

<head>
    <title>Salam - Kirim pesan ke semua orang</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav>
        <div class="judul">SALAM-SALAM</div>
        <div class="toogle">
            <i class="fa fa-bars menu" aria-hidden="true"></i>
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="about.html">About This Site</a></li>
        </ul>
    </nav>
	
	<? //Action ketika tombol menu diklik ?>
	
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.menu').click(function() {
                $('ul').toggleClass('aktif');
            })
        })
    </script>

    <div class="form">
	<p>KIRIM SALAM DAN PESANMU KE SEMUA ORANG</p>
        	<form method="POST" action="kirim.php">
            		<label>Dari</label><br>
            		<input class="teks" type="text" name="dari">
            		<p>
                	<label>Untuk</label><br>
                	<input class="teks" type="text" name="untuk">
                	<p>
                	<label>Pesan</label><br>
                	<input class="pesan" type="text" name="isi">
                	<p>
                	<button class="button" type="submit" name="submit">Kirim</button>
        	</form>
    </div>

    <div class="konten">
        <?php
	if(isset($_GET['status'])){
	if($_GET['status'] == 'ok'){ echo "Berhasil dikirim";}}
	else {
	}
	?>
	    
        <p>
		
        <?php
		
	// Menampung data halaman (posisi pengguna berada)
		
	include 'config.php';
	if(isset($_GET['hal'])){
    		$dataHal = $_GET['hal'];
	} else{
    		$dataHal = 1;
	}
	
	//Pagination
		
	$perHal = 3; //Jumlah pesan per halaman
	$hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
	$awal = ($hal > 1) ? ($hal * $perHal) - $perHal : 0;
	$sql = "SELECT * FROM pesan ORDER BY id DESC LIMIT $awal, $perHal";
	$total = mysqli_query($kon, "SELECT * FROM pesan");
	$totalhal = mysqli_num_rows($total);
	$pages = ceil($totalhal/$perHal);    
	$hasil = mysqli_query($kon, $sql);
	$prev = $dataHal-1;
	$next = $dataHal+1;
	
	//Menampilkan pesan
		
	while($d = mysqli_fetch_assoc($hasil)){
	?>
        <p>
        <div class="isi">
		<div class="identitas">Dari
                      <?php echo $d['dari']; ?> <br>Untuk
                      <?php echo $d['untuk']; ?> <br></div>
                      " <?php echo $d['isi']; ?> "
        	<p>
        			<div class="identitas">
        				<?php echo $d['time']; ?>
                            	</div>
	    	</div>
		<?php } ?>
    	</div>

    	<div class="pages">
		
		<!-- Menghitung total pesan yang masuk -->
		
       		<? if($dataHal == 1){ ?>
        		<p>Ada sekitar <? echo $totalhal ?> salam yang masuk. Baca lainnya</p>
        	<? } else { $sisa = $totalhal-($dataHal*3);?>
        		<? if($sisa <= 0){ ?> <p>Tidak ada salam yang tersedia</p> <? } else {?>
        			<p>Ada <? echo $sisa ?> salam yang tersisa. Baca lainnya</p>
        		<? } } ?>
        	<? //Tombol prev untuk pergi ke halaman sebelumnya
		if($dataHal != 1 || $dataHal == ''){ ?>
            		<a href="?hal=<? echo $prev ?>">Prev</a>
            	<? } ?>
               <!--
                <?php

		//Saya mendisable tombol halaman 1, 2, 3, dst karena belum menemukan metode untuk menyingkat
		//Halaman seperti misalnya (1, 2, 3, ... ,10 , next)
		
		for($i=1; $i<=$pages; $i++){ ?>
                <? $active = $i == $dataHal ? 'class="active"' : ''?>
                    <a href="?hal=<?php echo $i?>" <? echo $active ?> ><? echo $i ?></a>
                    <? } ?> 
                -->
                       
                <? 
		// Tombol next untuk pergi ke halaman selanjutnya
		if($dataHal < $pages){ ?>
                	<a href="?hal=<? echo $next ?>">Next</a>
                <? } ?>
    </div>
    <div id="footer">
        <center>Made with ❤ and kegabutan</center>
    </div>
</body>
</html>
