
<script>
    function playVideo(btnData){
        var vid = $(btnData).attr('youtubeid');
        load.show();
        $.ajax({
            url: "{{ route('youtube.player.data') }}",
            method: "POST",
            data: {
                vid: vid,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                load.hide();
                var authurl = "{{ url('author/user') }}/" + response.content.user.uid;
                $('#videoPlayerModal').find('.modal-title').text(response.yt.snippet.title);
                $('#videoPlayerModal').find('.modal-body').html(response.yt.player.embedHtml);
                $('#videoPlayerModal iframe').css({width: '100%', height: '550px'});
                $('#user-view').attr('href', authurl);
                $('#user-view').find('img').attr('src', response.content.user.avatar_url);
                $('#info h5').text(response.content.user.full_name);
                $('#info span').text(response.content.user.role_name);
                $('#viewCount span').text('( '+response.content.views+' )');
                $('#videoPlayerModal').find('#likeButton').attr('data-id', response.content.id);
                $('#videoPlayerModal').find('#likeButton span').text('( '+response.content.likes+' )');
                $('#videoPlayerModal').modal('show');
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

    function playPlaylist(btnData){
        var vid = $(btnData).attr('youtubeid');
        load.show();
        $.ajax({
            url: "{{ route('youtube.playlist.data') }}",
            method: "POST",
            data: {
                id: vid,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                load.hide();
                var html = '';
                var key = 0
                response.yt.items.forEach(item => {
                    // console.log(item);
                    var active = key == 0 ? 'active-item' : '';
                    var view = '<div class="list-group-item list-group-item-action '+active+'" onclick="playVideoInPlaylist(this)" data-id="'+item.snippet.resourceId.videoId+'">'+
                    '               <div class="row">'+
                    '                   <div class="col-md-4">'+
                    '                       <img class="rounded" src="'+item.snippet.thumbnails.high.url+'">'+
                    '                   </div>'+
                    '                   <div class="col-md-8">'+
                    '                       <h6>'+item.snippet.title+'</h6>'+
                    '                   </div>'+
                    '               </div>'+
                    '           </div>';
                    html += view;
                    key++;
                });
                $('#playlist-video-items').html(html);
                $('#playlist-video-items').find('.active-item').click();
                $('#likeButton-playlist').attr('data-id', response.content.id);
                $('#likeButton-playlist span').text('( '+response.content.likes+' )');
                $('#playlistPlayerModal').modal('show');
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

    function playVideoInPlaylist(btnData){
        var vid = $(btnData).attr('data-id');
        $('#playlist-video-items').find('.active-item').removeClass('active-item');
        $(btnData).addClass('active-item');
        $.ajax({
            url: "{{ route('youtube.data') }}",
            method: "POST",
            data: {
                id: vid,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#playlist-viewer').html(response.player.embedHtml);
                $('#playlist-viewer iframe').css({width: '100%', height: '400px'});
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

    function likeContent(btnData){
        var contentId = $(btnData).attr('data-id');
        $.ajax({
            url: "{{ route('content.like') }}",
            method: "POST",
            data: {
                id: contentId,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                $(btnData).find('span').text('( '+response.likes+' )');
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
</script>
