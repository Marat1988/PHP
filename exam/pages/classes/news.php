<?php
class News{
    public $Id;
    public $Title;
    public $DateNews;
    public $Info;

    public function __construct($Title, $DateNews, $Info, $Id = 0){
        $this->Title = $Title;
        $this->DateNews = $DateNews;
        $this->Info = $Info;
        $this->Id = $Id;
    }

    public function intoDb()
    {
        try {
            $pdo = Db::connect();
            $ps = $pdo->prepare("INSERT INTO News (Title, DateNews, Info) VALUES (:Title, :DateNews, :Info)");
            $array = get_object_vars($this);
            array_shift($array);
            $ps->execute($array);
        } catch (PDOException $e) {
            $err = $e->getMessage();
            if (substr($err, 0, strrpos($err, ":")) == 'SQLSTATE[23000]: Integrity constraint violation')
                return 1062;
            else
                return $e->getMessage();
        }
    }

    static function fromDb($Id): bool|News
    {
        $news = null;
        try {
            $pdo = Db::connect();
            $ps = $pdo->prepare('SELECT * FROM News WHERE Id=? LIMIT 1');
            $ps->execute(array($Id));
            if ($ps->rowCount() > 0) {
                $row = $ps->fetch();
                $news= new News($row['Id'], $row['Title'], $row['DateNews'], $row['Info']);
            } else {
                echo "<h3><span style='color:red;'>Пользователь не найден</span></h3>";
                return false;
            }
            return $news;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    static function getAllNewsFromDb(): array|bool
    {
        $newsArr = null;
        try {
            $pdo = Db::connect();
            $ps = $pdo->prepare('SELECT * FROM News ORDER BY DateNews');
            $ps->execute();
            if ($ps->rowCount() > 0) {
                while ($row = $ps->fetch()) {
                    $news = new News($row['Title'], $row['DateNews'], $row['Info'], $row['Id']);
                    $newsArr[] = $news;
                }
            } else {
                echo '<h1>Нет данных</h1>';
                return false;
            }
            return $newsArr;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>