<?php
namespace screenshot;

class Screen {
	
	function googleAPIcall($url){
		$pagedata=file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$url&screenshot=true");
		$data=json_decode($pagedata,true);
		$screenshot=$data['screenshot']['data'];
		$screenshot = str_replace(array('_','-'),array('/','+'),$screenshot); 
		return $screenshot;
	}
	
}
$s = new Screen;
$data=$s->googleAPIcall("http://www.google.com");

echo $data;


?>
