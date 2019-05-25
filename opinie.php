<html>
<head>
    <meta charset="utf-8"/>
    <title>Opinie</title>
    <?php
        $conn = new mysqli('localhost','root','','s1');
        $conn->query("SET CHARSET utf8");
        $conn->query("SET NAMES `utf8` COLLATE `utf8_general_ci`");
    ?>
    <style>
        *{
            font-family: 'Comic Sans MS';
        }
        #zewn{
            background: rgba(184, 157, 137,0.8);
            width: 80%;
            height: 20%;
            margin: 0 auto;
            box-sizing: border-box;
            margin-top: 5%;
            text-align: center;
            padding: 20px;
            font-size: 30px;
            color: white;
            text-shadow: 3px 3px black;
        }
        #con{
            background: rgba(184, 157, 137,0.8);
            width: 80%;
            height: auto;
            margin: 0 auto;
            box-sizing: border-box;
            text-align: center;
            font-size: 30px;
            color: white;
            text-shadow: 3px 3px black;
            display: flex;
        }
        #dodaj{
            width: 50%;
            height: 110%;
            padding: 75px;
        }
        #opinie{
            width: 50%;
            height: 110%;
            font-size: 20px;
        }
        body{
            background-image: url(major.jpg);
        }
        #footer{
            width: 80%;
            height: 4%;
            margin: 0 auto;
            background: rgba(184, 157, 137,0.8);
            text-align: right;
            color: white;
            text-shadow: 3px 3px black;
            padding: 5px;
            box-sizing: border-box;
            padding-right: 15px;
        }
        #i{
            height: 50px;
            width: 300px;
            font-size: 30px;
            padding: 10px;
            margin: 10px;
        }
        #o{
            height: 200px;
            width: 500px;
            padding: 10px;
            font-size: 20px;
        }
        #s{
            height: 50px;
            width: 200px;
            font-size: 30px;
            background: #8e9ead;
        }
        #oc{
            height: 50px;
            width: 150px;
            font-size: 30px;
            margin: 10px;
        }
        hr{
            border: 1px solid black;
            width: 400px;
            height: auto;
        }
    </style>
</head>
<body>
    <div id="zewn">
        <h1>Dodaj opinię!</h1>
    </div>
    <div id="con">
        <div id="dodaj">
            <form method="post" action="opinie.php">
                <input name="imie" placeholder="Podaj imię" id="i"/><br>
                <textarea name="opinia" placeholder="Napisz opinię" id="o"></textarea><br>
                <input name="ocena" placeholder="Ocena" type="number" min="1" max="5" id="oc"/><br>
                <input type="submit" value="Prześlij!" id="s"/>
            </form>
        </div>
        <?php
            @$imie = $_POST['imie'];
            @$opinia = $_POST['opinia'];
            @$ocena = $_POST['ocena'];
            
            $sql = "INSERT INTO opinie (imie, opinia, ocena) VALUES ('$imie','$opinia','$ocena')";
            if($imie!="" || $opinia!="" || $ocena!=""){
                $conn->query($sql);
                header("location:opinie.php");
            }
        ?>
        <div id="opinie">
        <?php
            $sql2 = "SELECT imie, opinia, ocena FROM opinie";
            $res = $conn->query("$sql2");
            
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    echo "<h1>".$row['imie']."</h1>"."<p>".$row['opinia']."</p>"."<p>"."Ocena: ".$row['ocena']."</p>"."<hr>"."<br>";
                }
            }else{
                echo $conn->error;
            }
        ?>
        </div>
    </div>
    <div id="footer">
        Copyright &copy; GB 2019
    </div>
</body>
</html>