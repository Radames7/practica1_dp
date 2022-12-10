<?php
class mainController{
	public $color = 'green';

	public function getData($color){
		$curl   = curl_init();
		curl_setopt_array($curl, array(
	      CURLOPT_URL => 'https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items?color=' . $color,
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
	

	public function setFile( $data ){
		$archivo = fopen('Respuesta1.json', "w" );
        fwrite( $archivo, $data);
        fclose( $archivo );
	}

}