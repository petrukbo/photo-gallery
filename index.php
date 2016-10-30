<?php
session_start();
include "User.php";
$user = new User();
if ($_SESSION['id']) $uid = $_SESSION['id'];
if (isset($_POST['submit1']))
{
	$login = $user->login($_POST['s1'],$_POST['s2']);
	header("location:room.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main</title>
	<link rel="stylesheet" href="style\main.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<script src="script\jquery-1.11.3.js"></script>
	<script src="script\jquery-ui.js"></script>
	<script src="script\main.js"></script>
	<script src="script\jQuery.scrollSpeed.js"></script>


</head>
<body background="ptrn1.jpg">
<div id="main" align="center">
<!--****************************************************************************-->	
<div id="menu">
	<div id="pages">
	<a href="index.php">Home</a>|
	<a href="gallery.php">Gallery</a>|
	<a href="reg.php">Reg</a>|
	<a href="photo.php">Photo</a>
	</div>
<!--	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php if (!$_SESSION['id']) { ?>
		<form id = "sign_menu" method = "post" >
			<input type = "text" name = "s1" placeholder = "Login" >
			<input type = "password" name = "s2" placeholder = "Password" >
			<input type = "submit" name = "submit1" value = "Sign In" >
		</form >
	<?php } else { ?>
		<form id = "sign_menu" method = "post" >
			<?php if ($_SESSION['id'] != 1) { ?>
				<a href="room.php"><?php echo $user->getLogin($uid)?></a>
			<?php } else {?>
				<a href="admin.php"><?php echo $user->getLogin($uid)?></a>
			<?php } ?>
		</form >
	<?php } ?>
<!--	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
</div>
<!--****************************************************************************-->
<div id="main_content" >
	<div id="info" >

	<img src="img\info_1.jpg" >
	<h5>A world that used to be. <a href="https://500px.com/photo/66555499/a-world-that-used-to-be-by-ionu%C5%A3-cara%C5%9F">Ionuţ Caraş</a></h5>

	<img src="img\info_2.jpg" >
	<h5>To the Threshold of Silence. <a href="https://500px.com/photo/67443411/to-the-threshold-of-silence-by-karezoid-michal-karcz">Karezoid Michal Karcz</a></h5>
	<!---->
	<h3>Fine-art photography</h3>
	<p>Fine art photography is <a href="https://en.wikipedia.org/wiki/Photography">photography</a> created in accordance with the vision of the artist as photographer. Fine art photography stands in contrast to representational photography, such as photojournalism, which provides a documentary visual account of specific subjects and events, literally re-presenting objective reality rather than the subjective intent of the photographer; and commercial photography, the primary focus of which is to advertise products or services.</p>
	<h3>History</h3>
	<p>One photography historian claimed that "the earliest exponent of 'Fine Art' or composition photography was <a href="https://en.wikipedia.org/wiki/John_Jabez_Edwin_Mayall">John Edwin Mayall</a>, "who exhibited daguerrotypes illustrating the <a href="https://en.wikipedia.org/wiki/Lord%27s_Prayer">Lord's Prayer</a> in 1851". Successful attempts to make fine art photography can be traced to Victorian era practitioners such as <a href="https://en.wikipedia.org/wiki/Julia_Margaret_Cameron">Julia Margaret Cameron</a>, 
	<div id="img1">
		<img src="img\history_1.jpg">
		<p>Depiction of nudity has been one of the dominating themes in fine-art photography. Nude composition 19 from 1988 by <a href="https://en.wikipedia.org/wiki/Jaan_K%C3%BCnnap">Jaan Künnap</a>.</p>	
	</div>
	<a href="https://en.wikipedia.org/wiki/Lewis_Carroll">Charles Lutwidge Dodgson</a>, and <a href="https://en.wikipedia.org/wiki/Oscar_Gustave_Rejlander">Oscar Gustave Rejlander</a> and others. In the U.S. F. <a href="https://en.wikipedia.org/wiki/F._Holland_Day">Holland Day</a>, <a href="https://en.wikipedia.org/wiki/Alfred_Stieglitz">Alfred Stieglitz</a> and <a href="https://en.wikipedia.org/wiki/Edward_Steichen">Edward Steichen</a> were instrumental in making photography a fine art, and Stieglitz was especially notable in introducing it into museum collections.</p>
	
	
	<p>In the UK as recently as 1960, photography was not really recognised as a Fine Art. Dr S.D.Jouhar said, when he formed the Photographic Fine Art Association at that time - "At the moment photography is not generally recognized as anything more than a craft. In the USA photography has been openly accepted as Fine Art in certain official quarters. It is shown in galleries and exhibitions as an Art. There is not corresponding recognition in this country. The London Salon shows pictorial photography, but it is not generally understood as an art. Whether a work shows aesthetic qualities or not it is designated 'Pictorial Photography' which is a very ambiguous term. The photographer himself must have confidence in his work and in its dignity and aesthetic value, to force recognition as an Art rather than a Craft"</p>
	<p>Until the late 1970s several genres predominated, such as; nudes, portraits, natural landscapes (exemplified by Ansel Adams). Breakthrough 'star' artists in the 1970s and 80s, such as Sally Mann, Robert Mapplethorpe, Robert Farber, and Cindy Sherman, still relied heavily on such genres, although seeing them with fresh eyes. Others investigated a snapshot aesthetic approach.</p>
	
	<p>American organizations, such as the Aperture Foundation and the Museum of Modern Art, have done much to keep photography at the forefront of the fine arts.</p>
	<h3>Current trends</h3>
	<p>There is now a trend toward a careful staging and lighting of the picture, rather than hoping to "discover" it ready-made. Photographers such as <a href="https://en.wikipedia.org/wiki/Gregory_Crewdson">Gregory Crewdson</a>, and <a href="https://en.wikipedia.org/wiki/Jeff_Wall">Jeff Wall</a> are noted for the quality of their staged pictures. Additionally, new technological trends in digital photography have opened a new direction in full spectrum photography, where careful filtering choices across the ultraviolet, visible and infrared lead to new artistic visions.</p>

	<div id="img2">
		<img src="img\history_2.jpg">
		<p><a href="https://en.wikipedia.org/wiki/Ansel_Adams">Ansel Adams</a>' The Tetons and the Snake River (1942).</p>	
	</div>

	<p>As printing technologies have improved since around 1980, a photographer's art prints reproduced in a finely-printed limited-edition book have now become an area of strong interest to collectors. This is because books usually have high production values, a short print run, and their limited market means they are almost never reprinted. The collector's market in photography books by individual photographers is developing rapidly.</p>
	
	<p>According to <a href="http://press.artprice.com/pdf/trends2004.pdf">Art Market Trends 2004</a> (PDF link) 7,000 photographs were sold in auction rooms in 2004, and photographs averaged a 7.6 percent annual price rise from 1994 and 2004.[not in citation given] Around 80 percent were sold in the United States. Of course, auction sales only record a fraction of total private sales. There is now a thriving collectors' market for which the most sought-after art photographers will produce high quality archival prints in strictly limited editions. Attempts by online art retailers to sell fine photography to the general public alongside prints of paintings have had mixed results, with strong sales coming only from the traditional "big names" of photography such as Ansel Adams.</p>
	<p>In addition to the "digital movement" towards manipulation, filtering, and or resolution changes, some fine artists deliberately seek a "naturalistic," including "natural lighting" as a value in itself. Sometimes the art work as in the case of <a href="https://en.wikipedia.org/wiki/Gerhard_Richter">Gerhard Richter</a> consists of a photographic image that has been subsequently painted over with oil paints and/or contains some political or historical significance beyond the image itself. The existence of "photographically-projected painting" now blurs the line between painting and photography which traditionally was absolute.</p>
	</div>

</div>
<!--****************************************************************************-->


</div>
<div id="footer" align="center">
	<a href="mnms.php">M&M's</a>
</div>
</body>
</html>