<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Mail;
use App\Exports\ApplicationExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Response;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function apply()
    {
        return view('application.apply');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function save(Request $request)
    {

        $total_marks_score = 0;
        if ($request->marks_attained >= 380) {
            $total_marks_score = 50; // Assigning a score of 50 for higher marks
        }


        $county_score = 0;
        if (strcmp($request->county, 'Kilifi') >= 0) {
            $county_score = 25; // County is Kilifi or higher in alphabetical order
        } else {
            $county_score = 10; // County is lower in alphabetical order
        }



        $parent_score = 0;
        if ($request->father_name && $request->mother_name) {
            $parent_score = 10; // Both parents alive
        } else if ($request->father_name || $request->mother_name) {
            $parent_score = 20; // Single parent
        } else {
            $parent_score = 25; // Total orphan
        }

        $total_score_for_all=$total_marks_score + $county_score + $parent_score;


        $request->validate([
            'birth_certificate' => 'required|mimes:pdf|max:2048',
            'passport_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Adjust max file size as necessary
        ]);

        $birthCertificatePath = uniqid() . '-' . str_replace(' ', '', $request->birth_certificate->getClientOriginalName());
        $request->birth_certificate->move(public_path('docs'), $birthCertificatePath);

        $passportPhotoPath = uniqid() . '-' . str_replace(' ', '', $request->passport_photo->getClientOriginalName());
        $request->passport_photo->move(public_path('passports'), $passportPhotoPath);

        // Create and save the form data using Eloquent
        Application::create([
            'full_name' => $request->input('full_name'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'citizenship' => $request->input('citizenship'),
            'national_id' => $request->input('national_id'),
            'birth_certificate' => $birthCertificatePath,
            'passport_photo' => $passportPhotoPath,
            'county_of_birth' => $request->input('county'),
            'sub_county' => $request->input('sub_county'),
            'ward' => $request->input('ward'),
            'residency_area' => $request->input('residency_area'),
            'index_number' => $request->input('index_number'),
            'year_of_exam' => $request->input('year_of_exam'),
            'marks_attained' => $request->input('marks_attained'),
            'primary_school' => $request->input('primary_school'),
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'guardian_name' => $request->input('guardian_name'),
            'relationship' => $request->input('relationship'),
            'email' => $request->input('email'),


            'sport' => $request->input('sport'),
            'contributions' => $request->input('contributions'),
            'sub_chief_name' => $request->input('sub_chief_name'),
            'chief_contact' => $request->input('chief_contact'),
            'address' => $request->input('address'),

            'score' => $total_score_for_all,


        ]);
        try {
            // Your application submission logic

            if ($request->email) {
                Mail::send('email.nootification', ['full_name' => $request->full_name], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Reset Password');
                });
            }

            // After successful submission
            return redirect()->back()->with('success', 'Application submitted successfully. Check your email for further details.');
        } catch (\Exception $e) {

        }


        return redirect()->back()->with('success', 'Application submitted successfully. If you are selected, you will be required to take an admission examination, Check your email for further details.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function admin_applications(Request $request)
    {

        $applications=Application::orderBy('id','desc')->get();
        return view('application.all_applications',compact('applications'));
    }





    public function exportApplications()
    {
        return Excel::download(new ApplicationExport, 'applications.xlsx');
    }






    public function print_each($id){
        $data = [
            'application' =>Application::where('id', $id)->first(),


           ];

        $pdf = PDF::loadView('pdf/application', $data)->setPaper('A4');;
        $output = $pdf->output();
        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename="student aapplication.pdf"'
        ]);

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
