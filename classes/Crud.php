<?php  

include_once("Api.php");
/**
 * 
 */
class Crud 
{

	function get(){
		 $api = new API();
		$result = $api -> CallAPI("GET", "","");
		return $result;
	}

	function post($data){
		 $api = new API();
		$result = $api -> CallAPI("POST", "", $data);
	}

	function put($data){

		 $api = new API();
		$result = $api -> CallAPI("PUT", "?".http_build_query($data, '', '&'),"");
	}

	function delete($id){
		 $api = new API();
		$result = $api -> CallAPI("DELETE", "?id=" . $id,"");
	}


}
?>


