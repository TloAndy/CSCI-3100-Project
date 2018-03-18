<h1>Account Created Successfully.</h1>
returning to login page within 5 seconds...

<?php
    echo 'Account Created Successfully.';
    echo 'returning to login page within 5 seconds...';
    sleep(5);
    echo '<script type="text/javascript">
            window.location.href = "./login.php";
        </script>';
?>