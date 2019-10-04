<?php
//Helpers File
public function getUploadsSize(){
    $file_size = 0;

    foreach( File::allFiles('uploads') as $file)
    {
        $file_size += $file->getSize();
    }
    return number_format($file_size / 1048576,2);
}
