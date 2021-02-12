<?php

session_start();

if(isset($_POST['Submit'])) {
    if (empty($_POST['UName']) || empty($_POST['Password'])) {
        header("location:login.php?Empty= Please Fill in the Blanks");
    } else {

        $username = $_POST['UName'];
        $password = $_POST['Password'];


        if(!empty($user)){

            $postRequest = array(
                'username' => $username,
                'password' => $password
            );

            $postRequestJson = json_encode($postRequest);

            $ch = curl_init("https://dmt.ge/retreive");
            //curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postRequestJson));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $postResponseJson = curl_exec($ch);
            curl_close($ch);

            $apiArrayResponse = json_decode($postResponseJson);

            if(!empty($apiArrayResponse['response']) || isset($apiArrayResponse['response']) ){
                $response = $apiArrayResponse['response'];
                $_SESSION["response"] = $response ;

                header("location:login.php?status=success");

            }elseif(!empty($apiArrayResponse['error']) || isset($apiArrayResponse['error']) ){
                $error = $apiArrayResponse['error'];
                $_SESSION["error"] = $error ;

                header("location:login.php?status=error");
            }else{
                $_SESSION["false"] = 'link is not working' ;
                //როდესაც ლინკდდან არაფერი არ დაბრუნდებ გათიშულია ან სხვა რაიმე სახის პრობლემაა
                header("location:login.php?status=false");
            }


        }


    }
}

?>