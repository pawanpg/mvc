<?php include HOME . DS . 'includes' . DS . 'header.php'; ?>

<div class="container">
	<div class="jumbotron"<div >
		<form action="checkregister" method="POST" class="form-group" >
			<h3><span class="error"><?php if(!empty($msg)) echo $msg;?></span></h3>
			<div class ="row">
				<div class="col-lg-7">
					<label for="name">Name</label> 
					<span class="error">
						<?php if(isset($errors['nameerror'])) echo $errors['nameerror'];?>
					</span>
					<input type="text" name="name" id="name" 
					value="<?php if(isset($name)) echo $name;?>" class="form-control">
				</div>
			</div>

			<div class ="row">
				<div class="col-lg-7">
					<label for="age">Age</label> 
					<span class="error">
						<?php if(isset($errors['ageerror'])) echo $errors['ageerror'];?>
					</span>
					<input type="text" name="age" id="age" 
					value="<?php if(isset($age)) echo $age;?>" class="form-control">
				</div>
			</div>
			
			<div class ="row">	
				<div class="col-lg-7">
					<label for="email">Email</label>
					<span class="error">
					 	<?php if(isset($errors['emailerror'])) echo $errors['emailerror'];?>	
					</span>
					<input type="text" name="email" id="email" 
					value="<?php if(isset($email)) echo $email;?>" class="form-control">
				</div>
			</div>
			
			<div class ="row">	
				<div class="col-lg-7">
					<label for="password">Password</label>
					<span class="error">
						<?php if(isset($errors['passworderror'])) echo $errors['passworderror'];?>
					</span>
					<input type="text" name="password" id="password" class="form-control">
				</div>
			</div>	

			<div class ="row">
				<div class="col-lg-2">
					<input type="submit" value="Submit" class="btn btn-primary">
				</div>
			</div>		
		</form>
	</div>
</div>


<?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>