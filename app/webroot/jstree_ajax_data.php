<?php
require_once "connect.php";

$id=trim($_REQUEST["id"]);
$parent=trim($_REQUEST["parent"]);

$data=array();

$states = array(
  	"success",
  	"info",
  	"danger",
  	"warning"
);



if($parent == "#") {

       $tresult=mysqli_fetch_assoc(mysqli_query($link,"select * from acs_trees where position_id=".$id));
       $result=mysqli_fetch_assoc(mysqli_query($link,"select * from acs_users where id=".$tresult['user_id']));	 
	   $rmposition=mysqli_fetch_assoc(mysqli_query($link,"select * from acs_positions where id=".$id));
	      
       $full_name=$result['first_name'].' '.$result['last_name'];	
	   $username=$result['username'];	


		$data[] = array(
			"id" => "node_".$tresult['position_id'],  
			"text" => $full_name.'('.$username."-".$rmposition['referralcode'].")", 
			"icon" => "fa fa-folder icon-lg icon-state-success",
			"children" => true, 
			"type" => "root"
		);

} else {

   $exp=explode("_",$parent);	

   $parent_id=$exp[1];

   $sQuery=mysqli_query($link,"select * from acs_trees where parent_id=".$parent_id);

   if(mysqli_num_rows($sQuery)>0){

    while($result=mysqli_fetch_assoc($sQuery)){	   

       $user=mysqli_fetch_assoc(mysqli_query($link,"select * from acs_users where id=".$result['user_id']));	
	       
	   $rmposition=mysqli_fetch_assoc(mysqli_query($link,"select * from acs_positions where id=".$result['position_id']));

 
	$full_name=$user['first_name'].' '.$user['last_name'];	
	$username=$user['username'];


    $data[] = array(



			"id" => "node_".$result['position_id'],  

			"text" => $full_name.'('.$username."-".$rmposition['referralcode'].")", 

			"icon" => "fa fa-folder icon-lg icon-state-success",

			"children" => true, 

			"type" => "root"

		); 	

	

     }

	} else {

	  $data[] = array(

			"id" => "node_0",  

			"icon" => "fa fa-file fa-large icon-state-default",

			"text" => "No childs ", 

			"state" => array("disabled" => true),

			"children" => false

		);

	}

}





header('Content-type: text/json');

header('Content-type: application/json');

echo json_encode($data);

?>