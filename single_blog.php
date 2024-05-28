<?php 
	 include 'header_yom.php';
  	 include 'db.php';
	 // $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
  	 
	$total_blog = "select * from blog";
	$total = mysqli_query($con,$total_blog);
	$total_cnt = mysqli_num_rows($total);
	$id = $_GET['id'];
	$pnum = $id;
	$nnum = $id;
     $sql="SELECT blog.* ,category.cat , user_register.name FROM blog JOIN category on category.id=blog.category JOIN user_register on blog.author=user_register.id order by image DESC limit $id,1";
  	$res=mysqli_query($con,$sql);
  	$data=mysqli_fetch_assoc($res);

	$comment=0;
	if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $subject=$_POST['subject'];
      $comment=$_POST['comment'];
      $image=$_FILES['image']['name'];
	  $path="admin/image/comment/".$image;
	  move_uploaded_file($_FILES['image']['tmp_name'], $path);
	  $blog_id=$data['id'];

      $sql="INSERT INTO `comment`(`name`,`email`,`subject`,`comment`,`image`,`blog_id`) VALUES ('$name','$email','$subject','$comment','$image','$blog_id')";
      mysqli_query($con,$sql);
      $query="SELECT COUNT(*) AS comment FROM `comment` WHERE blog_id=$blog_id AND status=1";
      $result=mysqli_query($con,$query);
      $row=mysqli_fetch_assoc($result);
      $comment=$row['comment'];
      // header("location:$actual_link");
  }

 
 ?>
<style type="text/css">
	.even{
		margin-left: 100px;
	}
	span{
		color:red;
		display:none;
	}
</style>
				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Single Post</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>
				
				<section class="blog-single">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="blog-single-item">
									<img alt="portfolio" src="admin/image/read/<?php echo $data['image']  ?>" style="width: 100%; height: 100%;">
									<div class="blog-single-content">	
										<h3><a href="#"><?php echo $data['title']; ?></a></h3>
										<span><a href="#"><?php echo $data['subtit']; ?></a></span>
										<p><?php echo $data['des']; ?><br><br> <em><i class="fa fa-info"></i>Quis, sequi illo nobis velit. Quas minima corporis quis laborum, ex odit natus.</em><br><br>Blanditiis possimus voluptas similique numquam consequatur dolorem labore veritatis quaerat laboriosam, porro tenetur vel exercitationem laborum aperiam repellat expedita ipsum corrupti perspiciatis! Quia necessitatibus totam repudiandae ipsam aut repellendus, aspernatur soluta consectetur aperiam accusantium aliquid beatae nihil magni nulla, similique minus perspiciatis provident qui veritatis dolorum quasi sint. Quam impedit in eos illum sint officiis reiciendis repellendus quia, similique ipsa porro accusantium dolores sunt error, ex, tempora et voluptatibus eveniet. <br><br>Voluptatibus libero laboriosam tempore rerum error non. Perspiciatis deleniti iste a. Illo ipsum, commodi vel necessitatibus assumenda veritatis a velit possimus sint!</p>
										<div class="share-post">
											<span>Share on: <a href="#">facebook</a>, <a href="#">twitter</a>, <a href="#">linkedin</a>, <a href="#">instagram</a></span>
										</div>
									</div>
									<div class="prev-btn col-md-6 col-sm-6 col-xs-6">
										<?php if($pnum>1):  ?>
												<a href="single_blog.php?id=<?php echo --$pnum; ?>"><i class="fa fa-angle-left"></i>Previous</a>
										 <?php endif; ?>
									</div>
									<div class="next-btn col-md-6 col-sm-6 col-xs-6">
										<?php if($nnum<=$total_cnt-1): ?>
											<a href="single_blog.php?id=<?php echo ++$nnum; ?>">Next<i class="fa fa-angle-right"></i></a>
										<?php endif ?>
										
									</div>	
								</div>
								<div class="blog-comments">
									<h2><?php echo $comment; ?> Comments</h2>
									<?php 
										$sql1 = "SELECT * FROM `comment` WHERE blog_id =".$data['id']." AND status=1";
										$res1=mysqli_query($con,$sql1);
										$cnt=0;
									?>
									<?php  	while ($data=mysqli_fetch_assoc($res1)) {
										$cnt++;

									 ?>
									<ul class="coments-content">
										<li class="first-comment-item <?php echo ($cnt % 2 ==0) ? 'even' : ''; ?>">
											<img alt="portfolio" src="admin/image/comment/<?php echo $data['image']  ?>" >
											<span class="author-title"><a href="#"><?php echo $data['name']; ?></a></span>
											<span class="comment-date">10 May 2015 / <a href="#">Reply</a>
											</span>
											<p><?php echo $data['comment']; ?></p>
										</li>
									</ul>
									<?php } ?>


								</div>
								<div class="submit-comment col-sm-12">
									<h2>Leave A Comment</h2>
									<form id="contact_form" method="POST" enctype="multipart/form-data">
									<div class="col-md-4 col-sm-4 col-xs-6">
									    <input type="text" class="blog-search-field" name="name" placeholder="Your name..." value="" id="name">
									    <span>Enter your name....!</span>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-6">
									    <input type="text" class="blog-search-field" name="email" placeholder="Your email..." value="" id="email">
									    <span>Enter valid Email id....!</span>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
									    <input type="text" class="subject" name="subject" placeholder="Subject..." value="" id="sub">
									    <span>Enter subject...</span>
									</div>
									<div class="col-md-12 col-sm-12">
									    <textarea id="message" class="input" name="comment" placeholder="Comment..."></textarea>
									    <span>Enter Comment...</span>
									</div>

										<div class="col-md-12 col-sm-12">
											<input type="file" name="image" id="image">
											<span>Select Image..</span>
										</div>
										<div class="submit-coment col-md-12">
											<div class="btn-black">
												<button type="submit" name="submit"> Submit</button>
											</div>
										</div>
									</form>		
								</div>
							</div>
							<div class="col-md-4">
								<div class="widget-item">
									<h2>Search here</h2>
									<div class="dec-line"></div>
									<form method="get" id="blog-search" class="blog-search">
										<input type="text" class="blog-search-field" name="s" placeholder="Type keyword..." value="">
									</form>
								</div>
								<div class="widget-item">
									<h2>About Us</h2>
									<div class="dec-line">	
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique earum quod iste, natus quaerat facere a rem dolor sit amet, et placeat nemo.</p>
									<div class="social-icons">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
											<li><a href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="widget-item">
									<h2>Recent Posts</h2>
									<div class="dec-line"></div>
									<ul class="recent-item">
									    <?php 
									    $id=$id+1;
									    $sql2 = "SELECT blog.* ,category.cat , user_register.name FROM blog JOIN category on category.id=blog.category JOIN user_register on blog.author=user_register.id order by image DESC limit $id,3";

									    $res2 = mysqli_query($con, $sql2);
									     // Initialize ID counter
									    while ($data = mysqli_fetch_assoc($res2)) {
									    ?>
									    <li class="recent-post-item">
									        <a href="single_blog.php?id=<?php echo $id++; ?>">
									            <img alt="portfolio" src="admin/image/read/<?php echo $data['image']; ?>">
									            <span class="post-title"><?php echo $data['title']; ?></span>    
									        </a>
									        <span class="post-info">10 Jux	ne 2015</span>
									    </li>
									    <?php 
									       // Increment ID counter
									    } 
									    ?>
								</ul>

								</div>
								<div class="widget-item">
									<h2>From Flickr</h2>
									<div class="dec-line"></div>
									<div class="flickr-feed">
							        	<ul class="flickr-images">
							        	</ul>
							        </div>
								</div>
							</div>
						</div>
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
<script type="text/javascript">
	$('#contact_form').submit(function(){
	

		var name=$('#name').val();
		var email=$('#email').val();
		var e_pat=/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
		var sub=$('#sub').val();
		var message = $('#message').val(); // Corrected ID to match textarea
		var file = $('#image').val();

		// alert(file);

		if(name=='')
		{
			$('#name').next('span').css('display','inline');
			return false;
			// alert('Enter name..!')
		}else{
		    $('#name').next('span').css('display', 'none'); // Hide error span if valid
		}
			if(e_pat.test(email)==false)
			{
				$('#email').next('span').css('display','inline');
				return false;
				// alert('Enter valid Email..!');	
			}else{
			    $('#email').next('span').css('display', 'none'); // Hide error span if valid
			}	
		if(sub=='')
		{
			$('#sub').next('span').css('display','inline');
			return false;
			// alert('Enter subject..!');
		}else {
		    $('#sub').next('span').css('display', 'none'); // Hide error span if valid
		}
		if (message == '') {
		    $('#message').next('span').css('display', 'inline'); // Display error span
		    return false;
		} else {
		    $('#message').next('span').css('display', 'none'); // Hide error span if valid
		}	
		if(file=='') {
		    $('#image').next('span').css('display', 'inline'); // Display error span
		    return false;
		} else {
		    $('#image').next('span').css('display', 'none'); // Hide error span if valid
		}	

	})
</script>