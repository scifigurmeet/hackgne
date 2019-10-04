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
	$request = request();
    $username = $request->session()->get('username');
	$data = DB::table('users')
	->select('first_name','last_name')
	->where('username',$username)
	->get()[0];
	return $full_name = $data->first_name." ".$data->last_name;
}

function logout(){
	request()->session()->forget('gndecDOC');
	request()->session()->forget('username');
	header('Location: '.getHomeURL()."/login?loggedOut=True"); exit;
}

function getAllGroups(){
	$data = DB::table('groups')->get();
	foreach($data as $one){
		$arr = explode(',',$one->member_user_ids);
		$str = array();
		foreach($arr as $a){
			array_push($str,getUsername($a));
		}
		$one->member_user_ids = implode(', ',$str);
		$one->created_by_user_id = getUsername($one->created_by_user_id);
	}
	return datatables()->of($data)->toJson();
}

function getAllUsers(){
	$data = DB::table('users')->get();
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

function send_document()
{
    $request = request();
    $username = $request->session()->get('username');
    $id = DB::table('users')->where('username',$username)->get()[0]->id;
    $data = array();
    $data['sent_from_id'] = $id;
    $data['sent_to_ids'] = $request->send_user_ids;
    $data['document_id'] = $request->document_id;
    $data['description'] = $request->description;
	DB::table('sent_files')->insert($data);
	echo "Document Sent Successfully.";
}

function getUserID(){
	$request = request();
    $username = $request->session()->get('username');
    return $id = DB::table('users')->where('username',$username)->get()[0]->id;
}

function getUsername($id){
    return $id = DB::table('users')->where('id',$id)->get()[0]->username;
}

function submitForm(){
    $request = request();
    $data = array();
    $data['user_id'] = getUserID();
    $data['form_id'] = $request->form_id;
    $data['data'] = serialize($request->data);
    //return dd($data['data']);
    DB::table('form_submissions')->insert($data);
}

function addNewGroup(){
	$request = request();
	$data = array();
	$data['group_name'] = $request->group_name;
	$data['member_user_ids'] = $request->member_ids;
	$data['created_by_user_id'] = getUserID();
	DB::table('groups')->insert($data);
	header('Location: '.getHomeURL()."/groups"); exit;
}

function deleteGroup(){
	DB::table('groups')->where('id',request()->id)->delete();
	echo 'Deleted Successfully';
}

function getAllForms(){
	$data = DB::table('forms')->get();
	return datatables()->of($data)->toJson();
}

function getFormSubmissionData(){
	$id = request()->id;
	$data = DB::table('form_submissions')
	->where('form_id',$id)
	->select('data')
	->get();
	return datatables()->of($data)->toJson();
}
?>
