<div class="modal fade" id="videoPlayerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Video Title</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 video-viewer">
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <a class="d-flex justify-content-center align-items-center border rounded-pill p-2 px-4" id="user-view" href="">
                    <img src="" class="rounded-full w-10 h-10">
                    <div class="ms-2" id="info">
                        <h5 class="fs-5 fw-bold text-secondary"></h5>
                        <span class="fs-6 fw-normal fst-italic text-secondary"></span>
                    </div>
                </a>
                <div class="">
                    <button class="btn btn-secondary disabled" id="viewCount" type="button" ><span class="me-2"></span><i class="fa-light fa-eye"></i></button>
                    <button class="btn btn-primary" id="likeButton" type="button" onclick="likeContent(this)" data-id=""><span class="me-2">( 5 )</span><i class="fa-solid fa-thumbs-up"></i></button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Stop</button>
                </div>
            </div>
        </div>
    </div>
</div>
