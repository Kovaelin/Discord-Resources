<?php
	$json = file_get_contents('php://input'); 
	$json = json_decode($json, true);

if (is_null($json["pages"][0]["summary"])) $json["pages"][0]["summary"] = "Updated ``". $json["pages"][0]["page_name"] . "``.";
	$na = json_encode(array(
		"username" => "Github",
		"avatar_url" => "https://avatars0.githubusercontent.com/u/9919?s=280&v=4",
		"embeds" => array( 
			array(
				"url" => $json["pages"][0]["html_url"],
				"description" => $json["pages"][0]["summary"],
				"title" => $json["pages"][0]["page_name"]. " was " . $json["pages"][0]["action"],
				"type"=> "rich",
				"color" => "6447871",
				"footer" => array(
					"text"=>$json["sender"]["login"], 
					"icon_url" => $json["sender"]["avatar_url"]
					 )
			)
		)
	));

	$ch = curl_init("[Redacted]");
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $na);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_exec($ch);
