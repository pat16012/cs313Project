<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
require_once ('db.php');
$db = get_db();
session_start();

// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = pg_escape_string($_GET['email']); 
    $hash = pg_escape_string($_GET['hash']); 
    
    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $result = $db->prepare("SELECT email, active FROM users WHERE email='$email' AND active='F'");
    $result->execute();
    $resultData = $result->fetch_assoc(PDO::fetch_assoc)

    if ( $resultData == $email && active = 'F' )
    { 
        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";

        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Your account has been activated!";
        
        try{
           // Set the user status to active (active = 1)
            $dbUpdate = $db->prepare("UPDATE users SET active='T' WHERE email='$email'");
            $dbUpdate->execute();
            $_SESSION['active'] = 'T';
            }
            catch (PDOException $ex)
            {
                echo "Error with DB. Details: $ex";
                die();
            }
        
        header("location: success.php");
    }
}
else {
    $_SESSION['message'] = "Invalid parameters provided for account verification!";
    header("location: error.php");
}     
?>