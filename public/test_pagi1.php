<?php
require_once("core/init.php");
$user = new User();
	

	$tbl_name="tbl_customer"; //your table name
	
	$adjacents = 3;// How many adjacent pages should be shown on each side?
	
	/*
First get total number of rows in data table.
If you have a WHERE clause in your query, make sure you mirror it here.
*/
	$database = DB:: getinstance()->query("SELECT COUNT(*) as c_id FROM $tbl_name");
	
	
foreach($database->results() as $database){
	$total_pages = $database->c_id;
}
	
	$targetpage = "test_pagi1.php"; /* Setup vars for query. */	
		
	$limit = 10; //how many items to show per page							
	
	if(isset($_GET['limit'])){
	$limit=$_GET['limit'];
	
	$page = $_GET['page'];
}
	if($page) {

		$start = ($page - 1) * $limit; 	//first item to display on this page	

}	else{

		$start = 0;	//if no page var is given, set start to 0

/* Get data. */						
}
	$data = DB:: getinstance()->query("SELECT * FROM tbl_name ORDER BY 'c_id' asc LIMIT $start, $limit ");
	
	//$result = mysql_query($sql);	
/* Setup page vars for display. */
	if ($page == 0) $page = 1;	//if no page var is given, default to 1.				

	$prev = $page - 1;	//previous page is page - 1						

	$next = $page + 1;	//next page is page + 1					

	$lastpage = ceil($total_pages/$limit);	//lastpage is = total pages / items per page, rounded up.	

	$lpm1 = $lastpage - 1;	//last page minus 1				
	
/*
Now we apply our rules and draw the pagination object.
We're actually saving the code to a variable in case we want to draw it more than once.
*/
	$pagination = "";
//previous button
	if($lastpage > 1)

	{	
		$pagination .= "<div class=\"pagination\">";
		
		if ($page > 1) 

			$pagination.= "<a href=\"$targetpage?page=$prev&limit=$limit\">&laquo; previous</a>";

		else

			$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
		
//pages
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up

		{	

			for ($counter = 1; $counter <= $lastpage; $counter++)

			{

				if ($counter == $page)

					$pagination.= "<span class=\"current\">$counter</span>";

				else

					$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

			}

		}

		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some

		{
			
//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		

			{

				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";		

			}
//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

			{

				$pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";

				$pagination.= "...";

				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";		

			}
//close to end; only hide early pages
			else
			{

				$pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

				}

			}

		}

		//next button

		if ($page < $counter - 1) 

			$pagination.= "<a href=\"$targetpage?page=$next&limit=$limit\">next &raquo;</a>";

		else

			$pagination.= "<span class=\"disabled\">next &raquo;</span>";

		$pagination.= "</div>\n";		

	}

?>
	  
        
        <?php
	//$select=@mysql_query("SELECT * FROM messages WHERE msg_aurth='2'");

    foreach($data->results() as $datas){
		 $idb= $datas->c_id; 
      
		
	?>
        <tr>
          <td>&nbsp;</td>
          <td><?php echo $idb; ?></td>
     
         
          <td align="center"><font color="#006600"><?php  ?></font></td>
          <td align="center"><a href="check_lecturer_attendance.php?id=<?php echo $id ?>&return=view_lecturer_attendance.php" onClick="NewWindow(this.href,&#39;view_lecturer_attendance&#39;,&#39;750&#39;,&#39;405&#39;,&#39;no&#39;,&#39;random&#39;);return false" onFocus="this.blur()"><img src="../images/info.png" alt="" width="22" height="22" border="0" title="" /></a></td>
          </tr>
        <?php
	}
	?>
      </tbody>
    </table>
	<?php echo $pagination ?>	</td>
  </tr>
</table>

	
<h2></h2>
    </div><!-- end of right content-->                
  </div>   <!--end of center content -->               
    <div class="clear"></div>
    </div> <!--end of main content-->
    
</div>		
</td>
  </tr>
</table>
</body>
</html>