<?php
header('Content-Type: application/json; charset=utf-8');

$name=$_GET['name'];
  
$con = mysqli_connect("localhost","zftsszne_shahrear","arshahrear30@gmail.com","zftsszne_my_database");
$sql = "SELECT * FROM user_table WHERE name LIKE '$name'"; 
//= না দিয়ে LIKE ব্যবহার করলাম এটার সুবিধা দেখো %name% এর আগে পরে যে % ব্যহার করছি এর ফলে হুবহু name থাকতে হবে না এর সাথে যেকোনো স্থানে মিললেই হবে ।

$result = mysqli_query($con,$sql); //Query Done
$rowcount = mysqli_num_rows($result); //result মধ্যে কয়টা row আছে সেটা বের করার code

$data = array();

foreach($result as $item){
    $id = $item['id'];
    $name = $item['name'];
    $mobile = $item['mobile'];
    $email = $item['email'];

    $userInfo['id'] = $id;
    $userInfo['name'] = $name;
    $userInfo['mobile'] = $mobile;
    $userInfo['email'] = $email;
    array_push($data, $userInfo);
}
echo json_encode($data);
?>
