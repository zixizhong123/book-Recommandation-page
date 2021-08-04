<?php
// File name: bestreads.php
// Name: Zixi Zhong
if(isset($_GET['command'])&& $_GET['command']==='getAll'){
    $bookArray = glob ( './books/*' );
    // print_r($bookArray);
    echo json_encode ( $bookArray );}
    else{
        $result ='<div class="onereview">';
        
        $path = $_GET['command'];
        
        $info = file($path.'/info.txt');
        $description = file_get_contents($path.'/description.txt');
        $review = file($path.'/review.txt');
        $pic = '<img src="'.$path.'/cover.jpg'.'" alt="Book pic" class="onebook"'.'>';
        
        $result = $result.$pic.'<b>'.$info[0].'</b>'.'<br>'.$info[1].'<br><br>'.
            $description. '<br><br>'.'<b>'.$review[0]." ";
        $temp = '';
        for ($j=0;$j<$review[1];$j++){
            $temp = $temp.'*';
        }
        $result = $result.$temp.'</b><br>';
        for ($i=2; $i<sizeof($review); $i++){
                $result = $result.$review[$i];  
        }
       
        echo json_encode($result.'</div>');
    }
?>