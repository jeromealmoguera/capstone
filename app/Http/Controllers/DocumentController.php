<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentCount = Document::count();
        $documents = Document::with('personnel')->get();
        $personnel = Personnel::get();

        return view('admin.pages.personnel.documents', compact('documentCount', 'documents', 'personnel'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,jpeg,jpg,png|max:2048',
            'document_type' => 'required',
            'issued_date' => 'required|date',
        ]);

        $file = $request->file('file');
        $personnel = Personnel::findOrFail($request->input('personnel_id'));
        $personnelName = $personnel->first_name . ' ' . $personnel->last_name;
        $path = $file->storeAs('public/documents/' . $personnelName, $file->getClientOriginalName());

        $document = Document::create([
            'file_name' => $file->getClientOriginalName(),
            'document_type' => $request->input('document_type'),
            'issued_date' => $request->input('issued_date'),
            'personnel_id' => $request->input('personnel_id'),
            'file_path' => $path,
            'created_at' => now(),
        ]);

        // Download the file
        $downloadHeaders = [
            'Content-Type' => 'application/octet-stream',
        ];
        $downloadUrl = route('documents.download', ['id' => $document->id]);

        // Get file preview
        $previewUrl = null;
        if ($file->getClientMimeType() === 'application/pdf') {
            $previewUrl = route('documents.preview', ['id' => $document->id]);
        }

        return redirect()->route('view.documents-lists')->with([
            'success' => 'Document uploaded successfully.',
            'downloadUrl' => $downloadUrl,
            'downloadHeaders' => $downloadHeaders,
            'previewUrl' => $previewUrl,
        ]);
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);
        $path = storage_path('app/' . $document->file_path);
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];
        return response()->download($path, $document->file_name, $headers);
    }

    public function preview($id)
    {
        $document = Document::findOrFail($id);
        $path = storage_path('app/' . $document->file_path);
        return response()->file($path);
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        if (!$document) {
            return redirect()->route('view.documents-lists')->with('error', 'Document not found.');
        }
        $path = $document->file_path;
        Storage::delete($path);
        $document->delete();
        return redirect()->route('view.documents-lists')->with('success', 'Document deleted successfully.');
    }
}
