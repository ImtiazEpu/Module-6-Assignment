<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/"><p class="text-white px-3 py-2 text-2xl font-bold">Ostad | Module - 6</p></a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!--<a href="/" class="<?php /*= urlIs( '/' ) ? 'bg-gray-900 text-white' : 'text-gray-300' */ ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>-->
                        <a href="/records"
                           class="<?= urlIs( '/records' ) ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Records</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>