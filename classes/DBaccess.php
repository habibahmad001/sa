<?php

include_once("config.php");

class DBAccess
{
    var $DBlink;
    var $Result;
    var $x;

    function connectToDB()
    {

        $this->DBlink = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

        if (!$this->DBlink)

            die("Could not connect to mysql...........".mysqli_error());

        mysqli_select_db($this->DBlink, DBNAME)

        or die( "Couldn't connect to database : ".mysqli_error() );

    }

    function dmlr($Query)
    {
        $this->Result = mysqli_query($this->DBlink, $Query);
        $id = mysqli_insert_id( $this->DBlink);
        return $id;
    }

    function dml($Query)
    {
        $this->Result = mysqli_query($this->DBlink, $Query) or die ("ERROR[".mysqli_error()."]");

        if( mysqli_affected_rows($this->DBlink) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }

        if (! $this->Result)
        {
            return false;
        }
    }

    function select($Query)
    {
        $Return_Result[]=NULL;
        $Count=0;
        $Show_Query_Reuslt = mysqli_query($this->DBlink, $Query) or die(mysqli_error());
        $Query_Result_Final = mysqli_fetch_assoc($Show_Query_Reuslt);

        do
        {
            $Return_Result[$Count]=$Query_Result_Final;
            $Count++;
        }

        while($Query_Result_Final=mysqli_fetch_assoc($Show_Query_Reuslt));
        return $Return_Result;
    }


    function execute_mysql_query($Query)
    {
        $Return_Result = NULL;
        $Return_Result = mysqli_query($this->DBlink, $Query) or die(mysqli_error());
        return $Return_Result;
    }

    function DBDisconnect()
    {
        if(!$this->Result)
        {}
        else
        {}
        mysqli_close($this->DBlink);
    }

}

?>