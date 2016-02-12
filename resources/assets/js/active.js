$(document).ready(function() {
     var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
     alert(pgurl);
     $("div ul a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
            $(this).closest("li").addClass("active");
          else
            $(this).closest("li").removeClass("active");

     })
});

/* here's the code if u want to use plain javascript

function setActive() {
  aObj = document.getElementById('nav').getElementsByTagName('a');
  for(i=0;i<aObj.length;i++) { 
    if(document.location.href.indexOf(aObj[i].href)>=0) {
      aObj[i].className='active';
    }
  }
}

window.onload = setActive;

*/