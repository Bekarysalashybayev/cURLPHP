<?php 
/**
 * 
 */

include_once("cURL.php");


class Api
{
	

	function CallAPI($method, $api, $data) {
	
	$headers = [
    'Host: test.invision.kz', 
    'User-Agent:Mozilla/5.0 (X11; U; Linux i686; ru; rv:1.9b5) Gecko/2008050509 Firefox/3.0b5'
    ];

    
   
     
     $http = new cURL("http://test.invision.kz/test.php".$api);
     $http->setopt(CURLOPT_HEADER, 0);
     $http->setopt(CURLOPT_RETURNTRANSFER, 1);
     $http->setopt(CURLOPT_CUSTOMREQUEST, $method);

     switch ($method) {
        case "POST":
            array_push($headers, 'Content-Type: application/x-www-form-urlencoded', 'Content-Length:'.strlen(http_build_query($data, '', '&')));
            $http->setopt(CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
        break;
        default:
            array_push($headers, 'Connection: close', 'Accept: text/html');
        break;
    }

     $http->setopt(CURLOPT_HTTPHEADER, $headers);
     $res = $http->exec();
     return $res;
     $http->close();

    }
}



 ?>