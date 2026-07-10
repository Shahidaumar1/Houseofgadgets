<div>
    <style>
        /* Sticky Top Nav */
        .sticky-top-nav {
            position: -webkit-sticky !important;
            position: sticky !important;
            top: 0 !important;
            z-index: 1020 !important;
            background: white !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin: 0 !important;
            width: 100% !important;
        }
        
        .filter-container {
            background: white;
            padding: 15px;
            border-radius: 5px;
        }

        x-content, .content-wrapper {
            overflow: visible !important;
        }

        /* Google Ads Style Date Picker Styles */
        .google-datepicker-wrapper {
            position: relative;
            display: inline-block;
        }

        .google-date-inputs {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .google-date-input {
            background: white;
            border: 1px solid #dadce0;
            border-radius: 4px;
            padding: 6px 10px;
            font-size: 13px;
            min-width: 130px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .google-date-input:hover {
            border-color: #5f6368;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .google-date-input.active {
            border-color: #1a73e8;
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
        }

        .google-date-label {
            font-size: 10px;
            color: #5f6368;
            margin-bottom: 2px;
        }

        .google-date-value {
            font-size: 13px;
            color: #202124;
            font-weight: 500;
        }

        .google-date-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 8px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            z-index: 1050;
            display: none;
            min-width: 680px;
        }

        .google-date-dropdown.show {
            display: flex;
        }

        .google-preset-panel {
            width: 220px;
            border-right: 1px solid #e8eaed;
            padding: 8px 0;
        }

        .google-preset-option {
            padding: 10px 20px;
            cursor: pointer;
            font-size: 14px;
            color: #202124;
            transition: background 0.2s;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .google-preset-option:hover {
            background: #f1f3f4;
        }

        .google-preset-option.active {
            background: #e8f0fe;
            color: #1a73e8;
            font-weight: 500;
        }

        .google-calendar-panel {
            flex: 1;
            padding: 20px;
        }

        .google-month-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .google-month-nav-btn {
            background: none;
            border: none;
            color: #1a73e8;
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .google-month-nav-btn:hover {
            background: #f1f3f4;
        }

        .google-month-selector {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .google-month-dropdown {
            border: 1px solid #dadce0;
            border-radius: 4px;
            padding: 6px 10px;
            font-size: 14px;
            color: #202124;
            background: white;
            cursor: pointer;
        }

        .google-calendars-container {
            display: flex;
            gap: 40px;
        }

        .google-calendar {
            flex: 1;
        }

        .google-calendar-header {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            margin-bottom: 8px;
        }

        .google-day-name {
            text-align: center;
            font-size: 12px;
            color: #5f6368;
            font-weight: 500;
            padding: 8px 0;
        }

        .google-calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
        }

        .google-calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 13px;
            color: #202124;
            cursor: pointer;
            transition: all 0.2s;
        }

        .google-calendar-day:not(.disabled):hover {
            background: #f1f3f4;
        }

        .google-calendar-day.other-month {
            color: #9aa0a6;
        }

        .google-calendar-day.selected {
            background: #1a73e8;
            color: white;
            font-weight: 500;
        }

        .google-calendar-day.in-range {
            background: #e8f0fe;
            border-radius: 0;
        }

        .google-calendar-day.range-start {
            background: #1a73e8;
            color: white;
            border-radius: 50% 0 0 50%;
        }

        .google-calendar-day.range-end {
            background: #1a73e8;
            color: white;
            border-radius: 0 50% 50% 0;
        }

        .google-calendar-day.today {
            border: 2px solid #1a73e8;
        }

        .google-action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 16px 20px;
            border-top: 1px solid #e8eaed;
            margin-top: 20px;
        }

        .google-btn-cancel {
            padding: 8px 24px;
            border: none;
            background: none;
            color: #1a73e8;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .google-btn-cancel:hover {
            background: #f1f3f4;
        }

        .google-btn-apply {
            padding: 8px 24px;
            border: none;
            background: #1a73e8;
            color: white;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .google-btn-apply:hover {
            background: #1557b0;
        }
    </style>

    <div class="d-flex">
        <livewire:admin.components.side-nave active="orders" />

        <x-content>
            <!-- STICKY TOP NAV -->
            <div class="sticky-top-nav">
                <div wire:ignore>
                    <livewire:admin.orders.components.top-nav active="repair-quotation" :key="'top-nav-'.now()" />
                </div>
                
                <!-- FILTERS -->
                <div class="filter-container">
                    <div class="row g-2 align-items-center">
                        <!-- Search -->
                        <div class="col-auto">
                            <input type="text" 
                                wire:model.live.debounce.500ms="search"
                                class="form-control form-control-sm" 
                                placeholder="Search name/email/device..." 
                                style="width:200px;">
                        </div>

                        <!-- Date Range Picker -->
                        <div class="col-auto" wire:ignore>
                            <div class="google-datepicker-wrapper">
                                <div class="google-date-inputs">
                                    <div class="google-date-input" id="quotationStartDateBox">
                                        <div class="google-date-label">From date</div>
                                        <div class="google-date-value" id="quotationStartDateDisplay">Select</div>
                                    </div>
                                    <span style="color: #5f6368;">—</span>
                                    <div class="google-date-input" id="quotationEndDateBox">
                                        <div class="google-date-label">To date</div>
                                        <div class="google-date-value" id="quotationEndDateDisplay">Select</div>
                                    </div>
                                </div>

                                <div class="google-date-dropdown" id="quotationGoogleDateDropdown">
                                    <div class="google-preset-panel">
                                        <div class="google-preset-option" data-preset="custom">Custom</div>
                                        <div class="google-preset-option" data-preset="today">Today</div>
                                        <div class="google-preset-option" data-preset="yesterday">Yesterday</div>
                                        <div class="google-preset-option" data-preset="this-week">This week (Mon – Today) <span>›</span></div>
                                        <div class="google-preset-option" data-preset="last-7">Last 7 days</div>
                                        <div class="google-preset-option" data-preset="last-week">Last week (Mon – Sun) <span>›</span></div>
                                        <div class="google-preset-option" data-preset="last-14">Last 14 days</div>
                                        <div class="google-preset-option" data-preset="this-month">This month</div>
                                        <div class="google-preset-option" data-preset="last-30">Last 30 days</div>
                                        <div class="google-preset-option" data-preset="last-month">Last month</div>
                                    </div>

                                    <div class="google-calendar-panel">
                                        <div class="google-month-nav">
                                            <button type="button" class="google-month-nav-btn" id="quotationGooglePrevMonth">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <div class="google-month-selector">
                                                <select class="google-month-dropdown" id="quotationGoogleMonth1"></select>
                                                <select class="google-month-dropdown" id="quotationGoogleMonth2"></select>
                                            </div>
                                            <button type="button" class="google-month-nav-btn" id="quotationGoogleNextMonth">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>

                                        <div class="google-calendars-container">
                                            <div class="google-calendar" id="quotationGoogleCalendar1"></div>
                                            <div class="google-calendar" id="quotationGoogleCalendar2"></div>
                                        </div>

                                        <div class="google-action-buttons">
                                            <button type="button" class="google-btn-cancel" id="quotationGoogleCancelBtn">Cancel</button>
                                            <button type="button" class="google-btn-apply" id="quotationGoogleApplyBtn">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-auto">
                            <select wire:model.live="status" 
                                class="form-select form-select-sm" 
                                style="width:130px;">
                                <option value="">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="quoted">Quoted</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>

                        <!-- All/Junk Buttons -->
                        <div class="col-auto ms-auto">
                            <div class="btn-group" role="group">
                                <button wire:click="showAllQuotations" 
                                    type="button"
                                    class="btn btn-sm {{ !$showJunk ? 'btn-primary' : 'btn-outline-primary' }}"
                                    style="min-width:60px;">
                                    All
                                </button>
                                <button wire:click="showJunkQuotations" 
                                    type="button"
                                    class="btn btn-sm {{ $showJunk ? 'btn-dark' : 'btn-outline-dark' }}"
                                    style="min-width:60px;">
                                    Junk
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-4">
                <!-- Flash Message -->
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- TABLE -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead style="background:#C0C0EF">
                            <tr>
                                <th>#</th>
                                <th>Device</th>
                                <th>Model</th>
                                <th>Repair</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($quotations as $index => $q)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $q->device ?? '-' }}</td>
                                    <td>{{ $q->modal ?? '-' }}</td>
                                    <td>{{ $q->repair ?? '-' }}</td>
                                    <td>{{ $q->name ?? '-' }}</td>
                                    <td>{{ $q->email ?? '-' }}</td>
                                    <td>{{ $q->phone ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($q->created_at)->format('d/m/Y h:i A') }}</td>

                                    <td>
                                        <select class="form-select form-select-sm"
                                            wire:change="updateStatus({{ $q->id }}, $event.target.value)"
                                            style="width: 120px;">
                                            <option value="pending" @selected($q->status=='pending')>Pending</option>
                                            <option value="approved" @selected($q->status=='approved')>Approved</option>
                                            <option value="rejected" @selected($q->status=='rejected')>Rejected</option>
                                            <option value="completed" @selected($q->status=='completed')>Completed</option>
                                        </select>
                                    </td>

                                    <td>
                                        @if($q->deleted_at)
                                            <button wire:click="restoreQuotation({{ $q->id }})"
                                                class="btn btn-success btn-sm mb-1">
                                                <i class="fa fa-undo"></i> Restore
                                            </button>

                                            <button wire:click="forceDeleteQuotation({{ $q->id }})"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Permanently delete this quotation?')">
                                                <i class="fa fa-trash"></i> Delete Forever
                                            </button>
                                        @else
                                            <button wire:click="deleteQuotation({{ $q->id }})"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-trash-o"></i> Junk
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-4">
                                        <i class="fa fa-inbox fa-3x text-muted mb-2"></i>
                                        <p class="text-muted">No quotations found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </x-content>
    </div>

    <script>
        // Multiple initialization attempts
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeQuotationDatePicker);
        } else {
            initializeQuotationDatePicker();
        }
        
        document.addEventListener('livewire:load', initializeQuotationDatePicker);

        function initializeQuotationDatePicker() {
            if (window.quotationDatePickerInitialized) {
                return;
            }
            window.quotationDatePickerInitialized = true;

            class LivewireGoogleDatePicker {
                constructor() {
                    this.startDate = null;
                    this.endDate = null;
                    this.tempStartDate = null;
                    this.tempEndDate = null;
                    this.currentMonth1 = new Date();
                    this.currentMonth2 = new Date();
                    this.currentMonth2.setMonth(this.currentMonth2.getMonth() + 1);
                    this.init();
                }

                init() {
                    setTimeout(() => {
                        this.setupEventListeners();
                        this.populateMonthSelectors();
                        this.renderCalendars();
                    }, 100);
                }

                setupEventListeners() {
                    const startBox = document.getElementById('quotationStartDateBox');
                    const endBox = document.getElementById('quotationEndDateBox');
                    
                    if (!startBox || !endBox) {
                        setTimeout(() => this.setupEventListeners(), 100);
                        return;
                    }

                    startBox.addEventListener('click', () => this.openDropdown());
                    endBox.addEventListener('click', () => this.openDropdown());
                    
                    const cancelBtn = document.getElementById('quotationGoogleCancelBtn');
                    const applyBtn = document.getElementById('quotationGoogleApplyBtn');
                    
                    if (cancelBtn) cancelBtn.addEventListener('click', () => this.closeDropdown());
                    if (applyBtn) applyBtn.addEventListener('click', () => this.applyDates());
                    
                    const prevBtn = document.getElementById('quotationGooglePrevMonth');
                    const nextBtn = document.getElementById('quotationGoogleNextMonth');
                    
                    if (prevBtn) prevBtn.addEventListener('click', () => this.previousMonth());
                    if (nextBtn) nextBtn.addEventListener('click', () => this.nextMonth());
                    
                    const month1 = document.getElementById('quotationGoogleMonth1');
                    const month2 = document.getElementById('quotationGoogleMonth2');
                    
                    if (month1) month1.addEventListener('change', (e) => this.changeMonth(1, e.target.value));
                    if (month2) month2.addEventListener('change', (e) => this.changeMonth(2, e.target.value));
                    
                    document.querySelectorAll('.google-preset-option').forEach(option => {
                        option.addEventListener('click', (e) => {
                            const preset = e.target.closest('.google-preset-option').dataset.preset;
                            if (preset) this.selectPreset(preset);
                        });
                    });

                    // document.addEventListener('click', (e) => {
                    //     if (!e.target.closest('.google-datepicker-wrapper')) {
                    //         this.closeDropdown();
                    //     }
                    // 
                    // });
                    day.addEventListener('click', (e) => {
    e.stopPropagation(); // 🔥 THIS IS KEY
    this.selectDate(date);
});

                }

                openDropdown() {
                    const dropdown = document.getElementById('quotationGoogleDateDropdown');
                    if (dropdown) {
                        dropdown.classList.add('show');
                        this.tempStartDate = this.startDate ? new Date(this.startDate) : null;
                        this.tempEndDate = this.endDate ? new Date(this.endDate) : null;
                        this.renderCalendars();
                    }
                }

                closeDropdown() {
                    const dropdown = document.getElementById('quotationGoogleDateDropdown');
                    if (dropdown) dropdown.classList.remove('show');
                }

                applyDates() {
                    if (this.tempStartDate && this.tempEndDate) {
                        this.startDate = new Date(this.tempStartDate);
                        this.endDate = new Date(this.tempEndDate);
                        this.updateDisplay();
                        this.updateLivewire();
                        this.closeDropdown();
                    }
                }

                updateDisplay() {
                    const formatDate = (date) => {
                        const day = date.getDate();
                        const month = date.getMonth() + 1;
                        const year = date.getFullYear();
                        return `${day.toString().padStart(2, '0')}/${month.toString().padStart(2, '0')}/${year}`;
                    };

                    const formatDateLong = (date) => {
                        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                        return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
                    };

                    const startDisplay = document.getElementById('quotationStartDateDisplay');
                    const endDisplay = document.getElementById('quotationEndDateDisplay');
                    
                    if (startDisplay) startDisplay.textContent = formatDate(this.startDate);
                    if (endDisplay) endDisplay.textContent = formatDateLong(this.endDate);
                }

                updateLivewire() {
                    const formatForLivewire = (date) => {
                        const year = date.getFullYear();
                        const month = (date.getMonth() + 1).toString().padStart(2, '0');
                        const day = date.getDate().toString().padStart(2, '0');
                        return `${year}-${month}-${day}`;
                    };

                    const fromDate = formatForLivewire(this.startDate) + 'T00:00';
                    const toDate = formatForLivewire(this.endDate) + 'T23:59';

                    // Try both Livewire 2 and 3 syntax
                    try {
                        if (typeof Livewire !== 'undefined' && Livewire.find) {
                            // Livewire 2.x
                            const component = Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id'));
                            if (component) {
                                component.set('fromDateTime', fromDate);
                                component.set('toDateTime', toDate);
                            }
                        } else if (typeof @this !== 'undefined') {
                            // Livewire 2.x alternative
                            @this.set('fromDateTime', fromDate);
                            @this.set('toDateTime', toDate);
                            
                            
                        }
                    } catch (e) {
                        console.error('Livewire update error:', e);
                        // Fallback: trigger manual refresh
                        window.Livewire.emit('refreshQuotations');
                    }
                }

                selectPreset(preset) {
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    document.querySelectorAll('.google-preset-option').forEach(opt => opt.classList.remove('active'));
                    const element = document.querySelector(`[data-preset="${preset}"]`);
                    if (element) element.classList.add('active');

                    switch(preset) {
                        case 'today':
                            this.tempStartDate = new Date(today);
                            this.tempEndDate = new Date(today);
                            break;
                        case 'yesterday':
                            const yesterday = new Date(today);
                            yesterday.setDate(yesterday.getDate() - 1);
                            this.tempStartDate = new Date(yesterday);
                            this.tempEndDate = new Date(yesterday);
                            break;
                        case 'last-7':
                            this.tempEndDate = new Date(today);
                            this.tempStartDate = new Date(today);
                            this.tempStartDate.setDate(this.tempStartDate.getDate() - 6);
                            break;
                        case 'last-14':
                            this.tempEndDate = new Date(today);
                            this.tempStartDate = new Date(today);
                            this.tempStartDate.setDate(this.tempStartDate.getDate() - 13);
                            break;
                        case 'last-30':
                            this.tempEndDate = new Date(today);
                            this.tempStartDate = new Date(today);
                            this.tempStartDate.setDate(this.tempStartDate.getDate() - 29);
                            break;
                        case 'this-month':
                            this.tempStartDate = new Date(today.getFullYear(), today.getMonth(), 1);
                            this.tempEndDate = new Date(today);
                            break;
                        case 'last-month':
                            this.tempStartDate = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                            this.tempEndDate = new Date(today.getFullYear(), today.getMonth(), 0);
                            break;
                        case 'this-week':
                            const dayOfWeek = today.getDay();
                            const daysToMonday = dayOfWeek === 0 ? 6 : dayOfWeek - 1;
                            this.tempStartDate = new Date(today);
                            this.tempStartDate.setDate(today.getDate() - daysToMonday);
                            this.tempEndDate = new Date(today);
                            break;
                        case 'last-week':
                            const lastWeekEnd = new Date(today);
                            const dayOfWeek2 = today.getDay();
                            const daysToLastSunday = dayOfWeek2 === 0 ? 0 : dayOfWeek2;
                            lastWeekEnd.setDate(today.getDate() - daysToLastSunday);
                            this.tempEndDate = new Date(lastWeekEnd);
                            this.tempStartDate = new Date(lastWeekEnd);
                            this.tempStartDate.setDate(lastWeekEnd.getDate() - 6);
                            break;
                    }

                    this.renderCalendars();
                }

                populateMonthSelectors() {
                    const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
                    const currentYear = new Date().getFullYear();
                    
                    const select1 = document.getElementById('quotationGoogleMonth1');
                    const select2 = document.getElementById('quotationGoogleMonth2');
                    
                    if (!select1 || !select2) return;
                    
                    [select1, select2].forEach(select => {
                        select.innerHTML = '';
                        for (let year = currentYear - 2; year <= currentYear + 2; year++) {
                            months.forEach((month, index) => {
                                const option = document.createElement('option');
                                option.value = `${year}-${index}`;
                                option.textContent = `${month} ${year}`;
                                select.appendChild(option);
                            });
                        }
                    });

                    select1.value = `${this.currentMonth1.getFullYear()}-${this.currentMonth1.getMonth()}`;
                    select2.value = `${this.currentMonth2.getFullYear()}-${this.currentMonth2.getMonth()}`;
                }

                changeMonth(calendarNum, value) {
                    const [year, month] = value.split('-').map(Number);
                    if (calendarNum === 1) {
                        this.currentMonth1 = new Date(year, month, 1);
                        this.currentMonth2 = new Date(year, month + 1, 1);
                    } else {
                        this.currentMonth2 = new Date(year, month, 1);
                    }
                    this.populateMonthSelectors();
                    this.renderCalendars();
                }

                previousMonth() {
                    this.currentMonth1.setMonth(this.currentMonth1.getMonth() - 1);
                    this.currentMonth2.setMonth(this.currentMonth2.getMonth() - 1);
                    this.populateMonthSelectors();
                    this.renderCalendars();
                }

                nextMonth() {
                    this.currentMonth1.setMonth(this.currentMonth1.getMonth() + 1);
                    this.currentMonth2.setMonth(this.currentMonth2.getMonth() + 1);
                    this.populateMonthSelectors();
                    this.renderCalendars();
                }

                renderCalendars() {
                    this.renderCalendar('quotationGoogleCalendar1', this.currentMonth1);
                    this.renderCalendar('quotationGoogleCalendar2', this.currentMonth2);
                }

                renderCalendar(elementId, date) {
                    const calendar = document.getElementById(elementId);
                    if (!calendar) return;
                    
                    const year = date.getFullYear();
                    const month = date.getMonth();
                    
                    const header = document.createElement('div');
                    header.className = 'google-calendar-header';
                    ['M', 'T', 'W', 'T', 'F', 'S', 'S'].forEach(day => {
                        const dayName = document.createElement('div');
                        dayName.className = 'google-day-name';
                        dayName.textContent = day;
                        header.appendChild(dayName);
                    });

                    const grid = document.createElement('div');
                    grid.className = 'google-calendar-grid';

                    const firstDay = new Date(year, month, 1).getDay();
                    const lastDate = new Date(year, month + 1, 0).getDate();
                    const prevLastDate = new Date(year, month, 0).getDate();
                    
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    const startDay = firstDay === 0 ? 6 : firstDay - 1;
                    for (let i = startDay; i > 0; i--) {
                        const day = this.createDayElement(prevLastDate - i + 1, true, new Date(year, month - 1, prevLastDate - i + 1));
                        grid.appendChild(day);
                    }

                    for (let i = 1; i <= lastDate; i++) {
                        const currentDate = new Date(year, month, i);
                        const day = this.createDayElement(i, false, currentDate);
                        
                        if (currentDate.getTime() === today.getTime()) {
                            day.classList.add('today');
                        }

                        if (this.tempStartDate && this.tempEndDate) {
                            const time = currentDate.getTime();
                            const startTime = this.tempStartDate.getTime();
                            const endTime = this.tempEndDate.getTime();

                            if (time === startTime && time === endTime) {
                                day.classList.add('selected');
                            } else if (time === startTime) {
                                day.classList.add('range-start');
                            } else if (time === endTime) {
                                day.classList.add('range-end');
                            } else if (time > startTime && time < endTime) {
                                day.classList.add('in-range');
                            }
                        }

                        grid.appendChild(day);
                    }

                    const remainingDays = 42 - (startDay + lastDate);
                    for (let i = 1; i <= remainingDays; i++) {
                        const day = this.createDayElement(i, true, new Date(year, month + 1, i));
                        grid.appendChild(day);
                    }

                    calendar.innerHTML = '';
                    calendar.appendChild(header);
                    calendar.appendChild(grid);
                }

                createDayElement(dayNum, isOtherMonth, date) {
                    const day = document.createElement('div');
                    day.className = 'google-calendar-day';
                    day.textContent = dayNum;
                    
                    if (isOtherMonth) {
                        day.classList.add('other-month');
                    }

                    day.addEventListener('click', () => this.selectDate(date));
                    return day;
                }

                selectDate(date) {
                    if (!this.tempStartDate || (this.tempStartDate && this.tempEndDate)) {
                        this.tempStartDate = new Date(date);
                        this.tempEndDate = null;
                    } else {
                        if (date < this.tempStartDate) {
                            this.tempEndDate = new Date(this.tempStartDate);
                            this.tempStartDate = new Date(date);
                        } else {
                            this.tempEndDate = new Date(date);
                        }
                    }

                    this.renderCalendars();
                }
            }

            new LivewireGoogleDatePicker();
        }
    </script>
</div>