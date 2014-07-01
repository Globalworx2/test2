<?php 
include 'Design/Header_Inner.php';
include 'config/lib.php';
error_reporting(0);
$page_id=$_REQUEST['id'];
$str=mysql_fetch_array(mysql_query("select * from seo s,pages p where p.page_id=s.page_id and p.page_id=$page_id limit 1"));

$title_seo=$str['stitle'];
$keywords=$str['keywords'];
$desc=$str['description'];

head($title_seo,$keywords,$desc);



$p=mysql_fetch_array(mysql_query("select * from pages where page_id=$page_id"));

$content=$p['content'];
?>

           
       <div class="col-lg-4">
       <div class="panel panel-default">
       <div class="panel-body">
       <div class="list-group">
       <?php $str=mysql_query("select * from pages where pid=0 and page_id<>2 and page_id<> 3");
	   while($p=mysql_fetch_array($str)){
	   $id=$p['page_id'];
	   $name=$p['name'];	
	   $pid=$p['pid'];
	   $str2=mysql_fetch_array(mysql_query("select * from pages where pid=$id limit 1"));
	   $new=$str2['page_id'];
	   $hre="#";
	   if($new=='')
	   {
	   	$hre="Page.php?id=$id";
	   }
	   else {
		   $hre="#";
	   }
	   
	   ?>
	   <a href="<?php echo $hre ?>" class="list-group-item"  onclick="disp('<?php echo $id ?>');">
	   <i class="fa fa-warning fa-fw"></i> <?php echo $name ?>
       <span class="pull-right text-muted small"><em>
       <span >
       <img src="img/ico2.png">
       </span>
       </em>
       </span>
       </a>
       <?php  get_submenu($id) ; }?>
       </div>
       </div>
       </div>
       </div>
    
    
      <div class="col-lg-8">
                    <div class="panel panel-default body-content-bg">
                        <div class="body-content">
                          <div class="featurette" id="contact">
                           <img class="featurette-image img-circle img-responsive pull-right" src="">
                             
                              <h2 class="featurette-heading"><?php echo $title ?>
                                </h2>
                                 <p class="lead"><?php echo $content ?></p>
                                  </div> 
                                   </div>
                                     </div>
                                      </div>
                                       </div>
             <!-- footer -->
                                           
<?php
function get_submenu($id)
{
	?>
	   <div class="list-group" id="<?php echo $id?>" style="display:none;">
       <?php $str=mysql_query("select * from pages where pid=$id ");
	   while($p=mysql_fetch_array($str)){
	   $id=$p['page_id'];
	   $name=$p['name'];	
	   ?>
	   <a href="Page.php?id=<?php echo $id ?>" class="list-group-item" style="padding-left: 40px;">
       <i class="fa fa-warning fa-fw"></i> <?php echo $name ?>
       <span class="pull-right text-muted small"><em>
       <span >
       <img src="img/ico2.png">
       </span>
       </em>
       </span>
       </a>
       <?php }?>
       </div>
	<?php
}
include 'Design/Footer.php';


?>
<script type="text/javascript">
	function disp(id)
	{
		
		   var view=document.getElementById(id);
       
        	if(view.style.display=="block")
        	{
        		view.style.display="none";
        	}
        	else
        	{
        		view.style.display="block";
        	}
        	
        
        
	}
</script>