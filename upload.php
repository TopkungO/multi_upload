<?php
require_once "connect.php";

    if(isset($_POST["submit"])){
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

        // /*วิธที่3*/
        foreach($_FILES['upload']['tmp_name'] as $key=>$value){
            $files_name =$_FILES['upload']['name'];
            $extension = strtolower(pathinfo($files_name[$key],PATHINFO_EXTENSION));
            $suport =array('jpg','jpeg','png','gif');
            
            if( in_array($extension,$suport)){
                //$new_name =rand(0,microtime(true))."_".$files_name[$key];
                $new_name =rand(0,microtime(true)).".".$extension;
                if(move_uploaded_file($_FILES['upload']['tmp_name'][$key], "upload/".$new_name)){
                    $sql="INSERT INTO images ( image, product_id, create_at) VALUES ( :image , 1 , :datetime )";
                    $stmt = $conn->prepare($sql);
                    $params = array(
                        'image' => $new_name,
                        'datetime' => date("Y-m-d h:i:s")
                    );
                    $stmt->execute($params);
            }
            }else{
                echo "ไม่มีรองรับนามสกุลนิ" .$extension;
            }
            
            
            
            
        }
    
        // /*วิธีที่1 */
        // $count = count($_FILES["upload"]['name']);
        // $files = array();
        // for($i = 0;$i < $count ;$i++){
        //     $files[$i]['name']=$_FILES["upload"]['name'][$i];
        //     $files[$i]['type']=$_FILES["upload"]['type'][$i];
        //     $files[$i]['tmp_name']=$_FILES["upload"]['tmp_name'][$i];
        //     $files[$i]['error']=$_FILES["upload"]['error'][$i];
        //     $files[$i]['size']=$_FILES["upload"]['size'][$i];
        // }
        // echo "<pre>";
        // print_r($files);
        // echo "</pre>";
        
        // /*วิธีที่2 */
        // $count = count($_FILES["upload"]['name']);
        // $files = array();
        // for($i = 0;$i < $count ;$i++){
        //     foreach($_FILES["upload"] as $key=>$value){
        //         $files[$i][$key]=$_FILES["upload"][$key][$i];

        //     }
        // }
        // echo "<pre>";
        // print_r($files);
        // echo "</pre>";
        // }

    }
