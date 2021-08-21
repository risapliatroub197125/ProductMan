private function send($action, $obj, $value)
	{
		if(empty($this->token)) return false;
        if(empty($this->siteURL)) return false;
  //       if($this->encode == 2){
  //       	$value = $this->converutf($value); //2 = 
  //       }
		// $this->test = $value;
		$data = array(
			"token"=>$this->token,
			"action"=>$action,
			"obj"=>$obj,
			"value"=>$value
			);

		$string = http_build_query($data);
		// $string = \Bitrix\Main\Web\Json::encode($data);
		$urlOut = $this->siteURL."/rest/TransportDataOut.php";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $urlOut);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return $json = \Bitrix\Main\Web\Json::decode($output);
		// return $output;
	

	}
