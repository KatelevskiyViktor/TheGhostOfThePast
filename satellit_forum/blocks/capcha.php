<?
				$captcha = rand(1, 5);
				echo "<p>Укажите, какое из 5-ти животных находится в рамке:</p><img src='img/owl.png'><img src='img/cat.png'><img src='img/pingvin.png'><img src='img/walrus.png'><img src='img/mammoth.png'></br>
				<input group='true' style='margin-right:25px;' type='radio' name='animals' value='1'>
				<input style='margin-right:25px;' type='radio' name='animals' value='2'>
				<input type='radio' name='animals' value='3'>
				<input style='margin-left:25px;' type='radio' name='animals' value='4'>
				<input style='margin-left:25px;' type='radio' name='animals' value='5'>
				</br>
				<input type='hidden' name='cap' value='$captcha'></br>"; 
				if($captcha == 1)
					{	
						echo "<img class='border' src='img/owl.png'>";
					}
				if($captcha == 2)
					{	
						echo "<img class='border' src='img/cat.png'>";
					}
				if($captcha == 3)
					{	
						echo "<img class='border' src='img/pingvin.png'>";
					}
				if($captcha == 4)
					{	
						echo "<img class='border' src='img/walrus.png'>";
					}
				if($captcha == 5)
					{	
						echo "<img class='border' src='img/mammoth.png'>";
					}?>
					