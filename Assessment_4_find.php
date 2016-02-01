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
		<script type="text/javascript" src="jquery.js"></script>
		<script>
		$(document).ready(function(){
			<?php if($_POST['find_2']){
				echo '$("form[name=\'multi\']").hide();';
			}
			else echo '$("form[name=\'simple\']").hide();';
			?>
			$("input[name='switch']").change(function(){
				if(this.value == 'multi'){
					$("form[name='multi']").show();
					$("form[name='simple']").hide();
				}
				else if(this.value == 'simple'){
					$("form[name='multi']").hide();
					$("form[name='simple']").show();
				}
			});
		});
		</script>
		<style>
			table{
    			width: 90%;
    			border-collapse: collapse;
			}
			td{
    			text-align: left;
			}
		</style>
	</head>

	<body>
		<header>
			<div id = "titre_principal">
				<center><h1>Rent One</h1></center>

			</div>
			<div id = "banniere">
				<div id = "banniere_image">
					<div id = "banniere_description">
						<h2>Search a car</h2>
					</div>
				</div>
			</div>
		</header>
		<div id = "content">
			<nav>
				<ul>
					<li><a href='Assessment_4_index.php'>Home</a></li>
					<li><a href='Assessment_4_regis.php'>Registration</a></li>
					<li><a href='Assessment_4_modif.php'>Change information</a></li>
				</ul>
			</nav>
			<section id = "presentationSection">
				<article>
					<CENTER>
						<?php if(isset($_SESSION["login"])){ ?>


						<input type="radio" name="switch" value="multi" checked>Select&nbsp;&nbsp;
						<input type="radio" name="switch" value="simple">Input<br><br>

						<form method="post" name="multi" action="Assessment_4_find.php">
							<select name="make" size="1">
								<option>NONE</option>
								<?php
								$get_make = mysqli_query($bdd, "SELECT DISTINCT make FROM car ORDER BY make ASC");
								while($print_make = mysqli_fetch_array($get_make)){
									echo "<option>";
									echo $print_make["make"];
									echo "</option>";
								}
								?>
							</select>&nbsp;&nbsp;

							<select name="colour" size="1">
								<option>NONE</option>
								<?php
								$get_colour = mysqli_query($bdd, "SELECT DISTINCT colour FROM car ORDER BY colour ASC");
								while($print_colour = mysqli_fetch_array($get_colour)){
									echo "<option>";
									echo $print_colour["colour"];
									echo "</option>";
								}
								?>
							</select>&nbsp;&nbsp;

							<select name="year" size="1">
								<option>NONE</option>
								<?php
								$get_year = mysqli_query($bdd, "SELECT DISTINCT year FROM car ORDER BY year ASC");
								while($print_year = mysqli_fetch_array($get_year)){
									echo "<option>";
									echo $print_year["year"];
									echo "</option>";
								}
								?>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;

							<input type="submit" value="Search" name="find_1">
						</form>

						<form method="get" name="simple" action="Assessment_4_find.php">
							<input type="text" placeholder="ex: BMW black" name="lycos">
							<input type="submit" value="Search" name="find_2">
						</form>

						<?php
						if(isset($_POST["find_1"])){
							if($_POST["make"] == "NONE" && $_POST["colour"] == "NONE" && $_POST["year"] == "NONE"){
								$choix_all = mysqli_query($bdd, "SELECT * from car");
								while($print_all = mysqli_fetch_array($choix_all)){
									echo "<table>";
									echo "<tr>";
									echo "<td><img src=".$print_all["picture"]." style=\"width:228px;height:228px\" /></td><td>".$print_all["make"]."</td><td>".$print_all["colour"]."</td><td>".$print_all["model"]."</td><td>".$print_all["year"]."</td><td>".$print_all["cc"]."</td>";
									echo "</tr>";
									echo "</table>";
								}
							}
							elseif($_POST["make"] == "NONE" && $_POST["colour"] == "NONE" && $_POST["year"] !== "NONE"){
								$year = $_POST["year"];
								$choix_year = mysqli_query($bdd, "SELECT * from car WHERE year LIKE '{$year}'");
								while($print_year = mysqli_fetch_array($choix_year)){
									echo "<table>";
									echo "<tr>";
									echo "<td><img src=".$print_year["picture"]." style=\"width:304px;height:228px\" /></td><td>".$print_year["make"]."</td><td>".$print_year["colour"]."</td><td>".$print_year["model"]."</td><td>".$print_year["year"]."</td><td>".$print_year["cc"]."</td>";
									echo "</tr>";
									echo "</table>";
								}
							}
							elseif($_POST["make"] == "NONE" && $_POST["year"] == "NONE" && $_POST["colour"] !== "NONE"){
								$colour = $_POST["colour"];
								$choix_colour = mysqli_query($bdd, "SELECT * from car WHERE colour LIKE '{$colour}'");
								while($print_colour = mysqli_fetch_array($choix_colour)){
									echo "<table>";
									echo "<tr>";
									echo "<td><img src=".$print_colour["picture"]." style=\"width:304px;height:228px\" /></td><td>".$print_colour["make"]."</td><td>".$print_colour["colour"]."</td><td>".$print_colour["model"]."</td><td>".$print_colour["year"]."</td><td>".$print_colour["cc"]."</td>";
									echo "</tr>";
									echo "</table>";
								}
							}
							elseif($_POST["year"] == "NONE" && $_POST["colour"] == "NONE" && $_POST["make"] !== "NONE"){
								$make = $_POST["make"];
								$choix_make = mysqli_query($bdd, "SELECT * from car WHERE make LIKE '{$make}'");
								while($print_make = mysqli_fetch_array($choix_make)){
									echo "<table>";
									echo "<tr>";
									echo "<td><img src=".$print_make["picture"]." style=\"width:304px;height:228px\" /></td><td>".$print_make["make"]."</td><td>".$print_make["colour"]."</td><td>".$print_make["model"]."</td><td>".$print_make["year"]."</td><td>".$print_make["cc"]."</td>";
									echo "</tr>";
									echo "</table>";
								}
							}
							elseif($_POST["make"] !== "NONE" && $_POST["colour"] !== "NONE" && $_POST["year"] == "NONE"){
								$make = $_POST["make"];
								$colour = $_POST["colour"];
								$choix_make_colour = mysqli_query($bdd, "SELECT * from car WHERE make LIKE '{$make}' AND colour LIKE '{$colour}'");
								while($print_make_colour = mysqli_fetch_array($choix_make_colour)){
									echo "<table>";
									echo "<tr>";
									echo "<td><img src=".$print_make_colour["picture"]." style=\"width:304px;height:228px\" /></td><td>".$print_make_colour["make"]."</td><td>".$print_make_colour["colour"]."</td><td>".$print_make_colour["model"]."</td><td>".$print_make_colour["year"]."</td><td>".$print_make_colour["cc"]."</td>";
									echo "</tr>";
									echo "</table>";
								}
							}
							elseif($_POST["make"] !== "NONE" && $_POST["colour"] == "NONE" && $_POST["year"] !== "NONE"){
								$make = $_POST["make"];
								$year = $_POST["year"];
								$choix_make_year = mysqli_query($bdd, "SELECT * from car WHERE make LIKE '{$make}' AND year LIKE '{$year}'");
								while($print_make_year = mysqli_fetch_array($choix_make_year)){
									echo "<table>";
									echo "<tr>";
									echo "<td><img src=".$print_make_year["picture"]." style=\"width:304px;height:228px\" /></td><td>".$print_make_year["make"]."</td><td>".$print_make_year["colour"]."</td><td>".$print_make_year["model"]."</td><td>".$print_make_year["year"]."</td><td>".$print_make_year["cc"]."</td>";
									echo "</tr>";
									echo "</table>";
								}
							}
							elseif($_POST["make"] == "NONE" && $_POST["colour"] !== "NONE" && $_POST["year"] !== "NONE"){
								$colour = $_POST["colour"];
								$year = $_POST["year"];
								$choix_colour_year = mysqli_query($bdd, "SELECT * from car WHERE colour LIKE '{$colour}' AND year LIKE '{$year}'");
								while($print_colour_year = mysqli_fetch_array($choix_colour_year)){
									echo "<table>";
									echo "<tr>";
									echo "<td><img src=".$print_colour_year["picture"]." style=\"width:304px;height:228px\" /></td><td>".$print_colour_year["make"]."</td><td>".$print_colour_year["colour"]."</td><td>".$print_colour_year["model"]."</td><td>".$print_colour_year["year"]."</td><td>".$print_colour_year["cc"]."</td>";
									echo "</tr>";
									echo "</table>";
								}
							}
							elseif($_POST["make"] !== "NONE" && $_POST["colour"] !== "NONE" && $_POST["year"] !== "NONE"){
								$make = $_POST["make"];
								$colour = $_POST["colour"];
								$year = $_POST["year"];
								$choix_make_colour_year = mysqli_query($bdd, "SELECT * from car WHERE colour LIKE '{$colour}' AND year LIKE '{$year}' AND make LIKE '{$make}'");
								while($print_make_colour_year = mysqli_fetch_array($choix_make_colour_year)){
									echo "<table>";
									echo "<tr>";
									echo "<td><img src=".$print_make_colour_year["picture"]." style=\"width:304px;height:228px\" /></td><td>".$print_make_colour_year["make"]."</td><td>".$print_make_colour_year["colour"]."</td><td>".$print_make_colour_year["model"]."</td><td>".$print_make_colour_year["year"]."</td><td>".$print_make_colour_year["cc"]."</td>";
									echo "</tr>";
									echo "</table>";
								}
							}
						}

						if(isset($_GET["find_2"])){
							$word_search = $_GET['lycos'];
							$user=$_SESSION["login"];
							
							$write = "INSERT INTO historic(user, search) VALUES('$user', '$word_search')";
							if(!mysqli_query($bdd, $write)){
								echo mysqli_error($write);
							} 
							
							if ($word_search == "") { 
								echo '<b>You forgot to enter a search term!</b>';
								exit;  
							}  
							 
							$searchTerms = explode(' ', $word_search);
							$searchTermBits = array();
							foreach ($searchTerms as $term){
								$term = trim($term);
								if (!empty($term)) {	
									$searchTermBits[] = "make LIKE '%$term%'";
									$searchTermBits[] = "model LIKE '%$term%'";
									$searchTermBits[] = "colour LIKE '%$term%'";
									$searchTermBits[] = "cc LIKE '%$term%'";
									$searchTermBits[] = "year LIKE '%$term%'";
								}
							}
			
							$sql = "SELECT * FROM car WHERE ".implode(' OR ', $searchTermBits)." "; 
							$exec_sql = mysqli_query($bdd, $sql);
							while($print_sql = mysqli_fetch_array($exec_sql)){
								echo "<table>";
								echo "<tr>";
								echo "<td><img src=".$print_sql["picture"]." style=\"width:304px;height:228px\" /></td><td>".$print_sql["make"]."</td><td>".$print_sql["colour"]."</td><td>".$print_sql["model"]."</td><td>".$print_sql["year"]."</td><td>".$print_sql["cc"]."</td>";
								echo "</tr>";
								echo "</table>";
							}
						}
					}else echo "<b>Please login to pursue your search</b>";
					?>
				</CENTER>

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
							<form method="post" action="Assessment_4_find.php">
								<input type="submit" value="Delete all" name="del_but">
							</form>
							<?php 
						}else{ 
							?>
							<form method="post" action="Assessment_4_index.php">
								<fieldset>
									<font size=2>Login</font><input name="login" type="text" id="login" placeholder=""></td><br>
									<font size=2>Password</font><input name="password" type="password" id="password" placeholder=""><br>
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