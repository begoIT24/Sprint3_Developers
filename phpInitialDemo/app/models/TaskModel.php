<?php
class TaskModel{
     
    // Mostra la llista actual de tasques
    public function readList() : array{
      
        $json = (array) json_decode(file_get_contents(ROOT_PATH . '/app/models/data.json'));
        $data = [];
        foreach ($json as $object) {    //reindexa perquè coincideixi index de l'objecte amb 'id'
            $data[$object->id] = $object;
        }
        return $data;         
    }

     // Crea una tasca nova
    public function createTask($newTask){
        
         //var_dump($newTask);
         $data = $this -> readList();
         //var_dump($data);
         $idArray['id'] = array_key_last($data) + 1;
         //var_dump($idArray);
         $newTask[0] = (object) array_merge($idArray, $newTask[0]);
         //var_dump($newTask);
         $data = array_merge($data, $newTask);
         //var_dump($data);
 
         $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
         file_put_contents(ROOT_PATH . '/app/models/data.json', $json);
    }

    // Mostra els detalls d'una tasca
    public function readTask($id) : object {
        $data = $this->readlist();
        return $data[$id];
    }

    // Edita una tasca
    public function updateTask(){

    }

    // Esborra una tasca
    public function deleteTask($id){
        $data = $this->readlist();
        unset($data[$id]);
        return $data;
    }
}