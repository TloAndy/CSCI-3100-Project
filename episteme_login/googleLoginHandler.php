<?php
    if(!isset($_POST['username'])){
        // echo "so sad";
    }else{
        // echo "so gd";
        addGoogleAccount($_POST['username'], $_POST['gid']);
    }

    function addGoogleAccount($google_username, $gid){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login_info";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $b = str_replace("'", "", $google_username);
        $e = $gid;

        // check whether registered
        $have = false;
        $sql = "SELECT * FROM account_info WHERE google_id='$gid'";
        $query = mysqli_query($conn, $sql);
        if($query){
            while ($row = mysqli_fetch_array($query)){
                echo $row['id'];
                $have = true;
                break;
            }
        }

        if(!$have){
            $sql = "INSERT INTO account_info (account_id, username, user_pw, google_id, verified)
            VALUES ('-1', '$b', '-1', '$e', '0')";

            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $b = str_replace(" ", "", $b);
            $str = $b."course";
            // create table
            $sql_ = "CREATE TABLE $str (
                id INT NOT NULL AUTO_INCREMENT,
                course_id TEXT,
                user_type TEXT,
                PRIMARY KEY (id)
            )";

            if ($conn->query($sql_) === TRUE) {
                // echo "New record created successfully";
            } else {
                echo "Error: " . $sql_ . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }
?>