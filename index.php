<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to send me an email.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = ' ';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta charset="utf-8" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow" />
		<meta name="generator" content="RapidWeaver" />
		<link rel="apple-touch-icon" sizes="167x167" href="https://www.protectthebluewhales.com/resources/medium.png" />
<link rel="apple-touch-icon" sizes="180x180" href="https://www.protectthebluewhales.com/resources/kjhgfd.png" />
<link rel="apple-touch-icon" sizes="152x152" href="https://www.protectthebluewhales.com/resources/small.png" />
<link rel="mask-icon" href="https://www.protectthebluewhales.com/resources/kjhgfd.png" color="rgba(255,255,255,1.00)" /><link rel="icon" type="image/png" href="https://www.protectthebluewhales.com/resources/favicon_medium.png" sizes="32x32" />
<link rel="icon" type="image/png" href="https://www.protectthebluewhales.com/resources/favicon_small.png" sizes="16x16" />
<link rel="icon" type="image/png" href="https://www.protectthebluewhales.com/resources/favicon_large.png" sizes="64x64" />

	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="Contact Page">
	<meta name="twitter:description" content="If you have any queries or contributions, give me an email and I will respond as quickly as possible.">
	<meta name="twitter:image" content="https://www.protectthebluewhales.com/resources/iiio;i.png">
	<meta name="twitter:url" content="https://www.protectthebluewhales.com/contact-form/index.php">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Protect The Whales">
	<meta property="og:title" content="Contact Page">
	<meta property="og:description" content="If you have any queries or contributions, give me an email and I will respond as quickly as possible.">
	<meta property="og:image" content="https://www.protectthebluewhales.com/resources/iiio;i.png">
	<meta property="og:url" content="https://www.protectthebluewhales.com/contact-form/index.php"> 

	<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

	<title>Contact Me | Protect The Whales</title>
	<link rel="stylesheet" type="text/css" media="all" href="../rw_common/themes/Mountains/consolidated.css?rwcache=622984831" />
		
	    
</head>

<!-- This page was created with RapidWeaver from Realmac Software. http://www.realmacsoftware.com -->

<body>
    <div class="hero" id="hero">
        <nav class="navbar navbar-expand-lg pt-3">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto"><li class="nav-item"><a href="../" rel="" class="nav-link">Home</a></li><li class="nav-item"><a href="../styled/" rel="" class="nav-link">About</a></li><li class="nav-item active"><a href="./" rel="" class="nav-link">Contact Me</a></li></ul>
                </div>
            </div>
        </nav>

        <div class="hero-content" id="hero">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="hero-title display-1" data-aos="fade-right" data-aos-delay="300" data-aos-duration="500">Protect The Whales</h1>
                        <h2 class="hero-slogan font-italic display-4" data-aos="fade-right" data-aos-delay="350" data-aos-duration="500">Hear their cry, don't let them die...</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-background"></div>
    </div>


	<main class="content">
		<div class="container">
			<div class="row intro justify-content-between">
				<div class="col-sm-8 intro-col" data-aos="fade-right" data-aos-delay="300" data-aos-duration="500">
                    
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form class="rw-contact-form" action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Subject</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>Message</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>

				</div>
				<div class="sidebar col-sm-4 order-md-8" data-aos="fade-up">
					<div class="logo" data-aos-delay="450" data-aos-duration="500">
						<img src="../rw_common/images/kjhgfd.png" width="192" height="147" alt="Transparent Background Blue Whale Photos"/>
                    </div>

                    <div class="mt-5">
                        <h3 class="sidebar-title">
                            
                        </h3>
                        
                        
                    </div>
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col" data-aos="fade-right" data-aos-delay="0" data-aos-duration="500">
						<div class="footer-content text-center">
							&copy; 2020 Reevu Majumdar <a href="#" id="rw_email_contact">Contact </a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":ma";var _rwObsfuscatedHref3 = "ris";var _rwObsfuscatedHref4 = "@sa";var _rwObsfuscatedHref5 = "vet";var _rwObsfuscatedHref6 = "hew";var _rwObsfuscatedHref7 = "hal";var _rwObsfuscatedHref8 = "es.";var _rwObsfuscatedHref9 = "org";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7+_rwObsfuscatedHref8+_rwObsfuscatedHref9; document.getElementById("rw_email_contact").href = _rwObsfuscatedHref;</script>
                        </div>

						<ul class="navbar-nav mr-auto"><li class="nav-item"><a href="../" rel="" class="nav-link">Home</a></li><li class="nav-item"><a href="../styled/" rel="" class="nav-link">About</a></li><li class="nav-item active"><a href="./" rel="" class="nav-link">Contact Me</a></li></ul>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="../rw_common/themes/Mountains/js/main.js?rwcache=622984831"></script>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-image: url('https://www.xmple.com/wallpaper/blue-purple-gradient-linear-2732x2048-c2-48d1cc-ba55d3-a-45-f-14.svg');
 <p>If you have any queries or contributions to add, make sure to give me an email, and I'll reply as soon as posisble!</p>
}
</style>
</head>
<body>
</body>

</html>