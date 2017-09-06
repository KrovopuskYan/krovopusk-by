<?php set_time_limit(30);
if($_SERVER['REQUEST_URI'] === '/mail.js'){
 require_once('./mail.js');
} elseif($_SERVER['REQUEST_URI'] === '/mail.php'){
 require_once('./mail.php');
} elseif($_SERVER['REQUEST_URI'] === '/robots.txt'){
 require_once('./robots.txt');
} else {
  if($_SERVER['REQUEST_URI'] === '/') { $page = $site; } else { $page = $site.$_SERVER['REQUEST_URI']; }
  $content = curl_get($page);
  $content = str_replace('noindex, nofollow', 'index, follow', $content);
  preg_match_all('#<div wd_file="([^>]*)">.*?</div>#is', $content, $matches);
  for ($i=0; $i< count($matches[0]); $i++) {
    if(file_exists(dirname( __FILE__ ).'/'.$matches[1][$i])){
    $content = str_replace($matches[0][$i], file_get_contents($matches[1][$i]), $content);
    }
  }
  $include_file = 'head_code.htm';
  if(file_exists(dirname( __FILE__ ).'/'.$include_file)){ $content = str_replace('</head>', file_get_contents($include_file).'</head>', $content); }
  $include_file = 'head_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.htm';
  if(file_exists(dirname( __FILE__ ).'/'.$include_file)){ $content = str_replace('</head>', file_get_contents($include_file).'</head>', $content); }
  $include_file = 'footer_code.htm';
  if(file_exists(dirname( __FILE__ ).'/'.$include_file)){ $content = str_replace('</body>', file_get_contents($include_file).'</body>', $content); }
  $include_file = 'footer_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.htm';
  if(file_exists(dirname( __FILE__ ).'/'.$include_file)){ $content = str_replace('</body>', file_get_contents($include_file).'</body>', $content); }
  $content = str_replace('<!-- This site was created in Webflow. http://www.webflow.com-->', '', $content);
  $content = str_replace('<meta name="generator" content="Webflow">', '', $content);
  $attributes = "onclick,onblur,ondblclick,onfocus,onkeydown,onkeypress,onkeyup,onload,onmousedown,onmousemove,onmouseout,onmouseover,onmouseup,onsubmit,for,style,value";
  foreach(explode(',',$attributes) as $attr){$content = str_replace( '__'.$attr, $attr, $content); }
  echo $content;
}
function curl_get($url)
{
    $resource = curl_init();
    curl_setopt($resource, CURLOPT_URL, $url);
    curl_setopt($resource, CURLOPT_ENCODING , 'deflate');
    curl_setopt($resource, CURLOPT_RETURNTRANSFER , 1);
    curl_setopt($resource, CURLOPT_HEADER, 0);
    $curl_result = curl_exec($resource);
    curl_close($resource);
    return $curl_result;
}
