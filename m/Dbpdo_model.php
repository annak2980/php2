<?
class Dbpdo{
    
    use Singleton;

    private $db; // Ресурс работы с БД
	
    /*
     * Выполняем соединение с базой данных
     */
	public function connect(){
        
        // Формируем строку соединения с сервером
        $connectString = 'mysql:host=' . SERVER . ';port= 3306;dbname=' . DB . ';charset=UTF8;';
        $this->$db = new PDO($connectString, USERNAME, PASSWORD,
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // возвращать ассоциативные массивы
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // возвращать Exception в случае ошибки
            ]
        );
        
	}
	
    /*
     * Выполнить запрос к БД
     */
    public function Query($query, $params = array())
    {   
        $this -> connect();
        $res = $this->$db->prepare($query);
        $res->execute($params);
        return $res;
    }

    /*
     * Выполнить запрос с выборкой данных
     */
    public function Select($query, $params = array())
    {   
        $this -> connect();
        $result = $this->Query($query, $params);
        if ($result) {
            return $result->fetchAll();
        }
    }
    
}	