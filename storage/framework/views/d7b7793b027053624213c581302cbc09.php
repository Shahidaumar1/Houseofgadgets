<div>
     <style>
/* THEME-AWARE custom-sec6 */
.custom-container{max-width:1283px;margin:0 auto;}
.custom-sec6{display:block;width:100%;float:left;padding:0 15px 72px;overflow:hidden;  background:#000 !important; /* ✅ changed */}

.custom-sec6-content small{
  font-size:18px;line-height:24.59px;font-weight:800!important;
  color:var(--color-primary);                      /* was #EA1555 */
  text-transform:uppercase;margin:0!important;padding-bottom:32px;
  font-family:"Manrope",serif;
}
.custom-sec6-content h3{
  font-size:48px;line-height:62px;letter-spacing:-1.44px;font-weight:700!important;
  color:var(--color-text);                         /* was #000 */
  margin:0!important;padding-bottom:50px;font-family:"Manrope",serif;
}
/* icon circle stays theme primary */
.custom-sec6 .content-box .icon-box{
  background: var(--color-primary);
}

/* icons ko bg-jaisa dark bana do */
.custom-sec6 .content-box .icon-box img{
  width: 40px;
  height: 40px;
  filter: brightness(0) saturate(100%); /* pure black/dark */
  opacity: 0.95; /* thoda smooth */
}


/* cards/rows */
.custom-sec6-content .content-box{
  display:flex;
  gap:21px;
  align-items:center;
  margin-bottom:36.14px;

  /* updated styles */
  background: transparent !important;
  border: 1px solid var(--color-primary) !important;

  border-radius:12px;
  padding:12px 16px;

  /* remove surface shadow to match image */
  box-shadow: none;
}


/* icon bubble uses primary */
.custom-sec6-content .content-box .icon-box{
  width:70px;height:70px;border-radius:50%;
  background:var(--color-primary);                 /* was #EA1555 */
  display:flex;align-items:center;justify-content:center;
}
.custom-sec6-content .content-box .icon-box img{max-width:40px;}

/* text */
.custom-sec6-content .content-box h5{
  font-size:24px;line-height:24px;letter-spacing:-0.48px;margin:0!important;font-weight:700;
  color:var(--color-text);                         /* was #000 */
  font-family:"Manrope",serif;padding-bottom:5px;
}
.custom-sec6-content .content-box p{
  font-size:18px;line-height:24px;letter-spacing:-0.48px;margin:0!important;max-width:367px;
  color:color-mix(in srgb, var(--color-text) 70%, transparent); /* replaces rgba(68,68,68,.7) */
  font-weight:400;font-family:"Manrope",serif;
}

/* ====== breakpoints ====== */
@media(max-width:991px){
  .custom-sec6{padding:0 15px 50px;}
  .custom-sec6-content small{font-size:16px;line-height:21.86px;padding-bottom:10px;text-align:center;width:100%;display:block;}
  .custom-sec6-content h3{font-size:35px;line-height:30px;padding-bottom:50px;text-align:center;}
  .custom-sec6-content .content-box-main{display:flex;gap:10px;justify-content:center;}
  .custom-sec6-content .content-box{flex-direction:column;justify-content:center;align-items:center;text-align:center;}
  .custom-sec6-content .content-box h5{font-size:18px;line-height:24px;padding-bottom:0;}
  .custom-sec6-content .content-box p{font-size:15px;line-height:20px;max-width:253px;margin:0 auto;}
}
@media(max-width:768px){
  .custom-sec6{padding:0 15px 40px;}
  .custom-sec6-content small{font-size:10px;line-height:12px;padding-bottom:5px;}
  .custom-sec6-content h3{font-size:20px;line-height:20px;padding-bottom:30px;text-align:center;}
  .custom-sec6-content .content-box-main{justify-content:space-around;gap:0;flex-wrap:wrap;margin:0 -15px;}
  .custom-sec6-content .content-box{padding:0 15px;flex:0 0 50%;}
}
@media(max-width:548px){
  .custom-sec6{padding:0 10px 30px;}
  .custom-sec6-content .content-box-main{margin:0 -5px;}
  .custom-sec6-content .content-box{padding:0 5px;gap:11px;}
  .custom-sec6-content .content-box h5{font-size:15px;line-height:15px;}
  .custom-sec6-content .content-box p{font-size:10px;line-height:12px;max-width:183px;}
  .custom-sec6-content .content-box .icon-box{width:56px;height:56px;}
}
</style>
<style>
/* ========= MOBILE ENHANCE (append after your current CSS) ========= */

/* make the left image fully responsive */
.custom-sec6-main img{
  max-width: 100%;
  height: auto;
  display: block;
}

/* tablet: give the text some breathing room */
@media (max-width: 991px){
  .custom-sec6 .custom-sec6-main{
    row-gap: 24px;
  }
  .custom-sec6-content .content-box-main{
    flex-wrap: wrap;
    justify-content: center;
    gap: 16px;
  }
  .custom-sec6-content .content-box{
    flex: 0 1 48%;
    min-width: 260px;
  }
}

/* mobile: single-column, bigger tap targets, readable text */
@media (max-width: 576px){
  /* stack columns: image on top, text below (you already set order, just spacing) */
  .custom-sec6{ padding: 0 12px 28px; }

  .custom-sec6-content small{
    font-size: 12px;
    line-height: 16px;
    letter-spacing: .2px;
    display:block;
    text-align:center;
    padding-bottom: 6px;
  }

  .custom-sec6-content h3{
    font-size: 22px;
    line-height: 28px;
    padding-bottom: 18px;
    text-align:center;
  }

  /* cards: full width, comfy */
  .custom-sec6-content .content-box-main{
    display: grid !important;
    grid-template-columns: 1fr;
    gap: 12px;
    margin: 0;
  }
  .custom-sec6-content .content-box{
    flex: 1 1 100% !important;
    padding: 12px !important;
    gap: 12px !important;
    text-align: left;              /* keeps icon + text inline */
  }

  /* icon size trimmed for mobile */
  .custom-sec6-content .content-box .icon-box{
    width: 52px;
    height: 52px;
    min-width: 52px;
  }
  .custom-sec6-content .content-box .icon-box img{
    max-width: 28px;
    width: 28px;
    height: 28px;
  }

  /* text sizing */
  .custom-sec6-content .content-box h5{
    font-size: 16px;
    line-height: 20px;
    padding-bottom: 2px;
  }
  .custom-sec6-content .content-box p{
    font-size: 13px;
    line-height: 20px;
    max-width: unset;              /* remove cap so it can wrap naturally */
  }
}

/* very small phones: tighten spacing a bit more */
@media (max-width: 380px){
  .custom-sec6-content .content-box{
    padding: 10px;
    gap: 10px;
    border-radius: 10px;
  }
  .custom-sec6-content .content-box h5{ font-size: 15px; }
  .custom-sec6-content .content-box p{ font-size: 14px; }
  .custom-sec6-content .content-box .icon-box{
    width: 48px; height: 48px; min-width: 48px;
  }
  .custom-sec6-content .content-box .icon-box img{
    width: 26px; height: 26px;
  }
}
</style>


      <section class="custom-sec6">
        <div class="custom-container">
            <div class="row custom-sec6-main justify-content-center align-items-center">
                <div class="col-lg-6 order-1 order-lg-0">
                    <img src="https://ik.imagekit.io/xw77qbzn7/House%20of%20gadgets%20/choose.webp?updatedAt=1759741972378">
                </div>
                <div class="col-lg-6 custom-sec6-content order-0 order-lg-1 pb-3 pb-lg-0">
                    <div class="ps-xl-5">
                        <small>WHY CHOOSE US</small>
                        <h3>Choose us today.</h3>
                        <div class="content-box-main">
                            <!-- box 1 -->
                            <div class="content-box">
                                <div class="icon-box"><img src="https://ik.imagekit.io/myfirstKit/irepairLondon/whyChooseUs/Frame%20(1).png" alt="icon"></div>
                                <div>
                                    <h5>Fast Working Process</h5>
                                    <p>Streamlined and efficient workflow for faster results.</p>
                                </div>
                            </div>
                            <!-- box 2 -->
                            <div class="content-box">
                                <div class="icon-box"><img src="https://ik.imagekit.io/myfirstKit/irepairLondon/whyChooseUs/Vector%20(5).png?updatedAt=1731257143609" alt="icon"></div>
                                <div>
                                    <h5>Warranty</h5>
                                    <p>Comprehensive warranty coverage for all Mobilebitz products.</p>
                                </div>
                            </div>
                            <!-- box 3 -->
                            <div class="content-box">
                                <div class="icon-box"><img src="https://ik.imagekit.io/myfirstKit/irepairLondon/whyChooseUs/Group.png?updatedAt=1731257143618" alt="icon"></div>
                                <div>
                                    <h5>24/7 Hours Support</h5>
                                    <p>Round-the-clock 24/7 customer support service available.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea\resources\views/frontend/Home_page_sections/whyWeChoose.blade.php ENDPATH**/ ?>