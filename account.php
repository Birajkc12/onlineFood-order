
<?php include('partials-front/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/userdashstyle.css">

	

	<title>KhajaGhar User Portal</title>
</head>
<body>

	
	<!-- CONTENT -->
	<section id="content">
		

		<!-- MAIN -->
		<main>

		<?php 
  if(isset($_SESSION['login']))
    {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
  if(isset($_SESSION['no-login-message']))
    {
      echo $_SESSION['no-login-message'];
      unset($_SESSION['no-login-message']);
    }
?>

<?php 
  if(isset($_SESSION['status']))
  {
 ?>

 <?php 
  echo $_SESSION['status'];
?>
<?php 
   unset($_SESSION['status']);
  }
?>
		

			<div class="head-title">
				<div class="left">
					<h1>Order Dashboard</h1>
					
				</div>

            </div>
			
			<ul>
				<?php
					if(! empty($_SESSION['logged_in']))
					{	
				?>
			<li><a href="logout.php">Logout</a></li>
			<?php 
					}
					else{
						//echo 'You are not logged in.';
						header("location:login.php");
					}
			?>
			</ul>

			<div class="container2">
                <form action="#" method="POST">
				<h1>My Details Check </h1>
					<input type="tel" id="contact" class="form" name="customer_contact" placeholder="Enter contact To Check Your order details"  required pattern="98[0-9]{8}">												
					<input type="submit"  name="check" class="buttn" value="Check" id="btnn"></input>
                   
                    <style>
                        .container2{
                            width: 100%;
                            height: 30vh;
	                        display: flex;
	                        align-items: center;
	                        justify-content: center;
                        }
                        .container2 form{
                        background: whitesmoke;
                        display: flex;
                        flex-direction: column;
                        padding: 2vw 4vw;
                        width: 90%;
                        max-width: 500px;
                        border-radius: 30px;
                        
                    }
                    form input{
                        border: 0;
                        margin: 10px 0;
                        padding: 15px;
                        outline: none;
                        font-size: 16px;
                        border-radius: 40px;
                        font-weight: bold;
                    }
						.buttn {
						background: forestgreen;
						padding: 11.5px 155px;
						color: black;
						font-size: 15px;
						font-weight: bold;
						border: 0;
						outline: none;
						cursor: pointer;
						/* width: 200px; */
						margin: 10px auto 0;
						border-radius: 30px;
						}
						.buttn:hover{
						background: forestgreen;
                        color: whitesmoke;
						}
															
					</style>
	</form>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<p><h3>My Total Orders</h3></p>
						<?php
							
							$connection = mysqli_connect("localhost","root","","onlinefood-order"); 
							
								if(isset($_POST['check'])){
									$customer_contact = $_POST['customer_contact'];														                      
							// $query = "SELECT customer_contact from tbl_order ORDER BY customer_contact";
							$query = "Select * from tbl_order where customer_contact='$customer_contact';";
							$query_run = mysqli_query($connection,$query);
							$row = mysqli_num_rows($query_run);

							echo '<h3>'.$row.'</h3>';
							
							
						}
																
						?>

					</span>
				</li>
				
				 <!-- <li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<p><h3>Total Amount (NPR.)</h3></p>
						<?php	
							$count=1000;
																				
							$connection = mysqli_connect("localhost","root","","onlinefood-order"); 
							
								if(isset($_POST['check'])){
									$customer_contact = $_POST['customer_contact'];
							// $query = "SELECT food from tbl_order ORDER BY food";
							$query = "Select * from tbl_order where customer_contact='$customer_contact';";
							$query_run = mysqli_query($connection,$query);

							$row = mysqli_num_rows($query_run);
							
							if($row%2==0){
								//$total=0;
								echo "<h3>Free Game</h3>";
							}
							else 
								{							
									$total=$count*$row;									
									echo '<h3>' .$total .'</h3>'; 
								}
		
							}
							
						?>
					</span>
				</li>  -->
			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>My Orders</h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table>
						<thead>
							<tr>
								<th></th>
								<th>Food Name</th>
								<th>Total Quantity</th>
								<th>Per Quantity</th>
								<th>Total Price</th>
								<th>Order Status</th>
					 
								
							</tr>
						</thead>
							<tbody>
								<?php
									$con = mysqli_connect("localhost", "root", "", "onlinefood-order");

									if($con){
										if(isset($_POST['check'])){
											$customer_contact = $_POST['customer_contact'];

										$dis_query= "Select * from tbl_order where customer_contact='$customer_contact'";
										$dis_execute = mysqli_query($con,$dis_query);
										if($dis_execute){
										
											while($row=mysqli_fetch_assoc($dis_execute)){

												echo "<td>";

												echo "<td>";
												$food = $row['food'];
												echo "<p>$food</p>";
												echo"</td>";
                                                
                                                echo "<td>";																				 
												$qty = $row['qty'];
												echo "<p>$qty</p>";
												echo"</td>";

												echo "<td>";																				 
												$price = $row['price'];
												echo "<p>$price</p>";
												echo"</td>";
												
												echo "<td>";																				 
												$price = $row['price']*$qty;
												echo "<p>$price</p>";
												echo"</td>";

												echo "<td>";																				 
												$status = $row['status'];
												echo "<p>$status</p>";
												echo"</td>";

												?>
												
													<!-- <input type="hidden"  name="food" value="<?php echo $row['food'] ?>"> -->
													<!-- <td><input type="submit" name="edit" class='ebutton' value="Cancel" > <a href="" ></a> </td> -->
											
												
																																
													<!-- CSS for Cancel and Cancel button -->
													<style>
														.button {
															background: forestgreen;
															padding: 10px 10px;
															color: black;
															font-size: 15px;
															font-weight: bold;
															border: 0;
															outline: none;
															cursor: pointer;
															width: 130px;
															margin: 10px auto 0;
															border-radius: 30px;
														}
														.button:hover{
															background: red;
															color: whitesmoke;
														}
														.ebutton {
															background: forestgreen;
															padding: 10px 10px;
															color: black;
															font-size: 15px;
															font-weight: bold;
															border: 0;
															outline: none;
															cursor: pointer;
															width: 130px;
															margin: 10px auto 0;
															border-radius: 30px;
														}
														.ebutton:hover{
															background: blue;
															color: whitesmoke;
														}

															
													</style>
													
																																														 												 																																				
												<?php
												echo "</td>";
												echo "<tr/>";
											}											
										}									
									}
								}
								

									?>	

							</tbody>
					</table>
				</div>
                                    							                                  
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="dashscript.js"></script>
</body>
</html>