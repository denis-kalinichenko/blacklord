function loader() {
 var loader_cont = document.getElementById('loader');
    document.getElementById('box_content').innerHTML = loader_cont.innerHTML;
}
function share() {
   $("#bottom a[rel=tipsy]").tipsy("hide");
  $('#box_overlay').fadeIn(200);
  $('#box').center();
  document.getElementById('box').style.display="block";
  loader();
  var title = "Поделиться";
  $.post("/al_share.php", function(data){
       document.getElementById('box_title').innerHTML=title;
       document.getElementById('box_content').innerHTML=data;
       setInterval("$('#box').center()", 50);
       return false;
  }
      );
}
function hide_box() {
   $('#box_overlay').fadeOut(200);
   document.getElementById('box').style.display="none";
 document.getElementById('box_content').innerHTML="";
}

 jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", (($(window).height() - this.outerHeight()) / 2) +
                                                $(window).scrollTop() + "px");
    this.css("left", (($(window).width() - this.outerWidth()) / 2) +
                                                $(window).scrollLeft() + "px");
    return this;
}