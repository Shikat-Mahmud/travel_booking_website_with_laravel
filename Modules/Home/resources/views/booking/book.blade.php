@extends('frontend.master')
@section('title', 'Booking')

@section('content')
    <div id="content_wrapper">
        <!--page title Start-->
        <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(assets/images/bg/page_title_bg.jpg);">
            <ul>
                <li><a href="javascript:;">Tour package - booking</a></li>
            </ul>
        </div>
        <!--page title end-->
        <div class="clearfix"></div>
        <div class="full_width destinaion_sorting_section">

            <div class="container">
                <div class="row space_100">

                    <!-- right main start -->
                    <div class="col-lg-12">
                        <div class="tour_package_booking_section">
                            <!-- package tabs start -->
                            <div id="tour_booking_tabs">
                                <!-- tabs start -->
                                <div class="tour_booking_tabs">
                                    <ul>
                                        <li><a href="#booking_details">Booking Details</a></li>
                                        <li><a href="#personal_info">Personal Info</a></li>
                                        <li><a href="#payment_info">Payment Info</a></li>
                                        <li><a href="#confirmation">Confirmation</a></li>
                                    </ul>
                                </div>
                                <!-- tabs end -->
                                <!-- booking_details Start -->
                                <div id="booking_details" class="main_content_area">
                                    <div class="inner_container">
                                        <!--  tab inner section Start -->
                                        <div class="tab_inner_section">
                                            <div class="heading_tab_inner">
                                                <h5>Tour package Details</h5>
                                                <span>change tour</span> </div>
                                            <div class="tab_inner_body full_width">
                                                <!--  review area start -->
                                                <div class="tab_review_area">

                                                @if (isset($package->image))
                                                    <div class="item"><img src="{{ asset(json_decode($package->image)[0]) }}" alt="slide"></div>
                                                @else
                                                    <div class="item"><img src="https://placehold.co/400" alt="Default Image"></div>
                                                @endif

                                                <div class="review_content">
                                                    <div class="top_head_bar">
                                                        <h4>{{ $package->name }}</h4>
                                                        <span class="country_span">{{ $package->location }}</span>
                                                    </div>
                                                    <div class="top_head_bar">
                                                        <span class="time_date"><i class="fa fa-clock-o"></i>{{ $package->duration }}</span>
                                                        <span class="time_date"><i class="fa fa-person"></i>{{ $package->person }}</span> 
                                                    </div>

                                                    <div class="review_star_cover" style="border-top: none !important;">
                                                            <div class="row mt-3">
                                                                <div class="right_includes col-md-12">
                                                                    <h6 class="includes_text">Includes:</h6>
                                                                    <ul class="d-flex">
                                                                    @if (isset($package->includes))
                                                                    @php
                                                                        $includesArray = explode(', ', $package->includes);
                                                                    @endphp

                                                                    @foreach ($includesArray as $include)
                                                                        <li class="mr-2 p-2"><i class="fa-solid fa-hand-point-right"></i> {{ $include }}</li>
                                                                    @endforeach
                                                                    @endif
                                                                    </ul>
                                                                </div>

                                                                <div class="right_includes col-md-12">
                                                            <h6 class="includes_text">Excludes:</h6>
                                                            <ul class="d-flex">
                                                            @if (isset($package->excludes))
                                                                @php
                                                                    $excludesArray = explode(', ', $package->excludes);
                                                                @endphp

                                                                @foreach ($excludesArray as $exclude)
                                                                    <li class="mr-2 p-2"><i class="fa-solid fa-hand-point-right"></i> {{ $exclude }}</li>
                                                                @endforeach
                                                            @endif
                                                            </ul>
                                                        </div>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                </div>

                                                <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
                                                @csrf
                                                <!-- tab include area Start -->
                                                <div class="inludes_section">
                                                
                                                    <div class="container row">
                                                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                                                        <div class="pullleft col-md-6">
                                                            <label>Available on</label>
                                                            <input type="date" class="form-control" name="booking_date" value="{{ old('booking_date') }}" required>
                                                        </div>
                                                        
                                                        <div class="pullleft col-md-6">
                                                            <label>Person</label>
                                                            <input type="number" class="form-control" name="number_of_people" value="{{ old('number_of_people') }}" placeholder="Number" max="{{ $package->person }}" min="1" required>
                                                        </div>

                                                        <div class="pullleft col-md-12 mt-3">
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- tab include area End -->
                                            </div>
                                        </div>
                                        <!--  tab inner section End -->
                                    </div>
                                    <!-- proceed button -->
                                    <div class="full_width t_align_c">
                                        <!-- <button type="submit" value="proceed to next step" class="btn_green proceed_buttton btns">proceed to next step</button> -->
                                    </div>
                                    <!-- proceed button -->
                                </div>
                                <!-- booking_details End -->
                                <!-- personal_info Start -->
                                <div id="personal_info" class="main_content_area">
                                    <!--  tab inner section three Start -->
                                    <div class="inner_container">
                                        
                                            <div class="tab_inner_section inner_section_2">
                                                <div class="tab_inner_body full_width">
                                                    <!--  package_booking_form start -->
                                                    <div class="package_booking_form">
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="First Name" name="booking[firstname]" class="booking_input" value="{{ old('firstname') }}" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Last Name" name="booking[lastname]" class="booking_input" value="{{ old('lastname') }}" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="email" placeholder="Email" name="booking[email]" class="booking_input" value="{{ old('email') }}" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Phone Number" name="booking[phone_number]" class="booking_input" value="{{ old('phone_number') }}" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Address" name="booking[address]" class="booking_input" value="{{ old('address') }}" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <!--  package_booking_form END -->
                                                </div>
                                                <!--  tab_inner_body end -->
                                            </div>
                                            <!--  tab inner three section End -->
                                            <!-- proceed button -->
                                            <div class="full_width t_align_c">
                                                <button type="submit" value="proceed to next step" class="btn_green proceed_buttton btns">Submit Booking</button>
                                            </div>
                                            <!-- proceed button -->
                                        </form>
                                    </div>
                                    <!--  inner container end -->
                                </div>
                                <!-- personal_info End -->
                                <!-- payment_info Start -->
                                <div id="payment_info" class="main_content_area">
                                    <!-- inner_container Start -->
                                    <div class="inner_container">
                                        <!--  tab inner three section Start -->
                                        <div class="tab_inner_section">
                                            <div class="heading_tab_inner">
                                                <h5>payment Details</h5>
                                            </div>
                                            <!--  tab_inner_body Start-->
                                            <div class="tab_inner_body full_width">
                                                <div class="payment_details_main">
                                                    <!-- Review content main -->
                                                    <div class=" col-lg-8 col-md-8 review_content">
                                                        <div class="top_head_bar">
                                                            <h4>Glimpses Of Australia</h4>
                                                            <span class="country_span">Australia</span> <span class="time_date"><i class="fa fa-clock-o"></i>3days</span> </div>
                                                        <div class="review_star_cover">
                                                            <div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                                            <span>345 Reviews</span> </div>
                                                    </div>
                                                    <!-- Review content main -->
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="payment_table">
                                                            <ul>
                                                                <li> <span>base price</span><span>$1000</span> </li>
                                                                <li> <span>exlia persons(1)</span><span>$1000</span> </li>
                                                                <li> <span>Taxes</span><span>$120</span> </li>
                                                                <li> <span>discount</span><span>(-)$1000</span> </li>
                                                                <li class="total_row"> <span>Total</span><span>$1900</span> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- payment_details_main end -->
                                            </div>
                                            <!--  tab_inner_body end -->
                                        </div>
                                        <!--  tab inner three section End -->
                                        <!--  tab inner  section start -->
                                        <div class="tab_inner_section">
                                            <div class="heading_tab_inner">
                                                <h5>payment method</h5>
                                            </div>
                                            <!--  tab_inner_body Start-->
                                            <div class="tab_inner_body full_width">
                                                <div class="payment_mathod_tabs" id="payment_vertical_tabs">
                                                    <div class="payment_vertical_tabs">
                                                        <ul>
                                                            <li><a href="#credit_card">credit card</a></li>
                                                            <li><a href="#debit_card">debit card</a></li>
                                                            <li><a href="#net_banking">net banking</a></li>
                                                            <li><a href="#paypal">paypal</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- credit card  content -->
                                                    <div id ="credit_card" class="vertical_tab_content">
                                                        <!-- Inner Body Payment Start -->
                                                        <div class="inner_body_payment">
                                                            <form class="payment_method_form">
                                                                <fieldset>
                                                                    <label>Card Holder’s Name (please enter the same name which is written on your card)</label>
                                                                    <input type="text" placeholder="Name On Card" class="input_card">
                                                                </fieldset>
                                                                <fieldset>
                                                                    <label>Credit Card Number</label>
                                                                    <input type="text" placeholder="Name On Card" class="input_credit_card">
                                                                    <a href="#"><img src="assets/images/tour-booking/card1.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card3.jpg" alt="debit card"></a>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="select_tabs">
                                                                        <label>Expiry Date</label>
                                                                        <select>
                                                                            <option>month</option>
                                                                            <option>january</option>
                                                                            <option>fabuary</option>
                                                                            <option>march</option>
                                                                            <option>april</option>
                                                                            <option>may</option>
                                                                            <option>june</option>
                                                                            <option>july</option>
                                                                            <option>august</option>
                                                                            <option>september</option>
                                                                            <option>november</option>
                                                                            <option>december</option>
                                                                        </select>
                                                                        <select>
                                                                            <option>year</option>
                                                                            <option>2010</option>
                                                                            <option>2011</option>
                                                                            <option>2012</option>
                                                                            <option>2013</option>
                                                                            <option>2014</option>
                                                                            <option>2015</option>
                                                                            <option>2022</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="cvv_input">
                                                                        <label>CVV</label>
                                                                        <input type="text"  class="cvv">
                                                                    </div>
                                                                </fieldset>
                                                                <div class="checkbox_section">
                                                                    <div class="checkbox_book">
                                                                        <input id="tabcheck" type="checkbox" name="tabcheck" value="tabcheck">
                                                                        <label for="tabcheck">Yes, I have read and I agree to the booking conditions</label>
                                                                    </div>
                                                                    <button type="submit" value="proceed payment" class="btn_green proceed_buttton btns">proceed payment</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- Inner Body Payment End -->
                                                    </div>
                                                    <!-- credit card content end -->
                                                    <!-- debit card content start -->
                                                    <div id ="debit_card" class="vertical_tab_content">
                                                        <!-- Inner Body Payment Start -->
                                                        <div class="inner_body_payment">
                                                            <form class="payment_method_form">
                                                                <fieldset>
                                                                    <label>Card Holder’s Name (please enter the same name which is written on your card)</label>
                                                                    <input type="text" placeholder="Name On Card" class="input_card">
                                                                </fieldset>
                                                                <fieldset>
                                                                    <label>Credit Card Number</label>
                                                                    <input type="text" placeholder="Name On Card" class="input_credit_card">
                                                                    <a href="#"><img src="assets/images/tour-booking/card1.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card3.jpg" alt="debit card"></a>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="select_tabs">
                                                                        <label>Expiry Date</label>
                                                                        <select>
                                                                            <option>month</option>
                                                                            <option>january</option>
                                                                            <option>fabuary</option>
                                                                            <option>march</option>
                                                                            <option>april</option>
                                                                            <option>may</option>
                                                                            <option>june</option>
                                                                            <option>july</option>
                                                                            <option>august</option>
                                                                            <option>september</option>
                                                                            <option>november</option>
                                                                            <option>december</option>
                                                                        </select>
                                                                        <select>
                                                                            <option>year</option>
                                                                            <option>2010</option>
                                                                            <option>2011</option>
                                                                            <option>2012</option>
                                                                            <option>2013</option>
                                                                            <option>2014</option>
                                                                            <option>2015</option>
                                                                            <option>2022</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="cvv_input">
                                                                        <label>CVV</label>
                                                                        <input type="text"  class="cvv">
                                                                    </div>
                                                                </fieldset>
                                                                <div class="checkbox_section">
                                                                    <div class="checkbox_book">
                                                                        <input id="tabcheck1" type="checkbox" name="tabcheck" value="tabcheck">
                                                                        <label for="tabcheck1">Yes, I have read and I agree to the booking conditions</label>
                                                                    </div>
                                                                    <button type="submit" value="proceed payment" class="btn_green proceed_buttton btns">proceed payment</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- Inner Body Payment End -->
                                                    </div>
                                                    <!-- debit card content End -->
                                                    <!-- Net Banking  content Start -->
                                                    <div id ="net_banking" class="vertical_tab_content">
                                                        <!-- Inner Body Payment Start -->
                                                        <div class="inner_body_payment">
                                                            <form class="payment_method_form">
                                                                <fieldset>
                                                                    <label>Card Holder’s Name (please enter the same name which is written on your card)</label>
                                                                    <input type="text" placeholder="Name On Card" class="input_card">
                                                                </fieldset>
                                                                <fieldset>
                                                                    <label>Credit Card Number</label>
                                                                    <input type="text" placeholder="Name On Card" class="input_credit_card">
                                                                    <a href="#"><img src="assets/images/tour-booking/card1.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card3.jpg" alt="debit card"></a>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="select_tabs">
                                                                        <label>Expiry Date</label>
                                                                        <select>
                                                                            <option>month</option>
                                                                            <option>january</option>
                                                                            <option>fabuary</option>
                                                                            <option>march</option>
                                                                            <option>april</option>
                                                                            <option>may</option>
                                                                            <option>june</option>
                                                                            <option>july</option>
                                                                            <option>august</option>
                                                                            <option>september</option>
                                                                            <option>november</option>
                                                                            <option>december</option>
                                                                        </select>
                                                                        <select>
                                                                            <option>year</option>
                                                                            <option>2010</option>
                                                                            <option>2011</option>
                                                                            <option>2012</option>
                                                                            <option>2013</option>
                                                                            <option>2014</option>
                                                                            <option>2015</option>
                                                                            <option>2022</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="cvv_input">
                                                                        <label>CVV</label>
                                                                        <input type="text"  class="cvv">
                                                                    </div>
                                                                </fieldset>
                                                                <div class="checkbox_section">
                                                                    <div class="checkbox_book">
                                                                        <input id="tabcheck2" type="checkbox" name="tabcheck" value="tabcheck">
                                                                        <label for="tabcheck2">Yes, I have read and I agree to the booking conditions</label>
                                                                    </div>
                                                                    <button type="submit" value="proceed payment" class="btn_green proceed_buttton btns">proceed payment</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- Inner Body Payment End -->
                                                    </div>
                                                    <!-- Net Banking  content End -->
                                                    <!-- Paypal card content Start -->
                                                    <div id ="paypal" class="vertical_tab_content">
                                                        <!-- Inner Body Payment Start -->
                                                        <div class="inner_body_payment">
                                                            <form class="payment_method_form">
                                                                <fieldset>
                                                                    <label>Card Holder’s Name (please enter the same name which is written on your card)</label>
                                                                    <input type="text" placeholder="Name On Card" class="input_card">
                                                                </fieldset>
                                                                <fieldset>
                                                                    <label>Credit Card Number</label>
                                                                    <input type="text" placeholder="Name On Card" class="input_credit_card">
                                                                    <a href="#"><img src="assets/images/tour-booking/card1.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="assets/images/tour-booking/card3.jpg" alt="debit card"></a>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="select_tabs">
                                                                        <label>Expiry Date</label>
                                                                        <select>
                                                                            <option>month</option>
                                                                            <option>january</option>
                                                                            <option>fabuary</option>
                                                                            <option>march</option>
                                                                            <option>april</option>
                                                                            <option>may</option>
                                                                            <option>june</option>
                                                                            <option>july</option>
                                                                            <option>august</option>
                                                                            <option>september</option>
                                                                            <option>november</option>
                                                                            <option>december</option>
                                                                        </select>
                                                                        <select>
                                                                            <option>year</option>
                                                                            <option>2010</option>
                                                                            <option>2011</option>
                                                                            <option>2012</option>
                                                                            <option>2013</option>
                                                                            <option>2014</option>
                                                                            <option>2015</option>
                                                                            <option>2022</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="cvv_input">
                                                                        <label>CVV</label>
                                                                        <input type="text"  class="cvv">
                                                                    </div>
                                                                </fieldset>
                                                                <div class="checkbox_section">
                                                                    <div class="checkbox_book">
                                                                        <input id="tabcheck3" type="checkbox" name="tabcheck" value="tabcheck">
                                                                        <label for="tabcheck3">Yes, I have read and I agree to the booking conditions</label>
                                                                    </div>
                                                                    <button type="submit" value="proceed payment" class="btn_green proceed_buttton btns">proceed payment</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- Inner Body Payment End -->
                                                    </div>
                                                    <!-- Paypal card content End -->
                                                </div>
                                                <!-- payment tab main end -->
                                            </div>
                                            <!--  tab_inner_body end -->
                                        </div>
                                        <!--  tab inner three section End -->
                                    </div>
                                    <!-- inner_container end -->
                                </div>
                                <!-- content area end -->
                                <!-- payment_info End -->
                                <!-- confirmation Start -->
                                <div id="confirmation" class="main_content_area">
                                    <div class="inner_container">
                                        <!-- confirmation message -->
                                        <div class="full_width confirmation_msg"> <span>Thank you. Your Booking is Confirmed Now</span> </div>
                                        <!-- confirmation message End-->
                                        <!--  tab inner three section Start -->
                                        <div class="tab_inner_section">
                                            <div class="heading_tab_inner">
                                                <h5>payment Details</h5>
                                            </div>
                                            <!--  tab_inner_body Start-->
                                            <div class="tab_inner_body full_width">
                                                <div class="payment_details_main">
                                                    <!-- Review content main -->
                                                    <div class=" col-lg-9 col-md-9 review_content">
                                                        <div class="top_head_bar">
                                                            <h4>Glimpses Of Australia</h4>
                                                            <span class="country_span">Australia</span> <span class="time_date"><i class="fa fa-clock-o"></i>3days</span> </div>
                                                        <div class="review_star_cover">
                                                            <div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                                            <span>345 Reviews</span> </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="doller_left">
                                                            <h2>$1000</h2>
                                                            <p>Per Person</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- payment_details_main end -->
                                                <!-- table section main start-->
                                                <div class="full_width package_table_section">
                                                    <div class="col-lg-6 col-md-6 border_right">
                                                        <div class="payment_table_package">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Starting Date</td>
                                                                    <td>:</td>
                                                                    <td>20 sep 2015</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Starting Date</td>
                                                                    <td>:</td>
                                                                    <td>27 Jan 2015</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Day</td>
                                                                    <td>:</td>
                                                                    <td>3</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Adults</td>
                                                                    <td>:</td>
                                                                    <td>2</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Children</td>
                                                                    <td>:</td>
                                                                    <td>1</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--  Payment Table End -->
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <!--  Payment Table Start -->
                                                        <div class="payment_table_package">
                                                            <table>
                                                                <tr>
                                                                    <td>base price</td>
                                                                    <td>$1000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>exlia persons(1)</td>
                                                                    <td>$1000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Taxes</td>
                                                                    <td>$120</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>discount</td>
                                                                    <td>(-)$1000</td>
                                                                </tr>
                                                                <tr class="total_row">
                                                                    <td>Total</td>
                                                                    <td>$1900</td>
                                                                </tr>
                                                            </table>
                                                            <!--  Payment Table End -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- table section main end-->
                                                <div class="full_width total_price_row">
                                                    <p>Total Price - </p>
                                                    <h2>$1900</h2>
                                                </div>
                                            </div>
                                            <!--  tab_inner_body end -->
                                        </div>
                                        <!--  tab inner three section End -->
                                        <!-- information_section start -->
                                        <div class="full_width information_section">
                                            <div class="information_title"> Traveler Information </div>
                                            <div class="full_width information_table_main">
                                                <div class="col-lg-6 col-md-6 border_right">
                                                    <div class="payment_table_package">
                                                        <table class="table">
                                                            <tr>
                                                                <td>Booking Number :</td>
                                                                <td>0090038968</td>
                                                            </tr>
                                                            <tr>
                                                                <td>First Name :</td>
                                                                <td>Steve</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Last Name :</td>
                                                                <td>Joseph</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email :</td>
                                                                <td>stevejoseph@host.com</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!--  Payment Table End -->
                                                </div>
                                                <div class="col-lg-6 col-md-6 border_right">
                                                    <div class="payment_table_package">
                                                        <table class="table">
                                                            <tr>
                                                                <td>Address :</td>
                                                                <td>20 sep 2015</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Town/City :</td>
                                                                <td>27 Jan 2015</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zip Code : </td>
                                                                <td>63800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Country :</td>
                                                                <td>Your Country Name Here</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!--  Payment Table End -->
                                                </div>
                                            </div>
                                            <!-- information_table End -->
                                        </div>
                                        <!-- information_section End -->

                                        <!-- information_section start -->
                                        <div class="full_width information_section space_top_65">
                                            <div class="information_title"> payment Information </div>
                                            <!-- information_table End -->
                                            <div class="full_width information_table_main">
                                                <div class="paymentinfo_list">
                                                    <ul>
                                                        <li>You have now confirmed and guaranteed your booking by credit card.</li>
                                                        <li>All payments are to be made at the hotel during your stay, unsess otherwise stated in the hotel policies or in the room conditions.</li>
                                                        <li>Please note that your credit card may be pre-authorised prior to your arrival.</li>
                                                    </ul>
                                                    <p>This Package accepts the following forms of payment :</p>
                                                    <span>Credit Card (Visa)</span> </div>
                                            </div>
                                            <!-- information_table End -->
                                            <!-- information_table End -->
                                            <div class="full_width information_table_main">
                                                <div class="booking_text t_align_c">
                                                    <p>If you can change or cancel your booking via out online self service tool <a href="#">here. </a></p>
                                                    <span>We Wish You a Pleasent stay</span> </div>
                                            </div>
                                            <!-- information_table End -->
                                            <div class="full_width t_align_c">
                                                <button type="button" value="proceed to next step" class="btn_green proceed_buttton btns">print booking</button>
                                            </div>
                                        </div>
                                        <!-- information_section End -->
                                    </div>
                                    <!--  inner container -->
                                </div>
                                <!-- confirmation End -->
                            </div>
                            <!-- package tabs End -->
                        </div>
                        <!-- right main start -->
                    </div>
                    <!-- col-lg-9-end -->
                </div>
                <!--  row main -->
            </div>
            <!-- container -->
        </div>
        <!-- main wrapper -->
        <div class="clearfix"></div>
        <div class="full_width section_booking_bottom">
            <div class="icon_circle_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="middle_text full_width">
                        <h2>Get up to 20% Offer</h2>
                        <h5>On Booking Flights Along with Tour Packages</h5>
                        <div class="coupon_offer"> Use Coupon Code: <span>FLI20</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <!--content body end-->

    </div>
@endsection