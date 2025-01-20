@extends('frontend.layouts.app')

@section('title', 'Search')

@section('content')
    <section class="contact-wrapper section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="font-semibold title">Get in touch with us
                </h2>
                <p class="mt-2 font-normal text-neutral-500">Need any help?
            </div>
            <div class="row align-items-center pb-5">
                <div class="col-md-6 mb-4">
                    <div class="contact_info">
                        <div class="info_item">
                            <div class="d-flex gap-2 align-items-baseline">
                                <i class="fas fa-home"></i>
                                <div>
                                    <h6>Halpern House, 1-2 Hampshire Terrace,
                                    </h6>
                                    <p>Portsmouth, PO1 2Q, UK</p>
                                </div>
                            </div>
                        </div>
                        <div class="info_item">
                            <div class="d-flex gap-2 align-items-baseline">
                                <i class="fas fa-headphones"></i>
                                <div>
                                    <h6><a href="tel:+44 (0) 238 052 8262">+44 (0) 238 052 8262</a></h6>
                                    <p>Mon to Sat 9am to 6 pm</p>
                                </div>
                            </div>
                        </div>
                        <div class="info_item">
                            <div class="d-flex gap-2 align-items-baseline">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h6><a href="mailto:hello@bytestore.xyz">hello@bytestore.xyz</a></h6>
                                    <p>Send us your query anytime!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="contact-form">
                        {{-- @dd(auth()->user()->full_name) --}}
                        <form method="post" id="contact-form" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <input type="text" name="full_name" placeholder="Full Name" value="{{ auth()->check()?auth()->user()->full_name:'' }}" required="">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <input type="email" name="email" placeholder="Email Address" value="{{ auth()->check()?auth()->user()->email:'' }}" required="">
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" name="subject" placeholder="Subject" required="">
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea name="message" placeholder="Message" required=""></textarea>
                                </div>
                                <div class="form-group col-lg-12">
                                    <button class="text-white btn bg-primary-500  transition rounded-md px-2 cursor-pointer py-2" type="submit">
                                        <span class="btn-title">Send Message</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="subscribe">
        <div class="container">
            <div class="subscribe-form">
                <div class="section-title">
                    <h2 class="font-semibold title">Stay Up to Date </h2>
                    <p class="mt-2 font-normal text-neutral-500">Subscribe to our newsletter to receive our weekly feed.
                </div>
                <form action="">
                    <div class="flex max-w-xl mx-auto rounded-full bg-white mt-10 px-3 py-2">

                        <input type="text" placeholder="Email" class="p-2 outline-none w-full rounded-full px-3 py-3">
                        <button type="submit"
                            class="py-2 bg-primary-500 rounded-full text-white shadow-sm px-7">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @include('frontend.common.alert_js')
    <script>
        var load = $('.loader-overlay');
        $(document).ready(function() {
            load.hide();
        });
    </script>
@endsection
