function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  } else {
    var expires = "";
  }
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ')
      c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) 
      return c.substring(nameEQ.length,c.length);
    }
  return undefined;
}

function eraseCookie(name) {
  createCookie(name,"",-1);
}

function HideContent(d) {
  document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
  document.getElementById(d).style.display = "block";
}

function abdismiss() {
  createCookie('abdismiss','OK',14);
  HideContent('OKjbdp99tsfsf');
}

// init
var abd = readCookie('abdismiss');
if (abd == undefined) {
  if(!document.getElementById('uhYVeDaWErr')){
    ShowContent('OKjbdp99tsfsf');
  }
}