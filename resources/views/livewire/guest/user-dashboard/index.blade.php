<style>
.form-box button[type="submit"] {
    color:black !important;
    font-size:20px;
}
.form-box button[type="submit"]:hover{
    color:black !important;
}
    @media (max-width: 576px) {
    .form-box button[type="submit"] {
        width: 40%;        /* full width on mobile */
        height:50px;
        font-size:17px;
        max-width: 340px;   /* optional: keeps it from being TOO wide */
        display: block;
          /* center it */
    }
}

</style>
<div class="form-box">
    <h3>Contact Us</h3>
    @if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <form wire:submit.prevent="sendEmail">
        <div class="twoin-onerow">
            <div>
                <input type="text" id="name" wire:model="name" placeholder="Name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div>
                <input type="number" id="phone" wire:model="phone" placeholder="Phone">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <input type="email" id="email" wire:model="email" placeholder="Email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div>
            <select id="selectedOption" wire:model="selectedOption">
                <option value="">Subject</option>
                <option value="Buying a Device">Buying a Device</option>
                <option value="Selling A Device">Selling A Device</option>
                <option value="Repairing A device">Repairing A device</option>
                <option value="Other">Other</option>
            </select>
            @error('selectedOption') <span class="text-danger">{{ $message }}</span> @enderror

        </div> 
        
            @if($selectedOption == 'Other')
            <label for="otherOption" style="font-size: 15px; margin-bottom: 10px;">Other Option:</label>
            <input type="text" id="otherOption" wire:model="otherOption" style="border-radius: 5px;" />
            @error('otherOption') <span class="text-danger">{{ $message }}</span> @enderror
            @endif 
        <div>
            <textarea rows="4" id="message" class="form-control mytext mybox" wire:model="message"
                placeholder="Type Your Message"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror

        </div>
        <button type="submit">Submit</button>
    </form>
</div>