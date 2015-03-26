/*
 $('a.post-to-page').click(function (event) {
 
 });
 
 function post_to_page(access_token_data) {
 var body = 'Reading JS SDK documentation';
 FB.api(
 '/page_id/feed',
 'post', {
 message: body,
 access_token: access_token_data
 },
 function (response) {
 if (!response || response.error) {
 console.log(response.error);
 } else {
 console.log(response.id);
 }
 });
 }
 
 
 **************** 
 
 function statusChangeCallback(response) {
 //    console.log('statusChangeCallback');
 //    console.log(response);
 if (response.status === 'connected') {
 testAPI();
 
 //window.location = 'postFacebook.php';
 } else if (response.status === 'not_authorized') {
 document.getElementById('status').innerHTML = 'Please log ' +
 'into this app.';
 } else {
 document.getElementById('status').innerHTML = 'Please log ' +
 'into Facebook.';
 }
 }
 
 function checkLoginState() {
 FB.getLoginStatus(function (response) {
 //if (response.status !== 'connected') {
 statusChangeCallback(response);
 //}
 });
 }
 
 
 
 (function (d, s, id) {
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id))
 return;
 js = d.createElement(s);
 js.id = id;
 js.src = "//connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
 
 function testAPI() {
 FB.api('/me', function (response) {
 document.getElementById('status').innerHTML =
 'Thanks for logging in, ' + response.name + '!';
 });
 }
 
 function logout() {
 FB.logout(function (response) {
 // user is now logged out
 });
 }
 checkLoginState();
 */

window.fbAsyncInit = function () {
    FB.init({
        appId: '640961876010371',
        xfbml: true,
        version: 'v2.3',
        cookie: true, 
        xfbml: true, 
    });

    checkLoginState()
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function login() {
    FB.login(function (response) {
        if (response.authResponse) {
            console.log('Welcome! Fetching your information.... ');
            FB.api('/me', function (response) {
                console.log('Good to see you, ' + response.name + '.');
                console.log(response);
            });
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    }, {scope: 'public_profile,email,manage_pages,publish_actions'}
    );
}
/*
 function statusChangeCallback() {
 FB.getLoginStatus(function (response) {
 if (response.status === 'connected') {
 //console.log(response.authResponse.accessToken);
 //post_to_page(response.authResponse.accessToken);
 console.log(response.authResponse);
 
 return response.authResponse.accessToken;
 }
 });
 }
 */
function checkLoginState() {
    FB.getLoginStatus(function (response) {
        if (response.status !== 'connected') {
            login();
        } else {
            console.log(response.authResponse.accessToken);

            return response.authResponse.accessToken;
        }
    });
}

function logout() {
    FB.logout(function (response) {
        // user is now logged out
    });
}