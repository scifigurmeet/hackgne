<?php
//Helpers File

function getHomeURL(){
	return 'http://192.168.16.113/dms';
}

function authorize(){
	$request = request();
	$username = $request->login_username;
	$password = md5($request->login_password);
	try{
		$data = DB::table('users')
		->where('username',$username)
		->where('password',$password)
		->get();
		if(count($data)==1){
			$data = array();
			$data['token'] = uniqid();
			DB::table('users')->where('username',$username)->update($data);
			$request->session()->put('gndecDOC', $data['token']);
			$request->session()->put('username', $username);
			echo '<script>window.location.replace("'.getHomeURL().'");</script>';
		}
		else{
			$data = array();
			$data['token'] = uniqid();
			DB::table('users')->where('username',$username)->update($data);
			request()->session()->forget('gndecDOC');
			header('Location: '.getHomeURL()."/login?success=False"); exit;
		}
	}
	catch(Exception $ex){
		$data = array();
		$data['token'] = uniqid();
		DB::table('users')->where('username',$username)->update($data);
		request()->session()->forget('gndecDOC');
		echo 'Login Exception';
		header('Location: '.getHomeURL()."/login?success=False"); exit;
	}
}

function getUserToken(){
	$username = request()->session()->get('username');
	if(strlen($username)==0){header('Location: '.getHomeURL()."/login?success=False"); exit;}
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

function logout(){
	request()->session()->forget('gndecDOC');
	request()->session()->forget('username');
	header('Location: '.getHomeURL()."/login?loggedOut=True"); exit;
}

function getAllGroups(){
	$data = DB::table('groups')->get();
	return $data;
}

function getFileData($id){
	$data = DB::table('uploads')
	->where('id',$id)
	->get()[0];
	return $data;
}

function signUp(){
	$request = request();
	$data = array();
	$data['first_name'] = $request->signup_first_name;
	$data['last_name'] = $request->signup_last_name;
	$data['username'] = $request->signup_username;
	$data['email_id'] = $request->signup_email;
	$p1 = $request->signup_password;
	$p2 = $request->signup_confirm_password;
	if($p1 == $p2) $data['password'] = md5($p1);
	else{
		header('Location: '.getHomeURL()."/login?passwordMismatch=True"); exit;
	}
	try{
		DB::table('users')->insert($data);
		echo "User Signedup Successfully";
	}
	catch(Exception $ex){
		header('Location: '.getHomeURL()."/login?error=".$ex->getMessage()); exit;
	}
}

function addForm(){
	$request = request();
	$data = array();
	$arr = $request->form_fields_name;
	for($i=0;$i<count($arr);$i++){
		$data[$i]['field_name'] = $request->form_fields_name[$i];
		$data[$i]['field_type'] = $request->form_fields_datatypes[$i];
		$data[$i]['field_description'] = $request->form_fields_description[$i];
	}
	$bigData = array();
	$bigData['structure'] = serialize($data);
	$bigData['name'] = $request->name;
	$bigData['description'] = $request->description;
	$bigData['status'] = 1;
	$bigData['access_user_ids'] = '1,2,3';
	try{
		DB::table('forms')->insert($bigData);
		echo "Form Added Successfully";
	}
	catch(Exception $ex){
		echo $ex->getMessage();
	}
}

function getFormData($id){
	$data = DB::table('forms')->where('id',$id)->get()[0];
	$data->structure = unserialize($data->structure);
	return $data;
}
?>
