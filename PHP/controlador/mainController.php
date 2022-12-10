<?php
class mainController{
	public $color = 'green';

	public function getData(){
		$curl   = curl_init();
		curl_setopt_array($curl, array(
	      CURLOPT_URL => 'https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items',
	      CURLOPT_RETURNTRANSFER    => true,
	      CURLOPT_CUSTOMREQUEST     => 'GET',
	    ));
	    $data = curl_exec($curl);
		$err = curl_error($curl);
	    curl_close($curl);

		$response = "";
		if ($err) {
			$response =  "Curl error:" . $err;
		} else {
			$response = $data; 
		}

	    return $response;
	}
	

}