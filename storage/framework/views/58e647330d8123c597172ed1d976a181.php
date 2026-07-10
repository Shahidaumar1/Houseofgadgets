<div>
        <style>
/* custom-sec5 — THEME-AWARE */
.custom-sec5{
  display:block; float:left; width:100%;
  padding:0 0 0 15px; margin-bottom:72px; position:relative;

  /* updated styles */
  background: #000 !important;
  border: 1px solid var(--color-primary) !important;

  height:600px;

  /* optional: remove shadow to match image */
  box-shadow: none;
}


.custom-sec5 .custom-container{ max-width:1383px; margin:0 auto; height:100%; }
.custom-sec5-inner{ height:100%; }

.sec5-content-box2 img{ height:600px; }

.sec5-content-box{ max-width:866px; width:66%; }
.sec5-content-box2{ position:absolute; right:0; top:0; width:34%; }

.sec5-content-box{
  display:grid; grid-template-columns:1fr 1.5fr; gap:50px; align-items:center; height:100%;
}

.sec5-content-box h3{
  font-size:52px; line-height:60px; font-weight:700;
  color: var(--color-text);                         /* was #000 */
  font-family:"Manrope",sans-serif; margin:0!important; letter-spacing:-1.56px;
}


.sec5-content-box p{
  font-size:30px; line-height:62px; font-weight:400;
  color: color-mix(in srgb, var(--color-text) 85%, transparent); /* softer text */
  font-family:"Manrope",sans-serif; margin:0!important; letter-spacing:-0.9px; padding-bottom:45px;
}

/* Button uses theme primary */
.sec5-content-box a{
  width:193px; height:65px; border-radius:10px; display:flex; align-items:center; justify-content:center;
  background: var(--color-primary);                /* was #EA1555 */
  color: color-mix(in srgb, white 95%, var(--color-primary) 5%) !important;
  text-decoration:none; font-size:20px; line-height:27.32px; font-weight:600;
  font-family:"Manrope",sans-serif; border:1px solid var(--color-primary);
  transition:.2s ease;
}
.sec5-content-box a:hover{
  background: transparent;
  color: var(--color-primary) !important;
  border-color: var(--color-primary);
}
/* Button text = site background color */
.sec5-content-box a{
  color: var(--color-bg) !important;   /* force text same as background */
}

/* icon/span inside link bhi same color lein */
.sec5-content-box a *{
  color: inherit !important;
}


/* ===== breakpoints (heights kept) ===== */
@media(max-width:1280px){
  .custom-sec5{ height:450px; }
  .sec5-content-box2 img{ height:450px; }
  .sec5-content-box p{ font-size:20px; line-height:45px; padding-bottom:30px; }
}

@media(max-width:1024px){
  .custom-sec5{ height:350px; }
  .sec5-content-box2 img{ height:350px; }
}

@media(max-width:991px){
  .custom-sec5{ margin-bottom:50px; height:320px; }
  .sec5-content-box2 img{ height:320px; }
  .sec5-content-box h3{ font-size:35px; line-height:40px; padding-bottom:10px; }
  .sec5-content-box a{ width:133px; height:48px; border-radius:5px; }
  .sec5-content-box p{ padding-bottom:30px; font-size:15px; line-height:20px; }
  .sec5-content-box{ gap:30px; }
}

@media(max-width:768px){
  .custom-sec5{ height:250px; margin-bottom:40px; }
  .sec5-content-box2 img{ height:250px; }
  .sec5-content-box h3{ font-size:20px; line-height:20px; padding-bottom:10px; }
  .sec5-content-box p{ padding-bottom:20px; font-size:15px; line-height:18px; }
  .sec5-content-box a{ width:120px; height:40px; font-size:14px; line-height:13.66px; border-radius:5px; }
}

@media(max-width:576px){
  .custom-sec5{ padding:0 13px; }
  .sec5-content-box{ gap:15px; max-width:866px; width:100%; grid-template-columns:1fr 1.2fr; }
  .sec5-content-box2{ display:none; }
  .sec5-content-box img{ height:210px; }
}

@media(max-width:400px){
  .sec5-content-box{ grid-template-columns:1fr 1.2fr; }
  .sec5-content-box img{ height:230px; padding:0; }
}

</style>
 
    <!-- custom 5  section html start-->
    <div class="custom-sec5 float-left w-100 d-block">
        <div class="custom-container">
            <div class="custom-sec5-inner">
                <div class="sec5-content-box">
                     <figure>
                       <img src="https://ik.imagekit.io/xw77qbzn7/Social_media_Google/1-removebg-preview.png?updatedAt=1761634098917" class="img-fluid">
                    </figure> 
                    <div class="content-box-inner">
                        <h3>Store Repair</h3>
                        <p>Most repairs are done while you wait</p>
                        <a href="<?php echo e(route('categories')); ?>">Book Repair</a>
                    </div>
                </div>
                <div class="sec5-content-box2">
                    <figure class="position-relative">
                        <img src="https://ik.imagekit.io/xqgt2nqdn/side%20picture%20of%20website%20%20(2).png" alt="" class="img-fluid ms-auto d-block">
                    </figure>
                </div>
            </div>

        </div>
    </div>

</div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea\resources\views/frontend/Home_page_sections/storeRepair.blade.php ENDPATH**/ ?>