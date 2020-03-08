<?php
class emby 
 {  
 	function user_add($ip,$api_key, $name,$method = 'POST', $args = false)
		{
           $url=$ip."/emby/Users/New?api_key=".$api_key;

			$datos = array(
				'name' =>$name
				 );

			$fields_string = http_build_query($datos);
			$cURLConnection = curl_init($url);
			curl_setopt($cURLConnection, CURLOPT_POSTFIELDS,$fields_string);
			curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

			 $apiResponse = curl_exec($cURLConnection);
			return $apiResponse;
			curl_close($cURLConnection);

		}


	function user_config($ip,$api_key,$userId,$method = 'POST', $args = false)
		{

			$url=$ip."/emby/Users/".$userId."/Policy?api_key=".$api_key;
			$datos = array(
				'EnableContentDownloading' =>false,
				'EnableSubtitleDownloading'=>true,
				'EnableMediaConversion'=>false,
				'EnableVideoPlaybackTranscoding'=>false,
				'EnableAudioPlaybackTranscoding'=>false,
				'SimultaneousStreamLimit'=>2
				);

			
			$fields_string = http_build_query($datos);
			$cURLConnection = curl_init($url);
			curl_setopt($cURLConnection, CURLOPT_POSTFIELDS,$fields_string);
			curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

			return  $apiResponse = curl_exec($cURLConnection);
			curl_close($cURLConnection);

		}
 }

?>