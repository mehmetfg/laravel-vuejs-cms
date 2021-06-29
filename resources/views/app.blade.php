<?php
use Illuminate\Support\Facades\Auth;
?>
        <!DOCTYPE html>
<head>
@include("meta")
<!-- begin::Head -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->


    <link href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css' rel='stylesheet' />

    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />



    <!--end::Page Vendors -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="/css/loading.css" rel="stylesheet" type="text/css" />
    <link href="/css/style.css" rel="stylesheet" type="text/css" />

    <!-- <link href="/css/animate.min.css" rel="stylesheet" type="text/css" /> -->

    <link href="/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Base Styles -->
    <link rel="shortcut icon" href="/assets/demo/default/media/img/logo/favicon.ico" />
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    @yield("css")

</head>

<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"   >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page" >
    <div id="app">
    <!-- BEGIN: Header -->
    <header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="/admin" class="m-brand__logo-wrapper">
                                <img style="width: 150px;" alt="" src="/assets/demo/default/media/img/logo/logo_default_dark2.png"/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">
                            <!-- BEGIN: Left Aside Minimize Toggle -->
                            <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Responsive Header Menu Toggler -->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Topbar Toggler -->

                            <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div>
                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                    <!-- BEGIN: Horizontal Menu -->






                    <!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-topbar__nav-wrapper">

                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                @if(Auth::user()->type>=3 )
                                <router-link :to="{ name:'add-client-appointment', params:{id:'1'}}" class="m-nav__item">
                                    <li class="m-nav__item m-topbar__quick-actions mnavid m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click" aria-expanded="true">

                                            <a class="btn btn-warning text-white" >
                                                <i class="m-menu__link-icon flaticon-calendar"></i>
                                                <span class="m-menu__link-text">
												Hızlı Randevu Oluştur
											</span>
                                            </a>

                                    </li>
                                </router-link>
							<router-link :to="{ name:'add-client', params:{id:'1'}}" class="m-nav__item">
								<li class="m-nav__item m-topbar__quick-actions mnavid m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click" aria-expanded="true">

								   <a class="btn btn-danger text-white" >
                                        <i class="m-menu__link-icon flaticon-add"></i>
                                        <span class="m-menu__link-text">
												Danışan Oluştur
											</span>
                                    </a>

                                </li>
								  </router-link>
                                @endif
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="/assets/image/user.png" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
                                        <span class="m-topbar__username m--hide">
													Nick
												</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src=" .. " class="m--img-rounded m--marginless" alt=""/>
                                                    </div>

                                                    <div class="m-card-user__details">
                                                    <span class="m-card-user__name m--font-weight-500">{{Auth::user()->name}}
                                                     </span><br>
                                                        <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                            {{Auth::user()->email}}
                                                       </a>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="m-dropdown__body">
                                               <div class="m-dropdown__content">
                                                   <ul class="m-nav m-nav--skin-light">
                                                       <li class="m-nav__section m--hide">
                                                                   <span class="m-nav__section-text">
                                                                       Section
                                                                   </span>
                                                       </li>
                                                       <router-link :to="{ name:'profile', params:{id:'<?php echo  Auth::user()->id?>'}}" class="m-menu__link ">

                                                           <a>
                                                               <i class="m-menu__link-icon flaticon-profile-1"></i>
                                                               <span class="m-menu__link-text">
							Profil
									</span>
                                                               <i></i>
                                                           </a>
                                                       </router-link>


                                                       <li class="m-nav__separator m-nav__separator--fit"></li>
                                                       <li class="m-nav__item">
                                                           <a href="/logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                             Çıkış
                                                           </a>
                                                       </li>
                                                   </ul>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </li>

                           </ul>

                       </div>
                   </div>
                   <!-- END: Topbar -->
               </div>
           </div>
       </div>
   </header>
   <!-- END: Header -->
   <!-- begin::Body -->
   <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
       <!-- BEGIN: Left Aside -->
       <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
           <i class="la la-close"></i>
       </button>
       <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
           <!-- BEGIN: Aside Menu -->
           <div
               id="m_ver_menu"
               class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
               data-menu-vertical="true"
               data-menu-scrollable="false" data-menu-dropdown-timeout="500"
           >

               <ul class="m-menu__nav   ">
                   <li class="m-menu__item " aria-haspopup="true" >

                   </li>

                   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">

                       <router-link :to="{ name:'calendar'}" class="m-menu__link ">

                           <a>
                               <i class="m-menu__link-icon fa fa-university"></i>
                               <span class="m-menu__link-text">
							Anasayfa
									</span>
                               <i></i>
                           </a>
                       </router-link>
                   </li>
                   <hr>













                   @if(Auth::user()->type>=3 )
                   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">

                       <router-link :to="{ name:'clients'}" class="m-menu__link ">

                           <a>
                               <i class="m-menu__link-icon fa 	fa-suitcase"></i>
                               <span class="m-menu__link-text">
							Danışanlar
									</span>
                               <i></i>
                           </a>
                       </router-link>
                   </li>
                   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">

                       <router-link :to="{ name:'appointment-list'}" class="m-menu__link ">

                           <a>
                               <i class="m-menu__link-icon 	fa 	fa-calendar-o "></i>
                               <span class="m-menu__link-text">
							Randevular
									</span>
                               <i></i>
                           </a>
                       </router-link>
                   </li>
                   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">

                       <router-link :to="{ name:'current-list'}" class="m-menu__link ">

                           <a>
                               <i class="m-menu__link-icon 	fa fa-money "></i>
                               <span class="m-menu__link-text">
							Cari Harketler
									</span>
                               <i></i>
                           </a>
                       </router-link>
                   </li>
                   <li class="m-menu__section">


                       <h4 class="m-menu__section-text">
                           Ayarlar
                       </h4>
                       <i class="m-menu__section-icon flaticon-more-v3"></i>
                   </li>
                   <hr>
@endif
                   @if(Auth::user()->type==1)
                   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                       <router-link :to="{ name:'dealers'}" class="m-menu__link ">

                           <a>
                               <i class="m-menu__link-icon fa fa-object-group"></i>
                               <span class="m-menu__link-text">
							Kurumlar
									</span>
                               <i></i>
                           </a>
                       </router-link>

                   </li>
                   @endif
                   @if(Auth::user()->type==2)
                   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                       <router-link :to="{ name:'users'}" class="m-menu__link ">

                           <a>
                               <i class="m-menu__link-icon fa fa-users"></i>
                               <span class="m-menu__link-text">
							Kullanıcılar
									</span>
                               <i></i>
                           </a>
                       </router-link>

                   </li>
                   @endif
                   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                       <router-link :to="{ name:'reports'}" class="m-menu__link ">

                           <a>
                               <i class="m-menu__link-icon fa fa-chart-bar"></i>
                               <span class="m-menu__link-text">
							Raporlar
									</span>
                               <i></i>
                           </a>
                       </router-link>

                   </li>

                   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                       <router-link :to="{ name:'profile', params:{id:@php echo Auth::user()->id @endphp}}" class="m-menu__link ">

                           <a>
                               <i class="m-menu__link-icon fa fa-user-secret"></i>
                               <span class="m-menu__link-text">
							Profil
									</span>
                               <i></i>
                           </a>
                       </router-link>

                   </li>
               </ul>
           </div>
           <!-- END: Aside Menu -->
       </div>
       <div class="m-grid__item m-grid__item--fluid m-wrapper">
           <!-- BEGIN: Subheader -->

           <!-- END: Subheader -->
           <div id="111">

               <script type="text/x-template" id="modal-template">
                   <transition name="modal">
                       <div class="modal-mask">
                           <div class="modal-wrapper">
                               <div class="modal-container">

                                   <div class="modal-header">
                                       <slot name="header">
                                          Girişi
                                       </slot>
                                   </div>

                                   <div class="modal-body">
                                       <slot name="body" >

                                       </slot>
                                   </div>

                                   <div class="modal-footer">
                                       <slot name="footer">
                                          Girişi
                                           <button class="modal-default-button" @click="$emit('close')">
                                               OK
                                           </button>
                                       </slot>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </transition>
               </script>

               <div class="m-content">
                       <transition  name="zoom-fade" mode="out-in" type="transition" appear>
          <router-view></router-view>
                   </transition>
           </div>

           </div>
       </div>
   </div>
   <!-- end:: Body -->
   <!-- begin::Footer -->
   <footer class="m-grid__item		m-footer ">
       <div class="m-container m-container--fluid m-container--full-height m-page__container">
           <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
               <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                           <span class="m-footer__copyright">
                               2019 &copy;  onlinesoft.net  MFG
                               <a href="#" class="m-link">

                               </a>
                           </span>
               </div>
               <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                   <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                       <li class="m-nav__item">
                           <a href="#" class="m-nav__link">
                                       <span class="m-nav__link-text">

                                       </span>
                           </a>
                       </li>

                       <li class="m-nav__item m-nav__item">
                           <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
                               <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
       </div>
   </footer>

   <!-- end::Footer -->
</div>

</div><!-- end:: Page -->
<!-- begin::Quick Sidebar -->

<!-- end::Quick Sidebar -->
<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
   <i class="la la-arrow-up"></i>
</div>
<div class="modal  fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">

</div>
<!-- end::Scroll Top -->		    <!-- begin::Quick Nav -->

<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="{{asset("js/app.js")}}"></script>
<script src="/assets/demo/default/custom/components/base/jquery.min.js" type="text/javascript"></script>
<script src="/assets/demo/default/custom/components/base/sweetalert2.js" type="text/javascript"></script>

<script src="/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
   <script src="/js/ajax.js" type="text/javascript"></script>
<script src="/js/custom.js" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->

<!--begin::Page Snippets -->
<script src="/assets/app/js/dashboard.js" type="text/javascript"></script>

<script>
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   $(document).ready(function()
   {


       $('#clickmewow').click(function()
       {
           $('#radio1003').attr('checked', 'checked');
       });
   })

</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@yield("js")


<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>

<?php



if(session("success")){

?>

<script>
    swal({
        position: 'center',
        type: 'success',
        title: 'İşlem Başarılı',
        text: '{{session("success")}}',
        showConfirmButton: false,
        timer: 1500
    })

</script>

<?php } if(session("error")) { ?>

<script>
    swal({
        position: 'left',
        type: 'error',
        title: 'İşlem Başarısız',
        text: '{{session("error")}}',
        showConfirmButton: false,
        timer: 1500
    })
</script>

<?php
} ?>
<script>

    @if(intval(session("credit"))<=0)
    $(".remove-ower").hide();
    $(".message-alert").show();
    @else
    $(".remove-ower").show();
    $(".message-alert").hide();
    @endif
</script>
