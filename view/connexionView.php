<?php ob_start(); ?>
<h2>Sign in</h2>
<hr id="hr_title" />
<br />
<div id="connexion">
	<div>
		<br />
		<form action="" method="post">
			<table>
				<tr>
					<td>
						<p style="font-weight:bold; color: #DA2C38"><?= $error ?></p>
					</td>
				</tr>
				<tr>
					<td><input type="text" name="login" placeholder="Login"></td>
				</tr>
				<tr>
					<td><input type="password" name="passwd" placeholder="Password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Sign in" </td> </tr> <tr>
					<td><br />
						<hr>
					</td>
				</tr>
				<tr>
					<td>
						<p><a href="forgotten_pass.php">Forgot password?</a></p>
					</td>
				</tr>
			</table>
		</form>
		<br />
	</div>
	<br />
	<div>
		<p>New to Camargam? <a href="subscription.php">Create account</a></p>
	</div>
</div>
<br />
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>