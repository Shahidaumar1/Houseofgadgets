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
    <?php if(session()->has('message')): ?>
    <div class="alert alert-success"><?php echo e(session('message')); ?></div>
    <?php endif; ?>
    <form wire:submit.prevent="sendEmail">
        <div class="twoin-onerow">
            <div>
                <input type="text" id="name" wire:model="name" placeholder="Name">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <input type="number" id="phone" wire:model="phone" placeholder="Phone">
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div>
            <input type="email" id="email" wire:model="email" placeholder="Email">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <select id="selectedOption" wire:model="selectedOption">
                <option value="">Subject</option>
                <option value="Buying a Device">Buying a Device</option>
                <option value="Selling A Device">Selling A Device</option>
                <option value="Repairing A device">Repairing A device</option>
                <option value="Other">Other</option>
            </select>
            <?php $__errorArgs = ['selectedOption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div> 
        
            <?php if($selectedOption == 'Other'): ?>
            <label for="otherOption" style="font-size: 15px; margin-bottom: 10px;">Other Option:</label>
            <input type="text" id="otherOption" wire:model="otherOption" style="border-radius: 5px;" />
            <?php $__errorArgs = ['otherOption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php endif; ?> 
        <div>
            <textarea rows="4" id="message" class="form-control mytext mybox" wire:model="message"
                placeholder="Type Your Message"></textarea>
            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
        <button type="submit">Submit</button>
    </form>
</div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea\resources\views/livewire/guest/user-dashboard/index.blade.php ENDPATH**/ ?>