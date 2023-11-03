
@extends('layouts.admin')

@section('content')

<div class="content-wrapper" style="min-height: 1604.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Applications : {{ $applications->count() }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <div class="form-group">
                    <input style="width: 250px;" type="text" id="search" class="form-control" placeholder="Search by any field...">
                </div>
                {{-- show matching rows --}}
                <script>
                    $(document).ready(function() {
                        $('#search').on('input', function() {
                            var query = $(this).val().toLowerCase();

                            $('tbody tr').each(function() {
                                var row = $(this);

                                var matches = false;
                                $('td', row).each(function() {
                                    var text = $(this).text().toLowerCase();
                                    if (text.indexOf(query) !== -1) {
                                        matches = true;
                                    }
                                });
                                if (matches) {
                                    row.show();
                                } else {
                                    row.hide();
                                }
                            });
                        });
                    });
                </script>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <a href="/export-applications">Export all to xls <span class="fa fa-download"></span></a>
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <p>Students with < 380 marks will be  colored red </p>
            <table class="table table-sm table-hover table-responsive table-stripped table-hover table-bordered">
                <tr>
                    <th><span class="fa fa-print"></span></th>
                    <th>#</th>
                    <th>score</th>
                    <th>full_name</th>
                    <th>dob</th>
                    <th>gender</th>
                    <th>citizenship</th>
                    <th>national_id</th>
                    <th>birth_certificate</th>
                    <th>passport_photo</th>
                    <th>county_of_birth</th>
                    <th>sub_county</th>
                    <th>ward</th>
                    <th>residency_area</th>
                    <th>index_number</th>
                    <th>year_of_exam</th>
                    <th>marks_attained</th>
                    <th>primary_school</th>
                    <th>father_name</th>
                    <th>mother_name</th>
                    <th>guardian_name</th>
                    <th>relationship</th>
                    <th>email</th>
                    <th>sport</th>
                    <th>contributions</th>
                    <th>sub_chief_name</th>
                    <th>address</th>
                    <th>chief_contact</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                @foreach ($applications as $x)
                @if ($x->marks_attained < 380)
                <tr style="color: red;">
                    <td><a class="btn btn-info btn-sm " href="{{ route('print_each',$x->id) }}"><span class="fa fa-print"></span></a></td>

                    <td>{{ $x['id'] }}</td>
                    <td class="btn btn-warning">{{ $x->score }}</td>
                    <td>{{ $x['full_name'] }}</td>
                    <td>{{ $x['dob'] }}</td>
                    <td>{{ $x['gender'] }}</td>
                    <td>{{ $x['citizenship'] }}</td>
                    <td>{{ $x['national_id'] }}</td>
                    <td><a href="/docs/{{ $x->birth_certificate }}">{{ $x->birth_certificate }}</a></td>
                    <td><img src="/passports/{{ $x->passport_photo }}" style="width:40px;" alt=""></td>
                    <td>{{ $x['county_of_birth'] }}</td>
                    <td>{{ $x['sub_county'] }}</td>
                    <td>{{ $x['ward'] }}</td>
                    <td>{{ $x['residency_area'] }}</td>
                    <td>{{ $x['index_number'] }}</td>
                    <td>{{ $x['year_of_exam'] }}</td>
                    <td>{{ $x['marks_attained'] }}</td>
                    <td>{{ $x['primary_school'] }}</td>
                    <td>{{ $x['father_name'] }}</td>
                    <td>{{ $x['mother_name'] }}</td>
                    <td>{{ $x['guardian_name'] }}</td>
                    <td>{{ $x['relationship'] }}</td>
                    <td>{{ $x['email'] }}</td>
                    <td>{{ $x['sport'] }}</td>
                    <td>{{ $x['contributions'] }}</td>
                    <td>{{ $x['sub_chief_name'] }}</td>
                    <td>{{ $x['address'] }}</td>
                    <td>{{ $x['chief_contact'] }}</td>

                    <td>{{ $x['created_at'] }}</td>
                    <td>{{ $x['updated_at'] }}</td>
                </tr>
                @else
                <tr>
                    <td><a class="btn btn-info btn-sm " href="{{ route('print_each',$x->id) }}"><span class="fa fa-print"></span></a></td>
                    <td>{{ $x['id'] }}</td>
                    <td class="btn btn-success">{{ $x->score }}</td>
                    <td>{{ $x['full_name'] }}</td>
                    <td>{{ $x['dob'] }}</td>
                    <td>{{ $x['gender'] }}</td>
                    <td>{{ $x['citizenship'] }}</td>
                    <td>{{ $x['national_id'] }}</td>
                    <td><a href="/docs/{{ $x->birth_certificate }}">{{ $x->birth_certificate }}</a></td>
                    <td><img src="/passports/{{ $x->passport_photo }}" style="width:40px;" alt=""></td>
                    <td>{{ $x['county_of_birth'] }}</td>
                    <td>{{ $x['sub_county'] }}</td>
                    <td>{{ $x['ward'] }}</td>
                    <td>{{ $x['residency_area'] }}</td>
                    <td>{{ $x['index_number'] }}</td>
                    <td>{{ $x['year_of_exam'] }}</td>
                    <td>{{ $x['marks_attained'] }}</td>
                    <td>{{ $x['primary_school'] }}</td>
                    <td>{{ $x['father_name'] }}</td>
                    <td>{{ $x['mother_name'] }}</td>
                    <td>{{ $x['guardian_name'] }}</td>
                    <td>{{ $x['relationship'] }}</td>
                    <td>{{ $x['email'] }}</td>
                    <td>{{ $x['sport'] }}</td>
                    <td>{{ $x['contributions'] }}</td>
                    <td>{{ $x['sub_chief_name'] }}</td>
                    <td>{{ $x['address'] }}</td>
                    <td>{{ $x['chief_contact'] }}</td>

                    <td>{{ $x['created_at'] }}</td>
                    <td>{{ $x['updated_at'] }}</td>
                </tr>
                @endif

                @endforeach
            </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection
