<div>
    <?php
    use App\Models\Branch;

    $branches = Branch::all();
    ?>
<?php
use App\Models\SiteSetting;
$setting = SiteSetting::first();
?>

    <style>
    /* Adjusting the map container */
.my-map {
    height: 100%;  /* Ensure it fills the container fully */
    width: 100%;   /* Ensures it's responsive horizontally */
}

/* Additional adjustments for mobile responsiveness */
@media(max-width:576px) {
    .my-map {
        height: 100% !important;  /* Full height for smaller screens */
    }
    #map {
        height: 100% !important;  /* Ensure map container takes full space */
    }
}

/* section 8 — THEME-AWARE */
.custom-sec8{
  width:100%; float:left; display:block; padding:0 15px; margin-bottom:72px;
  background:#000 !important;                 /* theme */
  color:var(--color-text);                    /* theme */
}

/* card wrapper */
.custom-sec8-main{
  padding:50px 23px;
  display:grid; grid-template-columns:1fr 1fr;
  border-radius:15px;

  /* updated styles */
  background: transparent !important;
  border: 1px solid var(--color-primary) !important;

  /* remove shadow to match image */
  box-shadow: none;
}

/* Contact form: make textarea match other fields */
.custom-sec8-main form textarea{
  width:100%;
  min-height:160px;
  border-radius:10px;
  padding:12px 15px;
  background: #000 !important;
  color: var(--color-text);
  border:1px solid color-mix(in srgb, var(--color-muted) 80%, transparent);
  outline:none;
  resize: vertical;
}

/* placeholder color */
.custom-sec8-main form input::placeholder,
.custom-sec8-main form select::placeholder,
.custom-sec8-main form textarea::placeholder{
  color: color-mix(in srgb, var(--color-text) 55%, transparent);
}

/* fix browser autofill white bg */
.custom-sec8-main form input:-webkit-autofill,
.custom-sec8-main form textarea:-webkit-autofill,
.custom-sec8-main form select:-webkit-autofill{
  -webkit-box-shadow: 0 0 0 1000px var(--color-bg) inset !important;
  -webkit-text-fill-color: var(--color-text) !important;
}


/* split line */
.custom-sec8-main .form-box{
  padding:0 28px;
  border-right:1px solid color-mix(in srgb, var(--color-muted) 60%, transparent);
}

/* heading */
.custom-sec8-main h3{
  font-size:48px; line-height:62px; letter-spacing:-1.44px; font-weight:800; margin:0!important;
  font-family:"Manrope",serif;
  color:var(--color-text);                    /* theme */
  padding-bottom:50px;
}

/* form */
.custom-sec8-main form{ display:flex; flex-direction:column; row-gap:20px; }
.custom-sec8-main form .text-danger{ font-size:13px!important; }

/* inputs/selects */
.custom-sec8-main form input,
.custom-sec8-main form select{
  appearance:none; width:100%; height:52.01px; outline:none; font-size:16px; line-height:18.77px;
  font-family:"Manrope",serif; padding:0 15px; border-radius:10px;
  background:#000 !important;                 /* theme */
  color:var(--color-text);                    /* theme */
  border:1px solid color-mix(in srgb, var(--color-muted) 80%, transparent);
}

/* two cols */
.custom-sec8-main form .twoin-onerow{ display:grid; grid-template-columns:1fr 1fr; column-gap:20px; }

/* primary button */
.custom-sec8-main form button{
  width:144px; height:61px; border-radius:10px; display:flex; align-items:center; justify-content:center;
  text-decoration:none; font-weight:600; font-family:"Manrope",sans-serif;
  background:var(--color-primary);            /* theme */
  color:#fff!important; border:1px solid var(--color-primary);
  transition:.25s ease;
}
.custom-sec8-main form button:hover{
  background:transparent; color:var(--color-primary)!important; border-color:var(--color-primary);
}

/* right column */
.custom-sec8-main .location-box{ padding-left:28px; display:flex; flex-direction:column; }
.location-box .my-map{ max-height:317px; height:100%; }

/* text above map */
.custom-sec8-main .location-box p{
  font-size:25px; font-weight:400; line-height:34.15px; font-family:"Manrope",sans-serif; margin:0; padding-bottom:46px;
  color:var(--color-text);                    /* theme */
}

/* postcode row */
.custom-sec8-main .location-box .location-search-box{
  padding-bottom:37px; display:flex; justify-content:space-between; gap:15px; align-items:center;
}
.custom-sec8-main .location-search-box .input-box{ display:flex; gap:15px; }

/* postcode input */
.custom-sec8-main .location-search-box .input-box input{
  width:224px; height:52.01px; border-radius:10px; padding:0 15px; font-size:16px; line-height:18.77px;
  background:#000 !important; color:var(--color-text);
  border:1px solid color-mix(in srgb, var(--color-muted) 80%, transparent);
}

/* GO btn */
.custom-sec8-main .location-search-box .input-box button{
  height:52.01px; width:52.01px; border-radius:10px; display:flex; justify-content:center; align-items:center; text-align:center;
  font-size:15px; font-weight:700;
  background:var(--color-primary); border:1px solid var(--color-primary); color:black!important;
}

/* use my location link */
.custom-sec8-main .location-box .location-search-box a{
  font-weight:400; font-size:18px; text-decoration:underline; cursor:pointer;
  color:var(--color-primary)!important;       /* theme */
}
/* 🔒 Kill horizontal scroll on mobile (no HTML/JS changes) */
@media (max-width: 576px) {
  html, body { overflow-x: hidden; }

  .custom-container,
  .custom-sec8,
  .custom-sec8-main,
  .location-box,
  .my-map,
  #map {
    max-width: 100% !important;
    overflow-x: hidden;
  }

  /* Leaflet container + any child (canvas/tiles) stays within width */
  #map .leaflet-container,
  .leaflet-container {
    width: 100% !important;
    max-width: 100% !important;
  }

  /* Force the embedded Google Maps iframe to be responsive */
  #map iframe {
    display: block;
    width: 100% !important;
    max-width: 100% !important;
    height: auto !important;
    aspect-ratio: 16 / 9; /* keeps proportion on small screens */
    border: 0;
  }
}


/* responsive */
@media(max-width:1024px){
  .custom-sec8-main{ grid-template-columns:1fr; row-gap:40px; }
  .custom-sec8-main .form-box{ border-right:none; }
  .location-box .my-map{ max-height:317px; height:300px; }
}
@media(max-width:991px){
  .custom-sec8{ margin-bottom:50px; }
  .custom-sec8-main h3{ font-size:35px; line-height:40px; padding-bottom:30px; }
  .custom-sec8-main form button{ width:133px; height:48px; border-radius:5px; }
}
@media(max-width:768px){
  .custom-sec8{ margin-bottom:40px; }
  .custom-sec8-main h3{ font-size:20px; line-height:20px; padding-bottom:20px; }
  .custom-sec8-main .location-search-box .input-box input,
  .custom-sec8-main form input,
  .custom-sec8-main form select{ font-size:13px; }
  .custom-sec8-main form button{ width:70px; height:25px; font-size:10px; line-height:13.66px; }
  .custom-sec8-main .form-box, .custom-sec8-main .location-box{ padding:0; }
  .custom-sec8-main .location-box p{ font-size:18px; line-height:24px; padding-bottom:30px; }
  .custom-sec8-main .location-box .location-search-box a{ font-size:14px; }
}
@media(max-width:576px){
  .custom-sec8{ padding:0 13px; margin-bottom:30px; }
  .custom-sec8-main{ padding:25px 13px; row-gap:25px; }
  .custom-sec8-main .location-box .location-search-box{ padding-bottom:18px; flex-direction:column; align-items:start; }
  .custom-sec8-main .location-box p{ font-size:15px; line-height:20px; padding-bottom:18px; }
  .custom-sec8-main .location-search-box .input-box input{ max-width:225px; width:100%; height:48px; border-radius:5px; }
  .custom-sec8-main form .twoin-onerow{ grid-template-columns:1fr; row-gap:15px; }
  .custom-sec8-main form{ gap:15px; }
  .custom-sec8-main form input, .custom-sec8-main .location-search-box .input-box button{ height:48px; border-radius:5px; }
}
</style>

    <!-- form section 8 start  -->
    <div class="custom-sec8">
        <div class="custom-container">

            <div class="custom-sec8-main">
                <!-- form component -->
                <div><?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('guest.user-dashboard.index', [])->html();
} elseif ($_instance->childHasBeenRendered('UY6bcv1')) {
    $componentId = $_instance->getRenderedChildComponentId('UY6bcv1');
    $componentTag = $_instance->getRenderedChildComponentTagName('UY6bcv1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UY6bcv1');
} else {
    $response = \Livewire\Livewire::mount('guest.user-dashboard.index', []);
    $html = $response->html();
    $_instance->logRenderedChild('UY6bcv1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></div>
                <div class="location-box">
                    <p>Enter Postcode to find one of our Locations.</p>
                    <div class="location-search-box">
                        <div class="input-box">
                            <input id="postal-code" type="text" placeholder="Enter Your Postal Code">
                            <button type="button" id="find-branch-by-postcode">Go</button>
                        </div>
                        <a id="use-my-location">
                            <i class="fa-solid fa-location-dot "></i> Use My Location
                        </a>
                    </div>
                    <div id="map" class="my-map">
    <!--<iframe -->
    <!--    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2360.7310093105407!2d-1.8641569243098324!3d53.723054146471775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bdd9cee7a598f%3A0x40a28265c5c59ff3!2sPhone%20fix%20zone!5e0!3m2!1sen!2s!4v1741087766656!5m2!1sen!2s" -->
    <!--    width="100%" -->
    <!--    height="320" -->
    <!--    style="border:0;" -->
    <!--    allowfullscreen="" -->
    <!--    loading="lazy" -->
    <!--    referrerpolicy="no-referrer-when-downgrade">-->
    <!--</iframe>-->
    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d76305.0833394575!2d0.6158364730279591!3d51.541351242877575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47d8d9adc6d3209b%3A0xa47765869d76ded5!2s291%20London%20Rd%2C%20Westcliff-on-Sea%2C%20Southend-on-Sea%2C%20Westcliff-on-Sea%20SS0%207BX%2C%20United%20Kingdom!3m2!1d51.5413801!2d0.6982366999999999!5e1!3m2!1sen!2s!4v1758524192759!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
    <?php if(!empty($setting->map_link)): ?>
    <?php echo $setting->map_link; ?>

<?php else: ?>
    <p style="color: gray;">Map not available</p>
<?php endif; ?>

   

</div>

                    <div   ></div>
                </div>
            </div>
        </div>
    </div>
    <!-- form section 8 end  -->
    <!-- script for form and location-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Initialize Map Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const branches = <?php echo json_encode($branches, 15, 512) ?>;

            // Initialize the map centered on London
            const map = L.map('map'); // Coordinates for London

            // Set up the tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 2000,
                minZoom: 10
            }).addTo(map);

            // Define branch icon
            const defaultIcon = L.icon({
                iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
                iconSize: [30, 42],
                iconAnchor: [15, 42],
                popupAnchor: [0, -40],
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                shadowSize: [41, 41]
            });

            const redIcon = L.icon({
                iconUrl: 'https://icons8.com/icon/85961/map-marker', // Custom red icon
                iconSize: [30, 42],
                iconAnchor: [15, 42],
                popupAnchor: [0, -40],
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                shadowSize: [41, 41]
            });

            let userMarker = null;

            function getDistance(lat1, lng1, lat2, lng2) {
                const R = 6371e3; // Radius of the Earth in meters
                const φ1 = lat1 * Math.PI / 180;
                const φ2 = lat2 * Math.PI / 180;
                const Δφ = (lat2 - lat1) * Math.PI / 180;
                const Δλ = (lng2 - lng1) * Math.PI / 180;

                const a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
                    Math.cos(φ1) * Math.cos(φ2) *
                    Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

                return R * c; // Distance in meters
            }

            async function getCoordinatesFromPostcode(postcode) {
                const response = await fetch(
                    `https://nominatim.openstreetmap.org/search?format=json&q=${postcode}`);
                const data = await response.json();
                if (data.length > 0) {
                    return {
                        lat: parseFloat(data[0].lat),
                        lng: parseFloat(data[0].lon)
                    };
                }
                return null;
            }

            async function getPostalCode(lat, lng) {
                const response = await fetch(
                    `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&addressdetails=1`
                );
                const data = await response.json();
                return data.address.postcode || 'Unknown postal code';
            }

            function findNearestBranch(lat, lng) {
                let nearestBranch = null;
                let minDistance = Infinity;
                let nearestBranchName = '';
                let nearestBranchDistance = 0;

                branches.forEach(branch => {
                    const branchLat = parseFloat(branch.latitude);
                    const branchLng = parseFloat(branch.longitude);

                    if (!isNaN(branchLat) && !isNaN(branchLng)) {
                        const distance = getDistance(lat, lng, branchLat, branchLng);
                        if (distance < minDistance) {
                            minDistance = distance;
                            nearestBranch = branch;
                            nearestBranchName = branch.name;
                            nearestBranchDistance = distance;
                        }
                    }
                });

                return {
                    branch: nearestBranch,
                    name: nearestBranchName,
                    distance: nearestBranchDistance
                };
            }

            // Add markers for all branches
            branches.forEach(branch => {
                const lat = parseFloat(branch.latitude);
                const lng = parseFloat(branch.longitude);

                if (!isNaN(lat) && !isNaN(lng)) {
                    const icon = branch.name === 'Mobilebitz Headoffice' ? redIcon :
                        defaultIcon;
                    const marker = L.marker([lat, lng], {
                        icon
                    }).addTo(map);

                    const popupContent = `
 <div style="text-align: center; font-family: Arial, sans-serif;">
     <strong style="font-size: 16px; color: #333;">${branch.name}</strong><br>
     <img src="${branch.image}" style="width: 100px; height: auto;"><br>
     ${branch.address_line_1} ${branch.address_line_2}<br>
     ${branch.town_city}<br>
     ${branch.post_code}<br>
 </div>
`;

                    marker.bindPopup(popupContent);
                }
            });

            document.getElementById('find-branch-by-postcode').addEventListener('click',
                async function () {
                    const postcode = document.getElementById('postal-code').value.trim();
                    if (postcode) {
                        const coordinates = await getCoordinatesFromPostcode(postcode);
                        if (coordinates) {
                            const {
                                lat,
                                lng
                            } = coordinates;
                            const nearestBranchInfo = findNearestBranch(lat, lng);

                            if (nearestBranchInfo.branch) {
                                if (userMarker) {
                                    map.removeLayer(userMarker);
                                }
                                userMarker = L.marker([lat, lng], {
                                    icon: defaultIcon
                                })
                                    .addTo(map)
                                    .bindPopup(`Your location.<br>Postal Code: ${postcode}`)
                                    .openPopup();

                                map.setView([lat, lng], 13);

                                const nearestBranchLat = parseFloat(nearestBranchInfo.branch
                                    .latitude);
                                const nearestBranchLng = parseFloat(nearestBranchInfo.branch
                                    .longitude);
                                const nearestBranchMarker = L.marker([nearestBranchLat,
                                    nearestBranchLng
                                ], {
                                    icon: defaultIcon
                                }).addTo(map);

                                const distanceKm = (nearestBranchInfo.distance / 1000)
                                    .toFixed(2);
                                nearestBranchMarker.bindPopup(`
         <div style="text-align: center; font-family: Arial, sans-serif;">
             <strong style="font-size: 16px; color: #333;">${nearestBranchInfo.name}</strong><br>
             ${nearestBranchInfo.branch.address_line_1} ${nearestBranchInfo.branch.address_line_2}<br>
             ${nearestBranchInfo.branch.town_city}<br>
             ${nearestBranchInfo.branch.post_code}<br>
             Distance: ${distanceKm} km<br>
         </div>
     `).openPopup();

                                map.setView([nearestBranchLat, nearestBranchLng], 13);
                            } else {
                                alert('No branch found.');
                            }
                        } else {
                            alert('Invalid postal code.');
                        }
                    } else {
                        alert('Please enter a postal code.');
                    }
                });

            document.getElementById('use-my-location').addEventListener('click', function () {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(async function (position) {
                        const userLat = position.coords.latitude;
                        const userLng = position.coords.longitude;

                        const postalCode = await getPostalCode(userLat,
                            userLng);

                        if (userMarker) {
                            map.removeLayer(userMarker);
                        }
                        userMarker = L.marker([userLat, userLng], {
                            icon: defaultIcon
                        })
                            .addTo(map)
                            .bindPopup(
                                `Your location.<br>Postal Code: ${postalCode}`)
                            .openPopup();

                        map.setView([userLat, userLng], 13);

                        const nearestBranchInfo = findNearestBranch(userLat,
                            userLng);
                        if (nearestBranchInfo.branch) {
                            const nearestBranchLat = parseFloat(
                                nearestBranchInfo.branch.latitude);
                            const nearestBranchLng = parseFloat(
                                nearestBranchInfo.branch.longitude);
                            const nearestBranchMarker = L.marker([
                                nearestBranchLat, nearestBranchLng
                            ], {
                                icon: defaultIcon
                            }).addTo(map);

                            const distanceKm = (nearestBranchInfo.distance /
                                1000).toFixed(2);
                            nearestBranchMarker.bindPopup(`
         <div style="text-align: center; font-family: Arial, sans-serif;">
             <strong style="font-size: 16px; color: #333;">${nearestBranchInfo.name}</strong><br>
             ${nearestBranchInfo.branch.address_line_1} ${nearestBranchInfo.branch.address_line_2}<br>
             ${nearestBranchInfo.branch.town_city}<br>
             ${nearestBranchInfo.branch.post_code}<br>
             Distance: ${distanceKm} km<br>
         </div>
     `).openPopup();

                            map.setView([nearestBranchLat, nearestBranchLng],
                                13);
                        } else {
                            alert('No branch found.');
                        }
                    });
                } else {
                    alert('Geolocation is not supported by this browser.');
                }
            });
        });
    </script>

</div><?php /**PATH /home/thephonelab/houseofgadgets.thephonelab.co.uk/resources/views/frontend/Home_page_sections/formAndLocationSec.blade.php ENDPATH**/ ?>