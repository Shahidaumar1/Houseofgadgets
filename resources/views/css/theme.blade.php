/* =========================
   Charcoal · Silver · Black Theme
   ========================= */

/* Core palette */
:root{
  --color-bg:       #0E1113;   /* near-black */
  --color-surface:  #1A1F24;   /* dark charcoal */
  --color-text:     #E6E8EA;   /* off-white */
  --color-muted:    #8B949E;   /* muted grey */
  --color-primary:  #C0C7D1;   /* soft SILVER accent  */
  --color-accent:   #FFCC4D;   /* stars / ratings etc. */
  --color-success:  #3FBF7F;
  --color-danger:   #E45865;
  --ring: 0 0 0 3px color-mix(in srgb, var(--color-primary) 45%, transparent);
}

/* Base */
html,body{ background:var(--color-bg); color:var(--color-text); }
a{ color:var(--color-primary); }
a:hover{ color:color-mix(in srgb, var(--color-primary) 80%, white 20%); }

/* Cards / panels / pills */
.card, .modal-content, .offcanvas, .dropdown-menu,
.badge, .pill, .toast, .list-group-item{
  background:var(--color-surface) !important;
  color:var(--color-text) !important;
  border-color:color-mix(in srgb, var(--color-muted) 55%, transparent) !important;
}

/* Inputs */
input, select, textarea{
  background:var(--color-bg) !important;
  color:var(--color-text) !important;
  border:1px solid color-mix(in srgb, var(--color-muted) 70%, transparent) !important;
}
input::placeholder, textarea::placeholder{ color:color-mix(in srgb, var(--color-muted) 75%, transparent); }
input:focus, select:focus, textarea:focus{
  outline:none; box-shadow:var(--ring); border-color:var(--color-primary) !important;
}

/* Buttons (Bootstrap + custom) */
.btn, button{
  background:var(--color-primary);
  color:#0E1113 !important;          /* on-silver text = near black */
  border:1px solid var(--color-primary);
}
.btn:hover, button:hover{
  background:transparent;
  color:var(--color-primary) !important;
  border-color:var(--color-primary);
}
.btn-outline-primary{
  background:transparent; color:var(--color-primary) !important; border-color:var(--color-primary);
}
.btn-outline-primary:hover{ background:var(--color-primary); color:#0E1113 !important; }

/* Headers / nav strips that were pink */
.header-bottom, .nav-bottom, .menu-strip, .navigation, .site-nav-strip{
  background:var(--color-surface) !important; color:var(--color-text) !important;
  border-bottom:1px solid color-mix(in srgb, var(--color-muted) 55%, transparent);
}

/* HERO + common sections already theme-aware, but ensure any leftover pink turns silver */
.home-banner-sec, .custom-sec6, .custom-sec2, .custom-sec5, .custom-sec8{ color:var(--color-text); }
.carousel-indicators .active{ background:var(--color-primary) !important; }

/* “Review us” pill + stars */
.review-banner-btn{ background:var(--color-surface) !important; color:var(--color-text) !important; border-color:var(--color-text) !important; }
.review-banner-btn:hover{ background:var(--color-primary) !important; color:#0E1113 !important; border-color:var(--color-primary) !important; }
.review-banner-btn .banner-stars i{ color:var(--color-accent) !important; }

/* Select Device box (was pink) -> surface */
.custom-sec1-content{
  background:var(--color-surface) !important; color:var(--color-text) !important;
  border:1px solid color-mix(in srgb, var(--color-muted) 55%, transparent);
}
.custom-sec1-content h4{ color:var(--color-text) !important; }
.custom-sec1-content select, .custom-sec1-content button{
  background:var(--color-bg) !important; color:var(--color-text) !important;
  border:1px solid color-mix(in srgb, var(--color-muted) 70%, transparent) !important;
}

/* Store Repair button text must stay visible on silver */
.sec5-content-box a{ background:var(--color-primary) !important; color:#0E1113 !important; border-color:var(--color-primary) !important; }
.sec5-content-box a:hover{ background:transparent !important; color:var(--color-primary) !important; }

/* Devices & Brands buttons */
.custom-sec2-box a, .custom-sec2-viewAllBtn{
  border-color:var(--color-primary) !important; color:var(--color-primary) !important; background:transparent !important;
}
.custom-sec2-box a:hover, .custom-sec2-viewAllBtn:hover{
  background:var(--color-primary) !important; color:#0E1113 !important; border-color:var(--color-primary) !important;
}

/* Why choose us: icon bubbles use silver */
.custom-sec6 .content-box{ background:var(--color-surface) !important; }
.custom-sec6 .content-box .icon-box{ background:var(--color-primary) !important; }
.custom-sec6 .content-box h5{ color:var(--color-text) !important; }
.custom-sec6 .content-box p{ color:color-mix(in srgb, var(--color-text) 70%, transparent) !important; }

/* Contact form (no white fields) */
.custom-sec8-main{ background:var(--color-surface) !important; }
.custom-sec8-main form button{ background:var(--color-primary) !important; color:#0E1113 !important; border-color:var(--color-primary) !important; }
.custom-sec8-main .location-search-box .input-box button{ background:var(--color-primary) !important; border-color:var(--color-primary) !important; color:#0E1113 !important; }

/* Brand slider captions (if any) should read on dark */
.product_brand_section{ color:var(--color-text) !important; }
