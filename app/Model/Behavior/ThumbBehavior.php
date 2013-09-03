<?php

class ThumbBehavior extends ModelBehavior
{
	public function make_thumb(Model $Model, $filename, $options=array())
	{
		$thumbs_width = isset($options['width']) ? intval($options['width']) : 100;
		$thumbs_height = isset($options['height']) ? intval($options['height']) : 75;
		$files_dir = $options['files_dir'];
		$thumbs_dir = "thumbs";

		if (!is_file($files_dir . DS .$thumbs_dir . DS . $filename)) {
			list($width, $height) = getimagesize($files_dir . DS . $filename);

            $v_fact = $thumbs_height / $height;
            $h_fact = $thumbs_width / $width;
            $im_fact = min($v_fact, $h_fact);
            $new_height = $height * $im_fact;
            $new_width = $width * $im_fact;

            $canvas = imagecreatetruecolor($new_width, $new_height);
			$image = imagecreatefromjpeg($files_dir . DS . $filename);
            imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			if (!is_dir($files_dir . DS . $thumbs_dir)) {
				mkdir($files_dir . DS . $thumbs_dir, 0775);
			}
			if (imagejpeg($canvas, $files_dir . DS . $thumbs_dir . DS . $filename, 100)) {
				return true;
			}
		}

		return false;
	}
}