<div class="app-content">
   <div class="section">
      <!--  Page-header opened -->
      <div class="page-header">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>"><i class="fe fe-home mr-1"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Blogs</li>
         </ol>
         <div class="mt-3 mt-lg-0">
            <div class="d-flex align-items-center flex-wrap text-nowrap"> 
               <button type="button" onclick="history.go(-1)" class="btn btn-secondary btn-icon-text mr-2 mb-2 mb-md-0"> <i class="fa fa-arrow-left"></i> Go Back  </button>
            </div>
         </div>
      </div>
      <!--  Page-header closed -->
      <!-- row opened -->
      <div class="row" id="user-profile">
         <div class="col-lg-12">
            <div class="card">
              <div class="page">
                <!-- PAGE-CONTENT OPEN --> 
                <div class="page-content error-page">
                  <div class="container text-center">
                    <img src="<?php echo site_url('assets/images/svg/error.svg');?>" alt="error" class="w-50 floating"> 
                    <h1 class="h2 mt-4 mb-5">Oops! record not found</h1>
                    <a class="btn btn-outline-primary" href="<?php echo site_url('/');?>"> Back To Home </a> 
                  </div>
                </div>
                <!-- PAGE-CONTENT OPEN CLOSED --> 
              </div>
            </div>
         </div>
         <!-- col end --> 
      </div>
      <!-- row closed -->
   </div>
</div>