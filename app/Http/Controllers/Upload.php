<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Upload extends Controller
{
    public function uploadFile(Request $request) {
		$file = $request->file('document');
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
		DB::table('uploads')->insert($data);
		return redirect('AllFiles?upload=Success');
   }
   
   public function showUploadedFiles(){
	   $data = DB::table('uploads')->get();
	   return datatables()->of($data)->toJson();
   }
   
   
}
