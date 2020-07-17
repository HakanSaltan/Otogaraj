<div class="subheader py-2 py-lg-12  subheader-transparent " id="kt_subheader">
	<div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">


		<div class="d-flex align-items-center flex-wrap mr-1">

			<div class="d-flex flex-column">
                @yield('subheader')


				<div class="d-flex align-items-center font-weight-bold my-2">
                    @yield('subheaderalt')
				</div>

			</div>

		</div>

		<div class="d-flex align-items-center">

			<a href="#" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
				Rapor
			</a>
			<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
				<a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Aktivite
				</a>
				<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
					<ul class="navi navi-hover py-5">
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon"><i class="flaticon2-drop"></i></span>
								<span class="navi-text">New Group</span>
							</a>
						</li>
						<li class="navi-separator my-3"></li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon"><i class="flaticon2-magnifier-tool"></i></span>
								<span class="navi-text">Help</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
								<span class="navi-text">Privacy</span>
								<span class="navi-link-badge">
									<span class="label label-light-danger label-rounded font-weight-bold">5</span>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

