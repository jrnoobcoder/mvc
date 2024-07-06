<?php 

//echo "helper2";


	/**
	* Get Base Url Path
	* @author Risecommerce <https://risecommerce.com>
	* @version 1.0
	* @param   [type] 
	* @return  [type]  
	*/
	function baseUrl(){
		$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
		$port = $_SERVER['SERVER_PORT'];
		$domain = $_SERVER['SERVER_NAME'];
		$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
		$url = "${protocol}://${domain}${disp_port}";
		return $url;
	}
	
	
	/**
	* create assets URL
	* @author Risecommerce <https://risecommerce.com>
	* @version 1.0
	* @param   [type] $path 
	* @return  [type]  
	*/
	function asset($file_path = ""){
		$path =  baseUrl(). "/public/asstes/${file_path}";
		
		
		return $path;
	}
	
	/**
	* create css file URL
	* @author Risecommerce <https://risecommerce.com>
	* @version 1.0
	* @param   [type] $file_path 
	* @return  [type]  
	*/
	function css($file_path = ""){
		$path =  baseUrl(). "/public/asstes/css/${file_path}";
		return $path;
	}
	
	/**
	* create resource URL
	* @author Risecommerce <https://risecommerce.com>
	* @version 1.0
	* @param   [type] $file_path 
	* @return  [type]  
	*/
	function resource($file_path = ""){
		$path =  baseUrl(). "/resource/${file_path}";
		return $path;
	}
	
	//echo resource();
	
	/* function layout($layout=""){
		$rootPath = $_SERVER['DOCUMENT_ROOT'];
		include __DIR__ "/../resource/views/${layout}.php";
	}
	echo layout(); */
	
	/**
	* create route method
	* @author Risecommerce <https://risecommerce.com>
	* @version 1.0
	* @param   [type] $name 
	* @return  [type]  $parameters
	*/
	function route($name, $parameters = []) {
		global $generator; // Assuming the generator is available globally
		return $generator->generate($name, $parameters);
	}