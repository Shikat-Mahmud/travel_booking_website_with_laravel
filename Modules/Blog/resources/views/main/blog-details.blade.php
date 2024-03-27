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

            <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0"
                style="background-image:url({{ $general->banner_image ? asset('storage/' . $general->banner_image) : asset('https://placehold.co/400') }});">
                <ul>
                    <li><a href="{{ route('blog.main') }}">Blog</a></li>
                    <li>News</li>
                </ul>
            </div>

            <!--page title end-->
            <div class="clearfix"></div>
            <div class="container">
                <div class="row my-custom-row">
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
                    <div class="col-md-9">
                        <div class="blog_single_page_wrapper">
                            <div class="travel_post_switcher">
                                @if ($previousPost)
                                    <a href="{{ route('blog.details', ['id' => $previousPost->id]) }}"
                                        class="previous_post">
                                        <i class="fa fa-caret-left"></i> Previous Post
                                    </a>
                                @endif

                                @if ($nextPost)
                                    <a href="{{ route('blog.details', ['id' => $nextPost->id]) }}" class="next_post">
                                        Next Post <i class="fa fa-caret-right"></i>
                                    </a>
                                @endif
                            </div>

                            <div class="travel_post">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="blog" width="801"
                                    height="310">
                                <h3>{{ $blog->title }}</h3>
                                <div class="travel_meta">
                                    <ul>
                                        <li>
                                            @if ($blog->category)
                                                <a href="#"><i class="fa fa-folder"></i> {{ $blog->category->name }}
                                                </a>
                                        </li>
                                        @endif
                                        <li><i class="fa fa-tags"></i>

                                            <a href="#">{{ $blog->tag_id }}</a>

                                        </li>
                                    </ul>
                                </div>
                                <div class="post_detail">
                                    <p>{{ strip_tags($blog->long_description) }}
                                    </p>

                                    <blockquote>
                                        <i class="fa fa-quote-left"></i> {{ $blog->short_description }}
                                    </blockquote>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="tagcloud">
                                            <i class="fa fa-tags"></i>
                                            <span class="tag_heading">Tags :</span>
                                            <aside class="widget widget_tag_cloud">
                                                <div class="tagcloud">
                                                    @php
                                                        $tags = explode(',', trim($blog->tag_id, '["]'));
                                                        $tags = array_filter($tags); // Remove empty elements
                                                    @endphp
                                                    @foreach ($tags as $tag)
                                                        <a href="#">{{ $tag }}</a>
                                                    @endforeach
                                                </div>
                                            </aside>
                                        </div>
                                    </div>

                                </div>
                                <div id="respond" class="comment-respond">
                                    <h3 id="reply-title" class="comment-reply-title">Leave a Comments<small><a
                                                rel="nofollow" id="cancel-comment-reply-link"
                                                href="https://kamleshyadav.com/wp/adelia/blog-image-post/#respond"
                                                style="display: none;">Cancel reply</a></small></h3>
                                    <!-- Comment form -->
                                    <form id="commentform" class="comment-form" action="{{ route('comments.store') }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        <p class="comment-notes hide">
                                            <span id="email-notes">Your email address will not be published.</span>
                                            Required fields are marked <span class="required">*</span>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="comment-form-author">
                                                    <label for="author">Name <span class="required">*</span></label>
                                                    <input type="text" name="name" placeholder="Name" size="30"
                                                        aria-required="true" required>

                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="comment-form-email">
                                                    <label for="email">Email <span class="required">*</span></label>
                                                    <input type="email" name="email" placeholder="Email" required
                                                        size="30" aria-required="true">
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="comment-form-url">
                                                    <label for="phone">Phone <span class="required">*</span></label>
                                                    <input type="text" name="phone" placeholder="Phone" required
                                                        size="30">
                                                </p>
                                            </div>


                                        </div>
                                        <p class="comment-form-comment">
                                            <label for="comment">Comment <span class="required">*</span></label>
                                            <textarea name="comment" placeholder="Comment" required cols="45" rows="8"
                                                aria-describedby="form-allowed-tags" aria-required="true"></textarea>
                                        </p>
                                        <p class="form-submit">
                                            <input name="submit" type="submit" id="submit"
                                                class="btn-travel btn-green" value="send">
                                        </p>

                                    </form>

                                </div>







                                <!-- Comment start -->
                                <div id="comments">
                                    <h3><span>({{ count($comments) }})</span>Comments</h3>
                                    <ol class="comment-list">
                                        @foreach ($comments as $comment)
                                            @if ($comment->status == 'approved')
                                                <li class="comment">
                                                    <div>
                                                        <div class="article">
                                                            <!-- Display comment author's avatar if available -->
                                                            <div class="gravatar"
                                                                style="background-color:{{ '#' . substr(md5($comment->name), 0, 6) }}">
                                                                <span>{{ strtoupper(substr($comment->name, 0, 1)) }}</span>
                                                            </div>
                                                            <div class="comment-body">
                                                                <div class="comment-meta">
                                                                    <div class="comment-author"><a
                                                                            href="javascript:;">{{ $comment->name }}</a>
                                                                    </div>
                                                                    <div class="comment-date">
                                                                        {{ $comment->created_at->diffForHumans() }}</div>
                                                                </div>
                                                                <!--/ .comment-meta-->
                                                                <p>{{ $comment->comment }}</p>
                                                            </div>
                                                            <!--/ .comment-body-->
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </div>
                                <!-- Comment end -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--content body end-->

        <!--Page main section end-->

    @endsection
