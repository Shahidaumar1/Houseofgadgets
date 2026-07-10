<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    @error('error')
        <div class="py-2 px-4  mb-2 rounded bg-danger text-white ">
            <span class="text-sm">{{ $message }}</span>
        </div>
    @enderror

    @if (session()->has('success'))
        <div class="p-2 rounded-lg " style="background:rgb(200, 235, 168);color:black">
            <span class="text-sm">{{ session()->get('success') }}</span>
        </div>
    @endif
{{--  --}}
</div>
