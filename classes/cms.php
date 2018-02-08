<?php 
include_once("DBaccess.php");
include_once("../v1/sendPush.php");
use FCMSimple\Message;

class cms extends DBaccess
{	
function tep_draw_edit_link_heading_desc($id)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/text_desc.php?id=".$id."','950','450');\" /></div>";

			
					
		}
	
}

function tep_draw_edit_link_heading_desc123($id)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:fixed;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('admin/text_desc.php?id=".$id."','950','450');\" src=\"images/button_edit.gif\" border=\"0\" /></div>";

			
					
		}
	
}	


function tep_draw_edit_link_heading_desc_dob($id)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('../admin/text_desc.php?id=".$id."','950','450');\" src=\"../images/button_edit.gif\" border=\"0\" /></div>";

			
					
		}
	
}	

function tep_draw_edit_link_heading_desc_flash($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('flash_img.php?sub=".$sub."','950','450');\" src=\"images/button_edit.gif\" border=\"0\" /></div>";

			
					
		}
	
}	
function manages_grace_video($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/manage__video.php?sub=".$sub."','950','450');\" /></div>";

			
					
		}
	
}	
function manages_staff_video($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/staff.php?sub=".$sub."','950','450');\" /></div>";

			
					
		}
	
}	
function manages_main_image_video($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/main_image.php?sub=".$sub."','950','450');\" /></div>";

			
					
		}
	
}
function manages_news_video($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/news.php?sub=".$sub."','950','450');\" /></div>";

			
					
		}
	
}	
function manages_tec_info_edit($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:fixed;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/manage_tec_info.php?sub=".$sub."','950','450');\" /></div>";

			
					
		}
	
}	
function manages_Option_edit($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('admin/opt.php?sub=".$sub."','950','450');\" src=\"images/button_edit.gif\" border=\"0\" /></div>";

			
					
		}
	
}
function manages_own_pho_edit($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('admin/owner-photos.php?sub=".$sub."','950','450');\" src=\"images/button_edit.gif\" border=\"0\" /></div>";

			
					
		}
	
}	


function tep_draw_edit_link_fab($id)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:absolute;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('admin/fab.php?id=".$id."','720','300');\" src=\"images/button_edit.gif\" border=\"0\" /></div>";

			
					
		}
	
}	

function tep_draw_text_desc($id)
{
		$result = $this->get_text_heading($id);		
		
		$temp = html_entity_decode($result[0]['text'],ENT_QUOTES);
		
		if($id=="16" || $id == "17" )
		{
			$temp = str_replace("<p>","",$temp);
			$temp = str_replace("</p>","",$temp);
		}
		
		echo $temp;
}


function tep_draw_substr_text_desc($id,$limit)
{
		$flag=0;
		$result = $this->get_text_heading($id);		
		$temp = $result[0]['text'];
		if(strlen($temp)>$limit)
		{
			$flag=1;
		}
		else
		{
			$flag=0;
		}
		echo substr($temp,0,$limit);
		if($flag==1)
		{
			echo "...";
		}
		return $flag;
		
}

function get_text_heading($id)
{
		$this->connectToDB();
		$query = "select * from text_descriptions where id='$id'";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
}

function get_text_news()
{
		$this->connectToDB();
		$query = "select * from news order by id desc limit 0,2";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
}

function get_text_news_all()
{
		$this->connectToDB();
		$query = "select * from news order by id desc";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
}

function tep_draw_message($message, $flag="default")
{
    if($flag == "success") {
        echo "<div class=\"error-bord\" id=\"errdiv\" style=\"width:100%;text-decoration:none;background-color: #80b65b;border: 1px solid #17270d;padding: 10px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;font-weight: normal;color: #ffffff;\"><span style=\"cursor: pointer; color: #ffffff; font-size: 18px;\" onclick='document.getElementById(\"errdiv\").style.display=\"none\";' title='Close' alt='Close'>[X]</span>  &nbsp;&nbsp;<strong>".$message."</strong></div>";
    } else {
        echo "<div class=\"error-bord\" id=\"errdiv\" style=\"width:100%;text-decoration:none;background-color: #c4262c;border: 1px solid #DD3C10;padding: 10px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;font-weight: normal;color: #ffffff;\"><span style=\"cursor: pointer; color: #ffffff; font-size: 18px;\" onclick='document.getElementById(\"errdiv\").style.display=\"none\";' title='Close' alt='Close'>[X]</span>  &nbsp;&nbsp;<strong>".$message."</strong></div>";
    }

}
function tep_draw_message_cms($message)
{
		echo "<div id=\"errdiv\" style=\"position:absolute;width:100%;text-decoration:none;background-color: #c4262c;border: 1px solid #DD3C10;padding: 10px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;font-weight: normal;color: #ffffff;\"><span style=\"cursor:pointer;color:red;\" onclick='document.getElementById(\"errdiv\").style.display=\"none\";' title='Close' alt='Close'>[X]</span>  &nbsp;&nbsp;<strong>".$message."</strong></div>";	
}

function tep_draw_sessionlable()
{
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
			echo "<div><div style='position:absolute;'><font size='3'><span style='color:#FFF;'><b>Logged on as</b> <a href='admin/options.php' style='color:#FFF'><b>Admin</b></a> | <a href='logout.php' style='color:#FFF;'><b>Logout!</b></a></span></font></div></div>";
		}
	
}	

function tep_draw_sessionlable_dob()
{
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
			echo "<div><div style='position:absolute;'><font size='3'><span style='color:#A1CD41;'><b>Logged on as</b> <a href='../admin/options.php' style='color:#A1CD41'><b>Admin</b></a> | <a href='../logout.php' style='color:#A1CD41;'><b>Logout!</b></a></span></font></div></div>";
		}
	
}	

function get_text_heading_by_id($id)
{
		$result = $this->get_text_heading($id);		
		return $result[0]['text'];
}	

function update_text_heading($id,$text)
{			
		$text = htmlentities($text,ENT_QUOTES);				
		
		$this->connectToDB();
		$query = "update text_descriptions set text='$text' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
/////////////////// simple edit ///////////////////////////////////////////////////	
function update_image_heading($id,$image)
{
		$this->connectToDB();
		if($image != "")
		$this->get_unlink_simple($id);
		$image = htmlentities($image,ENT_QUOTES);	
		$query = "update image_headings set image='$image' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function get_unlink_simple($id)
{
	$res = $this->get_projects_flash_view_unlink_simple($id);
	$file = '../images/headings/'.$res[0]['image'];
	if(file_exists($file))
	unlink($file);
}
function get_projects_flash_view_unlink_simple($id)
{
		$this->connectToDB();
		$query = "select * from image_headings where id='$id'";				
		$result = $this->select($query);
		return $result;
	
}
/////////////////// simple edit ///////////////////////////////////////////////////

function get_image_heading($id)
{
		$this->connectToDB();
		$query = "select * from image_headings where id='$id'";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
}

function tep_draw_edit_link_heading_image($id)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{	
		
		 echo"<div style='position:absolute;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/image_heading.php?id=".$id."','950','450');\" /></div>";


		}
	
}

function image_button_side_bar($id)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{	
		
		 echo"<div style='position:absolute;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/image_heading.php?id=".$id."','950','450');\" /></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";


		}
	
}	

function tep_draw_edit_link_heading_image_dob($id)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{									
			 
			 echo"<div style='position:relative;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('../admin/image_heading.php?id=".$id."','950','450');\" src=\"../images/button_edit.gif\" border=\"0\" /></div>";
			
		}
	
}	

function tep_draw_edit_link_heading_image_con($id)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{									
			 
			 echo"<div style='position:relative;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('admin/image_heading.php?id=".$id."','950','450');\" src=\"images/button_edit.gif\" border=\"0\" /></div>";
			
		}
	
}	

function tep_draw_image_heading($align,$id,$width,$height)
{
	    
		$result = $this->get_image_heading($id);		
		echo'<img align="'.$align.'" src="images/headings/'.$result[0]['image'].'" width="'.$width.'" height="'.$height.'" border="0" />';
}

function tep_draw_image_heading_over($align,$id,$width,$height,$name)
{
	   
		$result = $this->get_image_heading($id);		
		echo'<img align="'.$align.'" name="'.$name.'" src="images/headings/'.$result[0]['image'].'" width="'.$width.'" height="'.$height.'" border="0" />';
}

function tep_draw_image_heading_dob($align,$id,$width,$height)
{
		$result = $this->get_image_heading($id);		
		echo'<img align="'.$align.'" src="../images/headings/'.$result[0]['image'].'" width="'.$width.'" height="'.$height.'" border="0" />';
}

function tep_draw_bg_image_heading($id)
{
		$result = $this->get_image_heading($id);		
		echo'images/headings/'.$result[0]['image'];
}
	
function update_notification_email($email)
{	
		$this->connectToDB();
		$email = htmlentities($email,ENT_QUOTES);
		$result = $this->dml("update notification_emails set email='$email'");
		$this->DBDisconnect();
		return $result;		
}
	
function get_notification_email()
{	
		$this->connectToDB();
		$result = $this->select("select email from notification_emails");
		$this->DBDisconnect();
		return $result[0]['email'];		
}		


function tep_draw_edit_link_projects()
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
										
			
			 echo"<div style='position:absolute;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('admin/projects.php','950','450');\" src=\"images/button_edit.gif\" border=\"0\" /></div>";
			 
			 
			
		}
	
}	

function get_projects()
{
		$this->connectToDB();
		$query = "select * from projects";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
	
function get_project_by_id($id)
{
		$this->connectToDB();
		$query = "select * from projects where id = '".$id."'";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}	


////////////////////////////////// Multipal Image /////////////////////////////////
function update_image_heading_index($id,$txt,$hed,$dat,$img)
{
		$this->connectToDB();
		if($img != "")
		$this->get_unlink($id);
		$hed = htmlentities($hed,ENT_QUOTES);
		$txt = htmlentities($txt,ENT_QUOTES);
		$dat = htmlentities($dat,ENT_QUOTES);
		$img = htmlentities($img,ENT_QUOTES);
		$query = "update news set hed='$hed',txt='$txt',dat='$dat',img='$img' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function update_image_heading_index_news($id,$txt,$hed,$dat)
{
		$this->connectToDB();
		$txt = htmlentities($txt,ENT_QUOTES);
		$hed = htmlentities($hed,ENT_QUOTES);
		$dat = htmlentities($dat,ENT_QUOTES);
		$query = "update news set hed='$hed',txt='$txt',dat='$dat' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function insert_image_heading($txt,$hed,$dat,$img)
{
		$this->connectToDB();
		$txt = htmlentities($txt,ENT_QUOTES);
		$hed = htmlentities($hed,ENT_QUOTES);
		$dat = htmlentities($dat,ENT_QUOTES);
		$img = htmlentities($img,ENT_QUOTES);
		$query = "insert into news set hed='$hed',txt='$txt',dat='$dat',img='$img'";			
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function delete_projects_main_index($id)
{
		$this->connectToDB();
		$this->get_unlink($id);
		$query = "delete from news where id=$id";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;	
}
function get_unlink($id)
{
	$res = $this->get_projects_flash_view_unlink($id);
	$file = '../images/headings/news/'.$res[0]['img'];
	if(file_exists($file))
	unlink($file);
}
function get_projects_flash_view($id)
{
		$this->connectToDB();
		$query = "select * from  `video` where id='$id'";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}

function get_projects_flash_view_staff($id)
{
		$this->connectToDB();
		$query = "select * from  `staff` where id='$id'";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function get_grance_all()
{
		$this->connectToDB();
		$query = "select * from  `video` where add_to_home='1' order by id desc";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function get_projects_flash_view_grace_all()
{
		$this->connectToDB();
		$query = "select * from  `video` where add_to_home='1' order by id desc limit 0,1";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function get__grace_all()
{
		$this->connectToDB();
		$query = "select * from  `video` order by id desc";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function get_press($id)
{
		$this->connectToDB();
		$query = "select * from prs where id='$id'";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}

function get_projects_flash_view_unlink($id)
{
		$this->connectToDB();
		$query = "select * from news where id='$id'";				
		$result = $this->select($query);
		return $result;
	
}
///////////////////////////////////////// manage option ////////////////////////////////
function update_image_heading_index_option_img($id,$model,$tit,$avail,$image)
{
		$this->connectToDB();
		$this->get_unlink_option($id);
		$model = htmlentities($model,ENT_QUOTES);
		$tit = htmlentities($tit,ENT_QUOTES);
		$avail = htmlentities($avail,ENT_QUOTES);
		$image = htmlentities($image,ENT_QUOTES);
		$query = "update options set model='$model',tit='$tit',avail='$avail',image='$image' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function update_image_heading_index_option($id,$model,$tit,$avail)
{
		$this->connectToDB();
		$model = htmlentities($model,ENT_QUOTES);
		$tit = htmlentities($tit,ENT_QUOTES);
		$avail = htmlentities($avail,ENT_QUOTES);
		$query = "update options set model='$model',tit='$tit',avail='$avail' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function insert_image_heading_option($model,$tit,$avail,$image)
{
		$this->connectToDB();
		$model = htmlentities($model,ENT_QUOTES);
		$tit = htmlentities($tit,ENT_QUOTES);
		$avail = htmlentities($avail,ENT_QUOTES);
		$image = htmlentities($image,ENT_QUOTES);
		$query = "insert into options set model='$model',tit='$tit',avail='$avail',image='$image'";			
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function delete_projects_main_index_option($id)
{
		$this->connectToDB();
		$this->get_unlink_option($id);
		$query = "delete from options where id=$id";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;	
}
function get_unlink_option($id)
{
	$res = $this->get_projects_flash_view_unlink_option($id);
	$file = '../images/'.$res[0]['image'];
	$file1 = '../thumbs/'.$res[0]['image'];
	unlink($file1);
	unlink($file);
	
}
function get_projects_flash_view_unlink_option($id)
{
		$this->connectToDB();
		$query = "select * from options where id='$id'";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_unlink_option_front()
{
		$this->connectToDB();
		$query = "select * from options";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_opt($id)
{
		$this->connectToDB();
		$query = "select * from options where id='$id'";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function get_projects_flash_view_own($id)
{
		$this->connectToDB();
		$query = "select * from own_pho where id='$id'";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function get_projects_flash_view_all_op($StartRow,$PageSize)
{
		$this->connectToDB();
		$query = "select * from options ORDER BY  id asc LIMIT $StartRow,$PageSize";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function manages_Galery_edit($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<br /><div style='position:fixed;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/opt.php?sub=".$sub."','950','450');\" /></div>";

			
					
		}
	
}	
////////////////////////////////////////// manage option ////////////////////////////////////
///////////////////////////////////////// manage  Tecnical Information ////////////////////////////////
function update_image_heading_tec_info($id,$tit,$pdf)
{
		$this->connectToDB();
		$this->get_unlink_tec_info($id);
		$tit = htmlentities($tit,ENT_QUOTES);
		$pdf = htmlentities($pdf,ENT_QUOTES);
		$query = "update tec_info set tit='$tit',pdf='$pdf' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function index_tec_info($id,$tit)
{
		$this->connectToDB();
		$tit = htmlentities($tit,ENT_QUOTES);
		$query = "update tec_info set tit='$tit' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function insert_image_heading_tec_info($tit,$pdf)
{
		$this->connectToDB();
		$tit = htmlentities($tit,ENT_QUOTES);
		$pdf = htmlentities($pdf,ENT_QUOTES);
		$query = "insert into tec_info set tit='$tit',pdf='$pdf'";			
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function delete_projects_main_index_tec_info($id)
{
		$this->connectToDB();
		$this->get_unlink_tec_info($id);
		$query = "delete from tec_info where id=$id";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;	
}
function get_unlink_tec_info($id)
{
	$res = $this->get_projects_flash_view_unlink_tec_info($id);
	$file = '../images/headings/writer_song/'.$res[0]['pdf'];
	if(file_exists($file))
	unlink($file);
}
function get_projects_flash_view_unlink_tec_info($id)
{
		$this->connectToDB();
		$query = "select * from tec_info where id='$id'";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_unlink_tec_info_front()
{
		$this->connectToDB();
		$query = "select * from tec_info";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_all_tec_info($StartRow,$PageSize)
{
		$this->connectToDB();
		$query = "select * from tec_info ORDER BY  id asc LIMIT $StartRow,$PageSize";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
////////////////////////////////////////// manage Tecnical Information ////////////////////////////////////

///////////////////////////////////////// manage  video ////////////////////////////////
function update_image_heading_video($id,$tit,$pdf)
{
		$this->connectToDB();
		$this->get_unlink_video($id);
		$tit = htmlentities($tit,ENT_QUOTES);
		$pdf = htmlentities($pdf,ENT_QUOTES);
		$query = "update tec_info1 set tit='$tit',pdf='$pdf' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function index_video($id,$tit)
{
		$this->connectToDB();
		$tit = htmlentities($tit,ENT_QUOTES);
		$query = "update tec_info1 set tit='$tit' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function insert_image_heading_video($tit,$pdf)
{
		$this->connectToDB();
		$tit = htmlentities($tit,ENT_QUOTES);
		$pdf = htmlentities($pdf,ENT_QUOTES);
		$query = "insert into tec_info1 set tit='$tit',pdf='$pdf'";			
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function delete_projects_main_index_video($id)
{
		$this->connectToDB();
		$this->get_unlink_tec_info($id);
		$query = "delete from tec_info1 where id=$id";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;	
}
function get_unlink_video($id)
{
	$res = $this->get_projects_flash_view_unlink_video($id);
	$file = '../player/'.$res[0]['pdf'];
	if(!empty($res[0]['pdf']))
	if(!unlink($file))
	{echo no;exit;}
}
function get_projects_flash_view_unlink_video($id)
{
		$this->connectToDB();
		$query = "select * from tec_info1 where id='$id'";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_video_front()
{
		$this->connectToDB();
		$query = "select * from tec_info1";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_all_video($StartRow,$PageSize)
{
		$this->connectToDB();
		$query = "select * from tec_info1 ORDER BY  id asc LIMIT $StartRow,$PageSize";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function manages_video_edit($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:fixed;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/manage_video.php?sub=".$sub."','950','450');\" /></div>";

			
					
		}
	
}	
////////////////////////////////////////// manage video ////////////////////////////////////

///////////////////////////////////////// manage  Press ////////////////////////////////
function update_image_heading_press($id,$tit,$tit1,$tit2,$tit3,$tit4,$img1,$img2,$img3)
{
		$this->connectToDB();
		//$this->get_unlink_press($id);
		$tit = htmlentities($tit,ENT_QUOTES);
		$tit1 = htmlentities($tit1,ENT_QUOTES);
		$tit2 = htmlentities($tit2,ENT_QUOTES);
		$tit3 = htmlentities($tit3,ENT_QUOTES);
		$tit4 = htmlentities($tit4,ENT_QUOTES);
		$img1 = htmlentities($img1,ENT_QUOTES);
		$img2 = htmlentities($img2,ENT_QUOTES);
		$img3 = htmlentities($img3,ENT_QUOTES);
		$query = "update prs set ";
		if(!empty($tit2))
		$query .= "pdf_tit_2='$tit2'";
		if(!empty($tit))
		$query .= ",pdf_tit='$tit'";
		if(!empty($tit1))
		$query .= ",pdf_tit_1='$tit1'";
		if(!empty($tit3))
		$query .= ",pdf_tit_3='$tit3'";
		if(!empty($tit4))
		$query .= ",pdf_tit_4='$tit4'";
		if(!empty($img1))
		$query .= ",img1='$img1'";
		if(!empty($img2))
		$query .= ",img2='$img2'";
		if(!empty($img3))
		$query .= ",img3='$img3'";
		$query .=" where id='$id'";	//exit($query);			
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function index_press($id,$tit)
{
		$this->connectToDB();
		$tit = htmlentities($tit,ENT_QUOTES);
		$query = "update prs set tit='$tit' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function insert_image_heading_press($tit,$tit1,$tit2,$tit3,$tit4,$img1,$img2,$img3)
{
		$this->connectToDB();
		$tit = htmlentities($tit,ENT_QUOTES);
		$tit1 = htmlentities($tit1,ENT_QUOTES);
		$tit2 = htmlentities($tit2,ENT_QUOTES);
		$tit3 = htmlentities($tit3,ENT_QUOTES);
		$tit4 = htmlentities($tit4,ENT_QUOTES);
		$img1 = htmlentities($img1,ENT_QUOTES);
		$img2 = htmlentities($img2,ENT_QUOTES);
		$img3 = htmlentities($img3,ENT_QUOTES);
		$query = "insert into prs set pdf_tit='$tit',pdf_tit_1='$tit1',pdf_tit_2='$tit2',pdf_tit_3='$tit3',pdf_tit_4='$tit4',img1='$img1',img2='$img2',img3='$img3'";			
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function delete_projects_main_index_press($id)
{
		$this->connectToDB();
		$this->get_unlink_press($id);
		$query = "delete from prs where id=$id";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;	
}
function get_unlink_press($id)
{
	$res = $this->get_projects_flash_view_unlink_press($id);
	$file1 = '../images/headings/press/tit/'.$res[0]['img1'];
	$file4 = '../images/headings/press/tit/'.$res[0]['pdf_tit_4'];
	$file2 = '../images/headings/press/log/'.$res[0]['img2'];
	if(file_exists($file1))
	unlink($file1);
	if(file_exists($file4))
	unlink($file4);
	if(file_exists($file2))
	unlink($file2);
		
}
function get_projects_flash_view_unlink_press($id)
{
		$this->connectToDB();
		$query = "select * from prs where id='$id'";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_press_front()
{
		$this->connectToDB();
		$query = "select * from prs";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_all_press($StartRow,$PageSize)
{
		$this->connectToDB();
		$query = "select * from prs ORDER BY  id asc LIMIT $StartRow,$PageSize";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function manages_press_edit($sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{
																								
			 
			 echo"<div style='position:fixed;'><input name=\"button\" type=\"button\" class=\"button\" onmouseover=\"this.className='button-on'\" onmouseout=\"this.className='button'\" value=\"EDIT\" onclick=\"invokePoPup('admin/manage_press.php?sub=".$sub."','950','450');\" /></div>";

			
					
		}
	
}	
////////////////////////////////////////// manage Press ////////////////////////////////////


///////////////////////////////////////// manage  Tecnical Information ////////////////////////////////
function update_image_heading_own_pho($id,$tit,$img)
{
		$this->connectToDB();
		$this->get_unlink_own_pho($id);
		$tit = htmlentities($tit,ENT_QUOTES);
		$img = htmlentities($img,ENT_QUOTES);
		$query = "update own_pho set tit='$tit',img='$img' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function index_own_pho($id,$tit)
{
		$this->connectToDB();
		$tit = htmlentities($tit,ENT_QUOTES);
		$query = "update own_pho set tit='$tit' where id='$id'";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function insert_image_heading_own_pho($tit,$img,$pid)
{
		$this->connectToDB();
		$tit = htmlentities($tit,ENT_QUOTES);
		$img = htmlentities($img,ENT_QUOTES);
		$query = "insert into own_pho set tit='$tit',img='$img',pid='$pid'";			
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;
}
function delete_projects_main_index_own_pho($id)
{
		$this->connectToDB();
		$this->get_unlink_own_pho($id);
		$query = "delete from own_pho where id=$id";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;	
}
function get_unlink_own_pho($id)
{
	$res = $this->get_projects_flash_view_unlink_own_pho($id);
	$file = '../images/headings/own/'.$res[0]['img'];
	if(file_exists($file))
	unlink($file);
}
function get_projects_flash_view_unlink_own_pho($id)
{
		$this->connectToDB();
		$query = "select * from own_pho where id='$id'";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_unlink_own_pho_front($pid)
{
		$this->connectToDB();
		$query = "select * from own_pho where pid='$pid'";				
		$result = $this->select($query);
		return $result;
	
}
function get_projects_flash_view_all_own_pho($StartRow,$PageSize,$pid)
{
		$this->connectToDB();
		$query = "select * from own_pho where pid='$pid' ORDER BY  id asc LIMIT $StartRow,$PageSize";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
////////////////////////////////////////// manage Tecnical Information ////////////////////////////////////



function get_projects_flash_view_all($StartRow,$PageSize)
{
		$this->connectToDB();
		$query = "select * from news ORDER BY  id asc LIMIT $StartRow,$PageSize";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}

function get_projects_galery_view_all()
{
		$this->connectToDB();
		$query = "select * from options ORDER BY  id asc";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}


function get_projects_flash_view_all_front()
{
		$this->connectToDB();
		$query = "select * from news ORDER BY  id desc";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}

function get_view_all_front($id)
{
		$this->connectToDB();
		$query = "select * from news where id='$id' ORDER BY  id asc";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}

function tep_draw_edit_link_heading_image_index($id,$sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{									
			 
			 echo"<div style='position:relative;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('flash_img.php?sub=".$sub."&pid=".$id."','950','450');\" src=\"images/button_edit.gif\" border=\"0\" /></div>";		
		}
	
}

function tep_draw_edit_link_heading_image_index_sub($id,$sub)
{
	
		if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
		{									
			 
			 echo"<div style='position:relative;'><img style=\"cursor:pointer;\" onclick=\"invokePoPup('../flash_img.php?sub=".$sub."&pid=".$id."','950','450');\" src=\"../images/button_edit.gif\" border=\"0\" /></div>";		
		}
	
}		

/////////////////////////////////// Multipal Image ////////////////////////////////


//////////////////////////////////// xml methods //////////////////////////////////////////////////////
function flash_index()
{
$xml = null;
$flash = $this->get_projects_galery_view_all();

$file = "../gallery.xml";


$xml = fopen($file, 'w') or die("can't open file");
$writ = "";

$writ .= '<?xml version="1.0" encoding="UTF-8"?>
<simpleviewergallery maxImageWidth="343" maxImageHeight="258" textColor="0xFFFFFF" frameColor="0xFFFFFF" frameWidth="0" stagePadding="0" navPadding="40" thumbnailColumns="3" thumbnailRows="3" navPosition="left" vAlign="middle" hAlign="center" title="" enableRightClickOpen="true" backgroundImagePath="" imagePath="" thumbPath="">';





foreach($flash as $i=>$v)
{
if($i == 0)// body suit
{
$writ .= '<image>
	<filename>'.$v['image'].'</filename>
	<caption><![CDATA[Captions can be HTML formatted. Supported tags are <b>bold</b>, <u>underline</u>, <i>italics</i>, <u><a href="http://www.google.com" target="_blank">hyperlinks</a></u>, linebreaks<br> and <font color="#ffff00" size="30">font tags</font>.]]></caption>	
</image>';
}
else
{
$writ .= '<image>
	<filename>'.$v['image'].'</filename>
</image>';
}
} // Foreach

$writ .= '</image>
</simpleviewergallery>';

fwrite($xml, $writ);
}
//////////////////////////////////// xml methods //////////////////////////////////////////////////////


	
function delete_projects($id)
{
		$this->connectToDB();
		$query = "delete from projects where id=$id";				
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;	
}


function add_projects($title,$short_desc,$year,$founder,$collaborators,$publications)
{
		$this->connectToDB();
		
		$query = "insert into projects (title,short_desc,year,founder,collaborators,publications) values('$title','$short_desc','$year','$founder','$collaborators','$publications')";							
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;	
}
	
	
function update_projects($id,$title,$short_desc,$year,$founder,$collaborators,$publications)
{
		$this->connectToDB();		
		$query = "update projects set title='$title',short_desc='$short_desc',year='$year',founder='$founder',collaborators='$collaborators',publications='$publications' where id=$id";				
		
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;	
}

////////////////////////////////// MY METHODS ////////////////////////////////////////
///////////////////////// SELECT ALL FIELDS ///////////////////////////////
///////////// validation //////////////	
function VALIDATION($fields,$msg)
{
	if(!empty($fields))
		foreach($fields as $k=>$v)
		{
			if($v == "")
			$error.= "Please enter the value in ".$msg[$k]."<br />";
		}
	else
	echo "Please supply the valid arrays";
return $error;
}
///////////// validation //////////////
function QUERY_PASS($query)
{
        ///////////// call logs /////////////
        include_once("logs.php");
        $objlogs = logs::getInstance();
        ///////////// call logs /////////////

		$this->connectToDB();
		//$query = "select * from $table";
		//echo $query;				
		$result = $this->select($query);

        ///////////// call logs /////////////
        if(LogLevel == 0) {
            $objlogs->loging("All Logs", $select_query);
        } elseif(LogLevel == 1) {
            $objlogs->loging("Info", $select_query);
        } elseif(LogLevel == 2) {
            $objlogs->loging("Debug", $select_query);
        } elseif(LogLevel == 3) {
            $objlogs->loging("Warn", $select_query);
        } elseif(LogLevel == 4) {
            $objlogs->loging("Error", $select_query);
        }
        ///////////// call logs /////////////

        $this->DBDisconnect();
		return $result;
	
}
function SELECT_ALL_FIELDS($table)
{
		$this->connectToDB();
		$query = "select * from $table"; //exit($query);				
		$result = $this->select($query);
        $this->DBDisconnect();
		return $result;
	
}
function SELECT_ALL_FIELDS_ON_ID($table,$val)
{
		$this->connectToDB();
		$query = "select * from $table where id='$val'";				
		$result = $this->select($query);
        $this->DBDisconnect();
		return $result;
	
}
function SELECT_ALL_FIELDS_ON_VALUE($table,$field,$val)
{
		$this->connectToDB();
		$query = "select * from $table where $field='$val'";				
		$result = $this->select($query);
        $this->DBDisconnect();
		return $result;
	
}
function SELECT_ALL_FIELDS_ON_CONDITION($table,$cond)
{
		$this->connectToDB();
		$query = "select * from $table where $cond";	//echo $query;			
		$result = $this->select($query);
        $this->DBDisconnect();
		return $result;
	
}
function SELECT_ALL_FIELDS_ON_BETWEEN($table,$column,$value1,$value2)
{
		$this->connectToDB();
		$query = "SELECT * FROM $table WHERE $column BETWEEN $value1 AND $value2";	//echo $query;			
		$result = $this->select($query);
        $this->DBDisconnect();
		return $result;
	
}
function SELECT_ALL_FIELDS_ON_CONDITION_All($table,$cond)
{
		$this->connectToDB();
		$query = "select * from $table $cond";	//echo $query;			
		$result = $this->select($query);
        $this->DBDisconnect();
		return $result;
	
}
function SELECT_CUMTOM_FIELDS_ON_CONDITION($field,$table,$cond)
{
		$this->connectToDB();
		$query = "select $field from $table $cond";	//echo $query;			
		$result = $this->select($query);
		return $result;
	
}
function SELECT_ALL_FIELDS_ON_VALUE_TWO($table,$field,$val,$field1,$val1)
{
		$this->connectToDB();
		$query = "select * from $table where $field='$val' and $field1='$val1'";				
		$result = $this->select($query);
        $this->DBDisconnect();
		return $result;
	
}
function get_select_record($id,$table)
{
		$this->connectToDB();
		$query = "select * from  `$table` where id='$id'";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
function SELECT_ALL_FIELDS_ON_VALUE_INNER_JOIN($table1,$table2,$tb1col,$tb2col)
{
		$this->connectToDB();
		$query = "SELECT * FROM $table1 INNER JOIN $table2 where $table1.$tb1col=$table2.$tb2col";				
		$result = $this->select($query);
        $this->DBDisconnect();
		return $result;
	
}
function SELECT_ALL_FIELDS_ON_VALUE_INNER_JOIN_TWO($table1,$table2,$tb1col,$tb2col,$field,$val)
{
		$this->connectToDB();
		$query = "SELECT * FROM $table1 INNER JOIN $table2 where $table1.$tb1col=$table2.$tb2col and $table1.$field='$val'";				
		$result = $this->select($query);//echo $query;exit;
        $this->DBDisconnect();
		return $result;
	
}
function SELECT_QUERY($select_query)
{
        ///////////// call logs /////////////
        /*include_once("logs.php");
        $objlogs = logs::getInstance();*/
        ///////////// call logs /////////////

        $this->connectToDB();
		$query = $select_query;
		$result = $this->select($query);    //echo $query;exit;

        ///////////// call logs /////////////
        /*if(LogLevel == 0) {
            $objlogs->loging("All Logs", $select_query);
        } elseif(LogLevel == 1) {
            $objlogs->loging("Info", $select_query);
        } elseif(LogLevel == 2) {
            $objlogs->loging("Debug", $select_query);
        } elseif(LogLevel == 3) {
            $objlogs->loging("Warn", $select_query);
        } elseif(LogLevel == 4) {
            $objlogs->loging("Error", $select_query);
        }*/
        ///////////// call logs /////////////

        $this->DBDisconnect();
		return $result;
}


/////////////// Password Encription/Decription ////////////
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function encryptItssl( $q ) {
    $plaintext = $q;
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
    return( $ciphertext );
}

function decryptItssl( $q ) {
    $c = base64_decode($q);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    return( $original_plaintext );
}
/////////////// Password Encription/Decription ////////////


///////////////////////// SELECT ALL FIELDS ///////////////////////////////
////////////////////////////////// MY METHODS ////////////////////////////////////////
///////////////// INNSERT //////////////////////////////////
function insert_new($table,$col,$val)
{
    ///////////// call logs /////////////
    /*include_once("logs.php");
    $objlogs = logs::getInstance();*/
    ///////////// call logs /////////////

    $this->connectToDB();
	if(sizeof($col) == 0 or sizeof($val) == 0)
	$this->tep_draw_message_cms("Unable To Insert The Values Please Set The Value.");
	else
	{
	$query ="INSERT INTO ";
	$query .="`$table` ";
	$query .="(";
	$size = count($col);
	$size = $size-1;
	foreach ($col as $key=> $value)
	{
		$query .= "`$col[$key]`";
		if ($key == $size)
			echo "";
		else
			$query .= ",";
	}
	
	$query .= ")";
	$query .= " VALUES (";
	
	foreach ($val as $key=> $value)
	{
	if(!isset($val[$key]) or $val[$key] == "")
	$query .= "NULL";
	else
	{
	    $str = "$val[$key]";
		$query .= "'";
		$query .= htmlentities($str,ENT_QUOTES);
		$query .= "'";
	}
		if ($key == $size)
			echo "";
		else
			$query .= ",";
	}
	$query .= ")";
	//echo $query;
    //exit($query); 
    $result = $this->dml($query);

    ///////////// call logs /////////////
    /*if(LogLevel == 0) {
        $objlogs->loging("All Logs", $query);
    } elseif(LogLevel == 1) {
        $objlogs->loging("Info", $query);
    } elseif(LogLevel == 2) {
        $objlogs->loging("Debug", $query);
    } elseif(LogLevel == 3) {
        $objlogs->loging("Warn", $query);
    } elseif(LogLevel == 4) {
        $objlogs->loging("Error", $query);
    }*/
    ///////////// call logs /////////////
	}
	$this->DBDisconnect();
	return $result;
	//$this->insert_new("table_name","col","val");
}
function insert($table,$col,$val)
{


    $this->connectToDB();
	if(sizeof($col) == 0 or sizeof($val) == 0)
	$this->tep_draw_message_cms("Unable To Insert The Values Please Set The Value.");
	else
	{
	$query ="INSERT INTO ";
	$query .="`$table` ";
	$query .="(";
	$size = count($col);
	$size = $size-1;
	foreach ($col as $key=> $value)
	{
		$query .= "`$col[$key]`";
		if ($key == $size)
			echo "";
		else
			$query .= ",";
	}
	
	$query .= ")";
	$query .= " VALUES (";
	
	foreach ($val as $key=> $value)
	{
	if(!isset($val[$key]) or $val[$key] == "")
	$query .= "NULL";
	else
	{
	    $str = "$val[$key]";
		$query .= "'";
		$query .= $str;
		$query .= "'";
	}
		if ($key == $size)
			echo "";
		else
			$query .= ",";
	}
	$query .= ")";
	//echo $query;
    //exit($query); 
    $result = $this->dml($query);

	}
	$this->DBDisconnect();
	return $result;
	//$this->insert_new("table_name","col","val");
}
////////// insert with id /////////////////////////////
function insert_new_with_id($table,$col,$val)
{
    $this->connectToDB();
    if(sizeof($col) == 0 or sizeof($val) == 0)
        $this->tep_draw_message_cms("Unable To Insert The Values Please Set The Value.");
    else
    {
        $query ="INSERT INTO ";
        $query .="`$table` ";
        $query .="(";
        $size = count($col);
        $size = $size-1;
        foreach ($col as $key=> $value)
        {
            $query .= "`$col[$key]`";
            if ($key == $size)
                echo "";
            else
                $query .= ",";
        }

        $query .= ")";
        $query .= "VALUES (";

        foreach ($val as $key=> $value)
        {
            if(empty($val[$key]))
                $query .= "NULL";
            else
            {
                $str = "$val[$key]";
                $query .= "'";
                $query .= htmlentities($str,ENT_QUOTES);
                $query .= "'";
            }
            if ($key == $size)
                echo "";
            else
                $query .= ",";
        }
        $query .= ")";
        //exit($query);
        $result = $this->dmlr($query);
    }
    $this->DBDisconnect();
    return $result;
    //$this->insert_new("table_name","col","val");
}
function insert_with_zero($table,$col,$val)
{
    $this->connectToDB();
    if(sizeof($col) == 0 or sizeof($val) == 0)
        $this->tep_draw_message_cms("Unable To Insert The Values Please Set The Value.");
    else
    {
        $query ="INSERT INTO ";
        $query .="`$table` ";
        $query .="(";
        $size = count($col);
        $size = $size-1;
        foreach ($col as $key=> $value)
        {
            $query .= "`$col[$key]`";
            if ($key == $size)
                echo "";
            else
                $query .= ",";
        }

        $query .= ")";
        $query .= "VALUES (";

        foreach ($val as $key=> $value)
        {
            if($val[$key] == "")
                $query .= "NULL";
            else
            {
                $str = "$val[$key]";
                $query .= "'";
                $query .= htmlentities($str,ENT_QUOTES);
                $query .= "'";
            }
            if ($key == $size)
                echo "";
            else
                $query .= ",";
        }
        $query .= ")";
        //exit($query);
        $result = $this->dmlr($query);
    }
    $this->DBDisconnect();
    return $result;
    //$this->insert_new("table_name","col","val");
}
////////////////////  INNSERT /////////////////////////////////////////
/////////////////////////// UPDATE //////////////////////////////////
function update_img($table,$col,$val,$id,$idval,$path,$img_name)
{
    ///////////// call logs /////////////
    /*include_once("logs.php");
    $objlogs = logs::getInstance();*/
    ///////////// call logs /////////////


    $this->connectToDB();
	if(sizeof($col) == 0 or sizeof($val) == 0)
	$this->tep_draw_message_cms("Unable To Upload The Values Please Set The Value.");
	else
	{
	if(!empty($path))
	{
	if(is_array($img_name))
	$this->get_unlink_delete_array($idval,$table,$path,$img_name);
	else
	$this->get_unlink_delete($idval,$table,$path,$img_name);
	}
	$query ="UPDATE ";
	$query .="`$table` ";
	$query .="SET ";
	$size = count($col);
	$size = $size-1;
	foreach ($col as $key=>$value)
	{
		$str = "$val[$key]";
		$query .= "`$col[$key]`"; 
		$query .= " = ";
		$query .= "'";
		$query .= htmlentities($str,ENT_QUOTES);
		$query .= "'";
		if ($key == $size)
			echo "";
		else
			$query .= " , ";
	}
	
	$query .= " WHERE $id = $idval";
	//exit($query);

    ///////////// call logs /////////////
    /*if(LogLevel == 0) {
        $objlogs->loging("All Logs", $query);
    } elseif(LogLevel == 1) {
        $objlogs->loging("Info", $query);
    } elseif(LogLevel == 2) {
        $objlogs->loging("Debug", $query);
    } elseif(LogLevel == 3) {
        $objlogs->loging("Warn", $query);
    } elseif(LogLevel == 4) {
        $objlogs->loging("Error", $query);
    }*/
    ///////////// call logs /////////////

        $result = $this->dml($query);
	}
	$this->DBDisconnect();
	return $result;
	//$objcms->update("prs",$col,$val,"id","13");
}
/////////////////////////// UPDATE //////////////////////////////////
/////////////////////////// DELETE //////////////////////////////////
function delete_img($table,$path,$img_name,$id,$valid)
{
    ///////////// call logs /////////////
    include_once("logs.php");
    $objlogs = logs::getInstance();
    ///////////// call logs /////////////

    $this->connectToDB();
	if(empty($id) or empty($valid))
	$this->tep_draw_message_cms("Unable To Delete The Values Please Set The ID.");
	else
	{
	if(!empty($path))
	{
	if(is_array($img_name))
	$this->get_unlink_delete_array($valid,$table,$path,$img_name);
	else
	$this->get_unlink_delete($valid,$table,$path,$img_name);
	}
	$query ="DELETE FROM ";
	$query .="`$table` ";
	$query .="WHERE ";
	$query .="$id = ";
	$query .="$valid";
	//exit($query);

    ///////////// call logs /////////////
    if(LogLevel == 0) {
        $objlogs->loging("All Logs", $query);
    } elseif(LogLevel == 1) {
        $objlogs->loging("Info", $query);
    } elseif(LogLevel == 2) {
        $objlogs->loging("Debug", $query);
    } elseif(LogLevel == 3) {
        $objlogs->loging("Warn", $query);
    } elseif(LogLevel == 4) {
        $objlogs->loging("Error", $query);
    }
    ///////////// call logs /////////////

        $result = $this->dml($query);
	}
	$this->DBDisconnect();
	return $result;
}
/////////////////////////// DELETE //////////////////////////////////
/////////////////////////// UNLINK METHODS ////////////////////////////
function get_unlink_delete_array($valid,$table,$path,$img_name)
{	
	$res = $this->Select_unlink_delete($valid,$table);
	foreach($path as $k=>$v)
	{
		$file = $v.$res[0][$img_name[$k]];
		if(file_exists($file))
	    unlink($file);
	}
	
	
}
function get_unlink_delete($valid,$table,$path,$img_name)
{	
	$res = $this->Select_unlink_delete($valid,$table);
	$file = $path.$res[0][$img_name];
	if(file_exists($file))
	unlink($file);
}
function Select_unlink_delete($valid,$table)
{
		$this->connectToDB();
		$query = "select * from $table where id='$valid'";				
		$result = $this->select($query);
		return $result;
	
}
/////////////////////////// UNLINK METHODS ////////////////////////////
///////////////////// PAGING /////////////////////////////////////////
function center_genric($StartRow,$PageSize,$sub,$table)
{
$this->connectToDB();
$TRecord = mysql_query("select * from `$table` order by id asc");
 $result = $this->select_value_for_center($StartRow,$PageSize,$table);
 //Total of record
 $RecordCount = mysql_num_rows($TRecord);
 //Set Maximum Page
 $MaxPage = $RecordCount % $PageSize;
 if($RecordCount % $PageSize == 0){
    $MaxPage = $RecordCount / $PageSize;
 }else{
    $MaxPage = ceil($RecordCount / $PageSize);
 }
 return array($MaxPage,$result,$RecordCount);
 }
 /////////////////////// select on condition ///////////////////////
 function center_genric_cond($StartRow,$PageSize,$sub,$table,$cond)
{
$this->connectToDB();
$TRecord = mysql_query("select * from `$table` $cond group by id order by id asc");
 $result = $this->select_value_for_center_cond($StartRow,$PageSize,$table,$cond);
 //Total of record
 $RecordCount = mysql_num_rows($TRecord);
 //Set Maximum Page
 $MaxPage = $RecordCount % $PageSize;
 if($RecordCount % $PageSize == 0){
    $MaxPage = $RecordCount / $PageSize;
 }else{
    $MaxPage = ceil($RecordCount / $PageSize);
 }
 return array($MaxPage,$result,$RecordCount);
 }
/////////////////////// select on condition ///////////////////////
/////////////////////// select on interval ///////////////////////
 function select_value_for_interval_cond($StartRow,$PageSize,$table,$column,$value1,$value2)
{
		$this->connectToDB();
		$query = "SELECT * FROM `$table` WHERE $column BETWEEN $value1 AND $value2 order by id asc LIMIT $StartRow,$PageSize";			
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
 function center_genric_interval($StartRow,$PageSize,$sub,$table,$column,$value1,$value2)
{
$this->connectToDB();
$TRecord = mysql_query("SELECT * FROM `$table` WHERE $column BETWEEN $value1 AND $value2 order by id asc");
 $result = $this->select_value_for_interval_cond($StartRow,$PageSize,$table,$column,$value1,$value2);
 //Total of record
 $RecordCount = mysql_num_rows($TRecord);
 //Set Maximum Page
 $MaxPage = $RecordCount % $PageSize;
 if($RecordCount % $PageSize == 0){
    $MaxPage = $RecordCount / $PageSize;
 }else{
    $MaxPage = ceil($RecordCount / $PageSize);
 }
 return array($MaxPage,$result,$RecordCount);
 }
/////////////////////// select on interval ///////////////////////
///////////////////// PAGING /////////////////////////////////////////
///////////////////// LINKED METHOD /////////////////////////////////////////
 function select_value_for_center($StartRow,$PageSize,$table)
{
		$this->connectToDB();
		$query = "select * from $table ORDER BY  id asc LIMIT $StartRow,$PageSize";				
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
//////////////////////////////////////////
 function select_value_for_center_cond($StartRow,$PageSize,$table,$cond)
{
		$this->connectToDB();
		$query = "select * from $table $cond group by id ORDER BY  id asc LIMIT $StartRow,$PageSize";			
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;
	
}
///////////////////// LINKED METHOD /////////////////////////////////////////
//////////////////////////////////// pagging ////////////////////////////////////////////////////
function buttom_manage($CounterStart,$CounterEnd,$PageSize,$PageNo,$MaxPage,$sub,$pid,$col)
		{
        if($CounterStart != 1){
            $PrevStart = $CounterStart - 1;
			if($pid == 0)
			{
            print "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&PageNo=1 style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>First </a>: ";
            print "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&PageNo=$PrevStart style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Previous </a>";
			}
			else
			{
			    print "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&pid=".$pid."&PageNo=1 style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>First </a>: ";
            print "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&pid=".$pid."&PageNo=$PrevStart style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Previous </a>";	
			}
        }
        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> [ </span>";
        $c = 0;
        //Print Page No
        for($c=$CounterStart;$c<=$CounterEnd;$c++){
            if($c < $MaxPage){
                if($c == $PageNo){
                    if($c % $PageSize == 0){
                        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> $c  </span>";
                    }else{
                        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> $c  </span>,";
                    }
                }elseif($c % $PageSize == 0){
					if($pid != 0)
                    echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&pid=".$pid."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ";
					else
					 echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ";
                }else{
					if($pid != 0)
                    echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&pid=".$pid."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ,";
					else
					echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ,";
                }//END IF
            }else{
                if($PageNo == $MaxPage){
                    print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'>$c </span>";
                    break;
                }else{
					 if($pid != 0)
                    echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&pid=".$pid."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ";else
					 echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ";
                    break;
                }//END IF
            }//END IF
       }//NEXT
      echo "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'>] </span>";
      if($CounterEnd < $MaxPage){
          $NextPage = $CounterEnd + 1;
		  if($pid != 0)
          echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&pid=".$pid."&PageNo=$NextPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Next</a>";
		  else
		   echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&PageNo=$NextPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Next</a>";
      }
      
      //Print Last link if necessary
      if($CounterEnd < $MaxPage){
       $LastRec = $RecordCount % $PageSize;
        if($LastRec == 0){
            $LastStartRecord = $RecordCount - $PageSize;
        }
        else{
            $LastStartRecord = $RecordCount - $LastRec;
        }
        print " : ";
		if($pid != 0)  
		 echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&pid=".$pid."&PageNo=$MaxPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Last</a>";
		 else
        echo "<a href=".$_SERVER['PHP_SELF']."?sub=".$sub."&PageNo=$MaxPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Last</a>";
        }
}
////////////////////////////// grrnam ///////////////////////////////////
function buttom($CounterStart,$CounterEnd,$PageSize,$PageNo,$MaxPage,$sub,$col)
		{
        if($CounterStart != 1){
            $PrevStart = $CounterStart - 1;
            print "<a href=".$_SERVER['PHP_SELF']."?pid=".$sub."&PageNo=1 style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>First </a>: ";
            print "<a href=".$_SERVER['PHP_SELF']."?pid=".$sub."&PageNo=$PrevStart style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Previous </a>";
        }
        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> [ </span>";
        $c = 0;
        //Print Page No
        for($c=$CounterStart;$c<=$CounterEnd;$c++){
            if($c < $MaxPage){
                if($c == $PageNo){
                    if($c % $PageSize == 0){
                        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> $c  </span>";
                    }else{
                        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> $c  </span>,";
                    }
                }elseif($c % $PageSize == 0){
                    echo "<a href=".$_SERVER['PHP_SELF']."?pid=".$sub."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ";
                }else{
                    echo "<a href=".$_SERVER['PHP_SELF']."?pid=".$sub."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ,";
                }//END IF
            }else{
                if($PageNo == $MaxPage){
                    print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'>$c </span>";
                    break;
                }else{
                    echo "<a href=".$_SERVER['PHP_SELF']."?pid=".$sub."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ";
                    break;
                }//END IF
            }//END IF
       }//NEXT
      echo "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'>] </span>";
      if($CounterEnd < $MaxPage){
          $NextPage = $CounterEnd + 1;
          echo "<a href=".$_SERVER['PHP_SELF']."?pid=".$sub."&PageNo=$NextPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Next</a>";
      }
      
      //Print Last link if necessary
      if($CounterEnd < $MaxPage){
       $LastRec = $RecordCount % $PageSize;
        if($LastRec == 0){
            $LastStartRecord = $RecordCount - $PageSize;
        }
        else{
            $LastStartRecord = $RecordCount - $LastRec;
        }
        print " : ";
        echo "<a href=".$_SERVER['PHP_SELF']."?pid=".$sub."&PageNo=$MaxPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Last</a>";
        }
}
function buttom_query_string($CounterStart,$CounterEnd,$PageSize,$PageNo,$MaxPage,$qstr,$col)
		{
        if($CounterStart != 1){
            $PrevStart = $CounterStart - 1;
            print "<a href=".$_SERVER['PHP_SELF']."?".$qstr."&PageNo=1 style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>First </a>: ";
            print "<a href=".$_SERVER['PHP_SELF']."?".$qstr."&PageNo=$PrevStart style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Previous </a>";
        }
        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> [ </span>";
        $c = 0;
        //Print Page No
        for($c=$CounterStart;$c<=$CounterEnd;$c++){
            if($c < $MaxPage){
                if($c == $PageNo){
                    if($c % $PageSize == 0){
                        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> ".$c."  </span>";
                    }else{
                        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> ".$c."  </span>,";
                    }
                }elseif($c % $PageSize == 0){
                    echo "<a href=".$_SERVER['PHP_SELF']."?".$qstr."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>".$c."</a> ";
                }else{
                    echo "<a href=".$_SERVER['PHP_SELF']."?".$qstr."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>".$c."</a> ,";
                }//END IF
            }else{
                if($PageNo == $MaxPage){
                    print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'>".$c." </span>";
                    break;
                }else{
                    echo "<a href=".$_SERVER['PHP_SELF']."?".$qstr."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>".$c."</a> ";
                    break;
                }//END IF
            }//END IF
       }//NEXT
      echo "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'>] </span>";
      if($CounterEnd < $MaxPage){
          $NextPage = $CounterEnd + 1;
          echo "<a href=".$_SERVER['PHP_SELF']."?".$qstr."&PageNo=$NextPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Next</a>";
      }
      
      //Print Last link if necessary
      if($CounterEnd < $MaxPage){
       $LastRec = $RecordCount % $PageSize;
        if($LastRec == 0){
            $LastStartRecord = $RecordCount - $PageSize;
        }
        else{
            $LastStartRecord = $RecordCount - $LastRec;
        }
        print " : ";
        echo "<a href=".$_SERVER['PHP_SELF']."?".$qstr."&PageNo=$MaxPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Last</a>";
        }
}
function buttom_pageurl($pageurl,$CounterStart,$CounterEnd,$PageSize,$PageNo,$MaxPage,$sub,$col)
		{
        if($CounterStart != 1){
            $PrevStart = $CounterStart - 1;
            print "<a href=".$pageurl."?pid=".$sub."&PageNo=1 style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>First </a>: ";
            print "<a href=".$pageurl."?pid=".$sub."&PageNo=$PrevStart style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Previous </a>";
        }
        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> [ </span>";
        $c = 0;
        //Print Page No
        for($c=$CounterStart;$c<=$CounterEnd;$c++){
            if($c < $MaxPage){
                if($c == $PageNo){
                    if($c % $PageSize == 0){
                        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> $c  </span>";
                    }else{
                        print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'> $c  </span>,";
                    }
                }elseif($c % $PageSize == 0){
                    echo "<a href=".$pageurl."?pid=".$sub."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ";
                }else{
                    echo "<a href=".$pageurl."?pid=".$sub."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ,";
                }//END IF
            }else{
                if($PageNo == $MaxPage){
                    print "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'>$c </span>";
                    break;
                }else{
                    echo "<a href=".$pageurl."?pid=".$sub."&PageNo=$c style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>$c</a> ";
                    break;
                }//END IF
            }//END IF
       }//NEXT
      echo "<span style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:13px;'>] </span>";
      if($CounterEnd < $MaxPage){
          $NextPage = $CounterEnd + 1;
          echo "<a href=".$pageurl."?pid=".$sub."&PageNo=$NextPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Next</a>";
      }
      
      //Print Last link if necessary
      if($CounterEnd < $MaxPage){
       $LastRec = $RecordCount % $PageSize;
        if($LastRec == 0){
            $LastStartRecord = $RecordCount - $PageSize;
        }
        else{
            $LastStartRecord = $RecordCount - $LastRec;
        }
        print " : ";
        echo "<a href=".$pageurl."?pid=".$sub."&PageNo=$MaxPage style='font-family:Arial, Helvetica, sans-serif; border-bottom-color:#171717; color:".$col."; font-size:12px;'>Last</a>";
        }
}

function Send_Mail_To($to, $subject, $txt, $url) {

    /*echo $to;
    echo $subject;
    echo $txt;
    exit();*/

    $headers = "From: webmaster@gmail.com.com" . "\r\n" .
        "CC: somebodyelse@gmail.com.com";

    if(mail($to, $subject, $txt, $headers))
    {
        echo "<script language=\"javascript\">alert(\"Mail Has been sent successfuly!\"); window.location.href = './$url';</script>";
    }
    else
    {
        echo "<script language=\"javascript\">alert(\"There is some internet problem while sending email!\"); window.location.href = './$url';</script>";
    }
}

////////////////////////////// grrnam ///////////////////////////////////
/////////////////////////////////////////////////////////////////
function center($StartRow,$PageSize,$sub)
{
$this->connectToDB();
$TRecord = mysql_query("select * from news order by id desc");
 $result = $this->get_projects_flash_view_all($StartRow,$PageSize);
 //Total of record
 $RecordCount = mysql_num_rows($TRecord);
 //Set Maximum Page
 $MaxPage = $RecordCount % $PageSize;
 if($RecordCount % $PageSize == 0){
    $MaxPage = $RecordCount / $PageSize;
 }else{
    $MaxPage = ceil($RecordCount / $PageSize);
 }
 return array($MaxPage,$result,$RecordCount);
 }
 
/////////////////////// option //////////////////////////////////
 function center_op($StartRow,$PageSize,$sub)
{
$this->connectToDB();
$TRecord = mysql_query("select * from options order by id desc");
 $result = $this->get_projects_flash_view_all_op($StartRow,$PageSize);
 //Total of record
 $RecordCount = mysql_num_rows($TRecord);
 //Set Maximum Page
 $MaxPage = $RecordCount % $PageSize;
 if($RecordCount % $PageSize == 0){
    $MaxPage = $RecordCount / $PageSize;
 }else{
    $MaxPage = ceil($RecordCount / $PageSize);
 }
 return array($MaxPage,$result,$RecordCount);
 }
  function center_tec_info($StartRow,$PageSize,$sub)
{
$this->connectToDB();
$TRecord = mysql_query("select * from tec_info order by id desc");
 $result = $this->get_projects_flash_view_all_tec_info($StartRow,$PageSize);
 //Total of record
 $RecordCount = mysql_num_rows($TRecord);
 //Set Maximum Page
 $MaxPage = $RecordCount % $PageSize;
 if($RecordCount % $PageSize == 0){
    $MaxPage = $RecordCount / $PageSize;
 }else{
    $MaxPage = ceil($RecordCount / $PageSize);
 }
 return array($MaxPage,$result,$RecordCount);
 }
 
   function center_video($StartRow,$PageSize,$sub)
{
$this->connectToDB();
$TRecord = mysql_query("select * from tec_info1 order by id desc");
 $result = $this->get_projects_flash_view_all_video($StartRow,$PageSize);
 //Total of record
 $RecordCount = mysql_num_rows($TRecord);
 //Set Maximum Page
 $MaxPage = $RecordCount % $PageSize;
 if($RecordCount % $PageSize == 0){
    $MaxPage = $RecordCount / $PageSize;
 }else{
    $MaxPage = ceil($RecordCount / $PageSize);
 }
 return array($MaxPage,$result,$RecordCount);
 }
    function center_press($StartRow,$PageSize,$sub)
{
$this->connectToDB();
$TRecord = mysql_query("select * from prs order by id desc");
 $result = $this->get_projects_flash_view_all_press($StartRow,$PageSize);
 //Total of record
 $RecordCount = mysql_num_rows($TRecord);
 //Set Maximum Page
 $MaxPage = $RecordCount % $PageSize;
 if($RecordCount % $PageSize == 0){
    $MaxPage = $RecordCount / $PageSize;
 }else{
    $MaxPage = ceil($RecordCount / $PageSize);
 }
 return array($MaxPage,$result,$RecordCount);
 }
 
 
   function center_own_pho($StartRow,$PageSize,$sub,$pid)
{
$this->connectToDB();
$TRecord = mysql_query("select * from own_pho where pid='$pid' order by id desc");
 $result = $this->get_projects_flash_view_all_own_pho($StartRow,$PageSize,$pid);
 //Total of record
 $RecordCount = mysql_num_rows($TRecord);
 //Set Maximum Page
 $MaxPage = $RecordCount % $PageSize;
 if($RecordCount % $PageSize == 0){
    $MaxPage = $RecordCount / $PageSize;
 }else{
    $MaxPage = ceil($RecordCount / $PageSize);
 }
 return array($MaxPage,$result,$RecordCount);
 }
/////////////////////// option //////////////////////////////////
/////////////////////////////////////////////////////
function top($StartRow,$PageSize,$pn)
{
//Set the page no
if(empty($pn)){
    if($StartRow == 0){
        $PageNo = $StartRow + 1;
    }
}else{
    $PageNo = $pn;
    $StartRow = ($PageNo - 1) * $PageSize;
}
//Set the counter start
if($PageNo % $PageSize == 0){
    $CounterStart = $PageNo - ($PageSize - 1);
}else{
    $CounterStart = $PageNo - ($PageNo % $PageSize) + 1;
}
//Counter End
$CounterEnd = $CounterStart + ($PageSize - 1);
return array($CounterStart,$CounterEnd,$PageNo,$StartRow,$PageSize);
}
/*
function Send_Mail_To($to, $subject, $txt, $url) {

	$headers = "From: webmaster@gmail.com.com" . "\r\n" .
	"CC: somebodyelse@gmail.com.com";
	
	if(mail($to, $subject, $txt, $headers))
	{
		echo "<script language=\"javascript\">alert(\"Mail Has been sent successfuly!\"); window.location.href = './$url';</script>";
	}
	else
	{
		echo "<script language=\"javascript\">alert(\"There is some internet problem while sending email!\"); window.location.href = './$url';</script>";
	}
}*/

//////////////////////////////////// pagging ////////////////////////////////////////////////////
///////////// image upload ////////////////////
function upload_img($imagename,$prefix,$path)
{
    
	$uploaded_size = $_FILES[$imagename]['size'];
	$uploaded_type = $_FILES[$imagename]['type'];
	$target =  $path.$prefix."".$_FILES[$imagename]['name'];
	$ok=1;//exit($target);
		
	//This is our size condition
	if ($uploaded_size > 350000)
	{		
		//$ok=0;
		//return false;
	}
	
	//This is our limit file type condition
	if ($uploaded_type =="text/php")
	{		
		return false;
		$ok=0;
	}			
	
	//Here we check that $ok was not set to 0 by an error
	if ($ok==0)
	{
		return false;
	}
	
	//If everything is ok we try to upload it
	else if($_FILES[$imagename]['name'] != null &&  $_FILES[$imagename]['name']!= "")
	{
		if(move_uploaded_file($_FILES[$imagename]['tmp_name'], $target))
		{
			
			return true;					
		}
		else
		{
			return false;
		}
	}
}
//////////// multiple upload //////////////////
function multipal_image_upload($name,$path)
{
$temp = array();
if(!empty($_FILES[$name]['name']))
{
while(list($key,$value) = each($_FILES[$name]['name']))
{
    //echo $key;
    //echo "<br>";
    //echo $value;
    //echo "<br>";
if(!empty($value)){   // this will check if any blank field is entered
$filename =rand(1,100000).$value;    // filename stores the value
$filename=str_replace(" ","_",$filename);// Add _ inplace of blank space in file name, you can remove this line
$add = $path."$filename";   // upload directory path is set
//echo $_FILES['images']['type'][$key];     // uncomment this line if you want to display the file type
//echo "<br>";                             // Display a line break
move_uploaded_file($_FILES[$name]['tmp_name'][$key], $add); 
$temp[] = $filename;
    //  upload the file to the server
//chmod($path, 0777);	
chmod("$add",0777);                 // set permission to the file.
} 
}
}
else
{ echo "There is no image for upload.Please select some images for upload.";}
return $temp;  //$room_col[] = "image";                 $room_val[] = $temp[0][$k]; 
}
///////////// image upload ////////////////////
///

    /**
     * @param $table
     * @param $col
     * @param $val
     * @param $cond
     * @return bool
     */
function UPDATE_FIELDS_ON_CONDITION($table,$col,$val,$cond)
{
	$this->connectToDB();
	if(sizeof($col) == 0 or sizeof($val) == 0)
	$this->tep_draw_message_cms("Unable To Update The Values Please Set The Value.");
	else
	{
	$query ="UPDATE ";
	$query .="`$table` SET ";
	$query .=" ";
	$size = count($col);
	$size = $size-1;
	foreach ($col as $key=> $value)
	{
		$query .= "`$col[$key]`=";
		if(empty($val[$key]))
			$query .= "NULL";
		else
		{
			$str = "$val[$key]";
			$query .= "'";
			$query .= htmlentities($str,ENT_QUOTES);
			$query .= "'";
		}
		if ($key == $size)
			echo "";
		else
			$query .= ",";
	}
	
	
	$query .= " WHERE $cond";
//	echo $query;
//    exit($query); 
    $result = $this->dml($query);
	}
	$this->DBDisconnect();
	return $result;
}
function tooltiptitle($field,$tiptext,$lid)
{
	$randum = rand(0,1000);
	echo '<script language="javascript">
	      $(document).ready(function (){
		  $(".tipsy-se").css("display","none");
		  $("#tool'.$randum.'").tipsy({gravity: "se"}); // nw | n | ne | w | e | sw | s | se
		  });
		  </script>';
 		$last = substr($field, -1); 
		if($last == "?") 
		{
			$lenth = strlen($field); 
			$lenth = $lenth-1;
			if($tiptext == "")
			{
				echo '<a href="javascript:void(0);" onclick="javascript:left_menu_open(\'imgtype'.$lid.'\',\'type'.$lid.'\');"><p>'.$field.'</p></a>';
			}
			else
			{
				echo '<span href="javascript:void(0);" style="cursor:pointer;" onclick="javascript:left_menu_open(\'imgtype'.$lid.'\',\'type'.$lid.'\');"><p><span>'.substr($field, 0, $lenth).'</span><span><a href="#" style="color:#000;" title="'.$tiptext.'" id=\'tool'.$randum.'\'>?</a></span></p></span>';
			}
		} 
		else 
		{
				echo '<a href="javascript:void(0);" onclick="javascript:left_menu_open(\'imgtype'.$lid.'\',\'type'.$lid.'\');"><p>'.$field.'</p></a>';
		}
}

//////////////////// matchingIndexes ///////////////////////

	function chkappr($id)
	{	
		$res_set = $this->SELECT_QUERY("SELECT * FROM user_location WHERE uid=$id");
		
		if($res_set[0])
		{
			return "yes";
		}
		else
		{
			return "no";
		}
	}

	function get_loc($id)
	{	
		$res_set = $this->SELECT_QUERY("SELECT * FROM location WHERE id=$id");
		
		if($res_set[0])
		{
			return $res_set;
		}
		else
		{
			return "No Location Matched";
		}
	}

	function late_comming($id)
	{	
		$start_date = date('Y-m-01');
		$end_date = date("Y-m-d");

		$res = $this->SELECT_QUERY("SELECT * FROM attendance WHERE uid=$id AND attendace_date BETWEEN '$start_date' AND '$end_date'");
		
		$lates = 0;
		foreach($res as $v)
		{
			$tim = split(" ", $v["checkintime"]);
			if(strtotime($tim[0]) > strtotime("9:15") && $tim[1] == "AM")
			{
				$lates = $lates+1;
			}
		}
		return $lates;
	}

	function short_leaves($id)
	{	
		$start_date = date('Y-m-01');
		$end_date = date("Y-m-d");

		$res = $this->SELECT_QUERY("SELECT * FROM attendance WHERE uid=$id AND attendace_date BETWEEN '$start_date' AND '$end_date'");
		
		$lates = 0;
		foreach($res as $v)
		{
			$checkintime = split(" ", $v["checkintime"]);
			$checkouttime = split(" ", $v["checkouttime"]);
			if(!empty($v["checkouttime"]))
			{
				if($checkouttime[1] == "PM")
				{
					$newtime = split(":", $checkouttime[0]);
					if($newtime[0] < 2 && $newtime[1] <= 59)
					{
						$lates = $lates+1;
					}
				}
				
			}
			
		}
		return $lates;
	}

	function leaves($id)
	{
		$start_date = date('Y-m-01');
		$end_date = date("Y-m-d");

		$res_working_days = $this->SELECT_QUERY("SELECT 5 * (DATEDIFF('$end_date', '$start_date') DIV 7) + MID('0123444401233334012222340111123400012345001234550', 7 * WEEKDAY('$start_date') + WEEKDAY('$end_date') + 1, 1) AS working_days");
		$res_att = $this->SELECT_QUERY("SELECT COUNT(*) AS attd FROM attendance WHERE uid=$id AND attendace_date BETWEEN '$start_date' AND '$end_date'");	
			return $res_working_days[0]["working_days"]-$res_att[0]["attd"];
	}

    /*
     * This nfunction is use for push notification
     * */

        function pushnotification($UserIDs, $Points) {

            //exit(print_r($Points));
            foreach($UserIDs as $ids_v) {
                $res_token = $this->SELECT_QUERY("SELECT * FROM users WHERE id=$ids_v");

                if ($res_token[0]) {

                    $tokens[] = $res_token[0]["fcm_key"];
                    $msg = new Message();

                    foreach($Points as $ptk=>$ptv) {
                        $msg->add($ptk, $ptv);
                    }


                    $pushObj = new sendPush();
                    $pushObj->sendpushNotification($msg, $tokens);
                }
            }

        }


} //class end brace

?>