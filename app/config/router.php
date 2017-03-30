
<?php
/**
Phalcon 3.1.1 Rest 
@ Author : lemonuiu
**/


$app->get('/api/site', function () use ($app) { echo 'Hello REST'; });

// Retrieves all data from DB
$app->get('/api/users', function () use ($app) {
	
	$phql = "SELECT * FROM Users ORDER BY id DESC";
	$users = $app->modelsManager->executeQuery($phql);

	
	$data = array();
	foreach($users as $user) {
		$data[] = array(
			'id'		=>	$user->id,
			'email'		=>	$user->email,			
			'password'	=>	$user->password,	
			'fname'		=>	$user->fname,		
			'lname'		=>	$user->lname,
			'kfname'	=>	$user->kfname,	
			'klname'	=>	$user->klname,
			'country'	=>	$user->country,		
			'gender'	=>	$user->gender		
		);
	}

	echo json_encode($data);
});


$app->notFound( function () use ($app) {
	$app->response->setStatusCode(404, "Not Found")->sendHeaders();
	echo '<br/> <hr/>   The page you were looking for does not exist.<hr/>';
});
