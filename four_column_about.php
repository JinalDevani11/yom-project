<?php
	 include 'header_yom.php'; 
  include 'db.php';
 $limit = 4;

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start = ($page - 1) * $limit;
$sql_page = "SELECT * FROM blog LIMIT $start, $limit";
$sql1 = "SELECT * FROM blog";

$total_rec = mysqli_query($con, $sql1);
$total_r = mysqli_num_rows($total_rec);
$total_page = ceil($total_r/$limit);
$res_page = mysqli_query($con, $sql_page);

if (isset($_GET['id'])) 
{
	$id=$_GET['id'];
	$sql="SELECT * FROM  blog Where category=$id";
	$res=mysqli_query($con,$sql);
	
}

	$sql="SELECT blog.*, category.cat, user_register.name 
      FROM blog 
      JOIN category ON category.id=blog.category 
      JOIN user_register ON blog.author=user_register.id 
      ORDER BY blog.id  DESC
      LIMIT $start,$limit";
	$res=mysqli_query($con,$sql);

	$cat="select * from category";
  	$c_res=mysqli_query($con,$cat);

 
?>
	<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Latest Photos</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>

				<section class="portfolio on-portfolio">
					<div class="container">
						<div class="col-sm-12 text-center">
							<div id="projects-filter">
								<a href="#" data-filter="*" class="active">Show All</a>
								<?php while($row = mysqli_fetch_assoc($c_res)) { ?>
								<a href="#" data-filter=".a<?php echo $row['id']; ?>"><?php echo $row['cat']; ?></a>
							<?php } ?>
								
							</div>
						</div>

						<div class="row">
							<div class="row" id="portfolio-grid">
								<?php $id=0; while($row = mysqli_fetch_assoc($res)) {  ?>
								<div class="item col-md-3 col-sm-6 col-xs-12 a<?php echo $row['category']; ?>">
									<a href="single_blog.php?id=<?php echo $id++ ;?>">
								  		<figure>
				        					<img alt="1-image" src="admin/image/read/<?php echo $row['image']; ?>">
				        					<figcaption>
				            					<h3><?php echo $row['title']; ?></h3>
				            					<p><?php echo $row['des']; ?></p>
				        					</figcaption>
				    					</figure>
			    					</a>	
							    </div>
							<?php } ?>
							</div>
													
							<div class="col-md-12">
							<div class="portfolio-page-nav text-center">
				       			 <ul class="">
					            <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
					                <a class="page-link" href="four_column_about.php?page=<?php echo ($page - 1); ?>">Previous</a>
					            </li>
					            <?php 
					            for($i = 1; $i <= $total_page; $i++) {
					                echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='four_column_about.php?page=$i'>$i</a></li> ";
					            }
					            ?>
					            <li class="page-item <?php echo ($page == $total_page) ? 'disabled' : ''; ?>">
					                <a class="page-link" href="four_column_about.php?page=<?php echo ($page + 1); ?>">Next</a>
					            </li>
				        		</ul>
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

<!-- Mirrored from torchtemplates.net/html/miller/work-3columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jun 2015 08:34:38 GMT -->
</html>