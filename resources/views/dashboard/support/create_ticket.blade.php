@extends('theme::layouts.app')

@section('content')
    <style>
        .dollar-animation {
            width: 35px;
            height: 35px;
            margin-left: 10px;
            margin-top: -4px;
        }

        .create-ticket-btn {
            background-color: #4b5563;
        }
        .create-ticket-btn:hover {
            background-color: #404650;
        }

        .support-group {
            margin-top: 220px;
        }


        .input-field-dark {
            background-color: #151521;
            color: #9ca3af;
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
                <div class="heading">
                    <p class="text flex text-lg font-small leading-6 text-gray-600 mt-5" style="margin-left: 30px">Create your ticket here!</p>



                    <form action="{{ route('dashboard.store_ticket') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="relative flex flex-col px-10 py-4 create-ticket-form">

                            <div>
                                <label for="subject" class="text block text-sm font-medium leading-5 text-gray-700">Subject</label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input id="subject" type="text" name="subject" placeholder="Subject" class="w-full form-input">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="message" class="text block text-sm font-medium leading-5 text-gray-700">Message</label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <textarea id="message" class="form-control w-full form-input" name="message" rows="5" spellcheck="false" placeholder="Tell us what you need"></textarea>
                                </div>
                            </div>
                            <div>
                                <label for="file" class="text block text-sm font-medium leading-5 text-gray-700">Attachment</label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input id="file" type="file" name="file" placeholder="Your Email" class="w-full form-input">
                                </div>
                            </div>

                            <div class="flex justify-end w-full mt-2">
                                <button type="submit" class="flex self-end justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">Submit</button>
                            </div>
                        </div>
                    </form>









                </div>
            </div>

        </div>

    </div>

    <script>

    </script>
@endsection



