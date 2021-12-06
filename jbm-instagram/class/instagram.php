<?php
class HJMBGInstagram {
    
	private $_accesstoken;
	
	Private $_userFeedUrl;
	
	Private $_feedCount;
	
	// Constructor
	public function __construct($config) {
		$this->_accesstoken = $config['accessToken'];
		$this->_feedCount = $config['feedCount'];
		//$this->setAccessToken($config['accessToken']);
		//$this->setFeedCount($config['feedCount']);
		//$this->setUserUrl();
	}
	
	/*public function setAccessToken($data)
	{		
		//$access_token = is_object($data) ? $data->access_token : $data;		
		//$this->_accesstoken = $data;
	}*/
	
	/**
	 * Access Token Getter.
	 *
	 * @return string
	 */
	private function getAccessToken($data)
	{
		return $this->_accesstoken = $data;
	}
	
	/*public function setFeedCount($data){
		$this->_feedCount = $data;
	}*/
	
	private function getFeedCount($feedcount) {
		return $this->_feedCount = $feedcount;
	}
	
	/*public function setUserUrl() {
		$url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=" . $this->getAccessToken($this->_accesstoken)."&count=".$this->getFeedCount($this->_feedCount);
		$this->_userFeedUrl = $url;
	}*/
	
	private function getUserUrl() {
		
		$url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=" . $this->getAccessToken($this->_accesstoken)."&count=".$this->getFeedCount($this->_feedCount);
		$this->_userFeedUrl = $url;
		
		return $this->_userFeedUrl;	
	}
	
	private function instagram_api_curl_connect( $api_url ){
		$connection_c = curl_init(); // initializing
		curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
		curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
		curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
		$json_return = curl_exec( $connection_c ); // connect and get json data
		curl_close( $connection_c ); // close connection
		return json_decode( $json_return ); // decode and return
	}
	
	public function instagramFeeds(){
		
		$userUrl = $this->getUserUrl();
		
		return $this->instagram_api_curl_connect($userUrl);
		
	}

}
?>
