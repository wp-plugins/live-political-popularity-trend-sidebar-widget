 // Start form functions 

    function writeText (form) {
      var input_first_name = form.first_name.value;
      var input_second_name = form.second_name.value;
      var range = form.drop_down_range.value;
      var geo = form.drop_down_geo.value;
      var img_url ="http://trends.google.com/trends/viz?q="

          + input_first_name +','
          + input_second_name +

            "&date="
              + range +
                "&geo="
                  + geo +
                    "&graph=weekly_img&sort=0&sa=N";
      var img_link ="http://trends.google.com/trends/?q="
          + input_first_name +','
          + input_second_name +
            "&date="
              + range +
                "&geo="
                  + geo +
                  "&graph=weekly_img&sort=0&sa=N";
      var link_first_name ="http://trends.google.com/trends/?q="
          + input_first_name +
            "&date="
              + range +
                "&geo="
                  + geo +

                  "&graph=weekly_img&sort=0&sa=N";
      var link_second_name ="http://trends.google.com/trends/?q="
          + input_second_name +
            "&date="
              + range +
                "&geo="
                  + geo +
                  "&graph=weekly_img&sort=0&sa=N";
      document.getElementById("Gadget-Img").innerHTML="<a target='_blank' href=\""+img_link+"\" ... ><img src=\""+img_url+"\" ... ></a><br/ ><div id=\"Color-Index\"><a id=\"graph_line\" target='_blank' href=\""+img_link+"\" ... >Enlarge Image</a><a id =\"firstname\" target='_blank' href=\""+link_first_name+"\" ... >\""+input_first_name+"\"</a><a id=\"secondname\" target='_blank' href=\""+ link_second_name +"\" ... >\""+input_second_name+"\"</a></div>";

	return false;
  }

function settime () {
    var curtime = new Date();
    var curhour = curtime.getHours();
    var curmin = curtime.getMinutes();
    var cursec = curtime.getSeconds();
    var time = "";
    if(curhour == 0) curhour = 12;
    time = (curhour > 12 ? curhour - 12 : curhour) + ":" +
         (curmin < 10 ? "0" : "") + curmin + ":" +
         (cursec < 10 ? "0" : "") + cursec + " " +
         (curhour > 12 ? "PM" : "AM");
  document.myform.clock.value = time;

}