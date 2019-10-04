<?php
//Helpers File

function getHomeURL(){
	return 'http://192.168.16.113/dms';
}

function authorize(){
	$request = request();
	$username = $request->username;
	$password = md5($request->password);
	try{
		$data = DB::table('users')
		->where('username',$username)
		->where('password',$password)
		->get();
		if(count($data)==1){
			$data = array();
			$data['token'] = uniqid();
			DB::table('users')->where('username',$username)->update($data);
			request()->session()->put('gndecDOC', $data['token']);
			request()->session()->put('username', $username);
		}
		else{
			$data = array();
			$data['token'] = uniqid();
			DB::table('users')->where('username',$username)->update($data);
			request()->session()->forget('gndecDOC');
		}
	}
	catch(Exception $ex){
		$data = array();
		$data['token'] = uniqid();
		DB::table('users')->where('username',$username)->update($data);
		request()->session()->forget('gndecDOC');
	}
}

function getUserToken(){
	$username = request()->session()->get('username');
	return DB::table('users')->where('username',$username)->get()[0]->token;
}

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

function getUserId(){
	return 0;
}
?>
