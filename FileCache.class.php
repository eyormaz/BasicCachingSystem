<?php
/*
*
* @ Class: Basic Caching System
* @ Author: Emin YORMAZ / <eminyormaz1@gmail.com>
* @ Licence: The MIT License (MIT) - Copyright (c) - http://opensource.org/licenses/MIT
*
*/
namespace Yormaz;

class FileCache
{
	public $CacheDir = null;
    
	function __construct($CacheDirName = "cache")
	{
		$this->CacheDir = $CacheDirName;
		if(!file_exists($this->CacheDir))
			mkdir($this->CacheDir, 0755);
	}
    
	public function Start($Name,$Time = 60)
	{
		$Return = 1;
		$File = $this->CacheDir."/%%-".md5($Name)."-%%.cache"; 
		if(file_exists($File))
		{
			if(time() - $Time < filemtime($File))
			{
				echo '<!-- Cache display startup -->';
				readfile($File);
				$Return = 0;
			}
			else
				unlink($File);
		}
		
		@ob_start(); 
		return $Return;
	}
	
	public function Ending($Name)
	{		
		$File = $this->CacheDir."/%%-".md5($Name)."-%%.cache"; 
		$Data = fopen($File, 'w+');  
		fwrite($Data, ob_get_contents());  
		fclose($Data);  
		echo '<!-- Cache display ending -->';
		@ob_end_flush(); 		
	}
}
?>