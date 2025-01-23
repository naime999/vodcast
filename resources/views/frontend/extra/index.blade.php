@extends('frontend.layouts.app')

@section('title', 'Home')
@section('css')
    <style>
        .no-arrow::after {
            content: none;
            /* Removes the arrow content */
        }
    </style>
@endsection
@section('content')
    <section class="terms-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-9">
                    <div class="section-title text-center">
                        <h2 class="font-semibold title ">Terms And Conditions</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed
                            cursus ante dapibus diam cursus ante.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="terms-inner-container">
                    <p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur. <span class="text-underline">Excepteur sint occaecat cupidatat non
                            proident</span>, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                        dicta sunt explicabo.</p>
                    <p>Voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                        voluptatem sequi nesciunt. <span class="text-underline">Neque porro quisquam est, qui dolorem ipsum
                            quia dolor sit amet,</span> consectetur, adipisci velit, sed quia non numquam eius modi tempora
                        incidunt ut labore.</p>
                    <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                        aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit
                        esse quam nihil molestiae
                        consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>
                    <p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur. <span class="text-underline">Excepteur sint occaecat cupidatat non
                            proident</span>, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.</p>
                    <blockquote class="blockquote bg-offwhite">
                        <i class="fas fa-quote-left sc-color "></i>
                        <p class="mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor.</p>
                    </blockquote>
                    <ul class="custom-list list-red">
                        <li><strong>Qualified:</strong> Certified with 70+ years total experience...</li>
                        <li><strong>Effective:</strong>​ High quality treatments trigger rapid healing...</li>
                        <li><strong>Safe:</strong> Proper procedures used to minimize future damage...</li>
                        <li><strong>​Trusted:</strong> Recommended by hundreds of happy clients...</li>
                        <li><strong>​Local:</strong> Local: Healing [Boise] area residents for 40+ years...</li>
                        <li><strong>​Preferred Provider:</strong> ​Preferred Provider: Working with insurance companies to
                            reduce or eliminate your out of pocket costs...</li>
                    </ul>
                    <p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur. <span class="text-underline">Excepteur sint occaecat cupidatat non
                            proident</span>, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.</p>
                    <blockquote class="blockquote bg-offwhite">
                        <i class="fas fa-quote-left sc-color "></i>
                        <p class="mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor.</p>
                    </blockquote>
                    <ul class="custom-list list-red">
                        <li><strong>Qualified:</strong> Certified with 70+ years total experience...</li>
                        <li><strong>Effective:</strong>​ High quality treatments trigger rapid healing...</li>
                        <li><strong>Safe:</strong> Proper procedures used to minimize future damage...</li>
                        <li><strong>​Trusted:</strong> Recommended by hundreds of happy clients...</li>
                        <li><strong>​Local:</strong> Local: Healing [Boise] area residents for 40+ years...</li>
                        <li><strong>​Preferred Provider:</strong> ​Preferred Provider: Working with insurance companies to
                            reduce or eliminate your out of pocket costs...</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        var load = $('.loader-overlay');
        $(document).ready(function() {
            load.hide();
        });

        function addPlaylist(data) {
            var videoId = $(data).attr('data-id');
            load.show();
            $.ajax({
                url: "{{ route('users.view.playlist.get') }}",
                method: "POST",
                data: {
                    playlist_id: 0,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(data) {
                    load.hide();
                    console.log(data);
                    $('#add-playlist').find('input[name="video_id"]').val(videoId);
                    var html = $('#playlist-items').html('');
                    data.forEach(item => {
                        var checked = '';
                        if (item.list_items.some(citem => citem.content_id == videoId)) {
                            checked = 'checked';
                        }
                        var itemHtml = '<li class="list-group-item">' +
                            '    <div class="form-check">' +
                            '        <input class="form-check-input" type="checkbox" name="labels[]" value="' +
                            item.id + '" id="flexCheckChecked" ' + checked + '>' +
                            '        <label class="form-check-label" for="flexCheckChecked">' + item
                            .name + '</label>' +
                            '    </div>' +
                            '</li>';
                        html.append(itemHtml);
                    });
                    $('#playlistAddModal').modal('show');
                }
            });
        }
    </script>
@endsection
