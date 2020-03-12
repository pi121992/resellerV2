<?php

namespace App\plexAdmin;

class plex{

    public $token="cpbG1drUFav1XMbEiMUc";
    public $ip="http://95.217.42.31:32400";

    function email_is_valid($email,$method = 'POST', $args = false)
		{
			$url='https://plex.tv/api/users/validate?invited_email='.$email.'&X-Plex-Token='.$this->token;
			$postdata = ($args) ? json_encode($args) : '';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($postdata)));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		

		preg_match_all('|status="(.*?)"|', $response, $matches);
        if($matches[1][0]=="Valid user"){
            return 1;
        }else{
            return 0;
        }
		
        }

        
    public function get_server_id(){

        $info=file_get_contents($this->ip."/servers?X-Plex-Token=".$this->token);
        $xml=simplexml_load_string($info);
        return $xml->Server[0]['machineIdentifier'];
        }
    public function get_library_id(){
         //echo "https://plex.tv/api/servers/".$this->get_server_id()."?X-Plex-Token=".$this->token;
       $library_id=file_get_contents("https://plex.tv/api/servers/".$this->get_server_id()."?X-Plex-Token=".$this->token);
        preg_match_all('|id="(.*?)".*?type="(.*?)"\stitle="(.*?)"|',$library_id,$matches);
        return $matches;

    }

    public function get_id_pending($email){
        $file=file_get_contents('https://plex.tv/api/invites/requested?X-Plex-Token='.$this->token);
        preg_match_all('|Invite\sid="(.*?)".*?email="('.$email.')"|',$file,$matches);
        return $matches[1][0];

    }


    function send_request($url,$method){
        # code...
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
return $curlout = curl_exec($ch);
curl_close($ch);
}


function delete_user($id)
{

     $estado=0;
     $noAmigo=0;
     $noPendiente=0;
      $url_to_delete="https://plex.tv/api/friends/".$id."?X-Plex-Token=".$this->token;

    if(strpos($this->send_request($url_to_delete,"DELETE"), "403") >0){
        $url_delete_pendientes="https://plex.tv/api/invites/requested/".$id.""
                . "?friend=1&server=1&home=0&X-Plex-Product=Plex%20Web&X-Plex-Version=4.10.1&X-Plex-Client-Identifier=5kqjugsbl3hii8pblojvicdd&X-Plex-Platform=Chrome&X-Plex-Platform-Version=77.0&X-Plex-Sync-Version=2&X-Plex-Features=external-media%2Cindirect-media&X-Plex-Model=hosted&X-Plex-Device=Windows&X-Plex-Device-Name=Chrome&X-Plex-Device-Screen-Resolution=812x625%2C1366x768&X-Plex-Token=".$this->token."&X-Plex-Language=es";
        
        $noAmigo=1;
        
    }
    if($noAmigo){
       
            if(strpos($this->send_request($url_delete_pendientes,"DELETE"), "404")>0) {

                $noPendiente=1;
            }

        }


        if($noAmigo && $noPendiente){
            //echo "No eres Amigo de este Usuario";
            return 0;
        }else if ($noAmigo==false){
            //echo "Se elimino de la lista de tus amigos";
            return 1;

        }else if ($noPendiente==false){
            //echo "Se elimino de la lista de pendientes";
            return 1;
        }
 
   
}

   
    public function add_email($username = '',$libs = [])
	{
		function request_add($url, $method = 'GET', $args = false)
		{
			$postdata = ($args) ? json_encode($args) : '';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($postdata)));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		return ($response);
		}

	
		$http_link = 'https://plex.tv/api/servers/'.$this->get_server_id().'/shared_servers?X-Plex-Token='.$this->token;
		$http_body = array(
            "server_id" => $this->get_server_id(),
            "shared_server" => array(
            "library_section_ids" => $libs,
            "invited_email" => $username,
            "sharing_settings" => json_decode('{}')
                )
            );
				
				$respuesta=request_add($http_link,"POST", $http_body);

				preg_match_all('|shared="(.*?)"|', $respuesta,$matches);
               if(isset($matches[1][0])){
               	 return 1;
               }else{
               	 return 0;
               }

    }
    
    public function library(){
        $url_seccion_id='https://plex.tv/api/servers/'.$this->get_server_id().'?X-Plex-Token='.$this->token;
      $file=file_get_contents($url_seccion_id);
      preg_match_all('|Section\sid="(.*?)".*?title="(.*?)"|',$file,$matches);
      return $matches;
    }

    public function update($email_nuevo,$id,$lib){
             
                if($this->email_is_valid($email_nuevo)){
                    
                    $this->delete_user($id);
                    $this->add_email($email_nuevo,$lib);
                    return 1;

                }
              
    }
   
}




?>