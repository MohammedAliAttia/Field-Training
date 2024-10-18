<?php

namespace App\Http\Controllers;

use App\Models\ProjectUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectUploadController extends Controller
{ 

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            // Remove 'file' validation since it's not a file upload anymore
            // 'project_data' => 'required|file|max:10240', 
            'project_data' => 'required', // Validation for required field
        ]);

        $projectUpload = new ProjectUpload();
        $projectUpload->project_id = $request->project_id;

        if ($request->hasFile('project_data') && $request->file('project_data')->isValid()) {
            $fileContent = file_get_contents($request->file('project_data')->getRealPath());

            // Using parameter binding to insert binary data
            DB::table('project_uploads')->insert([
                'project_id' => $request->project_id,
                'project_data' => $fileContent,
            ]);

            return response()->json(['message' => 'File uploaded successfully'], 200);
        }

        return response()->json(['message' => 'File upload failed'], 400);
    }

    public function download($id)
    {
        $projectUpload = ProjectUpload::find($id);

        if (!$projectUpload) {
            return response()->json(['message' => 'File not found'], 404);
        }

        return response()->streamDownload(function () use ($projectUpload) {
            echo $projectUpload->project_data;
        }, 'project_data.dat'); // Change the filename as needed
    }
}
