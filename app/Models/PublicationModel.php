<?php namespace App\Models;

    use CodeIgniter\Model;

    class PublicationModel extends Model {

            // Nombre de la tabla
            protected $table = 'publication';
           
            // Campos permitidos para insertar  
            protected $allowedFields = ['content', 'user'];
           
            //  get() es un método de CodeIgniter.
            public function get($id = false) {  
           
            // Si no se especifica un id, devuelve todos los registros    
            if ($id === false) {
                // findAll() es un método de CodeIgniter. Corresponde a SELECT * FROM table
                return $this->findAll();
            } 

            // Si se especifica un id, devuelve el registro con el id especificado
            // first() es un método de CodeIgniter. Corresponde a SELECT * FROM table WHERE id = $id LIMIT 1
            return $this->asArray()
            ->where(['id' => $id])->first();
        }
    }
// ?>