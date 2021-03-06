<?php
  include("ressources/snippets/session.php");
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <?php include("ressources/snippets/globalsources.php");?>
        <link rel = "stylesheet" type="text/css" href = "ressources/registrierungsseite/registrierung_style_sheet.css">
    </head>
    <body>
        <?php include ("ressources/snippets/head.php");?>

		<?php
			$userDb = new PDO('sqlite:ressources/SQLData/user.db');
			
			$emailerr = False;
			
			if(isset($_POST["email"]))
			{
				$sql = "SELECT email FROM user";
				
			    $result = $userDb->query($sql);
				if ($result) 
				{
					foreach($result as $row)
					{
						if(strcmp($row['email'], $_POST["email"]) == 0)
						{
							//Muh! Es gibt die email schon!
							$emailerr = True;
						}
					}
				}				
			}
		
			if(isset($_POST["email"]) && !$emailerr)
			{
				
				$sql = "SELECT * FROM user";
				
			    if (!$userDb ->query($sql)) {
					$userDb->exec("CREATE TABLE user (
									id integer PRIMARY KEY AUTOINCREMENT,
									email VARCHAR(100),
									password VARCHAR(100),
									firstName VARCHAR(20),
									lastName VARCHAR(20),
									regDate VARCHAR(20),
									infoText TEXT
									)");
				    $hashTest = password_hash('test', PASSWORD_DEFAULT);
					$userDb->exec("INSERT INTO user (email, firstName, lastName, password, infoText) VALUES ('test@test.test','TestVorname', 'TestNachname', 'test', 'Ich bin ein Testprofil')");
				}
				
				$passwordHashed = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
				$userDb->exec("INSERT INTO user (email, firstName, lastName, password, infoText, regDate) VALUES ('" . $_POST["email"] . "','" . $_POST["firstname"] . "', '" . $_POST["lastname"] . "', '" . $passwordHashed . "', '---', '" . date("d.m.Y") . "')");

				echo'
				<main class="defaultstyle">
				<div class ="container">
					<h2>Registration</h2>
					<br>
					Du bist nun registriert!';
				echo'</div>';
				print "<tr><td>Id</td><td>Vorname</td><td>nachName</td><td>Beschreibung</td></tr>";
				$result = $userDb->query('SELECT * FROM user');
				foreach($result as $row)
				{
					print "<tr><td>".$row['id']."</td>";
					print "<td>".$row['email']."</td>";
					print "<td>".$row['firstName']."</td>";
					print "<td>".$row['lastName']."</td>";
					print "<td>".$row['infoText']."</tr>";
				}
				print "</table>";
				/**/
				// close the database connection
				$userDb = NULL;
	
				echo'</main>';
			}
			else
			{
				echo'
		
        <main class="defaultstyle">
            <div class ="container">
                <h2>Registration</h2>
                <form action="registration.php" id="toSubmit" method="post">
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control toCheck" id="fname" placeholder="Vorname" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="Vorname">Vorname:</label>
                        <input type="text" class="form-control toCheck" id="lname" placeholder="Nachname" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control toCheck" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd2">Passwort:</label>
                        <input type="password" class="form-control toCheck" id="pwd2" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-group">
                        <label for="pwdcnf">Passwort wiederholen:</label>
                        <input type="password" class="form-control toCheck" id="pwdcnf" placeholder="Retype password" name="pswdcnf">
                    </div>
                    <p id = "error" style="color:red">';
					if($emailerr)
					{
						echo 'Die Angegebene Email existiert bereits!';
					}
					echo'
                    </p>
                    <div class="g-recaptcha" data-sitekey="6Ldb3mEUAAAAAM1xksEH_K2uy4EvTwMgvrCd2LoK"></div>
                </form>
				<button onclick="validation()">Registrieren</button>
            </div>
        </main>';
			}
		?>

		
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>
        <script src = "ressources/js/formvalid.js"></script>
        <script>
            function validation() {
                if(validateForm()){
                    document.getElementById("toSubmit").submit();
                }
            }
        </script>
    </body>
</html>
