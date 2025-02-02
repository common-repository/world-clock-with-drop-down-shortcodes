<?php
/*
Plugin Name: World Clock with Drop-Down ShortCodes
Plugin URI: http://www.divinebusinesshouse.com/knowledge-base
Description: World Clock with Timezones Drop-Down using Widget or Shortcode
Version: 0.1
Author: Jvalant Thakrar
Author URI: http://www.divinebusinesshouse.com
*/

/*
World Clock with Drop-Down ShortCodes
Copyright (C) 2017 Jvalant Thakrar
Contact me at http://www.divinebusinesshouse.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/


function world_clock_scripts() {
    wp_enqueue_style( 'world_clock_style', plugin_dir_url( __FILE__ ) . 'css/worldclock.css');
    wp_enqueue_script( 'world_clock_script', plugin_dir_url( __FILE__ ) . 'js/jquery.worldclock.js',array(jquery), '1.0',false );
    wp_enqueue_script( 'world_clock_javascript', plugin_dir_url( __FILE__ ) . 'js/world-clock.js', '','1.0', false );
    wp_enqueue_script( 'world_clock_last_script', plugin_dir_url( __FILE__ ) . 'js/jquery.js',array(jquery), '1.0', false );
}
add_action('wp_enqueue_scripts', 'world_clock_scripts');

//tell wordpress to register the demolistposts shortcode
add_shortcode('j-world-clock', 'worldclock_handler');

function worldclock_handler() {
  //run function that actually does the work of the plugin
  $worldclock_output = worldclock_function();
  //send back text to replace shortcode in post
  return $worldclock_output;
}

function worldclock_function() {
  //process plugin 
	$worldclock_output = "
		<div class='world-clock'>
			<div class='two-third'>
			  <div id='time-cont'>
				<div class='time' id='time'></div>
			  </div>
			</div>
			<div class='one-third'>
				<select id='zones' class='drop-control selectpicker'>
				   	<option value=''>Local Time</option>
					<option value='-12'>(GMT -12:00) Etc/GMT+12</option>
					<option value='-11'>(GMT -11:00) Etc/GMT+11</option>
					<option value='-11'>(GMT -11:00) Pacific/Samoa</option>
					<option value='-11'>(GMT -11:00) Pacific/Pago_Pago</option>
					<option value='-11'>(GMT -11:00) Pacific/Niue</option>
					<option value='-11'>(GMT -11:00) Pacific/Midway</option>
					<option value='-11'>(GMT -11:00) US/Samoa</option>
					<option value='-10'>(GMT -10:00) Pacific/Johnston</option>
					<option value='-10'>(GMT -10:00) Pacific/Rarotonga</option>
					<option value='-10'>(GMT -10:00) Etc/GMT+10</option>
					<option value='-10'>(GMT -10:00) Pacific/Tahiti</option>
					<option value='-10'>(GMT -10:00) Pacific/Honolulu</option>
					<option value='-10'>(GMT -10:00) US/Hawaii</option>
					<option value='-10'>(GMT -10:00) HST</option>
					<option value='-9'>(GMT -9:30) Pacific/Marquesas</option>
					<option value='-9'>(GMT -9:00) Etc/GMT+9</option>
					<option value='-9'>(GMT -9:00) America/Adak</option>
					<option value='-9'>(GMT -9:00) Pacific/Gambier</option>
					<option value='-9'>(GMT -9:00) US/Aleutian</option>
					<option value='-9'>(GMT -9:00) America/Atka</option>
					<option value='-8'>(GMT -8:00) America/Nome</option>
					<option value='-8'>(GMT -8:00) America/Juneau</option>
					<option value='-8'>(GMT -8:00) America/Anchorage</option>
					<option value='-8'>(GMT -8:00) Etc/GMT+8</option>
					<option value='-8'>(GMT -8:00) US/Alaska</option>
					<option value='-8'>(GMT -8:00) America/Sitka</option>
					<option value='-8'>(GMT -8:00) America/Yakutat</option>
					<option value='-8'>(GMT -8:00) Pacific/Pitcairn</option>
					<option value='-8'>(GMT -8:00) America/Metlakatla</option>
					<option value='-7'>(GMT -7:00) US/Pacific</option>
					<option value='-7'>(GMT -7:00) Etc/GMT+7</option>
					<option value='-7'>(GMT -7:00) America/Dawson</option>
					<option value='-7'>(GMT -7:00) America/Dawson_Creek</option>
					<option value='-7'>(GMT -7:00) Canada/Yukon</option>
					<option value='-7'>(GMT -7:00) MST</option>
					<option value='-7'>(GMT -7:00) America/Ensenada</option>
					<option value='-7'>(GMT -7:00) Mexico/BajaNorte</option>
					<option value='-7'>(GMT -7:00) America/Whitehorse</option>
					<option value='-7'>(GMT -7:00) America/Creston</option>
					<option value='-7'>(GMT -7:00) America/Tijuana</option>
					<option value='-7'>(GMT -7:00) America/Hermosillo</option>
					<option value='-7'>(GMT -7:00) PST8PDT</option>
					<option value='-7'>(GMT -7:00) America/Santa_Isabel</option>
					<option value='-7'>(GMT -7:00) US/Pacific-New</option>
					<option value='-7'>(GMT -7:00) US/Arizona</option>
					<option value='-7'>(GMT -7:00) Canada/Pacific</option>
					<option value='-7'>(GMT -7:00) America/Los_Angeles</option>
					<option value='-7'>(GMT -7:00) America/Phoenix</option>
					<option value='-7'>(GMT -7:00) America/Vancouver</option>
					<option value='-6'>(GMT -6:00) America/Edmonton</option>
					<option value='-6'>(GMT -6:00) America/El_Salvador</option>
					<option value='-6'>(GMT -6:00) Canada/East-Saskatchewan</option>
					<option value='-6'>(GMT -6:00) America/Yellowknife</option>
					<option value='-6'>(GMT -6:00) Pacific/Galapagos</option>
					<option value='-6'>(GMT -6:00) America/Boise</option>
					<option value='-6'>(GMT -6:00) America/Guatemala</option>
					<option value='-6'>(GMT -6:00) US/Mountain</option>
					<option value='-6'>(GMT -6:00) America/Chihuahua</option>
					<option value='-6'>(GMT -6:00) America/Costa_Rica</option>
					<option value='-6'>(GMT -6:00) America/Tegucigalpa</option>
					<option value='-6'>(GMT -6:00) America/Swift_Current</option>
					<option value='-6'>(GMT -6:00) Navajo</option>
					<option value='-6'>(GMT -6:00) America/Shiprock</option>
					<option value='-6'>(GMT -6:00) Etc/GMT+6</option>
					<option value='-6'>(GMT -6:00) America/Inuvik</option>
					<option value='-6'>(GMT -6:00) Canada/Saskatchewan</option>
					<option value='-6'>(GMT -6:00) Mexico/BajaSur</option>
					<option value='-6'>(GMT -6:00) Canada/Mountain</option>
					<option value='-6'>(GMT -6:00) America/Regina</option>
					<option value='-6'>(GMT -6:00) America/Denver</option>
					<option value='-6'>(GMT -6:00) MST7MDT</option>
					<option value='-6'>(GMT -6:00) America/Managua</option>
					<option value='-6'>(GMT -6:00) America/Ojinaga</option>
					<option value='-6'>(GMT -6:00) America/Mazatlan</option>
					<option value='-6'>(GMT -6:00) America/Belize</option>
					<option value='-6'>(GMT -6:00) America/Cambridge_Bay</option>
					<option value='-5'>(GMT -5:00) America/Guayaquil</option>
					<option value='-5'>(GMT -5:00) Chile/EasterIsland</option>
					<option value='-5'>(GMT -5:00) America/Coral_Harbour</option>
					<option value='-5'>(GMT -5:00) EST</option>
					<option value='-5'>(GMT -5:00) America/Atikokan</option>
					<option value='-5'>(GMT -5:00) America/Indiana/Knox</option>
					<option value='-5'>(GMT -5:00) US/Central</option>
					<option value='-5'>(GMT -5:00) America/Bahia_Banderas</option>
					<option value='-5'>(GMT -5:00) America/Indiana/Tell_City</option>
					<option value='-5'>(GMT -5:00) Jamaica</option>
					<option value='-5'>(GMT -5:00) America/Jamaica</option>
					<option value='-5'>(GMT -5:00) America/Rio_Branco</option>
					<option value='-5'>(GMT -5:00) America/Resolute</option>
					<option value='-5'>(GMT -5:00) Mexico/General</option>
					<option value='-5'>(GMT -5:00) Canada/Central</option>
					<option value='-5'>(GMT -5:00) America/Bogota</option>
					<option value='-5'>(GMT -5:00) US/Indiana-Starke</option>
					<option value='-5'>(GMT -5:00) America/Eirunepe</option>
					<option value='-5'>(GMT -5:00) America/Rankin_Inlet</option>
					<option value='-5'>(GMT -5:00) America/Knox_IN</option>
					<option value='-5'>(GMT -5:00) America/Rainy_River</option>
					<option value='-5'>(GMT -5:00) America/Porto_Acre</option>
					<option value='-5'>(GMT -5:00) America/Lima</option>
					<option value='-5'>(GMT -5:00) Pacific/Easter</option>
					<option value='-5'>(GMT -5:00) CST6CDT</option>
					<option value='-5'>(GMT -5:00) America/Panama</option>
					<option value='-5'>(GMT -5:00) America/Cancun</option>
					<option value='-5'>(GMT -5:00) Etc/GMT+5</option>
					<option value='-5'>(GMT -5:00) America/North_Dakota/New_Salem</option>
					<option value='-5'>(GMT -5:00) America/North_Dakota/Center</option>
					<option value='-5'>(GMT -5:00) America/Matamoros</option>
					<option value='-5'>(GMT -5:00) America/Winnipeg</option>
					<option value='-5'>(GMT -5:00) America/Menominee</option>
					<option value='-5'>(GMT -5:00) America/Merida</option>
					<option value='-5'>(GMT -5:00) America/Cayman</option>
					<option value='-5'>(GMT -5:00) America/Mexico_City</option>
					<option value='-5'>(GMT -5:00) Brazil/Acre</option>
					<option value='-5'>(GMT -5:00) America/Monterrey</option>
					<option value='-5'>(GMT -5:00) America/North_Dakota/Beulah</option>
					<option value='-5'>(GMT -5:00) America/Chicago</option>
					<option value='-4'>(GMT -4:30) America/Caracas</option>
					<option value='-4'>(GMT -4:00) America/Indiana/Indianapolis</option>
					<option value='-4'>(GMT -4:00) America/Nipigon</option>
					<option value='-4'>(GMT -4:00) America/Montserrat</option>
					<option value='-4'>(GMT -4:00) America/Montreal</option>
					<option value='-4'>(GMT -4:00) America/Martinique</option>
					<option value='-4'>(GMT -4:00) America/Marigot</option>
					<option value='-4'>(GMT -4:00) America/Manaus</option>
					<option value='-4'>(GMT -4:00) America/Lower_Princes</option>
					<option value='-4'>(GMT -4:00) America/Pangnirtung</option>
					<option value='-4'>(GMT -4:00) America/Louisville</option>
					<option value='-4'>(GMT -4:00) America/Port-au-Prince</option>
					<option value='-4'>(GMT -4:00) America/Port_of_Spain</option>
					<option value='-4'>(GMT -4:00) America/La_Paz</option>
					<option value='-4'>(GMT -4:00) America/Porto_Velho</option>
					<option value='-4'>(GMT -4:00) America/Puerto_Rico</option>
					<option value='-4'>(GMT -4:00) America/Kralendijk</option>
					<option value='-4'>(GMT -4:00) America/Kentucky/Monticello</option>
					<option value='-4'>(GMT -4:00) America/Kentucky/Louisville</option>
					<option value='-4'>(GMT -4:00) America/Indianapolis</option>
					<option value='-4'>(GMT -4:00) America/Indiana/Winamac</option>
					<option value='-4'>(GMT -4:00) America/Indiana/Vincennes</option>
					<option value='-4'>(GMT -4:00) America/Santo_Domingo</option>
					<option value='-4'>(GMT -4:00) America/Indiana/Vevay</option>
					<option value='-4'>(GMT -4:00) America/Indiana/Petersburg</option>
					<option value='-4'>(GMT -4:00) America/St_Barthelemy</option>
					<option value='-4'>(GMT -4:00) Brazil/West</option>
					<option value='-4'>(GMT -4:00) America/St_Kitts</option>
					<option value='-4'>(GMT -4:00) America/St_Lucia</option>
					<option value='-4'>(GMT -4:00) America/St_Thomas</option>
					<option value='-4'>(GMT -4:00) America/St_Vincent</option>
					<option value='-4'>(GMT -4:00) America/Indiana/Marengo</option>
					<option value='-4'>(GMT -4:00) America/New_York</option>
					<option value='-4'>(GMT -4:00) America/Thunder_Bay</option>
					<option value='-4'>(GMT -4:00) America/Havana</option>
					<option value='-4'>(GMT -4:00) America/Toronto</option>
					<option value='-4'>(GMT -4:00) America/Tortola</option>
					<option value='-4'>(GMT -4:00) America/Guyana</option>
					<option value='-4'>(GMT -4:00) America/Virgin</option>
					<option value='-4'>(GMT -4:00) America/Guadeloupe</option>
					<option value='-4'>(GMT -4:00) America/Grenada</option>
					<option value='-4'>(GMT -4:00) America/Grand_Turk</option>
					<option value='-4'>(GMT -4:00) America/Fort_Wayne</option>
					<option value='-4'>(GMT -4:00) America/Dominica</option>
					<option value='-4'>(GMT -4:00) America/Detroit</option>
					<option value='-4'>(GMT -4:00) America/Curacao</option>
					<option value='-4'>(GMT -4:00) America/Cuiaba</option>
					<option value='-4'>(GMT -4:00) America/Nassau</option>
					<option value='-4'>(GMT -4:00) Etc/GMT+4</option>
					<option value='-4'>(GMT -4:00) America/Campo_Grande</option>
					<option value='-4'>(GMT -4:00) America/Boa_Vista</option>
					<option value='-4'>(GMT -4:00) America/Blanc-Sablon</option>
					<option value='-4'>(GMT -4:00) America/Barbados</option>
					<option value='-4'>(GMT -4:00) EST5EDT</option>
					<option value='-4'>(GMT -4:00) America/Asuncion</option>
					<option value='-4'>(GMT -4:00) Cuba</option>
					<option value='-4'>(GMT -4:00) America/Aruba</option>
					<option value='-4'>(GMT -4:00) America/Antigua</option>
					<option value='-4'>(GMT -4:00) America/Anguilla</option>
					<option value='-4'>(GMT -4:00) US/East-Indiana</option>
					<option value='-4'>(GMT -4:00) US/Eastern</option>
					<option value='-4'>(GMT -4:00) US/Michigan</option>
					<option value='-4'>(GMT -4:00) Canada/Eastern</option>
					<option value='-4'>(GMT -4:00) America/Iqaluit</option>
					<option value='-3'>(GMT -3:00) America/Moncton</option>
					<option value='-3'>(GMT -3:00) America/Argentina/Salta</option>
					<option value='-3'>(GMT -3:00) America/Montevideo</option>
					<option value='-3'>(GMT -3:00) America/Buenos_Aires</option>
					<option value='-3'>(GMT -3:00) America/Argentina/San_Juan</option>
					<option value='-3'>(GMT -3:00) America/Argentina/San_Luis</option>
					<option value='-3'>(GMT -3:00) America/Argentina/Tucuman</option>
					<option value='-3'>(GMT -3:00) America/Thule</option>
					<option value='-3'>(GMT -3:00) America/Jujuy</option>
					<option value='-3'>(GMT -3:00) America/Argentina/Ushuaia</option>
					<option value='-3'>(GMT -3:00) Brazil/East</option>
					<option value='-3'>(GMT -3:00) America/Fortaleza</option>
					<option value='-3'>(GMT -3:00) America/Glace_Bay</option>
					<option value='-3'>(GMT -3:00) Atlantic/Stanley</option>
					<option value='-3'>(GMT -3:00) America/Goose_Bay</option>
					<option value='-3'>(GMT -3:00) America/Catamarca</option>
					<option value='-3'>(GMT -3:00) America/Cayenne</option>
					<option value='-3'>(GMT -3:00) America/Paramaribo</option>
					<option value='-3'>(GMT -3:00) Antarctica/Palmer</option>
					<option value='-3'>(GMT -3:00) Antarctica/Rothera</option>
					<option value='-3'>(GMT -3:00) Atlantic/Bermuda</option>
					<option value='-3'>(GMT -3:00) America/Araguaina</option>
					<option value='-3'>(GMT -3:00) America/Argentina/Buenos_Aires</option>
					<option value='-3'>(GMT -3:00) America/Maceio</option>
					<option value='-3'>(GMT -3:00) America/Argentina/Catamarca</option>
					<option value='-3'>(GMT -3:00) America/Halifax</option>
					<option value='-3'>(GMT -3:00) Etc/GMT+3</option>
					<option value='-3'>(GMT -3:00) America/Cordoba</option>
					<option value='-3'>(GMT -3:00) America/Bahia</option>
					<option value='-3'>(GMT -3:00) America/Recife</option>
					<option value='-3'>(GMT -3:00) America/Argentina/ComodRivadavia</option>
					<option value='-3'>(GMT -3:00) Canada/Atlantic</option>
					<option value='-3'>(GMT -3:00) America/Argentina/Cordoba</option>
					<option value='-3'>(GMT -3:00) America/Mendoza</option>
					<option value='-3'>(GMT -3:00) America/Rosario</option>
					<option value='-3'>(GMT -3:00) America/Belem</option>
					<option value='-3'>(GMT -3:00) Chile/Continental</option>
					<option value='-3'>(GMT -3:00) America/Santarem</option>
					<option value='-3'>(GMT -3:00) America/Santiago</option>
					<option value='-3'>(GMT -3:00) America/Argentina/Jujuy</option>
					<option value='-3'>(GMT -3:00) America/Sao_Paulo</option>
					<option value='-3'>(GMT -3:00) America/Argentina/La_Rioja</option>
					<option value='-3'>(GMT -3:00) America/Argentina/Mendoza</option>
					<option value='-3'>(GMT -3:00) America/Argentina/Rio_Gallegos</option>
					<option value='-2'>(GMT -2:30) Canada/Newfoundland</option>
					<option value='-2'>(GMT -2:30) America/St_Johns</option>
					<option value='-2'>(GMT -2:00) Etc/GMT+2</option>
					<option value='-2'>(GMT -2:00) Brazil/DeNoronha</option>
					<option value='-2'>(GMT -2:00) America/Noronha</option>
					<option value='-2'>(GMT -2:00) Atlantic/South_Georgia</option>
					<option value='-2'>(GMT -2:00) America/Miquelon</option>
					<option value='-2'>(GMT -2:00) America/Godthab</option>
					<option value='-1'>(GMT -1:00) Etc/GMT+1</option>
					<option value='-1'>(GMT -1:00) Atlantic/Cape_Verde</option>
					<option value='+0'>(GMT +00:00) Africa/Abidjan</option>
					<option value='+0'>(GMT +00:00) Greenwich</option>
					<option value='+0'>(GMT +00:00) Africa/Bissau</option>
					<option value='+0'>(GMT +00:00) Africa/Conakry</option>
					<option value='+0'>(GMT +00:00) Africa/Dakar</option>
					<option value='+0'>(GMT +00:00) Zulu</option>
					<option value='+0'>(GMT +00:00) Universal</option>
					<option value='+0'>(GMT +00:00) Africa/Bamako</option>
					<option value='+0'>(GMT +00:00) Africa/Monrovia</option>
					<option value='+0'>(GMT +00:00) Etc/GMT+0</option>
					<option value='+0'>(GMT +00:00) Etc/GMT</option>
					<option value='+0'>(GMT +00:00) UTC</option>
					<option value='+0'>(GMT +00:00) Africa/Freetown</option>
					<option value='+0'>(GMT +00:00) Africa/Lome</option>
					<option value='+0'>(GMT +00:00) Africa/Nouakchott</option>
					<option value='+0'>(GMT +00:00) America/Scoresbysund</option>
					<option value='+0'>(GMT +00:00) America/Danmarkshavn</option>
					<option value='+0'>(GMT +00:00) GMT0</option>
					<option value='+0'>(GMT +00:00) GMT-0</option>
					<option value='+0'>(GMT +00:00) GMT+0</option>
					<option value='+0'>(GMT +00:00) GMT</option>
					<option value='+0'>(GMT +00:00) Etc/Zulu</option>
					<option value='+0'>(GMT +00:00) Etc/Universal</option>
					<option value='+0'>(GMT +00:00) Africa/Ouagadougou</option>
					<option value='+0'>(GMT +00:00) UCT</option>
					<option value='+0'>(GMT +00:00) Etc/UTC</option>
					<option value='+0'>(GMT +00:00) Etc/UCT</option>
					<option value='+0'>(GMT +00:00) Etc/Greenwich</option>
					<option value='+0'>(GMT +00:00) Etc/GMT0</option>
					<option value='+0'>(GMT +00:00) Etc/GMT-0</option>
					<option value='+0'>(GMT +00:00) Africa/Sao_Tome</option>
					<option value='+0'>(GMT +00:00) Atlantic/St_Helena</option>
					<option value='+0'>(GMT +00:00) Africa/Timbuktu</option>
					<option value='+0'>(GMT +00:00) Atlantic/Reykjavik</option>
					<option value='+0'>(GMT +00:00) Iceland</option>
					<option value='+0'>(GMT +00:00) Africa/Banjul</option>
					<option value='+0'>(GMT +00:00) Atlantic/Azores</option>
					<option value='+0'>(GMT +00:00) Africa/Accra</option>
					<option value='+1'>(GMT +1:00) Africa/Libreville</option>
					<option value='+1'>(GMT +1:00) Europe/Lisbon</option>
					<option value='+1'>(GMT +1:00) Africa/Algiers</option>
					<option value='+1'>(GMT +1:00) Europe/Isle_of_Man</option>
					<option value='+1'>(GMT +1:00) Europe/Guernsey</option>
					<option value='+1'>(GMT +1:00) Africa/Bangui</option>
					<option value='+1'>(GMT +1:00) Africa/Brazzaville</option>
					<option value='+1'>(GMT +1:00) Europe/Dublin</option>
					<option value='+1'>(GMT +1:00) Africa/Casablanca</option>
					<option value='+1'>(GMT +1:00) Africa/Douala</option>
					<option value='+1'>(GMT +1:00) Africa/El_Aaiun</option>
					<option value='+1'>(GMT +1:00) Portugal</option>
					<option value='+1'>(GMT +1:00) Europe/Belfast</option>
					<option value='+1'>(GMT +1:00) Europe/London</option>
					<option value='+1'>(GMT +1:00) Africa/Kinshasa</option>
					<option value='+1'>(GMT +1:00) Africa/Lagos</option>
					<option value='+1'>(GMT +1:00) Europe/Jersey</option>
					<option value='+1'>(GMT +1:00) Africa/Luanda</option>
					<option value='+1'>(GMT +1:00) Africa/Malabo</option>
					<option value='+1'>(GMT +1:00) Atlantic/Canary</option>
					<option value='+1'>(GMT +1:00) Atlantic/Faeroe</option>
					<option value='+1'>(GMT +1:00) Atlantic/Faroe</option>
					<option value='+1'>(GMT +1:00) Atlantic/Madeira</option>
					<option value='+1'>(GMT +1:00) Africa/Ndjamena</option>
					<option value='+1'>(GMT +1:00) Africa/Niamey</option>
					<option value='+1'>(GMT +1:00) Africa/Porto-Novo</option>
					<option value='+1'>(GMT +1:00) Etc/GMT-1</option>
					<option value='+1'>(GMT +1:00) Eire</option>
					<option value='+1'>(GMT +1:00) Africa/Tunis</option>
					<option value='+1'>(GMT +1:00) GB-Eire</option>
					<option value='+1'>(GMT +1:00) GB</option>
					<option value='+1'>(GMT +1:00) WET</option>
					<option value='+2'>(GMT +2:00) Europe/Copenhagen</option>
					<option value='+2'>(GMT +2:00) Europe/Luxembourg</option>
					<option value='+2'>(GMT +2:00) Antarctica/Troll</option>
					<option value='+2'>(GMT +2:00) Africa/Kigali</option>
					<option value='+2'>(GMT +2:00) Europe/Ljubljana</option>
					<option value='+2'>(GMT +2:00) Europe/Busingen</option>
					<option value='+2'>(GMT +2:00) Africa/Ceuta</option>
					<option value='+2'>(GMT +2:00) Europe/Budapest</option>
					<option value='+2'>(GMT +2:00) Africa/Lubumbashi</option>
					<option value='+2'>(GMT +2:00) Africa/Lusaka</option>
					<option value='+2'>(GMT +2:00) Europe/Brussels</option>
					<option value='+2'>(GMT +2:00) Africa/Maputo</option>
					<option value='+2'>(GMT +2:00) Africa/Maseru</option>
					<option value='+2'>(GMT +2:00) Africa/Mbabane</option>
					<option value='+2'>(GMT +2:00) Europe/Madrid</option>
					<option value='+2'>(GMT +2:00) Europe/Malta</option>
					<option value='+2'>(GMT +2:00) Europe/Monaco</option>
					<option value='+2'>(GMT +2:00) Africa/Blantyre</option>
					<option value='+2'>(GMT +2:00) Etc/GMT-2</option>
					<option value='+2'>(GMT +2:00) Europe/Kaliningrad</option>
					<option value='+2'>(GMT +2:00) Europe/Bratislava</option>
					<option value='+2'>(GMT +2:00) Atlantic/Jan_Mayen</option>
					<option value='+2'>(GMT +2:00) Africa/Gaborone</option>
					<option value='+2'>(GMT +2:00) Europe/Oslo</option>
					<option value='+2' name='Berlin'>(GMT +2:00) Europe/Berlin</option>
					<option value='+2'>(GMT +2:00) Europe/Paris</option>
					<option value='+2'>(GMT +2:00) Europe/Belgrade</option>
					<option value='+2'>(GMT +2:00) MET</option>
					<option value='+2'>(GMT +2:00) Libya</option>
					<option value='+2'>(GMT +2:00) Africa/Bujumbura</option>
					<option value='+2'>(GMT +2:00) Europe/Podgorica</option>
					<option value='+2'>(GMT +2:00) Poland</option>
					<option value='+2'>(GMT +2:00) Arctic/Longyearbyen</option>
					<option value='+2'>(GMT +2:00) Europe/Prague</option>
					<option value='+2'>(GMT +2:00) Europe/Rome</option>
					<option value='+2'>(GMT +2:00) Africa/Harare</option>
					<option value='+2'>(GMT +2:00) Europe/San_Marino</option>
					<option value='+2'>(GMT +2:00) Europe/Sarajevo</option>
					<option value='+2'>(GMT +2:00) Africa/Tripoli</option>
					<option value='+2'>(GMT +2:00) Africa/Johannesburg</option>
					<option value='+2'>(GMT +2:00) Africa/Windhoek</option>
					<option value='+2'>(GMT +2:00) Europe/Gibraltar</option>
					<option value='+2'>(GMT +2:00) Europe/Andorra</option>
					<option value='+2'>(GMT +2:00) Europe/Zurich</option>
					<option value='+2'>(GMT +2:00) Europe/Amsterdam</option>
					<option value='+2'>(GMT +2:00) Europe/Zagreb</option>
					<option value='+2'>(GMT +2:00) Europe/Warsaw</option>
					<option value='+2'>(GMT +2:00) Europe/Skopje</option>
					<option value='+2'>(GMT +2:00) Europe/Stockholm</option>
					<option value='+2'>(GMT +2:00) Europe/Vienna</option>
					<option value='+2'>(GMT +2:00) Europe/Vatican</option>
					<option value='+2'>(GMT +2:00) Asia/Hebron</option>
					<option value='+2'>(GMT +2:00) CET</option>
					<option value='+2'>(GMT +2:00) Europe/Vaduz</option>
					<option value='+2'>(GMT +2:00) Asia/Gaza</option>
					<option value='+2'>(GMT +2:00) Europe/Tirane</option>
					<option value='+3'>(GMT +3:00) Europe/Uzhgorod</option>
					<option value='+3'>(GMT +3:00) Europe/Zaporozhye</option>
					<option value='+3'>(GMT +3:00) Asia/Damascus</option>
					<option value='+3'>(GMT +3:00) Europe/Kiev</option>
					<option value='+3'>(GMT +3:00) Europe/Tallinn</option>
					<option value='+3'>(GMT +3:00) Europe/Vilnius</option>
					<option value='+3'>(GMT +3:00) Europe/Sofia</option>
					<option value='+3'>(GMT +3:00) Europe/Volgograd</option>
					<option value='+3'>(GMT +3:00) Europe/Simferopol</option>
					<option value='+3'>(GMT +3:00) EET</option>
					<option value='+3'>(GMT +3:00) Indian/Antananarivo</option>
					<option value='+3'>(GMT +3:00) Indian/Comoro</option>
					<option value='+3'>(GMT +3:00) Egypt</option>
					<option value='+3'>(GMT +3:00) W-SU</option>
					<option value='+3'>(GMT +3:00) Africa/Addis_Ababa</option>
					<option value='+3'>(GMT +3:00) Asia/Beirut</option>
					<option value='+3'>(GMT +3:00) Europe/Istanbul</option>
					<option value='+3'>(GMT +3:00) Asia/Bahrain</option>
					<option value='+3'>(GMT +3:00) Asia/Baghdad</option>
					<option value='+3'>(GMT +3:00) Europe/Riga</option>
					<option value='+3'>(GMT +3:00) Asia/Amman</option>
					<option value='+3'>(GMT +3:00) Indian/Mayotte</option>
					<option value='+3'>(GMT +3:00) Asia/Aden</option>
					<option value='+3'>(GMT +3:00) Africa/Asmara</option>
					<option value='+3'>(GMT +3:00) Europe/Helsinki</option>
					<option value='+3'>(GMT +3:00) Israel</option>
					<option value='+3'>(GMT +3:00) Asia/Istanbul</option>
					<option value='+3'>(GMT +3:00) Africa/Nairobi</option>
					<option value='+3'>(GMT +3:00) Europe/Nicosia</option>
					<option value='+3'>(GMT +3:00) Europe/Moscow</option>
					<option value='+3'>(GMT +3:00) Asia/Jerusalem</option>
					<option value='+3'>(GMT +3:00) Etc/GMT-3</option>
					<option value='+3'>(GMT +3:00) Europe/Tiraspol</option>
					<option value='+3'>(GMT +3:00) Africa/Asmera</option>
					<option value='+3'>(GMT +3:00) Europe/Minsk</option>
					<option value='+3'>(GMT +3:00) Europe/Mariehamn</option>
					<option value='+3'>(GMT +3:00) Africa/Mogadishu</option>
					<option value='+3'>(GMT +3:00) Asia/Kuwait</option>
					<option value='+3'>(GMT +3:00) Asia/Tel_Aviv</option>
					<option value='+3'>(GMT +3:00) Antarctica/Syowa</option>
					<option value='+3'>(GMT +3:00) Africa/Cairo</option>
					<option value='+3'>(GMT +3:00) Europe/Chisinau</option>
					<option value='+3'>(GMT +3:00) Africa/Khartoum</option>
					<option value='+3'>(GMT +3:00) Africa/Kampala</option>
					<option value='+3'>(GMT +3:00) Europe/Athens</option>
					<option value='+3'>(GMT +3:00) Africa/Juba</option>
					<option value='+3'>(GMT +3:00) Asia/Riyadh</option>
					<option value='+3'>(GMT +3:00) Turkey</option>
					<option value='+3'>(GMT +3:00) Asia/Qatar</option>
					<option value='+3'>(GMT +3:00) Africa/Djibouti</option>
					<option value='+3'>(GMT +3:00) Europe/Bucharest</option>
					<option value='+3'>(GMT +3:00) Africa/Dar_es_Salaam</option>
					<option value='+3'>(GMT +3:00) Asia/Nicosia</option>
					<option value='+3'>(GMT +3:30) Asia/Tehran</option>
					<option value='+3'>(GMT +3:30) Iran</option>
					<option value='+4'>(GMT +4:00) Indian/Reunion</option>
					<option value='+4'>(GMT +4:00) Asia/Yerevan</option>
					<option value='+4'>(GMT +4:00) Asia/Dubai</option>
					<option value='+4'>(GMT +4:00) Asia/Tbilisi</option>
					<option value='+4'>(GMT +4:00) Asia/Muscat</option>
					<option value='+4'>(GMT +4:00) Indian/Mauritius</option>
					<option value='+4'>(GMT +4:00) Europe/Samara</option>
					<option value='+4'>(GMT +4:00) Indian/Mahe</option>
					<option value='+4'>(GMT +4:00) Etc/GMT-4</option>
					<option value='+4'>(GMT +4:30) Asia/Kabul</option>
					<option value='+5'>(GMT +5:00) Asia/Tashkent</option>
					<option value='+5'>(GMT +5:00) Indian/Kerguelen</option>
					<option value='+5'>(GMT +5:00) Asia/Baku</option>
					<option value='+5'>(GMT +5:00) Asia/Samarkand</option>
					<option value='+5'>(GMT +5:00) Asia/Karachi</option>
					<option value='+5'>(GMT +5:00) Asia/Ashkhabad</option>
					<option value='+5'>(GMT +5:00) Antarctica/Mawson</option>
					<option value='+5'>(GMT +5:00) Asia/Ashgabat</option>
					<option value='+5'>(GMT +5:00) Asia/Aqtobe</option>
					<option value='+5'>(GMT +5:00) Asia/Aqtau</option>
					<option value='+5'>(GMT +5:00) Asia/Yekaterinburg</option>
					<option value='+5'>(GMT +5:00) Etc/GMT-5</option>
					<option value='+5'>(GMT +5:00) Asia/Oral</option>
					<option value='+5'>(GMT +5:00) Indian/Maldives</option>
					<option value='+5'>(GMT +5:00) Asia/Dushanbe</option>
					<option value='+5'>(GMT +5:30) Asia/Kolkata</option>
					<option value='+5'>(GMT +5:30) Asia/Colombo</option>
					<option value='+5'>(GMT +5:30) Asia/Calcutta</option>
					<option value='+5'>(GMT +5:45) Asia/Kathmandu</option>
					<option value='+5'>(GMT +5:45) Asia/Katmandu</option>
					<option value='+6'>(GMT +6:00) Asia/Novosibirsk</option>
					<option value='+6'>(GMT +6:00) Asia/Omsk</option>
					<option value='+6'>(GMT +6:00) Etc/GMT-6</option>
					<option value='+6'>(GMT +6:00) Asia/Qyzylorda</option>
					<option value='+6'>(GMT +6:00) Asia/Thimbu</option>
					<option value='+6'>(GMT +6:00) Asia/Thimphu</option>
					<option value='+6'>(GMT +6:00) Asia/Urumqi</option>
					<option value='+6'>(GMT +6:00) Indian/Chagos</option>
					<option value='+6'>(GMT +6:00) Asia/Almaty</option>
					<option value='+6'>(GMT +6:00) Asia/Dhaka</option>
					<option value='+6'>(GMT +6:00) Asia/Dacca</option>
					<option value='+6'>(GMT +6:00) Asia/Bishkek</option>
					<option value='+6'>(GMT +6:00) Antarctica/Vostok</option>
					<option value='+6'>(GMT +6:00) Asia/Kashgar</option>
					<option value='+6'>(GMT +6:30) Indian/Cocos</option>
					<option value='+6'>(GMT +6:30) Asia/Rangoon</option>
					<option value='+7'>(GMT +7:00) Asia/Krasnoyarsk</option>
					<option value='+7'>(GMT +7:00) Asia/Hovd</option>
					<option value='+7'>(GMT +7:00) Asia/Saigon</option>
					<option value='+7'>(GMT +7:00) Antarctica/Davis</option>
					<option value='+7'>(GMT +7:00) Indian/Christmas</option>
					<option value='+7'>(GMT +7:00) Etc/GMT-7</option>
					<option value='+7'>(GMT +7:00) Asia/Bangkok</option>
					<option value='+7'>(GMT +7:00) Asia/Ho_Chi_Minh</option>
					<option value='+7'>(GMT +7:00) Asia/Pontianak</option>
					<option value='+7'>(GMT +7:00) Asia/Jakarta</option>
					<option value='+7'>(GMT +7:00) Asia/Phnom_Penh</option>
					<option value='+7'>(GMT +7:00) Asia/Vientiane</option>
					<option value='+7'>(GMT +7:00) Asia/Novokuznetsk</option>
					<option value='+8'>(GMT +8:00) Asia/Irkutsk</option>
					<option value='+8'>(GMT +8:00) Antarctica/Casey</option>
					<option value='+8'>(GMT +8:00) Australia/Perth</option>
					<option value='+8'>(GMT +8:00) Asia/Ujung_Pandang</option>
					<option value='+8'>(GMT +8:00) Hongkong</option>
					<option value='+8'>(GMT +8:00) Asia/Singapore</option>
					<option value='+8'>(GMT +8:00) Asia/Harbin</option>
					<option value='+8'>(GMT +8:00) Asia/Chungking</option>
					<option value='+8'>(GMT +8:00) Asia/Kuala_Lumpur</option>
					<option value='+8'>(GMT +8:00) Asia/Ulaanbaatar</option>
					<option value='+8'>(GMT +8:00) Asia/Ulan_Bator</option>
					<option value='+8'>(GMT +8:00) Singapore</option>
					<option value='+8'>(GMT +8:00) Asia/Hong_Kong</option>
					<option value='+8'>(GMT +8:00) Asia/Kuching</option>
					<option value='+8'>(GMT +8:00) Asia/Brunei</option>
					<option value='+8'>(GMT +8:00) Asia/Chongqing</option>
					<option value='+8'>(GMT +8:00) Asia/Shanghai</option>
					<option value='+8'>(GMT +8:00) Australia/West</option>
					<option value='+8'>(GMT +8:00) Asia/Macao</option>
					<option value='+8'>(GMT +8:00) Asia/Choibalsan</option>
					<option value='+8'>(GMT +8:00) Asia/Macau</option>
					<option value='+8'>(GMT +8:00) Asia/Makassar</option>
					<option value='+8'>(GMT +8:00) PRC</option>
					<option value='+8'>(GMT +8:00) Asia/Chita</option>
					<option value='+8'>(GMT +8:00) Asia/Manila</option>
					<option value='+8'>(GMT +8:00) ROC</option>
					<option value='+8'>(GMT +8:00) Etc/GMT-8</option>
					<option value='+8'>(GMT +8:00) Asia/Taipei</option>
					<option value='+8'>(GMT +8:45) Australia/Eucla</option>
					<option value='+9'>(GMT +9:00) Asia/Yakutsk</option>
					<option value='+9'>(GMT +9:00) Asia/Khandyga</option>
					<option value='+9'>(GMT +9:00) Asia/Pyongyang</option>
					<option value='+9'>(GMT +9:00) Japan</option>
					<option value='+9'>(GMT +9:00) Asia/Dili</option>
					<option value='+9'>(GMT +9:00) Asia/Seoul</option>
					<option value='+9'>(GMT +9:00) ROK</option>
					<option value='+9'>(GMT +9:00) Pacific/Palau</option>
					<option value='+9'>(GMT +9:00) Asia/Jayapura</option>
					<option value='+9'>(GMT +9:00) Etc/GMT-9</option>
					<option value='+9'>(GMT +9:00) Asia/Tokyo</option>
					<option value='+9'>(GMT +9:30) Australia/South</option>
					<option value='+9'>(GMT +9:30) Australia/Darwin</option>
					<option value='+9'>(GMT +9:30) Australia/Yancowinna</option>
					<option value='+9'>(GMT +9:30) Australia/Broken_Hill</option>
					<option value='+9'>(GMT +9:30) Australia/Adelaide</option>
					<option value='+9'>(GMT +9:30) Australia/North</option>
					<option value='+10'>(GMT +10:00) Antarctica/DumontDUrville</option>
					<option value='+10'>(GMT +10:00) Australia/ACT</option>
					<option value='+10'>(GMT +10:00) Australia/Tasmania</option>
					<option value='+10'>(GMT +10:00) Australia/Sydney</option>
					<option value='+10'>(GMT +10:00) Australia/Lindeman</option>
					<option value='+10'>(GMT +10:00) Asia/Vladivostok</option>
					<option value='+10'>(GMT +10:00) Australia/Hobart</option>
					<option value='+10'>(GMT +10:00) Australia/Queensland</option>
					<option value='+10'>(GMT +10:00) Pacific/Guam</option>
					<option value='+10'>(GMT +10:00) Asia/Magadan</option>
					<option value='+10'>(GMT +10:00) Australia/Victoria</option>
					<option value='+10'>(GMT +10:00) Australia/Currie</option>
					<option value='+10'>(GMT +10:00) Australia/Canberra</option>
					<option value='+10'>(GMT +10:00) Asia/Sakhalin</option>
					<option value='+10'>(GMT +10:00) Pacific/Yap</option>
					<option value='+10'>(GMT +10:00) Australia/NSW</option>
					<option value='+10'>(GMT +10:00) Pacific/Truk</option>
					<option value='+10'>(GMT +10:00) Australia/Brisbane</option>
					<option value='+10'>(GMT +10:00) Australia/Melbourne</option>
					<option value='+10'>(GMT +10:00) Pacific/Saipan</option>
					<option value='+10'>(GMT +10:00) Etc/GMT-10</option>
					<option value='+10'>(GMT +10:00) Pacific/Chuuk</option>
					<option value='+10'>(GMT +10:00) Asia/Ust-Nera</option>
					<option value='+10'>(GMT +10:00) Pacific/Port_Moresby</option>
					<option value='+10'>(GMT +10:30) Australia/Lord_Howe</option>
					<option value='+10'>(GMT +10:30) Australia/LHI</option>
					<option value='+11'>(GMT +11:00) Pacific/Pohnpei</option>
					<option value='+11'>(GMT +11:00) Pacific/Noumea</option>
					<option value='+11'>(GMT +11:00) Antarctica/Macquarie</option>
					<option value='+11'>(GMT +11:00) Pacific/Efate</option>
					<option value='+11'>(GMT +11:00) Asia/Srednekolymsk</option>
					<option value='+11'>(GMT +11:00) Pacific/Bougainville</option>
					<option value='+11'>(GMT +11:00) Pacific/Ponape</option>
					<option value='+11'>(GMT +11:00) Etc/GMT-11</option>
					<option value='+11'>(GMT +11:00) Pacific/Guadalcanal</option>
					<option value='+11'>(GMT +11:00) Pacific/Kosrae</option>
					<option value='+11'>(GMT +11:30) Pacific/Norfolk</option>
					<option value='+12'>(GMT +12:00) Asia/Anadyr</option>
					<option value='+12'>(GMT +12:00) Pacific/Wake</option>
					<option value='+12'>(GMT +12:00) Etc/GMT-12</option>
					<option value='+12'>(GMT +12:00) Pacific/Funafuti</option>
					<option value='+12'>(GMT +12:00) Pacific/Fiji</option>
					<option value='+12'>(GMT +12:00) Pacific/Wallis</option>
					<option value='+12'>(GMT +12:00) Pacific/Tarawa</option>
					<option value='+12'>(GMT +12:00) Pacific/Kwajalein</option>
					<option value='+12'>(GMT +12:00) Pacific/Majuro</option>
					<option value='+12'>(GMT +12:00) Asia/Kamchatka</option>
					<option value='+12'>(GMT +12:00) Kwajalein</option>
					<option value='+12'>(GMT +12:00) Pacific/Nauru</option>
					<option value='+13'>(GMT +13:00) Antarctica/South_Pole</option>
					<option value='+13'>(GMT +13:00) Pacific/Fakaofo</option>
					<option value='+13'>(GMT +13:00) Antarctica/McMurdo</option>
					<option value='+13'>(GMT +13:00) Etc/GMT-13</option>
					<option value='+13'>(GMT +13:00) NZ</option>
					<option value='+13'>(GMT +13:00) Pacific/Enderbury</option>
					<option value='+13'>(GMT +13:00) Pacific/Auckland</option>
					<option value='+13'>(GMT +13:00) Pacific/Tongatapu</option>
					<option value='+13'>(GMT +13:45) NZ-CHAT</option>
					<option value='+13'>(GMT +13:45) Pacific/Chatham</option>
					<option value='+14'>(GMT +14:00) Pacific/Apia</option>
					<option value='+14'>(GMT +14:00) Pacific/Kiritimati</option>
					<option value='+14'>(GMT +14:00) Etc/GMT-14</option>
				</select>
			</div>
		</div>
";
//send back text to calling function
	return $worldclock_output;
}
?>