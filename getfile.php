<?
$fname=$_GET['file.json'];
$fsize=filesize('secret_data/'.$fname);
$fdown='secret_data/'.$fname;
if (getenv('HTTP_RANGE')=="") {
  $f=fopen($fdown, 'r');

  header("HTTP/1.1 200 OK");
  header("Connection: close");
  header("Content-Type: application/octet-stream");
  header("Accept-Ranges: bytes");
  header("Content-Disposition: Attachment; filename=".$fname);
  header("Content-Length: ".$fsize); 

  while (!feof($f)) {
    if (connection_aborted()) {
      fclose($f);
      break;
    }
    echo fread($f, 10000);
    sleep(1);
  }
  fclose($f);
}
else {
  preg_match ("/bytes=(\d+)-/", getenv('HTTP_RANGE'), $m);
  $csize=$fsize-$m[1];  
  $p1=$fsize-$csize;    
  $p2=$fsize-1;         

  $f=fopen($fdown, 'r');

  header("HTTP/1.1 206 Partial Content");
  header("Connection: close");
  header("Content-Type: application/octet-stream");
  header("Accept-Ranges: bytes");
  header("Content-Disposition: Attachment; filename=".$fname);
  header("Content-Range: bytes ".$p1."-".$p2."/".$fsize);
  header("Content-Length: ".$csize);

  fseek ($f, $p1);
  while (!feof($f)) {
    if (connection_aborted()) {
      fclose($f);
      break;
    }
    echo fread($f, 10000);
    sleep(1);
  }
  fclose($f);
}
?>