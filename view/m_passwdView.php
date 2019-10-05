<?php ob_start(); ?>
<table>
	<tr>
		<td rowspan="2" id="col1"><img src='<?= $profile['profile'] ?>' /></td>
		<td rowspan="2" class="login"><?= $profile['login'] ?></td>
	</tr>
	<tr>
		<td><br /></td>
	</tr>
	<tr>
		<td><br /></td>
	</tr>
	<tr>
		<td id="col1">Old password</td>
		<td><input class="input" type="password" name="old_pass"> <span style="font-weight:bold; color: #DA2C38"><?= $field ?></span></td>
	</tr>
	<tr>
		<td><br /></td>
	</tr>
	<tr>
		<td id="col1">New password</td>
		<td><input id="password" class="input" type="password" name="new_pass"> <span style="font-weight:bold; color: #DA2C38"><?= $field ?></span></td>
	</tr>
	<tr>
		<td id="col1"></td>
		<td id="pass_security" style="display:none;text-align:left; padding-left:10%; height:auto; font-size:16px">Make sure it's :<br />
			- at least 8 characters<br />
			- including a number<br />
			- including uppercase and lowercase letter</td>
	</tr>
	<tr>
		<td id="col1">Confirm new password</td>
		<td><input class="input" type="password" name="new_pass_2"> <span style="font-weight:bold; color: #DA2C38"><?= $field ?></span></td>
	</tr>
	<tr>
		<td><br /></td>
	</tr>
	<tr>
		<td id="col1"></td>
		<td><input onclick="modify_passwd()" type="submit" name="submit" id="submit_form" value="Update password"> </td>
	</tr>
</table>

<script>
	var password = document.getElementById("password")
	if (password) {
		password.addEventListener('input', function() {
			document.getElementById("pass_security").style.display = "block"
		})
	}
</script>
<?php $form = ob_get_clean(); ?>

<?php require('view/accountView.php'); ?>