@extends('theme::layouts.app')



@section('content')

    <!-- Resources -->
{{--    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>--}}
{{--    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>--}}
{{--    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>--}}




<!-- For graph -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>
    
        #right-panel
        {
            height: 1030px;
        }

        div.shadowedBox-wrapper{
            margin-top: 20px;
            text-align: center;
        }
        .shadowedBox {
            box-shadow: 0px 1px 4px 10px rgb(0,0,0,.1);
            border-radius: 25px;
            padding: 35px 12px;
            margin: 0 3px;

        }

        @media only screen and (min-width: 768px) and (orientation: landscape){
            .col1-4 {
                width: calc(100% / 5.2);
            }
        }

        @media only screen and (min-width: 768px) and (orientation: landscape){
            .col1-1, .col1-2, .col1-3, .col1-4, .col1-5, .col2-3, .col3-4 {
                display: inline-block;
                vertical-align: top;
                /*margin: 10px 0 5px 0;*/
            }
        }

        .col1-4{
            margin-top: 10px;
            width: 215px;
        }
        div.content{
            text-align: center;
        }
        i.fa-solid {
            font-size: 35px;
            margin-bottom: 10px;
        }
        i.fa-color
        {
            color: #4b5567;
        }

        span.bigText {
            font-size: 26px;
            font-weight: 600;
            /*color: #4b5567;*/
        }
        span.g-text {
            color: #4b5567;
        }

        .platinum-wallet {
            margin: 50px 55px 10px 45px;
        }
        /*#myChart {*/
        /*    margin-top: 10px;*/
        /*}*/

        /*Refer User*/
        @media only screen and (min-width: 768px) and (orientation: landscape){
            .col1-3 {
                width: calc(100% / 3.1);
            }
        }
        /*Latest Posts*/
        @media only screen and (min-width: 768px) and (orientation: landscape) {
            .col2-3 {
                width: calc(100% / 3 * 2 - 2px);
            }
        }
        @media only screen and (min-width: 768px) and (orientation: landscape) {
            .col1-1, .col1-2, .col1-3, .col1-4, .col1-5, .col2-3, .col3-4 {
                display: inline-block;
                vertical-align: top;
                margin: 0 0 5px 0;
            }
        }

        .col1-col2-wrapper {
            margin: 45px 40px 20px 45px;
        }

        .col2-3 {
            text-align: center;
            width: 100%;
        }
        div.icenter {
            text-align: center;
        }

        .posts-section {
            padding: 115px 0;
        }
        .col1-3 {
            text-align: center;
        }

        .qr-code{
            vertical-align: baseline;
            display: inline-grid;
        }

        .input-field-dark {
            background-color: #151521;
            color: #9ca3af;
        }
        

        /*Chart CSS*/
        #myChart {
            width: 698px;
            max-width: 775px !important;
            display: block;
            margin: 50px auto;
            height: 349px;
        }


        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>

    <div class="flex px-8 mx-auto my-6 max-w-7xl xl:px-5">

        <!-- Left Settings Menu -->
        <div class="w-16 mr-6 md:w-1/5">
            @include('theme::partials.sidebar')
        </div>
        <!-- End Settings Menu -->

        <div id="right-panel" class="dark-section flex flex-col w-full bg-white border rounded-lg md:w-4/5 border-gray-150">
            <div class="dark-section flex flex-wrap items-center justify-between border-b border-gray-200 sm:flex-no-wrap">
                <div class="relative p-6">
                    <h3 class="text flex text-lg font-medium leading-6 text-gray-600">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        @if(isset($section_title)){{ $section_title }}@else{{Auth::user()->name}} {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') }} @endif
                    </h3>
                </div>
            </div>
            <div class="uk-card-body h-24 min-h-0 md:min-h-full">
             
                <!-- ---------------------------------------- -->
                <!-- <div class="shadowedBox-wrapper">
                    <div class="col1-4 shadowedBox">
                        <div class="text content">
                            <div>
                                <i class="fa-color fa-solid fa-money-bill-trend-up bigIcon"></i>
                            </div>
                            <span class="g-text bigText">$ 0.00</span><br>
                            <p class="text block text-sm font-medium leading-5 text-gray-700 mt-2">Your Balance</p>
                        </div>
                    </div>
                    <div class="col1-4 shadowedBox">
                        <div class="text content">
                            <div>
                                <i class="fa-color fa-solid fa-sack-dollar bigIcon"></i>
                            </div>
                            <span class="g-text bigText">$ 0.00</span><br>
                            <p class="text block text-sm font-medium leading-5 text-gray-700 mt-2">Earnings to date</p>
                        </div>
                    </div>
                    <div class="col1-4 shadowedBox">
                        <div class="text content">
                            <div>
                                <i class="fa-color fa-solid fa-chart-line bigIcon"></i>
                            </div>
                            <span class="g-text bigText">{{isset($monthly_interest['interest_value']) ? $monthly_interest['interest_value'] : "0.00" }}%</span><br>
                            <p class="text block text-sm font-medium leading-5 text-gray-700 mt-2 ">Previous month interest value</p>
                        </div>
                    </div>
                    <div class="col1-4 shadowedBox">
                        <div class="text content">
                            <div>
                                <i class="fa-color fa-solid fa-receipt bigIcon"></i>
                            </div>
                            <span class="g-text bigText">0</span><br>
                            <p class="text block text-sm font-medium leading-5 text-gray-700 mt-2">Open Tickets</p>
                        </div>
                    </div>
                </div> -->

                <!-- --------------------------- -->


                <div class="platinum-wallet">
                    <span class="text text-lg font-medium leading-6 text-gray-600">PLATINUM WALLET</span>
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                    <script>
                        const xValues = [50,60,70,80,90,100,110,120,130,140,150];
                        const yValues = [7,8,8,9,9,9,10,11,14,14,15];

                        new Chart("myChart", {
                            type: "line",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    // fill: true,
                                    // lineTension: 0,
                                    // // backgroundColor: "rgba(0,0,255,0.3)",
                                    // backgroundColor: "rgba(116,154,217,0.4)",
                                    // borderColor: "rgba(33,115,244,0.9)",
                                    // data: yValues

                                    fill: true,
                                    lineTension: 0.2,
                                    backgroundColor: "rgba(116,154,217,0.4)",
                                    borderColor: "rgba(33,115,244,0.8)",
                                    borderWidth: 3,
                                    pointBorderWidth: 2.5,
                                    pointHoverRadius: 6,
                                    pointRadius: 4,
                                    pointBackgroundColor: "rgba(33,115,244,1)",
                                    pointHoverBackgroundColor: "rgba(33,115,244,1)",
                                    pointBorderColor: "rgba(33,115,244,1)",
                                    pointHoverBorderColor: "rgba(33,115,244,1)",
                                    steppedLine: false,
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                scales: {
                                    yAxes: [{ticks: {min: 5, max:16}}],
                                }
                            }
                        });
                    </script>
                </div>


                <!-- -------------------------------- -->

                <div class="col1-col2-wrapper">
                    <!-- <div class="col1-3">
                        <div class="shadowedBox">
                            <span class="text text-3xl font-medium leading-tight text-gray-600">Refer users</span>
                            <div class="icenter">
                                <img class="qr-code" src="https://quickchart.io/chart?cht=qr&amp;chs=150x150&amp;chl=https://platinumpluscapital.com/dashboard/register.php?r  =jameshendrix">
                            </div>
                            <input type="text" readonly class="refer-user col1-1" value="https://platinumpluscapital.com/dashboard/register.php?r=jameshendrix">
                            <p class="text mt-5 text-base font-medium leading-tight text-gray-600">Use this link to refer users and get paid for each registered user.</p>
                        </div>
                    </div> -->

                    <div class="col2-3">
                        <div class="shadowedBox posts-section">
                            <span class="text text-3xl font-medium leading-tight text-gray-600">Latest posts</span><br>
                            <p class="text block text-sm font-medium leading-5 text-gray-600">No post available</p>
                            <br>
                            <span class="text text-3xl font-medium leading-tight text-gray-600">Last topics</span><br>
                            <p class="text block text-sm font-medium leading-5 text-gray-600">No online topics available</p>
                        </div>
                    </div>
                </div>








            </div>
        </div>
    </div>






    <script>
        // function rangeSlider() {
        //     let slider = document.querySelectorAll(".range-slider");
        //     let range = document.querySelectorAll(".range-slider__range");
        //     let value = document.querySelectorAll(".range-slider__value");

        //     slider.forEach((currentSlider) => {
        //         value.forEach((currentValue) => {
        //             let val = currentValue.previousElementSibling.getAttribute("value");
        //             currentValue.innerText = val;
        //         });

        //         range.forEach((elem) => {
        //             elem.addEventListener("input", (eventArgs) => {
        //                 elem.nextElementSibling.innerText = eventArgs.target.value;
        //             });
        //         });
        //     });
        // }
        // rangeSlider();



    </script>
@endsection



