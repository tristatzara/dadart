<?php

/**
 * @author      Yannick Renner
 * @copyright   Copyright (C), 2016 Yannick Renner
 *
 * @link        http://www.yannickrenner.info
 *
 */
namespace lib;

class Database extends \PDO {

    /**
     * @var string $_sql Salva il comando SQL
     */
    private $_sql;

    /**
     * @var constant $_fetchMode la fetchMode selezionata
     */
    private $_fetchMode = \PDO::FETCH_ASSOC;

    public function __construct($db) {

        if($db==null || $db == ""){
            echo "ERRORE IMPOSSIBILE COLLEGARSI AL DATABASE";
        }else{
            parent::__construct($db['type'].':host='.$db['host'].';dbname='.$db['name'], $db['user'], $db['pass']);
        }

    }

    /**
     * Esegue al query di selezione e ritorna gli elementi selezionati.
     *
     * @param String $sql - Query SQL da eseguire
     * es: SELECT :email, :password FROM tablename WHERE userid = :userid
     *
     * @param array $data - Dati da utilizzare nella query
     * es: array('email' => 'email', 'password' => 'password', 'userid' => 200);
     *
     * @return array
     */
    public function select($sql, $data = array()) {
        $this->_sql = $sql;
        $sth = $this->_prepareAndBind($data);

        $sth->execute();

        return $sth->fetchAll($this->_fetchMode);
    }

    /**
     * Prepara e inserisce i valori della query SQL
     *
     * @param array $data - Dati da utilizzare nella query SQL
     *
     * @return object
     */
    private function _prepareAndBind($data) {
        $sth = $this->prepare($this->_sql);
        
        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $sth->bindValue(":$key", $value, \PDO::PARAM_INT);
            } else {

                $sth->bindValue(":$key", $value, \PDO::PARAM_STR);
            }
        }

        return $sth;
    }

     /**
     * Inserimento dati nel database
     *
     * @param string $table Tabelle per l'inserimento dei dati
     * @param array $data Dati da utilizzare nella query SQL
     */
     public function insert($table, $data)
    {
        /** Prepara il codice SQL  */
        $insert = $this->_prepareInsert($data);

        /** Crea la stringa SQL */
        $this->_sql = "INSERT INTO `{$table}` (`{$insert['names']}`) VALUES({$insert['values']})";

        $sth = $this->_prepareAndBind($data);
        $sth->execute();

        /** Ritorna id inserito */
        return $this->lastInsertId();
    }

     /**
     * Update di dati nel database
     *
     * @param string $table Tabella da aggiornare
     * @param array $data Dati da utilizzare nella query SQL
     * @param string $where Una codizione per l'aggiornamento
     *
     */
     public function update($table, $data, $where)
    {
        /** Prepara il codice SQL */
        $update = $this->_prepareUpdate($data);

        /** Crea la stringa SQL */
        $this->_sql = "UPDATE `{$table}` SET $update WHERE $where";

        /** Bind Values */
        $sth = $this->_prepareAndBind($data);

        $sth->execute();

        return $sth->rowCount();
    }

    /**
    * Eliminazione di dati nel database
    *
    * @param string $table Tabella per eliminazione dati
    * @param string $where Una codizione per l'eliminazione
    *
    * @return integer Numero di campi eliminati
    */
    public function delete($table, $where)
    {
        /** Prepara il codice SQL */
        $this->_sql = "DELETE FROM `{$table}` WHERE $where";

        /** Bind Values */
        $sth = $this->_prepareAndBind();

        $sth->execute();

        /** Ritorna il numero di campi eliminati */
        return $sth->rowCount();
    }

     /**
     * Inserire i valori e se esiste gia il campo fa l'update del dato
     *
     * @param string $table Tabella per eliminazione dati
     * @param array $data Dati da utilizzare nella query SQL
     */
    public function secureInsert($table, $data)
    {
        /** Prepara il codice SQL */
        $insert = $this->_prepareInsert($data);
        $update = $this->_prepareUpdate($data);

        /** Crea la stringa SQL */
        $this->_sql = "INSERT INTO `{$table}` (`{$insert['names']}`) VALUES({$insert['values']}) ON DUPLICATE KEY UPDATE {$update}";

        /** Bind Values */
        $sth = $this->_prepareAndBind($data);

        $sth->execute();

        /** Ritorna id inserito */
        return $this->lastInsertId();
    }

    /**
     * _prepareInsert - Strasforma l'array di dati in una stringa da inserire nel SQL
     *
     * @param array $data I dati da convertire in striga per SQL
     * @return array
     */
    private function _prepareInsert($data)
    {
        return array(
            'names' => implode("`, `",array_keys($data)),
            'values' => ':'.implode(', :',array_keys($data))
        );
    }

    /**
     * _prepareUpdate - Strasforma l'array di dati in una stringa da inserire nel SQL
     *
     * @param array $data
     * @return string
     */
    private function _prepareUpdate($data)
    {
        $details = NULL;
        foreach($data as $key=>$value)
        {
            $details .= "$key=:$key, ";
        }
        $details = rtrim($details, ', ');


        return $details;
    }

    public function setFetchMode($fetchMode){
        $this->_fetchMode = $fetchMode;
    }
}

?>
