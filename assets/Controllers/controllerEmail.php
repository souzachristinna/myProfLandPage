<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "C:/xampp/htdocs/_myProfLandPage/assets/class/PHPMailer-master/src/PHPMailer.php";
require_once "C:/xampp/htdocs/_myProfLandPage/assets/class/PHPMailer-master/src/SMTP.php";
require_once "C:/xampp/htdocs/_myProfLandPage/assets/class/PHPMailer-master/src/Exception.php";


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();

//var recipt
$name=isset($_POST['name']) ? $_POST['name'] : 'Não informado';
$email=($_POST['email']);
$message=($_POST['message']);
$data = date('d/m/Y H:i:s');


//try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                       
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'ateviloja@gmail.com';                     // SMTP username
    $mail->Password   = 'viniCius1++';                               // SMTP password
    $mail->Port       = 587;                                       // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress("ateviloja@gmail.com"); 

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contato da WebLandPage';
    $mail->Body    = "<b>Contato enviado da WebLandPage!</b> <br>
    Eu sou: $name <br>
    Meu email: $email <br>
    Mensagem: $message <br>
    $data
    ";
    
    if ($mail->send()) {
        echo 
        "<script> 
            localStorage.setItem('sucess', '1');
            window.location.href = 'http://localhost/_myProfLandPage/index.php#contatos';        
        </script>";
        //header("Location:../indexCopy.php");

    }  else {
        echo 
        "<script>    
            alert('Mensagem não Enviada'); 
            window.location.href = 'http://localhost/_myProfLandPage/index.php#contatos';  
        </script>";
        
    };
        
    /*
    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}*/

//echo "Hello Word";

?>

