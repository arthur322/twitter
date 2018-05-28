<?php 

if(!function_exists('avatar')){
	function avatar($avatar){
		if(is_null($avatar)){
			return 'storage/avatars/avatar.png';
		}else{
			return $avatar;
		}
	}
}

if(!function_exists('upload_avatar')){
	function upload_avatar($path, $file, $username) 
	{
		if(!empty($file)){
		    $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
		   	$fullPath = $path . $username . '.' . $file->getClientOriginalExtension();
		   	Storage::disk('public')->put($fullPath, file_get_contents($file), 'public');
		   	return '/storage/'.$fullPath;
		}else{
			return 'avatar.png';
		}
	   	
	}
}

if(!function_exists('upload')){
	function upload($path, $file) 
	{
	    $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
	    $filename_counter = 1;
	    while (Storage::disk('public')->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
	       $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).(string) ($filename_counter++);
	    }
	   $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();
	   Storage::disk('public')->put($fullPath, file_get_contents($file), 'public');
	   return $fullPath;
	}
}