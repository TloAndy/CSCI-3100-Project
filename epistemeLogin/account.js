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
if(!user){
    window.location.href = "http://127.0.0.1/episteme/login.php";
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

function logout(){
    firebase.auth().signOut().then(function() {
        // Sign-out successful.
        console.log("Sign-out successful");
        window.location.href = "http://127.0.0.1/episteme/login.php";
    }).catch(function(error) {
        // An error happened.
        console.log(error.message);
    });
}