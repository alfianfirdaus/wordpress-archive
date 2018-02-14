<?php

$gol = '3a';
$status = 'nikah';
$anak = 3;

// Constant Value
$gapok = 10000000;
$koperasi = 100000;

// Empty Variable
$tunj_istri=0;
$tunj_anak =0;
$tunj_fungsional = 0;
$transport = 0;


// Tunj Istri
if ( $status == 'nikah' ) {
	$tunj_istri = $gapok * 0.05;
}

// Tunj. Anak
if ( $anak <=3 ) {
	$tunj_anak = $gapok * 0.10;
}

// Tunj. Fungsional
if ( ($gol=='3a') OR ($gol=='3b') ) {
	$tunj_fungsional = 375000;
	$transport = 128000;
}elseif ( ($gol=='3c') OR ($gol=='3d') ) {
	$tunj_fungsional = 450000;
	$transport = 175000;
}elseif ( ($gol=='4a') OR ($gol=='4b') ) {
	$tunj_fungsional = 750000;
	$transport = 220000;
}elseif ( ($gol=='4c') OR ($gol=='4d') ) {
	$tunj_fungsional = 900000;
	$transport = 225000;
}

// Gaji Kotor
$gator = $gapok + $tunj_istri + $tunj_anak + $tunj_fungsional + $transport;


$jamsostek = $gapok * 0.04;
$pph = $gator * 0.25;
$jumlah_potongan = $jamsostek + $koperasi + $pph;


$gaji_bersih = $gator - $jumlah_potongan;


echo 'Gaji Pokok = '. $gapok .'<br>';
echo 'Tunj. Istri = '. $tunj_istri .'<br>';
echo 'Tunj. Anak = '. $tunj_anak .'<br>';
echo 'Tunj. Fungsional = '. $tunj_fungsional .'<br>';
echo 'Tunj. Transportasi = '. $transport .'<br>';
echo 'GAJI KOTOR = '. $gator .'<br>';
echo '<br><br>';

echo 'Pot. Jamsostek = '. $jamsostek .'<br>';
echo 'Koperasi = '. $koperasi .'<br>';
echo 'Pajak (Pph) = '. $pph .'<br>';
echo 'Jumlah Potongan '. $jumlah_potongan .'<br>';
echo '<br><br>';

echo 'GAJI BERSIH = '. $gaji_bersih;
echo '<br><br><br><br>';


// echo 'Start Value = 1024';	

$startVal = 1024;
$endVal = 8;

echo 'Result = '. $startVal .' . ';
while ( $startVal >= $endVal ) {
	$i += 1;
	$startVal = $startVal/2;	
	echo $startVal .' . ';
}
?>