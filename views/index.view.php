<?php require( 'partials/header.php' ) ?>
<?php require( 'partials/nav.php' ) ?>
<div class="isolate bg-white py-24 px-6 sm:py-32 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
        <p class="text-3xl font-normal tracking-tight text-gray-900 sm:text-xl">Assignment</p>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Submit a Record</h2>
    </div>
    <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20" enctype="multipart/form-data">
        <div class="relative z-0 w-full mb-6 group">
            <label for="name" class="block text-sm font-medium mb-2 text-gray-700">Full name</label>
            <input type="text" id="name" name="name"
                   class="py-3 px-4 block w-full border border-gray-300 rounded-md text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-400"
                   placeholder="Full name">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="email" class="block text-sm font-medium mb-2 text-gray-700">Email</label>
            <input type="email" id="email" name="email"
                   class="py-3 px-4 block w-full border border-gray-300 rounded-md text-sm focus:outline-none focus:border-blue-500 ffocus:ring-1 ocus:ring-blue-500 text-gray-400"
                   placeholder="you@site.com">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <div class="relative z-0 w-full mb-6 group">
                <label for="password" class="block text-sm font-medium mb-2 text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                       class="py-3 px-4 block w-full border border-gray-300 rounded-md text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-400"
                       placeholder="Password">
            </div>
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="profile-picture" class="sr-only">Choose file</label>
            <input type="file" name="profile-picture" id="profile-picture"
                   class="block w-full border border-gray-300 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-400 file:border-0 file:bg-gray-200 file:mr-4 file:py-3 file:px-4 file:text-gray-400">
        </div>
        <button type="submit"
                class="block w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </button>
    </form>
</div>
<?php require( 'partials/footer.php' ) ?>
