function ajax_search() {
 $('table.main').fadeTo("fast", 0.33);
 var text = $('input#search').val();
 $.post("search.php", { text: text, },
   function(data) {
     $('div#ajax_cont').html(data);
     $('table.main').fadeTo("fast", 1)
   });
}