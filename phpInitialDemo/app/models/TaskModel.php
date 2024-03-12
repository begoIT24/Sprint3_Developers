<?php
class TaskModel{
       
    // Mostra la llista actual de tasques
    public function readList(){
      
        $json = (array) json_decode(file_get_contents(ROOT_PATH . '/app/models/data.json'));
        $data = [];
        foreach ($json as $row) {
            $data[$row->id] = $row;
        }
        return $data;         
    }

     // Crea una tasca nova
    public function createTask(){

    }

    // Mostra els detalls d'una tasca
    public function readTask(){

    }

    // Edita una tasca
    public function updateTask(){

    }
    
    // Esborra una tasca
    public function deleteTask(){

    }
}