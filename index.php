<?php
    //check if user comming from a request
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //assign variables
        $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $cell = filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);
        $msg  = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
        echo $user .'<br>';
        echo $mail.'<br>';
        echo $cell.'<br>';
        echo $msg.'<br>';
        
        // creating array of errors
        $formErrors = array();
        if(strlen($user) <=3){

            $formErrors[] = 'user name must be greter than <strong>3</strong> characters';
         
        }
        if(strlen($msg) <10){

            $formErrors[] = 'message should be greater than <strong>10</strong> characters';
         
        }
        
        // if no errors send the email [to,subject,message,header,parameters]
        $headers = 'from: '.$email.'\r\n';
        if(empty($formErrors)) {

                mail('naglaa@yahoo.com','form contact',$msg,$headers);
                $user ='';
                $mail = '';
                $cell = '';
                $msg = '';
                $success = '<div class="alert alert-success">you are receved your message</div>';
            }
    }



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>contact form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;0,900;1,900&display=swap" >   
     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!--start form-->
    <div class="container">
        <h1 class="text-center">Contact Me</h1>
        
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            
            <?php if(! empty($formErrors)) { ?> 
            <div class="alert alert-danger alert-dismissible" role="start">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php
                        foreach($formErrors as $error) {

                            echo $error .'<br/>';
        
                        }
                    ?>
            </div>   
            <?php } ?>
            <?php if(isset($success)) {echo $success;}?>

           <div class="form-group">
                <input class=" username  form-control" type="text" name="username" placeholder="type your name" value="<?php if(isset($user)){echo $user;}?>">
                <i class="fa fa-user fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert- custom-alert">
                    user name must be greter than <strong>3</strong> characters
                </div>
           </div>
            
            <div class="form-group">
                <input  class=" email form-control" type="email" name="email" placeholder="type your email" value="<?php if(isset($mail)){echo $mail;}?>">
                <i class="fa fa-envelope fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                        Email cann't be  <strong>empty</strong>
                </div>
            </div>
            <input class="form-control" type="text" name="cellphone" placeholder="type your phone" value="<?php if(isset($cell)){echo $cell;}?>">
            <i class="fa fa-phone fa-fw"></i>
            <div class="form-group">
                <textarea class=" message form-control" name="message" placeholder="type your message"><?php if(isset($msg)) {echo $msg;}?></textarea>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                message should be greater than <strong>10</strong> characters
                </div>
            </div>
            <input class="btn btn-success" type="submit" value="send message">
            <i class="fa fa-send fa-fw send-icon"></i>
        </form>
    </div>
    <!--End from-->
    
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>