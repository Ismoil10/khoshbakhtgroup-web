<? $data = view::CONTENT('all_active',['IBLOCK_ID'=>'8'])[0];?>

<?
bot::sendMessageText();
?>

<style>

.header-img{
    height: 100%;
    width: 100%;
}
@media screen and (max-width: 425px) {
    .header-img {
        content: url('<?=$data['image_m'];?>');
    }
}

@media screen and (max-width: 425px) {
    .m-top {
        margin-top: 20px;
    }
}
</style>

<!-- Begin Main Content Area -->
<main class="main-content">
	<div class="breadcrumb-area breadcrumb-height header-img">
		<img src="<?=$data['image_lt'];?>" alt="About us">
	</div>
  <div class="contact-form-area section-space-top-75">
    <div class="container">
      <div class="row">
        <div>
          <div class="contact-form-wrap">
          <form id="contact-form" class="contact-form" action="">
                <h2 class="newsletter-title mb-4">Laissez votre contact</h2>
                <h3 class="newsletter-sub-title text-primary mb-8">Et nous vous appellerons</h3>
              <div class="group-input">
                <div class="form-field m-top me-xl-6">
                  <input type="text" autocomplete="off" name="applicationName" id="con_name" placeholder="Nom*" class="input-field" required>
                </div>
                <div class="form-field m-top me-xl-6">
                  <input type="text" autocomplete="off" name="applicationPhone" id="con_phone" placeholder="Téléphone*" class="input-field" required>
                </div>
                <div class="form-field m-top me-xl-6">
                  <input type="email" autocomplete="off" name="applicationEmail" id="con_email" placeholder="Email*" class="input-field" required>
                </div>
              </div>
              <div class="form-field mt-6">
                <textarea name="applicationMessage" id="con_message" placeholder="Message" class="textarea-field" required></textarea>
              </div>
              <div class="g-recaptcha" data-callback="captchaVerified" data-sitekey="6Le4TecoAAAAAOk3GSNPe_Fri6kwISis9lOdWbll" data-type="image" required></div>
                <br/>
              <div class="button-wrap mt-4">
                <button type="submit" value="submit" id="post_com" formmethod="post" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" name="send_message" disabled>Envoyer</button>
                <p class="form-messege mt-5 mb-0"></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Begin Shipping Area -->
  <div class="shipping-area shipping-style-2 section-space-y-axis-100">
    <div class="container">
      <div class="row shipping-wrap py-5 py-xl-0">
        <h2 class="text-center">Adresse</h2>
        <? foreach (view::CONTENT('all_active',['IBLOCK_ID'=>'8']) as $location):?>
          <div class="col-md-6">
            <div class="card mt-5">
              <div class="card-body ps-5">
                <h4 class="title"><?=$location["location_name_".$_GET["lang"]]?></h4>
                <span class="mb-1 d-block">
                  <i class="fa fa-map-marker"></i>
                  <?=$location["address_".$_GET["lang"]]?>
                </span>
                <span class="mb-1 d-block">
                  <i class="fa fa-phone-square"></i>
                  <?=$location["phone"]?>
                </span>                
              </div>
            </div>
          </div>
        <?endforeach?>
      </div>
    </div>
  </div>
  <!-- Shipping Area End Here -->
</main>
<!-- Main Content Area End Here -->
<script>
  // Verification callback function
  function captchaVerified() {
    var submitBtn = document.getElementById('post_com');
    submitBtn.removeAttribute('disabled');
    submitBtn.style.cursor = 'pointer';
  }
</script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LcJKOcoAAAAAHH6UFHR1vrRM0XujPHhLs6ZhHS_" async defer></script>
