/**
* Home page of the web site wich validate html/xml/CSS, broken link and mobile compatibility
*
*/

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title> Validateur norme w3c </title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="./assets/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="icon" href="./assets/check-circle-regular.png">
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<span class="navbar-brand mb-0 h1"> <i class="far fa-check-circle"></i>Validator 5</span>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item active"><a class="nav-link" href="index.php"><i class="fas fa-home"></i>Accueil</a></li>
						<li class="nav-item active"><a class="nav-link" href="inscription.html"><i class="fas fa-user-plus"></i>Inscription</a></li>
						<li class="nav-item active"><a class="nav-link" href="connexion.html"><i class="fas fa-user-check"></i>Connexion</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="container">
			<h1>Accueil</h1>
                        <h2>Validator5</h2>
			<form action="./process.php" method="POST">
			<div class="form-group">
				<label for="url">URL</label> 
				<input type="text" class="form-control" name="url" id="url" placeholder="Entrez l'url de votre site" required>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="checkhtml" name="checkUrl[]" value="checkhtml">
				<label class="form-check-label" for="checkhtml">HTML / XML</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="checkCSS" name="checkUrl[]" value="checkCSS">
				<label class="form-check-label" for="checkCSS">CSS</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="checkMobileV" name="checkUrl[]" value="checkMobileV">
				<label class="form-check-label" for="checkMobileV">Version Mobile</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="checkLink" name="checkUrl[]" value="checkLink">
				<label class="form-check-label" for="checkLink">Lien</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" id="checkAccess" name="checkUrl[]" value="checkAccess">
				<label class="form-check-label" for="checkAccess">Accessibilité</label>
			</div>
			<div class="text-center">
				<button type="submit"  class="btn btn-outline-info" id="btn_submit_url">OK</button>
			</div>
			</form>
			<!-- <script src="https://apis.google.com/js/api.js"></script>
<script>
  /**
   * Sample JavaScript code for searchconsole.urlTestingTools.mobileFriendlyTest.run
   * See instructions for running APIs Explorer code samples locally:
   * https://developers.google.com/explorer-help/guides/code_samples#javascript
   */

  function loadClient() {
    gapi.client.setApiKey("AIzaSyA4WVYApWoOhrC55TBF2purhUcO8M1K_cg");
    return gapi.client.load("https://content.googleapis.com/discovery/v1/apis/searchconsole/v1/rest")
        .then(function() { console.log("GAPI client loaded for API"); },
              function(err) { console.error("Error loading GAPI client for API", err); });
  }
  // Make sure the client is loaded before calling this method.
  function execute() {
    return gapi.client.searchconsole.urlTestingTools.mobileFriendlyTest.run({
      "resource": {
        "url": "https://validator5.alwaysdata.net"
      }
    })
        .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response);
              },
              function(err) { console.error("Execute error", err); });
  }
  gapi.load("client");
</script>
<button onclick="loadClient()">load</button>
<button onclick="execute()">execute</button> -->
			<footer class="bg-light text-center text-lg-start fixed-bottom">
			<div class="text-center p-3 d-flex justify-content-center">
				<!--<div><figure><img src="./assets/logo_ucp.png" alt="logo ucp" class="img-thumbnail"/></figure></div>-->
				<div>DUFERNEZ Margot & BACHE Nour &copy; CY Cergy-Paris Université - UFR Sciences et Techniques</div>
			</div>
			</footer>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="http://apps.bdimg.com/libs/angular.js/1.4.6/angular.min.js"> </script> 
	</body>
</html>

		