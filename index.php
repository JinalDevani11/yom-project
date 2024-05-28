<?php 
  	include 'db.php';
	$sql="SELECT * FROM  slider where status=1";
	$res=mysqli_query($con,$sql);
 ?>

<?php include 'header_yom.php'; ?>

				<div class="slider">
					<div class="fullwidthbanner-container">
						<div class="fullwidthbanner">
							<ul>
								<?php while ($data=mysqli_fetch_assoc($res)) {  ?>
									
							
								<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
									<img src="admin/image/slider/<?php echo $data['image']  ?>" data-fullwidthcentering="on" alt="slide">
									<div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="250" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><?php echo $data['title']; ?></div>
									<div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="340" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><?php echo $data['des']; ?></div>
									<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="510" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><a href="#" class="btn btn-slider">Discover More</a></div>
								</li>
									<?php } ?>
								
								
							</ul>
						</div>
					</div>
				</div>
				

				<section class="services green">
					<div class="container">
						<div class="section-heading">
							<h2>What We Offer</h2>
							<div class="section-dec"></div>
						</div>
						<?php 
						$sql="SELECT * FROM `offer`";
						$res=mysqli_query($con,$sql);
						while ($data=mysqli_fetch_assoc($res)) {
							$icon=$data['icon'];
						 ?>
									
						
						<div class="service-item col-md-4">
							<span><i class="<?php echo $icon; ?>"></i></span>
							<div class="tittle"><h3><?php echo $data['title']; ?></h3></div>
							<p><?php echo $data['des']; ?></p>
						</div>
						<?php } ?>
					</div>
				</section>
				
					<section class="call-to-action-1">
					<div class="container">
						<h4>Over 3000 people already downloaded YOM</h4>
						<p class="col-md-10 col-md-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat quod voluptate consequuntur ad quasi, dolores obcaecati ex aliquid, dolor provident accusamus omnis dolorum ipsam. Voluptatem ipsum expedita, corporis facilis laborum asperiores nostrum! Amet porro numquam ratione temporibus quia dolorem sint lorem voluptates quasi mollitia.</p>
						<div class="buttons">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="border-btn"><a href="#">Learn More</a></div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="btn-black"><a href="#">Buy This Theme</a></div>
							</div>
						</div>
					</div>	
				</section>
				
					<section class="call-to-action-2">
					<div class="container">
					<div class="left-text hidden-xs">
						<h4>To know about this theme read this</h4>
						<p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi ut explicabo magni sapiente.</em><br><br>Inventore at quia, vel in repellendus, cumque dolorem autem ad quidem mollitia porro blanditiis atque rerum debitis eveniet nostrum aliquam. Sint aperiam expedita sapiente amet officia quis perspiciatis adipisci, iure dolorem esse exercitationem!</p>
					</div>
						<div class="right-image hidden-xs"></div>
					</div>
				</section>

				<section class="portfolio">
					<div class="container">
						<div class="section-heading-white">
							<h2>Recent Photos</h2>
							<div class="section-dec"></div>
							<?php 
								$sql="SELECT * FROM `blog` ORDER BY id DESC LIMIT 0,3";
								$res=mysqli_query($con,$sql);
								
						 	?>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="owl-portfolio" class="owl-carousel owl-theme">
									<?php  	while ($data=mysqli_fetch_assoc($res)) { ?>
									<div class="item">
								  		<figure>
				        					<img alt="portfolio" src="admin/image/read/<?php echo $data['image']  ?>" >
				        					<figcaption>
				            					<h3><?php echo $data['title']; ?></h3>
				            					<p><?php echo $data['des']; ?></p>
				        					</figcaption>
				    					</figure>								    
				    				</div>			
				    				<?php } ?>			   
								</div>
							</div>
						</div>
						
						<div class="owl-navigation">
						  <a class="btn prev fa fa-angle-left"></a>
						  <a class="btn next fa fa-angle-right"></a>
						  <a href="three_column_about.php" class="go-to">Go to portfolio</a>
						</div>
					</div>
				</section>
				
				<section class="testimonials">
					<div class="container">
						<div class="section-heading">
							<h2>What Others saying</h2>
							<div class="section-dec"></div>
							<?php 
								$sql="SELECT * FROM `whatother`";
								$res=mysqli_query($con,$sql);
								
						 	?>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="owl-demo" class="owl-carousel owl-theme">
									<?php  	while ($data=mysqli_fetch_assoc($res)) { ?>
									<div class="item">
								  		<div class="testimonials-post">
								  			<span class="fa fa-quote-left"></span>
								  			<p><?php echo $data['des']; ?></p>
								  			<h6><?php echo $data['name']; ?><em><?php echo $data['subname']; ?></em></h6>
								  		</div>
								    </div>
								 <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</section>		

				<section class="call-to-action-3">
					<div class="container">
						<div class="col-md-12">
							<h4 class="col-md-10 col-sm-8">Read your lastest newsletters, we have an offer for you!</h4>
							<div class="btn-black col-md-2 col-sm-4"><a href="#">Take it now</a></div>
						</div>
					</div>
				</section>	

						<section class="blog-posts">
					<div class="container">
						<div class="section-heading">
							<h2>Latest Posts</h2>
							<div class="section-dec"></div>
							<?php 
								$sql="SELECT blog.* ,category.cat , user_register.name FROM blog JOIN category on category.id=blog.category JOIN user_register on blog.author=user_register.id order by id desc limit 0,3;";
								$res=mysqli_query($con,$sql);
								
						 	?>
						</div>
						<?php  $id=0; 
						while ($data=mysqli_fetch_assoc($res)) { ?>
						<div class="blog-item">
							<div class="col-md-4">
								<a href="single_blog.php?id=<?php echo $id++ ;?>"><img alt="portfolio" src="admin/image/read/<?php echo $data['image']  ?>" ></a>
								<h3><a href="blog-single.html"><?php echo $data['title']; ?></a></h3>
								<span><a href="#"><?php echo $data['name']; ?></a>|</span>
								<span><a href=""><?php echo $data['d_date']; ?></a>|</span>
								<span><a href=""><?php echo $data['cat']; ?></a>|</span>
								<p><?php echo $data['des']; ?></p>
								<div class="read-more">
									<a href="single_blog.php">Read more</a>
								</div>
							</div>
						</div>
					<?php } ?>
					
						
					</div>
				</section>	
				       <footer class="footer">
				      <div class="three spacing"></div>
					  <div class="container">
				      <div class="row">
				        <div class="col-md-3">
				          <h1>
				            <a href="index.html">
				             YOM
				            </a>
				          </h1>
				          <p>©2015 Yom. All rights reserved.</p>
				          <div class="spacing"></div>
				          <ul class="socials">
				            <li>
				              <a href="http://facebook.com">
				                <i class="fa fa-facebook"></i>
				              </a>
				            </li>
				            <li>
				              <a href="http://twitter.com">
				                <i class="fa fa-twitter"></i>
				              </a>
				            </li>
				            <li>
				              <a href="http://dribbble.com">
				                <i class="fa fa-dribbble"></i>
				              </a>
				            </li>
				            <li>
				              <a href="http://tumblr.com">
				                <i class="fa fa-tumblr"></i>
				              </a>
				            </li>
				          </ul>
				          <div class="spacing"></div>
				        </div>
				        <div class="col-md-3">
				          <div class="spacing"></div>
				          <div class="links">
				            <h4>Some pages</h4>
				            <ul>
				              <li><a href="#">Home</a></li>
				              <li><a href="#">View some works here</a></li>
				              <li><a href="#">Follow our blog</a></li>
				              <li><a href="#">Contact us</a></li>
				              <li><a href="#">Our services</a></li>
				            </ul>
				          </div>
				          <div class="spacing"></div>
				        </div>
				        <div class="col-md-3">
				          <div class="spacing"></div>
				          <div class="links">
				            <h4>Recent posts</h4>
				            <ul>
				              <li><a href="#">Hello World!</a></li>
				              <li><a href="#">This is the post title here</a></li>
				              <li><a href="#">Our happy day</a></li>
				              <li><a href="#">The first works done</a></li>
				              <li><a href="#">The cats and dogs</a></li>
				            </ul>
				          </div>
				          <div class="spacing"></div>
				        </div>
				        <div class="col-md-3">
				          <div class="spacing"></div>
				          <h4>Email updats</h4>
				          <p>We want to share our latest trends, news and insights with you.</p>
				          <form>
				            <input class="email-address" placeholder="Your email address" type="text">
				            <input class="button boxed small" type="submit">
				          </form>
				          <div class="spacing"></div>
				        </div>
				      </div>
					  </div>
				      <div class="two spacing"></div>
				    </footer>
								
								<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

							</div>

						</div>

						<nav class="sidebar-menu slide-from-left">
							<div class="nano">
								<div class="content">
									<nav class="responsive-menu">
										<ul>
											<li><a href="index-2.html">Home</a></li>
											<li class="menu-item-has-children"><a href="#">Pages</a>
												<ul class="sub-menu">
													<li><a href="services.html">Services</a></li>
													<li><a href="clients.html">Clients</a></li>
												</ul>
											</li>
											<li class="menu-item-has-children"><a href="#">Blog</a>
												<ul class="sub-menu">
													<li><a href="blog.html">Blog Classic</a></li>
													<li><a href="blog-grid.html">Blog Grid</a></li>
													<li><a href="blog-single.html">Single Post</a></li>
												</ul>
											</li>
											<li><a href="about.html">About</a></li>
											<li class="menu-item-has-children"><a href="#">Works</a>
												<ul class="sub-menu">
													<li><a href="work-3columns.html">Three Columns</a></li>
													<li><a href="work-4columns.html">Four Columns</a></li>
													<li><a href="single-project.html">Single Project</a></li>
												</ul>
											</li>
											<li><a href="contact.html">Contact</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</nav>

					</div>


	

	<script type="text/javascript" src="files/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="files/js/bootstrap.min.js"></script>
	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="files/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="files/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	<script type="text/javascript" src="files/js/plugins.js"></script>
	<script type="text/javascript" src="files/js/custom.js"></script>

</body>
</html>