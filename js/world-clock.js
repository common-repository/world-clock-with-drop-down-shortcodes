/*
=== World Clock Dropdown with ShortCodes ===
Contributors: jEbbS
Tags: world-clock, clock, widget-clock, clock-shortcodes, digital-clock
Donate link: http://divinebusinesshouse.com/donate/
Requires at least: 4.3
Tested up to: 4.8.2
Requires PHP: 5.4 or later
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

    function digi() {
      var date = new Date(),
          hour = date.getHours(),
          minute = checkTime(date.getMinutes()),
          ss = checkTime(date.getSeconds());

      function checkTime(i) {
        if( i < 10 ) {
          i = "0" + i;
        }
        return i;
      }

    if ( hour == 24 ) {
        hour = 00;
      document.getElementById("time").innerHTML = "<span class='dt' id='dt'>"+hour+" : "+minute+" : "+ss+"</span>";
      }
      else {
        hour = checkTime(hour);
        document.getElementById("time").innerHTML = "<span class='dt' id='dt'>"+hour+" : "+minute+" : "+ss+"</span>";
      }
    var time = setTimeout(digi,1000);
    }