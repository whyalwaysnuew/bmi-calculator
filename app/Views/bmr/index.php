<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

    <!--begin::Container-->
	<div class="d-flex flex-column flex-column-fluid container-fluid">
		<!--begin::Toolbar-->
		<div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column me-3">
				<!--begin::Title-->
				<h1 class="d-flex text-dark fw-bold my-1 fs-1">Basal Metabolic Rate</h1>
				<!--end::Title-->
			</div>
			<!--end::Page title-->

		</div>
		<!--end::Toolbar-->	

		<!--begin::Post-->
		<div class="content flex-column-fluid" id="kt_content">
            <div class="d-flex col-12 flex-column flex-lg-row gap-3">
                <div class="col-12 col-lg min-h-lg-auto">
                    <div class="card">
                        <div class="card-body">
                            <form id="createForm" enctype="multipart/form-data">
                                <label for="gender" class="form-label fw-semibold required">Gender</label>
                                <div class="fv-row">
                                    <select class="form-select" name="gender" id="gender" data-hide-search="true" data-control="select2" data-placeholder="Select an option">
                                        <option></option>
                                        <option value="L">Male</option>
                                        <option value="P">Female</option>
                                    </select>
                                </div>

                                <label for="age" class="form-label fw-bold required mt-2">Age</label>
                                <div class="fv-row">
                                    <input type="text" name="age" id="age" class="form-control" placeholder="e.g. 21">
                                </div>

                                <label for="height" class="form-label fw-bold required mt-2">Height</label>
                                <div class="fv-row">
                                    <input type="number" name="height" id="height" class="form-control" min="1" placeholder="e.g. 160">
                                </div>

                                <label for="weight" class="form-label fw-bold required mt-2">Weight</label>
                                <div class="fv-row">
                                    <input type="number" name="weight" id="weight" class="form-control" min="1" placeholder="e.g. 50">
                                </div>

                                <label for="scale" class="form-label fw-semibold required mt-2">Activity Level</label>
                                <div class="fv-row">
                                    <select class="form-select" name="scale" id="scale" data-control="select2" data-placeholder="Select an option">
                                        <option></option>
                                        <?php if(@$levels) {?>
                                            <?php foreach ($levels as $key => $level) {?>
                                                <option value="<?= $level->scale; ?>"><?= $level->name; ?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer d-flex flex-column gap-2">
                            <button type="submit" class="btn btn-primary" id="submitForm">
                                <!--begin::Indicator label-->
                                <span class="indicator-label fw-bold">Submit</span>
                                <!--end::Indicator label-->
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="sectionResult" class="col-12 col-lg">
                    
                </div>
            </div>
            
		</div>
		<!--end::Post-->

<?= $this->endSection('content') ?>