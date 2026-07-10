<div>
    @props([
    'title' => null,
    'id' => null,
    'size' => 'md',
])
    <style>
        .backdrop {
            position: absolute;
            width: 100%;
            height: 100vh;
            z-index: 9999;
            top: 0;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 18px;
            display: none;
        }

        .custom-modal {
            background: white;
            width: 500px;
            margin: auto;
            border-radius: 5px;
            padding: 18px;

        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .custom-modal {
            animation-name: fadeIn;
            animation-duration: 0.3s;
            animation-timing-function: ease-in;
        }
    </style>

    @php
        $sizes = [
        'md' => '400px',
        'lg' => '600px',
        'xl' => '800px',
        'full' => '100%',
    ];
    @endphp
    <div wire:ignore.self class="backdrop" id="{{ $id }}">
        <div class="custom-modal"  style="width:{{$sizes[$size]}}!important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="fw-bold">{{ $title ?? 'Modal Title' }}</h4>
                    <span style="cursor:pointer" onclick="closeM('{{ $id }}')"><i class="fa fa-times"
                            aria-hidden="true"></i></span>
                </div>
                <div class="my-3" style="height:auto; overflow-y:auto">
                    {{ $slot }}
                </div>

            </div>
        </div>
    </div>



</div>
