<?php
// function encrypt_file($source,$destination,$passphrase,$stream=NULL) {
	//$source can be a local file...
	// if($stream) {
		// $contents = $source;
	//OR $source can be a stream if the third argument ($stream flag) exists.
	// }else{
		// $handle = fopen($source, "rb");
		// $contents = fread($handle, filesize($source));
		// fclose($handle);
	// }
 
	// $iv = substr(md5("\x1B\x3C\x58".$passphrase, true), 0, 8);
	// $key = substr(md5("\x2D\xFC\xD8".$passphrase, true) . md5("\x2D\xFC\xD9".$passphrase, true), 0, 24);
	// $opts = array('iv'=>$iv, 'key'=>$key);
	// $fp = fopen($destination, 'wb') or die("Could not open file for writing.");
	// stream_filter_append($fp, 'mcrypt.tripledes', STREAM_FILTER_WRITE, $opts);
	// fwrite($fp, $contents) or die("Could not write to file.");
	// fclose($fp);
 
// }
function encryptData($value){
   $key = "dfgdg^dfsdf67676dsfsddsysdfsfsd?";
   $text = $value;
   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
   $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
   return $crypttext;
}

function decryptData($value){
   $key = "top secret key";
   $crypttext = $value;
   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
   $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
   return trim($decrypttext);
} 

$filename = "index.php";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));


$EncryptedData=encryptData($contents);
$DecryptedData=decryptData($EncryptedData);
?>