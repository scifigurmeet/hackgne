<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Upload extends Controller
{
    public function uploadFile(Request $request) {
		$file = $request->file('document');
		$size = $file->getSize();
		$destinationPath = 'uploads';
		$extension = $file->getClientOriginalExtension();
		$realName = uniqid().".".$extension;
		$file->move($destinationPath,$realName);
		$data = array();
		$data['name'] = $file->getClientOriginalName();
		$data['mime_type'] = $extension;
		$data['allowed_users'] = $file->getClientOriginalName();
		$data['path'] = $realName;
		$data['upload_user_id'] = getUserId();
		$units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		$power = $size > 0 ? floor(log($size, 1024)) : 0;
		$fileSize = number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
		$data['file_size'] = $fileSize;
		DB::table('uploads')->insert($data);
		return redirect('AllFiles?upload=Success');
   }
   
   public function showUploadedFiles(){
	   $data = DB::table('uploads')->get();
	   return datatables()->of($data)->toJson();
   }
   
   public function deleteFile(Request $request){
	   try{
	   DB::table('uploads')
	   ->where('id',$request->id)
	   ->delete();
	   echo 'File Deteled';
	   }
	   catch(Exception $ex){
		   echo 'Error';
	   }
   }
   
   
}
