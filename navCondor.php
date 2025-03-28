<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>navbar &amp; sidebar</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div data-component="navbar">

<nav class="navbar p-0 fixed-top">
      <button class="navbar-toggler navbar-toggler-left rounded-0 border-0" type="button" data-toggle="collapse" data-target="#megamenu-dropdown" aria-controls="megamenu-dropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i><span class="ml-3">Advanced</span>
      </button>
  
  <div><a class="navbar-brand px-1" href="#"><img src="img\air_france_logo.svg" class="d-inline-block mt-1" alt="Air France Logo" height="50"></a>

  <div class="right-links float-right mr-4">
  <?php echo($_SESSION['USER_EMAIL']); ?>
    <a href="#" class="home"><i class="fa fa-home mr-3"></i></a>
    
    <div class="d-inline dropdown rounded-0 mx-3">
      <a class="dropdown-toggle" id="tools" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-wrench" aria-hidden="true"></i></a>
      <div class="dropdown-menu dropdown-menu-right rounded-0 text-center" aria-labelledby="tools">
        <a class="dropdown-item px-2" href="#">Recompile CSS</a>
      </div>
    </div> <!-- /.dropdown -->
    
    <div class="d-inline dropdown mr-3">
      <a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>10</span><i class="fa fa-bell"></i></a>
      <div class="dropdown-menu dropdown-menu-right rounded-0 pt-0" aria-labelledby="notifications">
        <div class="list-group">
          <div class="lg">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
              <h5 class="mb-1">Real Estate Marketing Automation: 6 Simple Systems</h5>
              <p class="mb-0">17 October 2016 | 9:32 pm</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
              <h5 class="mb-1">How to Generate Seller Leads For $0.88 Using...</h5>
              <p class="mb-0">3 October 2016 | 9:58 pm</p>
            </a>
          </div> <!-- /.lg -->
        </div> <!-- /.list group -->
      </div> <!-- /.dropdown-menu -->
    </div> <!-- /.dropdown -->
    
    <div class="d-inline dropdown mr-3">
      <a class="dropdown-toggle" id="messages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-envelope"></i></a>
      <div class="dropdown-menu dropdown-menu-right rounded-0 text-center" aria-labelledby="messages">
        <a class="dropdown-item">There are no new messages</a>
      </div> <!-- /.dropdown-menu -->
  </div> <!-- /.dropdown -->
    
    
    <div class="d-inline dropdown">
      <a class="dropdown-toggle" id="messages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
        <img src="http://1.gravatar.com/avatar/47db31bd2e0b161008607d84c74305b5?s=96&d=mm&r=g">
      </a>
      <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="messages">
        <!--<a class="dropdown-item" href="#">Edit my profile</a>-->
        <a class="dropdown-item" href="deconnection_php.php">Se déconnecter</a>
      </div> <!-- /.dropdown-menu -->
    </div> <!-- /.dropdown -->
    
  </div> <!-- /.right-links -->
  
  </div>
  
  
  
  
  
  
  
  
  
  
  
  <div class="megamenu">
        <div class="collapse navbar-collapse" id="megamenu-dropdown">
        <div class="megamenu-links">
      <div class="row">
        <div class="col-md-3 px-0">
          <a class="btn rounded-0 border-0 d-flex w-100 justify-content-between p-3 pl-5" data-toggle="collapse" href="#menuOne" aria-expanded="false" aria-controls="collapseExample" id="more">Slider Revolution
            <i class="fa fa-minus float-right" aria-hidden="true"></i>
            <i class="fa fa-plus float-right" aria-hidden="true"></i>
          </a> <!-- button close -->
          <div class="collapse" id="menuOne">
            <div class="list-group border-0">
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Slider Revolution</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Navigation Editor</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Add-Ons</a>
            </div> <!-- /.list-group -->
          </div><!-- /.collapse -->
        </div> <!-- /.col-md-3 -->
        
        <div class="col-md-3 px-0">
          <a class="btn rounded-0 border-0 d-flex w-100 justify-content-between p-3" data-toggle="collapse" href="#menuTwo" aria-expanded="false" aria-controls="collapseExample" id="more">Flyouts
            <i class="fa fa-minus float-right" aria-hidden="true"></i>
            <i class="fa fa-plus float-right" aria-hidden="true"></i>
          </a> <!-- button close -->
          <div class="collapse" id="menuTwo">
            <div class="list-group border-0">
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">All Flyouts</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Add new Flyout</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Re-Order</a>
            </div> <!-- /.list-group -->
          </div><!-- /.collapse -->
        </div> <!-- /.col-md-3 -->
        <div class="col-md-3 px-0">
          <a class="btn rounded-0 border-0 d-flex w-100 justify-content-between p-3" data-toggle="collapse" href="#menuThree" aria-expanded="false" aria-controls="collapseExample" id="more">Cornerstone 
            <i class="fa fa-minus float-right" aria-hidden="true"></i>
            <i class="fa fa-plus float-right" aria-hidden="true"></i>
          </a> <!-- button close -->
          <div class="collapse" id="menuThree">
            <div class="list-group border-0">
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Cornerstone</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Cornerstone</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Cornerstone</a>
            </div> <!-- /.list-group -->
          </div><!-- /.collapse -->
        </div> <!-- /.col-md-3 -->
      </div> <!-- /.row -->
          <div class="row">
            <div class="col-md-3 px-0">
          <a class="btn rounded-0 border-0 d-flex w-100 justify-content-between p-3 pl-5" data-toggle="collapse" href="#menuFour" aria-expanded="false" aria-controls="collapseExample" id="more">Ess. Grid
            <i class="fa fa-minus float-right" aria-hidden="true"></i>
            <i class="fa fa-plus float-right" aria-hidden="true"></i>
          </a> <!-- button close -->
          <div class="collapse" id="menuFour">
            <div class="list-group border-0">
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Essential Grid</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Item Skin Editor</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Meta Data Handling</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Search Settings</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Global Settings</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Import/Export</a>
            </div> <!-- /.list-group -->
          </div><!-- /.collapse -->
        </div> <!-- /.col-md-3 -->
            <div class="col-md-3 px-0">
          <a class="btn rounded-0 border-0 d-flex w-100 justify-content-between p-3" data-toggle="collapse" href="#menuFive" aria-expanded="false" aria-controls="collapseExample" id="more">AgentFire CTA Plus
            <i class="fa fa-minus float-right" aria-hidden="true"></i>
            <i class="fa fa-plus float-right" aria-hidden="true"></i>
          </a> <!-- button close -->
          <div class="collapse" id="menuFive">
            <div class="list-group border-0">
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Essential Grid</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Item Skin Editor</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Meta Data Handling</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Search Settings</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Global Settings</a>
              <a href="#" class="list-group-item list-group-item-action border-0 pl-4 py-3">Import/Export</a>
            </div> <!-- /.list-group -->
          </div><!-- /.collapse -->
        </div> <!-- /.col-md-3 -->
          </div>
    </div> <!-- /.megamenu-links -->
      </div></div>
</nav>
</div> <!-- END TOP NAVBAR -->



<div data-component="sidebar">
  <div class="sidebar">
  <ul class="list-group flex-column d-inline-block first-menu">
    <li class="list-group-item pl-3 py-2">
      <a href="#"><i class="fa fa-user-o" aria-hidden="true"><span class="ml-2 align-middle">BT</span></i></a>
      
      <ul class="list-group flex-column d-inline-block submenu">
        <li class="list-group-item pl-4">
          <a href="https://app.powerbi.com/view?r=eyJrIjoiMWQ5NDc5NzMtNDM1My00ZDViLTg4MmUtYzAzMTNjODQ4MjExIiwidCI6IjEwZTg0NTRmLWEzZTYtNDI1ZC1iMjQwLTA4ZTA0YzVhNDA1YiIsImMiOjl9" target="iframeCondor" class="">Tableau de bord</a>
          
          <!--<ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow"></span>
            <li class="list-group-item pl-4">
              <a href="#">Home</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">My Sites</a>
            </li>
          </ul>-->
          
        </li> 
        
        <li class="list-group-item pl-4">
          <a href="001_frm_workpackBT/001_frm_workpackBT.php" target="iframeCondor">Atlas</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:113px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">Dashboard</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Titles & Metas</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Social</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">XML Sitemaps</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Advanced</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Tools</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Search Console</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Go Premium</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Manual</a>
            </li>
          </ul>
        
        </li>
      </ul> <!-- /.submenu --> 
    </li> <!-- /.list-group-item -->
    
    <li class="list-group-item pl-3 py-2">
      <a href="#"><i class="fa fa-user-o" aria-hidden="true"><span class="ml-2 align-middle">MTVK</span></i></a>
      <ul class="list-group flex-column d-inline-block submenu">
        <li class="list-group-item pl-4">
          <a href="#" class="">Posts</a>
        
        <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow"></span>
            <li class="list-group-item pl-4">
              <a href="#">All Posts</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New</a>
            </li>
          <li class="list-group-item pl-4">
              <a href="#">Categories</a>
            </li>
          <li class="list-group-item pl-4">
              <a href="#">Tags</a>
            </li>
          </ul>
        </li> <!-- end Posts -->
        
        <li class="list-group-item pl-4">
          <a href="#" class="">Blog Assist</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:114px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">Add New Blog Post</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Feed Sources</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New Feed Source</a>
            </li>
          </ul>
        </li> <!-- end Blog Assist -->
        
        
        <li class="list-group-item pl-4">
          <a href="#" class="">Pages</a>
        
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:166px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">All Pages</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New</a>
            </li>
          </ul>
        </li> <!-- end Pages -->
        
        
        <li class="list-group-item pl-4">
          <a href="#" class="">Area Content</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:220px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">All Cities</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New City</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">All Neighborhoods</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New Neighborhood</a>
            </li>
          </ul>
        </li> <!-- end Area Content -->
        
        
        <li class="list-group-item pl-4">
          <a href="#" class="">Manual Listings</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:272px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">View All Listings</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New Listing</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Status</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Locations</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Property Types</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Import Listing</a>
            </li>
          </ul>
        </li> <!-- end Manual Listings -->
        
        <li class="list-group-item pl-4">
          <a href="#" class="">Testimonials</a>
        
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:323px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">View All</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Categories</a>
            </li>
          </ul>
        </li> <!-- end Testimonials -->
        
        <li class="list-group-item pl-4">
          <a href="#" class="">Team Members</a>
        
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:377px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">All Members</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New Member</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Designations</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Specialties</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Areas</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">All Locations</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New Location</a>
            </li>
          </ul>
        </li> <!-- end Team Members -->
      
      </ul> <!-- /.submenu -->
    </li> <!-- /.list-group-item -->
    
    <li class="list-group-item pl-3 py-2">
      <a href="#">
        <i class="fa fa-user-o" aria-hidden="true"><span class="ml-2 align-middle">Engagement</span></i>
      </a>
      <ul class="list-group flex-column d-inline-block submenu">
        
        <li class="list-group-item pl-4">
          <a href="#" class="">Comments</a>
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow"></span>
            <li class="list-group-item pl-4">
              <a href="#">Comments</a>
            </li>
          </ul>
        </li>
        
        <li class="list-group-item pl-4">
          <a href="#" class="">Forms</a>
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:114px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">All Forms</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">New Form</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">All Entries</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Gravity Forms</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Import/Export</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Gravity Forms Tutorials</a>
            </li>
          </ul>
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">Home Valuation</a>
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:166px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">View All Leads</a>
            </li>
          </ul>
        </li>
      </ul> <!-- /.submenu -->
    </li> <!-- /.list-group-item -->
    
    
    <li class="list-group-item pl-3 py-2">
      <a href="#"><i class="fa fa-user-o" aria-hidden="true"><span class="ml-2 align-middle">Image Center</span></i></a>
      
      <ul class="list-group flex-column d-inline-block submenu">
        <li class="list-group-item pl-4">
          <a href="#" class="">Media Library</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow"></span>
            <li class="list-group-item pl-4">
              <a href="#">Media Library</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New</a>
            </li>
          </ul>
          
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">Soliloquy Slider</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:114px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">All Sliders</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New</a>
            </li>
          </ul>
        
        </li>
      </ul>
    </li>
    
    <li class="list-group-item pl-3 py-2">
      <a href="#"><i class="fa fa-user-o" aria-hidden="true"><span class="ml-2 align-middle">Settings</span></i></a>
      <ul class="list-group flex-column d-inline-block submenu">
        <li class="list-group-item pl-4">
          <a href="#" class="">Users</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow"></span>
            <li class="list-group-item pl-4">
              <a href="#">All Users</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Add New</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Your Profile</a>
            </li>
          </ul>
        
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">AgentFire Settings</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:114px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">Home Valuation</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Testimonials</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Team Members</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Area Content</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Manual Listings</a>
            </li>
          </ul>
        
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">Grids Settings</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:166px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">Ess. Grid Search Settings</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Ess. Grid Global Settings</a>
            </li>
          </ul>
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">Plugin Settings</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:220px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">Soliloquy</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Flickr - Pick a Picture</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Google Analytics</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Google Maps</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">JackBox</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Media</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">No Page Comment</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Post Types Order</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Shortcode any widget</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">WP RSS Images</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">SNAP</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">WP Sitemap Page</a>
            </li>
          </ul>
        
        
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">WordPress Settings</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:272px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">General</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Discussion</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Reading</a>
            </li>
          </ul>
        
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">Re-Order</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:323px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">Posts</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Pages</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Media Library</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Blog Assist</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Area Content</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Manual Listings</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Testimonials</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Team Members</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Flyouts</a>
            </li>
          </ul>
        
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">Site Appearance</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:377px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">Widgets</a>
            </li>
            <li class="list-group-item pl-4">
              <a href="#">Menus</a>
            </li>
          </ul>
        
        </li>
      </ul>
    
    </li>
    
    <li class="list-group-item pl-3 py-2">
      <a href="#"><i class="fa fa-user-o" aria-hidden="true"><span class="ml-2 align-middle">Support</span></i></a>
      <ul class="list-group flex-column d-inline-block submenu">
        <li class="list-group-item pl-4">
          <a href="#" class="">Training</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow"></span>
            <li class="list-group-item pl-4">
              <a href="#">Video Tutorials</a>
            </li>
          </ul>
        
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">Tutorials</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:114px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">Help Desk</a>
            </li>
          </ul>
        
        </li>
        <li class="list-group-item pl-4">
          <a href="#" class="">Ask a Question</a>
          
          <ul class="list-group flex-column d-inline-block sub-submenu">
            <span class="arrow" style="top:166px;"></span>
            <li class="list-group-item pl-4">
              <a href="#">Send Support Request</a>
            </li>
          </ul>
        
        </li>
      </ul>
    
    </li>
    
    
  </ul> <!-- /.first-menu -->
</div> <!-- /.sidebar -->
</div>

<div class="wp-content">
  <div class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
    <!-- CONTENT GOES HERE -->
	<iframe name="iframeCondor" src="img/air_france_logo.svg" style="position: fixed; width: 100%;height: 100%;"> </iframe>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script>
</body>
</html>
