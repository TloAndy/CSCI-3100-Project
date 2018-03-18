<form id='register' action='./createAccount.php' method='POST' 
    accept-charset='UTF-8'>

<legend>Register</legend>

<fieldset>

<div>
    <label for='uid' >User ID*:</label>
    <input type='text' name='uid' id='uid' maxlength="50" />
</div>

<div>
    <label for='username' >Username*:</label>
    <input type='text' name='username' id='username' maxlength="50" />
</div>

<div>
    <label for='password' >Password*:</label>
    <input type='password' name='password' id='password' maxlength="50" />
</div>

<div>
    <label for='cpassword' >Confirm Password*:</label>
    <input type='password' name='cpassword' id='cpassword' maxlength="50" />
</div>

<div>
    Upload a copy of Identity Proof here
</div>
<div>
<input type='button' value='Choose' />
</div>

<div>
    <input type='submit' name='Submit' value='Submit' />
</div>
</form>
</fieldset>

<?php
    function checkInfoFull(){
        if(empty($_POST["uid"]) or empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["cpassword"])){
            echo "!! please fill all fields !!";
        }else if($_POST["password"] != $_POST["cpassword"]){
            echo "!! confirm your pw !!";
        }else{
            regAccountFromDB();
        }
    }

    function regAccountFromDB(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login_info";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $a = $_POST["uid"];
        $b = $_POST["username"];
        $d = password_hash($_POST["password"], PASSWORD_BCRYPT);

        // check whether the name is registered first
        $have = false;
        $sql = "SELECT * FROM account_info WHERE username='$b'";
        $query = mysqli_query($conn, $sql);
        if($query){
            while ($row = mysqli_fetch_array($query)){
                $have = true;
                break;
            }
        }

        if(!$have){
            $sql = "INSERT INTO account_info (account_id, username, user_pw, google_id, verified)
            VALUES ('$a', '$b', '$d', '-1', '0')";

            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $str = $b."course";
            // create table
            $sql = "CREATE TABLE $str (
                id INT NOT NULL AUTO_INCREMENT,
                course_id TEXT,
                user_type TEXT,
                PRIMARY KEY (id)
            )";

            if ($conn->query($sql) === TRUE) {
                $conn->close();
                echo '<script type="text/javascript">
                        alert("Create Account Success!\nreturning to login page...");
                    </script>';
                echo '<script type="text/javascript">
                        window.location.href = "./login.php";
                    </script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $conn->close();
            }
        }else{
            echo 'Username is used!';
        }
    }

    if(isset($_POST["uid"]) and isset($_POST["username"]) and isset($_POST["password"]) and isset($_POST["cpassword"])){
        checkInfoFull();
    }
?>