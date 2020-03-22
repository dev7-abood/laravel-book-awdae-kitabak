// import Vue from 'vue'
window.Vue = require('vue');
import VueI18n from "vue-i18n";

Vue.use(VueI18n);


export const i18n = new VueI18n({
    locale : 'ar',
    fallbackLocale : 'en',

    messages : {
        ar : {
            footer_copyrights         : 'جميع الحقوق محفوظة لأودع كتابك ©',
            add_book                  : 'أرفق كتاب',
            my_data                   : 'بيناتي',
            my_interests              : 'اهتمامتي',
            my_reservations           : 'حجوزاتي',
            logout                    :'تسجيل الخروج',
            login                     : 'تسجيل الدخول',
            register_new_account      : 'انشاء حساب',
            categories                : 'المساقات',
            usage_policy              : 'سياسة الاستخدام',
            about_us                  : 'من نحن',
            courses                   : 'مساقات'
        },
        en : {
            hell : 'fuck'
        }
    }
});
