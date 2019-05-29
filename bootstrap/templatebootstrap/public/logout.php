<?php
session_start();
?>
<?php
                            $_SESSION['password'] = null;
                            $_SESSION['first_name'] = null;
                            $_SESSION['last_name'] = null;
                            $_SESSION['user_role'] = null;
                            header("Location: ../public/index.php");
?>