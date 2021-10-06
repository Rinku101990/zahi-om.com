<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->model("Cart_model",'Cart');
	    if(!empty($this->session->userdata('logged_in_customer'))){
	    	$this->customer=customer($this->session->userdata('logged_in_customer')->cust_id);
	    }
		/* ========FOR Customer =========== */
		$this->cust_id="cust_id"; 
		$this->fld_email="cust_email"; 	
        $this->fld_password="cust_password";	
		$this->table_customer="tbl_customer";
		/* ========FOR Product =========== */
		$this->p_id="p_id"; 		
		$this->table_product="tbl_product";
		/* ========FOR Tax =========== */
		$this->txt_id="txt_id"; 		
		$this->table_tax="tbl_tax";
    }

    public function index()
	{ 		
	    $content['tax'] = $this->Cart->tax_list($this->table_tax);
	    //print_r($content['tax'][0]->txt_name);
	    //die();
	    //$content['subview']='cart/viewCart';
	    $this->load->view('cart/viewCart', $content);
	}

  public function get_color()
	{ 
	    $intid=$this->input->post('intid');
	    $color=$this->Cart->get_color($intid);
	    $special_price=$this->Cart->get_color_special($color->int_pid);
	    if(empty($special_price)){
	    	$result['color'] =array('int_selleing_price' => $color->int_selleing_price,
	    		'int_available_qty' => $color->int_available_qty );
	    }else{ 
	    	$result['color'] =array('int_selleing_price' =>$special_price,
	    		'int_available_qty' => $color->int_available_qty );
	    }
	    $result['size'] = $this->Cart->get_color_size($color->int_pid,$color->int_color);
		//$result['color'] = $this->Cart->get_color($intid);
		echo json_encode($result);
	}

    public function cart_save()
	{   
		$current_date=date('Y-m-d');
		if(empty($this->input->post('sleeve'))){
		$PID=decode($this->input->post('RefId'));
		$qty=$this->input->post('qty');
		 $intid=$this->input->post('intid');
		$color = $this->Cart->get_color($intid);
		$product = $this->Cart->product_detail($PID,$this->table_product);		
		if($product->sp_start_date <= $current_date && $product->sp_end_date >= $current_date){
	        $special_price=$product->sp_special_price; 
	        $price=$product->sp_special_price;
		}else{ 
			$special_price='';
	    	//$price=$product->p_selling_price; 
	    	$price=$color->int_selleing_price; 
	    }
    	$img=base_url('seller/uploads/').slug($product->cate_name).'/'.slug($product->scate_name).'/'.slug($product->child_name).'/'.explode(',',$product->pg_image)[0];
    	$product_url=base_url('product/').encode($product->p_id).'/'.slug($product->p_name);
		$product_name=preg_replace("/([.,'])/i", '', $product->p_name);
		if($product->p_tax=='1'){
			$tax=tax($product->cate_id);
		}else{
			$tax='0';
		}

		if(!empty($this->input->post('shoulder'))){
			$sz_shoulder="Shoulder :".$this->input->post('shoulder').' Inch <br>';
		}else{$sz_shoulder='';}
		if(!empty($this->input->post('bust'))){
			$Bust="Bust :".$this->input->post('bust').' Inch <br>';
		}else{$Bust='';}
		if(!empty($this->input->post('waist'))){
			$Waist="Waist :".$this->input->post('waist').' Inch <br>';
		}else{$Waist='';}
		if(!empty($this->input->post('hips'))){
			$Hips="Hips :".$this->input->post('hips').' Inch <br>';
		}else{$Hips='';}
		if(!empty($this->input->post('length'))){
			$Length="Length :".$this->input->post('length').' Inch <br>';
		}else{$Length='';}
		if(!empty($this->input->post('sleevs_width'))){
			$sleevs_width="Sleevs Width :".$this->input->post('sleevs_width').' Inch <br>';
		}else{$sleevs_width='';}
       if(!empty($this->input->post('sleevs_neck'))){
			$sleevs_neck="Sleevs Neck :".$this->input->post('sleevs_neck').' Inch <br>';
		}else{$sleevs_neck='';}
		 if(!empty($this->input->post('upper_width'))){
			$upper_width="Upper Width :".$this->input->post('upper_width').' Inch <br>';
		}else{$upper_width='';}
		if(!empty($this->input->post('abaya_size'))){
			$abaya_size="Size :".$this->input->post('abaya_size').'  <br>';
		}else{$abaya_size='';}
		if(!empty($this->input->post('additional'))){
			$additional="Additional comments :".$this->input->post('additional');
		}else{$additional='';}

		$serialize=serialize($sz_shoulder.''.$Bust.''.$Waist.''.$Hips.''.$Length.''.$sleevs_width.''.$sleevs_neck.''.$upper_width.''.$abaya_size.''.$additional);
		if(empty($intid)){
			$get_main_id=$product->p_id;
		}else{$get_main_id=$intid;}

		$data = array(
            'id' => $get_main_id, 
            'pid' => $product->p_id, 
            'intid' => $intid, 
            'name' => encode($product_name), 
            'price' => $price,
           // 'selling_price' => $product->p_selling_price, 
            'selling_price' => $color->int_selleing_price,
            'special_price' => $special_price, 
            'qty' => $qty, 
            'color' => $this->input->post('color'), 
			'size' => $this->input->post('size'),
			// 'sz_shoulder' =>$this->input->post('shoulder'),
   //          'sz_bust' => $this->input->post('bust'),
			// 'sz_waist' => $this->input->post('waist'),
			// 'sz_hips' => $this->input->post('hips'),
			// 'sz_length' => $this->input->post('length'),
			// 'sleevs_width' => $this->input->post('sleevs_width'),
			// 'sleevs_neck' => $this->input->post('sleevs_neck'),
			// 'upper_width' => $this->input->post('upper_width'),
			// 'abaya_size' => $this->input->post('abaya_size'),
			'serialize' => $serialize,
			'tax' => $tax, 
            'img' => $img, 
             'min_qty' => $product->int_min_purchase_qty, 
             //'max_qty' => $product->int_available_qty, 
             'max_qty' => $color->int_available_qty, 
            'product_url' =>$product_url, 
            'vnd' =>$product->p_vnd_id, 
        );
	  }else{

	  	$sleeve=$this->input->post('sleeve');
	  	$this->session->set_userdata('sleeve','1');
	  	$fabric=$this->input->post('fabric');
	  	$color=$this->input->post('color');
	  	//$size=$this->input->post('size');
		$sleeve_p = $this->Cart->product_sleeve($sleeve);
		$fabric_p = $this->Cart->product_fabric($fabric);
		$color_p = $this->Cart->product_color($color);	
		//$size_p = $this->Cart->product_size($size);	
		$product_url=base_url('make-your-own-design');
		$img=base_url('admin/uploads/sleeve/').$sleeve_p->sl_img;
		$fb_img=base_url('admin/uploads/fabric/').$fabric_p->fb_img;
		$cl_img=base_url('admin/uploads/color/').$color_p->cl_img;
		//$sz_img=base_url('admin/uploads/size/').$size_p->sz_img;
		$sz_img=$this->input->post('simg');
		$data = array(
            'id' => $sleeve, 
            'name' => encode($sleeve_p->sl_name), 
            'price' => $sleeve_p->sl_price,            
            'qty' => '1', 
            'img' => $img, 
            'tax' => '0',            
            'min_qty' =>'100', 
            'fb_id' => $fabric, 
            'fb_name' => encode($fabric_p->fb_name),            
            'fb_img' => $fb_img, 
            'cl_id' => $color, 
            'cl_name' => encode($color_p->cl_name),            
            'cl_img' => $cl_img, 
            'sz_shoulder' =>$this->input->post('shoulder'),
            'sz_bust' => $this->input->post('bust'),
			'sz_waist' => $this->input->post('waist'),
			'sz_hips' => $this->input->post('hips'),
			'sz_length' => $this->input->post('length'),
            'sz_img' =>$sz_img,
            'product_url' =>$product_url,            
        );

	  }
  		//print_r($data);die();
        $this->cart->insert($data);
        $result=$this->show_cart();       
        echo json_encode($result);
	}

   public function cart_remove()
	{   
		$rowid=$this->input->post('rowid');		
		$pdata = array(
			'rowid' => $rowid,
			'qty'   => 0,
		);			
		$this->cart->update($pdata);	
		$result['show_cart']=$this->show_cart(); 
		$result['cart']=$this->cart_details();      
        echo json_encode($result);
	}
	public function cart_add()
	{   
		$rowid=$this->input->post('rowid');		
		$qty=$this->input->post('qty');		
		$pdata = array(
			'rowid' => $rowid,
			'qty'   => $qty+1,
		);			
		$this->cart->update($pdata);	
		$result['show_cart']=$this->show_cart(); 
		$result['cart']=$this->cart_details();       
        echo json_encode($result);
	}

public function cart_minus()
	{   
		$rowid=$this->input->post('rowid');		
		$qty=$this->input->post('qty');		
		$pdata = array(
			'rowid' => $rowid,
			'qty'   => $qty-1,
		);			
		$this->cart->update($pdata);	
		$result['show_cart']=$this->show_cart(); 
		$result['cart']=$this->cart_details();          
        echo json_encode($result);
	}

	// IN USE
	function show_cart(){ 
        $output = '';     
        if(empty($this->cart->contents())){
			$total='0';
		}else{ 
			$total=count($this->cart->contents());
		} 
        $price_symbol=$this->Cart->price_symbol();

        $output .='<a href="" class="nav-box-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-shopping-cart d-inline-block nav-box-icon"></i>
                        <span class="nav-box-text d-none d-xl-inline-block">Cart</span>
                        <span id="show_cart">
                        <span class="nav-box-number">'.$total.'</span>
                    </a>
	                <ul class="dropdown-menu dropdown-menu-right px-0">
					    <li>
					        <div class="dropdown-cart px-0">';
			if(!empty($this->cart->contents())){
				$output .='<div class="dc-header">
				                <h3 class="heading heading-6 strong-700">Cart Items</h3>
				            </div>';
			}else{
				$output .='<div class="dc-header">
                            <h3 class="heading heading-6 strong-700">Your Cart is empty</h3> 
                        </div>';
			}

        foreach ($this->cart->contents() as $items) { 
        	if(empty($this->session->userdata('sleeve'))){
        	if(!empty($items['color'])){
         		$color='<span class="quantity"><b>Color</b>: '.$items['color'].'</span>  ';
          	}else{$color='';}
          	
          	if($items['size']!='Select Size'){
         		$size='<span class="quantity"><b>Size</b>: '.$items['size'].'</span><br/>';
            }else{$size='';}
          } else{
          	$color='';
          	$size='';
          }
          	$remove_cart="remove_cart('".$items['rowid']."',this)";                                             
            $output .='<div class="dropdown-cart-items c-scrollbar">
					      <div class="dc-item">
					       <div class="d-flex align-items-center">
                            <div class="dc-image">
	                            <a href="'.$items['product_url'].'">
	                                <img src="'.$items['img'].'" data-src="'.$items['img'].'" class="img-fluid lazyload" alt='.decode($items['name']).'>
	                            </a>
	                        </div>

                            <div class="dc-content">
	                            <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
	                              <a href="'.$items['product_url'].'" target="_blank">
	                                '.decode($items['name']).'
	                              </a>
	                          	</span>
	                            <span class="dc-quantity">x'.$items['qty'].'</span>
	                            <span class="dc-quantity">'.$color.' '.$size.'</span>
	                            <span class="dc-price">'.$price_symbol.''.$items['price'].'</span>
	                        </div>

                            <div class="dc-actions">
	                            <button class="remove_cart_product1" url="'.base_url().'" data-proid="'.$items['rowid'].'" onclick="'.$remove_cart.'">
	                                <i class="la la-close"></i>
	                            </button>
	                        </div>
	                    </div>
                    </div>';
        }
        	if(!empty($this->cart->total())){
        		$output .= '<div class="dc-item py-3">
				                <span class="subtotal-text">Subtotal</span>
				                <span class="subtotal-amount">'.$price_symbol.''.$this->cart->format_number($this->cart->total()).'</span>
				            </div>
				            <div class="py-2 text-center dc-btn">
				                <ul class="inline-links inline-links--style-3">
				                    <li class="px-1">
				                        <a href="'.base_url('cart').'" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
				                            <i class="la la-shopping-cart"></i> View cart
				                        </a>
				                    </li>
				                    <li>
                                        <a href="'.base_url('checkout').'" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                            <i class="la la-mail-forward"></i> Checkout
                                        </a>
                                    </li>
				                </ul>
	            			</div>
	                	</div>
				    </li>
				</ul>';
        	}else{
        		$output .= '</div>
					    </li>
					</ul>';
        	}
	    	
    	return $output;
	}

	// IN USE
	function cart_details(){ 
		$tax = $this->Cart->tax_list($this->table_tax);
		$price_symbol=$this->Cart->price_symbol();
		if(empty($this->session->userdata('sleeve'))){
			$th_header='<th class="product-name">Product</th>
						<th class="product-nam1e">Color</th>
						<th class="product-nam1e">Size</th>
						<th class="product-nam1e">Dimensions</th>';
			}else{
				$th_header='<th class="product-name">Sleeve</th>
						<th class="product-nam1e">Fabric</th>
						<th class="product-nam1e">Color</th>
						<th class="product-nam1e">Size</th>';

			}
		if(!empty($this->cart->contents())){
			$output ='';
			$output .='
						    <div class="col-xl-12">
						        <div class="form-default bg-white p-4">
						            <div class="">
						                <div class="table-responsive">
						                    <table class="table-cart table border-bottom">
						                        <thead>
						                            <tr>
						                                <th class="product-image"></th>
						                                '.$th_header.'
						                                <th class="product-price  d-lg-table-cell">Price</th>
						                                <th class="product-quanity  d-md-table-cell">Quantity</th>
						                                <th class="product-total">Total</th>
						                                <th class="product-remove"></th>
						                            </tr>
						                        </thead>
						                        <tbody>';
						$total=0; 
						foreach ($this->cart->contents() as $items){ 
						if(empty($this->session->userdata('sleeve'))){	
						 	if(!empty($items['special_price'])){
								$price=$price_symbol.''.$this->cart->format_number($items['special_price']);
						 	}else{
						    	$price=$price_symbol.''.$this->cart->format_number($items['selling_price']);
							}
						 	if($items['size']!='Select Size'){
								$size=$items['size'];
							}else{
								$size='';
							}
							if(!empty($items['serialize'])){
							// $Dimensions='<p style="font-size: 12px;font-weight: 600;">
       //                                   Shoulder :  '.$items['sz_shoulder'].' Inch<br/>
       //                                            Bust :  '.$items['sz_bust'].' Inch<br/>
       //                                            Waist :  '.$items['sz_waist'].' Inch<br/>
       //                                            Hips :  '.$items['sz_hips'].' Inch<br/>
       //                                            Length :  '.$items['sz_length'].' Inch<br/>
       //                                            Sleevs Width :  '.$items['sleevs_width'].' Inch<br/>
       //                                            Sleevs Neck :  '.$items['sleevs_neck'].' Inch<br/>
       //                                            Upper Width :  '.$items['upper_width'].' Inch<br/></p>';
							$Dimensions=unserialize($items['serialize']);
							}else{
								$Dimensions='';
							}
							$item_tax=$items['tax']*$items['subtotal']/100;
							$td_footer='<td class="product-name">
			                                <span class="pr-4 d-block">
			                                    '.$items['color'].'
			                                </span>
			                            </td>
			                            <td class="product-name1">
			                                <span class="pr-4 d-block">'.$size.'
			                                </span>
			                            </td>
			                             <td class="product-image"><p>'.$Dimensions.'</p>
			                            </td>

			                            ';
						}else{
							$price=$price_symbol.''.$this->cart->format_number($items['price']);
							$item_tax='0';
							$td_footer='<td class="product-image">
			                                <a > <img loading="lazy" src="'.$items['fb_img'].'" alt="'.decode($items['fb_name']).'" style="object-fit: cover;height: 77px;width:100%"></a>
			                            </td>
			                            <td class="product-image">
			                               <a > <img loading="lazy" src="'.$items['cl_img'].'" alt="'.decode($items['cl_name']).'" style="object-fit: cover;height: 77px;width:100%"></a>
			                            </td>
			                            <td class="product-image"><p style="
    font-size: 12px;font-weight: 600;">
                                         Shoulder :  '.$items['sz_shoulder'].' Inch<br/>
                                                  Bust :  '.$items['sz_bust'].' Inch<br/>
                                                  Waist :  '.$items['sz_waist'].' Inch<br/>
                                                  Hips :  '.$items['sz_hips'].' Inch<br/>
                                                  Length :  '.$items['sz_length'].' Inch</p>
			                            </td>
			                            ';
						}
						 	$total +=$items['subtotal']+$item_tax;
						
							
						$output .='<tr class="cart-item">
			                            <input type="hidden" class="rowid" value="'.$items['rowid'].'">
			                            <td class="product-image">
			                                <a href="'.$items['product_url'].'" target="_blank" class="mr-3">
			                                    <img loading="lazy" src="'.$items['img'].'" alt="'.decode($items['name']).'" style="object-fit: cover;height: 77px;width:100%">
			                                </a>
			                            </td>

			                            <td class="product-name">
			                                <span class="pr-4 d-block">
			                                    '.decode($items['name']).'
			                                </span>
			                            </td>'.$td_footer.'
			                            

			                            <td class="product-price d-lg-table-cell">
			                                <span class="pr-3 d-block">
			                                	'.$price.'
			                                </span>
			                            </td>

			                            <td class="product-quantity d-md-table-cell">
			                                <div class="input-group input-group--style-2 pr-4" style="width: 130px;">
			                                    <input type="hidden" class="url" value="'.base_url().'"> 
			                                    <span class="input-group-btn">
			                                        <button class="btn btn-number dec qtybtn" type="button" data-type="minus" onclick="dec('."'".$items['rowid']."'".',this)">
			                                            <i class="la la-minus"></i>
			                                        </button>
			                                    </span>
			                                    <input type="text" name="quantity[0]" class="form-control input-number avail_qty'.$items['rowid'].'" placeholder="1" value="'.$items['qty'].'" min="1" max="'.$items['max_qty'].'" style="padding:5px;">
			                                    <span class="input-group-btn">
			                                        <button class="btn btn-number inc qtybtn" type="button" data-type="plus"';
			                                        if($items['max_qty'] !=$items['qty']){
			                                        $output .='
			                                         onclick="inc('."'".$items['rowid']."'".',this)"'; }
			                                        $output .=' >
			                                        	<i class="la la-plus"></i>
			                                        </button>
			                                    </span>
			                                </div>
			                            </td>

			                            <td class="product_total  small_product_price">
			                                <span class="new_price">'.$price_symbol.''.$item_subtotal=$this->cart->format_number($items['subtotal']+$item_tax).'</span>
			                            </td>

			                            <td class="product-remove">
			                                <a href="javascript:void(0)" onclick="remove_cart('."'".$items['rowid']."'".',this)" url="'.base_url().'" class="text-right pl-4 item_remove">
			                                    <i class="la la-trash"></i>
			                                </a>
			                            </td>
			                        </tr>';
			        }
			        if(empty($this->cart->contents())){ 
			        	$cartItem='0';
			        }else{ 
			        	$cartItem=count($this->cart->contents());
			        }
			$output .='</tbody>
				                    </table>
				                </div>
				            </div>

				            <div class="row align-items-center pt-4">
				                <div class="col-md-6">
				                    <a href="'.base_url().'" class="link link--style-3">
				                        <i class="la la-mail-reply"></i> Return to shop
				                    </a>
				                </div>
				                <!--<div class="col-md-6 text-right">
				                    <a href="" class="btn btn-styled btn-base-1">Continue to Shipping</a>
				                </div>-->
				            </div>
				        </div>
				    </div>
				                </div>

 <div class="col-md-6 col-sm-6" style="margin-top:20px ">
                <div class="card sticky-top">
                    <div class="card-title">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="heading heading-3 strong-400 mb-0">
                                    <span>Estimated Delivery Time:</span>
                                </h3>
                            </div>

                           
                        </div>
                    </div>
                     <div class="card-body">
                        <p style=" font-size: 19px; color: #c19450; font-weight: 600;">
                            
                           '.$NewDate=Date('d F', strtotime('+5 days')).' - '.$NewDate=Date('d F', strtotime('+8 days')).'</p>
                    </div>
                </div>
            </div>

				    <div class="col-md-6 col-sm-6" style="margin-top:20px ">
				        <div class="card sticky-top">
				            <div class="card-title">
				                <div class="row align-items-center">
				                    <div class="col-6">
				                        <h3 class="heading heading-3 strong-400 mb-0">
		                                    <span>Summary</span>
		                                </h3>
				                    </div>

				                    <div class="col-6 text-right">
				                        <span class="badge badge-md badge-success">'.$cartItem.' Items</span>
				                    </div>
				                </div>
				            </div>
				            <div class="card-body">
				                <table class="table-cart table-cart-review">
				                    <tfoot>
				                        <tr class="cart-subtotal">
				                            <th>Subtotal</th>
				                            <td class="text-right">
				                                <span class="strong-600">
				                                    '.$price_symbol.' '.$this->cart->format_number($total).'                                        
				                                </span>
				                            </td>
				                        </tr>';
								$gst_total=0;
								if($tax== true){
									foreach ($tax as $tax_value) {
										$gst_total +=$tax_value->txt_per*$total/100;
										$output .= '<tr class="cart-shipping">
														<th>VAT'.$tax_value->txt_name.' ('.$this->cart->format_number($tax_value->txt_per).'%)</th>
							                            <td class="text-right">
							                                <span class="text-italic">'.$price_symbol.''.$this->cart->format_number($tax_value->txt_per*$total/100).'</span>
							                            </td>
													</tr>';
							 		}
								}
						 	$output .= '<tr class="cart-total">
				                            <th><span class="strong-600">Total</span></th>
				                            <td class="text-right">
				                                <strong><span>'.$price_symbol.''.$this->cart->format_number($total+$gst_total).'</span></strong>
				                            </td>
				                        </tr>
										</tfoot>
						                </table>
						                 <br/>
                        <div class="col-md-12 text-center" >
                            <a href="" class="btn btn-styled btn-base-1">Proceed to Delivery Info</a>
                        </div>
						            </div>
						        </div>
						    </div>
						</div>';
				return $output;
			}else{
				$this->session->unset_userdata('sleeve'); 
				$output ='
						            <div class="col-xl-12">
						                <div class="form-default bg-white p-4">
						                    <div class="">
						                        <div class="">
						                            <table class="table-cart border-bottom">
						                                <thead>
						                                    <tr>
						                                        <th class="product-image"></th>
						                                        <th class="product-name">Product</th>
						                                        <th class="product-price  d-lg-table-cell">Color</th>
						                                        <th class="product-price  d-lg-table-cell">Size</th>
						                                        <th class="product-price  d-lg-table-cell">Price</th>
						                                        <th class="product-quanity  d-md-table-cell">Quantity</th>
						                                        <th class="product-total">Total</th>
						                                        <th class="product-remove"></th>
						                                    </tr>
						                                </thead>
						                                <tbody>
						                                </tbody>
						                            </table>
						                        </div>
						                    </div>

						                    <div class="row align-items-center pt-4">
						                        <div class="col-md-6">
						                            <a href="'.base_url('/').'" class="link link--style-3">
						                                <i class="la la-mail-reply"></i> Return to shop
						                            </a>
						                        </div>
						                        <div class="col-md-6 text-right">
						                            <a href="'.base_url('/').'" class="btn btn-styled btn-base-1">Continue to Shopping</a>
						                        </div>
						                     </div>
						                </div>
						            </div>

						            <div class="col-xl-5 ml-lg-auto" style="margin-top:20px ">
						                <div class="card sticky-top">
						                    <div class="card-title">
						                        <div class="row align-items-center">
						                            <div class="col-6">
						                                <h3 class="heading heading-3 strong-400 mb-0">
						                                    <span>Summary</span>
						                                </h3>
						                            </div>

						                            <div class="col-6 text-right">
						                                <span class="badge badge-md badge-success">0 Items</span>
						                            </div>
						                        </div>
						                    </div>

						                    <div class="card-body">
						                        <table class="table-cart table-cart-review">
						                            <tfoot>
						                                <tr class="cart-subtotal">
						                                    <th>Subtotal</th>
						                                    <td class="text-right">
						                                        <span class="strong-600">
						                                        ₹0.00
						                                        </span>
						                                    </td>
						                                </tr>

						                                <tr class="cart-shipping">
						                                    <th>Tax(GST-18.00%)</th>
						                                    <td class="text-right">
						                                        <span class="text-italic">₹0.00</span>
						                                    </td>
						                                </tr>

						                                <tr class="cart-total">
						                                    <th><span class="strong-600">Total</span></th>
						                                    <td class="text-right">
						                                        <strong><span>₹0.00</span></strong>
						                                    </td>
						                                </tr>
						                            </tfoot>
						                        </table>
						                    </div>
						                </div>
						            </div>
						        </div>
						    </div>
						</section>';
				return $output;
			} 
    }
 

	public function my_order()
	{  
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{
		$content['page']='3';
		$content['subview']='account/order';
		$this->load->view('layout', $content);
	    }  
	}


	public function change_password()
	{  
		if(empty($this->session->userdata('logged_in_customer'))){
			redirect('/');
		}else{			
		$content['page']='4';
		$content['subview']='account/change_password';
		$this->load->view('layout', $content);
	    }  
	}

	public function changepassword()
	{  
		
			  $RequestMethod = $this->input->server('REQUEST_METHOD');
	    if($RequestMethod == "POST") {
		   $cust_id=$this->customer->cust_id; 
		   $password=md5($this->input->post('old_password'));
		   $user_password=$this->Account->check_password($this->cust_id,$cust_id,$this->fld_password,$password,$this->table_customer);	

		   if($user_password){print_r($user_password);die();
			
			   $data=array($this->fld_password=>md5($this->input->post('new_password'))); 
			   $result = $this->Account->update($this->cust_id,$cust_id,$data,$this->table_customer);
			    // start email
			if(!empty($this->customer->cust_email)){
			$template=template(3);
			if(!empty($template)){
			$company=company_detail();				
			$login_url=base_url();
			$name=$this->customer->cust_fname.' '.$this->customer->cust_lname;
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$name,
				'new_password'=>$this->input->post('new_password'),
				'login_link'=>$login_url,
				'contact_us_url'=>$company['website_url'],
				'contact_us_email'=>$company['contact_us_email']
			 );
			 $pattern = '{%s}';
			foreach($token as $key=>$val){
				$varMap[sprintf($pattern,$key)] = $val;
			}			
            $get_msg=strtr($template->tp_body,$varMap);
		    $subject=strtr($template->tp_subject,$varMap);	
			$to=$this->customer->cust_email;
			email_send($to,$subject,$get_msg);
			}
			}
		// end email 	
			   
			   if($result){
				   echo'success';
			   }else{
				  echo "Failed";
			   }
		    }else{ echo'NotMach';   } 
		}
		
	}

	public function forgot() {	   
			
	    $REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){	
  
		$useremail=$this->input->post('for_email'); 
		$email = $this->security->xss_clean($useremail);
		$check_email =$this->Account->check_email($this->fld_email,$email,$this->table_customer);
		if($check_email){
		$password=rand(10,1000000);
		$data=array($this->fld_password=>md5($password)); 
		$result = $this->Account->update($this->fld_email,$email,$data,$this->table_customer);
			
			   // start email
			if(!empty($email)){
			$template=template(4);
			if(!empty($template)){
			$company=company_detail();				
			$login_url=base_url();
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$check_email->cust_fname.' '.$check_email->cust_lname,
				'new_password'=>$password,
				'login_link'=>$login_url,
				'contact_us_url'=>$company['website_url'],
				'contact_us_email'=>$company['contact_us_email']
			 );
			$pattern = '{%s}';
			foreach($token as $key=>$val){
				$varMap[sprintf($pattern,$key)] = $val;
			}			
            $get_msg=strtr($template->tp_body,$varMap);
		    $subject=strtr($template->tp_subject,$varMap);	
			$to=$email;
			email_send($to,$subject,$get_msg);
			}
			}
			
		// end email 	
			
			if($result){
			  echo'success';
			}else{
			   echo'Failed';
			}  	
				
			}else{
		    echo'Wrong';
			}
		}
	     
	   

	}
  
    public function singup()
	{ 	
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){			
		$cust_email=$this->input->post('email');
		$check =$this->Account->check_email($this->fld_email,$cust_email,$this->table_customer); 
			if(empty($check)){			
			    $data=array(
				'cust_fname'=>$this->input->post('fname'),
				'cust_lname'=>$this->input->post('lname'),
				'cust_email'=>$cust_email,
				'cust_phone'=>$this->input->post('phone'),
				'cust_password'=>md5($this->input->post('password')),
				'cust_status'=>'1',
				'cust_created'=>date('Y-m-d H:i:s')
				);
			$result =$this->Account->save($data, $this->table_customer); 			
			// start email
			if(!empty($cust_email)){
			$template=template(1);
			if(!empty($template)){
			$company=company_detail();				
			$url=base_url("account/verify/")."". encode($cust_email);
			$name=$this->input->post('fname').' '.$this->input->post('lname');
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$name,
				'verification_url'=>$url,
				'contact_us_url'=>$company['website_url']
			 );
			 $pattern = '{%s}';
			foreach($token as $key=>$val){
				$varMap[sprintf($pattern,$key)] = $val;
			}			
            $get_msg=strtr($template->tp_body,$varMap);
		    $subject=strtr($template->tp_subject,$varMap);	
			$to=$cust_email;             		
			email_send($to,$subject,$get_msg);
			}
			}
			// end email 			
			if($result){echo'Success';}else{ echo'Failed';}
			}
			else{
			 echo'Used';
			}
		}
		
	}

	public function verify()
	{
		$cust_email=decode($this->uri->segment(3));

		$check =$this->Account->check_email($this->fld_email,$cust_email,$this->table_customer);	

		if(empty($check->cust_EmailVerifiedStatus)){	
		if(!empty($check)){	
		$data=array(
			'cust_EmailVerifiedStatus'=>'1',
			'cust_status'=>'0',
			'cust_updated'=>date('Y-m-d H:i:s')
		); 

      // start email
			if(!empty($cust_email)){
			$template=template(8);
			if(!empty($template)){
			$company=company_detail();		
			 $token=array(
				'Company_Logo'=>$company['Company_Logo'],
				'website_url'=>$company['website_url'],
				'social_media_icons'=>$company['social_media_icons'],
				'website_name'=>$company['website_name'],
				'user_full_name'=>$check->cust_fname.' '.$check->cust_lname,			
				'contact_us_url'=>$company['website_url'],
				'contact_us_email'=>$company['contact_us_email']
			 );
			 $pattern = '{%s}';
			foreach($token as $key=>$val){
				$varMap[sprintf($pattern,$key)] = $val;
			}			
            $get_msg=strtr($template->tp_body,$varMap);
		    $subject=strtr($template->tp_subject,$varMap);	
			$to=$cust_email;             		
			email_send($to,$subject,$get_msg);
			}
			}
		// end email 		
		$result=$this->Account->update($this->fld_email,$cust_email,$data,$this->table_customer);
		
        if($result){
			   $this->session->set_flashdata('alert_msg',array('value' => '1'));
			   redirect('home'); 
			}else{
			 $this->session->set_flashdata('alert_msg',array('value' => '2'));
			   redirect('home');  
			} 
		}else{
		redirect('home'); 	
		} 
		}
        else{
	 $this->session->set_flashdata('alert_msg',array('value' => '3'));
			   redirect('home');  
		} 		
		
	}

	 public function thanks() {	
	 		$content['subview']='account/thanks';
		$this->load->view('layout', $content);
			
	}



	public function check()
	{   
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD');
		if($REQUESTMETHOD=='POST'){	
		
			$useremail=$this->input->post('email');
			$userpassword=md5($this->input->post('password'));
		    $email = $this->security->xss_clean($useremail);	
		    $password = $this->security->xss_clean($userpassword);	
			
			if(!empty($email) || !empty($password)){
				$result =$this->Account->login($email, $password,$this->table_customer); 
				if($result) {
				  if($result->cust_status=="0"){
				  	$this->session->set_userdata('logged_in_customer',$result);
					echo'success';
					} else {
					 echo'Active';
					}
				}else{
				   echo'Failed';
				}			
	
			}else{
                echo'Failed';
			} 	
		}
		
	}
	
	
	
	public function logout()
	{  
	   $this->login = $this->session->userdata('logged_in_customer');
		$this->session->unset_userdata('logged_in_customer');
		    redirect('/');
		
	}



	public function getState()
	{
		$CID = $this->input->get('CID');
		$getdata['State'] = $this->Account->get_location('st_name','st_status',$this->fld_cnt_id,$CID,$this->table_state);
		echo json_encode($getdata['State']);
	}
	
	public function getCity()
	{
		$SID = $this->input->get('SID');
		$getdata['City'] = $this->Account->get_location('ct_name','ct_status',$this->fld_st_id,$SID,$this->table_city);
		echo json_encode($getdata['City']);
	}
	public function getZip()
	{
		$CID = $this->input->get('CID');
		$getdata['Zip'] = $this->Account->get_location('zc_zipcode','zc_status',$this->fld_ct_id,$CID,$this->table_zipcode);
		echo json_encode($getdata['Zip']);
	}
	
	  


	
	
	 
	 
}
