
<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express Node.js & Flask Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../"/>
		<title><?= @$title; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Gian Pranata | BMR Calculator" />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="#" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('assets/img/bg-auth.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row justify-content-center">
				<!--begin::Body-->
				<div class="d-flex flex-center w-lg-75 p-5">
					<!--begin::Card-->
					<div class="card rounded-3 w-md-750px">
						<!--begin::Card body-->
						<div class="card-body p-10 p-lg-20">
                            <!--begin::Heading-->
                            <div class="text-center mb-5">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">Welcome Back!</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">BMI Calculator</div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->

                            <div class="d-flex justify-content-center mb-10">
                                <ul class="nav bg-gray-200 rounded p-1">
                                    <li class="nav-item">
                                        <a href="#form_login" data-bs-toggle="tab" class="nav-link btn btn-sm btn-color-muted btn-active btn-active-white fw-bold px-7 me-1 active">
                                            Login
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#form_register" data-bs-toggle="tab" class="nav-link btn btn-sm btn-color-muted btn-active btn-active-white fw-bold px-7">
                                            Register
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="form_login">
                                    <!--begin::Form-->
                                    <form class="form w-100" method="POST" novalidate="novalidate" id="FormLogin" enctype="multipart/form-data">
                                        
                                        <!--begin::Input group=-->
                                        <div class="fv-row mb-8">
                                            <label for="usernameLogin" class="form-label fw-semibold">Username</label>
                                            <!--begin::Username-->
                                            <input type="text" placeholder="Username" name="username" id="usernameLogin" autocomplete="off" class="form-control bg-transparent" />
                                            <!--end::Username-->
                                        </div>
                                        <!--end::Input group=-->
                                        <div class="fv-row mb-8">
                                            <label for="passwordLogin" class="form-label fw-semibold">Password</label>
                                            <!--begin::Password-->
                                            <input type="password" placeholder="Password" name="password" id="passwordLogin" autocomplete="off" class="form-control bg-transparent" />
                                            <!--end::Password-->
                                        </div>
                                        <!--end::Input group=-->
                                        
                                        <!--begin::Submit button-->
                                        <div class="d-grid">
                                            <button type="button" id="buttonLogin" class="btn btn-primary">
                                                <!--begin::Indicator label-->
                                                <span class="indicator-label">Login</span>
                                                <!--end::Indicator label-->
                                            </button>
                                        </div>
                                        <!--end::Submit button-->
                                        
                                    </form>
                                    <!--end::Form-->
                                </div>

                                <div class="tab-pane fade" id="form_register">
                                    <form novalidate="novalidate" method="POST" class="form" id="FormRegister" enctype="multipart/form-data">
                                        <?= session()->getFlashdata('message') ?>
    
                                            <div class="d-flex gap-2">
                                                <!--begin::Input group=-->
                                                <div class="col fv-row mb-5">
                                                    <label for="name" class="form-label fw-semibold required">Name</label>
                                                    <!--begin::Full Name-->
                                                    <input type="text" required placeholder="e.g. Gian Pranata" name="name" id="name" autocomplete="off" class="form-control bg-transparent" />
                                                    <!--end::Full Name-->
                                                </div>
                                                <!--end::Input group=-->
            
                                                <!--begin::Input group=-->
                                                <div class="col fv-row mb-5">
                                                    <label for="username" class="form-label fw-semibold required">Username</label>
                                                    <!--begin::Username-->
                                                    <input type="text" required placeholder="e.g. gianpranata" name="username" id="usernameRegister" autocomplete="off" class="form-control bg-transparent" />
                                                    <!--end::Username-->
                                                </div>
                                                <!--end::Input group=-->
                                            </div>
                                            
                                            <div class="d-flex flex-column flex-md-row gap-2">
                                                <!--begin::Input group=-->
                                                <div class="col fv-row mb-5">
                                                    <label for="password" class="form-label fw-semibold required">Password</label>
                                                    <!--begin::Password-->
                                                    <input type="password" required placeholder="Password" name="password" id="passwordRegister" autocomplete="off" class="form-control bg-transparent" />
                                                    <!--end::Password-->
                                                </div>
                                                <!--end::Input group=-->
        
                                                <!--begin::Input group=-->
                                                <div class="col fv-row mb-5">
                                                    <label for="password_2" class="form-label fw-semibold required">Confirm Password</label>
                                                    <!--begin::Password-->
                                                    <input type="password" required placeholder="Confirm Password" name="password_2" id="password_2" autocomplete="off" class="form-control bg-transparent" />
                                                    <!--end::Password-->
                                                </div>
                                                <!--end::Input group=-->
                                            </div>
                                        
                                        <!--begin::Submit button-->
                                        <div class="d-grid">
                                            <button type="button" id="buttonRegister" class="btn btn-primary">
                                                <!--begin::Indicator label-->
                                                <span class="indicator-label">Register</span>
                                                <!--end::Indicator label-->
                                            </button>
                                        </div>
                                        <!--end::Submit button-->
                                    </form>
                                </div>
                            </div>
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!-- // end::Root -->
		<!-- // end::Main -->
		
        
        <!-- // begin::Javascript -->
		<script>var hostUrl = "<?= base_url('') ?>/assets/";</script>
		<!-- // begin::Global Javascript Bundle(mandatory for all pages) -->
		<script src="<?= base_url('') ?>/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?= base_url('') ?>/assets/js/scripts.bundle.js"></script>
		<!-- // end::Global Javascript Bundle -->
		<!-- // begin::Vendors Javascript(used for this page only) -->

		<!-- // end::Vendors Javascript -->
		<!-- // begin::Custom Javascript(used for this page only) -->
        <script>var base_url = '<?php echo base_url(); ?>';</script>
        <?php $uri = current_url(true); ?>

		<?php if(@$ajax) { ?>
			<script src="<?= base_url(''); ?>/assets/js/own-script/ajax/<?= @$ajax . '.js'; ?>"></script>
		<?php } ?>
		<!-- // end::Custom Javascript -->
		<!-- // end::Javascript -->
	</body>
	<!-- // end::Body -->
</html>