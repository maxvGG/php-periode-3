<?php 
// class dbSessie implements SessionHandlerInterface
// {
//     private $link;
	
//     public function open($savePath,$sessionName){
//        	$link = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
//         if($link){
//             $this->link = $link;
//             return true;
//         }else{
//             return false;
//         }
//     }
	
//     public function close() {
//         mysqli_close($this->link);
//         return true;
//     }
	
//     public function read($id) {
// 		$id = mysqli_escape_string($this->link,$id);
//         $result = mysqli_query($this->link,"SELECT vars FROM cms_sessies WHERE sessie_id = '".$id."';");
//         if($row = mysqli_fetch_assoc($result)){
//             return $row['vars'];
//         }else{
//             return "";
//         }
//     }
//     public function write($id, $data) {
// 		$id = mysqli_escape_string($this->link,$id);
// 		$data = mysqli_escape_string($this->link,$data);
//         $result = mysqli_query($this->link,"REPLACE INTO cms_sessies SET sessie_id = '".$id."', vars = '".$data."', datumtijd = NOW();");
//         if($result){
//             return true;
//         }else{
//             return false;
//         }
//     }
	
//     public function destroy($id) {
// 		$id = mysqli_escape_string($this->link,$id);
//         $result = mysqli_query($this->link,"DELETE FROM cms_sessies WHERE sessie_id ='".$id."';");
//         if($result){
//             return true;
//         }else{
//             return false;
//         }
//     }
	
//     public function gc($maxlifetime) {
// 		$maxlifetime = mysqli_escape_string($this->link,$maxlifetime);
//         $result = mysqli_query($this->link,"DELETE FROM cms_sessies WHERE ((NOW() - datumtijd) > ".$maxlifetime.");");
//         if($result){
//             return true;
//         }else{
//             return false;
//         }
//     }
// }

// $handler = new dbSessie();
// session_set_save_handler($handler,true);
// session_name("TestWebshop");
// ini_set('session.gc_probability', 1);
// ini_set('session.gc_divisor', 1);
// ini_set('session.gc_maxlifetime', 14400);
// ini_set('session.cookie_lifetime', 14400);
// ini_set('session.use_trans_sid', 0);
// ini_set('session.use_only_cookies', 1);
// register_shutdown_function('session_write_close');
// session_start();
?>