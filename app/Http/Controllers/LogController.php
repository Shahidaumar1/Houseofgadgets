<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    public function showLog()
    {
        // Path to the log file
        $logFile = storage_path('logs/laravel.log');

        // Check if the log file exists
        if (File::exists($logFile)) {
            // Get the contents of the log file
            $logContents = File::get($logFile);

            // Return the log contents to the view
            return view('show-log', compact('logContents'));
        } else {
            return response()->json(['message' => 'Log file not found'], 404);
        }
    }
}
