<?php

@session_start();
date_default_timezone_set('Asia/Dhaka');
require_once("../db_connect/config.php");
require_once("../db_connect/conect.php");
$db = new database();

  

		if(isset($_POST["answer"]))
		{
				$explod=explode('and',$_POST['val']);
                
                if(!isset($explod[2]))
                {
                    $explod[2]="0";
                }
            
				$d="DELETE FROM `answer_sheet` WHERE `Student_ID`='".$_POST["StdID"]."' AND `Exam_ID`='".$_POST["exam"]."' AND `Qiestion_ID`='".$explod[0]."'";
				$db->link->query($d);

				$sql="INSERT INTO `answer_sheet` (`Student_ID`,`Exam_ID`,`Qiestion_ID`,`Answer`,`Option`) VALUES ('".$_POST["StdID"]."','".$_POST["exam"]."','".$explod[0]."','".$explod[1]."','".$explod[2]."')";

				$query=$db->link->query($sql);
				
		}
?>