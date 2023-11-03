<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Application;
class ApplicationExport implements FromCollection
{
    public function collection()
    {
        return Application::all();
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Date of Birth',
            'Gender',
            'Citizenship',
            'National ID',
            'Birth Certificate',
            'Passport Photo',
            'County of Birth',
            'Sub County',
            'Ward',
            'Residency Area',
            'Index Number',
            'Year of Exam',
            'Marks Attained',
            'Primary School',
            'Father Name',
            'Mother Name',
            'Guardian Name',
            'Relationship',
            'Email',
            'Sport',
            'Contributions',
            'Sub Chief Name',
            'Address',
            'Chief Contact',
        ];
    }
}
