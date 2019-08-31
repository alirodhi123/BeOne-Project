$("#submit_chat").click(function(anu){
   anu.preventDefault();
   var obrol = $("#chat").val();
$("#centerbox").append("<div id='isi'>"+obrol+"</div>").children(':last').hide().fadeIn(1000);
   
  var objDiv = document.getElementById("centerbox");
  objDiv.scrollTop = objDiv.scrollHeight;   

$("form#chatForm")[0].reset();
     return false;
});
