<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    @if ($tbc)
        <div class="d-flex gap-2 align-items-center">
            <h3>Provisional Cost:</h3>
            <h2>£TBC</h2>
        </div>
    @else
       <h2 style="white-space: nowrap;">Total Cost: £ {{ $totalPrice }}</h2>

    @endif
</div>
