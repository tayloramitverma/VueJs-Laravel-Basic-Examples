			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<div id="sidebar" class="sidebar bresponsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>
						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>
						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>
					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
						<span class="btn btn-info"></span>
						<span class="btn btn-warning"></span>
						<span class="btn btn-danger"></span>
					</div>
				</div>
				<ul class="nav nav-list">
					<li class="">
						<a href="{{ url('/dashboard') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								User
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="{{ url('/User') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									New
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ url('/User/list_user') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									List
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Sites </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="{{ url('/Site/') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									New
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ url('/Site/list_site/') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									List
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Material Unit </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="{{ url('/Materialunit/') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									New
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ url('/Materialunit/list_material_unit') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									List
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Category </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="{{ url('/Category/') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									New
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ url('/Category/list_category') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									List
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Item </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="{{ url('/Item/') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									New
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ url('/Item/list_item') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									List
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Vendor </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="{{ url('/Vendor/') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									New
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ url('/Vendor/list_vendor') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									List
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> MR </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="{{ url('/Mr/') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									New
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{ url('/Mr/list_mr') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									List
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>