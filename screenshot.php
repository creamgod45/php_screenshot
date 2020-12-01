<?php
    $im = imagegrabscreen();
    imagepng($im, "myscreenshot.png");
    imagedestroy($im);
    
	header('refresh:1;url="start_screenshot.php"');
?>