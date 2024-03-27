<div class="col-md-3">
    <div class="travel_sidebar_wrapper">
        <aside class="widget widget_search">
            <form>
                <input type="search" placeholder="Search..." />
            </form>
        </aside>
        <aside class="widget widget_accordion">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title"> <a role="button" data-bs-toggle="collapse"
                                data-parent="#accordion" href="#All_Categories" aria-expanded="true">
                                All Categories </a> </h4>
                    </div>
                    <div id="All_Categories" class="panel-collapse collapse in show" role="tabpanel"
                        aria-labelledby="headingOne">
                        <div class="panel-body">
                            <aside class="widget widget_categories">
                                <!-- Squared THREE -->
                                @foreach ($blogs as $blog)
                                    <ul>
                                        <li>
                                            <input type="checkbox" value="None" id="All"
                                                name="check" />
                                            <label for="All">{{ $blog->category->name }}</label>
                                        </li>
                                    </ul>
                                @endforeach
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title"> <a class="collapsed" role="button"
                                data-bs-toggle="collapse" data-parent="#accordion" href="#Recent_Blog"
                                aria-expanded="false"> Recent Blog </a> </h4>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title"> <a class="collapsed" role="button"
                                data-bs-toggle="collapse" data-parent="#accordion" href="#Archives"
                                aria-expanded="false"> Archives </a> </h4>
                    </div>
                    <div id="Archives" class="panel-collapse collapse" role="tabpanel"
                        aria-labelledby="headingFour">
                        <div class="panel-body">
                            <aside class="widget widget_archive">
                                <ul>
                                    @foreach ($blogs as $blog)
                                        <li><a href="javascript:;">{{ $blog->date }}</a></li>
                                    @endforeach
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <h4 class="panel-title"> <a class="collapsed" role="button"
                                data-bs-toggle="collapse" data-parent="#accordion" href="#About_us"
                                aria-expanded="false"> About us </a> </h4>
                    </div>
                    <div id="About_us" class="panel-collapse collapse" role="tabpanel"
                        aria-labelledby="headingFive">
                        <div class="panel-body">
                            <aside class="widget widget_text">
                                <p>Welcome to our blog!<br>
                                    @foreach ($blogs as $blog)
                                        {{ $blog->short_description }}
                                    @endforeach
                                </p>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSix">
                        <h4 class="panel-title"> <a class="collapsed" role="button"
                                data-bs-toggle="collapse" data-parent="#accordion" href="#Flicker"
                                aria-expanded="false"> Flicker </a> </h4>
                    </div>
                    <div id="Flicker" class="panel-collapse collapse" role="tabpanel"
                        aria-labelledby="headingSix">
                        <div class="panel-body">
                            <aside class="widget widget_flickr">
                                <ul>
                                    @foreach ($blogs as $blog)
                                        <li><a href="#"><img
                                                    src="{{ asset('storage/' . $blog->image) }}"
                                                    alt="blog" width="801" height="310"></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>


