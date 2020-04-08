<template>
    <nav>
        <br><br>
        <div id="nav-background">
            <div id="nav-container">
                <header id="nav-header">
                    <a v-if="data.is_auth && data.is_confirmed" type="button" href="#"
                       class="btn btn-outline-secondary ml-2 text-white">{{$t('add_book')}}&nbsp;<img style="display: inline-block;width: 25px"
                                                                                                      :src="src_add_book"></a>
                    <div v-if="data.is_confirmed" class="dropdown ml-3">
                        <a type="button" data-toggle="dropdown" class="font-weight-bolder text-white"
                           aria-haspopup="true" aria-expanded="false" v-html="`${data.full_name}&nbsp; <i class='fas fa-caret-down'></i>`">
                        </a>
                        <div  class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">{{$t('my_data')}}</a>
                            <a class="dropdown-item" href="#">{{$t('my_interests')}}</a>
                            <router-link to="/home/hell" class="dropdown-item" href="#">{{$t('my_reservations')}}</router-link>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" @click="logout">
                                {{$t('logout')}}
                            </button>
                        </div>
                    </div>

                    <button v-if="data.is_auth && !data.is_confirmed" class="btn btn-link font-weight-bold text-white ml-2" @click="logout">
                        {{$t('logout')}}
                    </button>

                        <button v-if="!data.is_auth" type="button" class="btn btn-secondary mr-3">{{$t('login')}}</button>
                        <button v-if="!data.is_auth" type="button"
                                class="btn btn-outline-info ml-3 mr-2">{{$t('register_new_account')}}</button>

                    <div v-on:click="isActive = !isActive" id="nav-menu-button"><i class="fas fa-bars"></i></div>
                </header>
                <nav>
                    <ul :class="[{'hide-ul' : isActive } , 'nav-ul']">
                        <li @click="isActive =!isActive"><img :src="src_logo" class="ml-3 p-1" width="55px"></li>
                        <li @click="isActive =!isActive"><a class="nav-link active-link" href="#"><i class="fas fa-home"></i></a></li>
                        <li @click="isActive =!isActive"><router-link :to="{name : 'my_library'}" class="nav-link">{{$t('my_library')}}</router-link></li>
                        <li @click="isActive =!isActive"><router-link :to="{name : 'all_category'}" class="nav-link">{{$t('other_courses')}}</router-link></li>
                        <li @click="isActive =!isActive"><router-link :to="{name : 'my_library'}" class="nav-link">{{$t('usage_policy')}}</router-link></li>
                        <li @click="isActive =!isActive"><router-link :to="{name : 'my_library'}" class="nav-link">{{$t('about_us')}}</router-link></li>
                    </ul>
                </nav>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "NavbarComponent",
        props : ['src_add_book' , 'src_logo' , 'info'],
        data() {
            return {
                isActive: true,
            }
        },
        methods : {
            logout(){
                axios.post('/logout')
                .then(setTimeout(() => {
                    location.reload()
                } , 1000))
            }
        },
        computed : {
            data(){
                return JSON.parse(this.info)
            }
        }
    }
</script>

<style scoped>

</style>
