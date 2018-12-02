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

    <title>Booking</title>
    <style>

    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="container first-container">
            <div class="row row-spacing ">
                <img src="/svg/icon.png" alt="" style="height: 40px">
                <h1>Dentist booking form</h1>
            </div>
            <div class="row row-spacing">
                <form method="post" action="{{ route('store') }}" class="my-custom-form">
                    {{ csrf_field() }}
                    <div class="container-fluid">
                        <div class="container second-container">
                            {{--Procedures--}}
                            <div class="form-group row">
                                <label for="procedure" class="col-sm-5 col-12 col-form-label">Choose a procedure:</label>
                                <div class="col-sm-6 col-10">
                                    <select @if($errors->has('procedure'))class="custom-select is-invalid"@else class="custom-select"@endif id="procedure" name="procedure">
                                        <option selected value="">Choose a procedure</option>
                                        <option value="1">Fillngs and Repairs</option>
                                        <option value="2">Gum Surgery</option>
                                        <option value="3">Bridges and Implants</option>
                                        <option value="4">Diagnosis</option>
                                        <option value="5">Teeth Replacement</option>
                                    </select>
                                </div>
                                <div class="col-sm-1 col-2 help">
                                    <i class="fa fa-question-circle-o" aria-hidden="true" data-toggle="tooltip" title="Please choose the procedure that you need using controls from left" onclick="$(this).tooltip('show')"></i>
                                </div>
                                @if($errors->has('procedure'))
                                    <small class="form-text invalid-feedback d-block text-right mr-3">{{$errors->first('procedure')}}</small>
                                @endif
                            </div>

                            {{--Doctor--}}
                            <div class="form-group row">
                                <label for="doctor" class="col-sm-5 col-12 col-form-label">Choose a doctor:</label>
                                <div class="col-sm-6 col-10">
                                    <select @if($errors->has('doctor'))class="custom-select is-invalid"@else class="custom-select"@endif id="doctor" name="doctor">
                                        <option selected value="">Choose a doctor</option>
                                        <option value="1">General Dentist</option>
                                        <option value="2">Periodontist</option>
                                        <option value="3">Oral Surgeon</option>
                                        <option value="4">Orthodontist</option>
                                        <option value="5">Prosthodontist</option>
                                    </select>
                                </div>
                                <div class="col-sm-1 col-2 help">
                                    <i class="fa fa-question-circle-o" aria-hidden="true" data-toggle="tooltip" title="If you want to check availability for another doctor than select desired doctor from left" onclick="$(this).tooltip('show')"></i>
                                </div>
                                @if($errors->has('doctor'))
                                    <small class="form-text invalid-feedback d-block text-right mr-3">{{$errors->first('doctor')}}</small>
                                @endif
                            </div>

                            {{--Availability--}}
                            <div class="form-group row">
                                <label for="availability" class="col-sm-5 col-12 col-form-label">Check doctor availability:</label>
                                <div class="col-sm-5 col-8">
                                    <input type="text" @if($errors->has('availability'))class="form-control is-invalid"@else class="form-control"@endif id="availability" style="background-color: white" name="availability" value="{{ old('availability') }}">
                                </div>
                                <label class="col-sm-1 col-2 calendar" for="availability" style="margin-bottom: 0">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </label>
                                <div class="col-sm-1 col-2 help">
                                    <i class="fa fa-question-circle-o" aria-hidden="true" data-toggle="tooltip" title="Use calendar to check availability of doctor for procedure" onclick="$(this).tooltip('show')"></i>
                                </div>
                            </div>

                            {{--Availability notification--}}
                            @if($errors->has('availability'))
                                {{--<small class="form-text invalid-feedback d-block text-right mr-3">{{$errors->first('availability')}}</small>--}}
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>We are sorry.</strong> The doctor is not available at selected date/time.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <hr>

                            {{--Name, surname--}}
                            <div class="form-group row">
                                <label for="name" class="col-sm-5 col-12 col-form-label">Your name, surname:</label>
                                <div class="col-sm-7 col-12">
                                    <input type="text" @if($errors->has('name'))class="form-control is-invalid"@else class="form-control"@endif id="name" name="name" value="{{ old('name') }}">
                                </div>
                                @if($errors->has('name'))
                                    <small class="form-text invalid-feedback d-block text-right mr-3">{{$errors->first('name')}}</small>
                                @endif
                            </div>

                            {{--Phone--}}
                            <div class="form-group row">
                                <label for="phone" class="col-sm-5 col-12 col-form-label">Your Phone number:</label>
                                <div class="col-sm-7 col-12">
                                    <input type="text" @if($errors->has('phone'))class="form-control is-invalid"@else class="form-control"@endif id="phone" name="phone" value="{{ old('phone') }}">
                                </div>
                                @if($errors->has('phone'))
                                    <small class="form-text invalid-feedback d-block text-right mr-3">{{$errors->first('phone')}}</small>
                                @endif
                            </div>

                            {{--Email--}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-5 col-12 col-form-label">Your Email:</label>
                                <div class="col-sm-7 col-12">
                                    <input type="email" @if($errors->has('email'))class="form-control is-invalid"@else class="form-control"@endif id="email" name="email" value="{{ old('email') }}">
                                </div>
                                @if($errors->has('email'))
                                    <small class="form-text invalid-feedback d-block text-right mr-3">{{$errors->first('email')}}</small>
                                @endif
                            </div>

                            {{--Message--}}
                            <div class="form-group row">
                                <div class="col-sm-7 offset-sm-5 col-12">
                                    <textarea @if($errors->has('message'))class="form-control is-invalid"@else class="form-control"@endif id="message" rows="4" placeholder="Some comments here" name="message">{{ old('message') }}</textarea>
                                </div>
                                @if($errors->has('message'))
                                    <small class="form-text invalid-feedback d-block text-right mr-3">{{$errors->first('message')}}</small>
                                @endif
                            </div>

                            {{--Submit--}}
                            <button type="submit" class="btn btn-primary float-right">Book now!</button>

                            {{--Succes booking--}}
                            @if (session('success') === 1)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Booking registered, we will contact you soon!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $("#availability").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            minDate: "today",
            minTime: "8:00",
            maxTime: "18:00",
            minuteIncrement: 30
        });

        $( "#procedure" ).change(function(){
            let id = $(this).val();
            let otherSelect = $('#doctor');
            otherSelect.val(id).change();
        });

        $( "#doctor" ).change(function(){
            let id = $(this).val();
            let otherSelect = $('#procedure');
            otherSelect.val(id).change();
        });
    </script>
</body>
</html>