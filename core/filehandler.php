<?php

 class FileHandler{
	public $name;
	public $type;
	public $extn;
	public $path;
	public $size;
	public $tmp_name;
	public $path_abs;

	public function __construct($file=null){
		//print_r($file);
		if($file!=null && $file['error']==UPLOAD_ERR_OK)
		{
			$this->tmp_name=$file['tmp_name'];
			$this->name=round(microtime(true)*1000).'_'.str_replace(" ","_",$file['name']);
			//$this->type=mime_content_type($this->tmp_name);
			$this->type=$file['type'];
			$this->extn = strtolower(pathinfo($this->name,PATHINFO_EXTENSION));
			$this->size=$file['size'];
			$this->path= APP_UPLOAD_PATH;



		}


	}

	public function save($filename=null)
	{
		if($filename)
		{
			$this->name=round(microtime(true)*1000).'_'.$filename.'.'.$this->extn;
	

	}
	$this->path_abs=$this->path.$this->name;
	//print_r($this);
	return(move_uploaded_file($this->tmp_name,$this->path_abs));
	
}

public function remove()
{
if($this->name)
{

	unlink($this->path_abs);
}

}

 }

 ?>