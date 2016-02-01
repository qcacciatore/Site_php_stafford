<!-- 

MMMMMMMMMMMMMMMMMMMMMMMMMM=~===++????III777$$$$$ZZZZOMMMMMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMM,:::~=IIIIIIIIIIIIIIIIIIIIIIIIIII$OOOO8MMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMM~~~:+IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII?I8888MMMMMMMMMMMMMMMM
MMMMMMMMMMMM===+IIIIIIIIIIIIIIIIII,.....IIIIIIIIIIIIIIIIIIIIIIIIDDDMMMMMMMMMMMMM
MMMMMMMMM?++IIIIIIIIIIIIIIIIIIIIII.MMMM.IIIIIIIIIIIIIIIIIIIIIIIIIIIDDNMMMMMMMMMM
MMMMMMM??IIIIIIIIIIIIIIIIIIIIIIIIIMMMMMIIIIIIIIIIIIIIIIIIIIIIIIIIIIII?NNMMMMMMMM
MMMMMIIIIIIIIIIIIIIIIIIIIIIIIIIIIIMMMMMIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIINNMMMMMM
MMMMIIIIIIIIIII=MMMMMMMMMMMMM.III.MMMMMMMMMMMM~~III.MMMMMMMMMMMM.IIIIIIIIOMMMMMM
MM$7IIIIIIIIIII.MMMMMMMMMMMMMMM+?DMMMMMMMMMMMMMM.IIMMMMMMMMMMMMMMM IIIIIIIIMMMMM
MO7IIIIIIIIIIIIMMMMM.....,MMMMMMIMMMMM.....$MMMMMI.MMMM......MMMMMM.IIIIIIIIMMMM
M$IIIIIIIIIIIIIMMMMMIIIIII.MMMMM.MMMM.IIIII.MMMM:I.MMMM.IIIIII7MMMM.IIIIIIIIIMMM
$$IIIIIIIIIIII.MMMM.IIIIII:MMMMM:MMMM.IIIII.MMMM.IMMMMMIIIIIII~MMMM.IIIIIIIIIMMM
$$IIIIIIIIIIIIIMMMM.IIIIII.MMMMDMMMMMIIIIIIMMMMM?,MMMMMIIIIIIIMMMMM.IIIIIIIII8MM
ZZIIIIIIIIIIIIMMMMMIIIII?.MMMMM MMMM.IIIII.MMMMM? MMMM.IIIII?$MMMMO?IIIIIIIII8MM
ZZIIIIIIIIIII.MMMMM.....MMMMMM..MMMM.IIIII.MMMM.IMMMMM.....MMMMMMM?IIIIIIIIIIMMM
MZIIIIIIIIII?.MMMMMMMMMMMMMMM?IMMMMMIIIII7MMMMM.?MMMMMMMMMMMMMMM.IIIIIIIIIIIIMMM
M8ZIIIIIIIIIIMMMMMMMMMMMMM.?II.MMMM+IIIIIIMMMMMI.MMMMMMMMMMMMM.IIIIIIIIIIIIIMMMM
MMOZIIIIIIII.MMMM.IIIIIIIIIIIIIIIIIIIIIIIIIIIIII8MMMM+IIIIIIIIIIIIIIIIIIII?MMMMM
MMMMOOIIIIII MMMM.IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIMMMMM?IIIIIIIIIIIIIIIIIIIOMMMMMM
MMMMMOOIIIIIMMMMMIIIIIIIIIIIIIIIIIIIIIIIIIIIIII.MMMM.IIIIIIIIIIIIIIIIII?MMMMMMMM
MMMMMMMOO7I:.....IIIIIIIIIIIIIIIIIIIIIIIIIIIIII......IIIIIIIIIIIIIIII?MMMMMMMMMM
MMMMMMMMMOOO?IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII?MMMMMMMMMMMMM
MMMMMMMMMMMM8OO$?IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMM8888$IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII??7MMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMM88888OIIIIIIIIIIIIIIIIIIIIIIIIIIIONMNMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMMMMD888DDDDDDDDDDDDDDNNNNNNNNMMMMMMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
                                                       
-->

<?php
session_start(); 
?>

<!DOCTYPE html>

<?php
$bdd = mysqli_connect("localhost","quentin","ukf","quentin");

if(mysqli_connect_error()){
	echo mysqli_connect_error($bdd);
}
?>

<html>
<head>
	<meta charset="utf-8" />
	<LINK href="style_index.css" rel="stylesheet" type="text/css">

	</head>

	<body>
		<header>
			<div id = "titre_principal">
				<center><h1>Rent One</h1></center>

			</div>
			<div id = "banniere">
				<div id = "banniere_image">
					<div id = "banniere_description">
						<h2>Modification</h2>
					</div>
				</div>
			</div>
		</header>
		<div id = "content">
			<nav>
				<ul>
					<li><a href='Assessment_4_index.php'>Home</a></li>
					<li><a href='Assessment_4_regis.php'>Registration</a></li>
					<li><a href='Assessment_4_find.php'>Car search</a></li>
				</ul>
			</nav>
			<section id = "presentationSection">
				<article>
					<?php
					if(isset($_SESSION["login"])){
						$login = $_SESSION["login"];
						$sql = "SELECT * from user WHERE login LIKE '{$login}'";
						$res = mysqli_query($bdd, $sql);
						while($donnees = mysqli_fetch_array($res)){
							$surname = $donnees["surname"];
							$forename = $donnees["forename"];
							$birth = $donnees["birth"];
							$address = $donnees["address"];
							$email = $donnees["email"];
							$phone = $donnees["phone"];
							$password = $donnees["password"];

						}

						if(isset($_POST["modif_user"])){
						$surname = $_POST['surname'];
						$forename = $_POST['forename'];
						$birth = $_POST['birth'];
						$address = $_POST['address'];
						$email = $_POST['email'];
						$phone = $_POST['phone'];
						$password = $_POST['password'];
						$login = $_SESSION['login'];

						$change = "UPDATE user SET surname = '$surname', forename = '$forename', birth = '$birth', address = '$address', email = '$email', phone = '$phone', password = '$password' WHERE login = '$login'";
						
							if(!mysqli_query($bdd, $change)){
								echo mysqli_error($change);
							}
						}

						echo "<form method='post' action='Assessment_4_modif.php'>

						Password : <input name='password' type='text' id='password' value='$password' required><br><br>
						Surname : <input name='surname' type='text' id='surname' value='$surname' required><br><br>
						Forename : <input name='forename' type='text' id='forename' value='$forename' required><br><br>
						Date of birth : <input type='date' name='birth' value='$birth' required><br><br>
						Address : <input name='address' type='text' id='address' value='$address' required><br><br>
						E-mail : <input name='email' type='text' id='email' value='$email' required><br><br>
						Phone number : <input name='phone' type='text' id='phone' value='$phone' required><br><br>

						<input type='submit' value='Submit' name='modif_user'>
						</form>";
					}else echo "<center><b>Please login to modify your informations</b></center>";
			
					?>
					
				</article>
				<aside id = "asideIndex">
					<div id = "asideDiv">
						<div id = "asidePresentation">
							<br>
							<?php
							if(isset($_POST["delog"])){
								unset( $_SESSION );
								session_destroy();
							}

							if(isset($_SESSION["login"])){
								if(isset($_POST["del_but"])){
									$get_login_del=$_SESSION["login"];
									$delete_all = "DELETE FROM historic WHERE user LIKE '{$get_login_del}'";
									if(mysqli_query($bdd, $delete_all)){
										echo "";
									}
								} 
								?>
								<form method="post" action="Assessment_4_index.php">
									<?php
									if(isset($_SESSION["login"])){ 
										echo "Welcome ".$_SESSION["login"]."<br>";
										echo "<input type=\"submit\" value=\"Deco\" name=\"delog\">";
										echo "<br>";
										echo "<br>";
									}
									$get_login=$_SESSION["login"];
									echo "<u>Previous research :</u>";
									$exec_histo = mysqli_query($bdd, "SELECT DISTINCT search from historic WHERE user LIKE '{$get_login}' LIMIT 5");
									while($print_histo = mysqli_fetch_array($exec_histo)){
										echo "<br>";
										echo "<a href='http://188.213.25.40/~quentin/Assessment_4_find.php?lycos=".$print_histo["search"]."&find_2=Search'>".$print_histo["search"]." </a>";
									}
									?>
								</form>
								<form method="post" action="Assessment_4_modif.php">
									<input type="submit" value="Delete all" name="del_but">
								</form>
								<?php 
							}else{ 
								?>
								<form method="post" action="Assessment_4_index.php">
									<fieldset>
										<font size=2>Login</font><input name="login" type="text" id="login" placeholder=""></td><br>
										<font size=2>Password</font><input name="password" type="password" id="password"placeholder=""><br>
									</fieldset>
									<input type="submit" value="Login" name="log">
								</form>
								<?php 
							}
							?>
						</div>
						<div id = "asideShare">

						</div>
					</div>
				</aside>
				<div id = "anchorTopPage">
					<a href="#titre_principal">UP</a>
				</div>
			</section>
		</div>
		<footer>
			<h1>Copyright</h1>
		</footer>
	</body>
	</html>