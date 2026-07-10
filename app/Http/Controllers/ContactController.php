<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        
        // Junk contacts ko show karna hai ya nahi
        $showJunk = $request->get('show_junk', 0);
        
        if ($showJunk == 1) {
            $query->onlyTrashed();
        }
        
        // Search by name/email/phone
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                  ->orWhere('email', 'like', '%'.$search.'%')
                  ->orWhere('phone', 'like', '%'.$search.'%');
            });
        }
        
        // Date Range Filter (From Date and To Date)
        if ($request->filled('from_date')) {
            try {
                $fromDate = Carbon::parse($request->from_date)->startOfDay();
                $query->where('created_at', '>=', $fromDate);
            } catch (\Exception $e) {
                \Log::error('FromDate parse error: ' . $e->getMessage());
            }
        }
        
        if ($request->filled('to_date')) {
            try {
                $toDate = Carbon::parse($request->to_date)->endOfDay();
                $query->where('created_at', '<=', $toDate);
            } catch (\Exception $e) {
                \Log::error('ToDate parse error: ' . $e->getMessage());
            }
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Selected Option filter
        if ($request->filled('selected_option')) {
            $query->where('selected_option', $request->selected_option);
        }
        
        $contacts = $query->latest('created_at')->paginate(15);
        
        return view('contacts.index', compact('contacts', 'showJunk'));
    }
    
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }
    
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'selected_option' => 'required',
            'message' => 'required',
        ]);
        
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }
    
    // Update status via AJAX
    public function updateStatus(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['status' => $request->status]);
        
        return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
    }
    
    // Soft delete - Move to junk
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact moved to junk successfully!');
    }
    
    // Restore from junk
    public function restore($id)
    {
        $contact = Contact::withTrashed()->findOrFail($id);
        $contact->restore();
        
        return redirect()->route('contacts.index', ['show_junk' => 1])
                         ->with('success', 'Contact restored successfully!');
    }
    
    // Permanent delete
    public function forceDelete($id)
    {
        $contact = Contact::withTrashed()->findOrFail($id);
        $contact->forceDelete();
        
        return redirect()->route('contacts.index', ['show_junk' => 1])
                         ->with('success', 'Contact permanently deleted!');
    }
}