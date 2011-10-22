<?php
/*
 File: /app/controllers/components/joex_image.php

ejemplo de uso:
$this->JoexImage->upload($imagen, 800, 600, "big"); 

ejemplo de uso complejo:
$nombreUnico = $this->JoexImage->generarNombreUnico();			
$imagen = $this->data['Producto']['foto_delantera'];
$opciones = array('prefijo' => 'del', 'nombre' => $nombreUnico);
$foto_delantera_big = $this->JoexImage->upload($imagen, 800, 600, "big", $opciones);
*/
class JoexImageComponent extends Object
{
	var $rootFolder = 'uploads'; //en realidad sera img/uploads
	var $tempFolder = 'temp';
	
	function upload($file, $maxw, $maxh, $folderName, $opciones = array()) {
		if (strlen($file['name'])>4){ 
		
					$error = 0;
					$tempuploaddir = "img".DS.$this->rootFolder.DS.$this->tempFolder; // the /temp/ directory, should delete the image after we upload
					$uploaddir = "img".DS.$this->rootFolder.DS.$folderName; // the /home/ directory
					
					// Crear directorios si no existen
					// Requisito: /webroot/img debe tener permisos 777
					$actual = getcwd();
					chdir('img/');
					if(!is_dir($this->rootFolder)){
						mkdir($this->rootFolder,true);
						chmod($this->rootFolder, 0777);
					}
					if(!is_dir($this->rootFolder.DS.$this->tempFolder)){
						mkdir($this->rootFolder.DS.$this->tempFolder,true);
						chmod($this->rootFolder.DS.$this->tempFolder, 0777);
					}
					if(!is_dir($this->rootFolder.DS.$folderName)){
						mkdir($this->rootFolder.DS.$folderName,true);
						chmod($this->rootFolder.DS.$folderName, 0777);
					}
					chdir($actual);
					
					$filetype = $this->getFileExtension($file['name']);
					$filetype = strtolower($filetype);
 
					if (($filetype != "jpeg")  && ($filetype != "jpg") && ($filetype != "gif") && ($filetype != "png"))
					{
						// verify the extension
						return;
					}
					else
					{
						// Get the image size
						$imgsize = GetImageSize($file['tmp_name']);
					}

					//Crear un nombre para la imagen, desde parametro, o sino desde el timestamp
					if(isset($opciones['nombre'])){
						$filename = $opciones['nombre'];
					} else {
						// Generar un nombre unico desde el timestamp
						$filename = $this->generarNombreUnico();
					}
					
					
					//agregar prefijo
					if(isset($opciones['prefijo'])) $filename = $opciones['prefijo'].'_'.$filename;
					  
					settype($filename,"string");
					$filename.= ".";
					$filename.= $filetype;
					$tempfile = $tempuploaddir.DS.$filename;
					$homefile = $uploaddir.DS.$filename;

					if (is_uploaded_file($file['tmp_name'])) {                    
						// Copy the image into the temporary directory
						if (!copy($file['tmp_name'],"$tempfile")) {
							print "Error Uploading File!.";
							exit();
						}
					else {				
						if(isset($opciones['crop']) && $opciones['crop']){
							$this->resizeImage('resizeCrop', $tempuploaddir, $filename, $uploaddir, $filename, $maxw, $maxh, 70);
						} else {
							$this->resizeImage('resize', $tempuploaddir, $filename, $uploaddir, $filename, $maxw, $maxh, 80);	
						}
						// Delete the temporary image
						unlink($tempfile);
					}
                    }
			//Imagen subida, retornar el nombre del archivo
			return $filename;   
		}
	}
	
	/*
	*	Deletes the image and its associated thumbnail
	*	Example in controller action:	$this->Image->delete_image("1210632285.jpg","sets");
	*
	*	Parameters:
	*	$filename: The file name of the image
	*	$folderName: the name of the parent folder of the images. The images will be stored to /webroot/$folderName/big/ and  /webroot/$folderName/small/
	*/
	function borrarImagen($filename,$folderName) {
		if(is_file("img".DS.$this->rootFolder.DS.$folderName.DS.$filename)){
			unlink("img".DS.$this->rootFolder.DS.$folderName.DS.$filename);
			return true;
		} else {
			return false;
		}
	}
	
	function generarNombreUnico(){
		// Generar un nombre unico desde el timestamp
		return str_replace(".", "", strtotime ("now"));
	}
 
    function getFileExtension($str) {
 
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }

	/*
	 * @param $cType - the conversion type: resize (default), resizeCrop (square), crop (from center) 
	 * @param $id - image filename
	 * @param $imgFolder  - the folder where the image is
	 * @param $newName - include extension (if desired)
	 * @param $newWidth - the  max width or crop width
	 * @param $newHeight - the max height or crop height
	 * @param $quality - the quality of the image
	 * @param $bgcolor - this was from a previous option that was removed, but required for backward compatibility
	 */
	function resizeImage($cType = 'resize', $srcfolder, $srcname, $dstfolder, $dstname = false, $newWidth=false, $newHeight=false, $quality = 75)
	{
		$srcimg = $srcfolder.DS.$srcname;
		list($oldWidth, $oldHeight, $type) = getimagesize($srcimg); 
		$ext = $this->image_type_to_extension($type);
		
		//check to make sure that the file is writeable, if so, create destination image (temp image)
		if (is_writeable($dstfolder))
		{
			$dstimg = $dstfolder.DS.$dstname;
		}
		else
		{
			//if not let developer know
			debug("You must allow proper permissions for image processing. And the folder has to be writable.");
			debug("Run \"chmod 777 on '$dstfolder' folder\"");
			exit();
		}
		
		//check to make sure that something is requested, otherwise there is nothing to resize.
		//although, could create option for quality only
		if ($newWidth OR $newHeight)
		{
			/*
			 * check to make sure temp file doesn't exist from a mistake or system hang up.
			 * If so delete.
			 */
			if(file_exists($dstimg))
			{
				unlink($dstimg);
			}
			else
			{
				switch ($cType){
					default:
					case 'resize':
						# Maintains the aspect ration of the image and makes sure that it fits
						# within the maxW(newWidth) and maxH(newHeight) (thus some side will be smaller)
						$widthScale = 2;
						$heightScale = 2;
						
						// Check to see that we are not over resizing, otherwise, set the new scale
						if($newWidth) {
							if($newWidth > $oldWidth) $newWidth = $oldWidth;
							$widthScale = 	$newWidth / $oldWidth;
						}
						if($newHeight) {
							if($newHeight > $oldHeight) $newHeight = $oldHeight;
							$heightScale = $newHeight / $oldHeight;
						}
						//debug("W: $widthScale  H: $heightScale<br>");
						if($widthScale < $heightScale) {
							$maxWidth = $newWidth;
							$maxHeight = false;							
						} elseif ($widthScale > $heightScale ) {
							$maxHeight = $newHeight;
							$maxWidth = false;
						} else {
							$maxHeight = $newHeight;
							$maxWidth = $newWidth;
						}
						
						if($maxWidth > $maxHeight){
							$applyWidth = $maxWidth;
							$applyHeight = ($oldHeight*$applyWidth)/$oldWidth;
						} elseif ($maxHeight > $maxWidth) {
							$applyHeight = $maxHeight;
							$applyWidth = ($applyHeight*$oldWidth)/$oldHeight;
						} else {
							$applyWidth = $maxWidth; 
								$applyHeight = $maxHeight;
						}
						$startX = 0;
						$startY = 0;
						break;
					case 'resizeCrop':
					
						// Check to see that we are not over resizing, otherwise, set the new scale						
						// -- resize to max, then crop to center
						if($newWidth > $oldWidth) $newWidth = $oldWidth;	
							$ratioX = $newWidth / $oldWidth;
						
						if($newHeight > $oldHeight) $newHeight = $oldHeight;
							$ratioY = $newHeight / $oldHeight;									
	
						if ($ratioX < $ratioY) { 
							$startX = round(($oldWidth - ($newWidth / $ratioY))/2);
							$startY = 0;
							$oldWidth = round($newWidth / $ratioY);
							$oldHeight = $oldHeight;
						} else { 
							$startX = 0;
							$startY = round(($oldHeight - ($newHeight / $ratioX))/2);
							$oldWidth = $oldWidth;
							$oldHeight = round($newHeight / $ratioX);
						}
						$applyWidth = $newWidth;
						$applyHeight = $newHeight;
						break;
					case 'crop':
						// -- a straight centered crop
						$startY = ($oldHeight - $newHeight)/2;
						$startX = ($oldWidth - $newWidth)/2;
						$oldHeight = $newHeight;
						$applyHeight = $newHeight;
						$oldWidth = $newWidth; 
						$applyWidth = $newWidth;
						break;
				}
				
				switch($ext)
				{
					case 'gif' :
						$oldImage = imagecreatefromgif($srcimg);
						break;
					case 'png' :
						$oldImage = imagecreatefrompng($srcimg);
						break;
					case 'jpg' :
					case 'jpeg' :
						$oldImage = imagecreatefromjpeg($srcimg);
						break;
					default :
						//image type is not a possible option
						return false;
						break;
				}
				
				//create new image
				$newImage = imagecreatetruecolor($applyWidth, $applyHeight);
								
				//put old image on top of new image
				imagecopyresampled($newImage, $oldImage, 0,0 , $startX, $startY, $applyWidth, $applyHeight, $oldWidth, $oldHeight);
				
					switch($ext)
					{
						case 'gif' :
							imagegif($newImage, $dstimg, $quality);
							break;
						case 'png' :
							imagepng($newImage, $dstimg, $quality);
							break;
						case 'jpg' :
						case 'jpeg' :
							imagejpeg($newImage, $dstimg, $quality);
							break;
						default :
							return false;
							break;
					}
				
				imagedestroy($newImage);
				imagedestroy($oldImage);
								
				return true;
			}

		} else {
			return false;
		}
		

	}

	function image_type_to_extension($imagetype)
	{
	if(empty($imagetype)) return false;
		switch($imagetype)
		{
			case IMAGETYPE_GIF    : return 'gif';
			case IMAGETYPE_JPEG    : return 'jpg';
			case IMAGETYPE_PNG    : return 'png';
			case IMAGETYPE_SWF    : return 'swf';
			case IMAGETYPE_PSD    : return 'psd';
			case IMAGETYPE_BMP    : return 'bmp';
			case IMAGETYPE_TIFF_II : return 'tiff';
			case IMAGETYPE_TIFF_MM : return 'tiff';
			case IMAGETYPE_JPC    : return 'jpc';
			case IMAGETYPE_JP2    : return 'jp2';
			case IMAGETYPE_JPX    : return 'jpf';
			case IMAGETYPE_JB2    : return 'jb2';
			case IMAGETYPE_SWC    : return 'swc';
			case IMAGETYPE_IFF    : return 'aiff';
			case IMAGETYPE_WBMP    : return 'wbmp';
			case IMAGETYPE_XBM    : return 'xbm';
			default                : return false;
		}
	}
}
?>
