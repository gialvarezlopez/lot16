		<?php //include("inc/tmp_book_appointment.php"); ?>

		<?php //include("inc/footer.php"); ?>

		<?php 
			get_template_part('template-parts/footer',
				$arg, 
				array( 
					'my_data' => array(
						'sections' => $data_lobby['sections'],
						'startFrom' => $startFrom, 
						'leftContentPosition'=>'align-end'  
					)
				) 
			); 
		?>


		<?php  //include ("inc/modal.php"); ?>
		
		<!-- Get scripts -->
		<!--
		<div class="preloader">
			<div class="inner">
				<span class="percentage"><span id="percentage">15</span>%</span>
			</div>
			<div class="loader-progress" id="loader-progress"> </div>
		</div>
		-->
		<?php wp_footer(); ?>
	
</body>
</html>