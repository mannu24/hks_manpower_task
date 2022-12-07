<?php

namespace App\Http\Controllers;

use App\Models\TreeEntry;
use App\Models\TreeEntryLang;
use Illuminate\Http\Request;
use Validator;
class TreeController extends Controller
{
    public function index()
    {
        $entries = TreeEntry::with(['details:entry_id,name'])->get();
        $parents = TreeEntry::where('parent_entry_id', 0)->with(['branches', 'details:entry_id,name'])->get();
        // return $entries;
        $tree = '<ul id="myUL">';
        foreach ($parents as $e) {
            $tree .= '<li><span class="caret">' . $e->details->name . '</span>';
            if (count($e->branches) > 0) {
                $tree .= $this->branch($e);
            }
            $tree .= '</li>';
        }
        $tree .= '<ul>';
        return view('welcome', compact('tree','entries'));
    }

    public function branch($b)
    {
        $html = '<ul class="nested">';
        foreach ($b->branches as $new_b) {

            if (count($new_b->branches) > 0) {

                $html .= '<li ><span class="caret">' . $new_b->details->name.'</span>';
                $html .= $this->branch($new_b);
            } else {
                $html .= '<li>' . $new_b->details->name;
                $html .= "</li>";
            }
        }
        $html .="</ul>";
            return $html;
    }

    public function create(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'parent_entry_id' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'status' => 'error',
                'errors' => $errors
            ], 200);
        }
        $data = request()->all();
        $entry = TreeEntry::create($data);

        $langrec = TreeEntryLang::create([
            'entry_id' => $entry->id,
            'lang' => 'eng',
            'name' => $data['name'],
        ]);

        

        return response()->json([
            'status' => true,
        ]);
    }
}
