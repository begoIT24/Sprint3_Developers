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

            $task -> createTask($newTask);
            return header("Location:../");
        }
    }

    // Mostra els detalls d'una tasca
    public function readTaskAction(){
        $task = new TaskModel;
        $id = $_GET["id"]; 
        $oneTask = $task -> readTask($id);
        $this -> view -> oneTask = $oneTask;
    }

    // Edita una tasca
    public function updateAction(){
        $task = new TaskModel;
       // $id = $_GET["id"]; 
        $id = 4;
        $editTask =  $task -> readTask($id);
        $this -> view -> editTask = $editTask;

        if (!empty($_POST)) {
            $newData [] = [
            'nom' => $_POST["nom"],
            'estat' => $_POST["estat"],
            'autor' => $_POST["autor"]];
        $task -> updateTask($newData); 
        return header("Location:../web/");
            }
    }

    // Esborra una tasca
    public function deleteAction(){
        $task = new TaskModel;
        $task -> deleteTask();
    }
}
