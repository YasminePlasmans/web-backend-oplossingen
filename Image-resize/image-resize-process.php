<?php 
session_start();

    function relocate( $url )
    {
        header('location: ' . $url );
    }

    function my_autoloader($class) {
        include 'classes/' . $class . '.php';
    }

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');
    
    function cropImage($image){

    	$source 				= 'img\\' . $image['name'];
    	list($width, $height) 	= getimagesize($source);
    	$fileParts			 	= pathinfo($source);
    	$ext 					= $fileParts['extension'];
    	$fileName 				= $fileParts['filename'];


    	// Default = Portret 
    	$longestSide 	= $height;
    	$shortestSide 	= $width;
    	$orientation 	= 'portret';

    	// If landscape
    	if($width > $height){
    		$longestSide 	= $width;
    		$shortestSide 	= $height;
    		$orientation 	= 'landscape';
    	}

    	//Calculate as

    	$locationAs = ($longestSide-$shortestSide)/2;

    	//crop array


    	$cropArray = array('x' => 0,
    						'y' => 0,
    						'width' => $shortestSide,
    						'height' => $shortestSide);

    	if($orientation == 'landscape'){
    		$cropArray['x'] = $locationAs;
    	}
    	else{
    		$cropArray['y'] = $locationAs;
    	}
    	
    	//Check extension & create new canvas
    	switch ($ext)
		{
			case ('jpg'):
			case ('jpeg'):
				$cropCanvas 	= 	imagecreatefromjpeg($source);
				break;
				
			case ('png'):
				$cropCanvas 	=	imagecreatefrompng($source);
				break;
	
			case ('gif'):
				$cropCanvas 	=	imagecreatefromgif($source);
				break;
		}

		//Crop image

		$croppedImage = imagecrop($cropCanvas, $cropArray);

		//Save cropped file
		switch ($ext)
		{
			case ('jpg'):
			case ('jpeg'):
				imagejpeg($croppedImage, ('img/' . $fileName. '_croppedImage.' . $ext), 100);
				break;
				
			case ('png'):
				imagepng($croppedImage, ('img/' . $fileName. '_croppedImage.' . $ext), 100);
				break;
	
			case ('gif'):
				imagegif($croppedImage, ('img/' . $fileName. '_croppedImage.' . $ext));
				break;
		}

		$croppedImagePath = 'img/' . $fileName. '_croppedImage.' . $ext;

		return $croppedImagePath;
    }

    function resize($image){

    	list($width, $height) 	= getimagesize($image);
    	$fileParts			 	= pathinfo($image);
    	$ext 					= $fileParts['extension'];
    	$fileName 				= $fileParts['filename'];

    	$thumbDimensions['width']	=	100;
		$thumbDimensions['height']	=	100;

		switch ($ext)
		{
			case ('jpg'):
			case ('jpeg'):
				$source 	= 	imagecreatefromjpeg($image);
				break;
				
			case ('png'):
				$source 	=	imagecreatefrompng($image);
				break;
	
			case ('gif'):
				$source 	=	imagecreatefromgif($image);
				break;
		}

		$thumbCanvas 	=	imagecreatetruecolor($thumbDimensions['width'], $thumbDimensions['height']);

		imagecopyresized($thumbCanvas, $source, 0,0,0,0, $thumbDimensions['width'],$thumbDimensions['height'], $width, $height);

		switch ($ext)
		{
			case ('jpg'):
			case ('jpeg'):
				$resized 	= 	imagejpeg($thumbCanvas, ('img/' . $fileName. '_thumb.' . $ext), 100);
				break;
				
			case ('png'):
				$resized 	=	imagepng($thumbCanvas, ('img/' . $fileName. '_thumb.' . $ext), 100);
				break;
	
			case ('gif'):
				$resized 	=	imagegif($thumbCanvas, ('img/' . $fileName. '_thumb.' . $ext));
				break;
		}

    }

if ( isset( $_POST[ 'submit' ] ) )
    {
        // Fotovalidatie
        if ( $_FILES[ 'profilePicture' ][ 'error' ] !== 4 )
        {
            // 0 is geldig, meer dan 0 niet geldig
            $isValid = 0;

            // File size (2mb)
            if ( $_FILES[ 'profilePicture' ][ 'size' ] > 2000000 )
            {
                ++$isValid;
            }

            // Extensie (gif, png, jpeg)
            if ( $_FILES[ 'profilePicture' ][ 'type' ] !== 'image/jpeg' &&
                $_FILES[ 'profilePicture' ][ 'type' ] !== 'image/png' &&
                $_FILES[ 'profilePicture' ][ 'type' ] !== 'image/gif'   )
            {

                ++$isValid;
            }

            if ( $isValid > 0 )
            {
                new Message( "Het bestand is niet geldig, probeer een ander bestand", "error" );
                relocate( "image-resize.php" );
            }
            else
            {
               /* // Nieuwe naam aanmaken
                $newFileName = createNewFileName( $user->getId(), $_FILES[ 'profilePicture' ][ 'name' ] );

                // Controle of naam reeds in map voorkomt
                while ( file_exists( SERVER_PATH . 'img\\' . $newFileName ) )
                {
                    $newFileName = createNewFileName( $user->getId(), $_FILES[ 'profilePicture' ][ 'name' ] );
                }
                */
                // Verplaatsen
                move_uploaded_file( $_FILES[ 'profilePicture' ][ 'tmp_name' ],  'img\\' . $_FILES['profilePicture'][ 'name' ] );
                
                $croppedImage = cropImage($_FILES['profilePicture']);
               	
               	resize($croppedImage);

               	relocate( "image-resize.php" );

            }
    	}
    }

?>