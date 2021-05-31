<?php
error_reporting(0);
require('../_cm_admin/libraries/mysql_condb.php');
// require('../library/init.php');

$file = "../_cm_admin/.htaccess";//permissions 0644 or 0666
$users_table = "passwords";
$users_email_column = "Pas_Email";
$tokens_table = "access_tokens";
$tokens_email_column = "user_email";
$tokens_token_column = "access_token";
$tokens_date_column = "creation_date";

$error = "";

$client_ip = get_client_ip();
$htaccess = file_get_contents($file);
if(strpos($htaccess, $client_ip)!==false)
    $error = "You already have access.";


if(getparamvalue('email')!==''){ //user request access vie ajax call
    if(!empty($error)){ exit_with(0, $error);}
	create_store_send_access_token(); //exit inside
}else if(getparamvalue('t')!=='' && getparamvalue('e')!==''){ //when user click the link from email
	$error = check_token_and_unblock_ip();
}else if( (count($_GET)>0 || count($_POST)>0) && !isset($_GET['error']) ){ //there are wrong parameters in the URL
	$uri=$_SERVER['REQUEST_URI'];
	header('Location: '.substr($uri, 0, strpos($uri, '?') ).'?error=url');
	exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Requesting access...</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <style>
	    html,body{height:100%;}
	    .container{height:100%;display:flex;flex-direction:column;justify-content:center;min-height:410px;}
	    .valid-feedback, .invalid-feedback{margin-bottom: -23.2px;}
	    .form-group{margin-bottom: 2rem;}
	</style>
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-sm text-center"><img src='logo.png' style='max-width:200px;'></div>
        </div>
		<div class="row" style="margin-top:8vh">
			<div class="col-sm text-center"><h1 class="display-4">Requesting access...</h1></div>
		</div>
		<div class="row" style="margin-top:5vh">
			<div class="col-sm text-center"><p class="lead">Please type your email.</p></div>
		</div>
		<div class="row" style="margin-top:5vh">
			<div class="col-md">
				<form action="" method="post" class="needs-validation form" novalidate>
					<div class="form-row justify-content-md-center">
						<div class="form-group col-md-4">
						    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
						    <div class="valid-feedback">Looks good!</div>
						    <div class="invalid-feedback">Please type a valid email.</div>
					  	</div>
					  	<div class="form-group col-md-1">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row justify-content-md-center" style="margin-top:5vh">
			<div class="col-md-6" style="min-height:66px">
				<div class="alert alert-success" role="alert" style="display:none"></div>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="./bootstrap/bootstrap.min.js"></script>
	<script>
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				var forms = document.getElementsByClassName('needs-validation');
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);

			var alert_div = $('.alert');

			<?php if($_GET['error'] == 'url'){?>
				error("Oops! The URL you provided is wrong.")
			<?php }elseif($error=="success"){ ?>
				success("Authentication successful!<br>You can now login to INCOM CMS from the link that we sent you with your credentials.");
			<?php }elseif(!empty($error)){?>
				error("<?= $error?>")
			<?php }?>

			$(document).on('submit', '.form', function(e){
				e.preventDefault();
				alert_div.fadeOut(200);
				var input = $('input[type=email]');
				$.post( "", { email: input.val() }, function(data) {
					try{
						var response=$.parseJSON(data);
					}catch(err){ //response its not json
						error("Oops! Something went wrong.");
						return;
					}
					if(response.success_status == 1)
						success(response.message);
					else
						error(response.message);
				})
				.fail(function() { //request failed
					error("Oops! Something went wrong.");
				})
			})

			function success(msg){
				alert_div.html(msg);
				alert_div.attr('class','alert alert-success');
				alert_div.fadeIn(200);
			}
			function error(msg){
				alert_div.html(msg);
				alert_div.stop();
				alert_div.attr('class','alert alert-danger');
				alert_div.fadeIn(200);
			}
		})();

	</script>
</body>
</html>
<?php 
function create_store_send_access_token(){
	global $db_host, $db_login, $db_pswd, $db_name; //mysql_condb.php
	global $users_table,$users_email_column,$tokens_table,$tokens_email_column,$tokens_token_column,$key;

	$email = getparamvalue('email'); //no need for getparamvalue(). we use mysql prepared statements
	
	$server_email = "info@".$_SERVER['SERVER_NAME'];

	$conn = new mysqli($db_host, $db_login, $db_pswd, $db_name);
	$conn->set_charset('utf8mb4');

	// prepare and bind
	$find_user = $conn->prepare("SELECT $users_email_column FROM $users_table WHERE $users_email_column = ? LIMIT 1");
	if($find_user===false){ exit_with(0, "Something is wrong (1)", [$conn]); }
	$find_user->bind_param("s", $email);
	//execute
	if(!$find_user->execute()){ exit_with(0, "Something is wrong (2)", [$conn, $find_user]); }
	// $user = $find_user->get_result(); //mysqlnd driver must be enabled
    // $user->num_rows === 0

    if(!$find_user->fetch() && !in_array($email, get_dev_emails()) ){ exit_with(0, "Email not found. Please try again.", [$conn, $find_user]); }//false | read from ajax call
    $find_user->close();
	//we found a user. lets create his access_token
	//but first delete any existing access token. ALL access tokens
	if($conn->query("DELETE FROM $tokens_table") === false){ exit_with(0, "Something is wrong (4)", [$conn]); }
	//$token = bin2hex(random_bytes(64)); //PHP 7
	$token = bin2hex(openssl_random_pseudo_bytes(32)); //PHP 5.3.0 //length 64 chars
	if($token === false){ exit_with(0, "Something is wrong (3)", [$conn]); }

	//prepare sql statement
	$store_token = $conn->prepare("INSERT INTO $tokens_table ($tokens_email_column, $tokens_token_column) VALUES (?,?)");
	if($store_token===false){ exit_with(0, "Something is wrong (5)", [$conn, $store_token]); }
	$store_token->bind_param("ss", $email, $token);
	if(!$store_token->execute()){ exit_with(0, "Something is wrong (6)", [$conn, $store_token]); }

	//send email
    $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
    $uri = strpos($_SERVER['REQUEST_URI'],'?')===false ? $_SERVER['REQUEST_URI'] : substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],'?') );
	$msg = "To get access to the login page please click <a href='$protocol$_SERVER[SERVER_NAME]".$uri."?t=$token&e=$email'>here</a>";

	$headers .= "From: $_SERVER[SERVER_NAME] <$server_email>" . "\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
	$headers .= "Content-Transfer-Encoding: 7bit" . "\r\n";
	if(!mail($email,"One Click Away...",$msg, $headers)){ exit_with(0, "Something is wrong. Please try again.", [$conn, $store_token]); }
	exit_with(1, "We have send you an email. If you cannot find it, check your spam folder. You are one click away...", [$conn, $store_token]);
}

function check_token_and_unblock_ip(){
	global $db_host, $db_login, $db_pswd, $db_name; //mysql_condb.php
	global $tokens_table, $tokens_email_column, $tokens_token_column, $tokens_date_column, $file;
	$token = getparamvalue('t');
	$email = getparamvalue('e');

	$conn = new mysqli($db_host, $db_login, $db_pswd, $db_name);
	$conn->set_charset('utf8mb4');

	//check if there is pair token<=>email
	// prepare and bind
	$validate_token = $conn->prepare("SELECT * FROM $tokens_table WHERE $tokens_email_column = ? AND $tokens_token_column = ? AND $tokens_date_column > ( NOW() - INTERVAL 5 MINUTE ) LIMIT 1");
	if($validate_token===false){ return return_with("Something is wrong (7)",[$conn]);}
	$validate_token->bind_param("ss", $email, $token);
	//execute
	if(!$validate_token->execute()){ return return_with("Something is wrong (8)",[$conn,$validate_token]); }

	if(!$validate_token->fetch()){ return return_with("Access token mismatch. Please try again.",[$conn,$validate_token]); }
	$validate_token->close();
	//we have match. we dont need access token any more
	if($conn->query("DELETE FROM $tokens_table") === false){ return return_with("Something is wrong (9)", [$conn]); }

	//write client IP in .htaccess
	$client_ip = get_client_ip();
	if($client_ip===null) return return_with("We couldn't find your IP.",[$conn]);
	if(is_writable($file)){
		$htaccess = file_get_contents($file);
        $new_ip = "Allow from ".get_client_ip();
        if(strpos($htaccess, $new_ip)!==false)
            return return_with("You already have access.",[$conn]);

        $flag = "######### Dynamically added IPs";
        $insertIP = $flag.PHP_EOL.$new_ip; //insert IP after ######### Dynamically added IPs
        if(strpos( $htaccess , $flag )===false){ //ean den uparxei to ######### Dynamically added IPs sto htaccess
            $new_ip = $flag.PHP_EOL.$new_ip;
            $flag = "Deny from all";
            $insertIP = PHP_EOL.$new_ip.PHP_EOL.PHP_EOL.$flag; //insert IP before Deny from all
        }
		$htaccess = str_replace($flag, $insertIP, $htaccess);
		file_put_contents($file, $htaccess);
	}else{ return return_with("We couldn't give you access.",[$conn]); }


	$conn->close();
	return "success";
}

function exit_with($success, $msg, $stmts = [] ){
	echo '{"success_status":'.$success.', "message":"'.$msg.'"}'; //JSON
	foreach($stmts as &$stmt) $stmt->close();
	exit;
}

function return_with($msg, $stmts = [] ){
	foreach($stmts as &$stmt) $stmt->close();
	return $msg;
}

function get_client_ip(){
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else{
    	if(!filter_var($ipaddress, FILTER_VALIDATE_IP))
        	$ipaddress = null;
    }
 
    return $ipaddress;
}

function get_dev_emails(){
    $client = new SoapClient(null, array(
      'location' => "http://www.overron.gr/adminusers/soap/soapserver.php",
      'uri'      => "urn://www.testing.home/req",
      'trace'    => 1 ));
    
    $return = $client->getEmails();
    $emails = [];
    foreach( $return as $data ) {
        list( $email, $level ) = array_values($data);
        $emails[] = $email;
    }
    return $emails;
}