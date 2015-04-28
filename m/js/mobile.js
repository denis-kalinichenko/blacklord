function submit_form(id){
  if(id==1) {var send_url = "calc.php?info="+info+"";}
var charLength = $("#txtInput").val().length;
    if (charLength > 160){
         var diff = charLength - 160;
        alert("Ваш вопрос слишком большой.\nВластелин восхищён, но он не может ответить всем на запросы. У него много дел.\nМаксимальное количество символов превышено на "+diff+".");
        return false;
    }
    else {
      if($("#txtInput").val()=="") {
       alert("Напишите хоть что-нибудь.");
               return false;
      }
      else {
        if (charLength < 8){
        alert("Чёрный Властелин не рассматривает маленькие вопросы.\nОн любит большие.");
                return false;
    }
    else {
      var info = $("#txtInput").val();
      if(id==1) {var send_url = "calc.php?info="+info+"";}
      if(id==2) {var send_url = "calc_date.php?info="+info+"";}
      if(id==3) {var send_url = "calc_can.php?info="+info+"";}
    window.location = send_url;
    return false;
    }
      }
     ;
    }
}