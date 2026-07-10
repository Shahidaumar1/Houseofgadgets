<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css') }}" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.1/dist/cdn.min.js"></script>
    <title> </title>

<meta name="description" content=""/>
            <meta name="keyword" content=""/>

<meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>

<link rel="canonical" href="enter page urls " />
<meta property="og:locale" content="en_US" />

<meta property="og:type" content="website" />


<meta property="og:title" content="" />


<meta property="og:description" content="" />

<meta property="og:url" content="enter websites urls " />

<meta property="og:site_name" content="Labwork360" />

<meta property="og:updated_time" content="" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



    @livewireStyles()
    @livewireScripts()

    @vite(['resources/css/admin.css', 'resources/js/app.js'])
  
</head>

<body>
    <div>
        {{ $slot }}
    </div>

    <script>
        function showM(id) {
            document.getElementById(id).style.display = 'block'
        }
        Livewire.on('showM', (id) => {
            showM(id);
        })



        function closeM(id) {
            document.getElementById(id).style.display = 'none'
        }

        Livewire.on('closeM', (id) => {
            closeM(id)
        })

        Livewire.on('sideNavApplyCss', adjustLayout)
        window.onload = function onload() {
            console.log('why this kolavari');
            adjustLayout(); // Call the function to adjust layout on page load
        }

        function adjustLayout() {
            console.log('is is firing ?');
            let content = document.getElementById('content');
            let leftDrawer = document.getElementById('leftDrawer');

            console.log(content,leftDrawer);

            if (window.innerWidth <= 768) { // For phone screens (<= 768px)
                content.style.width = '100%';
                leftDrawer.style.display = 'none';
            } else { // For lg or md screens (> 768px)
                content.style.width = '80%';
                leftDrawer.style.display = 'block';
            }
        }

        function toggleLeftDrawer() {
            var leftDrawer = document.getElementById('leftDrawer');
            var content = document.getElementById('content');
            // Toggle the display of the left drawer
            if (window.innerWidth <= 768) { // For phone screens (<= 768px)
                if (leftDrawer.style.display === 'none') {
                    leftDrawer.style.display = 'flex';
                    leftDrawer.style.flexDirection = 'column';
                    leftDrawer.style.width = '100%';
                    leftDrawer.style.zIndex = '99999';
                    leftDrawer.style.position = 'absolute';
                    content.style.width = '100%';
                } else {
                    leftDrawer.style.display = 'none';
                    content.style.width = '100%';
                }
            } else { // For lg or md screens (> 768px)
                if (leftDrawer.style.display === 'none') {
                    leftDrawer.style.display = 'block';
                    content.style.width = '80%';
                } else {
                    leftDrawer.style.display = 'none';
                    content.style.width = '100%';
                }
            }
        }

        // Adjust layout when window is resized
        // window.addEventListener('resize', adjustLayout);
    </script>



</body>

</html>
