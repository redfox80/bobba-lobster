<?php

echo'
<DOCTYPE html>
<html>
	<body>
		<form action="sha512.php" method="POST">
			<input type="text" name="preHash" placeholder="Enter text to hash here">
			<br><br>
			<button type="submit">Hash</button>
		</form>

		<br><br>
';

	if(isset($_POST['preHash'])){
		if($_POST['preHash'] == ""){
			echo "Nothing to hash";
		} else {
			echo "Hash: " . $_POST['preHash'] . "<br><br>" . hash("sha512", $_POST['preHash']);
		}
	} else {

		echo "Nothing to hash";
	}

	echo '
	</body>
</html>
';

?>