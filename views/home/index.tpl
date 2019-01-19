<?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
This is Home Page  - This is Master Branch
<div class="row">
	<div class="container-fluid">
    	<div class="col-lg-12">
       		<div id="myCarousel" class="carousel slide" data-ride="carousel">
    			<!-- Indicators -->
    			<ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1" ></li>
				    <li data-target="#myCarousel" data-slide-to="2" ></li>
    			</ol>

			    <!-- Wrapper for slides -->
			    <div class="carousel-inner">
					<div class="item active">
        				<img src="<?php echo URL;?>views/home/dragon.jpg"  alt="Mango" style="width:100%; height:40vh;">
        				<div class="carousel-caption">
           					<h3>Yummy Mangoes</h3>
           					<h4>From Ratnagiri</h4>
        				</div>
      				</div>
					<div class="item">
        				<img src="<?php echo URL;?>views/home/mango.jpg" alt="Custard" style="width:100%; height: 40vh;">
        				<div class="carousel-caption">
         					<h3>Creamfull Custard-Apple</h3>
        					<h4>From Rajsthan</h4>
        				</div>
      				</div>
    
				    <div class="item">
				        <img src="" alt="Grapes" style=" width:100%; height: 40vh;">
				        <div class="carousel-caption">
				        	<h3>Sweet and Juicy Grapes</h3>
				        	<h4>From Nashik</h4>
				        </div>
				    </div>
  				</div>

			    <!-- Left and right controls -->
			    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				    <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#myCarousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				    <span class="sr-only">Next</span>
			    </a>
  			</div>
      	</div>
    </div>
</div>   
<?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>