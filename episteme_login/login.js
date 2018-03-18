var provider = new firebase.auth.GoogleAuthProvider();

var config = {
    apiKey: "AIzaSyD7Glqq41g5juSnf9OZoqtqfYa-TFhMnA8",
    authDomain: "episteme-65685.firebaseapp.com",
    databaseURL: "https://episteme-65685.firebaseio.com",
    projectId: "episteme-65685",
    storageBucket: "",
    messagingSenderId: "834405410296"
};
firebase.initializeApp(config);

var user = firebase.auth().currentUser;
if(user){
    window.location.href = "./home.php";
    console.log(user.displayName);
}

function login(){
    firebase.auth().signInWithPopup(provider).then(function(result) {
        var token = result.credential.accessToken;
        var user = result.user;
    }).catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        var email = error.email;
        var credential = error.credential;
    });
}

function logout(){
    firebase.auth().signOut().then(function() {
    // Sign-out successful.
    }).catch(function(error) {
    // An error happened.
    });
}

function register(){
    window.location.href = "./createAccount.php";
}

function print_user() {
    var user = firebase.auth().currentUser;
    if(user){
        user.providerData.forEach(function (profile) {
            console.log("Sign-in provider: "+profile.providerId);
            console.log("  Provider-specific UID: "+profile.uid);
            console.log("  Name: "+profile.displayName);
            console.log("  Email: "+profile.email);
            console.log("  Photo URL: "+profile.photoURL);
        });
    }else{

    }
}

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        print_user();
        console.log("login success")
        // when logged in
        // post to php to add record to db
        $.post('googleLoginHandler.php', { username : user.displayName, gid : user.uid }, function(data){
             
            // show the response
            // $('#response').html(data);
            console.log(data);
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        }).done(function(){
            window.location.href = "home.php";  
        });
    }
    // window.location.href = "googleLoginHandler.php";
});
