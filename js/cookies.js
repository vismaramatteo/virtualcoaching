if (nibirumail_stop_jquery === undefined){
	var nibirumail_stop_jquery 	=	0;
}
if (cookie_policy_url === undefined){
	var cookie_policy_url	=	'https://nibirumail.com/cookies/policy/?url='+window.location.hostname;
}
if (nibirumail_advice_text === undefined){
	var nibirumail_advice_text = window.location.hostname +" utilizza i cookies per offrirti un'esperienza di navigazione migliore. Usando il nostro servizio accetti l'impiego di cookie in accordo con la nostra cookie policy. <a target=\"_blank\" href=\""+cookie_policy_url+"\">Scoprine di pi&ugrave;</a>. <a class=\"nibirumail_agreement\" href=\"javascript:;\">Ho capito.</a>";
}
function NibirumailgetCookie(name){ 
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
function NibirumailCookieAccept(){
	var now = new Date();
	now.setMonth( now.getMonth() + 3 ); 
	var parts = location.hostname.split('.');
	var subdomain = parts.shift();
	var upperleveldomain = parts.join('.');
	var sndleveldomain = parts.slice(-2).join('.');
	console.log(sndleveldomain); 
	document.cookie = 'nibirumail_cookie_advice=1; expires='+now.toUTCString()+'; path=/;'; 
	//document.cookie = 'nibirumail_cookie_advice=1; expires='+now.toUTCString()+'; path=/; domain='+sndleveldomain;
}
function init_NibirumailCookieWidget(){
	if (!window.jQuery && nibirumail_stop_jquery == 0) {	
		var jq = document.createElement('script'); jq.type = 'text/javascript';
		jq.src = 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js';
		document.getElementsByTagName('head')[0].appendChild(jq);
		setTimeout(init_NibirumailCookieWidget, 100);
	} else {
			var n = '#nibirumail_cookie_advice';
			if (NibirumailgetCookie('nibirumail_cookie_advice') === undefined)
			{
				if ( jQuery(n).length == 0 ){
					jQuery('body').append('<div id="nibirumail_cookie_advice"></div>');
				}
				jQuery(n).html(nibirumail_advice_text);
				jQuery(n).css('z-index', 999);
				jQuery(n).css('position', 'fixed');
				jQuery(n).css('bottom', 0);
				jQuery(n).css('left', 0);
				jQuery(n).css('width', '100%');
				jQuery(n).css('background', '#000');
				jQuery(n).css('color', '#fff');
				jQuery(n).css('text-align', 'center');
				jQuery(n).css('padding', '15px 0');
				jQuery(n).css('font-size', '12px');	
				jQuery('#nibirumail_cookie_advice a').css('color', '#fff');	 
				jQuery('#nibirumail_cookie_advice a').css('text-decoration', 'underline');	 
				jQuery('body').css('padding-bottom', jQuery(n).css('height'));	
				
				jQuery('body').on('click', '.nibirumail_agreement', function(){
					NibirumailCookieAccept();
					jQuery(n).fadeOut(function(){
						jQuery('body').css('padding-bottom', 'auto');	
					});
					if (typeof NibirumailCookieBlocker == 'function'){
						NibirumailCookieBlocker(1);
					}
					if (typeof NibirumailCookieAccept_callback == 'function'){
						NibirumailCookieAccept_callback();
					}					
				});
			}
			jQuery('body').on('click', '.nibirumail_delete_cookie', function(){
				document.cookie = 'nibirumail_cookie_advice=1; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
				document.location.reload();
			});		
	}
}
init_NibirumailCookieWidget();