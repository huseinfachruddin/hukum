

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
      

</header>
	<!-- Header section end -->

	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hero-item set-bg" data-setbg="<?=base_url('assets_2/')?>img/slider/1.jpg">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<h2>Science of Law</h2>
							<p>Kami bergerak di bidang pencarian data dalam hal perkara hukum </p>
							
						</div>
					</div>
				</div>
			</div>
			<div class="hero-item set-bg" data-setbg="<?=base_url('assets_2/')?>img/slider/2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<h2>Welcome</h2>
							<p>selamat datang di Website Science of Law</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Blog section -->
	<section class="blog-section spad">
		<div class="container">
			<h1 class="text-light">News</h1>
			<div class="row">
				<div class="col-lg-8 blog-posts">
					<div class="blog-post featured-post">
						<img src="<?=base_url('assets/img/content/').$news['image']?>" alt="">
						<div class="post-date"><?=date('d M Y',$news['date_created'])?></div>
						<h3><?=$news['judul']?></h3>
						<div class="post-metas">
							
							<div class="post-meta">in <a href="#"><?=$news['kategory']?></a></div>
							
						</div>
						
						<a href="<?=base_url('user/single_content/').$news['id']?>" class="site-btn">Read More</a>
					</div>
					<div class="row">
						<?php
						
						foreach ($data_content as $row)
						{
						?>
						<div class="col-md-6">
							<div class="blog-post">
								<div class="overflow-hidden" style="max-height:200px;">
								<img  class="" src="<?=base_url('assets/img/content/').$row->image?>" alt="">
								</div>
								<div class="post-date"><?= date('d M Y',$row->date_created)?></div>
								<h4><?=$row->judul?></h4>
								<div class="post-metas">
									<div class="post-meta">By Admin</div>
									<div class="post-meta">in <a href="#"><?=$row->kategory?></a></div>
									<div class="post-meta">3 Comments</div>
								</div>
								<a href="<?=base_url('user/single_content/').$row->id?>" class="badge badge-info">Read More...</a>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<div class="col-lg-4 sidebar">
					<div class="sb-widget">
						<form class="sb-search">
							<input type="text" placeholder="Search">
						</form>
					</div>
					<div class="sb-widget">
						<h2 class="sb-title">Categories</h2>
						<ul class="sb-cata-list">
						<?php
						$kategory = $this->db->query("SELECT * FROM kategory_content")->result();
						foreach ($kategory as $row)
						{
						?>
							<li><a href=""><?=$row->kategory?><span>20</span></a></li>
						<?php
						}
						?>
						</ul>
					</div>

					<div class="sb-widget">
						<h2 class="sb-title">Latest News</h2>
						<div class="latest-news-widget">
						<?php
						foreach ($data_content as $row)
						{
						?>
							<div class="ln-item">
								<img src="<?=base_url('assets/img/content/').$row->image?>" alt="">
								<div class="ln-text">
									<div class="ln-date"><?=date('D M Y',$row->date_created)?></div>
									<h6><?=$row->judul?></h6>
									<div class="ln-metas">
										<div class="ln-meta">in <a href="#"><?=$row->kategory?></a></div>

									</div>
								</div>
							</div>
							<?php
							}
							?>
						</div>
					</div>
					<div class="sb-widget">
						<a href="#" class="add">
							<img src="<?=base_url('assets_2/')?>img/add-2.jpg" alt="">
						</a>
					</div>
					<div class="sb-widget">
						<h2 class="sb-title">Latest Comments</h2>
						<div class="latest-comments-widget">
							
							<?php
							$kategory = $this->db->query("SELECT * FROM user")->result();
							foreach ($kategory as $row)
							{
							?>
							<div class="lc-item">
								<img src="<?=base_url('assets/img/profil/').$row->image?>" alt="">
								<div class="lc-text">
									<h6><?=$row->name?><span> In </span><a href="">Tren Modus Korupsi 2017 Versi
											ICW</a></h6>
									<div class="lc-date">April 1,2019</div>
								</div>
							</div>
							<?php
							}
							?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->

	<!-- Contact us section -->
	<div class="container-fluid bg-dark">
		<div class="row">
			<div class="col-md-12 mt-5 mb-5" id="form_container">
				<h1 class="text-center text-light mb-3">Contact us</h1>
				<?=$this->session->flashdata('message');?>
				<form method="post" action="<?= base_url('user/message')?>">
					<div class="row">
						<div class="col-sm-5 form-group">
							<label for="message">
								Message:</label>
							<textarea class="form-control" type="textarea" id="message" name="message" maxlength="6000"
								rows="7" required></textarea>
						</div>
					
						<div class="col-sm-6 form-group">
							<label for="name">
								Your Name:</label>
							<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']?>" required>
						
							<label for="email">
								Email:</label>
							<input type="email" class="form-control" id="email" name="email" value="<?= $user['email']?>" required>
						</div>
					</div>

					<div class="row">
						<div class="">
						<button type="submit" class="btn btn-info float-right">Send</button>
						</div>
					</div>

				</form>
				<div id="success_message" style="width:100%; height:100%; display:none; ">
					<h3>Posted your message successfully!</h3>
				</div>
				<div id="error_message" style="width:100%; height:100%; display:none; ">
					<h3>Error</h3>
					Sorry there was an error sending your form.

				</div>
			</div>
		</div>
	</div>
	<!-- Contatc us end -->

	<!-- Footer section -->
	<div class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="footer-widget">
						<div class="about-widget">
							<img src="<?=base_url('assets/img/logo.png');?>" alt="LOGO">
							<p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
								aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo. Morbi id dictum quam, ut
								commodo.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-sm-6">
					<div class="footer-widget">
						<h2 class="fw-title">Usfull Links</h2>
						<ul>
							<li><a href="">Regionals</a></li>
							<li><a href="">Testimonials</a></li>
							<li><a href="">Reviews</a></li>
							<li><a href="">Latest news</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-sm-6">
					<div class="footer-widget">
						<h2 class="fw-title">Services</h2>
						<ul>
							<li><a href="">About us</a></li>
							<li><a href="">Services</a></li>
							<li><a href="">Become a writer</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">FAQ</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-sm-6">
					<div class="footer-widget">
						<h2 class="fw-title">Careeres</h2>
						<ul>
							<li><a href="">Donate</a></li>
							<li><a href="">Services</a></li>
							<li><a href="">Subscriptions</a></li>
							<li><a href="">Careers</a></li>
							<li><a href="">Our team</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget fw-latest-post">
						<h2 class="fw-title">Usefull Links</h2>
						<div class="latest-news-widget">
							<div class="ln-item">
								<div class="ln-text">
									<div class="ln-date">April 1, 2019</div>
									<h6>Tindak Pidana Pajak</h6>
									<div class="ln-metas">
										<div class="ln-meta">By Admin</div>
										<div class="ln-meta">in <a href="#">Trending</a></div>
										<div class="ln-meta">3 Comments</div>
									</div>
								</div>
							</div>
							<div class="ln-item">
								<div class="ln-text">
									<div class="ln-date">April 1, 2019</div>
									<h6>Tindak Pidana Pajak</h6>
									<div class="ln-metas">
										<div class="ln-meta">By Admin</div>
										<div class="ln-meta">in <a href="#">Trending</a></div>
										<div class="ln-meta">3 Comments</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright"><a href="">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This is made <i class="fa fa-heart" aria-hidden="true"></i> by
						<a href="#" target="_blank">AmikomJogja</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="#"><i class="fab fa-instagram"></i><span>instagram</span></a>
					<a href="#"><i class="fab fa-pinterest"></i><span>pinterest</span></a>
					<a href="#"><i class="fab fa-facebook"></i><span>facebook</span></a>
					<a href="#"><i class="fab fa-twitter"></i><span>twitter</span></a>
					<a href="#"><i class="fab fa-youtube"></i><span>youtube</span></a>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer section end -->
