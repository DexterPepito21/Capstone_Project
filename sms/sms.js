$(document).ready(function(){
    $("#show").click(function(){
      $("div.toShow").fadeIn(1500).show();
      $("select.toShow").fadeIn(1500).show();
    });
  });

  $(function(){

    $("#status").change(function(){
        var status = this.value;
        if(status=="1"){
            $("div.toShowSched").hide();
        }else{
            $("div.toShowSched").show();
        }
      if(status=="1")
        $("#icon_class, #background_class div.toShowSched").hide();// hide multiple sections
     });
     
   });

//Navbar
const iconTrigger = document.querySelector('#iconTrigger')
const arrow = document.querySelector('#arrow')
const sidebarMain = document.querySelector('.sidebar-main')

iconTrigger.addEventListener('click', () => {
  if (arrow.classList.contains('fa-bars')) {
    /* Icon */
    arrow.classList.remove('fa-bars')
    arrow.classList.add('fa-arrow-left')
    /* Sidebar */
    sidebarMain.classList.add('show')
    sidebarMain.classList.remove('hide')
  } else {
    /* Icon */
    arrow.classList.add('fa-bars')
    arrow.classList.remove('fa-arrow-left')
    /* Sidebar */
    sidebarMain.classList.remove('show')
    sidebarMain.classList.add('hide')
  }
})