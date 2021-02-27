
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Page top section -->
    <section class="page-top-section set-bg">
        <div class="container">
            <h2> Cari Perkara</h2>
    
    </div>
    </section>
    <!-- Page top section end -->
    <div class="container">
    <hr>
    <div class="row">
    <?php
						
						foreach ($data_content as $row)
						{
						?>
						<div class="col-md-3">
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
    <!-- Footer section -->
    <div class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <div class="about-widget">
                            <img src="<?=base_url('assets/img/logo.png')?>">
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo. Morbi id dictum quam, ut
                                commodo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget">
                        <h2 class="fw-title">Usefull Links</h2>
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
