<!DOCTYPE HTML>
<html lang="zh-cn">
	<head>
		<title>满兴江</title>
		<meta charset="utf-8">
		<style type="text/css">
			body {
				width: 100%;
				background-color: #fff;
				margin: 0px;
				overflow: hidden;
				font-family:Monospace;
				font-size:30px;
				text-align:center;
				font-weight: bold;
				text-align:center;
			}
			a {
				color:#0078ff;
			}
		</style>
	</head>
	<body>
<?php 
	function getIp($type = 0) 
    {
        if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown') && strpos(getenv('HTTP_CLIENT_IP'), '192.168')===true) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown') && strpos(getenv('HTTP_X_FORWARDED_FOR'), '192.168')===true) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
            $ip = getenv('REMOTE_ADDR');
        } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        preg_match("/[\d\.]{7,15}/", $ip, $ipmatches);
        $ip = $ipmatches[0] ? $ipmatches[0] : '0.0.0.0';
        if ($type == 1) {
            return  sprintf("%u", ip2long($ip));
        } else {
            return $ip;
        }
    }
    echo getIp(1);
?>
	</body>
</html>
