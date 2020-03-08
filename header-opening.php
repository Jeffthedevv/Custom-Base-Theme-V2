<?php
/**
 * The opening html tags for the theme.
 *
 * @package Base Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.png" />

<?php wp_head(); ?>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700|Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>

<body <?php body_class(); ?>>