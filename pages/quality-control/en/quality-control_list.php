<?
$main_text = view::CONTENT('all_active',['IBLOCK_ID'=>'4'])[0];
$secondary_text = view::CONTENT('all_active',['IBLOCK_ID'=>'5'])[0];
$managment_cer = view::CONTENT('all_active',['IBLOCK_ID'=>'6']);
$quality_cer = view::CONTENT("all_active",["IBLOCK_ID"=>"7"]);
$quality_img = view::CONTENT("all_active",["IBLOCK_ID"=>"19"])[0];
?>
<style>

.header-img{
    height: 100%;
    width: 100%;
}
@media screen and (max-width: 425px) {
    .header-img {
        content: url('<?=$quality_img['image_m'];?>');
    }
}

</style>

<!-- Begin Main Content Area -->
<main class="main-content">
	<div class="breadcrumb-area breadcrumb-height header-img">
		<img src="<?=$quality_img['image_lt'];?>" alt="About us">
	</div>
  <div class="about-banner different-bg-position section-space-y-axis-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <h2 class="about-title mb-5 text-center">Certificates</h2>
          <div class="card border-0">
            <div class="card-body row">
              <div class="col-md-6">  
                <p class="short-desc mb-0"><?=$main_text["part_1_".$_GET["lang"]]?></p>
                <div class="single-img img-hover-effect mb-3">
                  <img class="img-full" src="<?=$main_text['image_1'];?>" alt="About Banner">
                </div>
              </div>
              <div class="col-md-6">
                <div class="single-img img-hover-effect mb-10">
                  <img class="img-full" src="<?=$main_text['image_2'];?>" alt="About Banner">
                </div>
                <p class="short-desc mb-0"><?=$main_text["part_2_".$_GET["lang"]]?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 mt-10 row">
          <div class="col-md-6">
            <div class="card border-0">
              <div class="card-header bg-light">Management Certificate:</div>
              <div class="card-body row managment-certificates">
                <? foreach (view::CONTENT('all_active',['IBLOCK_ID'=>'6']) as $v1):?>
                  <div class="col-sm-4 mb-1"><a href="javascript:void(0);" class="ps-5 certificate" data-file-scr="<?=$v1["file"]?>"><i class="pe-7s-note2"></i> <?=$v1["name_".$_GET['lang']]?></a></div>
                <?endforeach?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card border-0">
              <div class="card-header bg-light">Quality Certificate:</div>
              <div class="card-body row quality-certificates">
              <? foreach (view::CONTENT('all_active',['IBLOCK_ID'=>'7']) as $v2):?>
                  <div class="col-sm-4 mb-1"><a href="javascript:void(0);" class="ps-5 certificate" data-file-scr="<?=$v2["file"]?>"><i class="pe-7s-note2"></i> <?=$v2["name_".$_GET['lang']]?></a></div>
                <?endforeach?>
              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-12 mt-10">
          <div class="about-banner-content text-center section-space-bottom-95">
            <div class="section-title">
              <h2 class="about-title mb-5">Quality Control</h2>
              <p class="short-desc mb-0"><?=$secondary_text["text_".$_GET["lang"]]?></p>
            </div>
          </div>
          <div class="frequently-area row">
            <div class="col-lg-12">
              <div class="frequently-item">
                <ul>
                  <li class="has-sub active">
                    <a href="javascript:void(0)">Incoming Quality Control
                      <i class="pe-7s-angle-down"></i>
                    </a>
                    <ul class="frequently-body">
                      <li>
                        <?=$secondary_text["incoming_".$_GET["lang"]]?>
                      </li>
                    </ul>
                  </li>
                  <li class="has-sub">
                    <a href="javascript:void(0)">In-process Quality Control
                      <i class="pe-7s-angle-down"></i>
                    </a>
                    <ul class="frequently-body">
                      <li>
                        <?=$secondary_text["in_process_".$_GET["lang"]]?>
                      </li>
                    </ul>
                  </li>
                  <li class="has-sub">
                    <a href="javascript:void(0)">Outgoing Quality Control
                      <i class="pe-7s-angle-down"></i>
                    </a>
                    <ul class="frequently-body">
                      <li>
                        <?=$secondary_text["outgoing_".$_GET["lang"]]?>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- Main Content Area End Here -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="certificateModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
      </div>
    </div>
  </div>
</div>