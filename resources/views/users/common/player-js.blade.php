
<script>
    function playVideo(btnData){
            var vid = $(btnData).attr('youtubeid');
            load.show();
            $.ajax({
                url: "{{ route('users.youtube.player.data') }}",
                method: "POST",
                data: {
                    vid: vid,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    load.hide();
                    $('#videoPlayerModal').find('.modal-title').text(response.snippet.title);
                    $('#videoPlayerModal').find('.modal-body').html(response.player.embedHtml);
                    $('#videoPlayerModal').modal('show');

                    // const alt = Swal.fire({
                    //     title: response.snippet.title,
                    //     html: response.player.embedHtml,
                    //     showCloseButton: true,
                    //     showCancelButton: true,
                    //     showConfirmButton: false,
                    //     cancelButtonText:'close',
                    //     customClass: {
                    //         header: 'mr-5 pb-3',
                    //         title: 'fs-6 text-truncate',
                    //         actions: 'd-flex flex-row-reverse',
                    //     }
                    // });
                },
                error: function(xhr, status, error) {
                    load.hide();
                    console.log(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An unexpected error occurred. Please try again later.',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1500
                    });
                }
            });
        }

        $('#videoPlayerModal').on('hidden.bs.modal', () => {
            const modal = $('#videoPlayerModal');
            modal.find('.modal-body').html('');  // Clear the video content
        });
</script>
