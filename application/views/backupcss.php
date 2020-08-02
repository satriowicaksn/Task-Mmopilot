<?php $date = date('D M Y H:i:s:a');
$n = 2;
$nextN = mktime(0, 0, 0, date("m"), date("d") + $n, date("Y"));
$prevN = mktime(0, 0, 0, date("m"), date("d") - $n, date("Y"));
$tgl = date_parse($date);
$tanggal = $tgl['day'];
$bulan = $tgl['month'];
$tahun = $tgl['year'];
$jam = $tgl['hour'];
$second = $tgl['minute'];
$pickjam = date('H:i:s');
$pickweek = date('D m Y');
$apply =  date('l, Y-m-D', $nextN);
$minggu = date_parse($apply);
$a = date('H:i');
$b = date('l H:i');
$c = 'Tuesday';
$d = '15:29';
$cd = $c; $d;
echo $cd;
?>
<input type="date" name="" value="<?= $apply ?>">
<input type="time" name="" value="<?= $a ?>">
