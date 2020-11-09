<?php

namespace App\Http\Controllers;

use App\Helpers\UploadDocument;
use App\Http\Requests\SpphRequest;
use App\Spph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpphController extends Controller
{
    public $model;
    public $uploadDocument;
 
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create', 'edit']);
        $this->model = new Spph();
    }
    public function all(Request $request)
    {
        $data = $this->model->getAllData($request->month, $request->year)->get();
        return $data;
    }

    public function draft(Request $request)
    {
        $data = $this->model->getDraftData($request->month, $request->year)->get();
        return $data;
    }

    public function list(Request $request)
    {
        $data = $this->model->getListData($request->month, $request->year)->get();
        return $data;
    }

    public function done(Request $request)
    {
        $data = $this->model->getDoneData($request->month, $request->year)->get();
        return $data;
    }

    public function create()
    {
        return view('modules.spph.create');
    }

    public function store(SpphRequest $spphRequest)
    {
        $data = $spphRequest->all();
        $data['document'] = $spphRequest->file('document') != null ? $spphRequest->file('document') : NULL;

        DB::beginTransaction();
        
        try{
            // call function insert 
            $insert = $this->model->insertData($data);
            
            // call helper function upload document
            $upload = UploadDocument::insertDocument($insert, $data);

            DB::commit();
            if($insert->status == 'save'){
                return redirect()->route('spph.list')->with('success',"SPPH dengan Nomor $insert->nomor_spph berhasil dibuat");
            }else{
                return redirect()->route('spph.draft')->with('success',"SPPH dengan Nomor $insert->nomor_spph berhasil dibuat");
            }
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function edit(Spph $spph)
    {
        return view('modules.spph.edit', compact($spph));
    }

    public function update(SpphRequest $spphRequest, Spph $spph)
    {
        //
    }

    public function destroy(Spph $spph)
    {
        //
    }
}
