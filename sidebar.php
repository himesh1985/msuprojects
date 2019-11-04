<?php
if(isset($_POST['login'])){
	$email = $_POST['log_email'];
	$pass  = $_POST['log_pword'];

	 if ($email == '' OR $pass == '') {

         	message("Invalid Username and Password!", "error");
			redirect("index.php");
         
    } else {
	$guest = new Guest();
	$res = $guest->guest_login($email, $pass);
		if($res == true){
			redirect("index.php");
		}else{

			message("Username or Password Not Registered! Contact Your administrator.","error");
			redirect("index.php");
		}
	}

}
if(isset($_SESSION['rooms_count'])){
	$rooms_count=$_SESSION['rooms_count'];
	$adults=$_SESSION['adults'];
	$children=$_SESSION['children'];
}
else{
	$rooms_count=1;
	$adults=1;
	$children=1;
}
?>

<!--Side bar-->
			<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="sidebar-nav">
		   <div class="panel panel-primary">
		
			 <div class="panel-heading">Rooms Reservation</div>
			  <div class="panel-body">	
						   <form  method="POST" action="#.php">
								<div class="col-xs-12 col-sm-12">

					            	<div class="form-group">
					            		<div class="row">
					            			<div class="col-xs-12 col-sm-12">
					            				<label class="control-label" for="from">Check In</label>
						     
							                    <input class="form-control from" autocomplete="off" required size="11" value="<?php echo (isset($_SESSION['from'])) ? $_SESSION['from'] : ''; ?>" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd" type="text" value=""  name="from" id="from">
							                   
						              		</div>
						            	</div>
						            </div>
						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
					            				<label class="control-label" for="to">Check Out</label>
						              			
								                    <input class="form-control to" autocomplete="off" required size="11" type="text" value="<?php echo (isset($_SESSION['to'])) ? $_SESSION['to'] : ''; ?>"  name="to" id="to" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
								                   
						              		</div>
						            	</div>
						            </div>
<div class="totalselectrooms">
				          <div class="selectrooms">
								<label >Select  Rooms:</label>
								<select name="no_of_rooms" id="no_of_rooms" class="selectpicker" >
								<option value="1" <?php if($rooms_count==1){ echo "Selected"; } ?> >1</option>
								<option value="2" <?php if($rooms_count==2){ echo "Selected"; } ?> >2</option>
								<option value="3" <?php if($rooms_count==3){ echo "Selected"; } ?> >3</option>
								<option value="4" <?php if($rooms_count==4){ echo "Selected"; } ?> >4</option>
								<option value="5" <?php if($rooms_count==5){ echo "Selected"; } ?> >5</option>
								</select>
							</div>	
							 <div class="selectrooms"> 
								<label >Select Adults:</label>
								<select name="adults" id="adults" class="selectpicker" >
								<option value="1" <?php if($adults==1){ echo "Selected"; } ?> >1</option>
								<option value="2" <?php if($adults==2){ echo "Selected"; } ?> >2</option>
								<option value="3" <?php if($adults==3){ echo "Selected"; } ?> >3</option>
								<option value="4" <?php if($adults==4){ echo "Selected"; } ?> >4</option>
								<option value="5" <?php if($adults==5){ echo "Selected"; } ?> >5</option>
								</select>
							</div>	
							<div class="selectrooms">
								<label >Select Childrens:</label>
								<select name="children" id="children" class="selectpicker" >
								<option value="0" <?php if($children==0){ echo "Selected"; } ?> >0</option>
								<option value="1" <?php if($children==1){ echo "Selected"; } ?> >1</option>
								<option value="2" <?php if($children==2){ echo "Selected"; } ?> >2</option>
								<option value="3" <?php if($children==3){ echo "Selected"; } ?> >3</option>
								<option value="4" <?php if($children==4){ echo "Selected"; } ?> >4</option>
								<option value="5" <?php if($children==5){ echo "Selected"; } ?> >5</option>
								</select>
							</div>	
							</div>
						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						           				 <button type="submit" class="button button4" align="right"name="avail">Check Availability</button>
						           			 </div>
						            	</div>
						            </div>
						        </div>
					        </form>
						</div>
			
		</div>
			
				<div class="panel panel-primary">
					
					<?php if(!isset($_SESSION['guest_id'])){

				echo ' <div class="panel-heading">User Login</div>
					   <div class="panel-body">	
						   <form  method="POST" action="#.php">
								<div class="col-xs-12 col-sm-12">

					            	<div class="form-group">
					            		<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						              			<input type="email" placeholder="Email" class="form-control" name="log_email">
						              		</div>
						            	</div>
						            </div>
						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						              			<input type="password" placeholder="Password" class="form-control" name="log_pword">
						              		</div>
						            	</div>
						            </div>

						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						           				 <button type="submit" class="button button4" align="right" name="login">Sign in</button>
						           			 </div>
						            	</div>
						            </div>
						        </div>
					        </form>
					       
						</div>';
					}else{

					echo'<div class="panel-heading">Guest Information</div>
							   <div class="panel-body">	
									<div class="col-xs-12 col-sm-12">
									 <span class="glyphicon glyphicon-user"> </span> Guest Name:<br/> <p><b>'.$_SESSION['name'].' '.$_SESSION['last'].'</b><br/>
									 <span class="glyphicon glyphicon-cog"> </span> Email:<br/> <b>'. $_SESSION['email'].'</b><br/>
									 		 <span class="glyphicon glyphicon-cog"> </span> Tel No.:<br/><b> '. $_SESSION['phone'].'</b><br/><br/>
									  <a href="logout.php" class="btn btn-default">Logout <span class="glyphicon glyphicon-log-out"></span></a>
									</div>					            					            		
								</div>';

					}
						?>
				</div>
				
				 <form name="clock">
			                  
					  <input  class="form-control" id="trans" type="label"  name="face" value="">
				</form>
						

		    <hr>
			

	

		
	</div>
			<!--/.well --> 
		</div>
		<!--/span-->
		<!--End of Side bar-->
