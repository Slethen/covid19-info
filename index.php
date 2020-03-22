<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | Live Data</title>
  
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/flatly/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
</head>
    
<body>

<?php include( 'navbar.php'); ?>

<style>
  .jumbotron {
  background-image: url(https://joelduncan.io/content/images/size/w2000/2020/03/coronavirus-header.jpg);
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .jumbotron h1, h5 {
    color: white;
    text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
  } 
</style>

<?php

if (isset($_GET['country'])) {
    $selectCountry = $_GET['country'];
} else {
    $selectCountry = uk;
}

$urlWorld = "https://api.covid-19.uk.com/all";
$jsonWorld = json_decode(file_get_contents($urlWorld), true);

$worldCases = $jsonWorld["cases"];
$worldDeaths = $jsonWorld["deaths"];
$worldRecovered = $jsonWorld["recovered"];

$url = "https://api.covid-19.uk.com/countries/$selectCountry";
$json = json_decode(file_get_contents($url), true);

$country = $json["country"];
$cases = $json["cases"];
$todayCases = $json["todayCases"];
$deaths = $json["deaths"];
$todayDeaths = $json["todayDeaths"];
$recovered = $json["recovered"];
$critical = $json["critical"];

// World Calculated Percentages
$worldDeathsPercent = ($worldDeaths/$worldCases)*100; 
$worldRecoveredPercent = ($worldRecovered/$worldCases)*100;

// Local Calculated Percentages;
$deathsPercent = ($deaths/$cases)*100;
$criticalPercent = ($critical/$cases)*100; 
$recoveredPercent = ($recovered/$cases)*100;

// Replace underscores with spaces in Country name
$selectCountry = str_replace("_", " ", $selectCountry);

?>
	
<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">COVID-19  <?php echo strtoupper($selectCountry); ?> </h1>
        <h5>Coronavirus (COVID-19) is a new illness that can affect your lungs and airways. It’s caused by a virus called coronavirus.</h5>

        <div class="dropdown">
            <select class="selectpicker" onchange="location = this.value;" data-size="8" data-show-subtext="true" data-live-search="true">
            <option>Select Country</option>
                <option value="https://covid-19.uk.com/?country=afghanistan">Afghanistan</option>
                <option value="https://covid-19.uk.com/?country=albania">Albania</option>
                <option value="https://covid-19.uk.com/?country=algeria">Algeria</option>
                <option value="https://covid-19.uk.com/?country=andorra">Andorra</option>
                <option value="https://covid-19.uk.com/?country=antigua_and_barbuda">Antigua and Barbuda</option>
                <option value="https://covid-19.uk.com/?country=argentina">Argentina</option>
                <option value="https://covid-19.uk.com/?country=armenia">Armenia</option>
                <option value="https://covid-19.uk.com/?country=aruba">Aruba</option>
                <option value="https://covid-19.uk.com/?country=australia">Australia</option>
                <option value="https://covid-19.uk.com/?country=austria">Austria</option>
                <option value="https://covid-19.uk.com/?country=azerbaijan">Azerbaijan</option>
                <option value="https://covid-19.uk.com/?country=bahamas">Bahamas</option>
                <option value="https://covid-19.uk.com/?country=bahrain">Bahrain</option>
                <option value="https://covid-19.uk.com/?country=bangladesh">Bangladesh</option>
                <option value="https://covid-19.uk.com/?country=barbados">Barbados</option>
                <option value="https://covid-19.uk.com/?country=belarus">Belarus</option>
                <option value="https://covid-19.uk.com/?country=belgium">Belgium</option>
                <option value="https://covid-19.uk.com/?country=benin">Benin</option>
                <option value="https://covid-19.uk.com/?country=bhutan">Bhutan</option>
                <option value="https://covid-19.uk.com/?country=bolivia">Bolivia</option>
                <option value="https://covid-19.uk.com/?country=bosnia_and_herzegovina">Bosnia and Herzegovina</option>
                <option value="https://covid-19.uk.com/?country=brazil">Brazil</option>
                <option value="https://covid-19.uk.com/?country=brunei">Brunei</option>
                <option value="https://covid-19.uk.com/?country=bulgaria">Bulgaria</option>
                <option value="https://covid-19.uk.com/?country=burkina faso">Burkina Faso</option>
                <option value="https://covid-19.uk.com/?country=cambodia">Cambodia</option>
                <option value="https://covid-19.uk.com/?country=cameroon">Cameroon</option>
                <option value="https://covid-19.uk.com/?country=canada">Canada</option>
                <option value="https://covid-19.uk.com/?country=car">CAR</option>
                <option value="https://covid-19.uk.com/?country=cayman_islands">Cayman Islands</option>
                <option value="https://covid-19.uk.com/?country=cayman_islands">Cayman Islands</option>
                <option value="https://covid-19.uk.com/?country=channel_islands">Channel Islands</option>
                <option value="https://covid-19.uk.com/?country=chile">Chile</option>
                <option value="https://covid-19.uk.com/?country=china">China</option>
                <option value="https://covid-19.uk.com/?country=colombia">Colombia</option>
                <option value="https://covid-19.uk.com/?country=congo">Congo</option>
                <option value="https://covid-19.uk.com/?country=costa_rica">Costa Rica</option>
                <option value="https://covid-19.uk.com/?country=croatia">Croatia</option>
                <option value="https://covid-19.uk.com/?country=cuba">Cuba</option>
                <option value="https://covid-19.uk.com/?country=curaçao">Curaçao</option>
                <option value="https://covid-19.uk.com/?country=cyprus">Cyprus</option>
                <option value="https://covid-19.uk.com/?country=czechia">Czechia</option>
                <option value="https://covid-19.uk.com/?country=denmark">Denmark</option>
                <option value="https://covid-19.uk.com/?country=diamond_princess">Diamond Princess</option>
                <option value="https://covid-19.uk.com/?country=djibouti">Djibouti</option>
                <option value="https://covid-19.uk.com/?country=dominican_republic">Dominican Republic</option>
                <option value="https://covid-19.uk.com/?country=drc">DRC</option>
                <option value="https://covid-19.uk.com/?country=ecuador">Ecuador</option>
                <option value="https://covid-19.uk.com/?country=egypt">Egypt</option>
                <option value="https://covid-19.uk.com/?country=equatorial_guinea">Equatorial Guinea</option>
                <option value="https://covid-19.uk.com/?country=estonia">Estonia</option>
                <option value="https://covid-19.uk.com/?country=eswatini">Eswatini</option>
                <option value="https://covid-19.uk.com/?country=ethiopia">Ethiopia</option>
                <option value="https://covid-19.uk.com/?country=faeroe_islands">Faeroe Islands</option>
                <option value="https://covid-19.uk.com/?country=finland">Finland</option>
                <option value="https://covid-19.uk.com/?country=france">France</option>
                <option value="https://covid-19.uk.com/?country=french_guiana">French Guiana</option>
                <option value="https://covid-19.uk.com/?country=french_polynesia">French Polynesia</option>
                <option value="https://covid-19.uk.com/?country=gabon">Gabon</option>
                <option value="https://covid-19.uk.com/?country=gambia">Gambia</option>
                <option value="https://covid-19.uk.com/?country=georgia">Georgia</option>
                <option value="https://covid-19.uk.com/?country=germany">Germany</option>
                <option value="https://covid-19.uk.com/?country=ghana">Ghana</option>
                <option value="https://covid-19.uk.com/?country=gibraltar">Gibraltar</option>
                <option value="https://covid-19.uk.com/?country=greece">Greece</option>
                <option value="https://covid-19.uk.com/?country=greenland">Greenland</option>
                <option value="https://covid-19.uk.com/?country=guadeloupe">Guadeloupe</option>
                <option value="https://covid-19.uk.com/?country=guam">Guam</option>
                <option value="https://covid-19.uk.com/?country=guatemala">Guatemala</option>
                <option value="https://covid-19.uk.com/?country=guinea">Guinea</option>
                <option value="https://covid-19.uk.com/?country=guyana">Guyana</option>
                <option value="https://covid-19.uk.com/?country=honduras">Honduras</option>
                <option value="https://covid-19.uk.com/?country=hong_kong">Hong Kong</option>
                <option value="https://covid-19.uk.com/?country=hungary">Hungary</option>
                <option value="https://covid-19.uk.com/?country=iceland">Iceland</option>
                <option value="https://covid-19.uk.com/?country=india">India</option>
                <option value="https://covid-19.uk.com/?country=indonesia">Indonesia</option>
                <option value="https://covid-19.uk.com/?country=iran">Iran</option>
                <option value="https://covid-19.uk.com/?country=iraq">Iraq</option>
                <option value="https://covid-19.uk.com/?country=ireland">Ireland</option>
                <option value="https://covid-19.uk.com/?country=israel">Israel</option>
                <option value="https://covid-19.uk.com/?country=italy">Italy</option>
                <option value="https://covid-19.uk.com/?country=ivory_coast">Ivory Coast</option>
                <option value="https://covid-19.uk.com/?country=jamaica">Jamaica</option>
                <option value="https://covid-19.uk.com/?country=japan">Japan</option>
                <option value="https://covid-19.uk.com/?country=jordan">Jordan</option>
                <option value="https://covid-19.uk.com/?country=kazakhstan">Kazakhstan</option>
                <option value="https://covid-19.uk.com/?country=kenya">Kenya</option>
                <option value="https://covid-19.uk.com/?country=kuwait">Kuwait</option>
                <option value="https://covid-19.uk.com/?country=kyrgyzstan">Kyrgyzstan</option>
                <option value="https://covid-19.uk.com/?country=latvia">Latvia</option>
                <option value="https://covid-19.uk.com/?country=lebanon">Lebanon</option>
                <option value="https://covid-19.uk.com/?country=liberia">Liberia</option>
                <option value="https://covid-19.uk.com/?country=liechtenstein">Liechtenstein</option>
                <option value="https://covid-19.uk.com/?country=lithuania">Lithuania</option>
                <option value="https://covid-19.uk.com/?country=luxembourg">Luxembourg</option>
                <option value="https://covid-19.uk.com/?country=macao">Macao</option>
                <option value="https://covid-19.uk.com/?country=malaysia">Malaysia</option>
                <option value="https://covid-19.uk.com/?country=maldives">Maldives</option>
                <option value="https://covid-19.uk.com/?country=malta">Malta</option>
                <option value="https://covid-19.uk.com/?country=martinique">Martinique</option>
                <option value="https://covid-19.uk.com/?country=mauritania">Mauritania</option>
                <option value="https://covid-19.uk.com/?country=mayotte">Mayotte</option>
                <option value="https://covid-19.uk.com/?country=mexico">Mexico</option>
                <option value="https://covid-19.uk.com/?country=moldova">Moldova</option>
                <option value="https://covid-19.uk.com/?country=monaco">Monaco</option>
                <option value="https://covid-19.uk.com/?country=mongolia">Mongolia</option>
                <option value="https://covid-19.uk.com/?country=montenegro">Montenegro</option>
                <option value="https://covid-19.uk.com/?country=montserrat">Montserrat</option>
                <option value="https://covid-19.uk.com/?country=morocco">Morocco</option>
                <option value="https://covid-19.uk.com/?country=namibia">Namibia</option>
                <option value="https://covid-19.uk.com/?country=nepal">Nepal</option>
                <option value="https://covid-19.uk.com/?country=netherlands">Netherlands</option>
                <option value="https://covid-19.uk.com/?country=new_caledonia">New Caledonia</option>
                <option value="https://covid-19.uk.com/?country=new_zealand">New Zealand</option>
                <option value="https://covid-19.uk.com/?country=nigeria">Nigeria</option>
                <option value="https://covid-19.uk.com/?country=north_macedonia">North Macedonia</option>
                <option value="https://covid-19.uk.com/?country=norway">Norway</option>
                <option value="https://covid-19.uk.com/?country=oman">Oman</option>
                <option value="https://covid-19.uk.com/?country=pakistan">Pakistan</option>
                <option value="https://covid-19.uk.com/?country=palestine">Palestine</option>
                <option value="https://covid-19.uk.com/?country=panama">Panama</option>
                <option value="https://covid-19.uk.com/?country=paraguay">Paraguay</option>
                <option value="https://covid-19.uk.com/?country=peru">Peru</option>
                <option value="https://covid-19.uk.com/?country=philippines">Philippines</option>
                <option value="https://covid-19.uk.com/?country=poland">Poland</option>
                <option value="https://covid-19.uk.com/?country=portugal">Portugal</option>
                <option value="https://covid-19.uk.com/?country=puerto rico">Puerto Rico</option>
                <option value="https://covid-19.uk.com/?country=qatar">Qatar</option>
                <option value="https://covid-19.uk.com/?country=romania">Romania</option>
                <option value="https://covid-19.uk.com/?country=russia">Russia</option>
                <option value="https://covid-19.uk.com/?country=rwanda">Rwanda</option>
                <option value="https://covid-19.uk.com/?country=réunion">Réunion</option>
                <option value="https://covid-19.uk.com/?country=s._korea">S. Korea</option>
                <option value="https://covid-19.uk.com/?country=saint_lucia">Saint Lucia</option>
                <option value="https://covid-19.uk.com/?country=saint_martin">Saint Martin</option>
                <option value="https://covid-19.uk.com/?country=san_marino">San Marino</option>
                <option value="https://covid-19.uk.com/?country=saudi_arabia">Saudi Arabia</option>
                <option value="https://covid-19.uk.com/?country=senegal">Senegal</option>
                <option value="https://covid-19.uk.com/?country=serbia">Serbia</option>
                <option value="https://covid-19.uk.com/?country=seychelles">Seychelles</option>
                <option value="https://covid-19.uk.com/?country=singapore">Singapore</option>
                <option value="https://covid-19.uk.com/?country=slovakia">Slovakia</option>
                <option value="https://covid-19.uk.com/?country=slovenia">Slovenia</option>
                <option value="https://covid-19.uk.com/?country=somalia">Somalia</option>
                <option value="https://covid-19.uk.com/?country=south africa">South Africa</option>
                <option value="https://covid-19.uk.com/?country=spain">Spain</option>
                <option value="https://covid-19.uk.com/?country=sri_lanka">Sri Lanka</option>
                <option value="https://covid-19.uk.com/?country=st._barth">St. Barth</option>
                <option value="https://covid-19.uk.com/?country=st._vincent_grenadines">St. Vincent Grenadines</option>
                <option value="https://covid-19.uk.com/?country=sudan">Sudan</option>
                <option value="https://covid-19.uk.com/?country=suriname">Suriname</option>
                <option value="https://covid-19.uk.com/?country=sweden">Sweden</option>
                <option value="https://covid-19.uk.com/?country=switzerland">Switzerland</option>
                <option value="https://covid-19.uk.com/?country=taiwan">Taiwan</option>
                <option value="https://covid-19.uk.com/?country=tanzania">Tanzania</option>
                <option value="https://covid-19.uk.com/?country=thailand">Thailand</option>
                <option value="https://covid-19.uk.com/?country=togo">Togo</option>
                <option value="https://covid-19.uk.com/?country=trinidad_and_tobago">Trinidad and Tobago</option>
                <option value="https://covid-19.uk.com/?country=tunisia">Tunisia</option>
                <option value="https://covid-19.uk.com/?country=turkey">Turkey</option>
                <option value="https://covid-19.uk.com/?country=u.s._virgin_islands">U.S. Virgin Islands</option>
                <option value="https://covid-19.uk.com/?country=uae">UAE</option>
                <option value="https://covid-19.uk.com/?country=uk">UK</option>
                <option value="https://covid-19.uk.com/?country=ukraine">Ukraine</option>
                <option value="https://covid-19.uk.com/?country=uruguay">Uruguay</option>
                <option value="https://covid-19.uk.com/?country=usa">USA</option>
                <option value="https://covid-19.uk.com/?country=uzbekistan">Uzbekistan</option>
                <option value="https://covid-19.uk.com/?country=vatican_city">Vatican City</option>
                <option value="https://covid-19.uk.com/?country=venezuela">Venezuela</option>
                <option value="https://covid-19.uk.com/?country=vietnam">Vietnam</option>
                <option value="https://covid-19.uk.com/?country=zambi">Zambi</option>
            </select>
        </div>
    </div>

</div>

</div>

<script>
    $('.select2').select2();
</script>

<div class="modal fade" tabindex="-1" id="importantModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">How to avoid catching and spreading coronavirus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<p>Everyone should do what they can to stop coronavirus spreading. It is particularly important for people who:</p>
			    <ul><li>are 70 or over</li><li>have a long-term condition</li><li>are pregnant</li><li>have a weakened immune system</li></ul>
				<div class="alert alert-success" role="alert">
						<h4 class="alert-heading">Do</h4>
						<ul><b>
							<li>wash your hands with soap and water often – do this for at least 20 seconds</li>
							<li>always wash your hands when you get home or into work</li>
							<li>use hand sanitiser gel if soap and water are not available</li>
							<li>cover your mouth and nose with a tissue or your sleeve (not your hands) when you cough or sneeze</li>
							<li>put used tissues in the bin immediately and wash your hands afterwards</li>
							<li>avoid close contact with people who have symptoms of coronavirus</li>
							<li>only travel on public transport if you need to</li>
							<li>work from home, if you can</li>
							<li>avoid social activities, such as going to pubs, restaurants, theatres and cinemas</li>
							<li>avoid events with large groups of people</li>
							<li>use phone, online services, or apps to contact your GP surgery or other NHS services</li>
							</b>
						</ul> 
					</div>
				<div class="alert alert-danger" role="alert">
					<h4 class="alert-heading">Don't</h4>
					<ul><b>
							<li>do not touch your eyes, nose or mouth if your hands are not clean</li>
							<li>do not have visitors to your home, including friends and family</li>
						</b>
						</ul> 
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
<h3 class="text-center">Live Data <small class="text-muted">Updated <?php echo date("Y-m-d h:i") ?></small></h3>

<h3 class="text-center">Coronavirus <?php echo strtoupper($selectCountry); ?></h3>
<div class="container">
	<div class="card-deck">
	<div class="card text-white bg-primary">
		<div class="card-body">
		<h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Cases Today</h5>
        <h1>+<?php echo number_format($todayCases); ?></h1>
		</div>
	</div>
	<div class="card text-white bg-danger">
		<div class="card-body">
		<h5 class="card-title"><?php echo strtoupper($selectCountry); ?> Deaths Today</h5>
        <h1>+<?php echo number_format($todayDeaths); ?></h1>
		</div>
	</div>
</div>

<h3 class="mt-5"><?php echo strtoupper($selectCountry); ?> Total Cases</h3>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Total Cases</th>
			<th scope="col">Total Deaths</th>
			<th scope="col">Critical</th>
			<th scope="col">Recovered</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="bg-info">
				<?php echo number_format($cases); ?>
			</td>
			<td class="bg-danger">
				<?php echo number_format($deaths); ?>
			</td>
			<td class="bg-warning">
				<?php echo number_format($critical); ?>
			</td>
			<td class="bg-success">
				<?php echo number_format($recovered); ?>
			</td>
		</tr>
	</tbody>
</table>

<h4>Percentage <small class="text-muted">Based on all cases</small></h4>
<div class="progress" style="height: 45px;">
	<div class="progress-bar bg-danger" role="progressbar" style="width: 
		<?php echo ($deaths/$cases)*100; ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
	</div>
	<div class="progress-bar bg-warning" role="progressbar" style="width: 
		<?php echo ($critical/$cases)*100; ?>" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
	</div>
	<div class="progress-bar bg-success" role="progressbar" style="width: 
		<?php echo ($recovered/$cases)*100; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
	</div>
	<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">All Cases</div>
</div>

<p class="text-muted">
    Deaths <span class="badge badge-danger"><?php echo sprintf("%.1f", $deathsPercent); ?>%</span> 
    Critical <span class="badge badge-warning"><?php echo sprintf("%.1f", $criticalPercent); ?>%</span>  
    Recovered <span class="badge badge-success"><?php echo sprintf("%.1f", $recoveredPercent); ?>%</span>
</p>

</div>
    <br>

    <h3 class="text-center">Coronavirus Worldwide</h3>
    <div class="container">
        <div class="card-deck">
        <div class="card text-white bg-primary">
            <div class="card-body">
            <h5 class="card-title">Total Cases</h5>
            <h1><?php echo number_format($worldCases); ?></h1>
            </div>
        </div>
        <div class="card text-white bg-danger">
            <div class="card-body">
            <h5 class="card-title">Total Deaths</h5>
            <h1><?php echo number_format($worldDeaths); ?></h1>
            </div>
        </div>
        <div class="card text-white bg-success">
            <div class="card-body">
            <h5 class="card-title">Total Recovered</h5>
            <h1><?php echo number_format($worldRecovered); ?></h1>
            </div>
        </div>    
    </div>
</div>

<div class="container">
    <h4 class="mt-3">Percentage <small class="text-muted">Based on all cases</small></h4>
    <div class="progress" style="height: 45px;">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 
            <?php echo $worldDeathsPercent; ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
        </div>
        <div class="progress-bar bg-success" role="progressbar" style="width: 
            <?php echo $worldRecoveredPercent; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
        </div>
        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">All Cases</div>
    </div>

    <p class="text-muted">
        Deaths <span class="badge badge-danger"><?php echo sprintf("%.1f", $worldDeathsPercent); ?>%</span> 
        Recovered <span class="badge badge-success"><?php echo sprintf("%.1f", $worldRecoveredPercent); ?>%</span>
    </p>

    <p><b>Recovered numbers may appear low as these mostly come from cases where people were hospitalised.</b></p>

</div>

</div>

<?php include( 'footer.php'); ?>

</body>
</html>