<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient : {{ $patient->id }}</title>
</head>
<body>

<div class="d" style="margin-top:-30;">
    {!! DNS2D::getBarcodeHTML($patient, 'QRCODE', 1, 1) !!}
  </div>
  @if ($patient->avatar)
  <div style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); float: right; margin-top: -42px; border: 1px solid #ccc; padding: 1px;">
      <img width="100" height="90" src="images/{{ $patient->avatar }}" class="" alt="">
  </div>
@else
  <div style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); float: right; margin-top: -42px; border: 1px solid #ccc; padding: 5px;">
      <img width="70" height="50" src="{{public_path('logo.png')}}" class="rounded-circle m-r-5" alt="">
  </div>
@endif

    <center style="font-size:10px;">

        <header style="margin-top:-38;">
            <img style="width:60px;" src="{{ public_path('images/' . ($settings->logo ?? 'logo.png')) }}" alt="">
            <br>
            <b>{{ $settings['company_name'] }}</b> <br>
            {{ $settings['address'] }}, {{ $settings['city'] }}, {{ $settings['state'] }}, <br> {{ $settings['postal_code'] }}, {{ $settings['country'] }},
            <a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a> , Website: <a href="{{ $settings['url'] }}">{{ $settings['url'] }}</a>
          <br>  {{ $settings['phone'] }},
             {{ $settings['mobile'] }},
            Fax: {{ $settings['fax'] }},

            <hr>
        </header>


    </center>


        Patient full report as of  {{now()}}
        <hr>






                <table class="table table-striped table-responsive table-bordered table-hover" style="font-size:10px;">
                    <tbody>
                     <tr>
                        <th>Name</th>
                        <td>{{ $patient->first_name }} {{ $patient->middle_name }} {{ $patient->last_name }}</td>

                     </tr>
                        <tr>
                            <th>Patient ID:</th>
                            <td>
                                {{env('PATIENT_UNIQUE_N0_INITIAL')}}-{{$patient->id}}-{{ $patient->created_at->format('Y') }}
                            </td>
                        </tr>


                        <tr>
                            <th>Date of Birth:</th>
                            <td>{{ $patient->dob }} ,

                                <?php
                                $dob = new DateTime($patient->dob);
                                $currentDate = new DateTime();
                                $age = $currentDate->diff($dob)->y;
                                echo $age;
                            ?>
                             Years
                            </td>
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
                            <th>Email:</th>
                            <td>{{ $patient->email }}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $patient->address }}</td>
                        </tr>
                        {{-- <tr>
                            <th>Reason for Visit:</th>
                            <td>{{ $patient->reason_for_visit }}</td>
                        </tr> --}}
                        <tr>
                            <th>Blood Group:</th>
                            <td>{{ $patient->blood_group }}</td>
                        </tr>
                        <tr>
                            <th>Next of Kin:</th>
                            <td>{{ $patient->nex_of_kin }}</td>
                        </tr>
                        <tr>
                            <th>Next of Kin Relationship:</th>
                            <td>{{ $patient->next_of_relationship }}</td>
                        </tr>
                        <tr>
                            <th>Next of Kin Phone:</th>
                            <td>{{ $patient->next_of_kin_phone }}</td>
                        </tr>
                        <tr>
                            <th>Created:</th>
                            <td>{{ $patient->created_at }}</td>
                        </tr>

                    </tbody>
                </table>


                  <center><b>Patient Diagnosis : {{$diagonization->count()}}</b></center>
                <table class="" style="font-size:10px;">
                    <thead>
                        <tr>
                            <th>Diagnosis</th>
                            <th>Date & Time</th>
                        </tr>
                    </thead>

                        @foreach ($diagonization as $record)
                        <tr>
                            <td>{{ $record->diagnosis->diagnosis }}</td>
                            <td>{{$record->created_at}}</td>
                        </tr>
                        @endforeach
                    </table>



                    <center><b>Patient Tests : {{$tests->count()}}</b></center>

                    <table  style="font-size:10px;">
                        <thead>
                            <tr>

                                {{-- <th>Sent by</th> --}}
                                <th>Patient</th>
                                <th>Date</th>
                                <th>Test</th>
                                <th>Test Results</th>
                                <th>Note</th>
                                <th>Test Started At</th>
                                <th>Test Completed At</th>
                                {{-- <th>Is Urgent</th>
                                <th>Status</th> --}}
                                <th>Test Parameters</th>

                                <th>Sample Type</th>
                                <th>Sample Collection Method</th>
                                <th>Sample Condition</th>
                                <th>Additional Instructions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tests as $x)
                                <tr data-patient-id="{{ $x->patient->id }}">

                                    {{-- <td>{{ $x->doctor->username }}</td> --}}
                                    <td>{{ $x->patient->first_name }} {{ $x->patient->last_name }}</td>
                                    <td>{{ $x->created_at }}</td>
                                    <td>{{ $x->test->name }}</td>
                                    <td>{{ $x->test_results }}</td>
                                    <td>{{ $x->note }}</td>
                                    <td>{{ $x->test_started_at }}</td>
                                    <td>{{ $x->test_completed_at }}</td>
                                    {{-- <td>{{ $x->is_urgent }}</td>
                                    <td>{{ $x->status }}</td> --}}
                                    <td>{{ $x->test_parameters }}</td>

                                    <td>{{ $x->sample_type }}</td>
                                    <td>{{ $x->sample_collection_method }}</td>
                                    <td>{{ $x->sample_condition }}</td>
                                    <td>{{ $x->additional_instructions }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <center><b>Blood received : {{$blood->count()}}</b></center>
                    <table class="table table-bordered" style="font-size:10px;">
                        <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Blood Group</th>
                                <th>Amount / Units</th>
                                {{-- <th>Cost per Unit</th> --}}
                                {{-- <th>Amount</th> --}}
                                {{-- <th>Total</th> --}}
                                {{-- <th>To</th> --}}
                                <th>Notes</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blood as $item)
                                <tr>
                                    {{-- <td><a href="{{route('print_blood_transfusion_record',$item->id)}}" class="btn btn-info"><span class="fa fa-print"></span></a></td> --}}
                                    <td>{{ $item->blood_group }}</td>
                                  <td>{{$item->amount}}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

<center><b>Admission History : {{$adm->count()}}</b></center>
<table class="table table-sm  table-bordered">
    <thead>
        <tr style="font-size: 10px;">
            <th>Bed Number</th>
            <th>Ward ID</th>
            <th>Patient</th>
            <th>Date admitted</th>
            <th>Bed Type</th>
            <th>Cost Per Day</th>
            <th>Days </th>
            <th>Total bill</th>
            {{-- <th>Bed Status</th> --}}
            <th>Is Occupied</th>
            <th>Notes</th>
            <th>Weight Capacity</th>
            <th>Length</th>
            <th>Width</th>
            <th>Height</th>
            <th>Is Electric</th>
            <th>Has Side Rails</th>
            <th>Is Adjustable</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($adm as $x)
        <tr class="{{ $x->is_occupied==true ? 'occupied-row' : '' }}">
            <td>{{ $x->bed_number }}</td>
            <td>{{ $x->ward->name }}</td>
            <td>
                @if ($x->patient_id)
                <a style="color: green;" href="">    {{ $patient->first_name }} {{ $patient->middle_name }} {{ $patient->last_name }}</a>
                @else
                Free

                @endif
            </td>
            <td>{{$x->occupied_date}}</td>
            <td>{{ $x->bed_type }}</td>
            <td>{{ $x->cost_per_day }}</td>
            <td>
                @php
                $occupiedDate = \Carbon\Carbon::parse($x->occupied_date);
                $now = \Carbon\Carbon::now();
                $daysDifference = $now->diffInDays($occupiedDate);
            @endphp
            {{ $daysDifference }}
            </td>
            <td> {{ env("CURRENCY")}} {{ $x->cost_per_day* $daysDifference }}</td>
            {{-- <td>{{ $x->x_status }}</td> --}}
            <td>
                @if ($x->is_occupied)
                    &#x2713; <!-- Tick mark symbol -->
                @else
                    &#x2717; <!-- Cross mark symbol -->
                @endif
            </td>
            <td>{{ $x->notes }}</td>
            <td>{{ $x->weight_capacity }}</td>
            <td>{{ $x->length }}</td>
            <td>{{ $x->width }}</td>
            <td>{{ $x->height }}</td>
            <td>
                @if ($x->is_electric)
                    &#x2713; <!-- Tick mark symbol -->
                @else
                    &#x2717; <!-- Cross mark symbol -->
                @endif
            </td>

            <td>
                @if ($x->has_side_rails)
                    &#x2713; <!-- Tick mark symbol -->
                @else
                    &#x2717; <!-- Cross mark symbol -->
                @endif
            </td>

            <td>
                @if ($x->is_adjustable)
                    &#x2713; <!-- Tick mark symbol -->
                @else
                    &#x2717; <!-- Cross mark symbol -->
                @endif
            </td>


        </tr>
        @endforeach
    </tbody>
</table>

<center><b>specialized Doctors : {{$specialized->count()}}</b></center>

<table class="table table-respnsive-lg" style="font-size:10px;">
    <tr>
        {{-- <td>Print</td>
        <td>SKU</td> --}}
        {{-- <th>Name</th> --}}
        <th>Procedure</th>
        <th>Complain</th>
        <th>Note</th>
        <th>Cost</th>
        <th>Created</th>
    </tr>
    @foreach ($specialized as $x )
    <tr>
        {{-- <td><a target="_blank" href="{{route('print_specialised_history',$x->sku)}}" class="btn btn-success"><span class="fa fa-print"></span></a></td> --}}
        {{-- <td>{{$x->sku}}</td> --}}
        {{-- <td> {{ strtoupper($x->patient->first_name) }} {{ strtoupper($x->patient->middle_name) }} {{ strtoupper($x->patient->last_name) }} , {{ \Carbon\Carbon::parse($x->patient->dob)->age }} years -Patient ID - {{$x->patient->id}}</td> --}}
        <td>{{$x->procedure->name}}</td>
        <td>{{$x->complain}}</td>
        <td>{{$x->note}}</td>
        <td> {{env('CURRENCY')}} {{$x->procedure->cost}}</td>
        <td>{{$x->created_at}}</td>
    </tr>
    @endforeach
</table>

<center><b>Theater procedures :{{$history_theater->count()}}</b></center>
<table class="table table-sm table-hover table-responsive table-bordered" style="font-size:10px;">
    <thead>
        <tr>

            <th>Procedure ID</th>
            <th>Note</th>
            <th>Date</th>
            <th>Time</th>
            <th>Complication</th>
            <th>Intervensions </th>
            <th>Medication</th>
            <th>Follow up instructions</th>
            <th>Recovery complete</th>
            <th>Patient Condition</th>
            <th>Vital Signs</th>
            <th>Discharge Summary</th>
            <th>Created At</th>

        </tr>
    </thead>
    <tbody>
        @foreach($history_theater as $item)
        <tr >

            <td>{{ $item->procedure->name }}</td>
            <td>{{ $item->note }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->time }}</td>
            <td>{{ $item->complications }}</td>
            <td>{{ $item->interventions }}</td>
            <td>{{ $item->medication }}</td>
            <td>{{ $item->follow_up_instructions }}</td>
            <td>{{ $item->recovery_complete }}</td>
            <td>{{ $item->patient_condition }}</td>
            <td>{{ $item->vital_signs }}</td>
            <td>{{ $item->discharge_summary }}</td>
            <td>{{ $item->created_at }}</td>

        </tr>
    @endforeach

    </tbody>
</table>

<center><b>Medicine : {{$doc_med->count()}}</b></center>
<table class="table table-bordered"  style="font-size:10px;">
    <thead>
        <tr>
            <th>Medicine ID</th>
            <th>Quantity</th>
            {{-- <th>Price(KES)</th> --}}
            {{-- <th>Total</th> --}}
            {{-- <th>Note</th> --}}
            <th>Date</th>



        </tr>
    </thead>
    <tbody>
        @foreach ($doc_med as $row)
            <tr>
                {{-- <td>{{ strtoupper($row->patient->first_name) }} {{ strtoupper($row->patient->middle_name) }} {{ strtoupper($row->patient->last_name) }}</td> --}}
                <td>{{ $row->medicine->name }}</td>
                <td>{{ $row->quantity }}</td>
                {{-- <td>{{ $row->medicine->price }}</td> --}}
                {{-- <td> {{ env("CURRENCY")}} {{ $row->quantity * $row->medicine->price }}</td> --}}
                {{-- <td>{{ $row->note }}</td> --}}
                <td>{{ $row->created_at }}</td>
            </tr>
        @endforeach

    </tbody>
</table>








<center><b>Dental treatement : {{$dental->count()}}</b></center>
                <table class="table table-hover table-responsive-lg" style="font-size:10px;">
                    <tr>
                        {{-- <th>Export</th> --}}
                        {{-- <th>Receipt no</th> --}}
                        {{-- <th>Name</th> --}}
                        <th>Procedure</th>
                        {{-- <th>Cost</th> --}}
                        <th>Complain</th>
                        <th>Note</th>
                        <th>Date</th>
                    </tr>
                    @foreach ($dental as $x )
                    <tr>
                        {{-- <td><a target="_blank" class="btn btn-info" href="{{route('print_dental_report_history',$x->sku)}}"><span class="fa fa-print"></span></a></td> --}}
                        {{-- <td>{{$x->sku}}</td> --}}
                        {{-- <td>{{$x->patient->first_name}} {{$x->patient->middle_name}} {{$x->patient->last_name}}</td> --}}
                        <td>{{$x->procedure_name}}</td>
                        {{-- <td>{{env('CURRENCY')}} {{$x->cost}}</td> --}}
                        <td>{{$x->complain}}</td>
                        <td>{{$x->note}}</td>
                        <td>{{$x->created_at}}</td>

                    </tr>
                    @endforeach
                </table>


<center><b>Eye treatement : {{$optician->count()}}</b></center>
<table class="table table-sm table-hover table-responsive-lg" style="font-size: 10px;">
    <thead>
        <tr>
            <th>Action</th>
            <th>ID</th>
            <th>Procedure Name</th>
            <th>Cost</th>
            <th>Note</th>
            <th>SKU</th>
            <th>Symptoms</th>
            <th>Patient ID</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($optician as $item)
            <tr>
                <td><a target="_blank" href="{{route('export_optiician_history',$item->sku)}}" class="btn btn-info"><span class="fa fa-print"></span></a></td>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['procedure_name'] }}</td>
                <td>{{ $item['cost'] }}</td>
                <td>{{ $item['note'] }}</td>
                <td>{{ $item['sku'] }}</td>
                <td>{{ $item['symptoms'] }}</td>
                <td>{{ $item->patient->first_name }} {{ $item->patient->middle_name }} {{ $item->patient->last_name }} [{{ $item->patient->id }}]</td>
                <td>{{ $item['created_at'] }}</td>
                <td>{{ $item['updated_at'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>




@if ($deceased->count()>0)
<center><b>Deseased</b></center>
<table class="table  table-responsive table-bordered" style="color: red;">
    <thead>
        <tr style="font-size:12px;">
            <th>Course of Death</th>
            <th>Date oof death</th>
            <th>Date added</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($deceased as $patient)
        <tr class="{{ $patient->slot_id == 'green' ? 'bg-success' : '' }}">
            <td>{{$patient->course_of_death}}</td>
            <td>{{ $patient->date_of_death }}</td>
            <td>{{ $patient->created_at }}</td>
        </tr>
    @endforeach

    </tbody>
</table>
@endif



<center><b>Payment History : {{$payment->count()}}  </b></center>
<table class="" style="font-size:10px;">
    <thead>
        <tr>
            {{-- <th>SKU</th> --}}
            <th>Served by</th>
            <th>Discount</th>
            <th>Item Service</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Status</th>
            <th>Method</th>
            <th>Payment Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalQuantity = 0;
        $grandTotal = 0;
        ?>
        @foreach ($payment as $transaction)
        <tr>
            {{-- <td>{{ $transaction->sku }}</td> --}}
            <td>{{ $transaction->user->username }}</td>
            <td>{{ $transaction->discount_value }}</td>
            <td>{{ $transaction->item_service }}</td>
            <td>{{ $transaction->qty }}</td>
            <td>{{ $transaction->price }}</td>
            <?php
            $total = $transaction->qty * $transaction->price;
            $totalQuantity += $transaction->qty;
            $grandTotal += $total;
            ?>
            <td>{{ env('CURRENCY') }} {{ $total }}</td>
            <td>{{ $transaction->status }}</td>
            <td>{{ $transaction->method }}</td>
            <td>{{ $transaction->payment_date }}</td>
        </tr>
        @endforeach
        <tr>
            <td><strong>Totals</strong></td>
            <td></td>
            <td></td>
            <td>{{ $totalQuantity }}</td>
            <td></td>
            <td>{{ env('CURRENCY') }} {{ $grandTotal }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>



<center><b>Pending bills : {{$bill->count()}}</b></center>
<table class="table table-bordered table-responsive" style="font-size:10px;">
    <thead>
        <tr>
            {{-- <th>Patient ID</th> --}}
            <th>Charges For</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Total</th>
            <th>Raised By</th>
            <th>Paid</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @php
        $total = 0; // Initialize the total variable
        @endphp
        @foreach($bill as $patient)
        <tr>
            {{-- <td>{{ $patient->patient_id }}</td> --}}
            <td>{{ $patient->charges_for }}</td>
            <td>{{ $patient->quantity }}</td>
            <td>{{ $patient->amount }}</td>
            <td> {{env('CURRENCY')}} {{ $patient->quantity * $patient->amount }}</td>
            <td>{{ $patient->user->username}}</td>
            <td style="color: {{ $patient->paid ? 'green' : 'red' }}">
                {{ $patient->paid ? 'Yes' : 'No' }}
            </td>
            <td>{{ $patient->created_at }}</td>
            <td>{{ $patient->updated_at }}</td>
        </tr>
        @php
        $total += $patient->quantity * $patient->amount; // Increment the total with each iteration
        @endphp
        @endforeach
        <tr>
            <td colspan="3">Total</td>
            <td><strong> {{ env("CURRENCY")}} {{ $total }}</strong></td>
            <td colspan="4"></td>
        </tr>
    </tbody>
</table>
<hr>
 <p>
    {{ $settings->description }}
 </p>
 <hr>

<style>
    table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 0px;
}

th, td {
  border: 2px dotted orange;
  padding: 0px;
  text-align: left;
}

th {
  background-color: blue;
  color: white;
}

tfoot td {
  text-align: right;
  font-weight: bold;
}

tfoot td:first-child {
  text-align: left;
}

tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

tbody tr:hover {
  background-color: #ddd;
}

</style>
</body>
</html>
