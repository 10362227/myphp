<?php
shell_exec("echo 888888477777777388888861983872773664666>  /dev/null ");
// https://*****.onrender.com/vimeo.php， onrender下载这个proxy.php并重命名为vimeo.php
$t1 = microtime(true);


ini_set('display_errors','off');
date_default_timezone_set('PRC');
$link=$_GET["link"]; 
$url=$_GET["url"]; 
$ref=$_GET["ref"]; 
$token=$_GET["token"];
$name=$_GET["name"];
$org=$_GET["org"];


if  (strstr($link, "http")){ 
    
    $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $link);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_MAXCONNECTS, 30);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);

$res = curl_exec($ch);

curl_close($ch);
    $res = preg_replace('/^$|.*You Have been banned.*/',$_SERVER['HTTP_HOST'].' 抓hash时出错'.$link, $res); 
    echo $res;
    exit;
}







$id = preg_replace('/.+?\/([0-9]{1,9}).*/','$1', $url); 
//echo $id;
//exit;

//如果是hash链接
if (strstr($url, "?h=")){    
      $result = shell_exec("curl --max-time 30 --speed-time 10 --speed-limit 10 -m 30 --connect-timeout 30 $url "); 

    
$res = preg_replace('/[\s\S]*<script>window.playerConfig = (.*)<\/script>[\s\S]*/','$1', $result); //删除无效数据，提取json数据
$data = json_decode($res, true);

$title1 = preg_replace('/[\s\S]*?\<title\>([\s\S]*?)\<\/title\>[\s\S]*/','$1', $result);
$title = $data['video']['title'];
$author_name = $data['video']['owner']['name']; 
$account_type = $data['video']['owner']['account_type']; 
$duration = $data['video']['duration']; 
$thumbnail_url = $data['video']['thumbs']['base']; 
$uri = $data['video']['share_url']; 
    
   
   
 if (strstr($result, "thumbnail")){
     
     
  echo  'title>'.$title1.' '.$title.'  from '.$author_name.'</title><br>"share_url":"'.$uri.'""duration":'.$duration.',"account_type":"'.$account_type.'","name":"'.$author_name.'"<br><img src="'.$thumbnail_url.'?mw=240"  alt="img" ><br>';
}else if (strstr($result, "this video cannot be played here") ){  //如果出现403
 
  $url = preg_replace('/player\.|video\//','', $url);
  $url = preg_replace('/\?h\=/','/', $url);
  echo $url; 
    
}
}











//如果是非hash链接
else {

result=$(curl 'https://player.vimeo.com/video/'$id -H 'Referer: '$ref --compressed);
 echo "第一次$result";
exit;


if ($org == 1 ) {echo $result; exit;} //如果url添加&org=1，则输出原始内容

$res = preg_replace('/[\s\S]*<script>window.playerConfig = (.*)<\/script>[\s\S]*/','$1', $result); //删除无效数据，提取json数据
$data = json_decode($res, true);

$title1 = preg_replace('/[\s\S]*?\<title\>([\s\S]*?)\<\/title\>[\s\S]*/','$1', $result);
$title = $data['video']['title'];
$author_name = $data['video']['owner']['name']; 
$account_type = $data['video']['owner']['account_type']; 
$duration = $data['video']['duration']; 
$thumbnail_url = $data['video']['thumbs']['base']; 
$uri = $data['video']['share_url']; 







$array = array( "https://www.colorcollective.com", 
"https://blackdogfilms.com/",  
"https://aviddiva.com/",           
"https://www.dearcut.com/",          
"https://iconoclast.tv",  
"https://themill.com",  
"https://saint-george.tv/",       
"https://www.treyfanjoy.com/", 
"https://www.pulsefilms.com", 
"https://boyinthecastle.com", 
"https://www.mathieuplainfosse.com", 
"https://www.finalcut-edit.com", 
"https://therapystudios.com", 
"https://www.305films.com", 
"https://electrictheatre.tv", 
"https://www.tenthree.co.uk",
"https://samuelbayer.com/",
"https://www.davidbaumeditor.com",
"https://ways-means.co",
"https://trimediting.com",
"https://makemakeentertainment.com",
"https://www.jonasakerlund.com",
"https://www.romanwhite.com",
"https://www.kaisaul.com",
"https://coffeeand.tv/",
"https://visionfilmco.com",
"https://www.schemeengine.com",
"https://believemedia.com",
"https://www.resetcontent.com",
"https://modernpost.com/", 
"https://tenthplanet.net" ); 



$array_chunked = array_chunk($array, ceil(count($array) / 3));

$array1 = $array_chunked[0];
$array2 = $array_chunked[1];
$array3 = $array_chunked[2];






//新方法新方法新方法新方法新方法新方法新方法新方法新方法新方法新方法

 if (strstr($result, "thumbnail")){
     
     
  echo  'title>'.$title1.' '.$title.'  from '.$author_name.'</title><br>"share_url":"'.$uri.'""duration":'.$duration.',"account_type":"'.$account_type.'","name":"'.$author_name.'"<br><img src="'.$thumbnail_url.'?mw=240"  alt="img" ><br>';
}else if (strstr($result, "this video cannot be played here") ){  //如果出现403
    
    
    


$loop_count = count($array) / 3;
for ($i = 0; $i < $loop_count; $i++) {
  $ref1 = $array1[$i];$ref1 = empty($ref1) ? "无效" : $ref1;
  $ref2 = $array2[$i];$ref2 = empty($ref2) ? "无效" : $ref2;
  $ref3 = $array3[$i];$ref3 = empty($ref3) ? "无效" : $ref3;
  $curl_cmd = "wget -O -   https://player.vimeo.com/video/$id & wget -O - --referer=$ref2 https://player.vimeo.com/video/$id & wget -O - --referer=$ref3 https://player.vimeo.com/video/$id 
  ";
 #echo $curl_cmd;
  $result = shell_exec($curl_cmd);
  

    
    
    
    
    
    if (strstr($result, "thumbnail")){
        
$res = preg_replace('/[\s\S]*<script>window.playerConfig = (.*)<\/script>[\s\S]*/','$1', $result); //删除无效数据，提取json数据
$data = json_decode($res, true);

$title1 = preg_replace('/[\s\S]*?\<title\>([\s\S]*?)\<\/title\>[\s\S]*/','$1', $result);
$title = $data['video']['title'];
$author_name = $data['video']['owner']['name']; 
$account_type = $data['video']['owner']['account_type']; 
$duration = $data['video']['duration']; 
$thumbnail_url = $data['video']['thumbs']['base']; 
$uri = $data['video']['share_url']; 


        echo  'title>'.$title1.' '.$title.'  from '.$author_name.'</title><br>"share_url":"'.$uri.'""duration":'.$duration.',"account_type":"'.$account_type.'","name":"'.$author_name.'"<br><img src="'.$thumbnail_url.'?mw=240"  alt="img" ><br>';
      break; 
   
    }
   
}
  if (!strstr($result, "thumbnail")){
      echo $id."有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref有ref"; 
     }

 
 
}

 

else if (strstr($result, "This video does not exist.")) {
     echo "https://vimeo.com/api/oembed.json?url=https://vimeo.com/".$id."
     out=".$id;  //404不管三七二十一全部反馈https://vimeo.com/api/oembed.json?url=https://vimeo.com/$id
}

else

{  //如果不是403，也不包含avc_url，那就是其他的了，比如完全隐藏、有密码、真人验证、被封提示等等，这种情况下，验证码和被封提示被替换成空（便于被识别失败的链接），其他则替换成10362227
   
    if (strstr($result, "You Have been banned.")  || strstr($result, "CAPTCHA Challenge") ) { $result = preg_replace('/[\s\S]*/','', $result);}//如果有验证码或者被封，则输出为空
    $result = str_replace($result, '103622271036222710362227103622271036222710362227103622271036222710362227103622271036222710362227103622271036222710362227103622271036222710362227', $result); //只要出现字符，就全部替换成10362227

    echo $result;}
}


$t2 = microtime(true);
//echo '程序耗时'.round($t2-$t1,3).'秒';
