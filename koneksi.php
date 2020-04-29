<?php
session_start(); // ini adalah kode untuk memulai session
        $host = "letsgolearn.tech";
        $Username = "letsgole_bebas";
        $Password = "bebasbebas123123";

        try{
            $conn = new PDO("mysql:host=letsgolearn.tech; dbname=letsgole_robiuts", "letsgole_bebas", "bebasbebas123123");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
                if (isset($_POST["login"])) {
                  if (empty($_POST["Username"]) || empty($_POST["Username"])) {
                    $message = '<label> isi dulu</label>';
                  }else{
                    $query = "SELECT * FROM login WHERE Username =:Username AND Password =:Password";
                    $statment = $conn->prepare($query);
                    $statment->execute(
                      array(
                        'Username' => $_POST["Username"],
                        'Password' => $_POST["Password"]
                      )

                    );
                    $count = $statment->rowCount();

                    if ($count > 0 ) {
                      $_SESSION["Username"] = $_POST["Username"];
                      header("location:loginpuasa.php ");
                    }else{
                      $message = '<label>wrong</label>';
                    }
                  }
                }
                
            }
            
        }catch (PDOException $e){
            echo "ERROR : " .$e->getMessage();
        }


?>