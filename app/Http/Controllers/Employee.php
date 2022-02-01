<?php

namespace App\Http\Controllers;

use App\Models\Employee as ModelsEmployee;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Employee extends Controller
{
    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
  
        if ($file) {
            $file_extension = $file->getClientOriginalExtension();
            $file_name = $file->getClientOriginalName();
            $temp_path = $file->getRealPath();
            $file_size = $file->getSize();

            
            // Check for file extension and size

            $file = fopen($temp_path, 'r');

            $importData_arr = array();

            $num = 0;
            while (($row = fgetcsv($file, '1000', ',')) !== false) {
                $data = count($row);
                if ($num == 0) {
                    $num++;
                    continue;
                }
                foreach ($row as $rowData) {
                    $importData_arr[$num][] = $rowData;
                }
                $num++;
            }
            fclose($file);

            foreach ($importData_arr as $record) {
                try {
                    DB::beginTransaction();
                    ModelsEmployee::create([
                        'name' => $record[1],
                        'mobile' => $record[2],
                        'email' => $record[3],
                        'salary' => $record[4],
                        'DOB' => $record[5],
                        'created_by' => 1,
                        'updated_by' => 0
                    ]);
                    DB::commit();
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());

                    DB::rollBack();
                }
            }
            $emailData = ['name' => 'Amit', 'email' => 'amit@way2society.com', 'subject' => 'Welcome Amit'];
            $this->sendEmail($emailData);
            return response()->json([
                'message' => 'Records inserted successfully'
            ]);
            // }
        } else {
            throw new \Exception("No File was uploaded ");
        }
    }

    public function sendEmail($emailData)
    {
        Mail::send('export-module.emailBody', $emailData, function ($message) use ($emailData) {
            $message->from('yamit7296@gmail.com');
            $message->to($emailData['email']);
            $message->subject($emailData['subject']);
        });
    }

    public function checkUploadedFileProperties($file_extension, $file_size)
    {

        $valid_extensions = ['csv', 'xlsx'];

        if (!in_array($file_extension, $valid_extensions)) {
            throw new \Exception("Invalid File Type");
        }

        $max_file_size = 2097152;
        if ($file_size > $max_file_size) {
            throw new Exception("File size is too large");
        }
    }
}
