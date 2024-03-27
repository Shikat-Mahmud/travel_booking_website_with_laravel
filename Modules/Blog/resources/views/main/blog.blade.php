@extends('frontend.master')
@section('title', 'Travelite - Tours and Travels Online Booking')
@push('styles')
    <style>
        .my-custom-row {
            margin-top: 100px !important;

            margin-bottom: 100px !important;

        }

        .page_title {
            /* background-size: 1599px 640px; */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>
@endpush
@section('content')

    <!--Page main section start-->
    <div id="travel_wrapper">
        <!--content body start-->
        <div id="content_wrapper">
            <!--page title start-->
            @php
            $general = generalSettings();
        @endphp
        
        @if ($general && $general->banner_image)
            <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0"
                style="background-image: url('{{ asset('storage/' . $general->banner_image) }}'); background-size: cover;">
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li>News</li>
                </ul>
            </div>
        @else
            <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0"
                style="background-image: url('{{ asset('https://placehold.co/400') }}'); background-size: cover;">
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li>News</li>
                </ul>
            </div>
        @endif
        


            <!--page title end-->

            <div class="clearfix"></div>
            <div class="container">
                <div class="row  my-custom-row">

                    <!-- asides -->
                    <div class="col-md-3">
                        <div class="travel_sidebar_wrapper">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Recent Blogs
                                </h4>
                            </div>
                            @foreach ($recentBlogs as $blog)
                            <div class="container m-1 p-2"
                                style="background: #d8d8d8; border-radius: 6px; display: flex; align-items: center;">
                                <a href="{{ route('blog.details', ['id' => $blog->id]) }}"
                                    style="margin-right: auto; color: black; text-decoration: none;">
                                    {{ $blog->title }}
                                </a>
                                <a href="{{ route('blog.details', ['id' => $blog->id]) }}" style="margin-left: auto;">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="blog" width="50" height="50"
                                        style="border-radius: 5px; min-width: 50px;">
                                </a>
                            </div>
                        @endforeach
                        
                        

                        </div>
                    </div>
                    <!-- asides -->

                    <div class="col-md-9">
                        <div class="post_wrapper">
                            <div class="travel_loader"> <img src="assets/images/icon/travel_loader.gif" alt="" />
                            </div>
                            @if ($blogs->isEmpty())
                                <div class="travel_post">
                                    <h2>No blog posts available here</h2>
                                </div>
                            @else
                                @foreach ($blogs as $blog)
                                    <div class="travel_post">
                                        <h3>{{ $blog->title }}</h3>
                                        <div class="travel_meta">
                                            <ul>
                                                <li>
                                                    @if ($blog->category)
                                                        <a href="#"><i class="fa fa-folder"></i>
                                                            {{ $blog->category->name }} </a>
                                                </li>
                                @endif
                                <li><i class="fa fa-tags"></i>
                                    @php
                                        $tags = explode(',', $blog->tag_id);
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <a href="#">{{ $tag }}</a>
                                    @endforeach
                                </li>


                                </ul>
                        </div>
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="blog" width="801" height="310">
                        <p>{{ Illuminate\Support\Str::limit(strip_tags($blog->long_description), 100, '...') }}
                        </p>
                        <a href="{{ route('blog.details', ['id' => $blog->id]) }}" class="btn-travel btn-green">Read
                            More</a>
                    </div>
                    @endforeach
                    @endif

                    {{-- pagination --}}

                    @if ($blogs->total() > 3)
                        <div class="travel_pagination">
                            <ul class="travel_pagination">
                                @if ($blogs->onFirstPage())
                                    <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                @else
                                    <li><a href="{{ $blogs->previousPageUrl() }}"><i
                                                class="fa fa-angle-double-left"></i></a></li>
                                @endif

                                @for ($page = max(1, $blogs->currentPage() - 2); $page <= min($blogs->lastPage(), $blogs->currentPage() + 2); $page++)
                                    <li class="{{ $blogs->currentPage() == $page ? 'active' : '' }}"><a
                                            href="{{ $blogs->url($page) }}">{{ $page }}</a></li>
                                @endfor

                                @if ($blogs->hasMorePages())
                                    <li><a href="{{ $blogs->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a>
                                    </li>
                                @else
                                    <li class="disabled"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <!--content body end-->
    </div>
    <!--Page main section end-->


@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('.blog-checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        var blogId = this.id.split('_')[1];
                        window.location.href = "{{ url('blog-details/') }}/" + blogId;
                    }
                });
            });
        });
    </script>
@endpush
