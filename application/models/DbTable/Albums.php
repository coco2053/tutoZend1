<?php

class Application_Model_DbTable_Albums extends Zend_Db_Table_Abstract
{

    protected $_name = 'albums';

    public function getAlbum($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Impossible de trouver l'enregistrement $id");
        }
        return $row->toArray();
    }

    public function addAlbum($artiste, $titre)
    {
        $data = array(
            'artiste' => $artiste,
            'titre' => $titre,
        );
        $this->insert($data);
    }

    public function updateAlbum($id, $artiste, $titre)
    {
        $data = array(
            'artiste' => $artiste,
            'titre' => $titre,
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteAlbum($id)
    {
        $this->delete('id =' . (int)$id);
    }

}

