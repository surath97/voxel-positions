<footer class="bg-gradient-to-r from-white/10 to-indigo-500/50 mt-20">
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <img width="100px" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
            </div>

            <div class="flex space-x-5">
                <x-tni-github class="size-5" />
                <x-tni-facebook class="size-5" />
                <x-tni-instagram class="size-5" />
                <x-tni-twitter class="size-5" />
                <x-tni-envelope class="size-5" />
            </div>

            <p class="mt-4 text-center text-sm text-gray-500 lg:mt-0 lg:text-right dark:text-gray-400">
                Copyright &copy; 2025. All rights reserved.
            </p>
        </div>
        <div class="flex gap-2 px-2 py-3 mt-4 italic">
            Made with <x-tni-heart-circle class="text-red-600 size-5" /> by Surath
        </div>
    </div>
</footer>