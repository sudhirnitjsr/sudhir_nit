<!DOCTYPE html>
<html>
<head><title>Screenshot</title></head>
<body>
<?php
    require __DIR__."/vendor/autoload.php";       //Autolaoding classe via composer
	use screenshot\Screen;
	function googleAPIcall($url){
		$pagedata=file_get_contents("http://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$url&screenshot=true");
		$data=json_decode($pagedata,true);
		$screenshot=$data['screenshot']['data'];
		$screenshot = str_replace(array('_','-'),array('/','+'),$screenshot); 
		return $screenshot;
	}
	if(isset($_POST["url"]))
	{
		$url=$_POST["url"];
		
		$image=googleAPIcall($url);
		echo "<img src=\"data:image/jpeg;base64,".$image."\" />";
		
	}


?>
    <form action="index.php" method="post">
	<input type="text" placeholder="A url" name="url" />
	<input type="submit" value="Submit" />
	</form>




</body>
</html>