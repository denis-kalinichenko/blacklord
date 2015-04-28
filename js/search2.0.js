function ajax_search() {
 $('div#ajax_cont').fadeTo("fast", 0.33);
 var text = $('input#search').val();
    $.post("search2.0.php", { text: text, },
   function(data) {
     $('div#ajax_cont').html(data);
     $('div#ajax_cont').fadeTo("fast", 1)
   });
}