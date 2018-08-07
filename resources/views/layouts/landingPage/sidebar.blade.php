            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
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
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
				<!-- eksekutif -->
					@if(Auth::user()->level==1)
					<li class="@yield('dashboard')">
						<a href="{{ route('home') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="@yield('user')">
						<a href="{{ route('user.index') }}">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> User </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="@yield('neraca')">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-balance-scale"></i>
							<span class="menu-text">
								Neraca
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="tables.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Neraca Indonesia
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jqgrid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Neraca Jateng
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>
					<li class="@yield('rekap')">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
							Rekap Data Export
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Komoditi
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="top-menu.html">
											<i class="menu-icon fa fa-archive"></i>
											Komoditi Utama
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-1.html">
											<i class="menu-icon fa fa-archive"></i>
											Komoditi Sektor
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-2.html">
											<i class="menu-icon fa fa-archive"></i>
											Komoditi Jenis
										</a>

										<b class="arrow"></b>
									</li>
									
								</ul>
							</li>
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Negara
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="top-menu.html">
											<i class="menu-icon fa fa-flag"></i>
											Negara Utama
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-1.html">
											<i class="menu-icon fa fa-flag"></i>
											Negara Tujuan
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-2.html">
											<i class="menu-icon fa fa-flag"></i>
											Negara Kawasan Pasar
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
							<li class="">
								<a href="adsa">
									<i class="menu-icon fa fa-caret-right"></i>
									pelabuhan
								</a>
							</li>
						</ul>
					</li>
				<!-- end eksekutif -->

				<!-- admin -->
					@elseif(Auth::user()->level==2)
					<li class="@yield('dashboard')">
						<a href="{{ route('home') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="@yield('komoditi')">
						<a href="{{ route('komoditi.index') }}">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Komoditi </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="@yield('komoditi-utama')">
						<a href="{{ route('komoditi.utama.index') }}">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Komoditi Utama </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="@yield('komoditi-sektor')">
						<a href="#">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Komoditi Sektor </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="@yield('negara')">
						<a href="{{ route('negara.index') }}">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Negara </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="@yield('negara-utama')">
						<a href="{{ route('negara.utama.index') }}">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Negara Utama </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="@yield('negara-kawasan')">
						<a href="{{ route('negara.kawasan.index') }}">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Negara Kawasan </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="@yield('pelabuhan')">
						<a href="{{ route('pelabuhan.index') }}">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Pelabuhan </span>
						</a>

						<b class="arrow"></b>
					</li>	
				<!-- end admin -->
					@else
						<li>No access</li>
					@endif
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>