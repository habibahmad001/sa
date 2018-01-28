<?php 
include_once("DBaccess.php");

class custom extends DBaccess
{
	function QUERY($select_query)
	{
			$this->connectToDB();
			$query = $select_query;				
			$result = $this->select($query);    //echo $query;exit;
			return $result;
	}	
	function get_assign_name($lid, $status) 
	{
		if($status == "sadmin")
		{
			$res = $this->QUERY('SELECT u.fname, u.lname FROM users as u INNER JOIN lead_user as lu ON u.user_id=lu.user WHERE lu.lead='.$lid);
		}
		else
		{
			$res = $this->QUERY('SELECT a.fname, a.lname FROM admin as a INNER JOIN lead_user as lu ON a.id=lu.user WHERE lu.lead='.$lid);
		}
		
		echo "Mr " . $res[0]["fname"] . " " . $res[0]["lname"];
	}
	
	function get_status($lid) 
	{
		$q = "SELECT * FROM lead_user WHERE lead=".$lid;
		$res = $this->QUERY($q);
		return $res[0]["status"];
	}
} //class end brace

?>