
	<!--begin::Profile Card-->
	@role('uye')
	<div class="card card-custom card-stretch">
		<!--begin::Body-->
		<div class="card-body pt-4">
			<!--begin::User-->
			<div class="d-flex align-items-center">
				<div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
				<div class="symbol-label" style="background-image:url('{{URL::asset('assets/media/users/300_21.jpg')}}')"></div>
					<i class="symbol-badge bg-success"></i>
				</div>
				<div>
				<a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">Kullanıcı Adı</a>

				</div>
			</div>
			<!--end::User-->
			<!--begin::Contact-->
			<div class="py-9">
				<div class="d-flex align-items-center justify-content-between mb-2">
					<span class="font-weight-bold mr-2">Mail Adresi:</span>
					<a href="#" class="text-muted text-hover-primary">Mail Adresi</a>
				</div>
				<div class="d-flex align-items-center justify-content-between mb-2">
					<span class="font-weight-bold mr-2">Telefon:</span>
					<span class="text-muted">+90</span>
				</div>
				<div class="d-flex align-items-center justify-content-between">
					<span class="font-weight-bold mr-2">Uygulama Dili:</span>
					<span class="text-muted">Türkçe</span>
				</div>
			</div>
			<!--end::Contact-->
			<!--begin::Nav-->
			<div class="navi navi-bold navi-hover navi-active navi-link-rounded">
				<div class="navi-item mb-2" v-on:click="goster('hesap')">
					<a href="javascript:;" class="navi-link py-4" v-bind:class="{active:genelAyarlar}">
						<span class="navi-icon mr-2">
							<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo2/dist/../src/media/svg/icons/Communication/Shield-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                            <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
                                            <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                            </span>
						</span>
						<span class="navi-text font-size-lg">Hesap Ayarları</span>
					</a>
				</div>
                <div class="navi-item mb-2" v-on:click="goster('isyeri')">
                    <a href="javascript:;" class="navi-link py-4" v-bind:class="{active:isYeriAyarlar}">
						<span class="navi-icon mr-2">
							<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo2/dist/../src/media/svg/icons/General/Clipboard.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            </span>
						</span>
                        <span class="navi-text font-size-lg">İşyeri Ayarları</span>
                    </a>
                </div>
                <div class="navi-item mb-2" v-on:click="goster('abonelik')">
                    <a href="javascript:;" class="navi-link py-4" v-bind:class="{active:abonelikBilgileri}">
						<span class="navi-icon mr-2">
							<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Wallet2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2"/>
                                        <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon-->
                            </span>
						</span>
                        <span class="navi-text font-size-lg">Abonelik Bilgileri</span>
                    </a>
                </div>
                <div class="navi-item mb-2" v-on:click="goster('finans')">
                    <a href="javascript:;" class="navi-link py-4" v-bind:class="{active:finansalVeri}">
						<span class="navi-icon mr-2">
							<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Barcode.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M13,5 L15,5 L15,20 L13,20 L13,5 Z M5,5 L5,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,6 C2,5.44771525 2.44771525,5 3,5 L5,5 Z M16,5 L18,5 L18,20 L16,20 L16,5 Z M20,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,19 C22,19.5522847 21.5522847,20 21,20 L20,20 L20,5 Z" fill="#000000"/>
                                        <polygon fill="#000000" opacity="0.3" points="9 5 9 20 7 20 7 5"/>
                                    </g>
                                </svg><!--end::Svg Icon-->
                            </span>
						</span>
                        <span class="navi-text font-size-lg">Finansal Veriler</span>
                    </a>
                </div>
			</div>
			<!--end::Nav-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::Profile Card-->
	@endrole
