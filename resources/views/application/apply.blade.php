<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="icon" href="/logo.png" type="image/x-icon">


</head>
  <body>
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <img src="/logo.png"  style="width:60px;">
                <h5 style="color: blue;">{{ env('APP_NAME') }}</h5>
                <P>Please complete all mandatory fields in the form with care and submit. Upon completion, a confirmation email will be sent to you.
                    Your compliance in filling out all necessary fields ensures a smooth processing of your request and guarantees timely receipt of the confirmation email.
                </P>
            </center>



            <hr>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <form method="POST" action="{{ route('save') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <b>SECTION I: STUDENT BIO-DATA</b>

                            @csrf

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name:</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">--select--</option>
                                    <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
                                    <option value="female" @if(old('gender') == 'female') selected @endif>Female</option>
                                    <option value="other" @if(old('gender') == 'other') selected @endif>Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="citizenship" class="form-label">Citizenship:</label>
                                <input  type="text" class="form-control" id="citizenship" name="citizenship" value="{{ old('citizenship') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="birth_certificate" class="form-label">Birth Certificate (Upload):</label>
                                <input type="file" class="form-control" id="birth_certificate" name="birth_certificate" required>

                            </div>


                            <div class="mb-3">
                                <label for="national_id" class="form-label">National ID or Passport Number (if applicable):</label>
                                <input type="number" class="form-control" id="national_id" name="national_id" value="{{ old('national_id') }}">
                            </div>


                            <div class="mb-3">
                                <label for="passport_photo" class="form-label">2x2 Passport Photo (Upload) (jpeg, png, jpg):</label>
                                <input type="file" class="form-control" id="passport_photo" name="passport_photo" required>

                            </div>


                            <div class="mb-3">
                                <label for="county" class="form-label">County of birth:</label>
                                <select class="form-select" id="county" name="county" required>
                                    <option value="">Select County</option>
                                    <option value="Mombasa">Mombasa</option>
                                    <option value="Kwale">Kwale</option>
                                    <option value="Kilifi">Kilifi</option>
                                    <option value="Tana River">Tana River</option>
                                    <option value="Lamu">Lamu</option>
                                    <option value="Taita–Taveta">Taita–Taveta</option>
                                    <option value="Garissa">Garissa</option>
                                    <option value="Wajir">Wajir</option>
                                    <option value="Mandera">Mandera</option>
                                    <option value="Marsabit">Marsabit</option>
                                    <option value="Isiolo">Isiolo</option>
                                    <option value="Meru">Meru</option>
                                    <option value="Tharaka-Nithi">Tharaka-Nithi</option>
                                    <option value="Embu">Embu</option>
                                    <option value="Kitui">Kitui</option>
                                    <option value="Machakos">Machakos</option>
                                    <option value="Makueni">Makueni</option>
                                    <option value="Nyandarua">Nyandarua</option>
                                    <option value="Nyeri">Nyeri</option>
                                    <option value="Kirinyaga">Kirinyaga</option>
                                    <option value="Murang'a">Murang'a</option>
                                    <option value="Kiambu">Kiambu</option>
                                    <option value="Turkana">Turkana</option>
                                    <option value="West Pokot">West Pokot</option>
                                    <option value="Samburu">Samburu</option>
                                    <option value="Trans-Nzoia">Trans-Nzoia</option>
                                    <option value="Uasin Gishu">Uasin Gishu</option>
                                    <option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
                                    <option value="Nandi">Nandi</option>
                                    <option value="Baringo">Baringo</option>
                                    <option value="Laikipia">Laikipia</option>
                                    <option value="Nakuru">Nakuru</option>
                                    <option value="Narok">Narok</option>
                                    <option value="Kajiado">Kajiado</option>
                                    <option value="Kericho">Kericho</option>
                                    <option value="Bomet">Bomet</option>
                                    <option value="Kakamega">Kakamega</option>
                                    <option value="Vihiga">Vihiga</option>
                                    <option value="Bungoma">Bungoma</option>
                                    <option value="Busia">Busia</option>
                                    <option value="Siaya">Siaya</option>
                                    <option value="Kisumu">Kisumu</option>
                                    <option value="Homa Bay">Homa Bay</option>
                                    <option value="Migori">Migori</option>
                                    <option value="Kisii">Kisii</option>
                                    <option value="Nyamira">Nyamira</option>
                                    <option value="Nairobi">Nairobi</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="sub_county" class="form-label">Sub-county:</label>
                                <input required type="text" class="form-control" id="sub_county" name="sub_county" value="{{ old('sub_county') }}">
                            </div>

                            <div class="mb-3">
                                <label for="ward" class="form-label">Ward:</label>
                                <input required type="text" class="form-control" id="ward" name="ward" value="{{ old('ward') }}">
                            </div>

                            <div class="mb-3">
                                <label for="residency_area" class="form-label">Area of Residency:</label>
                                <input required type="text" class="form-control" id="residency_area" name="residency_area" value="{{ old('residency_area') }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>

                            <b>SECTION II: KCPE RESULTS</b>
                            <div class="mb-3">
                                <label for="index_number" class="form-label">Enter KCPE Index Number:</label>
                                <input required type="text" class="form-control" id="index_number" name="index_number" value="{{ old('index_number') }}">
                            </div>

                            <div class="mb-3">
                                <label for="year_of_exam" class="form-label">Year of Exam:</label>
                                <input required type="number" class="form-control" id="year_of_exam" name="year_of_exam" value="{{ old('year_of_exam') }}">
                            </div>

                            <div class="mb-3">
                                <label for="marks_attained" class="form-label">KCPE 2023 Marks attained:</label>
                                <input required type="number" class="form-control" id="marks_attained" name="marks_attained" value="{{ old('marks_attained') }}">
                            </div>

                            <div class="mb-3">
                                <label for="primary_school" class="form-label">Primary School Attended:</label>
                                <input required type="text" class="form-control" id="primary_school" name="primary_school" value="{{ old('primary_school') }}">
                            </div>




                    </div>
                    <div class="col-md-6">





                        <b>SECTION III: Parents or Guardians Details:</b>
                        <div class="mb-3">
                            <label for="father_name" class="form-label">Father's Full Name (if Alive):</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="mother_name" class="form-label">Mother's Full Name (if Alive):</label>
                            <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="guardian_name" class="form-label">Guardian's Full Name:</label>
                            <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{ old('guardian_name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="relationship" class="form-label">Relationship to the Student:</label>
                            <input type="text" class="form-control" id="relationship" name="relationship" value="{{ old('relationship') }}">
                        </div>





                        <b>SECTION IV: CO-CURRICULAR ACTIVITIES:</b>
                        <div class="mb-3">
                            <label for="sport" class="form-label">CO-CURRICULAR ACTIVITIES separated with commas (e.g. football, basketball, etc):</label>
                            <input required type="text" class="form-control" id="sport" name="sport" value="{{ old('sport') }}">
                        </div>

                        <div class="mb-3">
                            <label for="contributions" class="form-label">Any specific accomplishments or contributions in these activities:</label>
                            <input type="text" class="form-control" id="contributions" name="contributions" value="{{ old('contributions') }}">
                        </div>

                        <b>SECTION V: GOVERNMENT OFFICIAL:</b><br><b>Sub Chief Contact:</b>
                        <div class="mb-3">
                            <label for="sub_chief_name" class="form-label">Sub chief full name:</label>
                            <input required type="text" class="form-control" id="sub_chief_name" name="sub_chief_name" value="{{ old('sub_chief_name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="chief_contact" class="form-label">Sub Chief phone:</label>
                            <input required type="number" class="form-control" id="chief_contact" name="chief_contact" value="{{ old('chief_contact') }}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input required type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                        </div>







                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-success" style="width:100%;">Submit Application</button>
                    </div>
                </div>
                <br>
                <br>
            </form>
        </div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
