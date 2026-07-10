<div>
  <style>
/* custom-sec3 — THEME-AWARE */
.custom-sec3{
  display:block; float:left; width:100%;
  padding:0 15px 72px 15px; text-align:center;
  background:#000 !important; /* ✅ changed */
}
.custom-container{ max-width:1283px; margin:0 auto; }

/* headings & accent */
.custom-sec3-main small{
  font-size:18px; line-height:24.59px; padding-bottom:22px;
  color: var(--color-primary);
  font-weight:800; font-family:"Manrope",sans-serif;
}
.custom-sec3-main h3{
  font-size:32px; line-height:60px; font-weight:700; margin:0!important; text-align:center;
  color: var(--color-text);
  font-family:"Manrope",sans-serif;
}

.custom-sec3-inner{ padding:50px 0; }

.custom-sec3-inner .custom-sec3-box{
  display:flex;
  padding:72px 15px 77px;
  flex-direction:column;
  align-items:center;
  border-radius:20px;

  /* updated styles */
  background: transparent !important;
  border: 1px solid var(--color-primary) !important;

  /* optional: keep or remove shadow based on taste */
  box-shadow: none;
}

/*  Images fixed to 138×138 and centered */
.custom-sec3-box figure{
  width:148px; height:148px; margin:0 auto 33px;
  display:flex; align-items:center; justify-content:center;
}
.custom-sec3-box figure img{
  width:138px; height:138px; object-fit:contain; display:block;
}

.custom-sec3-box h5{
  font-size:24px; line-height:28px; font-weight:700; max-width:242px; margin:0!important; text-align:center;
  color: var(--color-text);
  font-family:"Manrope",sans-serif;
}

/* See All button uses theme primary */
.custom-sec3-viewAllBtn{
  width:145px; height:65px; font-size:20px; line-height:27.32px;
  text-decoration:none; font-weight:500; display:flex; align-items:center; justify-content:center;
  border-radius:10px; transition:.3s ease; font-family:"Manrope",sans-serif;
  border:1px solid var(--color-primary);
  color: color-mix(in srgb, var(--color-primary) 90%, white 10%) !important;
  background: transparent;
}
.custom-sec3-viewAllBtn:hover{
  background: var(--color-primary);
  border-color: var(--color-primary);
  color: black !important;
}

/* ====== breakpoints ====== */
@media(max-width:991px){
  .custom-sec3{ padding:0 15px 50px; text-align:center; }
  .custom-sec3-main small{ font-size:16px; line-height:20px; padding-bottom:10px; }
  .custom-sec3-main h3{ font-size:24px; line-height:40px; }
  .row.custom-sec3-inner{ margin:0 -7.5px!important; padding:30px 0; }
  .row.custom-sec3-inner .col-md-4{ padding:0 7.5px!important; }
  .custom-sec3-viewAllBtn{ width:132px; height:40px; font-size:16px; line-height:21.86px; border-radius:10px; }
  .custom-sec3-inner .custom-sec3-box{ padding:40px 15px; }
  .custom-sec3-box h5{ font-size:18px; line-height:23px; max-width:181px; }
}
@media(max-width:768px){
  .custom-sec3{ padding:0 15px 40px; }
  .row.custom-sec3-inner{ row-gap:16px; justify-content:center; }
}
@media(max-width:576px){
  .custom-sec3{ padding:0 13px 30px; background-color:black; }
  .custom-sec3-main small{ font-size:14px; line-height:20px; padding-bottom:8px; }
  .custom-sec3-main h3{ font-size:20px; line-height:25px; }
  .custom-sec3-viewAllBtn{ width:130px; height:40px; font-size:15px; line-height:13.66px; border-radius:5px; }
  .custom-sec3-inner .custom-sec3-box{ max-width:293px; margin:0 auto; }
}
  </style>
  
  <!-- custom- sec 3 comprehensive solution section start -->
  <div class="custom-sec3">
    <div class="custom-container">
      <div class="custom-sec3-main">
        <small>We can fix that</small>
        <h3> Comprehensive Solutions for All Your Mobile Needs </h3>
        <div class="row custom-sec3-inner">
          <div class="col-sm-6 col-md-4">
            <div class="custom-sec3-box h-100">
              <figure>
                <img src="https://ik.imagekit.io/8qyy56iye/House%20Of%20gadgets/WhatsApp_Image_2025-09-26_at_12.33.27_AM-removebg-preview%20(1).png?updatedAt=1758878683106" alt="">
              </figure>
              <h5>Mobile Charging Doc Replacement</h5>
            </div>
          </div>
          <!-- 2 -->
          <div class="col-sm-6 col-md-4">
            <div class="custom-sec3-box h-100">
              <figure>
                <img src="https://ik.imagekit.io/8qyy56iye/House%20Of%20gadgets/WhatsApp_Image_2025-09-26_at_12.33.27_AM__1_-removebg-preview.png?updatedAt=1758878683267" alt="">
              </figure>
              <h5>Mobile Battery Replacement</h5>
            </div>
          </div>
          <!-- 3 -->
          <div class="col-sm-6 col-md-4">
            <div class="custom-sec3-box h-100">
              <figure>
                <img src="https://ik.imagekit.io/8qyy56iye/House%20Of%20gadgets/WhatsApp_Image_2025-09-26_at_12.33.27_AM__2_-removebg-preview.png?updatedAt=1758878683075" alt="">
              </figure>
              <h5>Mobile Screen Repair</h5>
            </div>
          </div>
        </div>
        <a class="mx-auto custom-sec3-viewAllBtn" href="/device-types/4">See All</a>
      </div>
    </div>
  </div>
  <!-- custom- sec 3 comprehensive solution section end -->
</div>
<?php /**PATH /home/thephonelab/houseofgadgets.thephonelab.co.uk/resources/views/frontend/Home_page_sections/wecanFix.blade.php ENDPATH**/ ?>