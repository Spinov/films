<html>
<head></head>
<body>
<table>
<tr>
<td><pre><?php
$arr = array();

	for ($i = 0; $i < 20; $i++)
		$arr[] = rand(0, 100);
print_r($arr);
?></pre></td><td><pre><?php
/*	echo 'Сортировка по возрастанию: <br>';
	while ($j < max($arr)){
		$j++;
			if (in_array($j, $arr))
				echo $j.' ';
	}
	echo '<hr>Сортировка по убыванию: <br>';
	$j = 101;
	while ($j > min($arr)){
		$j--;
			if (in_array($j, $arr))
				echo $j. ' ';
	}
	echo '<hr>Сортировка по убыванию: <br>';
	echo "<hr>";
	for ($i = 0; $i < 20; $i++)
		echo $i.':'.$arr[$i]."<br>";
	*/

for ($h = count($arr)-1; $h > 0; $h--){
	for ($i = 0; $i < $h; $i++){
		if ($arr[$i] > $arr[$i+1]){
			$b = $arr[$i];
			$arr[$i] = $arr[$i+1];
			$arr[$i+1] = $b;
		}
	}
}
print_r($arr);
?></pre></td>
</tr>
</table>
</body>
</html>

	
	