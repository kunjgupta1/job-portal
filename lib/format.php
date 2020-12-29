<?php

	/**
	 *hey feeling positive but try to achive more ... 
	 */
	class Format
	{
		
	  public function textshorten($text , $limit = 100)
	  {
	  	$text = $text." ";
	  	$text = substr($text, 0 ,$limit);
	  	$text = substr($text, 0, strrpos($text, " "));
	  	$text = $text." ";
	  	return $text;
	  	
	  }
	}



?>