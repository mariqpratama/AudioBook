<?php 

class Story_model {
	private $table = 'abc';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function getAllDetails()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
    }

    public function getAllDetailsSpecific($ID)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id' );
        $this->db->bind('id', $ID);
		return $this->db->single();
    }

    public function filterLanguage($KeyL)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE LANGUAGE=:KeyL' );
        $this->db->bind('KeyL', $KeyL);
		return $this->db->resultSet();
    }

    public function filterGenre($KeyG)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE GENRE=:KeyG' );
        $this->db->bind('KeyG', $KeyG);
		return $this->db->resultSet();
    }

    public function searchStory()
    {
        $Keyword = $_POST['Keyword'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE TITLE LIKE :Keyword OR STORY LIKE :Keyword' );
        $this->db->bind('Keyword', "%$Keyword%");
		return $this->db->resultSet();
    }

    public function filter()
    {
        $radioLanguage = $_POST['radioLanguage'];
        $radioGenre = $_POST['radioGenre'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE LANGUAGE LIKE :radioLanguage OR GENRE LIKE :radioGenre' );
        $this->db->bind('radioLanguage', "%$radioLanguage%");
        $this->db->bind('radioGenre', "%$radioGenre%");
		return $this->db->resultSet();
    }

}