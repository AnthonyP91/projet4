<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */

class Comment {

	/**
	 * 
	 * @var int
	 * @access private
	 */
	
	private  $_id;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $_postId;

	/**
	 * 
	 * @var text
	 * @access private
	 */
	private  $_text;

	/**
	 * 
	 * @var char
	 * @access private
	 */
	private  $_author;

	/**
	 * 
	 * @var date
	 * @access private
	 */
	private  $_date;

	/**
	 * true normal, flase reported
	 * @var bool
	 * @access private
	 */
	private  $_status = true;


	/**
	 * @access public
	 * @param int $postId 
	 * @param text $text 
	 * @param char $author 
	 * @param date $date 
	 * @param bool $status 
	 * @return void
	 */

	const STATUS_NORMAL = 1;
	const STATUS_REPORTED = 0;

	public final  function __construct(array $comment) {
		$this->hydrate($comment);
	}


	/**
	 * @access public
	 * @param int $postId 
	 * @return void
	 */

	public final  function setPostId(int $postId) {

		$postId = (int) $postId;

		if (!is_int($postId))
		{
		  trigger_error('the postId should be a int type', E_USER_WARNING);
		  return;
		}
		else if ($postId > 0) 
		{
			$this->_postId = $postId;
		}
	}


	/**
	 * @access public
	 * @param text $text 
	 * @return void
	 */

	public final  function setText(text $text) {
		if (!is_string($text))
		{
		  trigger_error('the text should be a text type', E_USER_WARNING);
		  return;
		}
		else {
			$this->_text = $text;
		}
	}


	/**
	 * @access public
	 * @param char $author 
	 * @return void
	 */

	public final  function setAuthor(char $author) {
		if (!is_string($author))
		{
		  trigger_error('the author should be a char type', E_USER_WARNING);
		  return;
		}
		else {
			$this->_author = $author;
		}
	}


	/**
	 * @access public
	 * @param date $date 
	 * @return void
	 */

	public final  function setDate(date $date) {
		if (!is_date($date))
		{
		  trigger_error('the date should be a date type', E_USER_WARNING);
		  return;
		}
		else {
			$this->_date = $date;
		}
	}


	/**
	 * 		
	 * @access public
	 * @param bool $status 
	 * @return void
	 */

	public final  function setStatus(bool $status) {
		if (!is_bool($status))
		{
		  trigger_error('the status should be a int type', E_USER_WARNING);
		  return;
		}
		else if (in_array($status, [self::STATUS_NORMAL, self::STATUS_REPORTED ] ) )
		{
			$this->_status = $status;
		}
	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function id() {
		return $this->_id;
	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function postId() {
		return $this->_postId;
	}


	/**
	 * @access public
	 * @return text
	 */

	public final  function text() {
		return $this->_text;
	}


	/**
	 * @access public
	 * @return char
	 */

	public final  function author() {
		return $this->_author;
	}


	/**
	 * @access public
	 * @return date
	 */

	public final  function date() {
		return $this->_date;
	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function status() {
		return $this->_status;
	}


	/**
	 * @access public
	 * @param array $data 
	 * @return void
	 */

	public final  function hydrate(array $comment) {
		
		foreach($comment as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}


}
?>