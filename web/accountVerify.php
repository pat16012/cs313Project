<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/

require ('db.php');
$db = get_db();
session_start();


// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = pg_escape_string($_GET['email']);  
    $hash = pg_escape_string($_GET['hash']); 
    
    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $query = "SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='FALSE'";
    $result = pg_query($db,$query);
    $resultData = pg_fetch_all($result,PGSQL_BOTH);

    if ( $resultData[0][5] == 'TRUE' )
    { 
        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";

        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Your account has been activated!";
        
        // Set the user status to active (active = 1)
        $sql = "UPDATE users SET active='TRUE' WHERE email='$email'";
        if( pg_query($db, $sql)){
            $_SESSION['active'] = 1;
            header("location: success.php");
        }
        else{
            $_SESSION['message'] = "Activation Failed, Please try again";
            header("location: error.php");
        }
    }
}
else {
    $_SESSION['message'] = "Invalid parameters provided for account verification!";
    header("location: error.php");
}     
?>