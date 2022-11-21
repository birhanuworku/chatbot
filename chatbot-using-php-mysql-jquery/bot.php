<?php
$conn=mysqli_connect("localhost","root","", "onlinebot");
if($conn){
  $user_message=mysqli_real_escape_string($conn, $_POST['messageValue']);
  $query="SELECT * FROM chatbot WHERE messages LIKE '%$user_message%'";
  $runquery=mysqli_query($conn, $query);
  if(mysqli_num_rows($runquery) > 0){
    //fetch result
    $result=mysqli_fetch_assoc($runquery);
    //echo result
     echo $result['response'];
  }
  else{
    echo "Sorry can't be able to understand you ";
  }
}
else{
    echo "connection fiald" . mysqli_connect_error();
}
?>