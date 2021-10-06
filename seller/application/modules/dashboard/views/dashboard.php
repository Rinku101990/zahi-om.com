<style>
.slick-slide{display:block;}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgb(255, 255, 255);
    border-radius: .25rem;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
}
.text-danger {
    color: #ff3a59!important;
}
/*--bg-transparents--*/
.bg-primary-transparent {
    background: rgba(34, 5, 191, 0.15) !important;
}
.bg-secondary-transparent {
    background-color: rgba(247, 138, 95, 0.2)  !important;
}
.bg-success-transparent {
    background-color: rgba(54, 179, 126, 0.2)  !important;
}
.bg-primary-transparent {
    background-color:#d6e2ff ;
}
.bg-info-transparent {
    background-color: #ccf1f7;
}
.bg-warning-transparent {
    background-color: #fec !important;
}
.bg-danger-transparent {
    background-color: #ffddd6;
}
.bg-pink-transparent {
    background-color: rgba(255,43,136, 0.15) ;
}
.bg-purple-transparent {
    background-color: rgba(96,77,216, 0.2) ;
}
.bg-dark-transparent {
    background-color: rgba(55,66,84, 0.1) ;
}
.bg-twitter-transparent {
    background: rgb(28, 157, 235,0.2);
    color:#1c9deb
}
.bg-linkedin-transparent {
    background: rgba(0, 119, 181, 0.2);
    color: #0077b5;
}
.bg-facebook-transparent {
    background: rgb(95, 144, 204,0.2);
    color: #4064ad;
}
.bg-googleplus-transparent {
    background: rgb(216, 75, 63,0.2);
    color:#d84b3f;
}
.bg-danger-transparent {
    background: rgba(255, 98, 88, 0.2);
}

.widget-stats .cards, .widget-stats .box--share {
    background: #ff000012;   
}

</style>
<div class="breadcrumbs_area contact_bread">
	    </div>
		
		<section class="main_content_area my_account">
				<div class="container">
	                <div class="account_dashboard">
	                    <div class="row">
						
	                 <div class="col-sm-12 col-md-12 col-lg-12">
							
	                    <div class="breadcrumb_content">
	         <div class="breadcrumb_header">
	  <a href="<?=base_url();?>"><i class="fa fa-home"></i></a>
	                            <span><i class="fa fa-angle-right"></i></span>
	                            <span> Dashboard</span>
	                        </div>
	                        <div class="breadcrumb_title">
	                            <h3>Dashboard </h3>
	                        </div>
							
	                    </div>
	               <div class="row" >

            <div class="owl-item col-md-3" ><div class="item"> <div class="card bg-success-transparent"> <div class="card-body"> <h6 class="mb-3">Total Products</h6> <h2 class="text-right mb-4"><i class="fa fa-product-hunt text-success text-success-shadow fa-lg float-left"></i><span><?=$product_total;?></span></h2>  </div> </div> </div></div>
             <div class="owl-item col-md-3" ><div class="item "> <div class="card bg-warning-transparent"> <div class="card-body"> <h6 class="mb-3">Total Hot Products</h6> <h2 class="text-right mb-4"><i class="fa fa-wpforms text-warning text-warning-shadow fa-lg float-left"></i><span><?=$hot_total;?></span></h2>  </div> </div> </div></div>
              <div class="owl-item col-md-3" ><div class="item "> <div class="card bg-secondary-transparent"> <div class="card-body"> <h6 class="mb-3">Total Featured Products</h6> <h2 class="text-right mb-4"><i class="fa fa-camera-retro text-secondary text-secondary-shadow fa-lg float-left"></i><span><?=$featured_total;?></span></h2>  </div> </div> </div></div>
               <div class="owl-item col-md-3" ><div class="item "> <div class="card bg-primary-transparent"> <div class="card-body"> <h6 class="mb-3">Total Trending Products</h6> <h2 class="text-right mb-4"><i class="fa fa-twitch text-primary text-primary-shadow fa-lg float-left"></i><span><?=$trending_total;?></span></h2>  </div> </div> </div></div>
           
        </div>
        <br/>
	                            <!-- Tab panes -->
<div class="">
<div class=""  role="listbox">

<div class="widget widget-stats slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide00" >
  <a href="#" tabindex="-1">
                        <div class="cards">
                            <div class="cards-header p-4">
                                <h5 class="cards-title">Products</h5>
  <i class="icn"><svg class="svg">
  <use xlink:href="<?=base_url('');?>assets/svg/sprite.svg#my-sales" href="<?=base_url();?>assets/svg/sprite.svg#my-sales"></use>
                                    </svg>
                                </i>
                            </div>
                            <div class="cards-content pl-4 pr-4 ">
                                <div class="stats">
                                    <div class="stats-number">
                                        <ul>
                                            <li>
                                                <span class="total">Completed Sales</span>
                                                <span class="total-numbers"><?=currency($this->website->web_currency);?><?=number_format($product_complete);?></span>
                                            </li>
                                            <li>
                                                <span class="total">Inprocess Sales</span>
                                                <span class="total-numbers"><?=currency($this->website->web_currency);?><?=number_format($product_proccess);?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="widget widget-stats slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide01" >
                    <a href="#" tabindex="-1">
                        <div class="cards">
                            <div class="cards-header p-4">
                                <h5 class="cards-title">Credits</h5>
                                <i class="icn"><svg class="svg">
                                        <use xlink:href="<?=base_url('');?>assets/svg/sprite.svg#credits" href="<?=base_url('');?>assets/svg/sprite.svg#Credits"></use>
                                    </svg>
                                </i>
                            </div>
                            <div class="cards-content pl-4 pr-4 ">
                                <div class="stats">
                                    <div class="stats-number">
                                        <ul>
                                            <li>
                                                <span class="total">Amount</span>
                                                <span class="total-numbers"><?=currency($this->website->web_currency);?><?=number_format($credit_today);?></span>
                                            </li>
                                            <li>
                                                <span class="total">Credits Earned Today</span>
                                                <span class="total-numbers"><?=currency($this->website->web_currency);?><?=number_format($credit_today);?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="widget widget-stats slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide02" >
                    <a href="#" tabindex="-1">
                        <div class="cards">
                            <div class="cards-header p-4">
                                <h5 class="cards-title">Orders</h5>
                                <i class="icn"><svg class="svg">
                                        <use xlink:href="<?=base_url('');?>assets/svg/sprite.svg#order" href="<?=base_url('');?>assets/svg/sprite.svg#order"></use>
                                    </svg>
                                </i>
                            </div>
                            <div class="cards-content pl-4 pr-4 ">
                                <div class="stats">
                                    <div class="stats-number">
                                        <ul>
                                            <li>
                                                <span class="total">Completed Orders</span>
                                                <span class="total-numbers"><?=$product_order;?></span>
                                            </li>
                                            <li>
                                                <span class="total">Shipped Orders</span>
                                                <span class="total-numbers"><?=$product_shipped;?></span>
                                            </li>
                                            
                                            <li>
                                                <span class="total">Pending Orders</span>
                                                <span class="total-numbers"><?=$product_pending;?></span>
                                            </li>
                                            <!-- <li>
                                                <span class="total">Return Orders</span>
                                                <span class="total-numbers"><?=$product_pending;?></span>
                                            </li>
                                            <li>
                                                <span class="total">Cacnel Orders</span>
                                                <span class="total-numbers"><?=$product_pending;?></span>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        <!--         <div class="widget widget-stats slick-slide slick-current slick-active" data-slick-index="3" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide03" >
                <a href="#" tabindex="0">
                    <div class="cards">
                        <div class="cards-header p-4">
                            <h5 class="cards-title">Active Subscription</h5>
                            <i class="icn"><svg class="svg">
                                    <use xlink:href="<?=base_url('');?>assets/svg/sprite.svg#messages" href="<?=base_url('');?>assets/svg/sprite.svg#messages"></use>
                                </svg>
                            </i>
                        </div>
                        <div class="cards-content pl-4 pr-4 ">
                            <div class="stats">
                                <div class="stats-number">
                                    <ul>
                                                                                    <li>
                                                <span class="total">Products</span>
                                                <span class="total-numbers">872 Days</span>
                                            </li>
                                            <li>
                                                <span class="total">Remaining</span>
                                                <span class="total-numbers">315</span>
                                            </li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->
            <div class="widget widget-stats slick-slide slick-active" data-slick-index="4" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide04" >
                <a href="#" tabindex="0">
                    <div class="cards">
                        <div class="cards-header p-4">
                            <h5 class="cards-title">Refunds</h5>
                            <i class="icn"><svg class="svg">
                                    <use xlink:href="<?=base_url('');?>assets/svg/sprite.svg#refund" href="<?=base_url('');?>assets/svg/sprite.svg#refund"></use>
                                </svg>
                            </i>
                        </div>
                        <div class="cards-content pl-4 pr-4 ">
                            <div class="stats">
                                <div class="stats-number">
                                    <ul>
                                        <li>
                                            <span class="total">Refunded Orders</span>
                                            <span class="total-numbers"><?=$refunt_product->count;?></span>
                                        </li>
                                        <li>
                                            <span class="total">Refunded Amount</span>
                                            <span class="total-numbers"><?=currency($this->website->web_currency);?><?=number_format($refunt_product->amount);?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

         
		<!-- 	<div class="widget widget-stats slick-slide slick-active" data-slick-index="5" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide05" >
                <a href="#" tabindex="0">
                    <div class="cards">
                        <div class="cards-header p-4">
                            <h5 class="cards-title">Cancellations</h5>
                            <i class="icn"><svg class="svg">
                                    <use xlink:href="<?=base_url('');?>assets/svg/sprite.svg#cancel" href="<?=base_url('');?>assets/svg/sprite.svg#cancel"></use>
                                </svg>
                            </i>
                        </div>
                        <div class="cards-content pl-4 pr-4 ">
                            <div class="stats">
                                <div class="stats-number">
                                    <ul>
                                        <li>
                                            <span class="total">Cancelled Orders</span>
                                            <span class="total-numbers">1</span>
                                        </li>
                                        <li>
                                            <span class="total">Cancelled Orders Amount</span>
                                            <span class="total-numbers">$585.00</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->
		
			</div>
	                                    
	                                          </div>
	                                
	                                
	                               
	                               
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>       	
            </section>