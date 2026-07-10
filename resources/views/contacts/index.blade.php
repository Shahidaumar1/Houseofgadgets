<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact Information</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
</head>

<body>
    @extends('layouts.admin')
    @php
        $slot = '';
    @endphp
    
    <div class="d-flex">
        <livewire:admin.components.side-nave active="buy" />

        <div class="container-fluid mt-3" style="flex: 1;">
            <!-- STICKY TOP NAV -->
            <div class="sticky-top-nav">
                <livewire:admin.orders.components.top-nav active="contacts" />
                
                <!-- FILTERS -->
                <div class="filter-container">
                    <form method="GET" action="{{ route('contacts.index') }}" id="filterForm">
                        <input type="hidden" name="show_junk" value="{{ request('show_junk', 0) }}">
                        <input type="hidden" name="from_date" id="fromDateInput" value="{{ request('from_date') }}">
                        <input type="hidden" name="to_date" id="toDateInput" value="{{ request('to_date') }}">
                        
                        <div class="row g-2 align-items-center">
                            <!-- Search -->
                            <div class="col-auto">
                                <input type="text" 
                                    name="search" 
                                    value="{{ request('search') }}"
                                    class="form-control form-control-sm" 
                                    placeholder="Search name/email/phone" 
                                    onchange="this.form.submit()"
                                    style="width:200px;">
                            </div>

                            <!-- Date Range Picker -->
                            <div class="col-auto">
                                <div class="google-datepicker-wrapper">
                                    <div class="google-date-inputs">
                                        <div class="google-date-input" id="startDateBox">
                                            <div class="google-date-label">From date</div>
                                            <div class="google-date-value" id="startDateDisplay">
                                                {{ request('from_date') ? \Carbon\Carbon::parse(request('from_date'))->format('d/m/Y') : 'Select' }}
                                            </div>
                                        </div>
                                        <span style="color: #5f6368;">—</span>
                                        <div class="google-date-input" id="endDateBox">
                                            <div class="google-date-label">To date</div>
                                            <div class="google-date-value" id="endDateDisplay">
                                                {{ request('to_date') ? \Carbon\Carbon::parse(request('to_date'))->format('d M Y') : 'Select' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="google-date-dropdown" id="googleDateDropdown">
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
                                                <button type="button" class="google-month-nav-btn" id="googlePrevMonth">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <div class="google-month-selector">
                                                    <select class="google-month-dropdown" id="googleMonth1"></select>
                                                    <select class="google-month-dropdown" id="googleMonth2"></select>
                                                </div>
                                                <button type="button" class="google-month-nav-btn" id="googleNextMonth">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>

                                            <div class="google-calendars-container">
                                                <div class="google-calendar" id="googleCalendar1"></div>
                                                <div class="google-calendar" id="googleCalendar2"></div>
                                            </div>

                                            <div class="google-action-buttons">
                                                <button type="button" class="google-btn-cancel" id="googleCancelBtn">Cancel</button>
                                                <button type="button" class="google-btn-apply" id="googleApplyBtn">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-auto">
                                <select name="status" 
                                    class="form-select form-select-sm"
                                    onchange="this.form.submit()" 
                                    style="width:130px;">
                                    <option value="">All Status</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>

                            <!-- Selected Option -->
                            <div class="col-auto">
                                <select name="selected_option" 
                                    class="form-select form-select-sm"
                                    onchange="this.form.submit()" 
                                    style="width:180px;">
                                    <option value="">All Options</option>
                                    <option value="Repairing A device" {{ request('selected_option') == 'Repairing A device' ? 'selected' : '' }}>Repairing A Device</option>
                                    <option value="Buying a Device" {{ request('selected_option') == 'Buying a Device' ? 'selected' : '' }}>Buying a Device</option>
                                    <option value="Selling a Device" {{ request('selected_option') == 'Selling a Device' ? 'selected' : '' }}>Selling a Device</option>
                                </select>
                            </div>

                            <!-- All/Junk Buttons -->
                            <div class="col-auto ms-auto">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('contacts.index', array_merge(request()->except('show_junk'), ['show_junk' => '0'])) }}" 
                                        class="btn btn-sm {{ request('show_junk', 0) == 0 ? 'btn-primary' : 'btn-outline-primary' }}"
                                        style="min-width:60px;">
                                        All
                                    </a>
                                    <a href="{{ route('contacts.index', array_merge(request()->except('show_junk'), ['show_junk' => '1'])) }}" 
                                        class="btn btn-sm {{ request('show_junk', 0) == 1 ? 'btn-dark' : 'btn-outline-dark' }}"
                                        style="min-width:60px;">
                                        Junk
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- TABLE -->
            <div class="table-responsive mt-3">
                <table class="table table-hover table-striped">
                    <thead style="background:#C0C0EF">
                        <tr>
                            <th>#</th>
                            <th>Date & Time</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Selected Option</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $index => $contact)
                            <tr>
                                <td>{{ $contacts->firstItem() + $index }}</td>
                                <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y h:i A') }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>
                                    <span class="badge bg-info text-white">
                                        {{ ucfirst($contact->selected_option) }}
                                    </span>
                                </td>
                                <td>
                                    <div style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" 
                                        title="{{ $contact->message }}">
                                        {{ $contact->message }}
                                    </div>
                                </td>
                                <td>
                                    <select class="form-select form-select-sm status-dropdown" 
                                        data-contact-id="{{ $contact->id }}"
                                        style="width: 120px;">
                                        <option value="pending" {{ $contact->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="completed" {{ $contact->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $contact->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </td>
                                <td>
                                    @if($contact->deleted_at)
                                        <!-- RESTORE BUTTON -->
                                        <form action="{{ route('contacts.restore', $contact->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm mb-1" title="Restore">
                                                <i class="fa fa-undo"></i> Restore
                                            </button>
                                        </form>

                                        <!-- PERMANENT DELETE -->
                                        <form action="{{ route('contacts.force-delete', $contact->id) }}" method="POST" 
                                            style="display:inline;" 
                                            onsubmit="return confirm('Permanently delete this contact?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Forever">
                                                <i class="fa fa-trash"></i> Delete Forever
                                            </button>
                                        </form>
                                    @else
                                        <!-- VIEW BUTTON -->
                                        <a href="{{ route('contacts.show', $contact->id) }}" 
                                            class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fas fa-eye"></i> View
                                        </a>

                                        <!-- MOVE TO JUNK -->
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning btn-sm" title="Move to Junk">
                                                <i class="fa fa-trash-o"></i> Junk
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">
                                    <i class="fa fa-inbox fa-3x text-muted mb-2"></i>
                                    <p class="text-muted">No contacts found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="d-flex justify-content-center mt-3 mb-5">
                {{ $contacts->appends(request()->all())->links() }}
            </div>
        </div>
    </div>

    <!-- jQuery for AJAX status update -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Status dropdown change event
            $('.status-dropdown').on('change', function() {
                const contactId = $(this).data('contact-id');
                const newStatus = $(this).val();
                
                $.ajax({
                    url: `/contacts/${contactId}/update-status`,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        status: newStatus
                    },
                    success: function(response) {
                        const alertDiv = $('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            'Status updated successfully!' +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                            '</div>');
                        
                        $('.container-fluid').prepend(alertDiv);
                        
                        setTimeout(function() {
                            alertDiv.fadeOut('slow', function() {
                                $(this).remove();
                            });
                        }, 3000);
                    },
                    error: function(xhr) {
                        alert('Error updating status!');
                        console.error(xhr);
                        location.reload();
                    }
                });
            });

            // Google Ads Date Picker Implementation
            class LaravelGoogleDatePicker {
                constructor() {
                    this.startDate = null;
                    this.endDate = null;
                    this.tempStartDate = null;
                    this.tempEndDate = null;
                    this.currentMonth1 = new Date();
                    this.currentMonth2 = new Date();
                    this.currentMonth2.setMonth(this.currentMonth2.getMonth() + 1);
                    
                    const fromDate = document.getElementById('fromDateInput').value;
                    const toDate = document.getElementById('toDateInput').value;
                    
                    if (fromDate) this.startDate = new Date(fromDate);
                    if (toDate) this.endDate = new Date(toDate);
                    
                    this.init();
                }

                init() {
                    this.setupEventListeners();
                    this.populateMonthSelectors();
                    this.renderCalendars();
                }

                setupEventListeners() {
                    $('#startDateBox, #endDateBox').on('click', () => this.openDropdown());
                    $('#googleCancelBtn').on('click', () => this.closeDropdown());
                    $('#googleApplyBtn').on('click', () => this.applyDates());
                    $('#googlePrevMonth').on('click', () => this.previousMonth());
                    $('#googleNextMonth').on('click', () => this.nextMonth());
                    $('#googleMonth1').on('change', (e) => this.changeMonth(1, e.target.value));
                    $('#googleMonth2').on('change', (e) => this.changeMonth(2, e.target.value));
                    
                    $('.google-preset-option').on('click', (e) => {
                        this.selectPreset($(e.target).closest('.google-preset-option').data('preset'));
                    });

                    // $(document).on('click', (e) => {
                    //     if (!$(e.target).closest('.google-datepicker-wrapper').length) {
                    //         this.closeDropdown();
                    //     }
                    // });
                    $(document).on('click', (e) => {
    if (
        !$(e.target).closest('.google-datepicker-wrapper').length &&
        !$(e.target).closest('.google-date-dropdown').length
    ) {
        this.closeDropdown();
    }
});

                }

                openDropdown() {
                    $('#googleDateDropdown').addClass('show');
                    this.tempStartDate = this.startDate ? new Date(this.startDate) : null;
                    this.tempEndDate = this.endDate ? new Date(this.endDate) : null;
                    this.renderCalendars();
                }

                closeDropdown() {
                    $('#googleDateDropdown').removeClass('show');
                }

                applyDates() {
                    if (this.tempStartDate && this.tempEndDate) {
                        this.startDate = new Date(this.tempStartDate);
                        this.endDate = new Date(this.tempEndDate);
                        this.updateDisplay();
                        this.updateFormInputs();
                        this.closeDropdown();
                        $('#filterForm').submit();
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

                    $('#startDateDisplay').text(formatDate(this.startDate));
                    $('#endDateDisplay').text(formatDateLong(this.endDate));
                }

                updateFormInputs() {
                    const formatForInput = (date) => {
                        const year = date.getFullYear();
                        const month = (date.getMonth() + 1).toString().padStart(2, '0');
                        const day = date.getDate().toString().padStart(2, '0');
                        return `${year}-${month}-${day}`;
                    };

                    $('#fromDateInput').val(formatForInput(this.startDate));
                    $('#toDateInput').val(formatForInput(this.endDate));
                }

                selectPreset(preset) {
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    $('.google-preset-option').removeClass('active');
                    $(`.google-preset-option[data-preset="${preset}"]`).addClass('active');

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
                    }

                    this.renderCalendars();
                }

                populateMonthSelectors() {
                    const months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
                    const currentYear = new Date().getFullYear();
                    
                    $('#googleMonth1, #googleMonth2').each(function() {
                        $(this).empty();
                        for (let year = currentYear - 2; year <= currentYear + 2; year++) {
                            months.forEach((month, index) => {
                                $(this).append(`<option value="${year}-${index}">${month} ${year}</option>`);
                            });
                        }
                    });

                    $('#googleMonth1').val(`${this.currentMonth1.getFullYear()}-${this.currentMonth1.getMonth()}`);
                    $('#googleMonth2').val(`${this.currentMonth2.getFullYear()}-${this.currentMonth2.getMonth()}`);
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
                    this.renderCalendar('googleCalendar1', this.currentMonth1);
                    this.renderCalendar('googleCalendar2', this.currentMonth2);
                }

                renderCalendar(elementId, date) {
                    const $calendar = $(`#${elementId}`);
                    const year = date.getFullYear();
                    const month = date.getMonth();
                    
                    const $header = $('<div class="google-calendar-header">');
                    ['M', 'T', 'W', 'T', 'F', 'S', 'S'].forEach(day => {
                        $header.append(`<div class="google-day-name">${day}</div>`);
                    });

                    const $grid = $('<div class="google-calendar-grid">');
                    const firstDay = new Date(year, month, 1).getDay();
                    const lastDate = new Date(year, month + 1, 0).getDate();
                    const prevLastDate = new Date(year, month, 0).getDate();
                    
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    const startDay = firstDay === 0 ? 6 : firstDay - 1;
                    for (let i = startDay; i > 0; i--) {
                        const $day = this.createDayElement(prevLastDate - i + 1, true, new Date(year, month - 1, prevLastDate - i + 1));
                        $grid.append($day);
                    }

                    for (let i = 1; i <= lastDate; i++) {
                        const currentDate = new Date(year, month, i);
                        const $day = this.createDayElement(i, false, currentDate);
                        
                        if (currentDate.getTime() === today.getTime()) {
                            $day.addClass('today');
                        }

                        if (this.tempStartDate && this.tempEndDate) {
                            const time = currentDate.getTime();
                            const startTime = this.tempStartDate.getTime();
                            const endTime = this.tempEndDate.getTime();

                            if (time === startTime && time === endTime) {
                                $day.addClass('selected');
                            } else if (time === startTime) {
                                $day.addClass('range-start');
                            } else if (time === endTime) {
                                $day.addClass('range-end');
                            } else if (time > startTime && time < endTime) {
                                $day.addClass('in-range');
                            }
                        }

                        $grid.append($day);
                    }

                    const remainingDays = 42 - (startDay + lastDate);
                    for (let i = 1; i <= remainingDays; i++) {
                        const $day = this.createDayElement(i, true, new Date(year, month + 1, i));
                        $grid.append($day);
                    }

                    $calendar.empty().append($header).append($grid);
                }

                createDayElement(dayNum, isOtherMonth, date) {
                    const $day = $('<div class="google-calendar-day">').text(dayNum);
                    
                    if (isOtherMonth) {
                        $day.addClass('other-month');
                    }

                  $day.on('click', (e) => {
    e.stopPropagation(); // 🔥 dropdown ko close hone se rokta hai
    this.selectDate(date);
});

                    return $day;
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

            // Initialize date picker
            new LaravelGoogleDatePicker();
        });
    </script>
</body>
</html>