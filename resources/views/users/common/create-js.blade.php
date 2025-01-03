
<script>
    $(document).on("input", ".youtube-playlist-id", function () {
        var id = $(this).val().trim(); // Get the input value
        $.ajax({
            url: "{{ route('users.youtube.playlist.data') }}",
            method: "POST",
            data: {
                id: id,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // $(".video-view").html(response.player.embedHtml);
                swal.fire({
                    title: "Are you sure?",
                    text: "Use this playlist, like title, thumbnail and playlist",
                    icon: "info",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: `Yes`,
                    cancelButtonText: `No`,
                }).then((result) => {
                    console.log(result);
                    if (result.value === true) {
                        $('#create-youtube-playlist').find('input[name="title"]').val(response.snippet.title);
                        $('#create-youtube-playlist').find('input[name="thumbnail_url"]').val(response.snippet.thumbnails.maxres.url);
                        $('#create-youtube-playlist').find('textarea[name="description"]').val(response.snippet.description);
                    }else{
                        $('#create-youtube-playlist').find('input[name="title"]').val("");
                        $('#create-youtube-playlist').find('input[name="thumbnail_url"]').val("");
                        $('#create-youtube-playlist').find('textarea[name="description"]').val("");
                    }
                });
            },
            error: function(xhr, status, error) {
                $(".video-view").html('<span class="text-danger"> The video ID is incorrect </span>');
            }
        });
    });
</script>
