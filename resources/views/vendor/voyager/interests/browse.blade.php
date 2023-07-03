@extends('voyager::master')


@section('page_header')
    <div class="container-fluid" style="text-align: center; width: 50%; margin-top: 60px">

        @if($month == 6 && $day == 28)
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
            </svg>
        </h1>
        <p style="font-size: 18px">The following procedure will apply the current month's interest percentage to each user's balance sheet. This will be reflected until the first of the following month along with the winning amounts of each deposit.</p>
        <br>
        <p style="font-size: 18px">Interest percentage to apply: <b>{{ $monthlyInterest->interest_value }}%</b></p>
{{--        <p style="font-size: 18px">{{ $month }} and {{ $day }}</p>--}}

        <br>

        <form>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Calculate and pay monthly interest
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Calculate and pay monthly interest</button>
        </form>

            @else

            <div class="well">
                <svg style="margin-bottom: -3px; margin-right: 10px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                You have not assigned the month's interest. Go to <strong><a href="{{ route('voyager.monthly-interests.create') }}" class="alert-link">Set you interest Rate</a></strong>
            </div>
        @endif


    </div>

@endsection

