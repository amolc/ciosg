<div class="nav fl">
	<ul>
		<?php
		include('sql_config/database/cio_db.php');
			 $menu_query = mysql_query("select * from menu order by menu_order");
			while($menu_res = mysql_fetch_array($menu_query))
			{
				$menu = $menu_res['menu_name'];
				$menu_link = $menu_res['menu_link'];
				$menu_id = $menu_res['menu_id'];
				
				echo '<li><a class="menu_ancher" href="'.$menu_link.'">'.$menu.'</a>'; 
				
					$menu_query2 = mysql_query("select * from sub_menu where parent_id = '$menu_id'");
					if(mysql_num_rows($menu_query2) > 0)
					{
					echo "<ul>";
						while($menu_res2 = mysql_fetch_array($menu_query2))
						{
							$menu2 = $menu_res2['sub_name'];
							$menu_link2 = $menu_res2['sub_link'];
							
							echo '<li><a href="'.$menu_link2.'">'.$menu2.'</a></li>';
							
						}
						echo "</ul>";
					}
				echo "</li>";
			}
		?>	

	</ul>
	
</div>