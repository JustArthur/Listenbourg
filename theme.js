function createCookie(name, value, timeInSeconds) {
    var date = new Date();
    date.setTime(date.getTime()+(timeInSeconds*1000));
    var expires = "; expires="+date.toGMTString();
 
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(cname) {
let name = cname + "=";
let decodedCookie = decodeURIComponent(document.cookie);
let ca = decodedCookie.split(';');
for(let i = 0; i <ca.length; i++) {
 let c = ca[i];
 while (c.charAt(0) == ' ') {
   c = c.substring(1);
 }
 if (c.indexOf(name) == 0) {
   return c.substring(name.length, c.length);
 }
}
return "";
}

function changeTheme() {
   var element = document.body;
   const isDarkModeOn = element.classList.toggle("body-black");
   createCookie("isDarkModeOn", isDarkModeOn.toString(), 60 * 60 * 24); // 1 day expiry date
}

window.onload = function () {
    const isDarkModeOn = getCookie("isDarkModeOn");
    if(isDarkModeOn === "true") document.body.classList.add("body-black");
}