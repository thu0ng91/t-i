<?php
/**
 * $upload: CUploadedFile::getInstance;
 * $type:  artilce product
 * $act:  create update
 * $imgurl:  delete old imgurl when update
 */
class Upload{

	public static function createFile($upload,$type,$act,$imgurl=''){
		if(!empty($imgurl)&&$act==='update'){
			$deleteFile=Yii::app()->basePath.'/../'.$imgurl;
			if(is_file($deleteFile))
				unlink($deleteFile);
		}
		$uploadDir= FW_ROOT_PATH . DS . FW_UPLOAD_DIR .DS .$type. DS .date('Y-m',time());
		self::recursionMkDir($uploadDir);
		$imgname=time().'-'.rand().'.'.$upload->extensionName;
		//图片存储路径
		$imageurl='/' . FW_UPLOAD_DIR . '/'.$type.'/'.date('Y-m',time()).'/'.$imgname;
		//存储绝对路径
		$uploadPath=$uploadDir. DS. $imgname;
		if($upload->saveAs($uploadPath)){
			return $imageurl;
		}else{
			return null;
		}
	}

    public static function deleteFile($imgurl)
    {
        if(!empty($imgurl)){
            $deleteFile= FW_ROOT_PATH . $imgurl;
            if(is_file($deleteFile))
                unlink($deleteFile);
        }
    }
	private static function recursionMkDir($dir){
		if(!is_dir($dir)){
			if(!is_dir(dirname($dir))){
				self::recursionMkDir(dirname($dir));
				mkdir($dir,'0777');
			}else{
				mkdir($dir,'0777');
			}
		}
	}
}