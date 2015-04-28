(function( $ ){

	var jtobj, lastval="", lexe=false;
	var tags="";
    var methods = {

		resize: function(char, ctl) {
			var re_nl = null;
			var ch = String.fromCharCode(char);

			var st = ctl.val();
			lastval = st;
			st = st.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");

				var text = escape(st);
				if(text.indexOf('%0D%0A') > -1){
					re_nl = /%0D%0A/g ;
				}else if(text.indexOf('%0A') > -1){
					re_nl = /%0A/g ;
				}else if(text.indexOf('%0D') > -1){
					re_nl = /%0D/g ;
				}
				if (re_nl) st = unescape( text.replace(re_nl,'<br />&#00;') );
				if (char == 13) st+="<br />&#00;";

				jt_obj.html( st+ch );
				var h = jt_obj.height();
			    ctl.css( { height: h+"px" } );
				setTimeout(function() {	methods.ctrltag(ctl); }, 0);

		},
		ctrltag: function(ctl) {

				if (!tags) return;
				var st = ctl.val();
				var ct = st.match(/<[^\/](.*?)>/ig);
				for (var i in ct) {
					var tag = "<"+/\w+/.exec(ct[i])+">";
					if ( (tags[0] == "!" && tags.indexOf(tag) != -1) || (tags[0] != "!" && tags.indexOf(tag) == -1) )
					{
						alert ( tag+" not permitted. ");
						ctl.val( st.replace( ct[i], "" ) );
						methods.resize(null, ctl);
						break;
					}
				}
		},

		html: function (ctl) {

			var re_nl = null;
			var st = ctl.val();

				var text = escape(st);
				if(text.indexOf('%0D%0A') > -1){
					re_nl = /%0D%0A/g ;
				}else if(text.indexOf('%0A') > -1){
					re_nl = /%0A/g ;
				}else if(text.indexOf('%0D') > -1){
					re_nl = /%0D/g ;
				}
				if (re_nl) st = unescape( text.replace(re_nl,'<br />') );

			var reg = /^(http|https|ftp)\:\/\/([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)?((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.[a-zA-Z]{2,4})(\:[0-9]+)?(\/[^\/][a-zA-Z0-9\.\,\?\'\\/\+&amp;%\$#\=~_\-@]*)*$/;

			//var reg = /^https?\:\/\/(www\d?\d?\d?\d?\.)?([A-Za-z0-9-_]+\.)?[A-Za-z0-9-_]+((\.[A-Za-z]{2,6})(\.[A-Za-z]{2})?([0-9-_%&\?\/\.=]*))$/i;

			var ns = st.match(/(<a(.*?)<\/a>)|([\w\.\/@]+)/g);

			for ( var i in ns ) {

				if ( /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(ns[i]) == true) {

					var rem = new RegExp("(^|[^\\:>])"+ns[i]+"(\\b)","g");
			 		st = st.replace(rem, "$1<a href='mailto:"+ns[i]+"'>"+ns[i]+"</a>");
				} else
				{
				var urlv="";
				if ( reg.test(ns[i]) ) urlv=ns[i];
				else if ( reg.test("http://"+ns[i]) ) urlv="http://"+ns[i];

				if (urlv) {
					var rep = new RegExp("(^|[^\\/>])"+ns[i]+"(\\b)","g");
			 		st = st.replace(rep, "$1<a href='"+urlv+"'>"+ns[i]+"</a>");
				}
				}




			}

			return st;

		}
	}

	$.fn.jhtml = function (options) {
		return methods.html( $(this) );
	}

	$.fn.jtextarea = function(opt) {

		var hmin=0;

		var settings = {
			tags : ""
		};

		if(opt)	$.extend(settings, opt);

		jt_obj = $('<div id="jt_clone_area"></div>')
            .css({display:'none'})
            .appendTo('body')


		this.each(function(){

			$(this).css( {overflow: "hidden", resize:"none" } );

			hmin = $(this).height();

			$(this)
			.keypress( function(e) {
				lexe = true;
				//methods.resize(e.charCode, ctl);
				methods.resize(e.charCode, $(this));
			})
			.keyup( function(e) {

				if (!lexe) {
				 if (lastval !=  $(this).val() ) {
					jt_obj.css({"min-height":hmin+'px'});
					methods.resize(null, $(this));
				 }
				}
				lexe = false;
			});

			$(this).bind("paste", function(e) {
				lexe = false;
				var ctl = $(this);
				setTimeout(function() {	methods.resize(null, ctl); }, 0);
			});

			$(this).bind("cut", function(e) {
				lexe = false;
				jt_obj.css({"min-height":hmin+'px'});
				var ctl = $(this);
				setTimeout(function() {	methods.resize(null, ctl); }, 0);
			});


			$(this).focus( function(e) {
				e.preventDefault();
				tags = settings.tags;
				var w = $(this).width();
				var h = $(this).height();
				var styles = window.getComputedStyle(this, null);;

				var st = null;
				for ( var i in styles ) {

        			if ( /:/i.test(styles[i]) ) {
						st = styles[i].match(/font[^;]+/ig);
						var le = styles[i].match(/line-height[^;]+/ig);
						if(le) st.push(le[0]);
						break;
        			};
      			};

				if (st) {
					for ( var i in st ) {
						var na = st[i].split(":");
        				jt_obj.css( na[0], na[1] );
					}
				}

				jt_obj.css({width:w+'px', "min-height":hmin+"px"});
				methods.resize(null, $(this));

			});

			var w = $(this).width();
			var h = $(this).height();
			var styles = window.getComputedStyle(this, null);;

			var st = null;
			for ( var i in styles ) {

        		if ( /:/i.test(styles[i]) ) {
					st = styles[i].match(/font[^;]+/ig);
					var le = styles[i].match(/line-height[^;]+/ig);
					if(le) st.push(le[0]);
					break;
        		};
      		};

			if (st) {
				for ( var i in st ) {
					var na = st[i].split(":");
        			jt_obj.css( na[0], na[1] );
				}
			}
			jt_obj.css({width:w+'px', "min-height":hmin+"px"});
			methods.resize(null, $(this));

	});


 }

})( jQuery );

function isNotMax(oTextArea) {
       return oTextArea.value.length <= 180;
}

function submit_form(id){
  if(id==1) {var charLength = $("#date_input").val().length; var max_char = 200; var min_char = 4; var value = $("#date_input").val();}
  if(id==2) {var charLength = $("#can_input").val().length; var max_char = 200; var min_char = 4; var value = $("#can_input").val();}
  if(id==3) {var charLength = $("#txtInput").val().length; var max_char = 180; var min_char = 10; var value = $("#txtInput").val();}
    if (charLength > max_char){
         var diff = charLength - max_char;
        alert("Ваш вопрос слишком большой.\nВластелин восхищён, но он не может ответить всем на запросы. У него много дел.\nМаксимальное количество символов превышено на "+diff+".");
    }
    else {
      if(value=="") {
       alert("Напишите хоть что-нибудь.");
      }
      else {
        if (charLength < min_char){
        alert("Чёрный Властелин не рассматривает маленькие вопросы.\nОн любит большие.");
    }
    else {
      // Отправляем, ок
  if(id==1) {document.form.submit();}
  if(id==2) {document.form2.submit();}
  if(id==3) {document.form3.submit();}
    }
      };
    }
}
var isCtrl = false;
$(document).keyup(function (e) {
if(e.which == 17) isCtrl=false;
}).keydown(function (e) {
    if(e.which == 17) isCtrl=true;
    if(e.which == 13 && isCtrl == true) {
    submit_form();
 	return false;
 }
});

(function($) {
$(function() {

	function createCookie(name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
	}
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	function eraseCookie(name) {
		createCookie(name,"",-1);
	}

	$('ul.tabs').each(function(i) {
		var cookie = readCookie('tabCookie'+i);
		if (cookie) $(this).find('li').eq(cookie).addClass('current').siblings().removeClass('current')
			.parents('div.section').find('div.box').hide().eq(cookie).show();
	})

	$('ul.tabs').delegate('li:not(.current)', 'click', function() {
		$(this).addClass('current').siblings().removeClass('current')
			.parents('div.section').find('div.box').eq($(this).index()).fadeIn(400).siblings('div.box').hide();
		var ulIndex = $('ul.tabs').index($(this).parents('ul.tabs'));
		eraseCookie('tabCookie'+ulIndex);
		createCookie('tabCookie'+ulIndex, $(this).index(), 365);
	})
    var tabIndex = window.location.hash.replace('#tab','')-1;
	if (tabIndex != -1) $('ul.tabs li').eq(tabIndex).click();

	$('a[href^=#tab]').click(function() {
		var tabIndex = $(this).attr('href').replace('#tab','')-1;
		$('ul.tabs li').eq(tabIndex).click();
	});

})
})(jQuery)

function settab(id) {
  window.location.hash = 'tab'+id+'';
  if(id==1) {
  $('#date_input').focus();
  }
  if(id==2) {
  $('#can_input').focus();
  }
  if(id==3) {
  $('#txtInput').focus();
  }
}
function share() {
  $('#share').slideToggle("fast");
  $('#author').hide(500);
  $('#about').hide(500);
  $('.link_share').focus();
}
function author() {
  $('#author').slideToggle();
  $('#share').hide(500);
  $('#about').hide(500);
}
function about() {
  $('#about').slideToggle();
  $('#share').hide(500);
  $('#author').hide(500);
}
function set_input(text, id) {
  if(id==1) {$("textarea#date_input").val(text);}
  if(id==2) {$("textarea#can_input").val(text);}
}
function gup( name ) {
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return results[1];
}
var t;
function a(id){ t = !t; var n;
if(id==1) { var input = 'pri1'; var img = '#privacy1'; }
if(id==2) { var input = 'pri2'; var img = '#privacy2';}
if(id==3) { var input = 'pri3'; var img = '#privacy3';}
if(t) {
 	n=0;
    $(img).attr("src","http://png.findicons.com/files/icons/1579/devine/32/lock.png");
    $("input#"+input+"").val(1);
    $(img).attr("title","Приватность: вкл.");
 } else {
 	n=1;
    $(img).attr("src","http://png.findicons.com/files/icons/1579/devine/32/un_lock.png");
    $("input#"+input+"").val(0);
    $(img).attr("title","Приватность: выкл.");
 } return false;
}