<section class="gry-bg py-4 profile">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="sidebar sidebar--style-3 no-border stickyfill p-0">
                    <div class="widget mb-0">
                        <div class="widget-profile-box text-center p-3">
                            <div class="image" style="background-image:url('#/public/uploads/users/Sig1AulqoyXBj05Xk5KZPEgtQhi3fb71NMKyvWcK.jpeg')"></div>
                            <div class="name">Mr. Demo Customer</div>
                        </div>
                        <div class="sidebar-widget-title py-3">
                            <span>Menu</span>
                        </div>
                        <div class="widget-profile-menu py-3">
                            <ul class="categories categories--style-3">
                                <li>
                                    <a href="#/dashboard" class="">
                                        <i class="la la-dashboard"></i>
                                        <span class="category-name">
                            Dashboard
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#/purchase_history" class="">
                                        <i class="la la-file-text"></i>
                                        <span class="category-name">
                            Purchase History <span class="ml-2" style="color:green"><strong>(New Notifications)</strong></span> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#/wishlists" class="">
                                        <i class="la la-heart-o"></i>
                                        <span class="category-name">
                            Wishlist
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#/conversations" class="">
                                        <i class="la la-comment"></i>
                                        <span class="category-name">
                                Conversations
                                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#/profile" class="">
                                        <i class="la la-user"></i>
                                        <span class="category-name">
                            Manage Profile
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#/wallet" class="active">
                                        <i class="la la-dollar"></i>
                                        <span class="category-name">
                                My Wallet
                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#/support_ticket" class="">
                                        <i class="la la-support"></i>
                                        <span class="category-name">
                            Support Ticket                         </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-seller-btn pt-4">
                            <a href="#/shops/create" class="btn btn-anim-primary w-100">Be A Seller</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="main-content">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12 d-flex align-items-center">
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        My Wallet
                                    </h2>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#/dashboard">Dashboard</a></li>
                                        <li class="active"><a href="#/wallet">My Wallet</a></li>
                                    </ul>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                            <div class="dashboard-widget text-center green-widget text-white mt-4 c-pointer">
                                <i class="fa fa-dollar"></i>
                                <span class="d-block title heading-3 strong-400">$0.00</span>
                                <span class="d-block sub-title">Wallet Balance</span>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-widget text-center plus-widget mt-4 c-pointer" onclick="show_wallet_modal()">
                                <i class="la la-plus"></i>
                                <span class="d-block title heading-6 strong-400 c-base-1">Recharge Wallet</span>
                            </div>
                        </div>
                    </div>

                    <div class="card no-border mt-5">
                        <div class="card-header py-3">
                            <h4 class="mb-0 h6">Wallet recharge history</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-responsive-md mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center pt-5 h4" colspan="100%">
                                            <i class="la la-meh-o d-block heading-1 alpha-5"></i>
                                            <span class="d-block">No history found.</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pagination-wrapper py-4">
                        <ul class="pagination justify-content-end">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>