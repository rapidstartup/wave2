@extends('theme::layouts.app')



@section('content')

    <!-- Resources -->
{{--    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>--}}
{{--    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>--}}
{{--    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>--}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>
        .saving-goal-form {
            margin: 0 13px;
        }
        .range-slider {
            width: 100%;
        }

        .range-slider__range {
            -webkit-appearance: none;
            width: calc(97% - (73px));
            height: 5px;
            border-radius: 5px;
            background: #d7dcdf;
            outline: none;
            padding: 0;
            margin: 0;
        }
        .range-slider__range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: #4b5567;
            cursor: pointer;
            -webkit-transition: background 0.15s ease-in-out;
            transition: background 0.15s ease-in-out;
        }
        .range-slider__range::-webkit-slider-thumb:hover {
            background: #005fe6;
        }
        .range-slider__range:active::-webkit-slider-thumb {
            background: #005fe6;
        }
        .range-slider__range::-moz-range-thumb {
            width: 15px;
            height: 15px;
            border: 0;
            border-radius: 50%;
            background: #4b5567;
            cursor: pointer;
            -moz-transition: background 0.15s ease-in-out;
            transition: background 0.15s ease-in-out;
        }
        .range-slider__range::-moz-range-thumb:hover {
            background: #005fe6;
        }
        .range-slider__range:active::-moz-range-thumb {
            background: #005fe6;
        }

        .range-slider__value {
            display: inline-block;
            position: relative;
            width: 90px;
            color: #fff;
            line-height: 20px;
            text-align: center;
            border-radius: 3px;
            background: #4b5567;
            padding: 5px 10px;
            margin-left: 2px;
        }

        ::-moz-range-track {
            background: #d7dcdf;
            border: 0;
        }

        input::-moz-focus-inner,
        input::-moz-focus-outer {
            border: 0;
        }

        /*-----------------------------*/

        #right-panel
        {
            height: 1550px;
        }

        div.shadowedBox-wrapper{
            margin-top: 20px;
            text-align: center;
        }
        .shadowedBox {
            box-shadow: 0px 5px 30px 10px rgb(0,0,0,.1);
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
                <p class="text block text-sm font-medium leading-5 text-gray-700 mt-5" style="margin-left: 40px">Now, you can set your savings goals. Tell us how much you would like to save and what you would use it for!</p>

                <form action="{{ route('dashboard.setGoal') }}" method="POST">
                    @csrf
                    <div class="relative flex flex-col px-10 py-8 saving-goal-form">

                        <div class="range-slider">
                            <label for="interest_goal_value" class="text block text-sm font-medium leading-5 text-gray-700">Set Goal Value</label>
                            <input class="range-slider__range" id=" interest_goal_value" name="interest_goal_value" type="range" value="0" min="0" step="0.01" max="1000000">
                            <span class="range-slider__value">0</span>
                        </div>

                        <br>
                        <div>
                            <label for="funds_for" class="text block text-sm font-medium leading-5 text-gray-700">Purpose</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="funds_for" type="text" name="funds_for" placeholder="Tell us what you would use the funds for" class="w-full form-input">
                            </div>
                        </div>

                        <div class="flex justify-end w-full mt-2">
                            <button type="submit" class="flex self-end justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">Save</button>
                        </div>
                    </div>
                </form>

                {{----------------------------------------}}
                <div class="shadowedBox-wrapper">
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
                </div>

                {{---------------------------}}


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
                                    fill: true,
                                    lineTension: 0,
                                    // backgroundColor: "rgba(0,0,255,0.3)",
                                    backgroundColor: "rgba(53,53,53,0.4)",
                                    borderColor: "rgba(224,224,224,0.5)",
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



{{--                <div class="platinum-wallet">--}}
{{--                    <span class="text text-lg font-medium leading-6 text-gray-600">PLATINUM WALLET</span>--}}
{{--                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
{{--                    <script>--}}
{{--                        google.charts.load('current',{packages:['corechart']});--}}
{{--                        google.charts.setOnLoadCallback(drawChart);--}}

{{--                        function drawChart() {--}}
{{--                            // Set Data--}}

{{--                            var data = google.visualization.arrayToDataTable([--}}
{{--                                ['Month', 'Investment', { role: 'annotation' }],--}}
{{--                                ["",0.00,"$0.00"],["2023-05-30",0.000,"$0.000"],["2023-07-01",0.000,"$0.000"],--}}
{{--                            ]);--}}
{{--                            var options = {hAxis: {title: 'Month'},vAxis: {title: 'Investment'},legend: 'none'};--}}

{{--                            var formatter = new google.visualization.NumberFormat({decimalSymbol: '.',groupingSymbol: '.', negativeColor: 'red', negativeParens: true, prefix: '$ '});--}}
{{--                            formatter.format(data, 1);--}}
{{--                            var chart = new google.visualization.AreaChart(document.getElementById('myChart')); chart.draw(data, options);--}}
{{--                        }--}}
{{--                    </script>--}}
{{--                    <div id="myChart" style="width:100%; height:250px;" class="shadowedBox"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 856px; height: 180px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="856" height="180" aria-label="A chart." style="overflow: hidden;"><defs id="_ABSTRACT_RENDERER_ID_0"><clipPath id="_ABSTRACT_RENDERER_ID_1"><rect x="92" y="35" width="673" height="111"></rect></clipPath></defs><rect x="0" y="0" width="856" height="180" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="92" y="35" width="673" height="111" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(https://platinumpluscapital.com/dashboard/index.php#_ABSTRACT_RENDERER_ID_1)"><g><rect x="92" y="145" width="673" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="92" y="90" width="673" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="92" y="35" width="673" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="92" y="118" width="673" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect><rect x="92" y="63" width="673" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect></g><g><g><path d="M92.5,90.5L92.5,90.5L428.5,90.5L764.5,90.5L764.5,90.5Z" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path></g></g><g><rect x="92" y="90" width="673" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><path d="M92.5,90.5L428.5,90.5L764.5,90.5" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g><g><rect x="92.5" y="78.5" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="428.5" y="78.5" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="764.5" y="78.5" width="1" height="12" stroke="none" stroke-width="0" fill="#999999"></rect></g></g><g></g><g><g><text text-anchor="middle" x="428.5" y="159.71666666666667" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">2023-05-30</text></g><g><text text-anchor="middle" x="764.5" y="159.71666666666667" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">2023-07-01</text></g><g><text text-anchor="end" x="79" y="150.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">-1</text></g><g><text text-anchor="end" x="79" y="95.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="79" y="40.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">1</text></g></g><g><g><g><rect x="80.5" y="64.5" width="25" height="15" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="middle" x="92.5" y="76.55" font-family="Arial" font-size="13" stroke="#ffffff" stroke-width="3" fill="#3366cc" aria-hidden="true">$0.00</text><text text-anchor="middle" x="92.5" y="76.55" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#3366cc">$0.00</text></g><rect x="82.5" y="65.5" width="20" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g></g><g><g><rect x="414.5" y="64.5" width="29" height="15" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="middle" x="428.5" y="76.55" font-family="Arial" font-size="13" stroke="#ffffff" stroke-width="3" fill="#3366cc" aria-hidden="true">$0.000</text><text text-anchor="middle" x="428.5" y="76.55" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#3366cc">$0.000</text></g><rect x="416.5" y="65.5" width="24" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g></g><g><g><rect x="750.5" y="64.5" width="29" height="15" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="middle" x="764.5" y="76.55" font-family="Arial" font-size="13" stroke="#ffffff" stroke-width="3" fill="#3366cc" aria-hidden="true">$0.000</text><text text-anchor="middle" x="764.5" y="76.55" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#3366cc">$0.000</text></g><rect x="752.5" y="65.5" width="24" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g></g></g></g><g><g><text text-anchor="middle" x="428.5" y="175.38333333333333" font-family="Arial" font-size="13" font-style="italic" stroke="none" stroke-width="0" fill="#222222">Month</text><rect x="92" y="164.33333333333331" width="673" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><text text-anchor="middle" x="40.55" y="90.5" font-family="Arial" font-size="13" font-style="italic" transform="rotate(-90 40.55 90.5)" stroke="none" stroke-width="0" fill="#222222">Investment</text><path d="M29.499999999999996,146L29.500000000000004,35L42.50000000000001,35L42.5,146Z" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></path></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Month</th><th>Investment</th></tr></thead><tbody><tr><td></td><td>$ 0.00</td></tr><tr><td>2023-05-30</td><td>$ 0.00</td></tr><tr><td>2023-07-01</td><td>$ 0.00</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 190px; left: 866px; white-space: nowrap; font-family: Arial; font-size: 13px;">$0.000</div><div></div></div></div>--}}
{{--                </div>--}}
{{--                --------------------------------}}

                <div class="col1-col2-wrapper">
                    <div class="col1-3">
                        <div class="shadowedBox">
                            <span class="text text-3xl font-medium leading-tight text-gray-600">Refer users</span>
                            <div class="icenter">
                                <img class="qr-code" src="https://quickchart.io/chart?cht=qr&amp;chs=150x150&amp;chl=https://platinumpluscapital.com/dashboard/register.php?r  =jameshendrix">
                            </div>
                            <input type="text" readonly class="refer-user col1-1" value="https://platinumpluscapital.com/dashboard/register.php?r=jameshendrix">
                            <p class="text mt-5 text-base font-medium leading-tight text-gray-600">Use this link to refer users and get paid for each registered user.</p>
                        </div>
                    </div>

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
        function rangeSlider() {
            let slider = document.querySelectorAll(".range-slider");
            let range = document.querySelectorAll(".range-slider__range");
            let value = document.querySelectorAll(".range-slider__value");

            slider.forEach((currentSlider) => {
                value.forEach((currentValue) => {
                    let val = currentValue.previousElementSibling.getAttribute("value");
                    currentValue.innerText = val;
                });

                range.forEach((elem) => {
                    elem.addEventListener("input", (eventArgs) => {
                        elem.nextElementSibling.innerText = eventArgs.target.value;
                    });
                });
            });
        }
        rangeSlider();



    </script>
@endsection



