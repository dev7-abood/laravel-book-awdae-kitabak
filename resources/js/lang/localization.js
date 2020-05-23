// import Vue from 'vue'
window.Vue = require('vue');
import VueI18n from "vue-i18n";

Vue.use(VueI18n);


export const i18n = new VueI18n({
    locale : 'ar',
    fallbackLocale : 'en',

    messages: {
        ar: {
            footer_copyrights: 'جميع الحقوق محفوظة لأودع كتابك ©',
            add_book: 'أرفق كتاب',
            my_data: 'بيناتي',
            my_interests: 'اهتمامتي',
            my_reservations: 'حجوزاتي',
            logout: 'تسجيل الخروج',
            login: 'تسجيل الدخول',
            register_new_account: 'انشاء حساب',
            categories: 'المساقات',
            categorie: 'مساقات',
            usage_policy: 'سياسة الاستخدام',
            about_us: 'من نحن',
            courses: 'مساقات',
            number_of_books_available_for_reservation: 'عدد الكتب المتاحة للحجز',
            number_of_books_available: 'عدد الكتب المتاحة',
            number_of_not_books_available: 'عدد الكتب المحجوزة',
            sorry_no_books_available: 'نأسف لا يوجد كتب متاحة',
            there_are_no_books_reserved: 'لا يوجد كتب محجوزة',
            show_books: 'عرض الكتب',
            show_books_available: 'عرض الكتب المتاحة',
            my_library: 'مساقاتي',
            first: 'البداية',
            last: 'النهاية',
            next: 'التالي',
            per: 'السابق',
            number_of_page: 'صفحة رقم ',
            wcs: 'عن اي تصنيف تبحث ؟',
            view_categories: 'عرض التصنيفات',
            category_you_are_looking_for_does_not_exist: 'التصنيف الذي تبحث عنه غير موجود &nbsp;!',
            other_courses:'المساقات الاخري',
            show_courses:'عرض المساقات',
            status:'الحالة',
            good:'جيد',
            bade:'سئ',
            excellent:'ممتاز'
        },
        en : {
            hell : 'confirmStudentDataController'
        }
    }
});
