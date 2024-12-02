<?

$select_brand = db::arr("SELECT * FROM brands_list WHERE ACTIVE = 1");

?>

<!-- Begin Footer Area -->
<div class="footer-area">
	<div class="footer-top section-space-y-axis-100 text-lavender" style="background-color: #18202e;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="widget-item">
						<div class="row">
							<? foreach (view::CONTENT('all_active', ['IBLOCK_ID' => '20']) as $v) : ?>
								<div class="col-xl-3 col-md-3 col-sm-2">
									<ul align="center">
										<li class="m-screen-top">
											<h4><?= $v['country'] ?></h4>
										</li>
										<li>
											<i class="fa fa-map-marker custom-icon" aria-hidden="true"></i><?= $v['adress'] ?>
										</li>
										<li>
											<?= $v['adress_2'] ?>
										</li>
										<li>
											<i class="fa fa-phone-square custom-icon"></i><?= $v['phone_1'] ?>
										</li>
										<li>
											<?= $v['phone_2'] ?>
										</li>
										<li>
											<i class="fa fa-envelope custom-icon" aria-hidden="true"></i><?= $v['email'] ?>
										</li>
										<li>
											<a href="<?= $v['facebook_link'] ?>">
												<i class="fa fa-facebook custom-icon" aria-hidden="true"></i><?= $v['facebook_text'] ?>
											</a>
										</li>
										<li>
											<a href="<?= $v['instagram_link'] ?>">
												<i class="fa fa-instagram custom-icon" aria-hidden="true"></i><?= $v['instagram_text'] ?>
											</a>
										</li>
									</ul>
								</div>
							<? endforeach; ?>
						</div>
						<!--<div class="social-link pt-2">
							<ul>
								<li>
									<a href="https://twitter.com/" data-tippy="Twitter" target="_blank" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								<li>
									<a href="https://telegram.org/" data-tippy="Telegram" target="_blank" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
										<i class="fa fa-telegram"></i>
									</a>
								</li>
								<li>
									<a href="https://facebook.com/" data-tippy="Facebook" target="_blank" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li>
									<a href="https://instagram.com/" data-tippy="Instagram" target="_blank" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
										<i class="fa fa-instagram"></i>
									</a>
								</li>
							</ul>
						</div>-->
					</div>
				</div>
				<!-- <div class="col-lg-2 col-md-4 col-sm-4 pt-8 pt-lg-0">
					<div class="widget-item">
						<h3 class="widget-title mb-5">Quick Links</h3>
						<ul class="widget-list-item">
							<li>
								<i class="fa fa-chevron-right"></i>
								<a href="<?= mdir("main") ?>">Home</a>
							</li>
							<li>
								<i class="fa fa-chevron-right"></i>
								<a href="<?= mdir("about") ?>">About</a>
							</li>
							<li>
								<i class="fa fa-chevron-right"></i>
								<a href="<?= mdir("quality-control") ?>">Quality control</a>
							</li>
							<li>
								<i class="fa fa-chevron-right"></i>
								<a href="<?= mdir("contact") ?>">Contact</a>
							</li>
						</ul>
					</div>
				</div> -->
				<!-- <div class="col-lg-2 col-md-4 col-sm-4 pt-8 pt-lg-0">
					<div class="widget-item">
						<h3 class="widget-title mb-5">Brands</h3>
						<ul class="widget-list-item">
							<? foreach ($select_brand as $v) : ?>
							<? $str = strtolower($v['NAME']); ?>
							<li>
								<i class="fa fa-chevron-right"></i>
								<a href="<?= mdir("catalog/$str/category") ?>"><?= $v['NAME'] ?></a>
							</li>
							<? endforeach; ?>
						</ul>
					</div>
				</div> -->
				<div class="col-lg-4 pt-8 pt-lg-0">
					<!-- <div class="widget-item">
						<h3 class="widget-title mb-5">Store Information.</h3>
					</div>
					<div class="payment-method">
						<a href="javascript:void(0);">
							<img src="assets/images/payment/1.png" alt="Payment Method">
						</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom bg-midnight-express py-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="copyright custom-copyright">
						<span class="copyright-text custom-left">© <?= date("Y") ?> Khoshbakhtgroup Company</span>
						<span class="copyright-text custom-right"><a href="https://evosoft-solutions.com/" target="_blank">Powered by Evosoft Solutions</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.custom-copyright {
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin: auto;
	}

	.custom-icon {
		padding-right: 10px;
	}

	@media screen and (max-width: 425px) {
		.m-screen-top {
			padding-top: 30px;
		}
	}
</style>

<!-- Footer Area End Here -->

<!-- Begin Scroll To Top -->
<a class="scroll-to-top" href="javascrip:void();">
	<i class="fa fa-chevron-up"></i>
</a>
<!-- Scroll To Top End Here -->

</div>

<!-- Global Vendor, plugins JS -->

<!-- JS Files============================================ -->
<!-- Global Vendor, plugins JS -->

<!-- Vendor JS -->
<script src="<?= $template_path ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="<?= $template_path ?>assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="<?= $template_path ?>assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="<?= $template_path ?>assets/js/vendor/modernizr-3.11.2.min.js"></script>

<!--Plugins JS-->
<script src="<?= $template_path ?>assets/js/plugins/wow.min.js"></script>
<script src="<?= $template_path ?>assets/js/plugins/jquery-ui.min.js"></script>
<script src="<?= $template_path ?>assets/js/plugins/swiper-bundle.min.js"></script>
<script src="<?= $template_path ?>assets/js/plugins/jquery.nice-select.js"></script>
<script src="<?= $template_path ?>assets/js/plugins/parallax.min.js"></script>
<script src="<?= $template_path ?>assets/js/plugins/jquery.magnific-popup.min.js"></script>
<script src="<?= $template_path ?>assets/js/plugins/tippy.min.js"></script>
<script src="<?= $template_path ?>assets/js/plugins/ion.rangeSlider.min.js"></script>
<script src="<?= $template_path ?>assets/js/plugins/mailchimp-ajax.js"></script>

<!-- Minify Version -->
<!-- <script src="<?= $template_path ?>assets/js/vendor.min.js"></script> -->
<!-- <script src="<?= $template_path ?>assets/js/plugins.min.js"></script> -->

<!--Main JS (Common Activation Codes)-->
<script src="<?= $template_path ?>assets/js/main.js"></script>
<!-- <script src="<?= $template_path ?>assets/js/main.min.js"></script> -->
<? if ($_GET["page"] == "quality-control") : ?>
	<!-- Custem JS -->
	<script src="<?= $template_path ?>assets/js/quality-control.js"></script>
<? endif ?>
</body>

</html>