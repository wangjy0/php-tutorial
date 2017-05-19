<?php
 
/*
	A simple example demonstrate thumbnail creation.
*/ 
 
/* Create the Imagick object */
$im = new Imagick();
 
/* Read the image file */
$im->readImage( 'photo_stamp.png' );
 
/* Thumbnail the image ( width 100, preserve dimensions ) */
$im->thumbnailImage( 100, null );
 
/* Write the thumbail to disk */
$im->writeImage( 'photo_stamp_thumbail.png' );
 
/* Free resources associated to the Imagick object */
$im->destroy();
 
?>