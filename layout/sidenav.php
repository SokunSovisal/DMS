
		<!-- Sidebar -->
		<div class="sidebar" data-color="azure" data-background-color="black" data-image="<?=@BASE?>dist/img/sidenav4.jpg">

			<!-- data-color="purple | azure | green | orange | danger"
				   data-image="Image Background"
				   data-background-color="black | white | red " -->

			<!-- Sidebar Header -->
			<div class="logo">
				<a href="<?=@BASE?>" class="simple-text logo-mini">
					<small>BSS</small>
				</a>
				<a href="<?=@BASE?>	" class="simple-text logo-normal">
					SYSTEM
				</a>
			</div> 

			<!-- Accoun sidebar -->
			<div class="sidebar-wrapper">
				
				<!-- Sidebar Item -->
				<ul class="nav">
			    <?php 
			        $v_get_menu = $db->query("SELECT A.*,COUNT(A.mm_id) AS sum_left_menu,
			        	(SELECT COUNT(*) FROM tbl_left_menu WHERE lm_main_menu=A.mm_id) as count_left_menu_exist
			        	FROM tbl_main_menu AS A 
			            INNER JOIN tbl_left_menu AS B ON B.lm_main_menu=A.mm_id 
			            INNER JOIN tbl_permission AS C ON C.p_module=B.lm_id
			            INNER JOIN users AS E ON E.u_role_id=C.p_position
			            WHERE E.id=".UID."
			            AND C.p_view='1'
			            GROUP BY A.mm_id
			            ORDER BY mm_index_order ASC");
			        while ($row_menu = mysqli_fetch_object($v_get_menu)) {
			            if($row_menu->sum_left_menu>1 OR $row_menu->count_left_menu_exist>1){
			            	echo '<li class="nav-item ">
														<a class="nav-link" data-toggle="collapse" href="#drop-'.$row_menu->mm_id.'">
															'.$row_menu->mm_icon.'
															<p>'.$row_menu->mm_name.'
																<b class="caret"></b>
															</p>
														</a>
														<!-- With Sub -->
														<div class="collapse '.((@$m==$row_menu->mm_name)?('show'):('')).'" id="drop-'.$row_menu->mm_id.'">
															<ul class="nav">';
															 	$v_get_sub_menu = $db->query("SELECT B.* FROM tbl_main_menu AS A 
												                    INNER JOIN tbl_left_menu AS B ON B.lm_main_menu=A.mm_id 
												                    INNER JOIN tbl_permission AS C ON C.p_module=B.lm_id
												                    INNER JOIN users AS E ON E.u_role_id=C.p_position
												                    WHERE E.id=".UID."
												                    AND B.lm_main_menu='".$row_menu->mm_id."'
												                    AND C.p_view='1'
												                    AND B.lm_status=1
												                    GROUP BY B.lm_id
												                    ORDER BY lm_index_order ASC");    
												                while ($row_sub_menu = mysqli_fetch_object($v_get_sub_menu)) {
												                    echo '<li class="nav-item '.((@$sm==$row_sub_menu->lm_name)?('active'):('')).'">
																 		<a class="nav-link" href="'.@BASE.$row_sub_menu->lm_directory.'">
																	 		'.$row_sub_menu->lm_icon.'
																	 		<span class="sidebar-normal">'.$row_sub_menu->lm_name.' </span>
																	 	</a>
																 	</li>';
	                }
										echo '</ul>
										</div>
									</li>';
			            }else{
				            echo '<li class="nav-item '.(($m==$row_menu->mm_name)?('active'):('')).'">
														<a class="nav-link" href="'.@BASE.$row_menu->mm_directory.'">
															'.$row_menu->mm_icon.'
															<p>'.$row_menu->mm_name.'</p>
														</a>
													</li>';
			            }
			        }
		    	?>

				</ul>
			</div>
		</div>