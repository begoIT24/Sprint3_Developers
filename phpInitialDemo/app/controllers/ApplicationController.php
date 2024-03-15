<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{
	// Mostra la llista actual de tasques
    public function indexAction(){
        $task = new TaskModel;
        $data = $task -> readList();
        //var_dump($data);
        $this -> view -> data = $data;
    }

    // Crea una tasca nova
    public function createAction(){
        $task = new TaskModel;

        if (!empty($_POST)) {
            $newTask [] = [
            'nom' => $_POST["nom"],
            'estat' => $_POST["estat"],
            'hora_ini' => $_POST["hora_ini"],
            'hora_fi' => $_POST["hora_fi"],
            'autor' => $_POST["autor"]];

            /*$newTask [] = [
                'nom' => 'programar CRUD',
                'estat' => 'estat',
                'hora_ini' => '10:00',
                'hora_fi' => '18:00',
                'autor' => 'pepe'];*/


            $task -> createTask($newTask);
            
            return header("Location:../web/");
        }
       
    }

    // Mostra els detalls d'una tasca
    public function readTaskAction(){
       // $id = $_GET["id"];      //desde dónde entrar la id?
        $task = new TaskModel;
        $oneTask = $task -> readTask('2');
        $this -> view -> oneTask = $oneTask;
    }

    // Edita una tasca
    public function updateAction(){
        $task = new TaskModel;
        $task -> updateTask();
    }

    // Esborra una tasca
    public function deleteAction(){
        $task = new TaskModel;
        $task -> deleteTask();
    }
}
