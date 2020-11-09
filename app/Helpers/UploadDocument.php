<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Schema;

class UploadDocument{
    
    public static function insertDocument($model, $data)
    {
        // get table name and use for folder 
        $name = strtoupper($model->getTable());
       
        $pathLampiran = "public/files/$name/$model->id/".$data['type'];
        
        // Upload Lampiran
        if($data['document'] != null){
            foreach($data['document'] as $file){
                $name       = $file->getClientOriginalName();
                $titleDoc[]  = $name;
                $pathDoc[] = $file->store($pathLampiran);
            }
        }
        if($data['type'] == 'lampiran'){
            $model->title_lampiran = $data['document'] != null ? json_encode($titleDoc) : null;
            $model->path_lampiran = $data['document'] != null ? json_encode($pathDoc) : null;
            $model->date_lampiran = date('Y-m-d H:i:s');
        }else if($data['type'] == 'file'){
            $model->title_file = $data['document'] != null ? json_encode($titleDoc) : null;
            $model->path_file = $data['document'] != null ? json_encode($pathDoc) : null;
            $model->date_file = date('Y-m-d H:i:s');
        }
      
        return $model;
    }

    public static function updateDocument($data, $model, $type)
    {
        dd($data, $model, $type);

        $model->name = $data->file->getClientOriginalName();
        $model->path = $data->file->store("public/files/$data->id_lpl");
        $model->save();

        return redirect()->back()->with('message', 'Document successfully update');
    }
}