<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

    <!--begin::Container-->
	<div class="d-flex flex-column flex-column-fluid container-fluid">
		<!--begin::Toolbar-->
		<div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column me-3">
				<!--begin::Title-->
				<h1 class="d-flex text-dark fw-bold my-1 fs-1">Calorie Consumption</h1>
				<!--end::Title-->
			</div>
			<!--end::Page title-->

		</div>
		<!--end::Toolbar-->	


		<!--begin::Post-->
		<div class="content flex-column-fluid" id="kt_content">
            <div id="sectionResult" class="d-flex flex-column col-12 gap-5">
                <div class="col-12">
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <div class="card-title"></div>
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <ul class="nav" id="kt_chart_widget_11_tabs">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4 me-1 active" data-bs-toggle="tab" id="kt_charts_widget_11_tab_1" href="#kt_chart_widget_11_tab_content_1">Breakfast</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4 me-1" data-bs-toggle="tab" id="kt_charts_widget_11_tab_2" href="#kt_chart_widget_11_tab_content_2">Lunch</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bold px-4 me-1" data-bs-toggle="tab" id="kt_charts_widget_11_tab_3" href="#kt_chart_widget_11_tab_content_3">Dinner</a>
                                    </li>
                                </ul>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <form id="createForm" enctype="multipart/form-data">
                            <!--begin::Body-->
                            <div class="card-body pb-0 pt-4">
                                <!--begin::Tab content-->
                                <div class="tab-content">
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade active show" id="kt_chart_widget_11_tab_content_1" role="tabpanel">
                                        <div class="col-12 col-md">
                                            <label for="main_1" class="form-label fw-semibold">Makanan Utama</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="main_1" id="main_1" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$mains) {?>
                                                        <?php foreach ($mains as $key => $main) {?>
                                                            <option value="<?= $main->id; ?>"><?= $main->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
            
                                            <label for="veg_1" class="form-label fw-semibold mt-5">Sayuran</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="veg_1" id="veg_1" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$vegetables) {?>
                                                        <?php foreach ($vegetables as $key => $vegetable) {?>
                                                            <option value="<?= $vegetable->id; ?>"><?= $vegetable->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="dish_1" class="form-label fw-semibold mt-5">Lauk Pauk</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="dish_1" id="dish_1" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$dishes) {?>
                                                        <?php foreach ($dishes as $key => $dish) {?>
                                                            <option value="<?= $dish->id; ?>"><?= $dish->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="drink_1" class="form-label fw-semibold mt-5">Minuman</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="drink_1" id="drink_1" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$drinks) {?>
                                                        <?php foreach ($drinks as $key => $drink) {?>
                                                            <option value="<?= $drink->id; ?>"><?= $drink->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="snack_1" class="form-label fw-semibold mt-5">Cemilan</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="snack_1" id="snack_1" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$snacks) {?>
                                                        <?php foreach ($snacks as $key => $snack) {?>
                                                            <option value="<?= $snack->id; ?>"><?= $snack->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="fruit_1" class="form-label fw-semibold mt-5">Buah</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="fruit_1" id="fruit_1" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$fruits) {?>
                                                        <?php foreach ($fruits as $key => $fruit) {?>
                                                            <option value="<?= $fruit->id; ?>"><?= $fruit->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tab pane-->
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_2" role="tabpanel">
                                        <div class="col-12 col-md">
                                            <label for="main_2" class="form-label fw-semibold">Makanan Utama</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="main_2" id="main_2" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$mains) {?>
                                                        <?php foreach ($mains as $key => $main) {?>
                                                            <option value="<?= $main->id; ?>"><?= $main->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
            
                                            <label for="veg_2" class="form-label fw-semibold mt-5">Sayuran</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="veg_2" id="veg_2" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$vegetables) {?>
                                                        <?php foreach ($vegetables as $key => $vegetable) {?>
                                                            <option value="<?= $vegetable->id; ?>"><?= $vegetable->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="dish_2" class="form-label fw-semibold mt-5">Lauk Pauk</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="dish_2" id="dish_2" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$dishes) {?>
                                                        <?php foreach ($dishes as $key => $dish) {?>
                                                            <option value="<?= $dish->id; ?>"><?= $dish->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="drink_2" class="form-label fw-semibold mt-5">Minuman</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="drink_2" id="drink_2" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$drinks) {?>
                                                        <?php foreach ($drinks as $key => $drink) {?>
                                                            <option value="<?= $drink->id; ?>"><?= $drink->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="snack_2" class="form-label fw-semibold mt-5">Cemilan</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="snack_2" id="snack_2" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$snacks) {?>
                                                        <?php foreach ($snacks as $key => $snack) {?>
                                                            <option value="<?= $snack->id; ?>"><?= $snack->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="fruit_2" class="form-label fw-semibold mt-5">Buah</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="fruit_2" id="fruit_2" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$fruits) {?>
                                                        <?php foreach ($fruits as $key => $fruit) {?>
                                                            <option value="<?= $fruit->id; ?>"><?= $fruit->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tab pane-->
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_3" role="tabpanel">
                                        <div class="col-12 col-md">
                                            <label for="main_3" class="form-label fw-semibold">Makanan Utama</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="main_3" id="main_3" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$mains) {?>
                                                        <?php foreach ($mains as $key => $main) {?>
                                                            <option value="<?= $main->id; ?>"><?= $main->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
            
                                            <label for="veg_3" class="form-label fw-semibold mt-5">Sayuran</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="veg_3" id="veg_3" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$vegetables) {?>
                                                        <?php foreach ($vegetables as $key => $vegetable) {?>
                                                            <option value="<?= $vegetable->id; ?>"><?= $vegetable->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="dish_3" class="form-label fw-semibold mt-5">Lauk Pauk</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="dish_3" id="dish_3" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$dishes) {?>
                                                        <?php foreach ($dishes as $key => $dish) {?>
                                                            <option value="<?= $dish->id; ?>"><?= $dish->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="drink_3" class="form-label fw-semibold mt-5">Minuman</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="drink_3" id="drink_3" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$drinks) {?>
                                                        <?php foreach ($drinks as $key => $drink) {?>
                                                            <option value="<?= $drink->id; ?>"><?= $drink->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="snack_3" class="form-label fw-semibold mt-5">Cemilan</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="snack_3" id="snack_3" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$snacks) {?>
                                                        <?php foreach ($snacks as $key => $snack) {?>
                                                            <option value="<?= $snack->id; ?>"><?= $snack->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>

                                            <label for="fruit_3" class="form-label fw-semibold mt-5">Buah</label>
                                            <div class="fv-row">
                                                <select class="form-select" name="fruit_3" id="fruit_3" data-control="select2" data-placeholder="Select an option">
                                                    <option></option>
                                                    <?php if(@$fruits) {?>
                                                        <?php foreach ($fruits as $key => $fruit) {?>
                                                            <option value="<?= $fruit->id; ?>"><?= $fruit->name; ?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tab pane-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Body-->

                            <div class="card-footer d-flex flex-column gap-2">
                                <button type="submit" class="btn btn-primary" id="submitForm">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label fw-bold">Submit</span>
                                    <!--end::Indicator label-->
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
		<!--end::Post-->

<?= $this->endSection('content') ?>