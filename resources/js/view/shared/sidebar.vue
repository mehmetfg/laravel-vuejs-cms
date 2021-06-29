<template>
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















                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" v-if="$store.getters.dealer.type==3">

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
                    <router-link :to="{ name:'profile', params:{id:'1'}}" class="m-menu__link ">

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
</template>

<script>
    export default {

    }
</script>

<style scoped>

</style>
