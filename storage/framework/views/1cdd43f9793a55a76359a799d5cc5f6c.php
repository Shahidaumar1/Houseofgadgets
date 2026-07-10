<div>
   <style>
/* sec 7 — THEME-AWARE */
.custom-sec7{
  display:block; width:100%; float:left; padding:0 15px 72px 15px; overflow:hidden;
  background:#000 !important;               /* theme */
  color:var(--color-text);
}

/* overline */
.custom-sec7 small{
  font-size:18px; line-height:24.59px; font-weight:800!important; margin:0!important; text-transform:uppercase;
  font-family:"Manrope",serif; display:block; width:100%; text-align:center;
  color:var(--color-primary);               /* was #EA1555 */
}

/* heading */
.custom-sec7 h3{
  font-size:48px; line-height:62px; letter-spacing:-1.44px; font-weight:700!important;
  padding-bottom:50px; margin:0!important; text-align:center; font-family:"Manrope",serif;
  color:var(--color-text);                  /* was #000 */
}

/* grid */
.custom-sec7-content{ display:grid; gap:31px; grid-template-columns:1fr 1fr; }

/* cards */
.custom-sec7-content .content-box{
  border-radius:10px;
  padding:36px 26px;

  /* updated styles */
  background: transparent !important;
  border: 1px solid var(--color-primary) !important;

  /* remove fill shadow to match image */
  box-shadow: none;
}


/* icon circle */
.custom-sec7-content .content-box .icon-box{
  width:95px; height:95px; border-radius:50%; display:flex; align-items:center; justify-content:center; margin-bottom:30px;
}

/* icon image */
.custom-sec7-content .content-box .icon-box img{ max-width:40px; }

/* card title */
.custom-sec7-content .content-box h5{
  font-size:24px; line-height:24px; letter-spacing:-0.48px; margin:0!important; padding-bottom:17px;
  font-weight:700; font-family:"Manrope",serif; color:var(--color-text);   /* was #000 */
}

/* card text */
.custom-sec7-content .content-box p{
  font-size:18px; letter-spacing:-0.48px; line-height:24px; font-weight:400; margin:0!important; font-family:"Manrope",serif;
  color:color-mix(in srgb, var(--color-text) 70%, var(--color-bg) 30%);    /* replaces rgba(68,68,68,.7) */
}

/* THEME-tinted icon backgrounds (replace hard-coded pastels) */
.custom-sec7-content .bg-light-pink  { background: color-mix(in srgb, var(--color-primary) 18%, transparent); }
.custom-sec7-content .bg-light-blue  { background: color-mix(in srgb, var(--color-accent) 22%, transparent); }
.custom-sec7-content .bg-light-blue2 { background: color-mix(in srgb, var(--color-primary) 20%, var(--color-bg) 80%); }
.custom-sec7-content .bg-light-pink2 { background: color-mix(in srgb, var(--color-accent) 18%, var(--color-bg) 82%); }

/* =================== responsive =================== */
@media(max-width:991px){
  .custom-sec7{ padding:0 15px 50px 15px; }
  .custom-sec7 small{ font-size:16px; line-height:21.86px; padding-bottom:10px; }
  .custom-sec7 h3{ font-size:35px; line-height:30px; padding-bottom:50px; }
  .custom-sec7-content{ gap:15px; }
  .custom-sec7-content .content-box .icon-box{ width:76px; height:76px; margin-bottom:20px; }
  .custom-sec7-content .content-box h5{ font-size:18px; line-height:24px; padding-bottom:10px; }
  .custom-sec7-content .content-box p{ font-size:15px; line-height:20px; }
}

@media(max-width:768px){
  .custom-sec7{ padding:0 15px 40px 15px; }
  .custom-sec7 small{ font-size:15px; line-height:12px; padding-bottom:5px; }
  .custom-sec7 h3{ font-size:20px; line-height:20px; padding-bottom:30px; }
  .custom-sec7-content .content-box{ padding:25px 20px; }
}

@media(max-width:548px){
  .custom-sec7{ padding:0 10px 30px 10px; }
  .custom-sec7-content{ grid-template-columns:1fr; }
  .custom-sec7-content .content-box{ max-width:350px; margin:0 auto; padding:20px 10px; }
  .custom-sec7-content .content-box .icon-box{ width:56px; height:56px; margin:0 auto 15px auto; }
  .custom-sec7-content .content-box .icon-box img{ max-width:30px; }
  .custom-sec7-content .content-box h5{ font-size:15px; line-height:15px; text-align:center; }
  .custom-sec7-content .content-box p{ font-size:16px; line-height:15px; text-align:center; }
}
</style>

    
    
     <!-- section 7 start -->
    <section class="custom-sec7">
        <div class="custom-container">
            <small>Repair Options</small>
            <h3>How would you like us to repair your device?</h3>
            <div class="custom-sec7-content">
                <!-- box 1 -->
                <div class="content-box ">
                    <div class="icon-box bg-light-pink "> <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/RepairOptionsSec/Vector%20(6).png" alt=""></div>
                    <h5>Store Repair   -   Visit Us</h5>
                    <p>Choose store repair to visit our location. Let our experts get your device back to peak
                        condition.</p>
                </div>
                <!-- box2 -->
                <div class="content-box">
                    <div class="icon-box bg-light-blue"> <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/RepairOptionsSec/Vector%20(7).png" alt=""></div>
                    <h5>Collect My Device</h5>
                    <p>We'll collect your device for repair and deliver it back to you once it's done</p>
                </div>
                <!-- box 3 -->
                <div class="content-box">
                    <div class="icon-box  bg-light-blue2"> <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/RepairOptionsSec/uil-sign-left.png" alt=""></div>
                    <h5>Postal Repair</h5>
                    <p>No stores nearby? Simply send your device to us for fast and reliable repair services, wherever
                        you are.</p>
                </div>
                <!-- box 4 -->
                <div class="content-box">
                    <div class="icon-box bg-light-pink2"> <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/RepairOptionsSec/Group%201000004014.png" alt=""></div>
                    <h5>Fix at my Address - Call out repair</h5>
                    <p>Fix at my address – schedule a technician for a call-out repair service to resolve issues on-site
                        quickly and efficiently</p>
                </div>
            </div>

        </div>
    </section>
</div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea\resources\views/frontend/Home_page_sections/repairOptinsSec.blade.php ENDPATH**/ ?>