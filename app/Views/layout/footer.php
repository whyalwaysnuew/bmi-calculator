                    <!--begin::Footer-->
							<div class="footer py-4 d-flex flex-column flex-md-row flex-stack" id="kt_footer">
								<!--begin::Copyright-->
								<div class="text-dark order-2 order-md-1">
									<span class="text-muted fw-bold me-1">2023&copy;</span>
									<a href="https://cklcargo.com" target="_blank" class="text-gray-800 fw-bold text-hover-primary">CKL Cargo</a>
								</div>
								<!--end::Copyright-->
								<!--begin::Menu-->
								<ul class="menu menu-gray-800 menu-hover-primary fw-semibold order-1">
									<li class="menu-item">
										<!-- <span class="fw-bold menu-link px-2">Handcrafted and made with ❤️</span> -->
									</li>
								</ul>
								<!--end::Menu-->
							</div>
							<!--end::Footer-->
						</div>
						<!--end::Container-->
                    </div>
					<!--end::Content wrapper-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--begin::Javascript-->
		<script>var hostUrl = "<?= base_url('') ?>/assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="<?= base_url('') ?>/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?= base_url('') ?>/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="<?= base_url('') ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="<?= base_url('') ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<script src="<?= base_url('') ?>/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
		<script src="<?= base_url('') ?>/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>

		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
        <script>var base_url = '<?php echo base_url(); ?>';</script>
        <?php $uri = current_url(true); ?>

		<script src="<?= base_url(''); ?>/assets/canvasjs/jquery.canvasjs.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		
		<?php if(@$ajax) { ?>
			<script src="<?= base_url(''); ?>/assets/js/own-script/ajax/<?= @$ajax . '.js'; ?>"></script>
		<?php } ?>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>