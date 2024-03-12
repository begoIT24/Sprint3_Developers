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
        $task -> createTask();
    }

    // Mostra els detalls d'una tasca
    public function readTaskAction(){
        $task = new TaskModel;
        $task -> readTask();
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
