<?php 
include 'Function.php';
include 'Design/Header_Home.php';
?>
<?php  
$str=mysql_fetch_array(mysql_query("select * from seo s,pages p where p.page_id=s.page_id and p.page_id=2 limit 1"));
$title=$str['stitle'];
$keywords=$str['keywords'];
$desc=$str['description'];
head($title,$keywords,$desc);
Sections();
Sponsers();
?>
<?php
include 'Design/Footer.php';
?>

