<?php
if (isset($_GET["col"])) $col=$_GET["col"]; else $col=50;
$lines_cashe=file_get_contents("base_user", LOCK_EX);
$file=explode("\n",$lines_cashe);
$size_f=count($file)-1;
?>

<html>
<head>
<style type='text/css'>
 td.zz {PADDING-LEFT: 3px; FONT-SIZE: 9pt; PADDING-TOP: 2px; FONT-FAMILY: Arial;}
</style>
</head>

<body>
<center>
<?php
if ($col>$size_f) $col=$size_f;
echo 'Последние <b>'.$col.'</b> посещений сайта ботами:';
?>

<table width="750" cellspacing="1" cellpadding="1" border="0"
    style="table-layout:fixed">
<tr bgcolor="#eeeeee">
 <td class="zz" width="100"><b>Время, дата</b></td>
 <td class="zz" width="250"><b>Кто посещал</b></td>
 <td class="zz" width="100"><b>IP, прокси</b></td>
 <td class="zz" width="300"><b>Посещенный URL</b></td>
</tr>

<?php
for ($si=$size_f-1; $si>=$size_f-$col; $si--) {
$str=explode("|",$file[$si]);
echo '<tr bgcolor=#eeeeee><td class=zz>'.$str[0].'</td>';
echo '<td class=zz>'.$str[1].'</td>';
echo '<td class=zz>'.$str[2].'</td>';
echo '<td class=zz><a href="http://usefulscript.ru'.$str[3].'">'.$str[3];
echo '</a></td></tr>';
}
echo '</table>';
echo '<br>Просмотреть последние <a href=?col=100>100</a> <a href=?col=500>500</a> ';
echo '<a href=?col=1000>1000</a> посещений.';
echo '<br>Просмотреть <a href=?col='.sizeof($file).'>все посещения</a>.';
echo '</center></body></html>';
?>
