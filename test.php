
<?php 
include_once('simple_html_dom.php');

class Curl {
	private $url;
	private static $instance;

	private function __construct (string $url) {
		$this->url = $url;
	}

	public static function getObj (string $url) {
		if(empty(self::$instance)) {
			self::$instance = new Curl($url);
		}
		return self::$instance;

	}
	public function getContent () {
		$curl = curl_init();
		curl_setopt_array($curl, array(
  		CURLOPT_URL => $this->url,
  		CURLOPT_RETURNTRANSFER => true,
  		CURLOPT_REFERER => $referer,
  		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  		CURLOPT_CUSTOMREQUEST => "GET"
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
	}
}

class GetValues {
	public static function valuesR (Curl $obj) 
	{
		$dom = str_get_html($obj->getContent());
		$values = $dom->find('.mono-num');
		return $values;
	}
}

$content = Curl::getObj("http://cbr.ru/");
$values = GetValues::valuesR($content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div><?php echo "Доллар вчера: " . $values[0]->plaintext . "   "; ?> -----> <?php echo "Доллар сегодня: " . $values[1]->plaintext . "   "; ?> </div>
	<div><?php echo "Евро вчера: " . $values[2]->plaintext . "   "; ?> -----> <?php echo "Евро сегодня: " . $values[3]->plaintext . "   "; ?> </div>
</body>
</html>

