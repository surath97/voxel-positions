@props(['status', 'msg'])


<style>
    
    @keyframes fill {
        0% { width: 0%; }
        100% { width: 100%; }
    }
    .loading-bar {
        animation: fill 2500ms linear forwards;
    }

    @keyframes fadeOut {
        0% { opacity: 1; }
        100% { opacity: 0; }
    }

    .fade-out {
        animation: fadeOut 1s linear 2300ms forwards;
    }

</style>

<div id="flash" class="fade-out max-w-xl space-y-5 rounded-md fixed bottom-5 right-5 overflow-hidden drop-shadow-lg drop-shadow-indigo-500 bg-gray-50/75 text-gray-800">
    <div class="w-full h-2 bg-gray-300">

        @if ($status == "success")

            <div class="h-full bg-emerald-500 loading-bar"></div>

        @elseif ($status == "error")

            <div class="h-full bg-red-500 loading-bar"></div>
        
        @elseif ($status == "info")

            <div class="h-full bg-amber-500 loading-bar"></div>
        
        @endif

        {{-- <div class="h-full bg-{{ $color }} loading-bar"></div> --}}
    </div>
	<div class="flex items-center space-x-4 px-6 pb-6">

        @if ($status == "success")

            <x-tni-tick-circle class="w-8 h-8 text-emerald-500" />
            <span>{{ $msg }}</span>

        @elseif ($status == "error")

            <x-tni-x-circle class="w-8 h-8 text-red-500" />
            <span>{{ $msg }}</span>
        
        @elseif ($status == "info")

            <x-tni-info-circle class="w-8 h-8 text-amber-500" />
            <span>{{ $msg }}</span>
        
        @endif

    </div>
</div>


<script>

    

</script>