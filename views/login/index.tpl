<?php include HOME . DS . 'includes' . DS . 'header.php'; ?>

<div class="container">
	<form action="checklogin" method="POST" class="form-group" >
		<h3><span class="success"><?php if(isset($success['msg'])) echo $success['msg'];?></span>
		<span class="error" ><?php if(!empty($msg1)) echo $msg1;?></span>
		<span class="error" ><?php if(isset($success['msg1'])) echo $success['msg1'];?></span></h3>
		<div class="form-group">
			<label for="email">Email</label>
			<span class="error">
			 	<?php if(isset($errors['emailerror'])) echo $errors['emailerror'];?>	
			</span>
			<input type="text" name="email" value="<?php if(isset($success['userEmail'])) echo $success['userEmail']; if(isset($email)) echo $email;?>" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<span class="error">
				<?php if(isset($errors['passworderror'])) echo $errors['passworderror'];?>
			</span>
			<input type="text" name="password" id="password" class="form-control">
		</div>
		<input type="submit" value="Submit" class="btn btn-primary">
	</form>
</div>
 
<?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>