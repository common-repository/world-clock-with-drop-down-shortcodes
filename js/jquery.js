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

	jQuery(digi);
    jQuery(document).ready(
        function() {
           jQuery("#zones").change(function(){
           if (jQuery('#time-cont .time').length>0){ jQuery('#time-cont .time').hide();}
     var offset = jQuery(this).val();
    if (offset == '') {
    var d = new Date();
      var n = d.getTimezoneOffset();
    n = -n/60;
    offset = n;
    }
     jQuery('#time-cont').append('<div class="time"></div>');
           var options = {
            format:'<span class=\"dt\" id=\"dt\">%H : %M : %S</span>',
            timeNotation: '24h',
            am_pm: false,
            utc:true,
            utc_offset: offset
          }
            
          jQuery('#time-cont .time').jclock(options);
       });
     });