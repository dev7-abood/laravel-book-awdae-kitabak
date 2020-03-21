<template>
    <nav>
        <br><br>
        <div id="nav-background">
            <div id="nav-container">
                <header id="nav-header">

                    <a v-if="isAuth && isConfirmed" type="button" href="#"
                       class="btn btn-outline-secondary ml-2 text-white">{{$t('add_book')}}&nbsp;<img style="display: inline-block;width: 25px"
                                                                                                      :src="src_add_book"></a>
                    <div v-if="isConfirmed" class="dropdown ml-3">
                        <a type="button" data-toggle="dropdown" class="font-weight-bolder text-white"
                           aria-haspopup="true" aria-expanded="false" v-html="`${full_name}&nbsp; <i class='fas fa-caret-down'></i>`">
                        </a>
                        <div  class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">{{$t('my_data')}}</a>
                            <a class="dropdown-item" href="#">{{$t('my_interests')}}</a>
                            <a class="dropdown-item" href="#">{{$t('my_reservations')}}</a>
                            <div class="dropdown-divider"></div>
                            <a  class="dropdown-item" href="#"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{$t('logout')}}
                            </a>
                        </div>
                    </div>
{{cc}}
                    <a v-if="isAuth && !isConfirmed" class="font-weight-bold text-white ml-2" href="#"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{$t('logout')}}
                    </a>

                        <button v-if="!isAuth" type="button" class="btn btn-secondary mr-3">{{$t('login')}}</button>
                        <button v-if="!isAuth" type="button"
                                class="btn btn-outline-info ml-3 mr-2">{{$t('register_new_account')}}</button>


                    <div v-on:click="isActive = !isActive" id="nav-menu-button"><i class="fas fa-bars"></i></div>
                </header>
                <nav>
                    <ul :class="[{ 'hide-ul' : isActive }, 'nav-ul']">
                        <li><img :src="src_logo" class="ml-3 p-1" width="55px"></li>
                        <li><a class="nav-link active-link" href="#"><i class="fas fa-home"></i></a></li>
                        <li><a class="nav-link" href="#">{{$t('categories')}}</a></li>
                        <li><a class="nav-link" href="#">{{$t('usage_policy')}}</a></li>
                        <li><a class="nav-link" href="#">{{$t('about_us')}}</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <form id="logout-form" action="#" method="POST" style="display: none;">

        </form>
    </nav>
</template>

<script>
    export default {
        name: "NavbarComponent",
        props : ['src_add_book' , 'src_logo'],
        data() {
            return {
                isActive: false,
                isAuth : true,
                isConfirmed : true,
                full_name : '',


            }
        },
        created() {
            this.check_auth();
            this.check_confirmed();
            this.full_name_md();
        },
        methods : {
            check_auth(){
                axios.get('/check-data/is_auth')
                .then(res => this.isAuth = res.data.is_auth)
            },
            check_confirmed(){
                axios.get('/check-data/is_confirmed')
                    .then(res => this.isConfirmed = res.data.is_confirmed)
            },
            full_name_md(){
                axios.get('/check-data/full_name')
                    .then(res => this.full_name = res.data.full_name)
            },

        },
        computed : {
            cc(){
                return this.$store.state.go
            }
        }
    }
</script>

<style scoped>

</style>
