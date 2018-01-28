<?php
include_once("DBaccess.php");
/**
 * class users
 *
 * Description for class users
 *
 * @author:W@sim
*/
class users extends DBAccess   
{

	/**
	 * users constructor
	 *
	 * @param 
	 */
	function users() 
	{

	}
	
	function get_user_data($username,$password)
	{
		$this->connectToDB();
		$query ="select user_id,username,isadmin from users where username='$username' and password='$password'";
		$result = $this->select($query);
		$this->DBDisconnect();
		return $result;		
	}
	
	
	function change_password($userid,$password)
	{
		$this->connectToDB();
		$query ="update users set password='$password' where user_id=$userid";
		$result = $this->dml($query);
		$this->DBDisconnect();
		return $result;		
	}
	
	
	
}

?>