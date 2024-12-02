<? $data = view::CONTENT('all_active',['IBLOCK_ID'=>'3'])[0];?>

<style>

.custom-img{
	padding-bottom: 50px;
}

.header-img{
    height: 100%;
    width: 100%;
}
@media screen and (max-width: 425px) {
    .header-img {
        content: url('<?=$data['image_m'];?>');
    }
}

</style>

<!-- Begin Main Content Area -->
<main class="main-content">
	<div class="breadcrumb-area breadcrumb-height header-img">
		<img src="<?=$data['image_lt'];?>" alt="About us">
	</div>
	<div class="about-banner different-bg-position section-space-y-axis-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="about-banner-content text-center section-space-bottom-95">
						<div class="section-title">
							<h2 class="about-title mb-5">Company Profile</h2>
							<p class="short-desc mb-0"><?=htmlspecialchars_decode($data["company_profile_".$_GET["lang"]])?></p>
						</div>
					</div>
					<div class="about-banner-img row">
						<div class="col-lg-4">
							<div class="single-img img-hover-effect">
								<img class="img-full rounded-3" src="<?=$data["image_1"]?>" alt="About Banner">
							</div>
						</div>
						<div class="col-lg-4 section-space-top-100 pt-lg-0">
							<div class="single-img img-hover-effect">
								<img class="img-full rounded-3" src="<?=$data["image_3"]?>" alt="About Banner">
							</div>
						</div>
						<div class="col-lg-4 section-space-top-100 pt-lg-0">
							<div class="single-img img-hover-effect">
								<img class="img-full rounded-3" src="<?=$data["image_2"]?>" alt="About Banner">
							</div>
						</div>
					</div>
					<div class="about-banner-content text-center section-space-bottom-95 mt-10">
						<div class="section-title">
							<h2 class="about-title mb-5">Vision&Goals</h2>
							<p class="short-desc mb-0"><?=htmlspecialchars_decode($data["vision_goals_".$_GET["lang"]])?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- Main Content Area End Here -->