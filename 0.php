<?php

session_start();

include 'instructions.php';

if(empty($_SESSION['token'])){
	$_SESSION['token'] =  bin2hex(random_bytes(32));
}
$token  = $_SESSION['token'];

if(!empty($_POST['token'])) {
	if(hash_equals($_SESSION['token'], $_POST['token'])) {
		echo "CSRF token verified";
	}else{
		echo "Nope";
	}
}
?>


<form action="0.php" method ="POST">
	<div>
		<label for="say">What greeting do you want to say?</label>
		<input name="say" id="say" value="Hi">
	</div>
	<div>
		<label for="to">Who do you want to say it to?</label>
		<input name="to" id="to" value="Mom">
	</div>
		<input name ="token" id="token" value="<?php echo $token;?>" hidden>
	<div>
		<button> Send my greetings </button>
	</div>
</form>

