<?php ob_start(); ?>
<!--	<h2>S'inscrire</h2>-->
<!--	<hr id="hr_title"/>-->
<br />
<div id="connexion">
	<div>
		<br />
		<form action="" method="post">
			<table>
				<tr>
					<td>
						<p>Sign up for Camagram</p>
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
					<td><input type="text" name="login" placeholder="Login"></td>
				</tr>
				<tr>
					<td><input type="text" name="mail" placeholder="E-mail"></td>
				</tr>
				<tr>
					<td><input id="password" type="password" name="passwd" placeholder="Password"></td>
				</tr>
				<tr>
					<td id="pass_security" style="display:none; text-align:left; padding-left:10%;">Make sure it's :<br />
						- at least 8 characters<br />
						- including a number<br />
						- including uppercase and lowercase letter </td>
				</tr>
				<tr>
					<td><input type="password" name="passwd2" placeholder="Password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Sing up" </td> </tr> </table> </form> <br />
	</div>
	<br />
	<div>
		<p>You already have an account ? <a href="connexion.php">Sign in</a></p>
	</div>
</div>
<br />

<script src="./public/js/connect.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>