<!--footer start-->
<footer id="footer_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <aside class="widget widget_text">
                    <a href="Home_01.html">
                        <img src="{{ asset('storage/' . $generalSettings->logo) }}" alt=""
                            style="height: 50px; border-radius: 6px;">
                    </a>
                    <p>In 2015, We launched Travellers with the belief that other travellers would share our desire to experience authentic adventures in a responsible and sustainable manner. <br> <br> We've grown from a one-man show to a company of over 50 world wide, and from a handful of trips in all over the world. </p>
                    <a href="#">Read More <i class="fa fa-angle-right"></i></a>
                </aside>
            </div>
            <div class="col-lg-4 col-md-12">
                <aside class="widget widget_recent_entries">
                    <h4 class="widget-title">Recent Posts</h4>
                    @foreach (\Modules\Blog\App\Models\Blog::latest()->take(2)->get() as $item)
                    <ul>
                        <li>
                            <div>
                                <br>
                                <img src="{{ asset('storage/' . $item->image) }}" alt="blog" width="50" height="50"
                                    style="border-radius: 5px; min-width: 50px;">
                                <p>{{ $item->title }}</p>
                                <a href="{{ route('blog.details', ['id' => $item->id]) }}">Read More..</a>
                                <br>
                            </div>

                        </li>
                    </ul>
                    @endforeach
                </aside>
                <aside class="widget widget_links">
                    <h4 class="widget-title">Useful Links</h4>
                    @foreach ($pages as $page)
                        <ul>
                            <li><a href="{{ route('pages.fornt', $page->slug) }}">{{$page->title}}</a></li>
                        </ul>
                    @endforeach

                </aside>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('footer.search') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="location">All Destination</label>
                                    <select name="name" class="form-select form-select-sm" title="select destination">
                                        @forelse($destinations as $des)
                                        <option value="{{ $des->name }}">{{ $des->name }}</option>
                                        @empty 
                                        <option value="">Nothing here </option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" class="form-select form-select-sm"
                                        title="select category">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" value="{{ old('price') }}" name="price"
                                    placeholder="Enter your price" />
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <button type="submit" class="btn-travel rounded-2 btn-yellow">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <aside class="widget payment_method">
                    <h4 class="widget-title">Supported Payment Method</h4>
                    <a href="#"><img src="{{ asset('frontend/assets/images/Payment-Images.png') }}" alt="Payment Method" /></a>
                </aside>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6"> <span>Stay Connected with Us - </span> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-rss"></i></a> </div>
            <div class="col-md-6 col-sm-6 text-right"> <span>SEO Expate Bangladesh Ltd@2022. All Right Reserved</span> </div>
        </div>
    </div>
</div>
