<?php
require_once 'Model.php';
class CatatanModel extends Model
{
    private $table = 'catatan';

    public function getAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY id DESC";
        $result = $this->db->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function create($data)
    {
        $query = "INSERT INTO $this->table (nama, isi, priority, tag,browser,ip) VALUES (?, ?, ?, ?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            'ssss',
            $data['nama'],
            $data['isi'],
            $data['priority'],
            $data['tag'],
            $data['browser'],
            $data['ip']
        );
        return $stmt->execute();
    }
}
