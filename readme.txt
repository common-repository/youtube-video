=== Youtube Video ===
Author: Timis Martins
Tags: youtube, video, embed, shortcode, view, playlist, videos
Requires at least: 3.0
Tested up to: 3.4
Stable tag: 1.1.3

Insert Easy Youtube Videos on Website.

== Description ==

Youtube Video allows you to insert Youtube Videos on your Wordpress Blog using a quicktag <code>[tube][/tube]</code> 


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload folder `my-youtube-player` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure plugin into 'Settings' -> 'My Youtube Player' menu


==Features==

*	Easy to install
*	Embed Youtube movies with a simple code
*	Panel for easy configuration
*	Config Player version (AS2 & AS3)
*	Support config themes for player
*	Support HTML5 Player
*	Generate `<object>` code for Feed compatibility	
*	Generate `<object>` code optimized for iPhone

To insert single youtube video on **Post Content** or **Text Widget**  you can use 'Youtube URL', 'Youtube Embed URL' or 'Youtube Video ID' (example):

`[tube]http://www.youtube.com/watch?v=P8iKcdh5Ims[/tube]`

`[tube]http://www.youtube.com/v/P8iKcdh5Ims[/tube]`

`[tube]P8iKcdh5Ims[/tube]`

To insert video with specific size can user width and height:

`[tube]http://www.youtube.com/watch?v=P8iKcdh5Ims, 500, 290[/tube]`

To insert video on template, use the php code:

`<?php my_youtubeplayer("movie.swf", "width", "heigth"); ?>`


