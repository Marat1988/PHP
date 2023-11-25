<?php

include_once("team.php");

class Player{
    public $Id;
    public $FullName;
    public $Avatar;
    public $Info;
    public $TeamId;

    public final function __construct($FullName, $Avatar, $Info, $TeamId, $Id=0){
        $this->Id = $Id;
        $this->FullName = $FullName;
        $this->Avatar = $Avatar;
        $this->Info = $Info;
        $this->TeamId = $TeamId;
    }

    static function getTeam($TeamId): Team|false
    {
        $team = null;
        try {
            $pdo = Db::connect();
            $ps = $pdo->prepare('SELECT * FROM Team WHERE Id=?');
            $ps->execute(array($TeamId));
            if ($ps->rowCount() > 0) {
                $row = $ps->fetch();
                $team = new Team($row['Name'], $row['Info'], $row['Avatar'], $row['CityId'], $row['CoachId'], $row['StadiumId'], $row['Id']);
            } else {
                echo '<h1>Нет данных</h1>';
                return false;
            }
            return  $team;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    static function fromDb($Id): bool|Player
    {
        $player= null;
        try {
            $pdo = Db::connect();
            $ps = $pdo->prepare('SELECT * FROM Player WHERE Id=? LIMIT 1');
            $ps->execute(array($Id));
            if ($ps->rowCount() > 0) {
                $row = $ps->fetch();
                $player = new Player($row['FullName'], $row['Avatar'], $row['Info'], $row['TeamId'], $row['Id']);
            } else {
                echo "<h3><span style='color:red;'>Нет данных</span></h3>";
                return false;
            }
            return $player;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    static function getAllPlayersByTeamId($StadiumId): array|bool
    {
        $payers = null;
        try {
            $pdo = Db::connect();
            $ps = $pdo->prepare('SELECT * FROM Player WHERE TeamId=?');
            $ps->execute(array($StadiumId));
            if ($ps->rowCount() > 0) {
                while ($row = $ps->fetch()) {
                    $player = new Player($row['FullName'], $row['Avatar'], $row['Info'], $row['TeamId'], $row['Id']);
                    $payers[] = $player;
                }
            } else {
                echo '<h1>Нет данных</h1>';
                return false;
            }
            return $payers;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function getInfoToHTML()
    {
        $img = base64_encode($this->Avatar);
        echo '<h1 style="text-align: center;">' . $this->FullName . '</h1>';
        echo '<p><img src="data:image/jpeg; base64, ' . $img . '" style="float:left; margin: 4px 10px 2px 0px; width:10%; height: 10%;" />';
        echo '' . $this->Info . '';
        echo '</p>';
    }


}

?>