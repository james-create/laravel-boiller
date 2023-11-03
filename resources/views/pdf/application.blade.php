<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 2px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 2px;
            border: 1px solid #ccc;
        }
        th {
            text-align: left;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
      <div class="dd">
#NO-{{ $application->id }}
  </div>
    <i>Applied : {{$application->created_at}}</i>

   <center> <h4>KILIFI INTERNATIONAL SCHOOL</h4></center>
    <h6 style="text-align: center;">Application Details</h6>



    <table>
         @if ($application->passport_photo)
        <tr>
            <th>Passport Photo</th>
            <td><img src="{{ public_path('passports/' . $application->passport_photo) }}" style="width:40px;" alt=""></td>
        </tr>
        @endif
        @foreach($application->getAttributes() as $key => $value)
            <tr>
                <th>{{ $key }}</th>
                <td>
                    @if ($value === null)
                        N/A
                    @elseif ($key === 'dob')
                        {{ \Carbon\Carbon::parse($value)->format('Y-m-d') }}
                    @else
                        {{ $value }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
