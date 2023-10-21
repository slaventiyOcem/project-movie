<?php

namespace app\models;

use app\core\Log;

class MovieModel extends AbstractModel
{

    /**
     * Get all movie data
     */
    public function getAll(): array
    {
        $query = "SELECT * FROM movies";
        $result = $this->queryResult($query);
        $this->checkResult($result);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[$row['movieId']] = [
                'id' => $row['movieId'],
                'name' => $row['name'],
                'desс' => $row['description'],
                'date' => $row['releaseDate'],
                'img' => $row['image_path'],
                
            ];
        }
        return $data;
    }

    /**
     * Retrieves a list of movies with pagination.
     *
     * @param int $page - The current page number.
     * @return array - An array of movie data.
     */
    public function getWithOffset(int $page)
    {

        $page = $page - 1;
        $query = "SELECT * FROM movies ORDER BY movieId DESC LIMIT 1 " . ($page > 0 ? "OFFSET $page;" : '');
        $result = $this->queryResult($query);
        $this->checkResult($result);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[$row['movieId']] = [
                'id' => $row['movieId'],
                'name' => $row['name'],
                'desс' => $row['description'],
                'date' => $row['releaseDate'],
                'img' => $row['image_path'],
                
            ];
            return $data;

        }
    }

    /**
     * Get one movie data
     */
    public function getById(int $id): array
    {
        $query = "SELECT * FROM movies WHERE movieId=" . $id;
        $result = $this->queryResult($query);
        $this->checkResult($result);
        return $result->fetch_assoc();
    }

    /**
     * Delete movie by id
     */
    public function deleteById(int $id): bool
    {
        $query = "DELETE FROM movies WHERE movieId=" . $id;
        $this->queryResult($query);
        return true;
    }

    /**
     *  Add new model
     */
    public function add(int $directorId, $nameMovie, $decs, $dateMovie)
    {


        $querMovie = "INSERT INTO movies (directorId, name, description, releaseDate) VALUES ($directorId, '$nameMovie', '$decs', '$dateMovie')";
        $resultMovie = $this->queryResult($querMovie);
        if (!$resultMovie) {
            Log::info('Ошибка SQL-запроса (режиссер):' . $this->db->error);
            die("Ошибка SQL-запроса (фильм): " . $this->db->error);
        }
        return $this->db->insert_id;
    }
    /**
     *
     */


    /**
     * Update curent model
     */
    public function update(int $id, int $directorId, string $nameMovie, string $desc, string $dateMovie)
    {
        $updateQuery = "UPDATE movies as m SET m.directorId = $directorId, m.name = '$nameMovie', m.description = '$desc', m.releaseDate = '$dateMovie' WHERE m.movieId = $id";
        $this->queryResult($updateQuery);
        return true;
    }

    /**
     * Delete movie
     */
    public function destroy(int $id): bool
    {
        $deleteQuery = "DELETE FROM movies WHERE movieId = $id";
        $this->queryResult($deleteQuery);
        return true;
    }

    /**
     * @return int
     * get all page
     */
    public function totalPage(): int
    {
        $query = 'SELECT COUNT(*) AS cnt FROM movies';

        $result = $this->queryResult($query);
        $data = $result->fetch_assoc();
        return $data['cnt'];
    }

}