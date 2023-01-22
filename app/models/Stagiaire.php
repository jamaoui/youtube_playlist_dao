<?php

namespace app\models;

class Stagiaire extends Model
{
    private $nom;
    private $prenom;
    private $age;
    private $login;
    private $password;

    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }


    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }


    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function create()
    {
        $sqlState = static::database()->prepare("INSERT INTO stagiaire VALUES(null,?,?,?,?,?)");
        return $sqlState->execute([
            $this->nom,
            $this->prenom,
            $this->age,
            $this->login,
            $this->password
        ]);
    }

    public function edit($id)
    {
        $sqlState = static::database()->prepare("UPDATE stagiaire
        SET 
            prenom = ?,
            nom = ?,
            age = ?,
            login = ?,
            password = ?
        WHERE id = ?");
        return $sqlState->execute([
            $this->prenom,
            $this->nom,
            $this->age,
            $this->login,
            $this->password,
            $id
        ]);
    }

    public function delete($id)
    {
        $sqlState = static::database()->prepare("DELETE FROM stagiaire WHERE id = ?");
        $sqlState->execute([$id]);
    }

    /**
     * @return Stagiaire[]
     */
    public static function all()
    {
        return static::database()
            ->query("SELECT * FROM stagiaire")
            ->fetchAll(PDO::FETCH_CLASS, Stagiaire::class);
    }

    public static function find($id)
    {
        return static::where('id', $id);
    }

    public static function where($column, $value, $operator = '=')
    {
        $sqlState = self::database()->prepare("SELECT * FROM stagiaire WHERE $column $operator ?");
        $sqlState->execute([$value]);
        $data = $sqlState->fetchAll(PDO::FETCH_CLASS, Stagiaire::class);
        if (empty($data)) {
            throw new Exception("Aucun stagiaire n'est trouvé");
        }
        return $data;
    }
}