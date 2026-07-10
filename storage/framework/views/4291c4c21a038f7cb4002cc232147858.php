
<div class="search-bar align-self-center d-none d-lg-block" wire:keydown.escape="$set('search','')">
    <style>
        /* input */
        .search-input{color:#fff!important;background:#000!important;caret-color:#fff!important;border-radius:20px 0 0 20px;height:35px;font-size:12px;width:250px;border:1px solid #000;}
        .search-input::placeholder{color:rgba(255,255,255,.85)!important;opacity:1;}
        /* dropdown */
        .mylistgroup{position:absolute;z-index:1000;max-height:300px;overflow-y:auto;background:#000;color:#fff;border-radius:8px;box-shadow:0 4px 10px rgba(0,0,0,.2);}
        .mylistitem{padding:10px;border-bottom:1px solid #444;background:transparent!important;border-left:none!important;border-right:none!important}
        .mylistitem.even-item{background:rgba(0,0,0,.25)!important}
        .mylistitem.odd-item{background:rgba(0,0,0,.18)!important}
        .mylistitem:hover{background:rgba(0,0,0,.4)!important;color:#fff!important}
        .mylistitem a,.mylistitem span,.mylistitem p,.fw-bold{color:#fff!important}
        /* scrollbar */
        ul.mylistgroup{scrollbar-width:thick;scrollbar-color:#F75D59 #fff;}
        ul.mylistgroup::-webkit-scrollbar{width:20px}
        ul.mylistgroup::-webkit-scrollbar-track{background:#fff;border-radius:20px}
        ul.mylistgroup::-webkit-scrollbar-thumb{background:#F75D59;border-radius:20px;height:100px}
        /* button */
        .search-button{background:#000;border-radius:0 20px 20px 0;width:60px;height:35px;display:flex;justify-content:center;align-items:center;border:1px solid #000}
        .search-button i{color:#fff}
    </style>
<style>
.middle-header-bar {
  background: #000 !important;
}
</style>
    <div class="d-flex position-relative">
        <div class="flex-grow-1">
            <input type="text"
                   class="form-control search-input"
                   placeholder="Search, type your phone model here.."
                   wire:model.debounce.300ms="search">

            <?php if($results && $results->count()): ?>
                <ul class="list-group mylistgroup mt-2">
                    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($result instanceof \App\Models\DeviceType): ?>
                            <?php $__currentLoopData = $result->modals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item mylistitem text-center">
                                    <a class="fw-bold" href="javascript:void(0);" wire:click="navigate('modal', <?php echo e($modal->id); ?>)">
                                        <?php echo e($modal->name); ?>

                                    </a>
                                    <ul class="list-group mylistgroup ml-3" style="position:static;margin-top:10px">
                                        <?php $__empty_1 = true; $__currentLoopData = $modal->prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($price->repairType): ?>
                                                <li class="list-group-item mylistitem <?php echo e($loop->even ? 'even-item' : 'odd-item'); ?>">
                                                    <a class="d-flex justify-content-between align-items-center"
                                                       href="javascript:void(0);" wire:click="navigate('price', <?php echo e($price->id); ?>)">
                                                        <p class="mb-0"><?php echo e($price->repairType->name); ?></p>
                                                        <p class="mb-0"><b>£<?php echo e($price->price); ?></b></p>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <li class="list-group-item mylistitem"><span>No prices available</span></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php elseif($result instanceof \App\Models\Modal): ?>
                            <li class="list-group-item mylistitem text-center">
                                <a class="fw-bold" href="javascript:void(0);" wire:click="navigate('modal', <?php echo e($result->id); ?>)">
                                    <?php echo e($result->name); ?>

                                </a>
                                <ul class="list-group mylistgroup ml-3" style="position:static;margin-top:10px">
                                    <?php $__empty_1 = true; $__currentLoopData = $result->prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($price->repairType): ?>
                                            <li class="list-group-item mylistitem <?php echo e($loop->even ? 'even-item' : 'odd-item'); ?>">
                                                <a class="d-flex justify-content-between align-items-center"
                                                   href="javascript:void(0);" wire:click="navigate('price', <?php echo e($price->id); ?>)">
                                                    <p class="mb-0"><?php echo e($price->repairType->name); ?></p>
                                                    <p class="mb-0"><b>£<?php echo e($price->price); ?></b></p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <li class="list-group-item mylistitem"><span>No prices available</span></li>
                                    <?php endif; ?>
                                </ul>
                            </li>

                        
                        <?php elseif($result instanceof \App\Models\Price): ?>
                            <?php if($result->modal && $result->modal->deviceType): ?>
                                <li class="list-group-item mylistitem">
                                    <a href="javascript:void(0);" wire:click="navigate('price', <?php echo e($result->id); ?>)">
                                        Price: £<?php echo e($result->price); ?> —
                                        Model: <?php echo e($result->modal->name); ?> —
                                        Device Type: <?php echo e($result->modal->deviceType->name); ?>

                                    </a>
                                    <ul class="list-group mylistgroup ml-3" style="position:static;margin-top:10px">
                                        <li class="list-group-item mylistitem">
                                            Repair Type: <?php echo e($result->repairType?->name ?? 'N/A'); ?>

                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                        
                        <?php elseif($result instanceof \App\Models\RepairType): ?>
                            <?php
                                $prices = $result->prices->filter(fn($p) => $p->modal && $p->modal->deviceType);
                            ?>
                            <?php if($prices->isNotEmpty()): ?>
                                <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item mylistitem">
                                        <a href="javascript:void(0);" wire:click="navigate('price', <?php echo e($price->id); ?>)">
                                            Repair Type: <?php echo e($result->name); ?> —
                                            Price: £<?php echo e($price->price); ?> —
                                            Model: <?php echo e($price->modal->name); ?> —
                                            Device Type: <?php echo e($price->modal->deviceType->name); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <li class="list-group-item mylistitem"><span>No prices available</span></li>
                            <?php endif; ?>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>

        <button type="button" class="search-button" title="Search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </div>
</div>
<?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea\resources\views/livewire/components/search-bar.blade.php ENDPATH**/ ?>