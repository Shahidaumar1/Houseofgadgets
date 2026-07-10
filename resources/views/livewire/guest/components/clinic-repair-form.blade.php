@php
use App\Models\SiteSetting;
$setting = SiteSetting::first();
@endphp
<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
       <style>
        .select-store-sec {
            display: block;
            width: 100%;
            float: left;
        }



        .select-store-main small,
        .select-calender-slots small {
            font-size: 18px;
            font-family: 800;
            line-height: 24.59px;
            color: #EA1555;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            display: block;
            text-align: center;
        }

        .select-store-main h2,
        .select-calender-slots h2 {
            font-size: 32px;
            text-align: center;
            line-height: 60px;
            font-weight: 700;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 50px;
            letter-spacing: -0.33px;
        }

        .select-store-main .select-store-inner {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            align-items: center;
            padding: 50px 40px;
            background-color: #fff;
            border-radius: 10px;
            float: left;
            width: 100%;
            box-shadow: 0px 0px 15px 0px rgba(114, 114, 114, 0.25);
        }

        .select-store-main .select-store-inner .select-store-box1 {
            padding-right: 10px;
            border-right: 1px solid rgba(0, 0, 0, 0.12);
           
        }

        .select-store-main .select-store-inner .select-store-box2 {
            padding-left: 10px;
            padding-right: 10px;
            height: 543px;
            overflow-y: scroll;
           
            
          
        }

        .select-store-main .select-store-inner .select-store-box2::-webkit-scrollbar {
            width: 20px;
            border-radius: 15px;
        }

        .select-store-main .select-store-inner .select-store-box2::-webkit-scrollbar-thumb {
            background-color: rgba(234, 21, 85, 1);
            border-radius: 15px;
            width: 22px;
            height: 70px;

        }

        .select-store-main .select-store-inner .select-store-box2::-webkit-scrollbar-track {
            background-color: rgba(217, 217, 217, 1);
            border-radius: 15px;
        }

        .select-store-main .select-store-inner p {
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin-bottom: 0 !important;
            text-align: left;
            font-size: 20px;
            line-height: 27.32px;
            padding-bottom: 25px;
        }

        .select-store-main .select-store-inner .serch-by-postal {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 40px;
        }

        .select-store-main .select-store-inner .serch-by-postal input {
            width: 100%;
            height: 52.01px;
            border: 1px solid rgba(210, 210, 210, 0.87);
            outline: none;
            font-size: 16px;
            line-height: 18.77px;
            font-family: "Manrope", serif;
            padding: 0 15px;
            border-radius: 10px;
            color: #000;
        }

        .select-store-main .select-store-inner .serch-by-postal button {
            height: 52.01px;
            width: 52.01px;
            background-color: #EA1555;
            border: 1px solid #EA1555;
            color: black !important;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
            font-size: 15px;
            font-weight: 700;
        }

        .select-store-main .select-store-inner .map-box {
            height: 460px;
        }

        .select-store-main .select-store-inner .select-store-box2 .branch-select-box {
            box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
        }

        .select-store-main .select-store-inner .select-store-box2 .branch-select-box h4 {
            font-size: 24px;
            line-height: 32.79px;
            font-weight: 700;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin-bottom: 0 !important;
            padding-bottom: 15px;
        }

        .select-store-main .select-store-inner .select-store-box2 .branch-select-box p {
            font-size: 16px;
            line-height: 21.59px;
            color: #000;
            font-weight: 400;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin-bottom: 0 !important;
            padding-bottom: 30px;
        }

        .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box select {
            width: 100%;
            height: 52.01px;
            border: 1px solid rgba(210, 210, 210, 0.87);
            outline: none;
            font-size: 16px;
            line-height: 18.77px;
            font-family: "Manrope", serif;
            padding: 0 15px;
            border-radius: 10px;
            color: #000;
        }

        .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box button {
            height: 52.01px;
            width: 127px;
            background-color: #EA1555;
            border: 1px solid #EA1555;
            color: black !important;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
            font-size: 17px;
            font-weight: 700;
        }



        @media(max-width: 991px) {
            .select-store-main .select-store-inner {
                grid-template-columns: 1fr;
                row-gap: 30px;
                margin-bottom: 50px;
            }

            .select-store-main .select-store-inner .select-store-box2 {
                padding-left: 2;
            }

            .select-store-main .select-store-inner .select-store-box1 {
                border-right: 0px;
            }
        }

        @media(max-width: 768px) {

            .select-store-main .select-store-inner {
                margin-bottom: 40px;
            }

            .select-store-main h2,
            .select-calender-slots h2 {
                font-size: 25px;
                line-height: 32px;
                padding-bottom: 40px;
            }

            .select-store-main .select-store-inner p {
                font-size: 18px;
                line-height: 24.59px;
                padding-bottom: 20px;
            }

            .select-store-main .select-store-inner .map-box {
                height: 300px;
            }

            .select-store-main .select-store-inner .map-box iframe {
                height: 100%;
            }

            .select-store-main .select-store-inner .select-store-box2 .branch-select-box h4 {
                font-size: 17px;
                line-height: 19.79px;
                padding-bottom: 8px;
            }

            .select-store-main .select-store-inner .select-store-box2 .branch-select-box p {
                font-size: 13px;
                line-height: 18.59px;
                padding-bottom: 15px;
            }

            .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box select,
            .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box button {
                height: 41.01px;
                font-size: 14px;
                line-height: 18.77px;
                border-radius: 5px;
            }

            .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box button {
                width: 76px;
            }

            .select-store-main .select-store-inner .select-store-box2::-webkit-scrollbar {
                width: 10px;
                border-radius: 15px;
            }

            .select-store-main .select-store-inner .select-store-box2::-webkit-scrollbar-thumb {
                border-radius: 10px;
                width: 10px;
                height: 60px;
            }

            .select-store-main .select-store-inner .select-store-box2 .branch-select-box {
                padding: 15px;
                margin-bottom: 20px;
            }
        }

        @media(max-width:548px) {
            .select-store-main .select-store-inner {
                padding: 20px 10px 20px 10px !important;
                margin-bottom: 40px;
            }

            .select-store-main .select-store-inner p {
                font-size: 15px;
                line-height: 24.59px;
                padding-bottom: 10px;
            }

            .select-store-main .select-store-inner .serch-by-postal input,
            .select-store-main .select-store-inner .serch-by-postal button {
                height: 46.01px;
                font-size: 14px;
                border-radius: 5px;
            }

            .select-store-main .select-store-inner .serch-by-postal {
                margin-bottom: 20px;
            }

            .select-store-main .select-store-inner .map-box {
                height: 154px;
            }

            .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box select,
            .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box button {
                height: 34.01px;
                font-size: 11px;
            }

            .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box button {
                width: 34px;
            }
        }

        @media(max-width:400px) {
            .select-store-main .select-store-inner {
                padding: 20px 10px 20px 10px !important;
                margin-bottom: 30px;
            }

        }


        /* step 2 css start */
        .select-calender-slots {
            display: block;
            width: 100%;
            float: left;
            margin-bottom: 72px;
        }

        .select-calender-slots-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .select-calender-slots-inner .date-box-inner {
            border-radius: 10px;
            border: 1px solid #EA1555;
        }

        .select-calender-slots-inner .date-box-inner .date-box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid #EA1555;
            height: 70px;
        }

        .select-calender-slots-inner .date-box-inner .date-box-header button {
            width: 30px !important;
            height: 30px;
            border: 1px solid rgba(0, 0, 0, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            border-radius: 50%;
            background-color: #fff;
        }

        .select-calender-slots-inner .date-box-inner .date-box-header button i {
            font-size: 12px;
        }

        .select-calender-slots-inner .date-box-inner .date-box-header span {
            font-family: Manrope;
            font-size: 20px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0.05em;
            color: #000;
        }

        .select-calender-slots-inner .date-box-inner table {
            width: 100%;
            border-collapse: collapse;
            padding: 10px 20px 30px 20px;
        }

        .select-calender-slots-inner .date-box-inner table thead tr th {
            color: #EA1555;
            font-family: Manrope;
            font-size: 18px;
            font-weight: 400;
            line-height: 32px;
            letter-spacing: -0.02em;
            text-align: center;
        }

        .select-calender-slots-inner .date-box-inner table tbody tr td {
            font-family: Manrope;
            font-size: 20px;
            font-weight: 500;
            line-height: 32px;
            letter-spacing: -0.02em;
            text-align: center;
            color: rgba(0, 0, 0, 0.63);
        }

        .select-calender-slots-inner .date-box-inner table tbody tr td.today {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .select-calender-slots-inner .date-box-inner table tbody tr td.selected {
            background-color: #dc3545;
            color: white;
            border-radius: 10px;
        }

        .select-calender-slots-inner .selec-time-box .select-time-inner {
            border-radius: 10px;
            border: 1px solid #EA1555;
        }

        .select-calender-slots-inner .selec-time-box .select-time-inner .time-header-box {
            padding: 10px 20px;
            border-bottom: 1px solid #EA1555;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .select-calender-slots-inner .selec-time-box .select-time-inner .time-header-box span {
            font-family: Manrope;
            font-size: 20px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0.05em;
            color: #000;
        }

        .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now {
            padding: 40px 33px;
            display: flex;
            flex-wrap: wrap;
            gap: 27px;
            justify-content: center;
            height: 304px;
            overflow-y: scroll;
        }

        .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now::-webkit-scrollbar {
            width: 6px;
            border-radius: 5px;
        }

        .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now::-webkit-scrollbar-thumb {
            background-color: #1a1f24 ;
            border-radius: 5px;
            width: 6px;
            height: 50px;

        }

        .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now::-webkit-scrollbar-track {
            background-color: rgba(217, 217, 217, 1);
            border-radius: 5px;
        }

        .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now button {
            width: 86px;
            height: 41px;
            border-radius: 10px;
            background-color: rgba(217, 217, 217, 0.33);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Manrope;
            font-size: 20px;
            font-weight: 400;
            line-height: 32px;
            letter-spacing: -0.02em;

        }

        .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now button.active {
            background-color: #EA1555;
            color: #fff;
            border: 1px solid #EA1555
        }

        .select-calender-slots .selected-date-time {
            font-family: Manrope;
            font-size: 20px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0.05em;
            color: #000;
            text-align: center;
            margin: 0;
        }

        .go-next-btn {
            width: 165px;
            height: 65px;
            border-radius: 5px;
            background-color: rgba(234, 21, 85, 1);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            font-size: 22px;
            line-height: 27px;
            text-decoration: none;
            border: 1px solid rgba(234, 21, 85, 1);
            margin-bottom: 15px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            display: block;
            margin-left: auto;
        }

        @media(max-width:991px) {

            .select-calender-slots-inner .date-box-inner table thead tr th,
            .select-calender-slots-inner .date-box-inner table tbody tr td {
                font-size: 16px;
            }

            .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now {
                padding: 25px 15px;
                gap: 12px;
            }

            .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now button {
                width: 71px;
                height: 35px;
                font-size: 16px;
            }

            .go-next-btn {
                width: 130px;
                height: 60px;
                font-size: 24px;
                line-height: 16px;
            }
        }

        @media(max-width: 768px) {
            .select-calender-slots-inner {
                grid-template-columns: 1fr;
                gap: 30px;
                max-width: 445px;
                margin: 0 auto;
            }

            .select-calender-slots .selected-date-time {
              font-size: 15px;
            }

            .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now {
                padding: 20px 10px;
                gap: 10px;
                height: 240px;
            }

            .select-calender-slots-inner .date-box-inner .date-box-header,
            .select-calender-slots-inner .selec-time-box .select-time-inner .time-header-box {
                padding: 10px 10px;
                height: 50px;
            }

            .select-calender-slots-inner .date-box-inner .date-box-header span,
            .select-calender-slots-inner .selec-time-box .select-time-inner .time-header-box span {
                font-size: 18px;
            }

            .select-calender-slots-inner .date-box-inner table thead tr th,
            .select-calender-slots-inner .date-box-inner table tbody tr td {
                font-size: 14px;
            }

            .select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now button {
                width: 58px;
                height: 31px;
                font-size: 14px;
            }


        }
        /* ================= THEME OVERRIDES (append at very end) ================= */

/* page/section bg */
.select-store-sec{
  background: var(--color-background, #0f0f0f) !important;
}
.cust-container{ /* container stays transparent to show page bg */
  background: transparent !important;
}

/* headings + small labels */
.select-store-main small,
.select-calender-slots small{ color: var(--color-primary, #EA1555) !important; }
.select-store-main h2,
.select-calender-slots h2{ color: var(--color-text, #eaeaea) !important; }

/* main white card */
.select-store-main .select-store-inner{
  background: var(--color-surface, #1a1a1a) !important;
  box-shadow: var(--shadow-sm, 0 2px 16px rgba(0,0,0,.35)) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.12)) !important;
}
.select-store-main .select-store-inner .select-store-box1{
  border-right: 1px solid var(--color-border, rgba(255,255,255,.12)) !important;
}

/* texts */
.select-store-main .select-store-inner p,
.select-store-main .select-store-inner .select-store-box2 .branch-select-box p,
.select-calender-slots .selected-date-time{
  color: var(--color-text, #eaeaea) !important;
}

/* inputs + buttons (postcode, selects, action buttons) */
.select-store-main .serch-by-postal input,
.select-store-main .select-store-box2 .branch-select-box .select-box select{
  background: var(--color-surface, #1a1a1a) !important;
  color: var(--color-text, #eaeaea) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.12)) !important;
}
.select-store-main .serch-by-postal input::placeholder{ color: color-mix(in srgb, var(--color-text), transparent 45%) !important; }

.select-store-main .serch-by-postal button,
.select-store-main .select-store-box2 .branch-select-box .select-box button,
.go-next-btn{
  background: var(--color-primary, #EA1555) !important;
  border-color: var(--color-primary, #EA1555) !important;
  color:black !important;
}
.go-next-btn:hover{
    color:black !important; 
}

/* branch boxes */
.select-store-main .select-store-box2 .branch-select-box{
  background: var(--color-surface, #1a1a1a) !important;
  box-shadow: var(--shadow-sm, 0 1px 6px rgba(0,0,0,.3)) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.12)) !important;
}
.select-store-main .select-store-box2 .branch-select-box h4{
  color: var(--color-text, #eaeaea) !important;
}

/* custom scrollbars to theme */
.select-store-main .select-store-box2::-webkit-scrollbar{ width: 10px; }
.select-store-main .select-store-box2::-webkit-scrollbar-thumb{
  background: var(--color-primary, #1a1f24 ) !important;
  border-radius: 10px;
}
.select-store-main .select-store-box2::-webkit-scrollbar-track{
  background: color-mix(in srgb, var(--color-surface), #999 20%) !important;
}

/* Calendar card borders/headers */
.select-calender-slots-inner .date-box-inner,
.select-calender-slots-inner .selec-time-box .select-time-inner{
  border: 1px solid var(--color-primary, #EA1555) !important;
  background: var(--color-surface, #1a1a1a) !important;
}
.select-calender-slots-inner .date-box-inner .date-box-header,
.select-calender-slots-inner .selec-time-box .select-time-inner .time-header-box{
  border-bottom: 1px solid var(--color-primary, #EA1555) !important;
}

/* calendar header buttons */
.select-calender-slots-inner .date-box-inner .date-box-header button{
  background: var(--color-surface, #1a1a1a) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.18)) !important;
  color: var(--color-text, #eaeaea) !important;
}

/* calendar labels & cells */
.select-calender-slots-inner .date-box-inner .date-box-header span,
.select-calender-slots-inner .date-box-inner table thead tr th{
  color: var(--color-primary, #EA1555) !important;
  background-color:transparent;
}
.select-calender-slots-inner .date-box-inner table tbody tr td{
  color:#C0C7D1 ;
  background-color:transparent;
}
.select-calender-slots-inner .date-box-inner table tbody tr td.today{
  background: color-mix(in srgb, var(--color-primary), var(--color-surface) 85%) !important;
}
.select-calender-slots-inner .date-box-inner table tbody tr td.selected{
  background: var(--color-primary, #EA1555) !important;
  color:#fff !important;
}

/* time slot pills */
.select-calender-slots-inner .slect-slot-now{
  background: var(--color-surface, #1a1a1a) !important;
}
.select-calender-slots-inner .slect-slot-now button{
  background: color-mix(in srgb, var(--color-text), transparent 85%) !important;
  color: var(--color-text, #eaeaea) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.1)) !important;
}
.select-calender-slots-inner .slect-slot-now button.active{
  background: var(--color-primary, #EA1555) !important;
  color:#fff !important;
  border-color: var(--color-primary, #EA1555) !important;
}

/* generic whites from utility classes/inline */
.bg-white{ background: var(--color-surface, #1a1a1a) !important; color: var(--color-text, #eaeaea) !important; }
[style*="background:#fff"], [style*="background: #fff"], [style*="background-color:#fff"], [style*="background-color: #fff"]{
  background: var(--color-surface, #1a1a1a) !important;
}
/* === Adjust Landline dropdown and Next button widths === */
.select-store-main .select-store-box2 .branch-select-box .select-box select {
  flex: 0 0 50%; /* narrower dropdown */
}

.select-store-main .select-store-box2 .branch-select-box .select-box button {
  flex: 0 0 45%; /* wider button */
  width: auto !important;
}
@media (max-width: 576px) {
  .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box {
      flex-direction: column;          /* put elements on top of each other */
      align-items: stretch;
  }

  .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box select,
  .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box button {
      width: 100%;                     /* full width */
      
  }

  .select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box button {
      margin-top: 6px;                 /* little gap under Landline select */
      font-size:23px;
  }
}
@media (max-width: 576px) {
  /* Increase the height and font size of the Landline select button */
  .select-store-main .select-store-box2 .branch-select-box .select-box select,
  .select-store-main .select-store-box2 .branch-select-box .select-box button {
    height: 75px important;  /* Increase height */
    font-size: 18px !important;  /* Increase font size */
  }

  .select-store-main .select-store-box2 .branch-select-box .select-box button {
    margin-top: 6px;
    font-size: 25px;  /* Make font size larger */
  }
}
/* === Transparent Main Box + Primary Border === */
.select-store-main .select-store-inner {
    background: transparent !important;
    border: 1px solid var(--color-primary) !important;
}

/* keep split border consistent with new theme border */
.select-store-main .select-store-inner .select-store-box1 {
    border-right: 1px solid var(--color-primary) !important;
}
.select-store-main .select-store-box2 .branch-select-box{
    background: transparent !important;
    border: 1px solid var(--color-primary) !important;
}
.select-store-main .select-store-inner .select-store-box2 .branch-select-box .select-box select{
     background: transparent !important;
    border: 1px solid var(--color-primary) !important;
}
.select-store-main .select-store-inner .serch-by-postal input{
     background: transparent !important;
    border: 1px solid var(--color-primary) !important;
}
.select-calender-slots-inner .date-box-inner, .select-calender-slots-inner .selec-time-box .select-time-inner{
      background: transparent !important;
    border: 1px solid var(--color-primary) !important;
}
.select-calender-slots-inner .selec-time-box .select-time-inner .slect-slot-now{
       background: transparent !important;
    border: 1px solid var(--color-primary) !important;
}
 html, body {
    background: #000 !important;
    max-width: 100vw !important;
    overflow-x: hidden !important;
  }

  /* make this whole section + container inherit the black background */
  .select-store-sec,
  .cust-container {
    background: #000 !important;
  }

  /* kill any white/light wrappers inside this page */
  .select-store-sec .select-store-inner,
  .select-store-sec .branch-select-box,
  .select-store-sec .date-box-inner,
  .select-store-sec .select-time-inner,
  .select-store-sec .slect-slot-now,
  .select-store-sec .bg-white,
  .select-store-sec [style*="background:#fff"],
  .select-store-sec [style*="background: #fff"],
  .select-store-sec [style*="background-color:#fff"],
  .select-store-sec [style*="background-color: #fff"],
  .select-store-sec [style*="background-color:white"] {
    background: #000 !important;
  }

  /* ✅ mobile safe: no horizontal scroll */
  @media (max-width: 576px) {
    html, body { overflow-x: hidden !important; max-width: 100vw !important; }
    section, .select-store-sec, .cust-container { max-width: 100vw !important; overflow-x: hidden !important; }
  }
    </style>



    <section class="select-store-sec">
        <div class="cust-container">
            <!-- when the page not loaded yet -->
            <div wire:loading wire:target="getLatLong,userMyLocation" class="loading-text">
                Loading, please wait...
                <div class="loader"></div>
            </div>
            <!-- Display branch selection and appointment form -->
            <form x-data="{ step: 0 }" wire:submit.prevent="submitForm">
                <!-- Step 1:-->
                <div class="select-store-main" id="section-1" x-show="step === 0" x-cloak>
                    <small>Store</small>
                    <h2 class="slect-store-heading">Select your Store</h2>
                     <div class="select-store-inner">
                        <div class="select-store-box1">
                            <p>Enter your Post Code to find nearest branch.</p>
                            @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="serch-by-postal">
                                <input type="text" class="form-control" wire:model.defer="postalCode" required
                                    placeholder="Enter Your Post Code">
                                <button type="button" wire:click="getLatLong">Go</button>
                            </div>
                            <div class="map-box">
                                @if (!empty($mapLink))
                                {!! $mapLink !!}
                                @else
                              <!--  <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.5314120972303!2d-0.3695150685233465!3d51.50346595799936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760d4e05cae911%3A0x2dcb4d18fbda3298!2sMobile%20Bitz%20-%20Head%20Office!5e0!3m2!1sen!2s!4v1711523314077!5m2!1sen!2s"
                                    width="100%" height="430px" style="border: 0" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                                    
                                    
                                    
                                    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2360.7310093105407!2d-1.8641569243098324!3d53.723054146471775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bdd9cee7a598f%3A0x40a28265c5c59ff3!2sPhone%20fix%20zone!5e0!3m2!1sen!2s!4v1741087766656!5m2!1sen!2s" width="100%" height="430px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                                    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d76305.0833394575!2d0.6158364730279591!3d51.541351242877575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47d8d9adc6d3209b%3A0xa47765869d76ded5!2s291%20London%20Rd%2C%20Westcliff-on-Sea%2C%20Southend-on-Sea%2C%20Westcliff-on-Sea%20SS0%207BX%2C%20United%20Kingdom!3m2!1d51.5413801!2d0.6982366999999999!5e1!3m2!1sen!2s!4v1758527875625!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                                      @if(!empty($setting->map_link))
    {!! $setting->map_link !!}
@else
    <p style="color: gray;">Map not available</p>
@endif

   
                                @endif
                            </div>
                        </div>
                        <div class="select-store-box2">
    @if (!empty($nearestBranches))
        @foreach ($nearestBranches as $branch)
            <div class="branch-select-box">
                <h4>{{ $branch['name'] }} , <span style="color: {{ !empty($nearestBranches) ? '#da0a0a' : '#d4af37' }};">
                    {{ number_format($branch['distance'] * 0.621371, 2) }} miles
                    </span>
                </h4>
                <p>{{ $branch['address_line_1'] }}, {{ $branch['address_line_2'] ?: '' }}, {{ $branch['town_city'] }}, {{ $branch['post_code'] }}, UK</p>
                <div class="select-box">
                    <select aria-label="Contact Options">
                        @if (!empty($branch['landline_number']))
                            <option value="1" selected>Landline: {{ $branch['landline_number'] }}</option>
                        @endif
                        @if (!empty($branch['mobile_number']))
                            <option value="2">Mobile: {{ $branch['mobile_number'] }}</option>
                        @endif
                        @if (!empty($branch['email']))
                            <option value="3">Email: {{ $branch['email'] }}</option>
                        @endif
                    </select>
                    <button type="button" wire:click="selectBranch({{ $branch['id'] }})" @click="step = 1">Select / Next</button>
                </div> 
            </div>
        @endforeach
    @elseif (!empty($branches))
        @foreach ($branches as $branch)
            <div class="branch-select-box">
                <h4>{{ $branch->name }}</h4>
                <p>{{ $branch->address_line_1 }}, {{ $branch->address_line_2 ?: '' }}, {{ $branch->town_city }}, {{ $branch->post_code }}, UK</p>
                <div class="select-box">
                    <select class="form-select" aria-label="Contact Options" >
                        @if (!empty($branch->email))
                            <option value="3">Email: {{ $branch->email }}</option>
                        @endif
                        @if (!empty($branch->landline_number))
                            <option value="1" selected>Landline: {{ $branch->landline_number }}</option>
                        @endif
                        @if (!empty($branch->mobile_number))
                            <option value="2">Mobile: {{ $branch->mobile_number }}</option>
                        @endif
                    </select>
                    <button type="button" wire:click="selectBranch({{ $branch->id }})" @click="step = 1">Select / Next</button>
                </div> 
            </div>
        @endforeach
    @endif 
</div>
                     </div>
                </div>
                
                 <div class="select-calender-slots" id="section-2" x-show="step === 1" x-cloak >
                    <small>Repair at Store</small>
                    <h2>
                        @switch(session()->get('serviceType'))
                        @case(\App\Helpers\ServiceType::ACCESSORIES)
                        Fix your accessories at my address
                        @break

                        @case(\App\Helpers\ServiceType::BUY)
                        Buy at my address
                        @break

                        @case(\App\Helpers\ServiceType::SELL)
                        Sell at Store
                        @break

                        @case(\App\Helpers\ServiceType::REPAIR)
                        Repair At Store
                        @break

                        @case(\App\Helpers\ServiceType::UNLOCKING)
                        Unlock your device at my address
                        @break

                        @default
                        Fix at my address
                        @endswitch

                    </h2>
                    <div class="select-calender-slots-inner">
                           <div class="select-date-box">
                                  <div class="date-box-inner">
                                    <div class="date-box-header">
                                        <button type="button"  wire:click="previousMonth" class="btn"><i class="fa fa-chevron-left"></i></button>
                                        <span>{{ $this->currentMonth->format('F Y') }}</span>
                                        <button type="button"  wire:click="nextMonth" class="btn"><i class="fa fa-chevron-right"></i></button>
                                      </div>
                                      <table class="table  calendar-table" style="border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <th style="border:none;!important">Mo</th>
                                                <th style="border:none;!important">Tu</th>
                                                <th style="border:none;!important">We</th>
                                                <th style="border:none;!important">Th</th>
                                                <th style="border:none;!important">Fr</th>
                                                <th style="border:none;!important">Sa</th>
                                                <th style="border:none;!important">Su</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($this->calendarDays)
                                            @foreach ($this->calendarDays as $week)
                                            <tr>
                                                @foreach ($week as $day)
                                                <td class="{{ $day['class'] }} border-0"
                                                    wire:click="selectDate('{{ $day['date'] }}')" @if($day['disabled'])
                                                    style="pointer-events: none; opacity: 0.5; ;" @endif>
                                                    {{ $day['day'] }}
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="7">No dates available</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                      </table>
                                  </div>
                                  @error('clinic.appointment_date')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror 
                           </div>
                           @php
                           use Carbon\Carbon;
                           $formattedTime = Carbon::parse($clinic['appointment_time'])->format('g:i A'); // 12-hour format with AM/PM
                           @endphp
                           <div class="selec-time-box">
                                <div class="select-time-inner">
                                    <div class="time-header-box">
                                          <span style="color:#C0C7D1;">Pick a Slot</span>
                                    </div>   
                                    <div class="slect-slot-now">
                                        @foreach ($timeSlots as $timeSlot)
                                        <button type="button"
                                            class="btn  time-slot-btn {{ $clinic['appointment_time'] === $timeSlot ? 'active' : '' }}"
                                            wire:click="$set('clinic.appointment_time', '{{ $timeSlot }}')">
                                            {{ $timeSlot }}
                                        </button>
                                        @endforeach
                                    </div>
                                    @error('clinic.appointment_time')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                           </div>
                    </div>
                    <p class="text-center selected-date-time mt-3 mt-sm-4 mt-lg-5 mb-4" > 
                           <span class="text-danger">Date</span> {{$clinic['appointment_date']}} and <b><span class="text-danger">Time</span> {{$clinic['appointment_time']}}</b>
                    </p>
                     <button type="submit" class="go-next-btn" role="button" x-show="step === 1">Next
                        <i class="fa-solid fa-chevron-right ps-2" style="font-size: 10px;" aria-hidden="true"></i>
                    </button>
                     
                 </div> 
            </form>
        </div>  
    </section>
    <script>
          document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#appointment_date", {
            dateFormat: "Y-m-d",
            minDate: "today"
        });
         });
        
        document.addEventListener('livewire:load', function () {
    Livewire.hook('message.processed', (message, component) => {
        // jab Livewire ne nearestBranches render kiya ho
        const miles = document.querySelectorAll('.branch-select-box h4 span.text-danger');
        miles.forEach(el => {
            el.style.color = '#da0a0a';
        });
    });
});
    </script>
    

</div>
