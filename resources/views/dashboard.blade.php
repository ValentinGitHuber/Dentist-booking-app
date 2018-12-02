<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet">

    <link rel="shortcut icon" href="/svg/icon.png"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('/css/custom_styles.css') }}" rel="stylesheet">

    <title>Dashboard</title>
    <style>

    </style>
</head>
<body>

<div class="container-fluid">
    <div class="container first-container">
        <div class="row row-spacing">
            <img src="/svg/icon.png" alt="" style="height: 40px">
            <h1>Dashboard</h1>
        </div>
        <div class="row row-spacing">
            <form method="post" action="{{ route('filter') }}" style="width: 100%;">
                {{ csrf_field() }}
                <div class="container">
                    <div class="row">
                        <div class="input-group col-sm-7 col-12 pl-0 pr-0 mb-3 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="search"><i class="fa fa-search" aria-hidden="true" style="margin-right: 13px"></i>Search</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search by keyword" aria-describedby="search" name="keyword">
                        </div>
                        <div class="input-group col-sm-4 col-12 offset-sm-1 offset-0 pr-0 pl-0 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="sortaddon">Sort by</span>
                            </div>
                            <select class="custom-select form-control" id="sort" aria-label="Sort" aria-describedby="sortaddon" name="sortby">
                                <option value="new_req">New (requested)</option>
                                <option value="old_req">Old (requested)</option>
                                <option value="new_sch">New (scheduled)</option>
                                <option value="old_sch">Old (scheduled)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-7 mb-3 col-12 pl-0 pr-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Time range</span>
                            </div>
                            <input type="text" class="form-control" id="timerange" style="background-color: white" name="timerange" value="{{ old('timerange') }}">
                        </div>
                        <div class="col-sm-2 offset-sm-3 col-12 pr-0 pl-0 text-right">
                            <button type="submit" class="btn btn-primary">Apply filters</button>
                        </div>
                    </div>
                </div>
            </form>
            {{--Alert--}}
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                <strong>Sorry.</strong> We can't find anything.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        <div class="row row-spacing">
            <div class="list-group col-sm-12 col-12" style="padding-right: 0">
                @foreach($bookings as $booking)

                    @if(strtotime($booking->scheduled) < time())
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start disabled">
                    @else
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    @endif
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-3">{{$booking->name}}</h5>
                            <small>Requested {{Carbon\Carbon::parse($booking->created_at)->diffForHumans()}}</small>
                        </div>
                        <em></em>
                        <p class="mb-2">{{$booking->message}}</p>
                        <small>
                            <i class="fa fa-envelope" aria-hidden="true"></i> {{$booking->email}}
                            <i class="fa fa-phone" aria-hidden="true"></i> {{$booking->phone}}

                            <span class="float-right">
                                @if(strtotime($booking->scheduled) < time())
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <del>Scheduled on: {{ date('l jS \of F Y H:i', strtotime($booking->scheduled)) }}</del>
                                @else
                                    <i class="fa fa-calendar" aria-hidden="true"></i> Scheduled on: {{ date('l jS \of F Y H:i', strtotime($booking->scheduled)) }}
                                @endif
                        </span>
                        </small>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $("#timerange").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        minTime: "8:00",
        maxTime: "18:00",
        minuteIncrement: 30,
        mode: "range"
    });

</script>
</body>
</html>