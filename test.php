<?php 

require('twitteroauth.php');

$consumer_key = 'wW2LNpHU0WTaf1n6TVGhiBu91';
$consumer_secret = '6XXJ2Y5tV5kqKJ0vYqv5YWFgEqIIoW4g17TklQZtWE6Vnhj6yu';
$oauth_token = '3001453269-IihZv8BVnl8hJqi6pYDM0jsdGIaAb6WwLLAO1eC';
$oauth_secret = 'uNMttCNO96Ww85lvm7bI9r4n2Vbjj4RnHdvGdfP0beHnw';

$connect = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_secret);
$query = 'https://api.twitter.com/1.1/search/tweets.json?q=%23Microsoft';
$content = $connect->get($query);
$content = json_decode(json_encode($content), true);
//var_dump($content["statuses"][0]['entities']['hashtags'][1]['text']);

for ($k = 0; isset($content["statuses"][$k]); $k++) {
	for ($i = 0; isset($content["statuses"][$k]['entities']['hashtags'][$i]); $i++) {
		echo "#".$content["statuses"][$k]['entities']['hashtags'][$i]['text']."\n";
	}
}

?>