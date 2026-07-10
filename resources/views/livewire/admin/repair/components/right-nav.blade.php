<div style="min-width:15%!important;min-height:600px;" class="bg-blue rounded-lg shadow-lg p-4">
    <div class="text-center d-flex flex-column gap-3 mt-5">
        <a href="{{ route($data['route']) ?? '#' }}"><button type="button">
                {{ $data['button_text'] }}
            </button></a>

        <p class="text-white">
            Click here to go to the {{ $data['title'] ?? '' }}
        </p>
        <p class="text-center text-white">Read Me</p>
        <div class="text-white border  p-2 rounded-lg">Instraction are placed here...</div>
    </div>
</div>
