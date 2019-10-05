<?php ob_start(); ?>
<!--	<h2>Forgot your password</h2>-->
<!--	<hr id="hr_title"/>-->
<br />
<div id="connexion">
	<div>
		<br />
		<table>
			<tr>
				<td>
					<p>Enter your email address and we will send you a link to reset your password.</p>
				</td>
			</tr>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-weight:bold; color: #DA2C38"><?= $error ?></p>
				</td>
			</tr>
			<tr>
				<td><input class="input" type="text" name="mail" placeholder="E-mail"></td>
			</tr>
			<tr>
				<td><input onclick="retrieve_pass()" id="submit_form" class="pass" type="submit" name="submit" value="Submit" </td> </tr> </table> <br />
	</div>
	<br />
	<div>
		<p>Do you remember your password? <a href="connexion.php">Sign in</a></p>
	</div>
</div>
<br />

<script src="./public/js/connect.js"></script>
<?php $form = ob_get_clean(); ?>

<?php ob_start(); ?>
<h2>Forgot your password</h2>
<hr id="hr_title" />
<br />
<div id="connexion">
	<div>
		<br />
		<table>
			<tr>
				<td>
					<p>Enter new password</p>
				</td>
			</tr>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-weight:bold; color: #DA2C38"><?= $error ?></p>
				</td>
			</tr>
			<input type="text" name="login" value=<?= $_GET['log'] ?> hidden>
			<tr>
				<td><input id="password" class="input" type="password" name="pass" placeholder="Password"></td>
			</tr>
			<tr>
				<td id="pass_security" style="display:none; text-align:left; padding-left:10%;">Make sure it's :<br />
					- at least 8 characters<br />
					- including a number<br />
					- including uppercase and lowercase letter</td>
			</tr>
			<tr>
				<td><input class="input" type="password" name="pass_2" placeholder="Confirm password"></td>
			</tr>
			<tr>
				<td><input onclick="new_pass()" id="submit_form" type="submit" name="submit" value="Submit" </td> </tr> </table> <br />
	</div>
	<br />
	<!--		<div>-->
	<!--			<p>Vous connaissez votre mot de passe ? <a href="connexion.php">Connectez-vous</a></p>-->
	<!--		</div>-->
</div>
<br />

<script src="./public/js/connect.js"></script>
<script>
	var password = document.getElementById("password")
	if (password) {
		password.addEventListener('input', function() {
			document.getElementById("pass_security").style.display = "block"
		})
	}
</script>
<?php $retrieve = ob_get_clean(); ?>

<?php
if (isset($_GET['key']) && isset($_GET['log']))
	$content = $retrieve;
else
	$content = $form;
?>

<?php require('view/template.php'); ?>