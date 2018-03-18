<script src="https://www.gstatic.com/firebasejs/4.11.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.10.1/firebase-auth.js"></script>
<script src="account.js"></script>

<?php
    if(isset($_POST['name']) and isset($_POST['password'])){
        // check whether the login info is correct
        $name = $_POST['name'];
        $pw = $_POST['password'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login_info";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $a = $_POST["name"];
        $b = $_POST["password"];
        $uid = "";

        $have = false;
        $sql = "SELECT * FROM account_info WHERE username='$a'";
        $query = mysqli_query($conn, $sql);
        if($query){
            while ($row = mysqli_fetch_array($query)){
                if(password_verify($b, $row['user_pw'])){
                    $have = true;
                    $uid = $row['id'];
                    break;
                }
            }
        }

        if($have){
            // valid login
            echo $name."\n";
            echo $uid;
        }else{
            // back to login page
            echo "<script> window.location.href = './login.php'; </script>";
        }
    }
?>

<div>
    <button onclick="print_user()" style="background-color: #F1AA12; width: 15%">who am i</button>
</div>
<div>
    <button onclick="logout()" style="background-color: #F2AE72; width: 15%">Logout</button>
</div>
