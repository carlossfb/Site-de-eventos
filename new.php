 <html lang="en">
  <head>
		<!--API do google para login-->
		<meta name="google-signin-scope" content="profile email">
		<script src="http://apis.google.com/js/platform.js" async defer></script>
		<meta name="google-signin-client_id" content="590856753485-ub9e866v8k3l11622au9pji1ppebd5kn.apps.googleusercontent.com">
  </head>
  <body>
  
<script type="text/javascript">

  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
  function signOut(){
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>  
	<a href="#" onclick="signOut();">Sign out</a><br>
<div class="g-signin2" data-onsuccess="onSignIn"></div>  </body>
</html>