</div>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>

    /**
     * Image popup
     */
    $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });


    /**
     * Delete Data
     */
    $(document).on('click', '.delete-btn', function () {

        let alax_load = `<span class="animate-spin inline-block w-4 h-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full" role="status" aria-label="loading"><span class="sr-only">Loading...</span></span>`
        let alax_load_sucess = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>`

        let email = $(this).data('email');
        let filename = $(this).data('filename');
        let id = $(this).data('user-id');
        const confirmed = confirm('Are you sure you want to delete this record?');

        if (confirmed) {
            $.ajax({
                url: '/record/delete',
                type: 'POST',
                data: {
                    email: email,
                    filename: filename,
                },
                beforeSend: function () {
                    $('.user-' + id).html(alax_load);
                },
                success: function (response) {
                    if (response.status === 200) {
                        $('.user-' + id).html(alax_load_sucess);
                    }
                    setTimeout(function () {
                        // Reload the page
                        location.reload();
                    }, 2000);
                }
            });
        }
    });
</script>
</html>