<?php require( 'partials/header.php' ) ?>
<?php require( 'partials/nav.php' ) ?>
<div class="isolate bg-white py-24 px-6 sm:py-32 lg:px-8 mx-auto">
    <div class="mx-auto max-w-2xl text-center">
        <p class="text-3xl font-normal tracking-tight text-gray-900 sm:text-xl">Assignment</p>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Records</h2>
    </div>
    <div class="flex flex-col mt-16 mx-auto max-w-6xl">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <a href="/">
                    <button type="button"
                            class="mb-3 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                        Add new record
                    </button>
                </a>
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        <?php
                        $file_name = 'users.csv';
                        if ( file_exists( $file_name ) ):
                            if ( filesize( $file_name ) !== 0 ):
                                $fp = fopen( $file_name, 'r' );
                                $i = 1;
                                while ( ( $userData = fgetcsv( $fp ) ) !== false ) :
                                    ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500"><?php echo htmlspecialchars( $userData[ 0 ] ) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 "><?php echo htmlspecialchars( $userData[ 1 ] ) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a class="text-blue-500 hover:text-blue-700 image-popup"
                                               href="<?php echo( $userData[ 2 ] ) ?>">View</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium delete-action">
                                            <button title="Delete" type="button"
                                                    class="delete-btn inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2rem] w-[2rem] rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-1 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm  focus:ring-offset-red-500 user-<?php echo $i ?>"
                                                    data-user-id="<?php echo $i ?>"
                                                    data-email="<?php echo( $userData[ 1 ] ) ?>"
                                                    data-filename="<?php echo( $userData[ 2 ] ) ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                     fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                                                </svg>
                                            </button>
                                        </td>

                                    </tr>
                                    <?php
                                    $i++;
                                endwhile;
                                fclose( $fp );
                            else:
                                ?>
                                <tr>
                                    <td colspan="100%"
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500"><?php echo htmlspecialchars( 'There is no recode yet' ) ?></td>
                                </tr>
                            <?php
                            endif;
                        else:
                            ?>
                            <tr>
                                <td colspan="100%"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500"><?php echo htmlspecialchars( 'There is no recode yet' ) ?></td>
                            </tr>
                        <?php
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require( 'partials/footer.php' ) ?>
