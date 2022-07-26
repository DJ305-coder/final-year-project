	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar scrollbar" id="style-7">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu" data-widget="tree">
				<!-- Dashboard start-->
				<li class="s_meun dashboard_active active">
					<a href="{{route('dashboard')}}">
						<i class="fa fa-dashboard"></i> <span>Dashboard</span>
					</a>
				</li>
				<!-- Dashboard end-->

				<!-- Master start-->
				<li class="treeview s_meun master_active ">
					<a href="#">
						<i class="fa fa-table" aria-hidden="true"></i> <span>Master</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="s_meun master_country_active"><a href="{{ url('country') }}"><i class="fa fa-globe"></i>Country</a></li>
						<li class="s_meun master_state_active"><a href="{{url('states') }}"><i class="fa fa-map"></i>State</a></li>
						<li class="s_meun master_city_active"><a href="{{url('city') }}"><i class="fa fa-building"></i>City</a></li>
						<li class="s_meun master_area_active"><a href="{{url('area') }}"><i class="fa fa-building-o"></i>Area</a></li>
						
						<li class="s_meun master_online_shopping_main_category_active"><a href="{{url('online-shopping-main-category') }}"><i class="fa fa-podcast "></i> Online Main Category</a></li>						
						<li class="s_meun welcome_banner_slider_active"><a href="{{url('sliders') }}"><i class="fa fa-google-wallet"></i> Welcome Screen Sliders</a></li>
					</ul>
				</li>
			
				<!-- order section -->
				<li class="treeview s_meun orders_active ">
					<a href="#">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Orders</span>
					</a>
				</li>
				<li class="s_meun cms_active">
					<a href="{{url('cms') }}">
						<i class="fa fa-pencil-square-o"></i> <span>Content Management</span>
					</a>
				</li>

				<li class="s_meun delivery_agent_active">
					<a href="{{url('business-list')}}">
						<i class="fa fa-shopping-bag"></i> <span>Business List</span>
					</a>
				</li>

		


				<!-- registered_users start-->
				<li class="s_meun registered_users_active">
					<a href="{{url('registered-users-list')}}"> <i class="fa fa-user-o"></i> <span>Registered User List</span></a>
				</li>
				<!-- registered_users end-->

				<!--Settings start-->
				<li class="treeview s_meun settings_active ">
					<a href="#">
						<i class="fa fa-cog" aria-hidden="true"></i> <span>Settings</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="s_meun general_settings_active"><a href="{{url('general-settings/contact-settings') }}"><i class="fa fa-sliders"></i> General Settings</a></li>
						<li class="s_meun email_settings_active"><a href="{{url('email-settings') }}"><i class="fa fa-envelope" aria-hidden="true"></i> E-mail Settings</a></li>
						<li class="s_meun visual_settings_active"><a href="{{url('visual-settings') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i> Visual Settings</a></li>
					
						<li class="s_meun change_password_active"><a href="{{url('change-password') }}"><i class="fa fa-key"></i> Change Password</a></li>
						<li class="s_meun logout_active"><a href="{{url('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
					</ul>
				</li>
				<!--Settings end-->
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>