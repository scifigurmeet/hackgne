<?php
//Helpers File

function getUploadsSize(){
	  $size = 0;

    foreach( File::allFiles('uploads') as $file)
    {
        $size += $file->getSize();
    }
	$units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}

function getUserFullName(){
	$data = DB::table('users')
	->select('first_name','last_name')
	->get()[0];
	return $full_name = $data->first_name." ".$data->last_name;
}
?>
