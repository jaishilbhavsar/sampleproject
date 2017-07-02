<?php
class user_sign
{
    private static $conn=null;
    
    public static function connect()
    {
        self::$conn=mysqli_connect('localhost','root','','project_db');
        return self::$conn;
    }

    public static function disconnect(){
        mysqli_close(self::$conn);
        self::$conn=null;
    }
public function insuser()
    {
        $conn=user_sign::connect();
        $conn=new mysqli('localhost','root','','project_db');
        $rand_alpha=md5(rand());
        $token=substr($rand_alpha,0,6);
        $targerdir="images/";
        $targetfile=$targerdir.basename($_FILES["proimg"]["name"]);
        move_uploaded_file($_FILES["proimg"]["tmp_name"],$targetfile);
        $sql="insert into user_tbl values('".$_POST["txtmail"]."','".$_POST["txtname"]."','".$_POST["txtpass"]."','".$_POST["txtadd"]."','".$_POST["txtmobile"]."','".$_POST["gender"]."','".$targetfile."','user','no','".$token."')";
        if($conn->query($sql)===true)
        {
            header('location:user_login.php');
        }
        else
        {
            echo $sql;
        }error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
        require_once "phpmailer/class.phpmailer.php";
        $e1=$_POST["txtmail"];
        $message="localhost/bootstrapdemo/project/user_varify.php?tok='".$token."'&id='".$_POST["txtmail"]."'";
        // creating the phpmailer object
        $mail = new PHPMailer(true);

        // telling the class to use SMTP
        $mail->IsSMTP();

        // enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
        $mail->SMTPDebug = 0;

        // enable SMTP authentication
        $mail->SMTPAuth = true;

        // sets the prefix to the server
        $mail->SMTPSecure = 'ssl';

        // sets GMAIL as the SMTP server
        $mail->Host = 'smtp.gmail.com';

        // set the SMTP port for the GMAIL server
        $mail->Port = 465;

        // your gmail address
        $mail->Username = 'maildemo254@gmail.com';

        // your password must be enclosed in single quotes
        $mail->Password = 'maildemo1234';

        // add a subject line
        $mail->Subject = ' veri ';

        // Sender email address and name
        $mail->SetFrom('maildemo254@gmail.com', 'demo');

        $email1=$e1;
        // reciever address, person you want to send
        $mail->AddAddress($email1);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

    // add message body
        $mail->MsgHTML($message);


// add attachment if any
//$mail->AddAttachment('time.png');

    try {
        // send mail
	
	    //don't forget to enable openssl true from php_extensions
         $mail->Send();
         $msg = "Mail send successfully";
    } catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}

        return $res;
        user_sign::disconnect();
}
}




class user_login
{
    private static $conn=null;
    
    public static function connect()
    {
        self::$conn=mysqli_connect('localhost','root','','project_db');
        return self::$conn;
    }

    public static function disconnect(){
        mysqli_close(self::$conn);
        self::$conn=null;
    }

    public function getuser()
    {
        $conn=user_login::connect();
    
                $id=$_SESSION["userid"];
                $ps=$_SESSION["uspass"];
                $sql="select * from user_tbl where pk_email_id='".$id."' and password='".$ps."'";
                $res=$conn->query($sql);
                return $res;
                user_login::disconnect();
    }
}




class user_disp
{
    private static $conn=null;
    
    public static function connect()
    {
        self::$conn=mysqli_connect('localhost','root','','project_db');
        return self::$conn;
    }

    public static function disconnect(){
        mysqli_close(self::$conn);
        self::$conn=null;
    }
    public function getuser()
    {
        $conn=user_disp::connect();
        $id=$_SESSION["userid"];
        $conn=new mysqli('localhost','root','','project_db');
        $sql="select * from user_tbl where pk_email_id='".$id."'";
        $res=$conn->query($sql);
        return $res;
        user_disp::disconnect();
    }
    /*public function getuserch()
    {
        $conn=user_disp::connect();
        $id=$_SESSION["userid"];
        $ps=$_SESSION["userps1"];
        $sql="update user_tbl set password='".$ps."' where pk_email_id='".$id."'";
        $res=$conn->query($sql);
        return $res;
        user_disp::disconnect();
    }*/
}
?>