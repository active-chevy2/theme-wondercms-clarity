<?php global $Wcms ?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="<?= $Wcms->page('description') ?>">
        <meta name="keywords" content="<?= $Wcms->page('keywords') ?>">
    	<meta http-equiv="imagetoolbar" content="no"/>
    	<meta name="MSSmartTagsPreventParsing" content="false"/>

        <title><?= $Wcms->get('config', 'siteTitle') ?> - <?= $Wcms->page('title') ?></title>
    	<!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Admin CSS -->
        <?= $Wcms->css() ?>

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?= $Wcms->asset('css/style.css') ?>">

        <!-- Apply theme before render to prevent screen flash -->
        <script>
            (function() {
                var storedTheme = localStorage.getItem('wcms_theme_mode') || 'auto';
                if (storedTheme === 'dark' || (storedTheme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.setAttribute('data-theme', storedTheme === 'auto' ? 'auto' : 'dark');
                } else if (storedTheme === 'light') {
                    document.documentElement.setAttribute('data-theme', 'light');
                } else {
                    document.documentElement.setAttribute('data-theme', 'auto');
                }
            })();
        </script>
    </head>

    <body>
        <?= $Wcms->settings() ?>
        <?= $Wcms->alerts() ?>

        <div class="navbar navbar-default" role="navigation">
    		<div class="container">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    				<a class="navbar-brand" href="<?= $Wcms->url() ?>"><?= $Wcms->get('config', 'siteTitle') ?></a>
    			</div>
    			<div class="collapse navbar-collapse" id="navMobile">
    				<ul class="nav navbar-nav">
                        <?= $Wcms->menu() ?>
    				</ul>
                    <ul class="nav navbar-nav navbar-right theme-toggle-wrapper">
                        <li>
                            <button id="themeToggleBtn" type="button" class="theme-toggle-btn navbar-btn" aria-label="Toggle colour theme">
                                <span id="themeToggleIcon" aria-hidden="true"></span>
                                <span id="themeToggleText">Theme: Auto</span>
                            </button>
                        </li>
                    </ul>
    			</div><!--/.nav-collapse -->
    		</div>
    	</div>

    	<div class="container main-content-wrapper">
    		<div class="starter-template">
    			<div class="row content-row" style="padding-top: 10px;">
    				<div class="col-xs-12 col-sm-8">
    					<div>
                            <?= $Wcms->page('content') ?>
    					</div>
    				</div><!-- /.col-lg-8 -->
    				<div class="col-xs-12 col-sm-4 subside-container">
                        <hr class="visible-xs subside-separator">
    					<div class="subside">
                            <?= $Wcms->block('subside') ?>
    					</div>
    				</div><!-- /.col-lg-4 -->
    			</div><!-- /.row -->
    		</div>
    	</div><!-- /.container -->

    	<footer class="container-fluid">
    		<div class="container">
                <div class="text-right padding20">
                    <?= $Wcms->footer() ?>
                </div>
    		</div>
    	</footer>

    	<!-- Bootstrap core JavaScript -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <?php
		if (!$Wcms->loggedIn) {
			echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>';
		}
	?>

	<?= $Wcms->js() ?>

        <!-- Theme Switching Script -->
        <script>
            (function() {
                var STORAGE_KEY = 'wcms_theme_mode';
                var modes = ['auto', 'light', 'dark'];
                var icons = {
                    auto: '<svg viewBox="0 0 24 24"><path d="M20 3H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h6l-2 3v1h8v-1l-2-3h6c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 12H4V5h16v10z"/></svg>',
                    light: '<svg viewBox="0 0 24 24"><path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.99 4.58c-.39-.39-1.03-.39-1.41 0s-.39 1.03 0 1.41l1.06 1.06c.39.39 1.03.39 1.41 0s.39-1.03 0-1.41L5.99 4.58zm12.37 12.37c-.39-.39-1.03-.39-1.41 0s-.39 1.03 0 1.41l1.06 1.06c.39.39 1.03.39 1.41 0s.39-1.03 0-1.41l-1.06-1.06zm1.06-10.96c.39-.39.39-1.03 0-1.41s-1.03-.39-1.41 0l-1.06 1.06c-.39.39-.39 1.03 0 1.41s1.03.39 1.41 0l1.06-1.06zM7.05 18.36c.39-.39.39-1.03 0-1.41s-1.03-.39-1.41 0l-1.06 1.06c-.39.39-.39 1.03 0 1.41s1.03.39 1.41 0l1.06-1.06z"/></svg>',
                    dark: '<svg viewBox="0 0 24 24"><path d="M12.3 2a10 10 0 0 0-.19 20 10.04 10.04 0 0 0 9.89-7.38 1 1 0 0 0-1.25-1.24 8 8 0 1 1-8.5-8.5 1 1 0 0 0-1.25-1.25A10.1 10.1 0 0 0 12.3 2z"/></svg>'
                };
                var labels = {
                    auto: 'Auto',
                    light: 'Light',
                    dark: 'Dark'
                };

                function getMode() {
                    return localStorage.getItem(STORAGE_KEY) || 'auto';
                }

                function renderTheme(mode) {
                    if (mode === 'auto') {
                        document.documentElement.setAttribute('data-theme', 'auto');
                    } else {
                        document.documentElement.setAttribute('data-theme', mode);
                    }
                    var iconEl = document.getElementById('themeToggleIcon');
                    var textEl = document.getElementById('themeToggleText');
                    if (iconEl) iconEl.innerHTML = icons[mode] || icons.auto;
                    if (textEl) textEl.textContent = 'Theme: ' + (labels[mode] || 'Auto');
                }

                function cycleMode() {
                    var current = getMode();
                    var nextIndex = (modes.indexOf(current) + 1) % modes.length;
                    var nextMode = modes[nextIndex];
                    localStorage.setItem(STORAGE_KEY, nextMode);
                    renderTheme(nextMode);
                }

                var btn = document.getElementById('themeToggleBtn');
                if (btn) {
                    btn.addEventListener('click', cycleMode);
                }

                renderTheme(getMode());

                if (window.matchMedia) {
                    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function() {
                        if (getMode() === 'auto') {
                            renderTheme('auto');
                        }
                    });
                }
            })();
        </script>
    </body>
</html>