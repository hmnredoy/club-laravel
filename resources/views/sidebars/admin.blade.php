<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CMS - @yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 
    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/css/fontawesome.css')}}" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="{{asset('assets/css/basic.css')}}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />

     <link href="{{asset('css/bootstrap_custom.css')}}" rel="stylesheet" />

   
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  
    <!--Custom-->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" />

</head>
<body>

 <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <p class="navbar-brand">
                   Club Management System
                </p>
            </div>

            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bell fa-2x"></i></a>
                <a href="{{route('logout')}}" class="btn btn-danger" title="Logout"><i class="fa fa-times fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="{{asset('assets/img/user.png')}}" class="img-thumbnail" />

                            <div class="inner-text">
                                {{ Session::get('userInfo')->name }}
                            <br />
                                <small>Last Login : {{ Session::get('loggedin') }}</small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="/home"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i>Clubs <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">

                            <li>
                                <a href="panel-tabs.html"><i class="fa fa-plus-circle"></i>Add Club</a>
                            </li>
                            <li>
                                <a href="notification.html"><i class="fa fa-cog"></i>Manage Existing Clubs</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-user-circle"></i>Members <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('member')}}"><i class="fa fa-user-plus"></i>New Members</a>
                            </li>
                            <li>
                                <a href="/member/all"><i class="fa fa-users "></i>All Members</a>
                            </li>
                             <li>
                                <a href="component.html"><i class="fa fa-user-times"></i>Inactive Members</a>
                            </li>
                             <li>
                                <a href="social.html"><i class="fa fa-id-card-o"></i>Manage Moderators</a>
                            </li>
                            
                             <li>
                                <a href="message-task.html"><i class="fa fa-recycle "></i>Messages & Tasks</a>
                            </li>
                            
                           
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list-alt"></i>Events  <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href=""><i class="fa fa-plus-circle"></i>Add Event</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-plus-circle"></i>Manage Events</a>
                            </li>
                        </ul>
                        
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-paste"></i>Notices <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href="form.html"><i class="fa fa-desktop "></i>Post Notice </a>
                            </li>
                             <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>Manage Notices</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="gallery.html"><i class="fa fa-film"></i>Connect</a>
                    </li>
                    <li>
                        <a href="gallery.html"><i class="fa fa-film"></i>Gallery</a>
                    </li>
                     <li>
                        <a href="error.html"><i class="fa fa-bug "></i>Reports and Complaints</a>
                    </li>
                    <li>
                        <a href="login.html"><i class="fa fa-sign-in "></i>Login Page</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!--Right Sidebar Starts-->

        @yield('rightbar')

    
        <!--Right Sidebar Ends-->


        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2019 Club Management System | Developed By : <a href="http://www.facebook.com/hmnredoy" target="_blank">N Zaman Redoy</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script src="{{asset('js/time.js')}}"></script>
    



</body>
</html>

