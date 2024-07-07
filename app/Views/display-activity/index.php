<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

    <!--begin::Container-->
	<div class="d-flex flex-column flex-column-fluid container-fluid">
		<!--begin::Toolbar-->
		<div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column me-3">
				<!--begin::Title-->
				<h1 class="d-flex text-dark fw-bold my-1 fs-1">Physical Activity</h1>
				<!--end::Title-->
			</div>
			<!--end::Page title-->
		</div>
		<!--end::Toolbar-->	


		<!--begin::Post-->
		<div class="content flex-column-fluid" id="kt_content">
            <div class="row g-5 g-xl-8">
                <?php if (@$activities) { ?>
                    <?php foreach ($activities as $key => $activity) { ?>
                    <div class="col-xl-4">
                        <!--begin::Statistics Widget 1-->
                        <div class="card bgi-no-repeat bgi-position-y-top bgi-position-x-end statistics-widget-1 card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <h3 class="card-title fw-bold text-muted text-hover-primary fs-3"><?= @$activity->name; ?></h3>
                                <div class="fw-bold text-primary fs-6 my-6"><?= @$activity->calorie . ' Calories'; ?></div>
                                <p class="text-dark-75 fw-semibold fs-5 m-0"><?= @$activity->description; ?></p>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>
                <?php }} ?>
            </div>
		</div>
		<!--end::Post-->

<?= $this->endSection('content') ?>