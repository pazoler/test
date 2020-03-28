
<?php 
/**
* Junior task
*
* @author author <pazoler@mail.ru>
* @version 1.0
*/
/**
PDO for DBconnection
 */
use PDO;

/**
 * Item Class
 *
 */

class Item {
	/**
     * @var int $id id
     * @var string $name name
     * @var int $status status
     * @var bool $bool flag
     * @var array $data for data storage
     */
	private $id;
	private $name;
	private $status;
	private $bool;
	public $data;

	public function __construct (int $id) {
		$this->id = $id;
		$this->init($id);
	}

	/**
	* get data from DB and set it to $data property
	* @param integer $id 
	*/
	private function init ($id) {
		$connection = new PDO('mysql:host=example.com;dbname=database', 'user', 'password');
		$sql = 'SELECT name, status FROM objects WHERE id = :"$this->id"';
		$result = connection->prepare($sql);
		$result->execute(['id'=>$this->id]);
		
		$data = $result->fetch();

		// $this->setName($data['name']);
		// $this->setStatus($data['status']);
		$this->data = $data;

	}

	/**
     * get properties by $this->name, for example;
     *
     * @property-read $this->property
     */
	public function __get (string $property) 
	{
		$method = "get{$property}";
		if (method_exists($this, $method)) {
			return $this->$method();
		}
	}

	/**
     * set properties by $this->name = "name", for example
     *
     *  @property-write $this->property=$value
     */
	public function __set ($property, $value) {
		$method = "set{$property}";
		if (method_exists($this, $method)) {
			return $this->$method($value);
		}
	}


	/**
     * get Name property 
     *
     * @return $this->name
     */
	public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }

     public function getBool()
    {
        return $this->bool;
    }

    /**
     * set Name property 
     *
     * @param string $this->data['name'];
     */

	public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    public function setBool(bool $bool)
    {
        $this->bool = $bool;
    }

    /**
     * Set new values to $data property
     * @uses Item::$data 
	 * @return void
     */
    public function save() {
    	$this->data['name'] = $this->name;
    	$this->data['status'] = $this->status;
    }
	
}




