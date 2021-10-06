<?php 
function encode($data) { 
	return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 

	function slug($string){
      $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
     return $slug;
     }

$connect = new mysqli("localhost", "root", "", "zahi_om_fashion");


$query = "SELECT cate_id,cate_slug FROM `tbl_category` WHERE `cate_status`='1' AND `cate_remove`='0'";

$result = mysqli_query($connect, $query);

$base_url = "http://localhost/zahifashion.com";

header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
while($row = mysqli_fetch_array($result))
{
 echo '<url>' . PHP_EOL;
 echo '<loc>'.$base_url.'category/'.encode($row["cate_id"]).'/'. $row["cate_slug"] .'</loc>' . PHP_EOL;
 echo '<priority>0.8</priority>' . PHP_EOL;
  echo '<lastmod>2021-04-14T16:01:39+05:30</lastmod>' . PHP_EOL;
  echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
}

$squery = "SELECT scate_id,scate_slug FROM `tbl_sub_category` WHERE `scate_status`='1' AND `scate_remove`='0'";
$sresult = mysqli_query($connect, $squery);
while($srow = mysqli_fetch_array($sresult))
{
 echo '<url>' . PHP_EOL;
 echo '<loc>'.$base_url.'sub-category/'.encode($srow["scate_id"]).'/'. $srow["scate_slug"] .'</loc>' . PHP_EOL;
 echo '<priority>0.8</priority>' . PHP_EOL;
  echo '<lastmod>2021-04-14T16:01:39+05:30</lastmod>' . PHP_EOL;
  echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
}
$cquery = "SELECT child_id,child_slug FROM `tbl_child_category` WHERE `child_status`='1' AND `child_remove`='0'";
$cresult = mysqli_query($connect, $cquery);
while($crow = mysqli_fetch_array($cresult))
{
 echo '<url>' . PHP_EOL;
 echo '<loc>'.$base_url.'child-category/'.encode($crow["child_id"]).'/'. $crow["child_slug"] .'</loc>' . PHP_EOL;
 echo '<priority>0.8</priority>' . PHP_EOL;
  echo '<lastmod>2021-04-14T16:01:39+05:30</lastmod>' . PHP_EOL;
  echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
}
$pquery = "SELECT p_id,p_name FROM `tbl_product` WHERE `p_status`='1' AND `p_approval_status`='0'";
$presult = mysqli_query($connect, $pquery);
while($prow = mysqli_fetch_array($presult))
{
 echo '<url>' . PHP_EOL;
 echo '<loc>'.$base_url.'product/'.encode($prow["p_id"]).'/'. slug($prow["p_name"]) .'</loc>' . PHP_EOL;
 echo '<priority>0.8</priority>' . PHP_EOL;
  echo '<lastmod>2021-04-14T16:01:39+05:30</lastmod>' . PHP_EOL;
  echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
}

echo '</urlset>' . PHP_EOL;

?>
