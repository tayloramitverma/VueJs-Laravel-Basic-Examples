<!DOCTYPE html>
<html lang="en">
@include("head",["title"=>$title])
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Ace Admin
						</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">Welcome</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
		<div class="main-container ace-save-state" id="main-container">
		@include("sidebar")
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Other Pages</a>
							</li>
							<li class="active">Blank Page</li>
						</ul><!-- /.breadcrumb -->
					</div>
					<div class="page-content">

								<!-- PAGE CONTENT BEGINS -->
{{{ $view_name }}}
<br>
@include($view_name)
								<!-- PAGE CONTENT ENDS -->

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		@include("footer")
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<!-- basic scripts -->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<!-- page specific plugin scripts -->
		<!-- ace scripts -->
		<script src="{{ asset('js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('js/ace.min.js') }}"></script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
	$(".multiselectbox").select2({});
	initAllSiteMultiselect();
	initAllMaterialMultiselect();
	initAllMaterialUnitMultiselect();

	function initAllMaterialUnitMultiselect()
	{
		$(".allmaterialunitmultiselect").select2({
		  ajax: {
		      url: "/Materialunit/get_all_materialunits",
		      dataType: 'json',
		      delay: 250,
		      data: function (params) {
		          return {
		              q: params.term
		          };
		      },
		    results: function(data, page) {
		      return {
		        results: data
		      };
		    }
		  },
		  minimumInputLength: 3,
		  placeholder : "Select Item Unit"
		});		
	}
	function initAllMaterialMultiselect()
	{
		$(".allmaterialmultiselect").select2({
		  ajax: {
		      url: "/Item/get_all_materials",
		      dataType: 'json',
		      delay: 250,
		      data: function (params) {
		          return {
		              q: params.term
		          };
		      },
		    results: function(data, page) {
		      return {
		        results: data
		      };
		    }
		  },
		  minimumInputLength: 3,
		  placeholder : "Select Material"
		});		
	}

	function initAllSiteMultiselect()
	{
		$(".allsitemultiselect").select2({
		  ajax: {
		      url: "/Site/get_all_sites",
		      dataType: 'json',
		      delay: 250,
		      data: function (params) {
		          return {
		              q: params.term
		          };
		      },
		    results: function(data, page) {
		      return {
		        results: data
		      };
		    }
		  },
		  minimumInputLength: 3,
		  placeholder : "Select Site"
		});		
	}
</script>
	</body>
</html>