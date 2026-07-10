{{--   <div>
  <style>
/* custom-sec1 — THEME-AWARE */
.custom-sec1{ transform: translateY(-100px); padding:0 15px; float:left; }

/* primary box */
.custom-sec1-content{
  max-width:1128px; border-radius:20px; background:var(--color-primary);
  padding:35px 15px 42px; display:block; margin:0 auto;
  box-shadow:0 0 4px 0 color-mix(in srgb, var(--color-text) 20%, transparent);
}
.custom-sec1-inner{ max-width:770px; margin:0 auto; }
.custom-sec1-inner h4{
  font-size:24px; line-height:30px; margin:0!important; padding-bottom:29px;
  font-family:"Manrope",serif; font-style:normal; color:#111; /* stronger on grey */
}

/* Text inside the silver box should use site bg */
.custom-sec1{ --color-primary:#D9DDE1; }
.custom-sec1-content, .custom-sec1-content h4, .custom-sec1-content p,
.custom-sec1-content span, .custom-sec1-content .label{ color:var(--color-bg)!important; }

/* ===== Inputs + layout ===== */

/* ⬇️ NEW: use CSS Grid to keep 4 controls in one line */
.custom-sec1-inner .select-device-box{
  display:grid; align-items:center;
  grid-template-columns: 1fr 1fr 1fr auto; /* category | brand | model | button */
  gap:16px; /* space between items */
}

/* Make fields fluid */
.custom-sec1-inner .select-device-box select{
  width:100%; height:56px; display:flex; align-items:center;
  font-size:16px; font-weight:500; border-radius:10px; outline:0; appearance:none; padding:0 15px;
  background: var(--color-surface); color: var(--color-text);
  border:1px solid color-mix(in srgb, var(--color-muted) 70%, transparent);
}

.custom-sec1-inner .select-device-box button{
  height:56px; min-width:170px; display:flex; align-items:center; justify-content:center;
  font-size:18px; font-weight:600; border-radius:10px; outline:0; gap:8px;
  background: var(--color-primary) !important; color:#111 !important; border:1px solid var(--color-primary)!important;
  transition:.2s ease;
}
.custom-sec1-inner .select-device-box button:hover{
  background: color-mix(in srgb, var(--color-primary) 85%, #000 15%) !important;
  border-color: color-mix(in srgb, var(--color-primary) 85%, #000 15%) !important;
  box-shadow:0 0 0 2px color-mix(in srgb, var(--color-primary) 28%, transparent), 0 16px 30px rgba(0,0,0,.22)!important;
}

/* ====== Responsive ====== */
@media(max-width:1176px){
  .custom-sec1-content{ max-width:888px; }
}
@media(max-width:991px){
  .custom-sec1{ transform:translateY(-48px); padding:0 10px; }
  .custom-sec1-inner h4{ font-size:16px; padding-bottom:14px; text-align:center; color:#111!important; }
  .custom-sec1-content{ border-radius:10px; max-width:680px; padding:16px 14px 18px; }
  /* 2 columns on tablet */
  .custom-sec1-inner .select-device-box{ grid-template-columns: 1fr 1fr; }
  .custom-sec1-inner .select-device-box button{ min-width:unset; }
}
@media(max-width:576px){
  .custom-sec1{ transform:translateY(-40px); }
  .custom-sec1-content{ max-width:340px; }
  .custom-sec1-inner h4{ padding-bottom:10px; line-height:17px; }
  /* 1 per row on mobile */
  .custom-sec1-inner .select-device-box{ grid-template-columns: 1fr; gap:10px; }
  .custom-sec1-inner .select-device-box select{ height:44px; font-size:14px; border-radius:6px; }
  .custom-sec1-inner .select-device-box button{ height:44px; width:100%; font-size:14px; border-radius:6px; }
}
  </style>

  custom-sec1 select device section start 
  <section class="custom-sec1 w-100 float-left d-block">
    <div class="custom-sec1-content">
      <div class="custom-sec1-inner">
        <h4>Select Device ,Model for Repairing.</h4>

        @php
          use App\Helpers\ServiceType;
          $categories = \App\Models\Category::where('service', ServiceType::REPAIR)
                        ->where('status','Publish')->get();

          $devices = \App\Models\DeviceType::whereHas('category', function ($q) {
                        $q->where('service', ServiceType::REPAIR)->where('status','Publish');
                      })->where('status','Publish')->get();

          $modalsForJs = \App\Models\Modal::where('status','Publish')
                        ->get(['id','name','device_type_id']);
        @endphp

        <div class="select-device-box">
           Category 
          <select id="category" name="category" onchange="updateBrandOptions()">
            <option value="">Select Category</option>
            @foreach($categories as $cat)
              <option value="{{ $cat->id }}" {{ $cat->id == request('category') ? 'selected' : '' }}>
                {{ $cat->name }}
              </option>
            @endforeach
          </select>

           Brand (DeviceType) 
          <select id="device" name="device" onchange="updateModelOptions()">
            <option value="">Select Brand</option>
            @foreach($devices as $device)
              <option value="{{ $device->id }}" data-category="{{ $device->category_id }}"
                {{ $device->id == request('device') ? 'selected' : '' }}>
                {{ $device->name }}
              </option>
            @endforeach
          </select>

           Model 
          <select id="modal" name="modal">
            <option value="">Select Model</option>
          </select>

           Search 
          <button type="button" class="btn" onclick="redirectToRepairTypes()">
            <i class="fa fa-search" aria-hidden="true"></i> Search
          </button>
        </div>
      </div>
    </div>
  </section>
  custom-sec1 select device section end 

  <script>
    // ===== Data =====
    const categoriesData = @json($categories->map(fn($c)=>['id'=>$c->id,'name'=>$c->name]));
    const devicesData    = @json($devices->map(fn($d)=>['id'=>$d->id,'name'=>$d->name,'category_id'=>$d->category_id]));
    const modalsData     = @json($modalsForJs); // id, name, device_type_id

    // ===== Elements =====
    const $category = document.getElementById('category');
    const $device   = document.getElementById('device');
    const $modal    = document.getElementById('modal');

    // Helpers
    function resetSelect(sel, label){ sel.innerHTML = `<option value="">${label}</option>`; }

    // Cascade: Category -> Brand
    function updateBrandOptions() {
      const catId = $category.value;
      resetSelect($device, 'Select Brand');
      resetSelect($modal, 'Select Model');
      if(!catId) return;

      devicesData.filter(d => String(d.category_id) === String(catId))
        .forEach(d => {
          const opt = document.createElement('option');
          opt.value = d.id; opt.textContent = d.name;
          $device.appendChild(opt);
        });
    }

    // Cascade: Brand -> Model
    function updateModelOptions() {
      const deviceId = $device.value;
      resetSelect($modal, 'Select Model');
      if(!deviceId) return;

      modalsData.filter(m => String(m.device_type_id) === String(deviceId))
        .forEach(m => {
          const opt = document.createElement('option');
          opt.value = m.id; opt.textContent = m.name;
          $modal.appendChild(opt);
        });
    }

    // Search
    function redirectToRepairTypes() {
      const catId = $category.value, deviceId = $device.value, modalId = $modal.value;
      if(!catId) return alert('Please select a category.');
      if(!deviceId) return alert('Please select a brand.');
      if(!modalId) return alert('Please select a model.');

      const url = `{{ url('{device}/{modal}/repair_types') }}`
                  .replace('{device}', deviceId).replace('{modal}', modalId);
      window.location.href = url;
    }

    // Hydrate on load (when query params preselect values)
    document.addEventListener('DOMContentLoaded', () => {
      if ($category.value) {
        updateBrandOptions();
        if ($device.value) updateModelOptions();
      }
    });
  </script>
</div>
--}}