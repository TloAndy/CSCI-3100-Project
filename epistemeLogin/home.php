<script src="https://www.gstatic.com/firebasejs/4.11.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.10.1/firebase-auth.js"></script>
<script src="account.js"></script>

<?php
    $name = $_POST["name"];
    $password = $_POST["password"];

    echo $name;
    echo $password;
?>

<div>
    <button onclick="print_user()" style="background-color: #F1AA12; width: 15%">who am i</button>
</div>
<div>
    <button onclick="logout()" style="background-color: #F2AE72; width: 15%">Logout</button>
</div>