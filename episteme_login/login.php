<script src="https://www.gstatic.com/firebasejs/4.11.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.10.1/firebase-auth.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="./login.js"></script>

<form role="form" method="POST" action="./home.php">
    <div>
        Username:
        <input type="text" name="name" id="name" placeholder="username" style="width: 20%">
    </div>

    <div>
        Password:
        <input type="password" name="password" id="password" placeholder="password" style="width: 20%">
    </div>

    <div>
        <input type="submit" value="LOGIN" id="submit" style="background-color: #F2AE72; width: 15%">
    </div>
</form>

<div>
    <button onclick="login()" style="background-color: #F1AA12; width: 15%">Login with Google</button>
</div>
<!-- <div>
    <button onclick="logout()" style="background-color: #F2AE72; width: 15%">Sign out Google</button>
</div> -->
<div>
    <button onclick="register()" style="background-color: #F2AE72; width: 15%">Create Account</button>
</div>
