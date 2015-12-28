<?if($myrow00 > 40 && $page <= (ceil($myrow00/40)) && $page > 0)
{
		
		
		echo "<div id='page_navigation'>";
		
		
		if($page > 1)
		{ $previous = $page - 1;
			echo "<a href='$_SERVER[PHP_SELF]?page=$previous'><<</a>&nbsp&nbsp";
		}
		
		$j=ceil($myrow00/40);
		$i=1;
		while($i <= $j)
		{	
			if($page <= 8)
				{
					if($i <= 8)
					{
						
					if(($i == 1) && ($_SERVER['REQUEST_URI'] == "/satellit_forum/ViewIndex.php"))
						{
							echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
							$i++;
						}
						if(($_SERVER['REQUEST_URI']) == ("$_SERVER[PHP_SELF]?page=$i"))
						echo "<a id='active' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
						else
						echo "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
					}
					
						if($i == 9)
							{
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?page=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
								else
									{
										echo "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
										if($j > 10)
										echo ".....&nbsp&nbsp";
									}
							}
						
						if($i == $j && $j > 9)
						{
							if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?page=$i"))
								echo "<a id='active' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
							else
								echo "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
						}
				}
				else if($page >= 9 && $page < $j)
					{	if($i == 1)
						{
							echo "<a href='$_SERVER[PHP_SELF]?page=1'>1</a>&nbsp&nbsp";
							echo ".....&nbsp&nbsp";
						}
						
						if($i >=($page-4) && ($i < $page))
						{
							if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?page=$i"))
								echo "<a id='active' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
							else
								echo "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
						}
						if($i == $page)
							{
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?page=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
								else
									echo "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
							}
						if (($i > $page) && ($i <= ($page+5)) && ($i != $j))
							{
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?page=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
								else
									echo "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
							}
						
						if($i == $j)
						{	
							if(($j-6) > $page)
							{
								echo ".....&nbsp&nbsp";
							}
							if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?page=$i"))
								echo "<a id='active' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
							else
								echo "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
							
						}
					}
					else
					{
						if($i == 1 && $j >= $page)
							{
								
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?page=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp.....&nbsp&nbsp";
								else
									echo "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp.....&nbsp&nbsp";
							}
					
						if(($i >= ($page-8))&& ($i <= $page))
							{
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?page=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
								else
									echo "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a>&nbsp&nbsp";
								
							}
						
						
					
					}
					
				
					$i++;
				
		}
			if($page < $j)
			{
				$next = $page + 1;
				echo "<a href='$_SERVER[PHP_SELF]?page=$next'>>></a>&nbsp&nbsp";
			}
			echo "</div>";
			
	}
	?>