<?php

	ini_set('max_execution_time', 300);

	include("bot.php");

	do{
		$return_array = http_get("http://duexam2.du.ac.in/RSLT_ND2015/Students/List_of_Declare_RSLT.aspx","http://duexam2.du.ac.in/RSLT_ND2015/Students/Combine_GradeCard.aspx");
		$html = $return_array['FILE'];
	}while($html=='');

	$dom = new DOMdocument();
	@$dom->loadHTML($html);
	$xpath = new DOMxpath($dom);

	$tmp = $xpath->query("//span[@id='lblmsg']");

	$s = $tmp->item(0)->nodeValue;

	echo $s;

	if($s != "Sorry! no record found."){
		$to = "pandeyiyer@gmail.com";
		$subject = "Results Declared";
		$body = "Hi\nUniversity of Delhi has declared some of results, check yours at\nhttp://duexam2.du.ac.in/RSLT_ND2015/Students/Combine_GradeCard.aspx\n\nAll the Best and Happy New Year 2016.";
		$header = "From: results@du.ac.in";

		mail($to,$subject,$body,$header);

		$to = "mohit.ghazipur@gmail.com";
		mail($to,$subject,$body,$header);

		$to = "spratapranjan4@gmail.com";
		mail($to,$subject,$body,$header);
	}

?>
