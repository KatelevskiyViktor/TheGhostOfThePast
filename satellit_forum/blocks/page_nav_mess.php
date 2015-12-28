<?if($myrow0 > 20 && $page_m <= (ceil($myrow0/20)) && $page_m > 0)
{
		

		echo "<div id='page_navigation'>";
		
		
		if($page_m > 1)
		{ $previous = $page_m - 1;
			echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$previous'><<</a>&nbsp&nbsp";
		}
		
		$j=ceil($myrow0/20);
		$i=1;
		while($i <= $j)
		{	
			if($page_m <= 8)
				{
					if($i <= 8)
					{	if(($i == 1) && (($_SERVER['QUERY_STRING']) == "id=$id"))
						{
							echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
							$i++;
						}
						if((($_SERVER['REQUEST_URI']) == ("$_SERVER[PHP_SELF]?id=$id&page_m=$i")))
						echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
						else
						echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
					}
					
						if($i == 9)
							{
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?id=$id&page_m=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
								else
									{
										echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
										if($j > 10)
										echo ".....&nbsp&nbsp";
									}
							}
						
						if($i == $j && $j > 9)
						{
							if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?id=$id&page_m=$i"))
								echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
							else
								echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
						}
				}
				else if($page_m >= 9 && $page_m < $j)
					{	if($i == 1)
						{
							echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=1'>1</a>&nbsp&nbsp";
							echo ".....&nbsp&nbsp";
						}
						
						if($i >=($page_m-4) && ($i < $page_m))
						{
							if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?id=$id&page_m=$i"))
								echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
							else
								echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
						}
						if($i == $page_m)
							{
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?id=$id&page_m=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
								else
									echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
							}
						if (($i > $page_m) && ($i <= ($page_m+5)) && ($i != $j))
							{
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?id=$id&page_m=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
								else
									echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
							}
						
						if($i == $j)
						{	
							if(($j-6) > $page_m)
							{
								echo ".....&nbsp&nbsp";
							}
							if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?id=$id&page_m=$i"))
								echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
							else
								echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
							
						}
					}
					else
					{
						if($i == 1 && $j >= $page_m)
							{
								
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?id=$id&page_m=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp.....&nbsp&nbsp";
								else
									echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp.....&nbsp&nbsp";
							}
					
						if(($i >= ($page_m-8))&& ($i <= $page_m))
							{
								if($_SERVER['REQUEST_URI'] == ("$_SERVER[PHP_SELF]?id=$id&page_m=$i"))
									echo "<a id='active' href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
								else
									echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$i'>$i</a>&nbsp&nbsp";
								
							}
						
						
					
					}
					
				
					$i++;
				
		}
			if($page_m < $j)
			{
				$next = $page_m + 1;
				echo "<a href='$_SERVER[PHP_SELF]?id=$id&page_m=$next'>>></a>&nbsp&nbsp";
			}
			echo "</div>";
			
	}?>