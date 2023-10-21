<?php

namespace app\models;

use app\core\Log;

class DirectorModel extends AbstractModel
{
    /**
     * Adds a director record to the database.
     *
     * @param string $nameDirector - The name of the director to add.
     * @return int - The ID of the inserted director.
     */
    public function add($nameDirector)
    {
        $query = "INSERT INTO directors (name) VALUES ('$nameDirector')";
        $result = $this->queryResult($query);
        if (!$result) {
            Log::info('Ошибка записи SQL-запроса (режиссер):' . $this->db->error);
            die("Ошибка записи SQL-запроса (режиссер): " . $this->db->error);
        }
        return $this->db->insert_id;
    }

    /**
     * Updates the name of a director in the database.
     *
     * @param int $directorId - The ID of the director to update.
     * @param string $nameDirector - The new name for the director.
     * @return bool - True if the update was successful, false otherwise.
     */
    public function update(int $directorId, string $nameDirector)
    {
        $query = "UPDATE directors as d SET d.name = '$nameDirector'  WHERE d.directorId = $directorId";
        $this->queryResult($query);
        return true;
    }


    /**
     * Get all directors data
     */
    public function getAll(): array
    {
        $query = "SELECT  * FROM directors";
        $result = $this->queryResult($query);
        $this->checkResult($result);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            if (empty($row['name'])) {
                continue;
            }
            $data[$row['directorId']] = [
                'directorId' => $row['directorId'],
                'name' => $row['name'],
            ];
        }
        return $data;
    }

    /**
     * Get one by director ID
     */
    public function getById(int $id): array
    {
        $query = "SELECT * FROM directors WHERE directorId=$id";
        $result = $this->queryResult($query);
        $this->checkResult($result);
        return $result->fetch_assoc();
    }

    /**
     * Delete all data directors by ID
     */
    public function deleteById(int $id): bool
    {
        $query = "DELETE FROM movies WHERE directorId= $id";
        $this->queryResult($query);
        $queryDirector = "DELETE FROM directors WHERE directorId= $id";
        $this->queryResult($queryDirector);
        return true;
    }


}