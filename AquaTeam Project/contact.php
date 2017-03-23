
<?php

include 'classes/calendar.php';

$month = isset($_GET['m']) ? $_GET['m'] : NULL;
$year  = isset($_GET['y']) ? $_GET['y'] : NULL;

$calendar = Calendar::factory($month, $year);

$event1 = $calendar->event()->condition('timestamp', strtotime(date('F').' 21, '.date('Y')))->title('Hello All')->output('<a href=""></a>');
$event2 = $calendar->event()->condition('timestamp', strtotime(date('F').' 21, '.date('Y')))->title('Something Awesome')->output('<a href=""></a>');

$calendar->standard('today')
	->standard('prev-next')
	->standard('holidays')
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Marmelad' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>




<link type="text/css" rel="stylesheet" media="all" href="css/styleCalendar.css" />
	<title>Acceuil</title>
</head>
<body>

<header>
			<div id="main_header">
				
			</div>
	</header>

	<nav class="horizontal-nav">
    <ul style="list-style-type: none;">
        <li><a href="index.php" >Acceuil</a></li>
        <li><a href="entraineuses.php">Entraineuse</a></li>
        <li><a href="communique.php">Communique</a></li>
        <li><a href="photos_videos.php">Photo/Video</a></li>
        <li><a href="resultat.php">Resultat</a></li>
        <li><a href="tarifs.php">Tarifs</a></li>
        <li><a href="#" class="current">Contact</a></li>
    </ul>
	</nav>

	<div id="content">
		

		 
		<div class="first_cont">
			<h3 class="h3">Conseil d'Administration 2012 - 2013</h3>
			<p>Le Conseil d'Administration (CA) du Club Aqua-Rythme est constitué de parents bénévoles. Sans ces gens dévoués le Club ne saurait survivre. Les membres du C.A. sont élus lors de l'assemblée générale qui a lieu entre le 1er septembre et le 31 octobre de chaque année.</p>

				
				<table id="table1">
					<tr>
						<th>Président(e)</th>
						<th>Vice-Président(e)</th>
						<th>Trésorier(ère)</th>
						<th>Secrétaire</th>
					</tr>
					<tr>
						<td>Lucie Mainville</td>
						<td>Benoît Fortin</td>
						<td>Louise Vallée</td>
						<td>Céline Leblanc</td>
					</tr>
				
				</table>
				

				<table id="table2">
					<tr>
						<th>Directeur</th>
						<th>Directeur</th>
						<th>Directeur</th>
						<th>Directeur</th>
					</tr>
					<tr>
						<td>Vacant</td>
						<td>Catherine St-Roch</td>
						<td>Linh Wuong</td>
						<td>Brenda Allard </td>
					</tr>
				
				</table>
		</div>

			<hr>

			<div id="corres">
				<div class="corres_left">
					<h2>Correspondance</h2>
					<p>Club Aqua-Rythme Saint-Bruno<br>
						C.P. 91, succ. Bureau-Chef<br>
						Saint-Bruno-de-Montarville, Qc<br>
						J3V 4P8</p>

				</div>
				<div class="corres_right">
					<iframe width="325" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Saint-Bruno-de-Montarville,+QC+J3V+4P8&amp;aq=0&amp;oq=Qc+J3V+4P8&amp;sll=49.891235,-97.15369&amp;sspn=32.227455,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Saint-Bruno-de-Montarville,+Quebec+J3V+4P8&amp;t=m&amp;z=14&amp;ll=45.526663,-73.34253&amp;output=embed"></iframe><br /><small><a href="https://maps.google.ca/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Saint-Bruno-de-Montarville,+QC+J3V+4P8&amp;aq=0&amp;oq=Qc+J3V+4P8&amp;sll=49.891235,-97.15369&amp;sspn=32.227455,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Saint-Bruno-de-Montarville,+Quebec+J3V+4P8&amp;t=m&amp;z=14&amp;ll=45.526663,-73.34253" style="color:#0000FF;text-align:left">View Larger Map</a></small>
				</div>
			</div>


			<hr>

			<div id="piscine">
				<div class="pis_left">
					<h2>Adresse de notre piscine</h2>
					<p>École secondaire Mont-Bruno<br>
						221, boul. Clairevue Est<br>
						St-Bruno-de-Montarville, Qc<br>
						J3V 5J3</p>

				</div>
				<div class="pis_right">
					<iframe width="325" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=St-Bruno-de-Montarville,+Qc+J3V+5J3&amp;aq=&amp;sll=45.52663,-73.350048&amp;sspn=0.008584,0.006137&amp;ie=UTF8&amp;hq=&amp;hnear=Saint-Bruno-de-Montarville,+Quebec+J3V+5J3&amp;t=m&amp;z=14&amp;ll=45.533345,-73.340635&amp;output=embed"></iframe><br /><small><a href="https://maps.google.ca/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=St-Bruno-de-Montarville,+Qc+J3V+5J3&amp;aq=&amp;sll=45.52663,-73.350048&amp;sspn=0.008584,0.006137&amp;ie=UTF8&amp;hq=&amp;hnear=Saint-Bruno-de-Montarville,+Quebec+J3V+5J3&amp;t=m&amp;z=14&amp;ll=45.533345,-73.340635" style="color:#0000FF;text-align:left">View Larger Map</a></small>
				</div>

			</div>

			<hr>
			<div class="form_div">
				<div class="contact_left">
					<h2>Contact Us</h2>
					


					<div style="width:5px; padding:2px; margin:0 -50px">
			<table class="calendar">
				<thead>
					<tr class="navigation">
						<th class="prev-month"><a href="<?php echo htmlspecialchars($calendar->prev_month_url()) ?>"><?php echo $calendar->prev_month() ?></a></th>
						<th colspan="5" class="current-month"><?php echo $calendar->month() ?></th>
						<th class="next-month"><a href="<?php echo htmlspecialchars($calendar->next_month_url()) ?>"><?php echo $calendar->next_month() ?></a></th>
					</tr>
					<tr class="weekdays">
						<?php foreach ($calendar->days() as $day): ?>
							<th><?php echo $day ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($calendar->weeks() as $week): ?>
						<tr>
							<?php foreach ($week as $day): ?>
								<?php
								list($number, $current, $data) = $day;
								
								$classes = array();
								$output  = '';
								
								if (is_array($data))
								{
									$classes = $data['classes'];
									$title   = $data['title'];
									$output  = empty($data['output']) ? '' : '<ul class="output"><li>'.implode('</li><li>', $data['output']).'</li></ul>';
								}
								?>
								<td class="day <?php echo implode(' ', $classes) ?>">
									<span class="date" title="<?php echo implode(' / ', $title) ?>"><?php echo $number ?></span>
									<div class="day-content">
										<?php echo $output ?>
									</div>
								</td>
							<?php endforeach ?>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>



				</div>
				<div class="contact_right">
					<form method="post">
						<div class="name_span"><label>Name:</label><input class="input" name="contact_name" type="text" length="150"></div>
						<div class="email_span"><label>Email:</label><input class="input" name="contact_email" type="text" length="150"></div>
						<div class="message_span"><label style="vertical-align: top;">Message:  </label><textarea name="contact_body" rows="10" cols="30"></textarea></div><br>
						<input class="submit" name="email_submit" type="submit">
					</form>
				</div>
			</div>

			
		</div>

		






		<footer id="footer_content">		
				<div class="btm_left">
					<h4><a href="http://www.youtube.com/user/AquaRythme">YouTube Aqua-Rythme</a></h4>			
				</div>

				<div class="btm_center">
					<h4><a href="journal.php">Articles de Journal</a></h4>
				</div>

				<div class="btm_right">
					<h4><a href="planduSite.php">Plan du Site</a></h4>
				</div>
				<div class="copyright">
					<p>Copyrights &copy; John Benoualid &amp; Alex Lopez 2013 - The End of Time. All rights reserved.</p>
				</div>

		</footer>
</body>
</html>


<?php

if (isset($_POST["email_submit"])) {
	if ($_POST["contact_name"] != null || $_POST["contact_name"] != "" || $_POST["contact_email"] != null || $_POST["contact_email"] != "" || $_POST["contact_body"] != null || $_POST["contact_body"] != "" ) {


		$headers  = ''.$_POST["contact_name"].'' . "\r\n" .
		'Reply-To: '.$_POST["contact_email"].'' . "\r\n" .
		'MIME-Version: 1.0' . "\r\n" .
		'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();


		$to       = 'alextestdummy@gmail.com'; 
		$subject  = 'Aquateam WebSite - Contact Message';
		$message  = ''.$_POST["contact_body"].'';

		if(mail($to, $subject, $message, $headers)){
    echo "Email sent";
		}else{
    echo "Email sending failed";
		}   

	}else{

		  echo "<script>alert('Since you didnt complete an easy task like filling a form, we will throw your information to the shark!')</script>";

	}
}

?>