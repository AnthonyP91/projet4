<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */

class CommentManager {

	/**
	 * 
	 * @var string
	 * @access private
	 */

	private $_db;

	/**
	 * @access public
	 * @param PDO $db
	 * @return void
	 */

	public function __construct($db)
  	{
    	$this->setDb($db);
	}
	
	/**
	 * @access public
	 * @param string $author et $text
	 * @return void
	 */

	public function addComment($author, $text, $postId)
	{
		$db = $this->dbConnect();
		$q = $db->prepare('INSERT INTO comments(text, author, postId) VALUE(:text, :author, :postId)');

		$q->bindValue(':text', $text);
		$q->bindValue(':author', $author);
		$q->bindValue(':postId', $postId);
		
		$q->execute();
	}

	/**
	 * @access public
	 * @param int $postId
	 * @return array
	 */

	public final  function getComments($postId) {
		$listComments = [];

		$db = $this->dbConnect();
		$q = $db->query('SELECT id, postId, text, author, date, status FROM comments WHERE postId = \''.$postId.'\' ORDER BY date DESC');

		while ($data = $q->fetch(PDO::FETCH_ASSOC))
		{
			$listComments[] = new Comment($data);
		}

		return $listComments;
	}

	/**
	 * @access public
	 * @return array
	 */

	public final  function getCommentsReported() {
		$listComments = [];

		$db = $this->dbConnect();
		$q = $db->query('SELECT id, postId, text, author, date, status FROM comments WHERE status = 0 ORDER BY date DESC');

		while ($data = $q->fetch(PDO::FETCH_ASSOC))
		{
			$listComments[] = new Comment($data);
		}

		return $listComments;
	}

	/**
	 * @access public
	 * @param int $id
	 * @return void
	 */

	public final  function reportingComment($id) {
		$db = $this->dbConnect();
		$q = $db->query('UPDATE comments SET status = 0 WHERE id =\' '. $id .' \' ');
	}


	/**
	 * @access public
	 * @param int $commentId
	 * @return void
	 */

	public final  function deleteComment($commentId) {
		$db = $this->dbConnect();
		$db->exec('DELETE FROM comments WHERE id = '.$commentId);
	}

	/**
	 * @access public
	 * @param objet $db
	 * @return void
	 */

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}

	/**
	 * @access public
	 * @param
	 * @return PDO $db
	 */

	public function dbConnect()
	{
		try
		{
			$db = $this->_db;
			return $db;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}


}
?>