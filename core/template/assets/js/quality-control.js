const managmentCer = document.querySelector(".managment-certificates");
const qualityCer = document.querySelector(".quality-certificates");
const modal = document.getElementById('certificateModal');
const cerModal = new bootstrap.Modal(modal);
function showCertificate(e) {
  let clickItem = e.target;

  if(clickItem.classList.contains("pe-7s-note2")){
    clickItem = e.target.parentElement;
  }

  if(clickItem.classList.contains("certificate")){
    const imageSrc = clickItem.dataset.fileScr;
    const cerName = clickItem.textContent;
    if(imageSrc){
      modal.querySelector(".modal-body").innerHTML = `<img src="${imageSrc}" alt="Certificate Image" class="w-50">`;
      modal.querySelector(".modal-title").textContent = cerName;
    }else{
      modal.querySelector(".modal-body").innerHTML = `<i class="pe-7s-photo" style="font-size:10rem !important;"></i>`;
      modal.querySelector(".modal-title").textContent = cerName;
    }
    cerModal.show();
  }
}

managmentCer.addEventListener("click", showCertificate);
qualityCer.addEventListener("click", showCertificate);