<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsvData;
use App\Models\CsvDataAttribute;

class CsvController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:10240', // Maximum 10MB file size
        ]);

        $file = $request->file('file');
        $csvData = array_map('str_getcsv', file($file));

        // Check if the file has already been uploaded
        if (CsvDataAttribute::where('value', $csvData[0][0])->exists()) {
            return redirect()->route('csv.show')->with('error', 'File already uploaded!');
        }

        // Create the main record
        $csvDataModel = CsvData::create();

        // Get the headers (column names) from the first row
       $headers = array_shift($csvData);

        // Loop through columns and values
        foreach ($csvData as $rowIndex => $row) {
            foreach ($row as $columnIndex =>$cell) {
                
                $columnName = isset($headers[$columnIndex]) ? $headers[$columnIndex] : 'column' . ($columnIndex + 1);

                CsvDataAttribute::create([
                    'csv_data_id' => $csvDataModel->id,
                    'attribute' => $columnName,
                    'value' => $cell,

                ]);
            }
        }

        return redirect()->route('csv.show')->with('success', 'CSV file uploaded and data saved to the database!');
    }

    public function showData()
    {
        $data = CsvData::with('attributes')->get();
        $dataAttributes = CsvDataAttribute::distinct('attribute')->get(['attribute']);
        
        // dd($data);
        // dd($dataAttributes);
        // dd(session('success'));
        return view('show', compact('data', 'dataAttributes'));
    }
}
