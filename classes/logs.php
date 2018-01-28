<?php
include_once("config.php");

class logs
{
    private static $instance;

    private function __construct()
    {
        try {
            // PDO Here
            print("Connected!");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        return !isset(self::$instance) ? self::$instance = new self : self::$instance;
    }



    function create_file_name() {

        return $this->File_Name = LogFileName . "-" . date("Y-m-d-h:i:s") . ".txt";
    }




    function loging($logstatus = "Info", $content = NULL)
    {
        if($this->File_Name == ""){
            $file = $this->create_file_name();
        }


        if( filesize(LogLocation.$this->File_Name) > LogFileSize ){
            $this->File_Name = "";
            $file = $this->create_file_name();
        }


        $content =  "[".date("Y-m-d h:i:s")."]::[$logstatus]::[$content]";
        file_put_contents(LogLocation."/".$file, $content.PHP_EOL , FILE_APPEND | LOCK_EX);
    }


    /*function delete(){
        $this->File_Name="";
    }*/

/*    function loging($logstatus = "Info", $content = NULL)
    {
        ///////////// call CMS /////////////
        include_once("./cms.php");
        $objcms = new cms();

        $res_content = $objcms->get_select_record(1, "content");
        ///////////// call CMS /////////////

        if($res_content[0]["content"] != "") {
            $file = $res_content[0]["content"];

            $file_size = filesize($file);

            if($file_size > LogFileSize) {
                $file = LogLocation . "/serverlog".date("h:i:s").".txt";

                $col[] = "content";              $val[] = $file;

                $objcms->update_img('content', $col, $val,'id', 1, '', '');
            }

        } else {
            $file = LogLocation . "/serverlog".date("h:i:s").".txt";

            $col[] = "content";              $val[] = $file;

            $objcms->update_img('content', $col, $val,'id', 1, '', '');
        }
        //$file = LogLocation . "/serverlog.txt";

        $content =  "[".date("Y-m-d h:i:s")."]::[$logstatus]::[$content]";
        file_put_contents($file, $content.PHP_EOL , FILE_APPEND | LOCK_EX);
    }*/



} //class end

?>