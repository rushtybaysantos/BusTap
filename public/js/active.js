$(function() {
     var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
     $("div ul a").each(function(){
          var navurl = $(this).attr("href")
          var trimmednavurl = navurl.substr(navurl.lastIndexOf('/') + 1);
          if(trimmednavurl == pgurl || trimmednavurl == '' )
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