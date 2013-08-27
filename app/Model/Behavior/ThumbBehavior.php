<?php

class ThumbBehavior extends ModelBehavior
{
	public function make_thumb(Model $Model, $filename, $options=array())
	{
		$thumbs_width = isset($options['width']) ? intval($options['width']) : 100;
		$thumbs_height = isset($options['height']) ? intval($options['height']) : 75;
		$files_dir = $options['files_dir'];
		$thumbs_dir = "thumbs";
		/*echo '<pre>';
		var_dump($filename);
		var_dump($options);
		var_dump($thumbs_dir);
		var_dump($files_dir);
		var_dump($thumbs_height);
		var_dump($thumbs_width);
		var_dump($files_dir . DS .$thumbs_dir . DS . $filename);
		exit();*/

		if (!is_file($files_dir . DS .$thumbs_dir . DS . $filename)) {
			list($width, $height) = getimagesize($files_dir . DS . $filename);
			$canvas = imagecreatetruecolor($thumbs_width, $thumbs_height);
			$image = imagecreatefromjpeg($files_dir . $filename);
			imagecopyresampled($canvas, $image, 0, 0, 0, 0, $thumbs_width, $thumbs_height, $width, $height);
			if (!is_dir($files_dir . DS . $thumbs_dir)) {
				mkdir($files_dir . DS . $thumbs_dir);
			}
			if (imagejpeg($canvas, $files_dir . DS . $thumbs_dir . DS . $filename, 100)) {
				return true;
			}
		}

		return false;
	}
}