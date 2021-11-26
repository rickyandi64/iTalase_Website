<div class="footer-wrap pd-20 mb-20 card-box">
    Website iTalase <a href="#"><?php echo date('Y')?></a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="<?php echo base_url()?>assets/login/vendors/scripts/core.js"></script>
	<script src="<?php echo base_url()?>assets/login/vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/vendors/scripts/process.js"></script>
	<script src="<?php echo base_url()?>assets/login/vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/datatables/js/vfs_fonts.js"></script>
        <script src="<?php echo base_url()?>assets/login/src/plugins/apexcharts/apexcharts.min.js"></script>
	<!-- Datatable Setting js -->
	<script src="<?php echo base_url()?>assets/login/vendors/scripts/datatable-setting.js"></script></body>
        
        <script src="<?php echo base_url()?>assets/login/vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url()?>assets/login/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
	<script src="<?php echo base_url()?>assets/login/vendors/scripts/knob-chart-setting.js"></script>
                
       <script>
            $('.custom-file-input').on('change', function(){
               let fileName = $(this).val().split('\\').pop();
               $(this).next('.custom-file-label').addClass("selected").html(fileName);
            })
        </script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</html>