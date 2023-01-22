<?php

namespace app\models;

use PDO;

class Voiture extends Model
{
    private $modele;
    private $prix;

    /**
     * @return mixed
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param mixed $modele
     * @return Voiture
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     * @return Voiture
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    public function latest()
    {
        return static::database()->query('SELECT * FROM voiture order by id DESC')
            ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function create()
    {
        $sqlState = static::database()->prepare("INSERT INTO voiture VALUES(null,?,?)");
        return $sqlState->execute([
            $this->modele,
            $this->prix
        ]);
    }

    public static function view($id)
    {
        $sqlState = static::database()->prepare("SELECT * FROM voiture WHERE id = ?");
        $sqlState->execute([
            $id
        ]);
        return current($sqlState->fetchAll(PDO::FETCH_CLASS, __CLASS__));
    }

    public function update($id)
    {
        $sqlState = static::database()->prepare("
            UPDATE voiture
            SET 
                modele = ?,
                prix   = ?
            WHERE id = ?
        ");
        return $sqlState->execute([
            $this->modele,
            $this->prix,
            $id
        ]);
    }

    public function destroy($id)
    {
        $sqlState = self::database()->prepare("DELETE FROM voiture WHERE id = ?");
        return $sqlState->execute([$id]);
    }
}