<?php
    include 'dbcon.php';
    $list = $_POST['img'];
    $age = $_POST['age'];
    if(count($list) == 2){
      $vote_query="UPDATE VOTE SET VOT_VALUE=VOT_VALUE+1 WHERE (IMG=$list[0] OR IMG=$list[1]) AND AGE=$age";
    }
    else{
      $vote_query="UPDATE VOTE SET VOT_VALUE=VOT_VALUE+1 WHERE IMG=$list[0] AND AGE=$age";
    }
    mysqli_query($con,$vote_query);
    header( 'Location: http://13.124.252.48' );
?>
