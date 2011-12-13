<?php

$str = rawurlencode('this is protected text これは保護されたテキスト');
$rand = mt_rand(0, floor(time()/100));
$seed = floor(time()/100) + $rand;
$char = array($rand);
for($i=0; $i < mb_strlen($str, 'utf-8'); $i++) {
	$hex = bin2hex(mb_substr($str, $i, 1, 'utf-8'));
	$char[] = intval($hex, 16) ^ $seed;
}
$json = json_encode($char);

?>
<!DOCTYPE html>
<html>
<head><meta charset='utf-8' /><title>jquery.javascrypt.js</title></head>
<body>
	<h1>jQuery.javasCrypt.js Contents Protect Test</h1>
	<div>Seed: <?php echo $seed ?></div>
	<div><span class='_k_javascrypt'><?php echo $json ?></span></div>
	<div><button id='dec'>decrypt</button></div>
	
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
	<script src="jquery.javascrypt.js"></script>
	<script>
		$('#dec').click(function(e){
			$('._k_javascrypt').javascrypt();
			$(this).hide();
		});
	</script>
	
	</body>
</html>
