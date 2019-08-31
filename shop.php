<?php
//Category based shop = category_based($con,$cat)
//Default shop = defaultShop($con)
require 'inc/header.php';
require_once 'partials/shop.php';
$shopObj=new shop;
 ?>
<style>
	.cbp-vm-image img {
    display: inline-block;
    max-width: 100%;
    border: none;
    height: 260px;
}
</style>
	<div class="container">
	   <div class="products-page">
			<div class="products">
				<?php require 'inc/left-sidebar.php'; ?>
				<div class="latest-bis">
					<img src="images/l4.jpg" class="img-responsive" alt="" />
					<div class="offer">
						<p>40%</p>
						<small>Top Offer</small>
					</div>
				</div> 	

			</div>
			<div class="new-product">
				<div class="new-product-top">
					<ul class="product-top-list">
						<li><a href="index.php">Home</a>&nbsp;<span>&gt;</span></li>
						<li><span class="act">Shop</span>&nbsp;</li>
					</ul>
					
					<div class="clearfix"></div>
				</div>
				<div class="mens-toolbar">
                 <div class="sort">
               	   <div class="sort-by">
			            <label>Sort By</label>
			            <select>
			                            <option value="">
			                    Position                </option>
			                            <option value="">
			                    Name                </option>
			                            <option value="">
			                    Price                </option>
			            </select>
			            <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
	                   </div>
	    		     </div>
		    	        <ul class="women_pagenation">
					     <li>Page:</li>
					     <li class="active"><a href="#">1</a></li>
					     <li><a href="#">2</a></li>
				  	    </ul>
	               		 <div class="clearfix"></div>		
			        </div>
			        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>
					<div class="pages">   
        	 <div class="limiter visible-desktop">
               <label>Show</label>
                  <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                  </select> per page        
               </div>
       	   </div>
					<div class="clearfix"></div>
					<?php if (isset($_GET['cat'])) { 
						$cat=$_GET['cat'];
						$shopObj->category_based($con,$cat);

					}elseif(isset($_GET['low'])||isset($_GET['high'])){
						$shopObj->filter_by_price($con,$_GET['low'],$_GET['high']);
					}else{ 
						$shopObj->defaultShop($con);
					} ?>
				</div>
				<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="js/classie.js" type="text/javascript"></script>
			</div>
			<div class="clearfix"></div>
			</div> 
			<div class="clearfix"></div>
   </div>
   <!-- content-section-ends -->
		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">Featured Collection</h3>        			
				     <ul id="flexiselDemo3">
						<li><a href="single.php"><img src="images/l1.jpg" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.php">Perfectly simple</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$759</span></a></p>
							</div>
						</li>
						<li><a href="single.php"><img src="images/l2.jpg" class="img-responsive"/></a>						
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.php">Praising pain</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$699</span></a></p>
							</div>
						</li>
						<li><a href="single.php"><img src="images/l3.jpg" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.php">Neque porro</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$329</span></a></p>
							</div>
						</li>
						<li><a href="single.php"><img src="images/l4.jpg" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.php">Equal blame</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$499</span></a></p>
							</div>
						</li>
						<li><a href="single.php"><img src="images/l5.jpg" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.php">Perfectly simple</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$649</span></a></p>
							</div>
						</li>
				     </ul>
				     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});

				   </script>
				   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
				   </div>
				   </div>
		<!-- content-section-ends-here -->
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>JOIN OUR MAILING LIST</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter Your Email Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<?php require 'inc/footer.php'; ?>
</body>
<script>
	function addToCart(id, price){
		if (id!=null && price!=null) {
			var xmlHttp=new XMLHttpRequest();
		    xmlHttp.open("GET","ajax_action/cart.php?id="+id+"price="+price, false);
		    xmlHttp.send(null);
		    document.getElementById('cart_number').innerHTML=xmlHttp.responseText;
		}else{
			alert("Id Undefined");
		}
  }
</script>
</html>