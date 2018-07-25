<?php
class curls
{
	function curlPost($url, $data=NULL, $headers = NULL) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		if(!empty($data)){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}

		if (!empty($headers)) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		}

		$response = curl_exec($ch);

		if (curl_error($ch)) {
			trigger_error('Curl Error:' . curl_error($ch));
		}

		curl_close($ch);
		return $response;
	}

}
