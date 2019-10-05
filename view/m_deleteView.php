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
		<td id="col1"></td>
		<td><span style="color: #F05D5E">Once you delete your account, there is no going back. Please be certain.</span></td>
		<td></td>
	</tr>
	<tr>
		<td><br /></td>
	</tr>
	<tr>
		<td id="col1">Enter your password</td>
		<td><input class="input" type="password" name="pass"><span style="margin-left:10px;font-weight:bold; color: #DA2C38"><?= $field ?></span></td>
	</tr>
	<tr>
		<td><br /></td>
	</tr>
	<tr>
		<td id="col1"></td>
		<td><input onclick="modify_delete()" type="submit" name="submit" id="submit_form" value="Delete your account"></td>
	</tr>
</table>
<?php $form = ob_get_clean(); ?>

<?php require('view/accountView.php'); ?>