<?php
namespace Core;

class Controller {
    public function loadModel($model) {
        $modelClass = 'App\\Models\\' . $model;
        return new $modelClass();
    }

    public function renderView($view, $data = []) {
        if ($data instanceof \Illuminate\Support\Collection) {
            $data = $data->toArray();
        }
     
        if(is_array($data)){
            extract($data);
        }
         
        require_once '../frontend/views/' . $view . '.php';
    }
}
