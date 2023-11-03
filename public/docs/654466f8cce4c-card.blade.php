<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient: {{ $patient->id }}</title>
    <style>
        @page {

            margin: 0;
        }

        body {
            background-color: orange;
            margin: 0;
            font-family: Arial, sans-serif;
            border: 10px solid green;
        }

        .card {
            background-color: ;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1px;
            margin: 1px;
            width:98%;
            margin: 0 auto;
        }

        .qr-code {
            text-align: center;
            margin-bottom: 0px;
        }

        .avatar {
            text-align: center;
            margin-bottom: 10px;
        }

        .avatar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        .logo img {
            width: 100px;
            height: auto;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            margin-bottom: 1px;
        }

        th, td {
            padding: 1px;
            border-bottom: 1px solid white;
        }

        th {
            text-align: left;
            font-weight: bold;
        }

        p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="qr-code">
            {!! DNS2D::getBarcodeHTML($patient->first_name, 'QRCODE', 2, 2) !!}
        </div>
        {{-- @if ($patient->avatar)
            <div class="avatar">
                <img src="images/{{ $patient->avatar }}" alt="">
            </div>
        @else
            <div class="avatar">
                <img src="{{ public_path('/logo.png') }}" alt="">
            </div>
        @endif --}}

        <div class="logo" style="font-size: 8px;">
    <center>
        <img style="width:30px;" src="{{ public_path('images/' . ($settings->logo ?? 'logo.png')) }}" alt="">
        <br>
        <b>{{ $settings['company_name'] }}</b> <br>
        {{ $settings['address'] }}, {{ $settings['city'] }}, {{ $settings['state'] }}, <br> {{ $settings['postal_code'] }}, {{ $settings['country'] }},
        <a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a> , Website: <a href="{{ $settings['url'] }}">{{ $settings['url'] }}</a>
        <br>  {{ $settings['phone'] }},
        {{ $settings['mobile'] }},
        Fax: {{ $settings['fax'] }},
    </center>
        </div>

        <hr>
        <center>Patient Card</center>
        <hr>

        <table style="width:100%;font-size:8px;">
            <tbody>
            <tr>
                <th>Name:</th>
                <td>{{ $patient->first_name }} {{ $patient->middle_name }} {{ $patient->last_name }}</td>
            </tr>

            <tr>
                <th>Patient ID:</th>
                <td>{{ env('PATIENT_UNIQUE_N0_INITIAL') }}-{{ $patient->id }}-{{ $patient->created_at->format('Y') }}</td>
            </tr>

            <tr>
                <th>Date of Birth:</th>
                <td>{{ $patient->dob }}</td>
            </tr>

            <tr>
                <th>National ID:</th>
                <td>{{ $patient->national_id }}</td>
            </tr>

            <tr>
                <th>Phone:</th>
                <td>{{ $patient->phone }}</td>
            </tr>

            <tr>
                <th>Blood Group:</th>
                <td>{{ $patient->blood_group }}</td>
            </tr>

            <tr>
                <th>Next of Kin:</th>
                <td>{{ $patient->nex_of_kin }}</td>
            </tr>

            <tr>
                <th>Next of Kin Phone:</th>
                <td>{{ $patient->next_of_kin_phone }}</td>
            </tr>

            <tr>
                <th>Date:</th>
                <td>{{ $patient->created_at }}</td>
            </tr>

            </tbody>
        </table>

        <hr>

        <p>
        <sup style="font-size:8px;">    {{ $settings->description }}</sup>
        </p>
    </div>
</body>
</html>
