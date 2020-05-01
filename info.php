<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
<body>
	<?php include("sidebar.php") ;?>
	<div class="content">
	<h2>Info</h2>
	<p>
	<?php
	if(isset($_GET["info"])) {
		$settings = include("config.php");
		$spiceapi = new SpiceApi($settings["server"], $settings["port"]);
		
		if($spiceapi->connect()) {
			switch($_GET["info"]) {
				case "avs":
					$info = info_get($spiceapi, "avs");
					info_print($info);
					break;
				case "launcher":
					$info = info_get($spiceapi, "launcher");
					info_print($info);
					break;
				case "memory":
					$info = info_get($spiceapi, "memory");
					info_print($info);
					break;
				default:
					echo "Incorrect argument(s) given. Please click <a href='./index.php'>here</a> to return home.";
			}
			$spiceapi->disconnect();
		} else {
			echo "No connection made, server probably unavailable or offline.";
		}
	} else {
		include("info_list.php");
	}
	?>
	</p>
	</div>
	<?php include("footer.php") ;?>
</body>
</html>