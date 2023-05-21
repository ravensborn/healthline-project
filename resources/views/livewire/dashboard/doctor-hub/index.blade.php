<div>

    <div>

        <div class="row mb-3" wire:poll.keep-alive="updateStats">
            <div class="col-6 col-md-3">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5>Total visits today</h5>
                    <h1 class="text-info">{{ $visitsToday }}</h1>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5>Treated today</h5>
                    <h1 class="text-success">{{ $patientsTreatedToday }}</h1>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-3 mt-md-0">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5>Patients in queue</h5>
                    <h1 class="text-warning">{{ $currentVisitsInQueue }}</h1>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-3 mt-md-0">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5>Missed today</h5>
                    <h1 class="text-danger">{{ $missedPatientsToday }}</h1>
                </div>
            </div>
            {{--            <div class="col-6 col-md-3 mt-3 mt-md-0">--}}
            {{--                <div class="bg-body rounded shadow-sm p-3 h-100">--}}
            {{--                    <h5>Just the two of us</h5>--}}
            {{--                    <a href="https://www.youtube.com/watch?v=DwUHazWvDjE">--}}
            {{--                        <i class="bi bi-box-arrow-up-right me-1"></i>Click to open.--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>


        @if($visit)

            <div class="row mb-3">
                <div class="col-12">
                    <div class="bg-body rounded shadow-sm p-3 h-100">
                        Current Patient: <h1>{{ $patient->name }}</h1>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="bg-body rounded shadow-sm p-3 h-100">
                        Visit Attachments
                        <hr>
                        <table class="table">
                            <tbody>
                            @foreach($visit->form_response as $item)

                                <tr>
                                    <td>{{ ucfirst($item['name']) }}</td>
                                    @if($item['type'] == \App\Models\Form::FIELD_TYPE_FILE)
                                        <td>
                                            <a href="{{ $item['value'] }}">Click to open</a>
                                        </td>
                                    @else
                                        <td>{{ $item['value'] }}</td>
                                    @endif
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    <div class="bg-body rounded shadow-sm p-3 h-100">
                        <h5 class="h5">Basic Information</h5>
                        <hr>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $patient->name }}</td>
                            </tr>
                            <tr>
                                <td>E-Mail Address</td>
                                <td>{{ $patient->email }}</td>
                            </tr>
                            <tr>
                                <td>Primary Phone Number</td>
                                <td>{{ $patient->primary_phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Secondary Phone Number</td>
                                <td>{{ $patient->secondary_phone_number }}</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bg-body rounded shadow-sm p-3 h-100">
                        <h5 class="h5">Other Information</h5>
                        <hr>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Code</td>
                                <td>{{ $patient->code }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $patient->gender }}</td>
                            </tr>
                            <tr>
                                <td>Birthdate</td>
                                <td>{{ $patient->birthdate }}</td>
                            </tr>
                            <tr>
                                <td>Ethnicity</td>
                                <td>{{ $patient->ethnicity }}</td>
                            </tr>
                            <tr>
                                <td>Occupation</td>
                                <td>{{ $patient->occupation }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $patient->governorate->name . ' - ' . $patient->district->name . ' - ' . $patient->subDistrict->name }}</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        @else

            <div class="row mb-3">
                <div class="col-12 col-md-12">
                    <div class="bg-body rounded shadow-sm p-3 h-100">
                        <h5 class="h5 text-center d-flex justify-content-center align-items-center">
                            <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="ms-2">
                                Waiting for patient...
                            </div>
                        </h5>
                    </div>
                </div>
            </div>

        @endif
    </div>

</div>
